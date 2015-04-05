<?php 
	require 'database-config.php';
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(((!isset($_SESSION['sess_username']) && $role!="student")) || (!isset($_SESSION['sess_username']) && $role!="admin") || (!isset($_SESSION['sess_username']) && $role!="teacher"))
	{
      header('Location: index.php?err=2');
    }
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Profile</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href = "css/bootstrap.min.css" rel = "stylesheet">
		<link href = "css/styles.css" rel = "stylesheet">
		<style>
		
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
<center><div class= "container">
		<h1>Welcome <?php echo $_SESSION['sess_userFName'];?> <?php echo $_SESSION['sess_userLName'];?></h1>
<!--start general-->
	<div class="panel panel-info">
		<div class="panel-heading" role="tab" id="generalInfo">
		  <h4 class="panel-title">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			  <strong>General Information</strong>
			</a>
		  </h4>
		</div>
		<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="generalInfo">
			<div class="panel-body">
			
			<div class="input-group">
 				<span class="input-group-addon" id="sizing-addon1">First Name:</span>
  				<input type="text" class="form-control" placeholder="<?php echo $_SESSION['sess_userFName'];?>" aria-describedby="sizing-addon1">
			</div>
			<div class="input-group">
 				<span class="input-group-addon" id="sizing-addon1">Last Name:</span>
  				<input type="text" class="form-control" placeholder="<?php echo $_SESSION['sess_userLName'];?>" aria-describedby="sizing-addon1">
			</div>
			<div class="input-group">
 				<span class="input-group-addon" id="sizing-addon1">E-mail:</span>
  				<input type="text" class="form-control" placeholder="<?php echo $_SESSION['sess_userEmail'];?>" aria-describedby="sizing-addon1">
			</div>
			<div class="input-group">
 				<span class="input-group-addon" id="sizing-addon1">City:</span>
  				<input type="text" class="form-control" placeholder="<?php echo $_SESSION['sess_userCity'];?>" aria-describedby="sizing-addon1">
			</div>
			<div class="input-group">
 				<span class="input-group-addon" id="sizing-addon1">State:</span>
  				<input type="text" class="form-control" placeholder="<?php echo $_SESSION['sess_userState'];?>" aria-describedby="sizing-addon1">
			</div>
			<div class="input-group">
 				<span class="input-group-addon" id="sizing-addon1">Country:</span>
  				<input type="text" class="form-control" placeholder="<?php echo $_SESSION['sess_userCountry'];?>" aria-describedby="sizing-addon1">
			</div>
			
			
			</div><!--end general body-->
		</div><!--end general collapse bar-->
	</div><!--end general panel-->
	
	<!--start userPic-->
	<div class="panel panel-info">
		<div class="panel-heading" role="tab" id="addInfo">
		  <h4 class="panel-title">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
			  <strong>User Picture</strong>
			</a>
		  </h4>
		</div>
		<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="addInfo">
			<div class="panel-body">
				<form class="form-inline">
					<div class="form-group">
						<div class="form-group">
							<div class="input-group">
							<input type="file" class="form-control" id="inputFile" placeholder="">
							<div class="input-group-addon"><a href="#">Upload</a></div>
							</div>
						</div>
					</div> <!--end group-->
				</form>
				
				<br></br>
				<a href="#" class="thumbnail">
				<img src="img/tulips.jpg" class="img-responsive" alt="Profile Image">
				</a>
			</div><!--end body-->
		</div><!--end collapse bar-->
	</div><!--end panel-->
	
	<!--start Additional Info-->
	<div class="panel panel-info">
		<div class="panel-heading" role="tab" id="addInfo">
		  <h4 class="panel-title">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
			  <strong>Additional Information</strong>
			</a>
		  </h4>
		</div>
		<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="addInfo">
			<div class="panel-body">
				<form class="form-inline">
					<div class="form-group">
						<div class="row">
						</div>
					</div> <!--end group-->
				</form>
			</div><!--end general body-->
		</div><!--end general collapse bar-->
	</div><!--end general panel-->
	
	<button class="btn btn-primary" type="submit">Update Profile</button>
	
</div></center><!--end container-->

<!--Footer-->
		<div class = "navbar navbar-default navbar-fixed-bottom">
			<div class = "container">
				<p class = "navbar-text pull-left">Site Built By Christie Phan</p>
				<a href = "https://www.linkedin.com/in/christiephan" class = "navbar-btn btn-primary btn pull-right">LinkedIn</a>
			</div>
		</div>
		
<!-- Modal: loads last --->
<!--Edit modal-->
		<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="edit">Edit Topic</h4>
				</div>
				<div class="modal-body">
					
					<textarea class="form-control" rows="3"></textarea>
				
				</div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			  </div>
				</div>
			</div>
		</div>
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
<!--End Modal-->
<!--Start Script-->
			<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<script src = "js/bootstrap.js"></script>
		   
	</body>
</html>

