<?php 
   
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
	// course 14
	$course14 = mysql_query ("SELECT * FROM course WHERE course_id = 14");
	if (!$course14)
	{
		die("Invalid query:".mysql_error());
	}
	$c14 = mysql_fetch_array($course14);

// Query out the course 



?>

<?php

		$sql = "SELECT * FROM users WHERE cid = 14";
		$myData = mysql_query($sql,$con);

		while($record = mysql_fetch_array($myData)){

		// update form 
		echo "<tr>";
			
					if ((($_SESSION['sess_cid'])== "14" ) && ($record['role'] == "Student"))
					{echo "<td>".$c14['course_name']."</td>";}
					else "<td style ='display:none !important'></td>";
					
		
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					echo "<td style ='display:none !important'>" . "<input class = 'form-control' type=text name=id value=" . $record['id'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					if ($record['role'] == "Student")
					{
					echo "<td>" . "<input class = 'form-control' type=text name=LName value=" . $record['lname'] . " </td>";
					}
					else 
					{
						echo "<td style ='display:none !important' >" . "<input class = 'form-control' type=hidden name=LName value=" . $record['lname'] . " </td>";
					}
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					if ($record['role'] == "Student")
					{
					echo "<td>" . "<input class = 'form-control' type=text name=FName value=" . $record['fname'] . " </td>";
					}
					else 
					{
						echo "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=FName value=" . $record['fname'] . " </td>";
					}
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					echo "<td style ='display:none !important'>" . "<input class = 'form-control' type=text name=Username value=" . $record['username'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
				echo "<td style ='display:none !important'>" . "<input class = 'form-control' type=text name=Password value=" . $record['password'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					echo "<td style ='display:none !important'>" . "<input class = 'form-control' type=text name=Email value=" . $record['email'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					echo "<td style ='display:none !important'>" . "<input class = 'form-control' type=text name=Role value=" . $record['role'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					echo "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=City value=" . $record['city'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=State value=" . $record['state'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
				echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=Degree value=" . $record['degree'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=Cid value=" . $record['cid'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=Cid2 value=" . $record['cid2'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=Cid3 value=" . $record['cid3'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=Cid4 value=" . $record['cid4'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					if ($record['role'] == "Student")
					{
					echo  "<td>" . "<input class = 'form-control' type=text name=C1hw value=" . $record['c1hw'] . " </td>";
					}
					else 
					{
						echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C1hw value=" . $record['c1hw'] . " </td>";
					}
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					if ($record['role'] == "Student")
					{
					echo  "<td>" . "<input class = 'form-control' type=text name=C1exam value=" . $record['c1exam'] . " </td>";
					}
					else 
					{
						echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C1exam value=" . $record['c1exam'] . " </td>";
					}
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					if ($record['role'] == "Student")
					{
						echo  "<td>" . "<input class = 'form-control' type=text name=C1proj value=" . $record['c1proj'] . " </td>";
					}
					else 
					{
						echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=text name=C1proj value=" . $record['c1proj'] . " </td>";
					}
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					if ($record['role'] == "Student")
					{
						echo  "<td>" . "<input class = 'form-control' type=text name=C1part value=" . $record['c1part'] . " </td>";
					}
					else 
					{
						echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=text name=C1part value=" . $record['c1part'] . " </td>";
					}
					
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					if ($record['role'] == "Student")
					{
						echo  "<td>" . "<input class = 'form-control' type=text name=C1final value=" . $record['c1final'] . " </td>";
					}
					else 
					{
						echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=text name=C1final value=" . $record['c1final'] . " </td>";
					}
				
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C1letter value=" . $record['c1letter'] . " </td>";
			echo "</div>";
				echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
						echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C2hw value=" . $record['c2hw'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
						echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C2exam value=" . $record['c2exam'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
						echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C2proj value=" . $record['c2proj'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
						echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C2part value=" . $record['c2part'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
						echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C2final value=" . $record['c2final'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C2letter value=" . $record['c2letter'] . " </td>";
			echo "</div>";
				echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
						echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C3hw value=" . $record['c3hw'] . " </td>";
					echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C3hw value=" . $record['c3hw'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C3exam value=" . $record['c3exam'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C3proj value=" . $record['c3proj'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C3part value=" . $record['c3part'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C3final value=" . $record['c3final'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C3letter value=" . $record['c3letter'] . " </td>";
			echo "</div>";
				echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C4hw value=" . $record['c4hw'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C4exam value=" . $record['c4exam'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C4proj value=" . $record['c4proj'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C4part value=" . $record['c4part'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C4final value=" . $record['c4final'] . " </td>";
			echo "</div>";
			echo "<form action=teacher_grades1.php method=post>";
				echo "<div class = 'form-group'>";
					echo  "<td style ='display:none !important'>" . "<input class = 'form-control' type=hidden name=C4letter value=" . $record['c4letter'] . " </td>";
			echo "</div>";
			if ($record['role'] == "Student")
					{
						echo "<td>" . "<input class = 'btn btn-info' type=submit name=update value=update" . " </td>";
					}
					else 
					{
						echo "<td style ='display:none !important'>" . "<input class = 'btn btn-info' type=submit name=update value=update" . " </td>";
					}
			echo "<td style ='display:none !important'>" . "<input class = 'btn btn-danger' type=submit name=delete value=delete" . " </td>";
			echo "<td style ='display:none !important'>" . "<input type=hidden name=hidden value=" . $record['id'] . " </td>";
		echo "</tr>";
		echo "</form>";
		}
		mysql_close($con);
?>