<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if((!isset($_SESSION['sess_username']) && $role!="Administrator") || ((!isset($_SESSION['sess_username']) && $role!="Teacher"))|| ((!isset($_SESSION['sess_username']) && $role!="Student")) )
	
	{
      header('Location: index.php?err=2');
    }
$con = mysql_connect("localhost","root","");
if (!$con){
die("Can not connect: " . mysql_error());
}
mysql_select_db("lms2",$con);
?>

<!DOCTYPE html>
<html>
<head>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMS</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
	<script>tinymce.init({selector:'textarea'});</script>
	<style>
		a {font-family:Arial}
		a:link{text-decoration:none}
		a:hover{text-decoration:none !important;font-weight:bold}
		a:visited{text-decoration:none}
		a:active{text-decoration:none}
		.calendarbox
		{position:relative;top:-10px; right:0px;height:100px;width:50px}
		
		</style>

		<!--Calendar Style/js-->
<link href='css/fullcalendar.css' rel='stylesheet' />
<link href='css/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='lib/moment.min.js'></script>
<script src='lib/jquery.min.js'></script>
<script src='js/fullcalendar.min.js'></script>
<script src='js/gcal.js'></script>
<script>

	$(document).ready(function() {
	
		$('#calendar').fullCalendar({

			// THIS KEY WON'T WORK IN PRODUCTION!!!
			// To make your own Google API key, follow the directions here:
			// http://fullcalendar.io/docs/google_calendar/
			googleCalendarApiKey: 'AIzaSyCh2TNu5pCV0xJhPpnH9pysouRuTN2Dqy0',
		
			// US Holidays
			events: 'usa__en@holiday.calendar.google.com',
			
			eventClick: function(event) {
				// opens events in a popup window
				window.open(event.url, 'gcalevent', 'width=700,height=600');
				return false;
			},
			
			loading: function(bool) {
				$('#loading').toggle(bool);
			}
			
		});
		
	});

</script>
<style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}
		
	#loading {
		display: none;
		position: absolute;
		top: 10px;
		right: 10px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>
 <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
 <body style= "margin-bottom:80px;">
<!--header-->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		 <?php
		  if ($_SESSION['sess_role'] == 'Administrator')
		  {
			  echo "<a href = 'admin_home.php' class = 'navbar-brand'> Role:".$_SESSION['sess_role']."</a>";
			  
		  }
		  else if ($_SESSION['sess_role'] == 'Student')
		  {
			  echo "<a href = 'student_home.php' class = 'navbar-brand'> Role:".$_SESSION['sess_role']."</a>";
		  }
		  else if ($_SESSION['sess_role'] == 'Teacher')
		  {
			  echo "<a href = 'teacher_home.php' class = 'navbar-brand'> Role:".$_SESSION['sess_role']."</a>";
		  }
		  else 
		  {
			  header('Location: index.php?err=2');
		  }
		  ?>
        </div>

        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><?php echo $_SESSION['sess_lname'] .' , '. $_SESSION['sess_fname'];?></a></li>
			 <li><a href = "#logout" data-toggle="modal">LogOut</a></li>
          </ul>
        </div>
      </div>
    </div>


<br></br>

<div class = "container">
	<div id='loading'>loading...</div>

	<div id='calendar'></div>
</div> <!--End container-->

<!--Footer-->
		<div class = "navbar navbar-default navbar-fixed-bottom" style = "margin-top:80px;"> 
			<div class = "container">
				<p class = "navbar-text pull-left"><span class="glyphicon glyphicon-copyright-mark"></span> Christie Phan</p>   
				<a href = "https://www.linkedin.com/in/christiephan" class = "navbar-btn btn-primary btn pull-right">LinkedIn</a>
			</div>
		</div>
		
<!-- Modal: loads last --->
<!--Log out modal-->
<div class = "modal fade" tabindex="-1" id = "logout" role = "dialog">
			<div class = "modal-dialog modal-sm">
				<div class = "modal-content">
					<form class = "form-horizontal">
						<div class = "modal-header">
							<center><h4>Do you want to log out?</h4></center>
						</div>
						<div class = "modal-body">
							<center><a  class = "btn btn-primary " href="logout.php">Yes</a>
							<a  class = "btn btn-default " data-dismiss = "modal">No</a></center>
						</div>
					</form>
				</div>
			</div>
		</div> 
<!--end log out modal-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 </body>
</html>
