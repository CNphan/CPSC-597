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
<div class= "jumbotron"><h1>Add Content</h1></div>

<div class="input-group">
  <div class="input-group-btn">
  <button type="button" class="btn btn-default">Instructor</button>
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#">Do, Jane</a></li>
    <li><a href="#">Do, John</a></li>
    <li><a href="#">Phan, Christie</a></li>
  </ul>
</div>
  <input type="text" class="form-control" aria-label="...">
</div>

<div class="input-group">
  <div class="input-group-btn">
  <button type="button" class="btn btn-default">Course</button>
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#">History 101</a></li>
    <li><a href="#">English 101</a></li>
    <li><a href="#">Software Engineering 101</a></li>
    <li class="divider"></li>
    <li><a href="#">Separated link</a></li>
  </ul>
</div>
  <input type="text" class="form-control" aria-label="...">
</div>

<div class="input-group">
  <div class="input-group-btn">
  <button type="button" class="btn btn-default">Section</button>
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
  </ul>
</div>
  <input type="text" class="form-control" aria-label="...">
</div>

<div class="input-group">
  <div class="input-group-btn">
  <button type="button" class="btn btn-default">Participants Amt</button>
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
  </ul>
</div>
  <input type="text" class="form-control" aria-label="...">
</div>

<div class="input-group">
  <div class="input-group-btn">
  <button type="button" class="btn btn-default">Topics Amt</button>
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
  </ul>
</div>
  <input type="text" class="form-control" aria-label="...">
</div>
<div class="input-group">
  <span class="input-group-addon" id="starDate">Start Date</span>
  <input type="date" class="form-control" placeholder="1/23/2015" aria-describedby="sizing-addon1">
</div>
<div class="input-group">
  <span class="input-group-addon" id="endDate">End Date</span>
  <input type="date" class="form-control" placeholder="1/23/2015" aria-describedby="sizing-addon1">
</div>
<br></br>
<a href="admin_add_ccc.php"><button class="btn btn-primary" type="button">Submit</button></a><!--link to Admin add course content confirm-->
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