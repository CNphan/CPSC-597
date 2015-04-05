<!--Admin-->
<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="admin"){
      header('Location: index.php?err=2');
    }
?>
<!DOCTYPE html>
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
<div class= "jumbotron"><h1>Report</h1></div>
<div>
		<form class="form-inline">
	  <div class="form-group">
		<label for="StudentID">Student ID:</label>
		<input type="text" class="form-control" id="StudentID" placeholder="Student ID">
	  </div>
	  <div class="form-group">
		<label for="email">Email:</label>
		<input type="email" class="form-control" id="email" placeholder="jane.doe@example.com">
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button><!--Approve by admin-->
	</form>
</div>

<h1>Display student transcript here</h1>
<h3><strong>Name: {Phan,Christie}</strong></h3>
	<h3><strong>Student ID: {121212}</strong></h3>
	<h3><strong>Status:{degree table-type}</strong></h3>
	<h4>Date: {current date}</h4>
	<br></br>
	<br></br>
	<h3>Degrees Awarded</h3>
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-8"><strong>Degree:</strong></div>
		<div class="col-xs-6 col-md-4">{Master of Science }</div>
		<div class="col-xs-12 col-sm-6 col-md-8"><strong>Confer Date:</strong></div>
		<div class="col-xs-6 col-md-4">{2015-05-30 }</div>
		<div class="col-xs-12 col-sm-6 col-md-8"><strong>Degree Honors:</strong></div>
		<div class="col-xs-6 col-md-4">{High Honor }</div>
		<div class="col-xs-12 col-sm-6 col-md-8"><strong>Program:</strong></div>
		<div class="col-xs-6 col-md-4">{Computer Science}</div>
	</div>
	<br></br>
	<br></br>
<div>  <!--start table-->
	<!--Note : A = 4, B = 3, C =2, D =1, F =0; multiple grades w. credit hours; total grades point/total attempt=GPA-->
	<div class="table-responsive">
  <table class="table">
    <tr>
		<td class="default">
			<div><strong> Course ID</strong> </div>
		</td>
		<td class="default">
			<div><strong> Description</strong> </div>
		</td>
		<td class="default">
			<div><strong> Credit Hours</strong></div>
		</td>
		<td class="default">
			<div><strong> Grade</strong></div>
		</td>
		<td class="default">
			<div><strong> Grade Points</strong></div>
		</td>
	</tr>
	<tr>
		<td>
			<div> CP12457 </div>
		</td>
		<td>
			<div> College Prep For Freshmen </div>
		</td>
		<td>
			<div> 3.00 </div>
		</td>
		<td>
			<div> A </div>
		</td>
		<td>
			<div> 12.00 </div>
		</td>
	</tr>
	<tr>
		<td>
			<div> CP12457 </div>
		</td>
		<td>
			<div> College Prep For Freshmen </div>
		</td>
		<td>
			<div> 3.00 </div>
		</td>
		<td>
			<div> A </div>
		</td>
		<td>
			<div> 12.00 </div>
		</td>
	</tr>
	<tr>
		<td class="default">
			<div><strong> Term GPA</strong> </div>
		</td>
		<td class="default">
			<div><strong> Term</strong> </div>
		</td>
		<td class="default">
			<div><strong> Credit Hours</strong></div>
		</td>
		<td class="default">
			<div><strong> GPA Units</strong></div>
		</td>
		<td class="default">
			<div><strong> Total Points</strong></div>
		</td>
	</tr>
	<tr>
		<td>
			<div> 4.0</div>
		</td>
		<td>
			<div> Fall 2013</div>
		</td>
		<td>
			<div> 6 </div>
		</td>
		<td>
			<div> 12 </div>
		</td>
		<td>
			<div> 24 </div>
		</td>
	</tr>
  </table>
</div><!--end table-->
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-8"><strong>Cum GPA</strong></div>
	<div class="col-xs-6 col-md-4">{4.0}</div>
	<div class="col-xs-12 col-sm-6 col-md-8"><strong>Test:</strong></div>
	<div class="col-xs-6 col-md-4">{Writing}</div>
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
<!--Start Script-->
			<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
			<script src = "js/bootstrap.js"></script>
		   
	</body>
</html>