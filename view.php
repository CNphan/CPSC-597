<?php session_start();
$role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="student"){
      header('Location: index.php?err=2');
    }

if(isset($_SESSION['username'])) // if session is set to ... otherwise 
{
	echo 'Welcome,'.$_SESSION['courseN'];
}
else 
{
	echo 'Please log in';
}
?>
