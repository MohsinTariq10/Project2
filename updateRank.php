<?php
 include_once('database/connection.php');
 if(isset($_GET['rank']) && isset($_GET['id']))
 	{
 		$rank = $_GET['rank'];
 		$id = (int)$_GET['id'];
 	}
 $updateE="UPDATE fac SET fRank='{$rank}' WHERE fId={$id}";
 $res=$conn->query($updateE);

 if (!$res) {
	echo "Error running query: " . mysql_error($conn);
 }

?>