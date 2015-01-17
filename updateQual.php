<?php
 include_once('database/connection.php');
 if(isset($_GET['qual']) && isset($_GET['id']))
 	{
 		$qual = $_GET['qual'];
 		$id = (int)$_GET['id'];
 	}
 $updateE="UPDATE fac SET fQual='{$qual}' WHERE fId={$id}";
 $res=$conn->query($updateE);

 if (!$res) {
	echo "Error running query: " . mysql_error($conn);
 }

?>