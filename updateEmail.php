<?php
 include_once('database/connection.php');
 if(isset($_GET['email']) && isset($_GET['id']))
 	{
 		$mail = $_GET['email'];
 		$id = (int)$_GET['id'];
 	}
 $updateE="UPDATE fac SET fEmail='{$mail}' WHERE fId={$id}";
 $res=$conn->query($updateE);

 if (!$res) {
	echo "Error running query: " . mysql_error($conn);
 }

?>