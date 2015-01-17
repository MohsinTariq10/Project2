<?php
	include 'database/connection.php';
    session_start();
    if (isset($_POST['stu_submit'])) {	
		$sr=$_POST['student_reg'];
		$sp=$_POST['student_pass'];
		$q = "SELECT * FROM stu WHERE sReg='{$sr}' AND sPassword='{$sp}'";
		$r=$conn->query($q);
		if ($r->num_rows > 0) {
			$_SESSION['student']=$sr; 
			header("location: studentpage.php?ST=".$sr); 
		}
		else
		{
			header("location: studentlogin.php");
			session_unset();
		}
	}
?>

