<?php
 include_once('database/connection.php');
 if(isset($_GET['app']) && isset($_GET['id']))
 	{
 		$appoint = $_GET['app'];
 		$id = (int)$_GET['id'];
 	}
 $updateE="UPDATE fac SET fAppointment='{$appoint}' WHERE fId={$id}";
 $res=$conn->query($updateE);

 if (!$res) {
	echo "Error running query: " . mysql_error($conn);
 }

?>