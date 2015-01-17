<?php
    include 's_session.php';
	  include 'database/connection.php';
    include 'inc/header.inc.php';
    include 'inc/navbar.inc.php';

    $SREG = $_GET['ST'];

    $q1 = "SELECT DISTINCT sName FROM v_stu WHERE sReg='{$SREG}'";
    $sName = $conn->query($q1);
    if(!$sName){
      echo "query failed";
    }

    $q2="SELECT DISTINCT pName FROM v_stu WHERE sReg='{$SREG}'";
    $pName = $conn->query($q2);
    if (!$pName) {
    	echo "query failed";
    }

  	$q3 = "SELECT DISTINCT batch FROM v_stu WHERE sReg='{$SREG}'";
   	$batch = $conn->query($q3);
   	if (!$batch) {
    	echo "query failed";
    }
    
    $q4 = "SELECT COUNT(DISTINCT semName) As count FROM v_stu WHERE sReg='{$SREG}'";  
    $noofsem = $conn->query($q4);
   	if (!$noofsem) {
    	echo "query failed";
    }

    $q5 = "SELECT DISTINCT semName FROM v_stu WHERE sReg='{$SREG}'";
    $aofsem = $conn->query($q5);
   	if (!$aofsem) {
    	echo "query failed";
    }

?>
    <style type="text/css">
	.page{
		border: 1px solid #95a5a6; border-radius:2px; padding:20px;
	}</style>


<div class="pull-center container" style="width:70%">
    <div class="panel panel-default" >
      <div class="panel-heading" style="padding:2px; font-size: 18px; color:#fff; background-color:#95a5a6">
      	<?php
			if($sName->num_rows > 0){
				$s=$sName->fetch_assoc();
		       	echo "<h4 style='text-align:center; color:#fff'>WELCOME : ".$s['sName']."</h4>";
			}	    
  		?>
      </div>
    <div class="panel-body">
      <div class="table-responsive">
          <table class="table table-condensed table-striped">
              <tbody style="font-size:14px;">
              <?php
               	echo "<a class='btn btn-default btn-sm pull-right' href='studentprofile.php?SN=$SREG' aria-label='Right Align'>
  				<span class='glyphicon glyphicon-user'></span>Update Profile</a>";
	           	
  				?>
			<?php
				if($pName->num_rows > 0){
					$p=$pName->fetch_assoc();
		       			echo  "<label>".$p['pName']."</label>";
			}
  		?>
  		
      	<?php
			if($batch->num_rows > 0){
				$b=$batch->fetch_assoc();
		       	echo  "<tr><td>Batch </td><label><td>".$b['batch']."</td></label></tr>";
			}
  		?>
  		
      	<?php
			if($noofsem->num_rows > 0){
				$nss=$noofsem->fetch_assoc();
				$countsem= $nss['count'];  	
			}

			if($aofsem->num_rows > 0){
				$n=$aofsem->fetch_assoc();  	
			}

			for($i=0; $i<$countsem; $i++) {
				echo  "<tr><td> Year </td><label><td>".$n['semName']."</td></label></tr>";
				$temp = $n['semName'];
		?>

		<?php
			$q7 = "SELECT DISTINCT cTitle FROM V_stu WHERE sReg = '{$SREG}' AND semName='{$temp}'";
			$courses = $conn->query($q7);
				if (!$courses) {
				echo "query failed";
			}
			if($courses->num_rows > 0){
				while($out=$courses->fetch_assoc()){
					echo  "<tr><td> Course </td><label><td>".$out['cTitle']."</td></label></tr>";
				}
			}

		?>
		
		<?php
			}
		?>		      	
              
            </tbody>
         </table>
      </div>
    </div>
  </div>
</div>





<?php    
    include 'inc/footer.inc.php';
?>
