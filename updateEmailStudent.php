<?php
 include_once('database/connection.php');
 if(isset($_GET['email']) && isset($_GET['id']))
 	{
 		$mail = $_GET['email'];
 		$id = $_GET['id'];
 	}

 $q7="UPDATE stu SET sEmail='{$mail}' WHERE sReg='{$id}'";
 $res=$conn->query($q7);
 if (!$res) {
	echo "Error running query: " . mysql_error($conn);
 }

 $newEmail= "SELECT DISTINCT sEmail FROM stu WHERE sReg='{$id}'";
 $n1=$conn->query($newEmail);
 if($n1->num_rows>0){
    $smail = $n1->fetch_assoc();
    echo $smail['sEmail'];
 }

?>