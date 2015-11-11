<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="Administrator"){
      header('Location: index.php?err=2');
    }
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

<div class = "container">
	<div class ="jumbotron">
	<?php
	if ( $_SESSION['sess_userrole'] == "Administrator") 
	{
	echo "<center><h1> Modify and Add Participants</h1></center>";
	}
	else 
	{
		
	}
	?>
	</div>
	<?php
	if ( $_SESSION['sess_userrole'] == "Administrator") 
	{
	echo "<h1 style = 'color: #C0C0C0'><center><em>Please note: Username cannot be duplicate</em></center><h1>";
	}
	else 
	{
		
	}
	?>
</div>
<div class = "container-fluid" >
<br></br>

<?php

if ( $_SESSION['sess_userrole'] == "Administrator") // open first if statement
{
	
	//start add_users users table
  echo "<div class = 'table-responsive' >
	 <table class='table borderless table-condensed'>
		<thead>
			<tr class = 'info'>
				<th align='left'>ID</th>
				<th align='left'>First Name</th>
				<th align='left'>Last Name</th>
				<th align='center'>Username</th>
				<th align='center'>Password</th>
				<th align='left'>Email</th>
				<th align='left'>Role</th>
				<th align='left'></th>
				<th align='left'></th>
			</tr>
		</thead>
		<tbody>";
	
$sql = "SELECT * FROM users ORDER BY id ASC";
$myData = mysql_query($sql,$con);

while($record = mysql_fetch_array($myData)){

// delete and update form 
echo "<tr>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo "<td>" . "<input class = 'form-control' type=text name=id value=" . $record['id'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo "<td>" . "<input class = 'form-control' type=text name=FName value=" . $record['fname'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo "<td>" . "<input class = 'form-control' type=text name=LName value=" . $record['lname'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo "<td>" . "<input class = 'form-control' type=text name=Username value=" . $record['username'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
		echo "<td>" . "<input class = 'form-control' type=text name=Password value=" . $record['password'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo "<td>" . "<input class = 'form-control' type=text name=Email value=" . $record['email'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo "<td>" . "<input class = 'form-control' type=text name=Role value=" . $record['role'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=City value=" . $record['city'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=State value=" . $record['state'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
		echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=Degree value=" . $record['degree'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=Cid value=" . $record['cid'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=Cid2 value=" . $record['cid2'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=Cid3 value=" . $record['cid3'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=Cid4 value=" . $record['cid4'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C1hw value=" . $record['c1hw'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C1exam value=" . $record['c1exam'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C1proj value=" . $record['c1proj'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C1part value=" . $record['c1part'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C1final value=" . $record['c1final'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C1letter value=" . $record['c1letter'] . " </td>";
	echo "</div>";
		echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C2hw value=" . $record['c2hw'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C2exam value=" . $record['c2exam'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C2proj value=" . $record['c2proj'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C2part value=" . $record['c2part'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C2final value=" . $record['c2final'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C2letter value=" . $record['c2letter'] . " </td>";
	echo "</div>";
		echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C3hw value=" . $record['c3hw'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C3exam value=" . $record['c3exam'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C3proj value=" . $record['c3proj'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C3part value=" . $record['c3part'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C3final value=" . $record['c3final'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C3letter value=" . $record['c3letter'] . " </td>";
	echo "</div>";
		echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C4hw value=" . $record['c4hw'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C4exam value=" . $record['c4exam'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C4proj value=" . $record['c4proj'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C4part value=" . $record['c4part'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C4final value=" . $record['c4final'] . " </td>";
	echo "</div>";
	echo "<form action=admin_add_users.php method=post>";
		echo "<div class = 'form-group'>";
			echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C4letter value=" . $record['c4letter'] . " </td>";
	echo "</div>";
	echo "<td>" . "<input class = 'btn btn-info' type=submit name=update value=update" . " </td>";
	echo "<td>" . "<input class = 'btn btn-danger' type=submit name=delete value=delete" . " </td>";
	echo "<td style ='display:none !important'>" . "<input type=hidden name=hidden value=" . $record['id'] . " </td>";
echo "</tr>";
echo "</form>";
}

// add_users form 
echo "<form action=admin_add_users.php method=post>";
echo "<tr class = 'success'>";
echo "<td ><input type=text name=uid></td>";
echo "<td><input type=text name=ufname></td>";
echo "<td><input type=text name=ulname></td>";
echo "<td><input type=text name=uusername></td>";
echo "<td><input type=text name=upassword></td>";
echo "<td><input type=text name=uemail></td>";
echo "<td><input type=text name=urole></td>";
echo "<td style ='display:none !important'> <input type=hidden name=ucity></td>";
echo "<td style ='display:none !important'> <input type=hidden name=ustate></td>";
echo "<td style ='display:none !important'> <input type=hidden name=udegree></td>";
echo "<td style ='display:none !important'> <input type=hidden name=ucid></td>";
echo "<td style ='display:none !important'> <input type=hidden name=ucid2></td>";
echo "<td style ='display:none !important'> <input type=hidden name=ucid3></td>";
echo "<td style ='display:none !important'> <input type=hidden name=ucid4></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc1hw></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc1exam></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc1proj></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc1part></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc1final></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc1letter></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc2hw></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc2exam></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc2proj></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc2part></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc2final></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc2letter></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc3hw></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc3exam></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc3proj></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc3part></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc3final></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc3letter></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc4hw></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc4exam></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc4proj></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc4part></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc4final></td>";
echo "<td style ='display:none !important'> <input type=hidden name=uc4letter></td>";
echo "<td style ='display:none !important'> <input type=hidden name=></td>";
echo "<td>" . "<input class = 'btn btn-success' type=submit name=add_users value=Add" . " </td>";
echo "</tr>";
echo "</form>";

// end table 
echo "</tbody>";
echo "</table>";
echo "</div>";

}// close 1st if statement 
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