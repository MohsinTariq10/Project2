<?php
 	include_once('database/connection.php');

 	if(isset($_GET['SN']) && isset($_GET['pass']))
 	{
 		$SN = (int)$_GET['SN'];
 		$pass = $_GET['pass'];
 	}

 	$check="SELECT fName FROM fac WHERE fId={$SN}";
 	$res=$conn->query($check);

 	if (!$res) {
		echo "Error running query: " . mysql_error($conn);
 	}

 	if($res->num_rows>0){
 		echo "Yes";
 	}
 	else
 		echo "No";
?>