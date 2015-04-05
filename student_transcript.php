<?php 
	require 'database-config.php';
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="student"){
      header('Location: index.php?err=2');
    }
	mysql_connect("localhost", "root", "") or die(mysql_error()); 
	mysql_select_db("lms") or die(mysql_error()); 
	/*$data = mysql_query("SELECT user.username,course.course_name FROM 'user' INNER JOIN 'course' on user.course_id = course.course_id");
	
	$course_id = 'course_id';
	$course_name = 'course_Name';
	$course_type = 'course_Type';
	$course_days = 'course_Days';
	$course_unit = 'course_Unit';
	$course_startDate = 'course_startDate';
	$course_endDate = 'course_endDate';
	$course_points = 'course_Points';
	$course_term = 'term';
	$course_grades = 'grades_id';

	$rows = mysql_fetch_assoc($data);
	echo $rows['course_Name'];  
	
	$detail = " SELECT user.username, course.course_name 
				FROM 'user', 'course'
				WHERE user.course_id = course.course_id AND
				user.course_id = $courseID";
				
				$courseID = $_GET[course_id];
				
*/

	
?>

		
<!DOCTYPE html><!--Credentials:student,admin -->
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
<div class= "jumbotron"><h1>Unofficial Transcript</h1></div>
	<h3><strong>Name:<?php echo $_SESSION['sess_userLName'];?> , <?php echo $_SESSION['sess_userFName'];?></strong></h3>
	<h3><strong>Student ID: <?php echo $_SESSION['sess_user_id'];?> </strong></h3>
	<h4>Date: Current</h4>
	<br></br>
	<br></br>
	<h3>Degrees Awarded</h3>
	<div class="row">

		<div class="col-xs-12 col-sm-6 col-md-8"><strong>Degree:</strong></div>
		<div class="col-xs-6 col-md-4"> <?php echo $_SESSION['sess_degreeType'];?></div>
		<div class="col-xs-12 col-sm-6 col-md-8"><strong>Program:</strong></div>
		<div class="col-xs-6 col-md-4"><?php echo $_SESSION['sess_degreeProgram'];?></div>
	</div>
	<br></br>
	<br></br>
<div>  <!--start table-->
	<!--Note : A = 4, B = 3, C =2, D =1, F =0; multiple grades w. credit hours; total grades point/total attempt=GPA-->
	<div class="table-responsive">
  <table class="table">
    <tr>
		<td class="default">
			<div><strong> Course ID</strong> </div>
		</td>
		<td class="default">
			<div><strong> Credit Hours</strong></div>
		</td>
		<td class="default">
			<div><strong> Grade</strong></div>
		</td>
		<td class="default">
			<div><strong> Grade Points</strong></div>
		</td>
	</tr>
	<tr>
		<td>
			<div> <?php echo $_SESSION['sess_course1'];?></div>
		</td>
		<td>
			<div> <?php echo $_SESSION['sess_courseUnit1'];?></div>
		</td>
		<td>
			<div> <?php echo $_SESSION['sess_grade1']."%";?> </div>
		</td>
		<td>
			<div> 
			<?php 
			if ($_SESSION['sess_grade1'] >=90)
			{
				$result = $_SESSION['sess_courseUnit1'] * 4;
				echo $result;
				
			}
			else if ($_SESSION['sess_grade1'] ==80)
			{
				$result = $_SESSION['sess_courseUnit1'] * 3;
				echo $result;
			}
			else if ($_SESSION['sess_grade1'] ==70)
			{
				$result = $_SESSION['sess_courseUnit1'] * 2;
				echo $result;
			}
			else if ($_SESSION['sess_grade1'] == 60)
			{
				$result = $_SESSION['sess_courseUnit1'] * 1;
				echo $result;
			}
			else if ($_SESSION['sess_grade1'] ==50)
			{
				$result = $_SESSION['sess_courseUnit1'] * 0;
				echo $result;
			}
			else
			{
				echo "Null";
			}
			
			?></div>
		</td>
	</tr>
	<tr>
		<td>
			<div> <?php echo $_SESSION['sess_course2'];?></div>
		</td>
		<td>
			<div><?php echo $_SESSION['sess_courseUnit2'];?></div>
		</td>
		<td>
			<div> <?php echo $_SESSION['sess_grade2']."%";?> </div>
		</td>
		<td>
			<div> 
			<?php 
			if ($_SESSION['sess_grade2'] >=90)
			{
				$result = $_SESSION['sess_courseUnit1'] * 4;
				echo $result;
				
			}
			else if ($_SESSION['sess_grade2'] ==80)
			{
				$result = $_SESSION['sess_courseUnit1'] * 3;
				echo $result;
			}
			else if ($_SESSION['sess_grade2'] ==70)
			{
				$result = $_SESSION['sess_courseUnit1'] * 2;
				echo $result;
			}
			else if ($_SESSION['sess_grade2'] == 60)
			{
				$result = $_SESSION['sess_courseUnit1'] * 1;
				echo $result;
			}
			else if ($_SESSION['sess_grade2'] ==50)
			{
				$result = $_SESSION['sess_courseUnit1'] * 0;
				echo $result;
			}
			else
			{
				echo "Null";
			}
			
			?></div>
		</td>
	</tr>
	<tr>
		<td class="default">
			<div><strong> Term GPA</strong> </div>
		</td>
		<td class="default">
			<div><strong> Term</strong> </div>
		</td>
		<td class="default">
			<div><strong> Credit Hours</strong></div>
		</td>
		<td class="default">
			<div><strong> Total Points</strong></div>
		</td>
	</tr>
	<tr>
		<td>
			<div> 4.0</div>
		</td>
		<td>
			<div> Fall 2013</div>
		</td>
		<td>
			<div> 6 </div>
		</td>
		<td>
			<div> 24 </div>
		</td>
	</tr>
  </table>
</div><!--end table-->
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-8"><strong>Cum GPA</strong></div>
	<div class="col-xs-6 col-md-4">{4.0}</div>
	<div class="col-xs-12 col-sm-6 col-md-8"><strong>Test:</strong></div>
	<div class="col-xs-6 col-md-4">{Writing}</div>
</div>
<div>
	<h1>Request for Transcript</h1>
		<form class="form-inline">
	  <div class="form-group">
		<label for="StudentID">Student ID:</label>
		<input type="text" class="form-control" id="StudentID" placeholder="Student ID">
	  </div>
	  <div class="form-group">
		<label for="email">Email:</label>
		<input type="email" class="form-control" id="email" placeholder="jane.doe@example.com">
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button><!--Approve by admin-->
	</form>
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