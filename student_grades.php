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
	
<!--Body-->
<div class= "container">
<div class= "jumbotron"><h1><center>Grades: <?php echo $Sem ?></center></h1></div>
<div class="table-responsive">
  <table class="table">
  
	
	<!--course1-->

	
	<?php
 if ( $_SESSION['sess_userrole'] == "Student")// open 1st if statement
 {
	echo "<tr>
		<td class='success'>
			<div><strong> Course </strong> </div>
		</td>
		<td class='success'>
			<div><strong> Homework</strong> </div>
		</td>
		<td class='success'>
			<div><strong> Exam</strong></div>
		</td>
		<td class='success'>
			<div><strong> Project</strong></div>
		</td>
		<td class='success'>
			<div><strong> Participation</strong></div>
		</td>
		<td class='success'>
			<div><strong> Final Exam</strong></div>
		</td>
	</tr>
	<tr>";
	
	if (($_SESSION['sess_cid']) == 1)
	{
		echo "<td>".$c1['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c1hw']. "%"."</td>";
		echo "<td>".$_SESSION['sess_c1exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1final']."%"."</td>";
		
	}
	else if (($_SESSION['sess_cid']) == 2 )
	{
		echo "<td>".$c2['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c1hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1final']."%"."</td>";
		
	}
	else if (($_SESSION['sess_cid']) == 3)
	{
		echo "<td>".$c3['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c1hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1final']."%"."</td>";
	}
		else if (($_SESSION['sess_cid']) == 4)
	{
		echo "<td>".$c4['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c1hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1final']."%"."</td>";
	}	
		else if (($_SESSION['sess_cid']) == 5)
	{
		echo "<td>".$c5['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c1hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1final']."%"."</td>";
	}
		else if (($_SESSION['sess_cid']) == 6)
	{
		echo "<td>".$c6['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c1hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1final']."%"."</td>";
	}
		else if (($_SESSION['sess_cid']) == 7)
	{
		echo "<td>".$c7['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c1hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1final']."%"."</td>";
		echo"<td>";
		echo "<td>"."</td>";
	}
		else if (($_SESSION['sess_cid']) == 8)
	{
		echo "<td>".$c8['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c1hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1final']."%"."</td>";
	}
		else if (($_SESSION['sess_cid']) == 9)
	{
		echo "<td>".$c9['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c1hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1final']."%"."</td>";
		echo"<td>";
		echo "<td>"."</td>";
	}
		else if (($_SESSION['sess_cid']) == 10)
	{
		echo "<td>".$c10['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c1hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c1final']."%"."</td>";
	}
	else
	{
		echo "not working";
	}
	
	echo "</tr>";
	
	//course2
	echo "<tr>";

	
	if (($_SESSION['sess_cid2']) == 1)
	{
		echo "<td>".$c1['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c2hw']. "%"."</td>";
		echo "<td>".$_SESSION['sess_c2exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2final']."%"."</td>";
	
		
	}
	else if (($_SESSION['sess_cid2']) == 2 )
	{
		echo "<td>".$c2['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c2hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2final']."%"."</td>";
		
	}
	else if (($_SESSION['sess_cid2']) == 3)
	{
		echo "<td>".$c3['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c2hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2final']."%"."</td>";
	}
		else if (($_SESSION['sess_cid2']) == 4)
	{
		echo "<td>".$c4['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c2hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2final']."%"."</td>";

	}	
		else if (($_SESSION['sess_cid2']) == 5)
	{
		echo "<td>".$c5['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c2hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2final']."%"."</td>";
	}
		else if (($_SESSION['sess_cid2']) == 6)
	{
		echo "<td>".$c6['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c2hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2final']."%"."</td>";
	}
		else if (($_SESSION['sess_cid2']) == 7)
	{
		echo "<td>".$c7['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c2hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2final']."%"."</td>";
	}
		else if (($_SESSION['sess_cid2']) == 8)
	{
		echo "<td>".$c8['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c2hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2final']."%"."</td>";
	}
		else if (($_SESSION['sess_cid2']) == 9)
	{
		echo "<td>".$c9['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c2hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2final']."%"."</td>";
	}
		else if (($_SESSION['sess_cid2']) == 10)
	{
		echo "<td>".$c10['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c2hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c2final']."%"."</td>";
	}
	else
	{
		echo "not working";
	}
	
	
	echo "</tr>";
	
	//Course 3
	echo "<tr>";
	if (($_SESSION['sess_cid3']) == 1)
	{
		echo "<td>".$c1['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c3hw']. "%"."</td>";
		echo "<td>".$_SESSION['sess_c3exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3final']."%"."</td>";
		
	}
	else if (($_SESSION['sess_cid3']) == 2 )
	{
		echo "<td>".$c2['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c3hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3final']."%"."</td>";
		
	}
	else if (($_SESSION['sess_cid3']) == 3)
	{
		echo "<td>".$c3['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c3hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3final']."%"."</td>";
	}
		else if (($_SESSION['sess_cid3']) == 4)
	{
		echo "<td>".$c4['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c3hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3final']."%"."</td>";
	}	
		else if (($_SESSION['sess_cid3']) == 5)
	{
		echo "<td>".$c5['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c3hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3final']."%"."</td>";
	}
		else if (($_SESSION['sess_cid3']) == 6)
	{
		echo "<td>".$c6['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c3hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3final']."%"."</td>";
	}
		else if (($_SESSION['sess_cid3']) == 7)
	{
		echo "<td>".$c7['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c3hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3final']."%"."</td>";
	}
		else if (($_SESSION['sess_cid3']) == 8)
	{
		echo "<td>".$c8['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c3hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3final']."%"."</td>";
	}
		else if (($_SESSION['sess_cid3']) == 9)
	{
		echo "<td>".$c9['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c3hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3final']."%"."</td>";
	}
		else if (($_SESSION['sess_cid3']) == 10)
	{
		echo "<td>".$c10['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c3hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c3final']."%"."</td>";
	}
	else
	{
		echo "not working";
	}
	

echo "</tr>";
// Course 4-->
echo "<tr>";
	
	if (($_SESSION['sess_cid4']) == 1)
	{
		echo "<td>".$c1['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c4hw']. "%"."</td>";
		echo "<td>".$_SESSION['sess_c4exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4final']."%"."</td>";
		
	}
	else if (($_SESSION['sess_cid4']) == 2 )
	{
		echo "<td>".$c2['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c4hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4final']."%"."</td>";
		
	}
	else if (($_SESSION['sess_cid4']) == 3)
	{
		echo "<td>".$c3['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c4hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4final']."%"."</td>";
	}
		else if (($_SESSION['sess_cid4']) == 4)
	{
		echo "<td>".$c4['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c4hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4final']."%"."</td>";
	}	
		else if (($_SESSION['sess_cid4']) == 5)
	{
		echo "<td>".$c5['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c4hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4final']."%"."</td>";
	}
		else if (($_SESSION['sess_cid4']) == 6)
	{
		echo "<td>".$c6['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c4hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4final']."%"."</td>";
	}
		else if (($_SESSION['sess_cid4']) == 7)
	{
		echo "<td>".$c7['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c4hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4final']."%"."</td>";
	}
		else if (($_SESSION['sess_cid4']) == 8)
	{
		echo "<td>".$c8['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c4hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4final']."%"."</td>";
	}
		else if (($_SESSION['sess_cid4']) == 9)
	{
		echo "<td>".$c9['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c4hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4final']."%"."</td>";
	}
		else if (($_SESSION['sess_cid4']) == 10)
	{
		echo "<td>".$c10['course_name']."</td>";
		echo "<td>".$_SESSION['sess_c4hw']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4exam']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4proj']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4part']."%"."</td>";
		echo "<td>".$_SESSION['sess_c4final']."%"."</td>";
	}
	else
	{
		echo "not working";
	}
 }
 else 
 {
	 echo "<h1><center>This page is for students only. You are not authorized to view this page. </center></h1> ";
 }
	?>
  </table>
</div>
</div><!--end container-->

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