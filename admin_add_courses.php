<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="admin"){
      header('Location: index.php?err=2');
    }
$con = mysql_connect("localhost","root","");
if (!$con){
die("Can not connect: " . mysql_error());
}
mysql_select_db("lms2",$con);

// lowercase is from db 
if(isset($_POST['update'])){
$UpdateQuery = "UPDATE course SET course_id='$_POST[Course_Id]',course_name='$_POST[Course_Name]', course_type='$_POST[Course_Type]',course_day='$_POST[Course_Day]',course_time='$_POST[Course_Time]',course_unit='$_POST[Course_Unit]',course_startDate='$_POST[Course_StartDate]',course_endDate='$_POST[Course_EndDate]',course_loc='$_POST[Course_Loc]',course_inst='$_POST[Course_Inst]',top1='$_POST[Top1]',top2='$_POST[Top2]',top3='$_POST[Top3]',top4='$_POST[Top4]' WHERE course_id='$_POST[hidden]'";               
mysql_query($UpdateQuery, $con);
};

if(isset($_POST['delete'])){
$DeleteQuery = "DELETE FROM course WHERE course_id='$_POST[hidden]'";          
mysql_query($DeleteQuery, $con);
};

if(isset($_POST['add'])){
$AddQuery = "INSERT INTO course (course_id,course_name,course_type,course_day,course_time,course_unit,course_startDate,course_endDate,course_loc,course_inst,top1,top2,top3,top4) VALUES ('$_POST[uid]','$_POST[ucname]','$_POST[uctype]','$_POST[ucday]','$_POST[uctime]','$_POST[ucunit]','$_POST[ucstartdate]','$_POST[ucenddate]','$_POST[ucloc]','$_POST[ucinst]','$_POST[uctop1]','$_POST[uctop2]','$_POST[uctop3]','$_POST[uctop4]')";         
mysql_query($AddQuery, $con);
};
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LMS Index</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	
	<style>
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
		  if ( $_SESSION['sess_userrole'] == "Administrator") 
			{ 
				echo "<a href = 'admin_home.php' class = 'navbar-brand'>Role:". $_SESSION['sess_role']."</a>";
			}
			else if ( $_SESSION['sess_userrole'] == "Teacher") 
			{
				echo "<a href = 'teacher_home.php' class = 'navbar-brand'>Role:". $_SESSION['sess_role']."</a>";
			}
			else if ( $_SESSION['sess_userrole'] == "Student") 
			{
				echo "<a href = 'student_home.php' class = 'navbar-brand'>Role:". $_SESSION['sess_role']."</a>";
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

<div class = "container"
	<div class ="jumbotron">
	<?php
	if ( $_SESSION['sess_userrole'] == "Administrator") 
	{
	echo "<center><h1> Modify and Add Courses</h1></center>";
	}
	else 
	{
		
	}
	?>
	</div>
</div>
<div class = "container-fluid" >
<br></br>

	  
<?php
if ( $_SESSION['sess_userrole'] == "Administrator") // open first if statement
{
echo "<div class = 'table-responsive' >
         <table class=' table borderless table-condensed table-hover'>
					<thead>
						<tr class = 'info'>
							<th align='left'>Course ID</th>
							<th align='left'>Name</th>
							<th align='left'>Type</th>
							<th align='center'>Days</th>
							<th align='center'>Time</th>
							<th align='left'>Unit</th>
							<th align='left'>Start Date</th>
							<th align='center'>End Date</th>
							<th align='left'>Location</th>
							<th align='left'>Instructor</th>
							<th align='left'></th>
							<th align='left'></th>
						</tr>
					</thead>
					<tbody>";



$sql = "SELECT * FROM course ORDER BY course_id ASC";
$myData = mysql_query($sql,$con);

while($record = mysql_fetch_array($myData)){
echo "<tr>";
	echo "<form action=admin_add_courses.php method=post>";
		echo "<div class = 'form-group'>";
			echo "<td>" . "<input class = 'form-control' type=text name=Course_Id value=" . $record['course_id'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_courses.php method=post>";
		echo "<div class = 'form-group'>";
			echo "<td>" . "<input class = 'form-control' type=text name=Course_Name value=" . $record['course_name'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_courses.php method=post>";
		echo "<div class = 'form-group'>";
			echo "<td>" . "<input class = 'form-control' type=text name=Course_Type value=" . $record['course_type'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_courses.php method=post>";
		echo "<div class = 'form-group'>";
			echo "<td>" . "<input class = 'form-control' type=text name=Course_Day value=" . $record['course_day'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_courses.php method=post>";
		echo "<div class = 'form-group'>";
			echo "<td>" . "<input class = 'form-control' type=text name=Course_Time value=" . $record['course_time'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_courses.php method=post>";
		echo "<div class = 'form-group'>";
			echo "<td>" . "<input class = 'form-control' type=text name=Course_Unit value=" . $record['course_unit'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_courses.php method=post>";
		echo "<div class = 'form-group'>";
			echo "<td>" . "<input class = 'form-control' type=date name=Course_StartDate value=" . $record['course_startDate'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_courses.php method=post>";
		echo "<div class = 'form-group'>";
			echo "<td>" . "<input class = 'form-control' type=date name=Course_EndDate value=" . $record['course_endDate'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_courses.php method=post>";
		echo "<div class = 'form-group'>";
			echo "<td>" . "<input class = 'form-control' type=text placeholder= 'Building' name=Course_Loc value=" . $record['course_loc'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_courses.php method=post>";
		echo "<div class = 'form-group'>";
			echo "<td>" . "<input class = 'form-control' type=text name=Course_Inst value=" . $record['course_inst'] . " </td>";
	echo "</div>";
	echo "<td>" . "<input class = 'btn btn-info' type=submit name=update value=update" . " </td>";
	echo "<td>" . "<input class = 'btn btn-danger' type=submit name=delete value=delete" . " </td>";
	echo "<td style ='display:none !important'>" . "<input type=hidden name=hidden value=" . $record['course_id'] . " </td>";
	echo "<form action=admin_add_courses.php method=post>";
		echo "<div class = 'form-group'>";
			echo "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=Top1 value=" . $record['top1'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_courses.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=Top2 value=" . $record['top2'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_courses.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=Top3 value=" . $record['top3'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_courses.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=Top4 value=" . $record['top4'] . " </td>";
	echo "</div>";
echo "</tr>";
echo "</form>";
}
echo "<form action=admin_add_courses.php method=post>";
echo "<tr class = 'success'>";
echo "<td ><input type=text name=uid></td>";
echo "<td><input type=text name=ucname></td>";
echo "<td><input type=text name=uctype></td>";
echo "<td><input type=text name=ucday></td>";
echo "<td><input type=text name=uctime></td>";
echo "<td><input type=text name=ucunit></td>";
echo "<td><input type=date name=ucstartdate></td>";
echo "<td><input type=date name=ucenddate></td>";
echo "<td><input type=text name=ucloc></td>";
echo "<td><input type=text name=ucinst></td>";
echo "<td>" . "<input class = 'btn btn-success' type=submit name=add value=add" . " </td>";
echo "<td style ='display:none !important'> <input type=hidden name=uctop1></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uctop2></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uctop3></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uctop4></td>";
echo "<td style ='display:none !important'> <input type=hidden name=></td>";
echo "</tr>";
echo "</form>";

echo "</tbody>";
echo "</table>";// end table
echo "</div>";//end responsive table div 


}
else 
{
	 echo "<center><h1>You are not authorized to modify the content within this page</h1></center>";
}

mysql_close($con);
?>
	
</div> <!--End container-->


	<!--Footer-->
		<div class = "navbar navbar-default navbar-fixed-bottom" style = "margin-top:80px;"> 
			<div class = "container">
				<p class = "navbar-text pull-left"><span class="glyphicon glyphicon-copyright-mark"></span> Christie Phan</p>   
				<a href = "https://www.linkedin.com/in/christiephan" class = "navbar-btn btn-primary btn pull-right">LinkedIn</a>
			</div>
		</div>
		
<!--Modal-->
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