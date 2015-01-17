<?php
 include_once('database/connection.php');
 if(isset($_GET['name']) && isset($_GET['id']))
 	{
 		$update = $_GET['name'];
 		$id = (int)$_GET['id'];
 	}
 $updateN="UPDATE fac SET fName='{$update}' WHERE fId={$id}";
 $res=$conn->query($updateN);

 if (!$res) {
	echo "Error running query: " . mysql_error($conn);
 }

?>