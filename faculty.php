<?php
    include 'database/connection.php';
    include 'inc/header.inc.php';
    include 'inc/navbar.inc.php';
?>

<?php
    //$reg = $_GET['SN'];

    $q1= "SELECT COUNT(DISTINCT fId) AS count FROM v_fac";
    $qq1=$conn->query($q1);
    if($qq1->num_rows>0){
      $count = $qq1->fetch_assoc();
      $c = $count['count'];
    }

    $q1= "SELECT DISTINCT fId,fName,fEmail,fQual,fRank,fAppointment FROM v_fac";
    $qq1=$conn->query($q1);
    
    
?>

  <div class="pull-center container" style="width:70%">
    <div class="panel panel-default" >
      <div class="panel-heading" style="padding:2px; font-size: 14px; color:#fff; background-color:#95a5a6">
          <h4 style='text-align:center; color:#fff'>FACULTY</h4>
      </div>
    <div class="panel-body">
      <div class="table-responsive">
          <table class="table table-condensed table-striped">
              <thead>
              	<tr>
              		<th>Name</th>
              		<th>Qualification</th>
              		<th>Rank</th>
              		<th>Appointment</th>
              		<th>Email</th>
              	</tr>
              </thead>
              <tbody style="font-size:14px;">
              <?php
                	if($qq1->num_rows>0){

     					while($values = $qq1->fetch_assoc()){
     						echo "<tr>";
	                		echo "<td>".$values['fName']."</td>";
	                		echo "<td>".$values['fQual']."</td>";
	                		echo "<td>".$values['fRank']."</td>";
	                		echo "<td>".$values['fAppointment']."</td>";
	                		echo "<td>".$values['fEmail']."</td>";
	                		echo "</tr>";	 
	                	}
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