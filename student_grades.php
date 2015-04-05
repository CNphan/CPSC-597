<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="student"){
      header('Location: index.php?err=2');
    }
?>
<!DOCTYPE html> <!--credentials: teacher-->
<html>
	<head>
		<title>Grades</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href = "css/bootstrap.min.css" rel = "stylesheet">
		<link href = "css/styles.css" rel = "stylesheet">
	</head>
	<body>
<!--Header-->
		<div class = "navbar navbar-inverse navbar-static-top">
			<div class = "container">
				<a href = "#" class = "navbar-brand"><?php echo $_SESSION['sess_username'];?></a>
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
<div class= "row">
	<div class="btn-group">
		<button type="button" class="btn btn-default">Course</button>
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			<span class="caret"></span>
			<span class="sr-only">Toggle Dropdown</span>
		</button>
		<ul class="dropdown-menu" role="menu">
			<li><a href="#">History 101</a></li>
			<li><a href="#">English 101</a></li>
			<li><a href="#">Software Engineering 101</a></li>
			<li class="divider"></li>
			<li><a href="#">Others</a></li>
		</ul>
	</div>
	<h1><center>{History 101}</center></h1>
	<br></br>

<div class="table-responsive">
  <table class="table">
    <tr>
		<td class="success">
			<div class="col-sm-3" ><strong> Last Name</strong> </div>
		</td>
		<td class="success">
			<div class="col-sm-3" ><strong> First Name</strong> </div>
		</td>
		<td class="success">
			<div class="col-sm-3" ><strong> Homework</strong></div>
		</td>
		<td class="success">
			<div class="col-sm-3" ><strong> Quiz</strong></div>
		</td>
		<td class="success">
			<div class="col-sm-3" ><strong> Exams</strong></div>
		</td>
		<td class="success">
			<div class="col-sm-3" ><strong> Final Grade</strong></div>
		</td>

	</tr>
	<tr>
		<td>
			<div class="col-sm-3" > Phan, </div>
		</td>
		<td>
			<div class="col-sm-3" > Christie </div>
		</td>
		<td>
			<div class="col-sm-3" > 100 </div>
		</td>
		<td>
			<div class="col-sm-3" > 90 </div>
		</td>
		<td>
			<div class="col-sm-3" > 90 </div>
		</td>
		<td>
			<div class="col-sm-3" > 93% </div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="col-sm-3" > Phan, </div>
		</td>
		<td>
			<div class="col-sm-3" > Christie </div>
		</td>
		<td>
			<div class="col-sm-3" > 100 </div>
		</td>
		<td>
			<div class="col-sm-3" > 90 </div>
		</td>
		<td>
			<div class="col-sm-3" > 90 </div>
		</td>
		<td>
			<div class="col-sm-3" > 93% </div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="col-sm-3" > Phan, </div>
		</td>
		<td>
			<div class="col-sm-3" > Christie </div>
		</td>
		<td>
			<div class="col-sm-3" > 100 </div>
		</td>
		<td>
			<div class="col-sm-3" > 90 </div>
		</td>
		<td>
			<div class="col-sm-3" > 90 </div>
		</td>
		<td>
			<div class="col-sm-3" > 93% </div>
		</td>
	</tr>
  </table>
</div>
	<center><button type="button" class="btn btn-primary"><strong>Update</strong></button></center>
</div><!--End Row-->
</div><!--End container-->
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
<!--End modal-->
<!--Start Script-->
			<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<script src = "js/bootstrap.js"></script>
		   
	</body>
</html>