<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="admin"){
      header('Location: index.php?err=2');
    }
?>

<!DOCTYPE html><!--Credentials:guest,student,teacher,admin -->
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
		
		
		.calendarbox
		{position:relative;top:-10px; right:0px;height:100px;width:50px}
		
		.input-group-addon
		{background:white;}
		.input-group-addon:hover
		{background:#E8E8E8 }
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
<div class= "jumbotron"><h1>Add Participants</h1></div>
	<div class="input-group">
		<span class="input-group-addon" id="user_id">User ID:</span>
		<input type="text" class="form-control" placeholder="Jane" aria-describedby="sizing-addon1"> <!--search for user_id-auto fill the rest-->
	</div>
	<div class="input-group">
		<span class="input-group-addon" id="user_fName">First Name:</span>
		<input type="text" class="form-control" placeholder="Jane" aria-describedby="sizing-addon1">
	</div>
	<div class="input-group">
		<span class="input-group-addon" id="user_lName">Last Name:</span>
		<input type="text" class="form-control" placeholder="Do" aria-describedby="sizing-addon1">
	</div>
	<div class="input-group">
		<span class="input-group-addon" id="user_email">E-mail:</span>
		<input type="email" class="form-control" placeholder="Jane@fullerton.edu" aria-describedby="sizing-addon1">
	</div>
	<div class="input-group">
		<span class="input-group-addon" id="course_id">Course ID:</span>
		<input type="text" class="form-control" placeholder="HIS 101" aria-describedby="sizing-addon1">
	</div>
  <h4>Select credential:</h4>
  <form role="form">
    <div class="radio">
      <label><input type="radio" name="opt_stu">Student</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="opt_teach">Teacher</label>
    </div>
  </form>
<br></br>
<a href = "registration_conf.html"><button class="btn btn-primary" type="button">Submit</button></a> <!--Approve by admin-->
</div><!--end container-->

<!--Footer-->
		<div class = "navbar navbar-default navbar-fixed-bottom">
			<div class = "container">
				<p class = "navbar-text pull-left">Site Built By Christie Phan</p>
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
							<center><a  class = "btn btn-primary " href="index.php">Yes</a>
							<a  class = "btn btn-default " data-dismiss = "modal">No</a></center>
						</div>
					</form>
				</div>
			</div>
		</div> <!--end log out modal-->
<!--Start Script-->
			<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<script src = "js/bootstrap.js"></script>
		   
	</body>
</html>