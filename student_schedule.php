<?php 
	require 'database-config.php';
	require 'variables.php';
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(((!isset($_SESSION['sess_username']) && $role!="Student")) || (!isset($_SESSION['sess_username']) && $role!="Administrator") || (!isset($_SESSION['sess_username']) && $role!="Teacher"))
	{
      header('Location: index.php?err=2');
    }
	
// connect to db 
$con = mysql_connect("localhost","root","");
if (!$con){
die("Can not connect: " . mysql_error());
}
mysql_select_db("lms2",$con);
	
// Query out each course 
	// course 1
	
	$course1 = mysql_query ("SELECT * FROM course where course_id = 1");
	if (!$course1)
	{
		die("Invalid query:".mysql_error());
	}
	$c1 = mysql_fetch_array($course1);
	
	// course 2
	$course2 = mysql_query ("SELECT * FROM course where course_id = 2");
	if (!$course1)
	{
		die("Invalid query:".mysql_error());
	}
	$c2 = mysql_fetch_array($course2);
	
	// course 3
	$course3 = mysql_query ("SELECT * FROM course where course_id = 3");
	if (!$course1)
	{
		die("Invalid query:".mysql_error());
	}
	$c3 = mysql_fetch_array($course3);
	
	// course 4
	$course4 = mysql_query ("SELECT * FROM course where course_id = 4");
	if (!$course4)
	{
		die("Invalid query:".mysql_error());
	}
	$c4 = mysql_fetch_array($course4);
	
	//course 5
	$course5 = mysql_query ("SELECT * FROM course where course_id = 5");
	if (!$course5)
	{
		die("Invalid query:".mysql_error());
	}
	$c5 = mysql_fetch_array($course5);
	
	// course 6
	$course6 = mysql_query ("SELECT * FROM course where course_id = 6");
	if (!$course5)
	{
		die("Invalid query:".mysql_error());
	}
	$c6 = mysql_fetch_array($course6);
	
	// course 7
	$course7 = mysql_query ("SELECT * FROM course where course_id = 7");
	if (!$course7)
	{
		die("Invalid query:".mysql_error());
	}
	$c7 = mysql_fetch_array($course7);
	
	// course 8
	
	$course8 = mysql_query ("SELECT * FROM course where course_id = 8");
	if (!$course8)
	{
		die("Invalid query:".mysql_error());
	}
	$c8 = mysql_fetch_array($course8);
// course 9
	
	$course9 = mysql_query ("SELECT * FROM course where course_id = 9");
	if (!$course9)
	{
		die("Invalid query:".mysql_error());
	}
	$c9 = mysql_fetch_array($course9);

	// course 10
	
	$course10 = mysql_query ("SELECT * FROM course where course_id = 10");
	if (!$course10)
	{
		die("Invalid query:".mysql_error());
	}
	$c10 = mysql_fetch_array($course10);
	
	//course 11
	$course11 = mysql_query ("SELECT * FROM course where course_id = 11");
	if (!$course11)
	{
		die("Invalid query:".mysql_error());
	}
	$c11 = mysql_fetch_array($course11);
	
	// course 12
	$course12 = mysql_query ("SELECT * FROM course where course_id = 12");
	if (!$course12)
	{
		die("Invalid query:".mysql_error());
	}
	$c12 = mysql_fetch_array($course12);
	
	// course 13
	$course13 = mysql_query ("SELECT * FROM course where course_id = 13");
	if (!$course13)
	{
		die("Invalid query:".mysql_error());
	}
	$c13 = mysql_fetch_array($course13);
	
	// course 14
	
	$course14 = mysql_query ("SELECT * FROM course where course_id = 14");
	if (!$course14)
	{
		die("Invalid query:".mysql_error());
	}
	$c14 = mysql_fetch_array($course14);
// course 15
	
	$course15 = mysql_query ("SELECT * FROM course where course_id = 15");
	if (!$course15)
	{
		die("Invalid query:".mysql_error());
	}
	$c15 = mysql_fetch_array($course15);
	
	
	?>


<!DOCTYPE html><!--Credentials:student,teacher,admin -->
<html>
	<head>
		<title>LMS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href = "css/bootstrap.min.css" rel = "stylesheet">
		<link href = "css/styles.css" rel = "stylesheet">
		
	</head>
	<body>
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
	
<!--Body-->
<?php 

if ( $_SESSION['sess_userrole'] == "Student")// open 1st if statement
{

echo "<div class= 'container'>";
echo "<div class= 'jumbotron'><h1>Schedule: $Sem </h1></div>";
echo "<div class='table-responsive'>";
echo "<table class='table'>";
	echo "<tr>
		<td class='success'>
			<div><strong> COURSE NAME</strong> </div>
		</td>
		<td class='success'>
			<div><strong> TYPES</strong> </div>
		</td>
		<td class='success'>
			<div><strong> DAYS</strong></div>
		</td>
		<td class='success'>
			<div><strong> TIME</strong></div>
		</td>
		<td class='success'>
			<div><strong> UNITS</strong></div>
		</td>
		<td class='success'>
			<div><strong> Start Date</strong></div>
		</td>
		<td class='success'>
			<div><strong> End Date</strong></div>
		</td>
		<td class='success'>
			<div><strong> LOC</strong></div>
		</td>
		<td class='success'>
			<div><strong> INST</strong></div> 
		</td>
	</tr>";

echo "<tr>";
// course 1
	if (($_SESSION['sess_cid'])== "1" )
	{
		 echo "<td>".$c1['course_name']."</td>".
		"<td>".$c1['course_type']."</td>".
		"<td>".$c1['course_day']."</td>".
		"<td>".$c1['course_time']."</td>".
		"<td>".$c1['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c1['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c1['course_endDate']))."</td>".
		"<td>".$c1['course_loc']."</td>".
		"<td>".$c1['course_inst']."</td>";

	}
	else if (($_SESSION['sess_cid'])== "2" )
	{
		echo "<td>".$c2['course_name']."</td>".
		"<td>".$c2['course_type']."</td>".
		"<td>".$c2['course_day']."</td>".
		"<td>".$c2['course_time']."</td>".
		"<td>".$c2['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c2['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c2['course_endDate']))."</td>".
		"<td>".$c2['course_loc']."</td>".
		"<td>".$c2['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid'])== "3" )
	{
		echo "<td>".$c3['course_name']."</td>".
		"<td>".$c3['course_type']."</td>".
		"<td>".$c3['course_day']."</td>".
		"<td>".$c3['course_time']."</td>".
		"<td>".$c3['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c3['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c3['course_endDate']))."</td>".
		"<td>".$c3['course_loc']."</td>".
		"<td>".$c3['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid'])== "4" )
	{
		echo "<td>".$c4['course_name']."</td>".
		"<td>".$c4['course_type']."</td>".
		"<td>".$c4['course_day']."</td>".
		"<td>".$c4['course_time']."</td>".
		"<td>".$c4['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c4['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c4['course_endDate']))."</td>".
		"<td>".$c4['course_loc']."</td>".
		"<td>".$c4['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid'])== "5" )
	{
		echo "<td>".$c5['course_name']."</td>".
		"<td>".$c5['course_type']."</td>".
		"<td>".$c5['course_day']."</td>".
		"<td>".$c5['course_time']."</td>".
		"<td>".$c5['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c5['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c5['course_endDate']))."</td>".
		"<td>".$c5['course_loc']."</td>".
		"<td>".$c5['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid'])== "6" )
	{
		echo "<td>".$c6['course_name']."</td>".
		"<td>".$c6['course_type']."</td>".
		"<td>".$c6['course_day']."</td>".
		"<td>".$c6['course_time']."</td>".
		"<td>".$c6['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c6['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c6['course_endDate']))."</td>".
		"<td>".$c5['course_loc']."</td>".
		"<td>".$c5['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid'])== "7" )
	{
		echo "<td>".$c7['course_name']."</td>".
		"<td>".$c7['course_type']."</td>".
		"<td>".$c7['course_day']."</td>".
		"<td>".$c7['course_time']."</td>".
		"<td>".$c7['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c7['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c7['course_endDate']))."</td>".
		"<td>".$c7['course_loc']."</td>".
		"<td>".$c7['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid'])== "8" )
	{
		echo "<td>".$c8['course_name']."</td>".
		"<td>".$c8['course_type']."</td>".
		"<td>".$c8['course_day']."</td>".
		"<td>".$c8['course_time']."</td>".
		"<td>".$c8['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c8['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c8['course_endDate']))."</td>".
		"<td>".$c8['course_loc']."</td>".
		"<td>".$c8['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid'])== "9" )
	{
		echo "<td>".$c9['course_name']."</td>".
		"<td>".$c9['course_type']."</td>".
		"<td>".$c9['course_day']."</td>".
		"<td>".$c9['course_time']."</td>".
		"<td>".$c9['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c9['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c9['course_endDate']))."</td>".
		"<td>".$c9['course_loc']."</td>".
		"<td>".$c9['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid'])== "10" )
	{
		echo "<td>".$c10['course_name']."</td>".
		"<td>".$c10['course_type']."</td>".
		"<td>".$c10['course_day']."</td>".
		"<td>".$c10['course_time']."</td>".
		"<td>".$c10['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c10['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c10['course_endDate']))."</td>".
		"<td>".$c10['course_loc']."</td>".
		"<td>".$c10['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid'])== "11" )
	{
		echo "<td>".$c11['course_name']."</td>".
		"<td>".$c11['course_type']."</td>".
		"<td>".$c11['course_day']."</td>".
		"<td>".$c11['course_time']."</td>".
		"<td>".$c11['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c11['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c11['course_endDate']))."</td>".
		"<td>".$c11['course_loc']."</td>".
		"<td>".$c11['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid'])== "12" )
	{
		echo "<td>".$c12['course_name']."</td>".
		"<td>".$c12['course_type']."</td>".
		"<td>".$c12['course_day']."</td>".
		"<td>".$c12['course_time']."</td>".
		"<td>".$c12['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c12['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c12['course_endDate']))."</td>".
		"<td>".$c12['course_loc']."</td>".
		"<td>".$c12['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid'])== "13" )
	{
		echo "<td>".$c13['course_name']."</td>".
		"<td>".$c13['course_type']."</td>".
		"<td>".$c13['course_day']."</td>".
		"<td>".$c13['course_time']."</td>".
		"<td>".$c13['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c13['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c13['course_endDate']))."</td>".
		"<td>".$c13['course_loc']."</td>".
		"<td>".$c13['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid'])== "14" )
	{
		echo "<td>".$c14['course_name']."</td>".
		"<td>".$c14['course_type']."</td>".
		"<td>".$c14['course_day']."</td>".
		"<td>".$c14['course_time']."</td>".
		"<td>".$c14['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c14['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c14['course_endDate']))."</td>".
		"<td>".$c14['course_loc']."</td>".
		"<td>".$c14['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid'])== "15" )
	{
		echo "<td>".$c15['course_name']."</td>".
		"<td>".$c15['course_type']."</td>".
		"<td>".$c15['course_day']."</td>".
		"<td>".$c15['course_time']."</td>".
		"<td>".$c15['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c15['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c15['course_endDate']))."</td>".
		"<td>".$c15['course_loc']."</td>".
		"<td>".$c15['course_inst']."</td>";
	}
	
	else 
	{
		echo "You are currently not enrolled in any courses";
	}

		
		
echo "</tr>";
//Course 2

	if (($_SESSION['sess_cid2'])== "1" )
	{
		 echo "<td>".$c1['course_name']."</td>".
		"<td>".$c1['course_type']."</td>".
		"<td>".$c1['course_day']."</td>".
		"<td>".$c1['course_time']."</td>".
		"<td>".$c1['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c1['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c1['course_endDate']))."</td>".
		"<td>".$c1['course_loc']."</td>".
		"<td>".$c1['course_inst']."</td>";

	}
	else if (($_SESSION['sess_cid2'])== "2" )
	{
		echo "<td>".$c2['course_name']."</td>".
		"<td>".$c2['course_type']."</td>".
		"<td>".$c2['course_day']."</td>".
		"<td>".$c2['course_time']."</td>".
		"<td>".$c2['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c2['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c2['course_endDate']))."</td>".
		"<td>".$c2['course_loc']."</td>".
		"<td>".$c2['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid2'])== "3" )
	{
		echo "<td>".$c3['course_name']."</td>".
		"<td>".$c3['course_type']."</td>".
		"<td>".$c3['course_day']."</td>".
		"<td>".$c3['course_time']."</td>".
		"<td>".$c3['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c3['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c3['course_endDate']))."</td>".
		"<td>".$c3['course_loc']."</td>".
		"<td>".$c3['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid2'])== "4" )
	{
		echo "<td>".$c4['course_name']."</td>".
		"<td>".$c4['course_type']."</td>".
		"<td>".$c4['course_day']."</td>".
		"<td>".$c4['course_time']."</td>".
		"<td>".$c4['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c4['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c4['course_endDate']))."</td>".
		"<td>".$c4['course_loc']."</td>".
		"<td>".$c4['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid2'])== "5" )
	{
		echo "<td>".$c5['course_name']."</td>".
		"<td>".$c5['course_type']."</td>".
		"<td>".$c5['course_day']."</td>".
		"<td>".$c5['course_time']."</td>".
		"<td>".$c5['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c5['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c5['course_endDate']))."</td>".
		"<td>".$c5['course_loc']."</td>".
		"<td>".$c5['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid2'])== "6" )
	{
		echo "<td>".$c6['course_name']."</td>".
		"<td>".$c6['course_type']."</td>".
		"<td>".$c6['course_day']."</td>".
		"<td>".$c6['course_time']."</td>".
		"<td>".$c6['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c6['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c6['course_endDate']))."</td>".
		"<td>".$c5['course_loc']."</td>".
		"<td>".$c5['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid2'])== "7" )
	{
		echo "<td>".$c7['course_name']."</td>".
		"<td>".$c7['course_type']."</td>".
		"<td>".$c7['course_day']."</td>".
		"<td>".$c7['course_time']."</td>".
		"<td>".$c7['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c7['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c7['course_endDate']))."</td>".
		"<td>".$c7['course_loc']."</td>".
		"<td>".$c7['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid2'])== "8" )
	{
		echo "<td>".$c8['course_name']."</td>".
		"<td>".$c8['course_type']."</td>".
		"<td>".$c8['course_day']."</td>".
		"<td>".$c8['course_time']."</td>".
		"<td>".$c8['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c8['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c8['course_endDate']))."</td>".
		"<td>".$c8['course_loc']."</td>".
		"<td>".$c8['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid2'])== "9" )
	{
		echo "<td>".$c9['course_name']."</td>".
		"<td>".$c9['course_type']."</td>".
		"<td>".$c9['course_day']."</td>".
		"<td>".$c9['course_time']."</td>".
		"<td>".$c9['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c9['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c9['course_endDate']))."</td>".
		"<td>".$c9['course_loc']."</td>".
		"<td>".$c9['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid2'])== "10" )
	{
		echo "<td>".$c10['course_name']."</td>".
		"<td>".$c10['course_type']."</td>".
		"<td>".$c10['course_day']."</td>".
		"<td>".$c10['course_time']."</td>".
		"<td>".$c10['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c10['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c10['course_endDate']))."</td>".
		"<td>".$c10['course_loc']."</td>".
		"<td>".$c10['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid2'])== "11" )
	{
		echo "<td>".$c11['course_name']."</td>".
		"<td>".$c11['course_type']."</td>".
		"<td>".$c11['course_day']."</td>".
		"<td>".$c11['course_time']."</td>".
		"<td>".$c11['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c11['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c11['course_endDate']))."</td>".
		"<td>".$c11['course_loc']."</td>".
		"<td>".$c11['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid2'])== "12" )
	{
		echo "<td>".$c12['course_name']."</td>".
		"<td>".$c12['course_type']."</td>".
		"<td>".$c12['course_day']."</td>".
		"<td>".$c12['course_time']."</td>".
		"<td>".$c12['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c12['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c12['course_endDate']))."</td>".
		"<td>".$c12['course_loc']."</td>".
		"<td>".$c12['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid2'])== "13" )
	{
		echo "<td>".$c13['course_name']."</td>".
		"<td>".$c13['course_type']."</td>".
		"<td>".$c13['course_day']."</td>".
		"<td>".$c13['course_time']."</td>".
		"<td>".$c13['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c13['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c13['course_endDate']))."</td>".
		"<td>".$c13['course_loc']."</td>".
		"<td>".$c13['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid2'])== "14" )
	{
		echo "<td>".$c14['course_name']."</td>".
		"<td>".$c14['course_type']."</td>".
		"<td>".$c14['course_day']."</td>".
		"<td>".$c14['course_time']."</td>".
		"<td>".$c14['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c14['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c14['course_endDate']))."</td>".
		"<td>".$c14['course_loc']."</td>".
		"<td>".$c14['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid2'])== "15" )
	{
		echo "<td>".$c15['course_name']."</td>".
		"<td>".$c15['course_type']."</td>".
		"<td>".$c15['course_day']."</td>".
		"<td>".$c15['course_time']."</td>".
		"<td>".$c15['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c15['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c15['course_endDate']))."</td>".
		"<td>".$c15['course_loc']."</td>".
		"<td>".$c15['course_inst']."</td>";
	}
	else 
	{
		echo "You are currently not enrolled in any courses";
	}
	
	
echo "<tr>";

// course 3
	if (($_SESSION['sess_cid3'])== "1" )
	{
		 echo "<td>".$c1['course_name']."</td>".
		"<td>".$c1['course_type']."</td>".
		"<td>".$c1['course_day']."</td>".
		"<td>".$c1['course_time']."</td>".
		"<td>".$c1['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c1['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c1['course_endDate']))."</td>".
		"<td>".$c1['course_loc']."</td>".
		"<td>".$c1['course_inst']."</td>";

	}
	else if (($_SESSION['sess_cid3'])== "2" )
	{
		echo "<td>".$c2['course_name']."</td>".
		"<td>".$c2['course_type']."</td>".
		"<td>".$c2['course_day']."</td>".
		"<td>".$c2['course_time']."</td>".
		"<td>".$c2['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c2['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c2['course_endDate']))."</td>".
		"<td>".$c2['course_loc']."</td>".
		"<td>".$c2['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid3'])== "3" )
	{
		echo "<td>".$c3['course_name']."</td>".
		"<td>".$c3['course_type']."</td>".
		"<td>".$c3['course_day']."</td>".
		"<td>".$c3['course_time']."</td>".
		"<td>".$c3['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c3['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c3['course_endDate']))."</td>".
		"<td>".$c3['course_loc']."</td>".
		"<td>".$c3['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid3'])== "4" )
	{
		echo "<td>".$c4['course_name']."</td>".
		"<td>".$c4['course_type']."</td>".
		"<td>".$c4['course_day']."</td>".
		"<td>".$c4['course_time']."</td>".
		"<td>".$c4['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c4['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c4['course_endDate']))."</td>".
		"<td>".$c4['course_loc']."</td>".
		"<td>".$c4['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid3'])== "5" )
	{
		echo "<td>".$c5['course_name']."</td>".
		"<td>".$c5['course_type']."</td>".
		"<td>".$c5['course_day']."</td>".
		"<td>".$c5['course_time']."</td>".
		"<td>".$c5['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c5['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c5['course_endDate']))."</td>".
		"<td>".$c5['course_loc']."</td>".
		"<td>".$c5['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid3'])== "6" )
	{
		echo "<td>".$c6['course_name']."</td>".
		"<td>".$c6['course_type']."</td>".
		"<td>".$c6['course_day']."</td>".
		"<td>".$c6['course_time']."</td>".
		"<td>".$c6['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c6['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c6['course_endDate']))."</td>".
		"<td>".$c5['course_loc']."</td>".
		"<td>".$c5['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid3'])== "7" )
	{
		echo "<td>".$c7['course_name']."</td>".
		"<td>".$c7['course_type']."</td>".
		"<td>".$c7['course_day']."</td>".
		"<td>".$c7['course_time']."</td>".
		"<td>".$c7['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c7['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c7['course_endDate']))."</td>".
		"<td>".$c7['course_loc']."</td>".
		"<td>".$c7['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid3'])== "8" )
	{
		echo "<td>".$c8['course_name']."</td>".
		"<td>".$c8['course_type']."</td>".
		"<td>".$c8['course_day']."</td>".
		"<td>".$c8['course_time']."</td>".
		"<td>".$c8['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c8['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c8['course_endDate']))."</td>".
		"<td>".$c8['course_loc']."</td>".
		"<td>".$c8['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid3'])== "9" )
	{
		echo "<td>".$c9['course_name']."</td>".
		"<td>".$c9['course_type']."</td>".
		"<td>".$c9['course_day']."</td>".
		"<td>".$c9['course_time']."</td>".
		"<td>".$c9['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c9['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c9['course_endDate']))."</td>".
		"<td>".$c9['course_loc']."</td>".
		"<td>".$c9['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid3'])== "10" )
	{
		echo "<td>".$c10['course_name']."</td>".
		"<td>".$c10['course_type']."</td>".
		"<td>".$c10['course_day']."</td>".
		"<td>".$c10['course_time']."</td>".
		"<td>".$c10['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c10['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c10['course_endDate']))."</td>".
		"<td>".$c10['course_loc']."</td>".
		"<td>".$c10['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid3'])== "11" )
	{
		echo "<td>".$c11['course_name']."</td>".
		"<td>".$c11['course_type']."</td>".
		"<td>".$c11['course_day']."</td>".
		"<td>".$c11['course_time']."</td>".
		"<td>".$c11['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c11['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c11['course_endDate']))."</td>".
		"<td>".$c11['course_loc']."</td>".
		"<td>".$c11['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid3'])== "12" )
	{
		echo "<td>".$c12['course_name']."</td>".
		"<td>".$c12['course_type']."</td>".
		"<td>".$c12['course_day']."</td>".
		"<td>".$c12['course_time']."</td>".
		"<td>".$c12['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c12['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c12['course_endDate']))."</td>".
		"<td>".$c12['course_loc']."</td>".
		"<td>".$c12['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid3'])== "13" )
	{
		echo "<td>".$c13['course_name']."</td>".
		"<td>".$c13['course_type']."</td>".
		"<td>".$c13['course_day']."</td>".
		"<td>".$c13['course_time']."</td>".
		"<td>".$c13['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c13['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c13['course_endDate']))."</td>".
		"<td>".$c13['course_loc']."</td>".
		"<td>".$c13['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid3'])== "14" )
	{
		echo "<td>".$c14['course_name']."</td>".
		"<td>".$c14['course_type']."</td>".
		"<td>".$c14['course_day']."</td>".
		"<td>".$c14['course_time']."</td>".
		"<td>".$c14['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c14['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c14['course_endDate']))."</td>".
		"<td>".$c14['course_loc']."</td>".
		"<td>".$c14['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid3'])== "15" )
	{
		echo "<td>".$c15['course_name']."</td>".
		"<td>".$c15['course_type']."</td>".
		"<td>".$c15['course_day']."</td>".
		"<td>".$c15['course_time']."</td>".
		"<td>".$c15['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c15['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c15['course_endDate']))."</td>".
		"<td>".$c15['course_loc']."</td>".
		"<td>".$c15['course_inst']."</td>";
	}
	
	else 
	{
		echo "You are currently not enrolled in any courses";
	}
		
echo "</tr>";
// course 4
echo "<tr>";
	if (($_SESSION['sess_cid4'])== "1" )
	{
		 echo "<td>".$c1['course_name']."</td>".
		"<td>".$c1['course_type']."</td>".
		"<td>".$c1['course_day']."</td>".
		"<td>".$c1['course_time']."</td>".
		"<td>".$c1['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c1['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c1['course_endDate']))."</td>".
		"<td>".$c1['course_loc']."</td>".
		"<td>".$c1['course_inst']."</td>";

	}
	else if (($_SESSION['sess_cid4'])== "2" )
	{
		echo "<td>".$c2['course_name']."</td>".
		"<td>".$c2['course_type']."</td>".
		"<td>".$c2['course_day']."</td>".
		"<td>".$c2['course_time']."</td>".
		"<td>".$c2['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c2['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c2['course_endDate']))."</td>".
		"<td>".$c2['course_loc']."</td>".
		"<td>".$c2['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid4'])== "3" )
	{
		echo "<td>".$c3['course_name']."</td>".
		"<td>".$c3['course_type']."</td>".
		"<td>".$c3['course_day']."</td>".
		"<td>".$c3['course_time']."</td>".
		"<td>".$c3['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c3['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c3['course_endDate']))."</td>".
		"<td>".$c3['course_loc']."</td>".
		"<td>".$c3['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid4'])== "4" )
	{
		echo "<td>".$c4['course_name']."</td>".
		"<td>".$c4['course_type']."</td>".
		"<td>".$c4['course_day']."</td>".
		"<td>".$c4['course_time']."</td>".
		"<td>".$c4['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c4['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c4['course_endDate']))."</td>".
		"<td>".$c4['course_loc']."</td>".
		"<td>".$c4['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid4'])== "5" )
	{
		echo "<td>".$c5['course_name']."</td>".
		"<td>".$c5['course_type']."</td>".
		"<td>".$c5['course_day']."</td>".
		"<td>".$c5['course_time']."</td>".
		"<td>".$c5['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c5['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c5['course_endDate']))."</td>".
		"<td>".$c5['course_loc']."</td>".
		"<td>".$c5['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid4'])== "6" )
	{
		echo "<td>".$c6['course_name']."</td>".
		"<td>".$c6['course_type']."</td>".
		"<td>".$c6['course_day']."</td>".
		"<td>".$c6['course_time']."</td>".
		"<td>".$c6['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c6['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c6['course_endDate']))."</td>".
		"<td>".$c5['course_loc']."</td>".
		"<td>".$c5['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid4'])== "7" )
	{
		echo "<td>".$c7['course_name']."</td>".
		"<td>".$c7['course_type']."</td>".
		"<td>".$c7['course_day']."</td>".
		"<td>".$c7['course_time']."</td>".
		"<td>".$c7['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c7['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c7['course_endDate']))."</td>".
		"<td>".$c7['course_loc']."</td>".
		"<td>".$c7['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid4'])== "8" )
	{
		echo "<td>".$c8['course_name']."</td>".
		"<td>".$c8['course_type']."</td>".
		"<td>".$c8['course_day']."</td>".
		"<td>".$c8['course_time']."</td>".
		"<td>".$c8['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c8['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c8['course_endDate']))."</td>".
		"<td>".$c8['course_loc']."</td>".
		"<td>".$c8['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid4'])== "9" )
	{
		echo "<td>".$c9['course_name']."</td>".
		"<td>".$c9['course_type']."</td>".
		"<td>".$c9['course_day']."</td>".
		"<td>".$c9['course_time']."</td>".
		"<td>".$c9['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c9['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c9['course_endDate']))."</td>".
		"<td>".$c9['course_loc']."</td>".
		"<td>".$c9['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid4'])== "10" )
	{
		echo "<td>".$c10['course_name']."</td>".
		"<td>".$c10['course_type']."</td>".
		"<td>".$c10['course_day']."</td>".
		"<td>".$c10['course_time']."</td>".
		"<td>".$c10['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c10['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c10['course_endDate']))."</td>".
		"<td>".$c10['course_loc']."</td>".
		"<td>".$c10['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid4'])== "10" )
	{
		echo "<td>".$c10['course_name']."</td>".
		"<td>".$c10['course_type']."</td>".
		"<td>".$c10['course_day']."</td>".
		"<td>".$c10['course_time']."</td>".
		"<td>".$c10['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c10['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c10['course_endDate']))."</td>".
		"<td>".$c10['course_loc']."</td>".
		"<td>".$c10['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid4'])== "11" )
	{
		echo "<td>".$c11['course_name']."</td>".
		"<td>".$c11['course_type']."</td>".
		"<td>".$c11['course_day']."</td>".
		"<td>".$c11['course_time']."</td>".
		"<td>".$c11['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c11['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c11['course_endDate']))."</td>".
		"<td>".$c11['course_loc']."</td>".
		"<td>".$c11['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid4'])== "12" )
	{
		echo "<td>".$c12['course_name']."</td>".
		"<td>".$c12['course_type']."</td>".
		"<td>".$c12['course_day']."</td>".
		"<td>".$c12['course_time']."</td>".
		"<td>".$c12['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c12['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c12['course_endDate']))."</td>".
		"<td>".$c12['course_loc']."</td>".
		"<td>".$c12['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid4'])== "13" )
	{
		echo "<td>".$c13['course_name']."</td>".
		"<td>".$c13['course_type']."</td>".
		"<td>".$c13['course_day']."</td>".
		"<td>".$c13['course_time']."</td>".
		"<td>".$c13['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c13['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c13['course_endDate']))."</td>".
		"<td>".$c13['course_loc']."</td>".
		"<td>".$c13['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid4'])== "14" )
	{
		echo "<td>".$c14['course_name']."</td>".
		"<td>".$c14['course_type']."</td>".
		"<td>".$c14['course_day']."</td>".
		"<td>".$c14['course_time']."</td>".
		"<td>".$c14['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c14['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c14['course_endDate']))."</td>".
		"<td>".$c14['course_loc']."</td>".
		"<td>".$c14['course_inst']."</td>";
	}
	else if (($_SESSION['sess_cid4'])== "15" )
	{
		echo "<td>".$c15['course_name']."</td>".
		"<td>".$c15['course_type']."</td>".
		"<td>".$c15['course_day']."</td>".
		"<td>".$c15['course_time']."</td>".
		"<td>".$c15['course_unit']."</td>".
		"<td>".DATE('M d Y',strtotime($c15['course_startDate']))."</td>".
		"<td>".DATE('M d Y',strtotime($c15['course_endDate']))."</td>".
		"<td>".$c15['course_loc']."</td>".
		"<td>".$c15['course_inst']."</td>";
	}
	else 
	{
		echo "You are currently not enrolled in any courses";
	}
echo "	
	</tr>
  </table>
</div>";
echo "</div>"; // close container

} // end if statement 
else 
{	
echo " You cannot modify this page ";
}

?>

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