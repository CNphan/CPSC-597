<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="Admin"){
      header('Location: index.php?err=2');
    }
$con = mysql_connect("localhost","root","");
if (!$con){
die("Can not connect: " . mysql_error());
}
mysql_select_db("lms2",$con);

// lowercase is from db 
if(isset($_POST['update'])){
$UpdateQuery = "UPDATE users SET id='$_POST[id]', fname='$_POST[FName]', lname='$_POST[LName]',username='$_POST[Username]',password='$_POST[Password]',email='$_POST[Email]',role='$_POST[Role]',city='$_POST[City]',state='$_POST[State]',degree='$_POST[Degree]' WHERE id='$_POST[hidden]'";                          
mysql_query($UpdateQuery, $con);
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
	.table {
    border-bottom:0px !important;
}
.table th, .table td {
    border: 0px !important;
}
.fixed-table-container {
    border:0px !important;
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
	<center><h1> Profile</h1></center>
	<center><h2>You Must log out in order for the changes to take effect</h2>
			  <a href = "logout.php"> Click here to log out </a></center>
	</div>
</div>
<div class = "container" >
<br></br>




		
<?php		

echo "<form action=student_profile.php method=post>";
	echo  "<label style ='display:none !important' for = 'id'> ID: </label>";
	echo  "<input style ='display:none !important' class = 'form-control' type=text name=id value=" . $_SESSION['sess_id'].">" ;
	echo "<br></br>";

	echo  "<label for = 'firstname'> First Name: </label>";
	echo  "<input class = 'form-control' type=text name=FName value=" . $_SESSION['sess_fname'].">" ;
	echo "<br></br>";
	
	echo "<label for = 'lastname'> Last Name </label>";
	echo "<input class = 'form-control' type=text name=LName value=" . $_SESSION['sess_lname'].">" ;
	echo "<br></br>";

	echo "<label for = 'email'> Email </label>";
	echo "<input class = 'form-control' type=text name=Email value=" . $_SESSION['sess_email'].">" ;
	echo "<br></br>";
	
	echo "<label for = 'username'> Username </label>";
	echo "<input class = 'form-control' type=text name=Username value=" . $_SESSION['sess_username'].">" ;
	echo "<br></br>";
	
	echo "<label for = 'password'> Password </label>";
	echo "<br></br>";
	echo "<input class = 'form-control' type=password name=Password value=" . $_SESSION['sess_password'].">" ;
	echo "<br></br>";
	
	echo  "<label for = 'role'> Role </label>";
	echo  "<input class = 'form-control' type=text readonly=readonly name=Role value=" . $_SESSION['sess_role'].">" ;
	echo "<br></br>";
	
	echo "<label for = 'city'> City </label>";
	echo "<input class = 'form-control' type=text name=City value=" . $_SESSION['sess_city'].">" ;
	echo "<br></br>";
	
	echo "<label for = 'state'> State </label>";
	echo "<input class = 'form-control' type=text name=State value=" . $_SESSION['sess_state'].">" ;
	echo "<br></br>";
	
	echo "<label for = 'degree'> Degree </label>";
	echo "<input class = 'form-control' type=text name=Degree value=" . $_SESSION['sess_degree'].">" ;
	echo "<br></br>";


echo "<td>" . "<input type=hidden name=hidden value=" . $_SESSION['sess_id']. "<br></br>"."<input class = 'btn btn-primary' type=submit name=update value = update onClick ='clicker()' " ." </td>";
echo "</form>";
		
		
		
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