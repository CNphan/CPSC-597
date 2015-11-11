<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="Student"){
      header('Location: index.php?err=2');
    }
	
	$con = mysql_connect("localhost","root","");
if (!$con){
die("Can not connect: " . mysql_error());
}
mysql_select_db("lms2",$con);



// Query out each course 
	// course 1
	$course1 = mysql_query ("SELECT * FROM course WHERE course_id = 1");
	if (!$course1)
	{
		die("Invalid query:".mysql_error());
	}
	$c1 = mysql_fetch_array($course1);
	
	// course 2
	$course2 = mysql_query ("SELECT * FROM course WHERE course_id = 2");
	if (!$course2)
	{
		die("Invalid query:".mysql_error());
	}
	$c2 = mysql_fetch_array($course2);
	
	// course 3
	$course3 = mysql_query ("SELECT * FROM course WHERE course_id = 3");
	if (!$course3)
	{
		die("Invalid query:".mysql_error());
	}
	$c3 = mysql_fetch_array($course3);
	
	// course 4
	$course4 = mysql_query ("SELECT * FROM course WHERE course_id = 4");
	if (!$course4)
	{
		die("Invalid query:".mysql_error());
	}
	$c4 = mysql_fetch_array($course4);
	
	$course5 = mysql_query ("SELECT * FROM course WHERE course_id = 5");
	if (!$course5)
	{
		die("Invalid query:".mysql_error());
	}
	$c5 = mysql_fetch_array($course5);
	
	$course6 = mysql_query ("SELECT * FROM course WHERE course_id = 6");
	if (!$course6)
	{
		die("Invalid query:".mysql_error());
	}
	$c6 = mysql_fetch_array($course6);
	
	$course7 = mysql_query ("SELECT * FROM course WHERE course_id = 7");
	if (!$course7)
	{
		die("Invalid query:".mysql_error());
	}
	$c7 = mysql_fetch_array($course7);
	
	$course8 = mysql_query ("SELECT * FROM course WHERE course_id = 8");
	if (!$course8)
	{
		die("Invalid query:".mysql_error());
	}
	$c8 = mysql_fetch_array($course8);
	
	$course9 = mysql_query ("SELECT * FROM course WHERE course_id = 9");
	if (!$course9)
	{
		die("Invalid query:".mysql_error());
	}
	$c9 = mysql_fetch_array($course9);
	
	$course10 = mysql_query ("SELECT * FROM course WHERE course_id = 10");
	if (!$course10)
	{
		die("Invalid query:".mysql_error());
	}
	$c10 = mysql_fetch_array($course10);
	
	$course11 = mysql_query ("SELECT * FROM course WHERE course_id = 11");
	if (!$course11)
	{
		die("Invalid query:".mysql_error());
	}
	$c11 = mysql_fetch_array($course11);
	
	$course12 = mysql_query ("SELECT * FROM course WHERE course_id = 12");
	if (!$course12)
	{
		die("Invalid query:".mysql_error());
	}
	$c12 = mysql_fetch_array($course12);
	
	$course13 = mysql_query ("SELECT * FROM course WHERE course_id = 13");
	if (!$course13)
	{
		die("Invalid query:".mysql_error());
	}
	$c13 = mysql_fetch_array($course13);
	
	$course14 = mysql_query ("SELECT * FROM course WHERE course_id = 14");
	if (!$course14)
	{
		die("Invalid query:".mysql_error());
	}
	$c14 = mysql_fetch_array($course10);
	
	$course15 = mysql_query ("SELECT * FROM course WHERE course_id = 15");
	if (!$course15)
	{
		die("Invalid query:".mysql_error());
	}
	$c15 = mysql_fetch_array($course15);
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMS</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<style>
		a {font-family:Arial}
		a:link{text-decoration:none}
		a:hover{text-decoration:none !important;font-weight:bold}
		a:visited{text-decoration:none}
		a:active{text-decoration:none}
		.calendarbox
		{position:relative;top:-10px; right:0px;height:100px;width:50px}
		
		.borderless td, .borderless th 
		{
			border: none;
			border-top: 0px;
			border-bottom:0px;
		}
		.table th, .table td 
		{
			border-top: none !important;
		}
		
		</style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<!--Body-->
<!--Header format before body-->
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
	
<!--True Body-->
 <div class="container homepage">
      <div class="row">
         <div class="col-md-3"></div>
            <div class="col-md-6 welcome-page">
				<br></br>
              <center><h1>Welcome <?php echo $_SESSION['sess_lname'] .' , '. $_SESSION['sess_fname'];?></h1></center>
            </div>
          <div class="col-md-3"></div>
        </div>
 </div>          
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
					<li><a href="student_grades.php">Grades</a></li>
					<li><a href="student_schedule.php">Schedule</a></li>
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
					<li><a href="student_profile.php">Profile</a></li>
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
					<li class="active"><a href="student_course.php">
					
					<?php 
					if (($_SESSION['sess_cid'])== "1" )
					{echo "<td>".$c1['course_name']."</td>";}
					else if (($_SESSION['sess_cid'])== "2" )
					{echo "<td>".$c2['course_name']."</td>";}
					else if (($_SESSION['sess_cid'])== "3" )
					{echo "<td>".$c3['course_name']."</td>";}
					else if (($_SESSION['sess_cid'])== "4" )
					{echo "<td>".$c4['course_name']."</td>";}
					else if (($_SESSION['sess_cid'])== "5" )
					{echo "<td>".$c5['course_name']."</td>";}
					else if (($_SESSION['sess_cid'])== "6" )
					{echo "<td>".$c6['course_name']."</td>";}
					else if (($_SESSION['sess_cid'])== "7" )
					{echo "<td>".$c7['course_name']."</td>";}
					else if (($_SESSION['sess_cid'])== "8" )
					{echo "<td>".$c8['course_name']."</td>";}
					else if (($_SESSION['sess_cid'])== "9" )
					{echo "<td>".$c9['course_name']."</td>";}
					else if (($_SESSION['sess_cid'])== "10" )
					{echo "<td>".$c10['course_name']."</td>";}
					else if (($_SESSION['sess_cid'])== "11" )
					{echo "<td>".$c11['course_name']."</td>";}
					else if (($_SESSION['sess_cid'])== "12" )
					{echo "<td>".$c12['course_name']."</td>";}
					else if (($_SESSION['sess_cid'])== "13" )
					{echo "<td>".$c13['course_name']."</td>";}
					else if (($_SESSION['sess_cid'])== "14" )
					{echo "<td>".$c14['course_name']."</td>";}
					else if (($_SESSION['sess_cid'])== "15" )
					{echo "<td>".$c15['course_name']."</td>";}
					?>
					</a></li>
					<li><a href="student_course2.php">
					<?php 
					if (($_SESSION['sess_cid2'])== "1" )
					{echo "<td>".$c1['course_name']."</td>";}
					else if (($_SESSION['sess_cid2'])== "2" )
					{echo "<td>".$c2['course_name']."</td>";}
					else if (($_SESSION['sess_cid2'])== "3" )
					{echo "<td>".$c3['course_name']."</td>";}
					else if (($_SESSION['sess_cid2'])== "4" )
					{echo "<td>".$c4['course_name']."</td>";}
					else if (($_SESSION['sess_cid2'])== "5" )
					{echo "<td>".$c5['course_name']."</td>";}
					else if (($_SESSION['sess_cid2'])== "6" )
					{echo "<td>".$c6['course_name']."</td>";}
					else if (($_SESSION['sess_cid2'])== "7" )
					{echo "<td>".$c7['course_name']."</td>";}
					else if (($_SESSION['sess_cid2'])== "8" )
					{echo "<td>".$c8['course_name']."</td>";}
					else if (($_SESSION['sess_cid2'])== "9" )
					{echo "<td>".$c9['course_name']."</td>";}
					else if (($_SESSION['sess_cid2'])== "10" )
					{echo "<td>".$c10['course_name']."</td>";}
					else if (($_SESSION['sess_cid2'])== "11" )
					{echo "<td>".$c11['course_name']."</td>";}
					else if (($_SESSION['sess_cid2'])== "12" )
					{echo "<td>".$c12['course_name']."</td>";}
					else if (($_SESSION['sess_cid2'])== "13" )
					{echo "<td>".$c13['course_name']."</td>";}
					else if (($_SESSION['sess_cid2'])== "14" )
					{echo "<td>".$c14['course_name']."</td>";}
					else if (($_SESSION['sess_cid2'])== "15" )
					{echo "<td>".$c15['course_name']."</td>";}
					?>
					</a></li>
					<li><a href="student_course3.php">
					<?php 
					if (($_SESSION['sess_cid3'])== "1" )
					{echo "<td>".$c1['course_name']."</td>";}
					else if (($_SESSION['sess_cid3'])== "2" )
					{echo "<td>".$c2['course_name']."</td>";}
					else if (($_SESSION['sess_cid3'])== "3" )
					{echo "<td>".$c3['course_name']."</td>";}
					else if (($_SESSION['sess_cid3'])== "4" )
					{echo "<td>".$c4['course_name']."</td>";}
					else if (($_SESSION['sess_cid3'])== "5" )
					{echo "<td>".$c5['course_name']."</td>";}
					else if (($_SESSION['sess_cid3'])== "6" )
					{echo "<td>".$c6['course_name']."</td>";}
					else if (($_SESSION['sess_cid3'])== "7" )
					{echo "<td>".$c7['course_name']."</td>";}
					else if (($_SESSION['sess_cid3'])== "8" )
					{echo "<td>".$c8['course_name']."</td>";}
					else if (($_SESSION['sess_cid3'])== "9" )
					{echo "<td>".$c9['course_name']."</td>";}
					else if (($_SESSION['sess_cid3'])== "10" )
					{echo "<td>".$c10['course_name']."</td>";}
					else if (($_SESSION['sess_cid3'])== "11" )
					{echo "<td>".$c11['course_name']."</td>";}
					else if (($_SESSION['sess_cid3'])== "12" )
					{echo "<td>".$c12['course_name']."</td>";}
					else if (($_SESSION['sess_cid3'])== "13" )
					{echo "<td>".$c13['course_name']."</td>";}
					else if (($_SESSION['sess_cid3'])== "14" )
					{echo "<td>".$c14['course_name']."</td>";}
					else if (($_SESSION['sess_cid3'])== "15" )
					{echo "<td>".$c15['course_name']."</td>";}
					?>
					</a></li>
					<li><a href="student_course4.php">
					<?php 
					if (($_SESSION['sess_cid4'])== "1" )
					{echo "<td>".$c1['course_name']."</td>";}
					else if (($_SESSION['sess_cid4'])== "2" )
					{echo "<td>".$c2['course_name']."</td>";}
					else if (($_SESSION['sess_cid4'])== "3" )
					{echo "<td>".$c3['course_name']."</td>";}
					else if (($_SESSION['sess_cid4'])== "4" )
					{echo "<td>".$c4['course_name']."</td>";}
					else if (($_SESSION['sess_cid4'])== "5" )
					{echo "<td>".$c5['course_name']."</td>";}
					else if (($_SESSION['sess_cid4'])== "6" )
					{echo "<td>".$c6['course_name']."</td>";}
					else if (($_SESSION['sess_cid4'])== "7" )
					{echo "<td>".$c7['course_name']."</td>";}
					else if (($_SESSION['sess_cid4'])== "8" )
					{echo "<td>".$c8['course_name']."</td>";}
					else if (($_SESSION['sess_cid4'])== "9" )
					{echo "<td>".$c9['course_name']."</td>";}
					else if (($_SESSION['sess_cid4'])== "10" )
					{echo "<td>".$c10['course_name']."</td>";}
					else if (($_SESSION['sess_cid4'])== "11" )
					{echo "<td>".$c11['course_name']."</td>";}
					else if (($_SESSION['sess_cid4'])== "12" )
					{echo "<td>".$c12['course_name']."</td>";}
					else if (($_SESSION['sess_cid4'])== "13" )
					{echo "<td>".$c13['course_name']."</td>";}
					else if (($_SESSION['sess_cid4'])== "14" )
					{echo "<td>".$c14['course_name']."</td>";}
					else if (($_SESSION['sess_cid4'])== "15" )
					{echo "<td>".$c15['course_name']."</td>";}
					?>
					</a></li>
				</ul>
			  </div>
			</div>
			</div>
			
		</div>
<!--center-->
		<div class = "col-md-6">
<!--start topic 1-->
			<div class="panel panel-info">
			<div class="panel-heading" role="tab" id="headingOne">
			  <h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				  School News
				</a>
			  </h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
			  <div class="panel-body">
				<ul>
					<li>Educate became #1 in LMS</li>
				<ul>
			  </div>
			</div>
			</div>
<!--start topic 2-->
			<div class="panel panel-info">
			<div class="panel-heading" role="tab" id="headingTwo">
			  <h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
				 Participants
				</a>
			  </h4>
			</div>
			<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			  <div class="panel-body">
			  <div class = "table-responsive">
				<table class = "table borderless table-hover">
					<tr class ="success">
						<th>
							<center>Last Name</center>
						</th>
						<th>
							<center>First Name</center>
						</th>
						<th>
							<center>Email</center>
						</th>
						<th>
							<center>Role</center>
						</th>
					</tr>
				
							<?php
								$con = mysql_connect("localhost","root","");
								if (!$con){
									die("Can not connect: " . mysql_error());
											}
									mysql_select_db("lms2",$con);
								
								$sql = "SELECT lname,fname,email,role FROM users";
								$result = mysql_query($sql,$con);
								
							
								
							
									// output data for each row
									while($row = mysql_fetch_array($result))
									{
										echo "<tr>";
										echo "<td><center>".$row['lname']."</center></td>";
										echo "<td><center>".$row['fname']."</center></td>";
										echo "<td><center>".$row['email']."</center></td>";
										echo "<td><center>".$row['role']."</center></td>";
										echo "</tr>";
									}
								mysql_close($con);
							?>
				</table>
				</div>
			  </div>
			</div>
			</div>
<!--start topic 3-->
			<div class="panel panel-info">
			<div class="panel-heading" role="tab" id="headingThree">
			  <h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
				  Events
				</a>
			  </h4>
			</div>
			<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
			  <div class="panel-body">
				<ul>
					<li>October 31,2015: Halloween Contest</li>
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
		<div class = "navbar navbar-default navbar-fixed-bottom" style = "margin-top:80px;"> 
			<div class = "container">
				<p class = "navbar-text pull-left"><span class="glyphicon glyphicon-copyright-mark"></span> Christie Phan</p>   
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
					<?php 
// Return date/time info of a timestamp; then format the output
$mydate=getdate(date("U"));
echo "<h1>"."$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]"."</h1>";
?></h4></center>
				</div>
				<div class="modal-body">
					<div class = "container">
					<iframe src="https://calendar.google.com/calendar/embed?src=7b0m37uovf0cqj5u6eoqbackpc%40group.calendar.google.com&ctz=America/Los_Angeles" style="border: 0" width="500" height="350" frameborder="0" scrolling="no"></iframe>
					</div>
				</div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			
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
					<h4 class="modal-title" id="edit">Message from Christie Phan </h4>
				</div>
				<div class="modal-body">
					<h4>how are you doing today?</h4>
					<textarea class="form-control" rows="3" Placeholder="reply message here"></textarea>
				
				</div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" date-dismiss="modal">Send</button>
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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 </body>
</html>

