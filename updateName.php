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

 $newName= "SELECT DISTINCT fName FROM fac WHERE fId={$id}";
    $n1=$conn->query($newName);
    if($n1->num_rows>0){
      $fname = $n1->fetch_assoc();
      echo $fname['fName'];
    }

?>