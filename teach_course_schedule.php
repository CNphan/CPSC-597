<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="teacher"){
      header('Location: index.php?err=2');
    }
	
	$query = mysql_query("SELECT first_name, last_name, company, city FROM user WHERE username = $_SESSION['username']");
?>

<!DOCTYPE html><!--Credentials:student,teacher,admin -->
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
<div class= "container">
<div class= "jumbotron"><h1>Schedule {Semester-Spring 2015}</h1></div>
<div class="table-responsive">
  <table class="table">
    <tr>
		<td class="success">
			<div class="col-sm-3" ><strong> COURSE ID</strong> </div>
		</td>
		<td class="success">
			<div class="col-sm-3" ><strong> TYPES</strong> </div>
		</td>
		<td class="success">
			<div class="col-sm-3" ><strong> DAYS</strong></div>
		</td>
		<td class="success">
			<div class="col-sm-3" ><strong> TIME</strong></div>
		</td>
		<td class="success">
			<div class="col-sm-3" ><strong> UNITS</strong></div>
		</td>
		<td class="success">
			<div class="col-sm-3" ><strong> LOC</strong></div>
		</td>
		<td class="success">
			<div class="col-sm-3" ><strong> Roll</strong></div> 
		</td>
	</tr>
	<tr>
		<td>
			<div class="col-sm-3" > HIS101</div>
		</td>
		<td>
			<div class="col-sm-3" > SEM </div>
		</td>
		<td>
			<div class="col-sm-3" > M,W,F </div>
		</td>
		<td>
			<div class="col-sm-3" > 10AM-12:45PM </div>
		</td>
		<td>
			<div class="col-sm-3" > 3 </div>
		</td>
		<td>
			<div class="col-sm-3" > LAC 101 </div>
		</td>
		<td>
			<div class="col-sm-3" ><a href="#roll" data-toggle="modal" class = "btn btn-group-sm btn-default" >Roll</a> </div>
		</td>
	</tr>
  </table>
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
<!--Roll Modal-->
	<div class="modal fade" id="roll" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="edit">{Class}</h4>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
			  <table class="table">
				<tr>
					<td class="success">
						<div class="col-sm-3" ><strong> Student ID</strong> </div>
					</td>
					<td class="success">
						<div class="col-sm-3" ><strong> Last Name</strong> </div>
					</td>
					<td class="success">
						<div class="col-sm-3" ><strong> First Name</strong></div>
					</td>
					<td class="success">
						<div class="col-sm-3" ><strong> Degree Type</strong></div>
					</td>
					<td class="success">
						<div class="col-sm-3" ><strong> Grade</strong></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-sm-3" > 1231245 </div>
					</td>
					<td>
						<div class="col-sm-3" > Phan, </div>
					</td>
					<td>
						<div class="col-sm-3" > Christie </div>
					</td>
					<td>
						<div class="col-sm-3" > Undergrad </div>
					</td>
					<td>
						<div class="col-sm-3" > A </div> <!--pull grade from grades-sheet-->
				</tr>
				<tr>
					<td>
						<div class="col-sm-3" > 1231245 </div>
					</td>
					<td>
						<div class="col-sm-3" > Phan, </div>
					</td>
					<td>
						<div class="col-sm-3" > Christie </div>
					</td>
					<td>
						<div class="col-sm-3" > Undergrad </div>
					</td>
					<td>
						<div class="col-sm-3" > A </div> <!--pull grade from grades-sheet-->
				</tr>
				<tr>
					<td>
						<div class="col-sm-3" > 1231245 </div>
					</td>
					<td>
						<div class="col-sm-3" > Phan, </div>
					</td>
					<td>
						<div class="col-sm-3" > Christie </div>
					</td>
					<td>
						<div class="col-sm-3" > Undergrad </div>
					</td>
					<td>
						<div class="col-sm-3" > A </div> <!--pull grade from grades-sheet-->
				</tr>
			  </table>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
			</div>
		</div>
	</div> <!--End roll modal-->


<!--Start Script-->
			<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<script src = "js/bootstrap.js"></script>
		   
	</body>
</html>