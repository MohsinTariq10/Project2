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

 $newEmail= "SELECT DISTINCT fEmail FROM fac WHERE fId={$id}";
    $n1=$conn->query($newEmail);
    if($n1->num_rows>0){
      $fmail = $n1->fetch_assoc();
      echo $fmail['fEmail'];
    }

?>