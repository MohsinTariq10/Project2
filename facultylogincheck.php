<?php
	include 'database/connection.php';
    session_start();
    if (isset($_POST['submit'])) {	
		$SN=$_POST['fServiceNo'];
		$PS=$_POST['fPassword'];
		$q = "SELECT * FROM fac WHERE fId='{$SN}' AND fPassword='{$PS}'";
		$r=$conn->query($q);
		if ($r->num_rows > 0) {
			$_SESSION['serviceno']=$SN; 
			header("location: facultyprofile.php?SN=".$SN); 
		}
		else
		{
			header("location: facultylogin.php");
			session_unset();
		}
	}
?>

