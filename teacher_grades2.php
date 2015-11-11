<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="admin"){
      header('Location: index.php?err=2');
    }
	// set include path
	
	$path = 'C:/xampp/htdocs/Project/courses/';
	set_include_path(get_include_path().PATH_SEPARATOR.$path);
	
$con = mysql_connect("localhost","root","");
if (!$con){
die("Can not connect: " . mysql_error());
}
mysql_select_db("lms2",$con);

// lowercase is from db 
if(isset($_POST['update'])){
	$UpdateQuery = "UPDATE users SET id='$_POST[id]',fname='$_POST[FName]',lname='$_POST[LName]',email='$_POST[Email]',username='$_POST[Username]',password='$_POST[Password]',role='$_POST[Role]',city='$_POST[City]',state='$_POST[State]',degree='$_POST[Degree]',cid='$_POST[Cid]',cid2='$_POST[Cid2]',cid3='$_POST[Cid3]',cid4='$_POST[Cid4]',c1hw='$_POST[C1hw]',c1exam='$_POST[C1exam]',c1proj='$_POST[C1proj]',c1part='$_POST[C1part]',c1final='$_POST[C1final]',c1letter='$_POST[C1letter]',c2hw='$_POST[C2hw]',c2exam='$_POST[C2exam]',c2proj='$_POST[C2proj]',c2part='$_POST[C2part]',c2final='$_POST[C2final]',c2letter='$_POST[C2letter]',c3hw='$_POST[C3hw]',c3exam='$_POST[C3exam]',c3proj='$_POST[C3proj]',c3part='$_POST[C3part]',c3final='$_POST[C3final]',c3letter='$_POST[C3letter]',c4hw='$_POST[C4hw]',c4exam='$_POST[C4exam]',c4proj='$_POST[C4proj]',c4part='$_POST[C4part]',c4final='$_POST[C4final]',c4letter='$_POST[C4letter]' WHERE id='$_POST[hidden]'";               
mysql_query($UpdateQuery, $con);
};

if(isset($_POST['delete'])){
$DeleteQuery = "DELETE FROM users WHERE id='$_POST[hidden]'";          
mysql_query($DeleteQuery, $con);
};

if(isset($_POST['add_users'])){
$add_usersQuery = "INSERT INTO users (id,fname,lname,email,username,password,role,city,state,degree,cid,cid2,cid3,cid4,c1hw,c1exam,c1proj,c1part,c1final,c1letter,c2hw,c2exam,c2proj,c2part,c2final,c2letter,c3hw,c3exam,c3proj,c3part,c3final,c3letter,c4hw,c4exam,c4proj,c4part,c4final,c4letter) 
	VALUES ('$_POST[uid]','$_POST[ufname]','$_POST[ulname]','$_POST[uemail]','$_POST[uusername]','$_POST[upassword]','$_POST[urole]','$_POST[ucity]','$_POST[ustate]','$_POST[udegree]','$_POST[ucid]','$_POST[ucid2]','$_POST[ucid3]','$_POST[ucid4]','$_POST[uc1hw]','$_POST[uc1exam]','$_POST[uc1proj]','$_POST[uc1part]','$_POST[uc1final]','$_POST[uc1letter]','$_POST[uc2hw]','$_POST[uc2exam]','$_POST[uc2proj]','$_POST[uc2part]','$_POST[uc2final]','$_POST[uc2letter]','$_POST[uc3hw]','$_POST[uc3exam]','$_POST[uc3proj]','$_POST[uc3part]','$_POST[uc3final]','$_POST[uc3letter]','$_POST[uc4hw]','$_POST[uc4exam]','$_POST[uc4proj]','$_POST[uc4part]','$_POST[uc4final]','$_POST[uc4letter]')";         
mysql_query($add_usersQuery, $con);
};

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
	$c14 = mysql_fetch_array($course14);
	
	$course15 = mysql_query ("SELECT * FROM course WHERE course_id = 15");
	if (!$course15)
	{
		die("Invalid query:".mysql_error());
	}
	$c15 = mysql_fetch_array($course15);
	
// Query out the course 



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
	<div class ="jumbotron">
	<center><h1>Course Name: <?php 
					if ((($_SESSION['sess_cid'])== "1" ) || (($_SESSION['sess_cid2'])== "1") || (($_SESSION['sess_cid3'])== "1")||(($_SESSION['sess_cid4'])== "1"))
					{echo "<td>".$c1['course_name']."</td>";}
					else if((($_SESSION['sess_cid'])== "2" ) || (($_SESSION['sess_cid2'])== "2") || (($_SESSION['sess_cid3'])== "2")||(($_SESSION['sess_cid4'])== "2"))
					{echo "<td>".$c2['course_name']."</td>";}
					else if((($_SESSION['sess_cid'])== "3" ) || (($_SESSION['sess_cid2'])== "3") || (($_SESSION['sess_cid3'])== "3")||(($_SESSION['sess_cid4'])== "3"))
					{echo "<td>".$c3['course_name']."</td>";}
					else if((($_SESSION['sess_cid'])== "4" ) || (($_SESSION['sess_cid2'])== "4") || (($_SESSION['sess_cid3'])== "4")||(($_SESSION['sess_cid4'])== "4"))
					{echo "<td>".$c4['course_name']."</td>";}
					else if((($_SESSION['sess_cid'])== "5" ) || (($_SESSION['sess_cid2'])== "5") || (($_SESSION['sess_cid3'])== "5")||(($_SESSION['sess_cid4'])== "5"))
					{echo "<td>".$c5['course_name']."</td>";}
					else if((($_SESSION['sess_cid'])== "6" ) || (($_SESSION['sess_cid2'])== "6") || (($_SESSION['sess_cid3'])== "6")||(($_SESSION['sess_cid4'])== "6"))
					{echo "<td>".$c6['course_name']."</td>";}
					else if((($_SESSION['sess_cid'])== "7" ) || (($_SESSION['sess_cid2'])== "7") || (($_SESSION['sess_cid3'])== "7")||(($_SESSION['sess_cid4'])== "7"))
					{echo "<td>".$c7['course_name']."</td>";}
					else if((($_SESSION['sess_cid'])== "8" ) || (($_SESSION['sess_cid2'])== "8") || (($_SESSION['sess_cid3'])== "8")||(($_SESSION['sess_cid4'])== "8"))
					{echo "<td>".$c8['course_name']."</td>";}
					else if((($_SESSION['sess_cid'])== "9" ) || (($_SESSION['sess_cid2'])== "9") || (($_SESSION['sess_cid3'])== "9")||(($_SESSION['sess_cid4'])== "9"))
					{echo "<td>".$c9['course_name']."</td>";}
					else if((($_SESSION['sess_cid'])== "10" ) || (($_SESSION['sess_cid2'])== "10") || (($_SESSION['sess_cid3'])== "10")||(($_SESSION['sess_cid4'])== "10"))
					{echo "<td>".$c10['course_name']."</td>";}
					else if((($_SESSION['sess_cid'])== "11" ) || (($_SESSION['sess_cid2'])== "11") || (($_SESSION['sess_cid3'])== "11")||(($_SESSION['sess_cid4'])== "11"))
					{echo "<td>".$c11['course_name']."</td>";}
					else if((($_SESSION['sess_cid'])== "12" ) || (($_SESSION['sess_cid2'])== "12") || (($_SESSION['sess_cid3'])== "12")||(($_SESSION['sess_cid4'])== "12"))
					{echo "<td>".$c12['course_name']."</td>";}
					else if((($_SESSION['sess_cid'])== "13" ) || (($_SESSION['sess_cid2'])== "13") || (($_SESSION['sess_cid3'])== "13")||(($_SESSION['sess_cid4'])== "13"))
					{echo "<td>".$c13['course_name']."</td>";}
					else if((($_SESSION['sess_cid'])== "14" ) || (($_SESSION['sess_cid2'])== "14") || (($_SESSION['sess_cid3'])== "14")||(($_SESSION['sess_cid4'])== "14"))
					{echo "<td>".$c14['course_name']."</td>";}
					else if((($_SESSION['sess_cid'])== "15" ) || (($_SESSION['sess_cid2'])== "15") || (($_SESSION['sess_cid3'])== "15")||(($_SESSION['sess_cid4'])== "15"))
					{echo "<td>".$c15['course_name']."</td>";}
					else
					{echo "Select another course";}
					?>
					</h1></center>
	<center><h3> Select another course:</h3></center>
<center><div class="btn-group">
  <button class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Course Name <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li class="active"><a href="teacher_grades1.php">
					
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
					else if (($_SESSION['sess_cid'])== "14" )
					{echo "<td>".$c14['course_name']."</td>";}
					else if (($_SESSION['sess_cid'])== "15" )
					{echo "<td>".$c15['course_name']."</td>";}
					?>
					</a></li>
					<li><a href="teacher_grades2.php">
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
					else if (($_SESSION['sess_cid2'])== "14" )
					{echo "<td>".$c14['course_name']."</td>";}
					else if (($_SESSION['sess_cid2'])== "15" )
					{echo "<td>".$c15['course_name']."</td>";}
					?>
					</a></li>
					<li><a href="teacher_grades3.php">
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
					else if (($_SESSION['sess_cid3'])== "14" )
					{echo "<td>".$c14['course_name']."</td>";}
					else if (($_SESSION['sess_cid3'])== "15" )
					{echo "<td>".$c15['course_name']."</td>";}
					?>
					</a></li>
					<li><a href="teacher_grades4.php">
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
					else if (($_SESSION['sess_cid4'])== "14" )
					{echo "<td>".$c14['course_name']."</td>";}
					else if (($_SESSION['sess_cid4'])== "15" )
					{echo "<td>".$c15['course_name']."</td>";}
					?>
					</a></li>
  </ul>
</div></center>
	</div>
</div>
<div class = "container-fluid" >


  <!--start add_users users table-->
  <div class = "table-responsive" >
	 <table class="table borderless">
<?php
if ( $_SESSION['sess_userrole'] == "Teacher")// open 1st if statement
{
	
	echo "<thead>
			<tr class = 'info'>
							<th align='left'>Course Name</th>
							<th align='left'>Last Name</th>
							<th align='left'>First Name</th>
							<th align='left'>Homework</th>
							<th align='center'>Exam</th>
							<th align='center'>Project</th>
							<th align='left'>Participation</th>
							<th align='left'>Final Exam</th>
							<th align='left'></th>
							<th align='left'></th>
			</tr>
		</thead>
		<tbody>";
		if (($_SESSION['sess_cid2'])== "1" ) 
		{
		include 'cid2_1.php';

		}  
			// course 2 
		else if (($_SESSION['sess_cid2'])== "2" ) 
		{
		include 'cid2_2.php';
		}  

		// course 3
		else if (($_SESSION['sess_cid2'])== "3" ) 
		{
		include 'cid2_3.php';
		}  
		// course 4
		else if (($_SESSION['sess_cid2'])== "4" )
		{
		include 'cid2_4.php';
		}
		// course 5
		else if (($_SESSION['sess_cid2'])== "5" ) 
		{
		include 'cid2_5.php';
		}
		// course 6
		else if (($_SESSION['sess_cid2'])== "6" ) 
		{
		include 'cid2_6.php';
		}
		else if (($_SESSION['sess_cid2'])== "7" )
		{

			include 'cid2_7.php';
		}
		else if (($_SESSION['sess_cid2'])== "8" )
		{
			include 'cid2_8.php';
		}
		else if (($_SESSION['sess_cid2'])== "9" )
		{
			include 'cid2_9.php';
		}
		else if (($_SESSION['sess_cid2'])== "10" )
		{

			include 'cid2_10.php';
		}
		else if (($_SESSION['sess_cid2'])== "11" )
		{

			include 'cid2_11.php';
		}
		else if (($_SESSION['sess_cid2'])== "12" )
		{

			include 'cid2_12.php';
		}
		else if (($_SESSION['sess_cid2'])== "13" )
		{

			include 'cid2_13.php';
		}
		else if (($_SESSION['sess_cid2'])== "14" )
		{

			include 'cid2_14.php';
		}
		else if (($_SESSION['sess_cid2'])== "15" )
		{

			include 'cid2_15.php';
		}
		else
		{
		 echo "<center><h1>You need to add a new course</h1></center>";
		}
}
else // end first statement
		{
		 echo "<center><h1>You cannot modify the content within this page</h1></center>";
		}
		
echo "</tbody>";
?>
</table> <!--end add_users users table -->
</div> <!-- end first container in add_users users table-->

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