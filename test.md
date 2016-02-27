
# Source: app/app.controller.js

    // app.controller.js
    var Marionette = require("marionette"),
        $ = require("jquery");
    
    module.exports = Marionette.Controller.extend({
        initialize: function() {
            this.modules = this.app.config("_MODULES");
            this.flags = this.app.config("_FLAGS");
    
            // Defaults
            this.defaults = {
    
                // Ads: default value of the a flag (0=CSA, 1=AFC) when not provided in the URL search-query.
                a: 0,
    
                // Site-specific app-data defaults - used if not provided in the URL search-query.
                appData: {
                    PartnerCode: "RJO",
                    source: "recommendedjobs.com"
                }
            };
    
            // Events
            this.listenTo(this.app.vent, "search", this.refresh);
            this.listenTo(this.app.vent, "redirect", this.redirect);
        },
        configureApp: function(query) {
            var self = this,
                providers = this.app.config("_PROVIDERS");
            
            this.configureAppPromise = $.Deferred();
    
            this.appState.sync(query).done(function(appData) {
                console.log("FINAL appData: ", appData);
                
                self.setDefaultsAsNeeded(appData);
    
                self.app.config("_SITE_VERSION", providers.siteVersions.fetch(appData.v), true)
                    .config("_SITE_PROPERTY", providers.siteProperties.fetch(appData.siteid), true);
                
                if (!self.flags.respectLocation && !appData.city) {
                    self.setLocationByGeo(appData).done(function(loc) {
                        self.configureAppPromise.resolve(appData);
                    });
                } else {
                    self.configureAppPromise.resolve(appData);
                }
            });
        },
        destroyModule: function() {
            if (this.app.layout.body.hasView()) {
                this.app.layout.body.currentView.controller.destroy();
            }
        },
        formatQuery: function(query) {
            var query = (query || {}),
                queryJSON = (typeof query === "string" ? this.utils.queryParse.toJSON(query) : query);
    
            console.log("Query Input", query);
            console.log("Query JSON: ", queryJSON);
    
            // Set the query AFC flag accordingly.
            queryJSON.a = (queryJSON.a || queryJSON.a === 0 ? queryJSON.a : this.defaults.a);
    
            return this.formatQueryValues(queryJSON);
        },
        formatQueryValues: function(query) {
            var queryStringKeys = [
                    "city",
                    "first",
                    "JobKeyword",
                    "last",
                    "location",
                    "state"
                ],
                queryNumberKeys = [
                    "a",
                    "v"
                ];
    
            // Capitalize each word for each string value.
            this.handy.walk(queryStringKeys, function(i, keyName, opts) {
                var self = opts.context;
    
                if (query[keyName]) {
                    if (keyName == "state") {
                        query[keyName] = query[keyName].toUpperCase();
                    } else {
                        query[keyName] = self.utils.stringy.ucWords(query[keyName]);
                    }
                }
            }, { context: this });
    
            // Cast each of these values to numbers.
            this.handy.walk(queryNumberKeys, function(i, keyName) {
                if (query[keyName]) {
                    query[keyName] = Number(query[keyName]);
                }
            });
    
            return query;
        },
    
        /**
         * Returns the actual keyword that should be used for the current search.
         *
         * @param appData {object} :All app-data as provided by the app-state's all() method.
         *
         * @return {string} :The "true" keyword determined by some logic based on the nature of a
         *      keyword-related ruleset for this specific app.
         */
        getTrueJobKeyword: function(appData) {
            return appData.JobKeyword;
        },
    
        /**
         * Initializes the RM-Analytics via the rma utility for storing metrics in Big Query.
         *
         * @param visit {object} :{
         *          analytics {object} :The site version's Google Analytics configuration.
         *          property {object} :The site property's unsub configuration.
         *          provider {object} :The site version's jobs provider's configuration.
         *      }
         *
         * @return {Controller} :The app's Controller instance.
         */
        initAnalytics: function(visit, query) {
            var appData = this.appState.all()
                host = this.utils.domainRoot(),
                env = this.utils.env(host),
                metricsAPIPath = "//api." + (env.isProd ? "" : "dev.");
    
            this.utils.analytics(visit.analytics.tracking)
                .rma.init({
                    channel: {
                        device: (this.utils.isMobile ? "mobile" : "desktop"),
                        site: host,
                        urlPrefix: metricsAPIPath + host,
                        user: (appData.email ? "email" : "organic")
                    },
                    data: this.handy.extend({
                        adContainer: "[id^=adcontainer], .media-net",
                        envName: env.name,
                        host: host,
                        isMobile: (this.utils.isMobile ? true : false),
                        isResultsPage: (this.isResultsPage || false),
                        property: visit.property,
                        providers: visit.providers[this.utils.search.getQPresentKey(appData.JobKeyword, true)]
                    }, appData, {
    
                        // Override the version value for metrics purposes only based on which ad experience
                        //      the site is set to deliver.
                        v: (appData.a ? appData.v + "a" : appData.v)
                    }),
                    ip: {
                        urlPrefix: metricsAPIPath + host
                    }
                });
    
            return this;
        },
        initApp: function(query, module, options) {
    
            // Resets the app-state promise.
            this.appState.reset();
    
            // Set up the app with the recieved URL query data.
            this.setUpApp({
                query: query
            })
    
            // Run the app with the requested module.
            .runApp(module, options);
        },
    
        /**
         * Redirects the app to a new route (page) as per the provided configured options.
         *
         * @param opts {object} :{
         *          data {object} :The GET params payload as an object literal to pass to the route.
         *          route {string} :The name of the route to redirect to.
         *      }
         *
         * @return {Controller} :The app's Controller instance.
         */
        redirect: function(opts) {
            var queryStringified = this.utils.queryParse.toString(opts.data),
                queryStr = (queryStringified !== "" ? "?" + queryStringified : "");
            
            // Sets the repectLocation flag so that users have the ability to search nationwide (no Q).
            this.flags.respectLocation = true;
    
            Backbone.history.navigate(opts.route + queryStr, {
                trigger: true
            });
    
            return this;
        },
        refresh: function(data) {
            var cityState = data.l.split(", ");
    
            this.redirect({
                data: {
                    a: (data.a || data.a === 0 ? data.a : this.appState.get("a")),
                    city: cityState[0],
                    JobKeyword: data.q,
                    state: (cityState[1] ? cityState[1] : "")
                },
                route: Backbone.history.fragment.split("?")[0]
            });
        },
        resetAppStateIfNeeded: function(query) {
            var inputQueryJSON = this.utils.queryParse.toJSON(query);
    
            if (inputQueryJSON.email && !inputQueryJSON.uid) {
                this.appState.sessionProvider.reset();
            }
        },
        runApp: function(module, options) {
            var app = this.app,
                self = this;
    
            options = (options || {});
    
            this.configureAppPromise.done(function(appData) {
                var siteDependencies = [
                    app.config("_SITE_VERSION"),
                    app.config("_SITE_PROPERTY")
                ];
    
                $.when.apply($, siteDependencies).done(function(site, property) {
                    var moduleController;
    
                    // Destroy the current view's controller if a view exists on the app's layout region.
                    // This will remove any event listeners on the controller if they were defined with .listenTo().
                    self.destroyModule();
    
                    // Set the site ID to the app constant, "_SITE_ID".
                    app.config("_SITE_ID", property.unsub.id);
    
                    // Initialize RM Analytics.
                    self.initAnalytics({
                        analytics: site.analytics,
                        property: property.unsub,
                        providers: site.jobProviders
                    });
    
                    // Instantiate the module's controller.
                    moduleController = new module.Controller(self.handy.merge({
                        app: app,
                        property: property,
                        site: site
                    }, options));
    
                    // Render the module.
                    moduleController.render(app.layout.body, module);
                });
            });
        },
        setDefaultsAsNeeded: function(appData) {
            appData.PartnerCode = (appData.PartnerCode || this.defaults.appData.PartnerCode);
        },
        setLocationByGeo: function(appData) {
            var self = this,
                promise = $.Deferred();
    
            this.utils.api.getIP().done(function(ip) {
                self.ip = ip;
    
                self.utils.geoLocate({
                    ip: ip
                }).done(function(response) {
                    appData.city = response.City;
                    appData.state = response.State;
                    
                    promise.resolve(response);
                });
            });
    
            return promise;
        },
        setPropertyResources: function() {
            var utils = this.utils;
    
            this.app.config("_SITE_PROPERTY").then(function(property) {
    
                // Don't add the styles.css link if there are no custom styles for the displayed property.
                if (property.customStyles) {
                    utils.markup.link("property", {
                        path: property.name,
                        resource: "styles.css"
                    });
                }
            });
        },
        setUpApp: function(options) {
            var self = this;
    
            // Set the URL to a cleaned one.
            Backbone.history.navigate(this.utils.cleanURL(Backbone.history.fragment), {
                replace: true
            });
    
            // Scroll to the top of the page.
            document.body.scrollTop = document.documentElement.scrollTop = 0;
    
            // Configure the application with any needed data.
            this.configureApp(this.formatQuery(options.query));
    
            // Remove any previously set HTML document resources.
            this.unsetPropertyResources();
    
            // Then set new/fresh HTML document resources.
            if (app.controller.isResultsPage) {
                this.appState.promise.done(function() {
                    self.setPropertyResources();
                });
            }
    
            return this;
        },
        showContact: function() {
            this.isResultsPage = false;
            this.initApp("", this.modules.contact);
        },
        showJobs: function(query) {
            this.isResultsPage = true;
    
            this.initApp(query, this.modules.jobs, {
                visitorType: (typeof query === "string" ? "email" : "other")
            });
        },
        showLander: function() {
            this.isResultsPage = false;
    
            this.initApp("", this.modules.lander);
        },
        showPrivacy: function() {
            this.isResultsPage = false;
            this.initApp("", this.modules.privacy);
        },
        showSubscriptions: function(query) {
            this.resetAppStateIfNeeded(query);
    
            this.isResultsPage = false;
            this.initApp(query, this.modules.subscriptions);
        },
        unsetPropertyResources: function() {
            this.utils.markup.remove("link", "property");
        }
    });

## [Home][0]

### Namespaces

* [Sha1][1]
* [Sha256][2]

### Global

* [cycleInputs][3]
* [getTrueJobKeyword][4]
* [initAnalytics][5]
* [Marionette][6]
* [placeMediaNet][7]
* [redirect][8]
  

Documentation generated by [JSDoc 3.5.0-dev][9] on Fri Feb 26 2016 17:36:30 GMT-0800 (PST)


[0]: index.html
[1]: Sha1.html
[2]: Sha256.html
[3]: global.html#cycleInputs
[4]: global.html#getTrueJobKeyword
[5]: global.html#initAnalytics
[6]: global.html#Marionette
[7]: global.html#placeMediaNet
[8]: global.html#redirect
[9]: https://github.com/jsdoc3/jsdoc
