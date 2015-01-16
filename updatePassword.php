<?php
 include_once('database/connection.php');
 if(isset($_GET['password']) && isset($_GET['id']))
 	{
 		$update = $_GET['password'];
 		$id = (int)$_GET['id'];
 	}
 $updateP="UPDATE fac SET fPassword='{$update}' WHERE fId={$id}";
 $res=$conn->query($updateP);

 if (!$res) {
	echo "Error running query: " . mysql_error($conn);
 }

?>