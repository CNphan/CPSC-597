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

	// userTable 
	$userTable = 'SELECT * FROM user WHERE username=:username AND password=:password';
	$query = $dbh->prepare($userTable);

	$query->execute(array(':username' => $username, ':password' => $password));


	if($query->rowCount() == 0){
		header('Location: index.php?err=1');
	}
	else{

		$row = $query->fetch(PDO::FETCH_ASSOC);

		session_regenerate_id();
		$_SESSION['sess_user_id'] = $row['user_id'];
		$_SESSION['sess_userFName'] = $row['user_FName'];
		$_SESSION['sess_userLName'] = $row['user_LName'];
		$_SESSION['sess_username'] = $row['username'];
		$_SESSION['sess_userEmail'] = $row['user_email'];
		$_SESSION['sess_userPassword'] = $row['password'];
        $_SESSION['sess_userrole'] = $row['role'];
		$_SESSION['sess_userCity'] = $row['user_city'];
		$_SESSION['sess_userState'] = $row['user_state'];
		$_SESSION['sess_userCountry'] = $row['user_country'];
		$_SESSION['sess_userPic'] = $row['user_pic'];
		$_SESSION['sess_degreeType'] = $row['degree_type'];
		$_SESSION['sess_degreeProgram'] = $row['degree_program'];
		$_SESSION['sess_course1'] = $row['course1'];
		$_SESSION['sess_courseType1'] = $row['course_type1'];
		$_SESSION['sess_courseDays1'] = $row['course_days1'];
		$_SESSION['sess_courseTime1'] = $row['course_time1'];
		$_SESSION['sess_courseUnit1'] = $row['course_unit1'];
		$_SESSION['sess_courseLoc1'] = $row['course_loc1'];
		$_SESSION['sess_course2'] = $row['course2'];
		$_SESSION['sess_courseType2'] = $row['course_type2'];
		$_SESSION['sess_courseDays2'] = $row['course_days2'];
		$_SESSION['sess_courseTime2'] = $row['course_time2'];
		$_SESSION['sess_courseUnit2'] = $row['course_unit2'];
		$_SESSION['sess_courseLoc2'] = $row['course_loc2'];
		$_SESSION['sess_course3'] = $row['course3'];
		$_SESSION['sess_courseType3'] = $row['course_type3'];
		$_SESSION['sess_courseDays3'] = $row['course_days3'];
		$_SESSION['sess_courseTime3'] = $row['course_time3'];
		$_SESSION['sess_courseUnit3'] = $row['course_unit3'];
		$_SESSION['sess_courseLoc3'] = $row['course_loc3'];
		$_SESSION['sess_course4'] = $row['course4'];
		$_SESSION['sess_courseType4'] = $row['course_type4'];
		$_SESSION['sess_courseDays4'] = $row['course_days4'];
		$_SESSION['sess_courseTime4'] = $row['course_time4'];
		$_SESSION['sess_courseUnit4'] = $row['course_unit4'];
		$_SESSION['sess_courseLoc4'] = $row['course_loc4'];
		$_SESSION['sess_grade1'] = $row['grade1'];
		$_SESSION['sess_grade2'] = $row['grade2'];
		$_SESSION['sess_grade3'] = $row['grade3'];
		$_SESSION['sess_grade4'] = $row['grade4'];

        echo $_SESSION['sess_userrole'];
		session_write_close();

		if( $_SESSION['sess_userrole'] == "admin"){
			header('Location: admin_content.php');
		}
		else if ( $_SESSION['sess_userrole'] == "teacher"){
			header('Location: teacher_content.php');
		}
		else{
			header('Location: student_content.php');
		}
	}

	
?>