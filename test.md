 Functions

<dl>
<dt><a href="#getTrueJobKeyword">getTrueJobKeyword(appData)</a> ⇒ <code>string</code></dt>
<dd><p>Returns the actual keyword that should be used for the current search.</p>
</dd>
<dt><a href="#initAnalytics">initAnalytics(visit)</a> ⇒ <code>Controller</code></dt>
<dd><p>Initializes the RM-Analytics via the rma utility for storing metrics in Big Query.</p>
</dd>
<dt><a href="#redirect">redirect(opts)</a> ⇒ <code>Controller</code></dt>
<dd><p>Redirects the app to a new route (page) as per the provided configured options.</p>
</dd>
</dl>

<a name="getTrueJobKeyword"></a>
 getTrueJobKeyword(appData) ⇒ <code>string</code>
Returns the actual keyword that should be used for the current search.

**Kind**: global function  
**Returns**: <code>string</code> - :The "true" keyword determined by some logic based on the nature of a
     keyword-related ruleset for this specific app.  

| Param | Type | Description |
| --- | --- | --- |
| appData | <code>object</code> | :All app-data as provided by the app-state's all() method. |

<a name="initAnalytics"></a>
 initAnalytics(visit) ⇒ <code>Controller</code>
Initializes the RM-Analytics via the rma utility for storing metrics in Big Query.

**Kind**: global function  
**Returns**: <code>Controller</code> - :The app's Controller instance.  

| Param | Type | Description |
| --- | --- | --- |
| visit | <code>object</code> | :{          analytics {object} :The site version's Google Analytics configuration.          property {object} :The site property's unsub configuration.          provider {object} :The site version's jobs provider's configuration.      } |

<a name="redirect"></a>
 redirect(opts) ⇒ <code>Controller</code>
Redirects the app to a new route (page) as per the provided configured options.

**Kind**: global function  
**Returns**: <code>Controller</code> - :The app's Controller instance.  

| Param | Type | Description |
| --- | --- | --- |
| opts | <code>object</code> | :{          data {object} :The GET params payload as an object literal to pass to the route.          route {string} :The name of the route to redirect to.      } |

