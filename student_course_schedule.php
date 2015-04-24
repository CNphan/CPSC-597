<?php 
	mysql_connect("localhost","root","");
	mysql_select_db("lms");
	
	session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="student"){
      header('Location: index.php?err=2');
    }
	
	$result = mysql_query("SELECT course.course_id, course.course_name,course.course_type,course.course_days,course.course_time,course.course_unit,course.course_startDate,course.course_endDate,course.course_loc,course.course_inst,user.user_id
							FROM course
							JOIN user_course on course.course_id = user_course.course_id
							JOIN user on user.user_id = user_course.user_id
							");
	
	$courseN ='course_name';
	$courseT ='course_type';
	$courseD ='course_days';
	$courseTime ='course_time';
	$courseU ='course_unit';
	$courseStD ='course_startDate';
	$courseEnD ='course_endDate';
	$courseloc ='course_loc';
	$courseI ='course_inst';
	
	if (!$result)
	{
		die("Invalid query:".mysql_error());
	}
	
	// single row
	$row = mysql_fetch_array($result);
	
	// multiple rows- doesn't work 
/*while(($row = mysql_fetch_array($result)) !== FALSE)
	{
		echo 'Name:'.$row[$courseN];
		echo '<br>';
	}*/
?>

<!DOCTYPE html><!--Credentials:student,teacher,admin -->
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
				<a href = "student_content.php" class = "navbar-brand">Logged In As: <?php echo $_SESSION['sess_username'];?></a>
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
<div class= "jumbotron"><h1>Schedule {Semester-Spring 2015}</h1></div>
<div class="table-responsive">
  <table class="table">
    <tr>
		<td class="success">
			<div><strong> COURSE NAME</strong> </div>
		</td>
		<td class="success">
			<div><strong> TYPES</strong> </div>
		</td>
		<td class="success">
			<div><strong> DAYS</strong></div>
		</td>
		<td class="success">
			<div><strong> TIME</strong></div>
		</td>
		<td class="success">
			<div><strong> UNITS</strong></div>
		</td>
		<td class="success">
			<div><strong> LOC</strong></div>
		</td>
		<td class="success">
			<div><strong> INST</strong></div> <!--stu = loc, inst=roll-->
		</td>
	</tr>
	<tr>
		<td>
			<?php echo '<div>'.$row[$courseN].'</div>'?>
		</td>
		<td>
			<?php echo '<div>'.$row[$courseT].'</div>'?>
		</td>
		<td>
			<?php echo '<div>'.$row[$courseD].'</div>'?>
		</td>
		<td>
			<?php echo '<div>'.$row[$courseTime].'</div>'?>
		</td>
		<td>
			<?php echo '<div>'.$row[$courseU].'</div>'?>
		</td>
		<td>
			<?php echo '<div>'.$row[$courseloc].'</div>'?>
		</td>
		<td>
			<?php echo '<div>'.$row[$courseI].'</div>'?>
		</td>
	</tr>
  </table>
</div>
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