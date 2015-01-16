<?php
 include_once('database/connection.php');

 if(isset($_GET['name']))
 $update = $_GET['name'];
 $id = 3;

 $updateN="UPDATE fac SET fName='{$update}' WHERE fId={$id}";
 $res=$conn->query($updateN);

 if (!$res) {
	echo "Error running query: " . mysql_error($conn);
 }

 $newName= "SELECT DISTINCT fName FROM V_fac WHERE fId={$id}";
    $n1=$conn->query($newName);
    if($n1->num_rows>0){
      $fname = $n1->fetch_assoc();
      echo $fname['fName'];
    }

?>