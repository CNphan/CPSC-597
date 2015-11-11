<?php 
	require 'database-config.php';

	session_start();

	$username = "";
	$password = "";
	
	if(isset($_POST['username'])){
		$username = $_POST['username'];
	}
	if (isset($_POST['password'])) {
		$password = $_POST['password'];

	}
	
	echo $username ." : ".$password;

	$q = 'SELECT * FROM users WHERE username=:username AND password=:password';

	$query = $dbh->prepare($q);

	$query->execute(array(':username' => $username, ':password' => $password));


	if($query->rowCount() == 0){
		header('Location: index.php?err=1');
	}else{

		$row = $query->fetch(PDO::FETCH_ASSOC);

		session_regenerate_id();
		$_SESSION['sess_id'] = $row['id'];
		$_SESSION['sess_username'] = $row['username'];
		$_SESSION['sess_password'] = $row['password'];
		$_SESSION['sess_fname'] = $row['fname'];
		$_SESSION['sess_lname'] = $row['lname'];
		$_SESSION['sess_email'] = $row['email'];
		$_SESSION['sess_role'] = $row['role'];
		$_SESSION['sess_city'] = $row['city'];
		$_SESSION['sess_state'] = $row['state'];
		$_SESSION['sess_degree'] = $row['degree'];
        $_SESSION['sess_userrole'] = $row['role'];
		$_SESSION['sess_course'] = $row['course_name'];
		$_SESSION['sess_cid'] = $row['cid'];
		$_SESSION['sess_cid2'] = $row['cid2'];
		$_SESSION['sess_cid3'] = $row['cid3'];
		$_SESSION['sess_cid4'] = $row['cid4'];
		$_SESSION['sess_c1hw'] = $row['c1hw'];
		$_SESSION['sess_c1exam'] = $row['c1exam'];
		$_SESSION['sess_c1proj'] = $row['c1proj'];
		$_SESSION['sess_c1part'] = $row['c1part'];
		$_SESSION['sess_c1final'] = $row['c1final'];
		$_SESSION['sess_c1letter'] = $row['c1letter'];
		$_SESSION['sess_c2hw'] = $row['c2hw'];
		$_SESSION['sess_c2exam'] = $row['c2exam'];
		$_SESSION['sess_c2proj'] = $row['c2proj'];
		$_SESSION['sess_c2part'] = $row['c2part'];
		$_SESSION['sess_c2final'] = $row['c2final'];
		$_SESSION['sess_c2letter'] = $row['c2letter'];
		$_SESSION['sess_c3hw'] = $row['c3hw'];
		$_SESSION['sess_c3exam'] = $row['c3exam'];
		$_SESSION['sess_c3proj'] = $row['c3proj'];
		$_SESSION['sess_c3part'] = $row['c3part'];
		$_SESSION['sess_c3final'] = $row['c3final'];
		$_SESSION['sess_c3letter'] = $row['c3letter'];
		$_SESSION['sess_c4hw'] = $row['c4hw'];
		$_SESSION['sess_c4exam'] = $row['c4exam'];
		$_SESSION['sess_c4proj'] = $row['c4proj'];
		$_SESSION['sess_c4part'] = $row['c4part'];
		$_SESSION['sess_c4final'] = $row['c4final'];
		$_SESSION['sess_c4letter'] = $row['c4letter'];
		
		

        echo $_SESSION['sess_userrole'];
		session_write_close();
		
		if( $_SESSION['sess_userrole'] == "Administrator"){
			header('Location: admin_home.php');
		}
		else if ( $_SESSION['sess_userrole'] == "Teacher"){
			header('Location: teacher_home.php');
		}
		else if ( $_SESSION['sess_userrole'] == "Student"){
			header('Location: student_home.php');
		}
		else{
			header('Location: index.php');
		}
	}


?>