<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="admin"){
      header('Location: index.php?err=2');
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>LMS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href = "css/bootstrap.min.css" rel = "stylesheet">
		<link href = "css/styles.css" rel = "stylesheet">
		<style>
		a {font-family:Arial}
		a:link{text-decoration:none}
		a:hover{text-decoration:none;font-weight:bold}
		a:visited{text-decoration:none}
		a:active{text-decoration:none}
		li {margin-left: -30px}
		
		.calendarbox
		{position:relative;top:-10px; right:0px;height:100px;width:50px}
		
		</style>
		
	</head>
	<body>
<!--Header-->
		<div class = "navbar navbar-inverse navbar-static-top">
			<div class = "container">
				<a href = "#" class = "navbar-brand">Logged In As: <?php echo $_SESSION['sess_username'];?></a>
					<!-- collapse button visible on mobile-->
					<button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
						<span class = "icon-bar"></span>
						<span class = "icon-bar"></span>
						<span class = "icon-bar"></span>
					</button>
					<!-- collapse visible on mobile-->
					<div class = "collapse navbar-collapse navHeaderCollapse">
						<ul class = "nav navbar-nav navbar-right">
							<li><a href = "#logout" data-toggle="modal">LogOut</a></li>
						</ul>
					</div>
					   
			</div>
		</div>
<!--Body-->
<div class= "container">
<!--row 1-->
	<div class="row">
<!--Left-->
		<div class = "col-md-3">
<!--Admin collapse-->
			<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="heading00">
			  <h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#admin" aria-expanded="true" aria-controls="admin">
				 Administration
				</a>
			  </h4>
			</div>
			<div id="admin" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading00">
			  <div class="panel-body">
				<ul>
					<li><a href="admin_report.php">Report</a></li>
					<li><a href="admin_add_cc.php">Add Course Content</a></li>
					<li><a href="admin_add_participants.php">Add Participants</a></li>
				</ul>
			  </div>
			</div>
			</div>
<!--profile setting collapse-->
			<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="heading0">
			  <h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapse0" aria-expanded="true" aria-controls="collapse0">
				 <span class="glyphicon glyphicon-user" aria-hidden="true"></span>	
				 Profile Settings
				</a>
			  </h4>
			</div>
			<div id="collapse0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
			  <div class="panel-body">
				<ul>
					<li><a href="profile.php">Edit Profile</a></li>
					<li><a href="#">Portfolios</a></li>
					<li><a href="#">Messaging</a></li>
				</ul>
			  </div>
			</div>
			</div>
<!--My courses collapse-->
			<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingZero">
			  <h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseZero" aria-expanded="true" aria-controls="collapseZero">
				 Courses
				</a>
			  </h4>
			</div>
			<div id="collapseZero" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingZero">
			  <div class="panel-body">
				<ul>
					<li class="active"><a href="#">History 101</a></li>
					<li><a href="#">English 101</a></li>
					<li><a href="#">Software Engineering 101</a></li>
				</ul>
			  </div>
			</div>
			</div>
			
		</div>
<!--center-->
		<div class = "col-md-6">
		<center><h1>Welcome to {History 101}</h1></center>
<!--start topic 1-->
			<div class="panel panel-info">
			<div class="panel-heading" role="tab" id="headingOne">
			  <h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				  Topic 1 : January 21,2015
				</a>
			  </h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
			  <div class="panel-body">
				<ul>
					<li>Homework 1 Due</li>
				</ul>
			  </div>
			</div>
			</div>
<!--start topic 2-->
			<div class="panel panel-info">
			<div class="panel-heading" role="tab" id="headingTwo">
			  <h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
				  Topic 2: January 28,2015
				</a>
			  </h4>
			</div>
			<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			  <div class="panel-body">
				<ul>
					<li>Homework 2 Due</li>
				</ul>
			  </div>
			</div>
			</div>
<!--start topic 3-->
			<div class="panel panel-info">
			<div class="panel-heading" role="tab" id="headingThree">
			  <h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
				  Topic 3: February 4,2015
				</a>
			  </h4>
			</div>
			<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
			  <div class="panel-body">
				<ul>
					<li>Homework 3 Due</li>
				</ul>
			  </div>
			</div>
			</div>
		</div>
<!--right-->
		<div class = "col-md-3">
<!--Upcoming Events-->
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="Upcoming">
			  <h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#UpEvent" aria-expanded="true" aria-controls="UpEvent">
				 Upcoming Events
				</a>
			  </h4>
			</div>
			<div id="UpEvent" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Upcoming">
			  <div class="panel-body">
				<p> {Martin Luther King Jr.Day-Campus Closed}</p>
				<a href="#calendar" data-toggle="modal" class = "btn btn-group-sm btn-info" >Calendar</a>
			  </div>
			</div>
		</div>
<!--Message-->
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="Message0">
			  <h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#Message" aria-expanded="true" aria-controls="Message">
				 Message
				</a>
			  </h4>
			</div>
			<div id="Message" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Message">
			  <div class="panel-body">
				<a href="#message" data-toggle="modal" ><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>You have {1} new message</a>
			  </div>
			</div>
		</div>
			
		</div>
	</div> <!--end row-->
</div><!--end container-->

<!--Footer-->
		<div class = "navbar navbar-default navbar-fixed-bottom">
			<div class = "container">
				<p class = "navbar-text pull-left">Site Built By Christie Phan</p>
				<a href = "https://www.linkedin.com/in/christiephan" class = "navbar-btn btn-primary btn pull-right">LinkedIn</a>
			</div>
		</div>
		
<!-- Modal: loads last --->


<!--start calendar modal-->
<div class="modal fade" id="calendar" tabindex="-1" role="dialog" aria-labelledby="calendar" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<center><h4 class="modal-title" id="edit"> {February}, {2015}</h4></center>
				</div>
				<div class="modal-body">
					<table class = "table table-bordered">
						<tr class = "info">
							<strong><td>Sun</td></strong>
							<strong><td>Mon</td></strong>
							<strong><td>Tues</td></strong>
							<strong><td>Wed</td></strong>
							<strong><td>Thu</td></strong>
							<strong><td>Fri</td></strong>
							<strong><td>Sat</td></strong>
						</tr>
						<tr>
							<td class="calendarbox">1</td>
							<td class="calendarbox">2</td>
							<td class="calendarbox">3</td>
							<td class="calendarbox">4</td>
							<td class="calendarbox">5</td>
							<td class="calendarbox">6</td>
							<td class="calendarbox">7</td>
						</tr>
						<tr>
							<td class="calendarbox">8</td>
							<td class="calendarbox">9</td>
							<td class="calendarbox">10</td>
							<td class="calendarbox">11</td>
							<td class="calendarbox">12</td>
							<td class="calendarbox">13</td>
							<td class="calendarbox">14</td>
						</tr>
						<tr>
							<td class="calendarbox">15</td>
							<td class="calendarbox">16</td>
							<td class="calendarbox">17</td>
							<td class="calendarbox">18</td>
							<td class="calendarbox">19</td>
							<td class="calendarbox">20</td>
							<td class="calendarbox">21</td>
						</tr>
						<tr>
							<td class="calendarbox">22</td>
							<td class="calendarbox">23</td>
							<td class="calendarbox">24</td>
							<td class="calendarbox">25</td>
							<td class="calendarbox">26</td>
							<td class="calendarbox">27</td>
							<td class="calendarbox">28</td>
						</tr>
						<tr>
							<td class="calendarbox">29</td>
							<td class="calendarbox">30</td>
							<td class="calendarbox default"> </td>
							<td class="calendarbox default"> </td>
							<td class="calendarbox default"> </td>
							<td class="calendarbox default"> </td>
							<td class="calendarbox default"> </td>
						</tr>
					</table>
					
					
				
				</div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			  </div>
				</div>
			</div>
		</div>
<!--End calendar modal-->

<!--start message modal-->
		<div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="edit">Message from {Christie} </h4>
				</div>
				<div class="modal-body">
					<h4>{how are you doing today?}</h4>
					<textarea class="form-control" rows="3" Placeholder="reply message here"></textarea>
				
				</div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Send</button>
			  </div>
				</div>
			</div>
		</div>

<!--End message Modal-->
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
<!--Start Script-->
			<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<script src = "js/bootstrap.js"></script>
		   
	</body>
</html>