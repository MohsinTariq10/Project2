<?php
    include 'database/connection.php';
    include 'inc/header.inc.php';
    include 'inc/navbar.inc.php';
?>

<?php
    //$reg = $_GET['SN'];
	$q1 = "SELECT DISTINCT offeredInSem FROM v_prog_courses WHERE pName = 'B.Sc. Computer Systems Engineering'";
    $qq1=$conn->query($q1);

    $q3 = "SELECT DISTINCT offeredInSem FROM v_prog_courses WHERE pName = 'M.Sc. Computer Systems Engineering'";
    $qq3=$conn->query($q3);

    $q5 = "SELECT DISTINCT offeredInSem FROM v_prog_courses WHERE pName = 'PhD. Computer Systems Engineering'";
    $qq5=$conn->query($q5);
?>

  <div class="pull-center container" style="width:70%">
    <div class="panel panel-default" >

      <div class="panel-heading" style="padding:2px; font-size: 14px; color:#fff; background-color:#95a5a6">
          <h4 style='text-align:center; color:#fff'>PROGRAM & COURSES</h4>
      </div>

    <div class="panel-body">
      <div class="table-responsive">
          <table class="table table-condensed table-striped">

              <thead>
              	<tr><td><h4>BSc. Computer Systems Engineering</h4></td></tr>
              	<tr>
              		<th> Semester </th>
              		<th> Course Code </th>
              		<th> Course Name </th>
              	</tr>
              </thead>
              <tbody style="font-size:13px;">
              <?php
               	if($qq1->num_rows>0){
      				while($count = $qq1->fetch_assoc()){
	    				
	    				$c=$count['offeredInSem'];

	    				$q2="SELECT * FROM v_prog_courses WHERE pName = 'B.Sc. Computer Systems Engineering' AND offeredInSem='{$c}'";
	    				$qq2=$conn->query($q2);
	    				if($qq2->num_rows > 0){
	    					while($values=$qq2->fetch_assoc()){
	    						echo "<tr>";
	    						echo "<td>".$values['offeredInSem']."</td>";
	    						echo "<td>".$values['cCode']."</td>";
	    						echo "<td>".$values['cTitle']."</td>";
	    						echo "</tr>";

	    					}

	    				}
					}
    			}  	
	           
              ?>
              </tbody>
          </table>

          <table class="table table-condensed table-striped">

              <thead>
              	<tr><td><h4>MSc. Computer Systems Engineering</h4></td></tr>
              	<tr>
              		<th> Semester </th>
              		<th> Course Code </th>
              		<th> Course Name </th>
              	</tr>
              </thead>
              <tbody style="font-size:13px;">
              <?php
               	if($qq3->num_rows>0){
      				while($count = $qq3->fetch_assoc()){
	    				
	    				$c=$count['offeredInSem'];

	    				$q4="SELECT * FROM v_prog_courses WHERE pName = 'M.Sc. Computer Systems Engineering' AND offeredInSem='{$c}'";
	    				$qq4=$conn->query($q4);
	    				if($qq4->num_rows > 0){
	    					while($values=$qq4->fetch_assoc()){
	    						echo "<tr>";
	    						echo "<td>".$values['offeredInSem']."</td>";
	    						echo "<td>".$values['cCode']."</td>";
	    						echo "<td>".$values['cTitle']."</td>";
	    						echo "</tr>";
	    					}

	    				}
					}
    			}  	
	           
              ?>
              </tbody>
          </table>

          <table class="table table-condensed table-striped">

              <thead>
              	<tr><td><h4>PhD. Computer Systems Engineering</h4></td></tr>
              	<tr>
              		<th> Semester </th>
              		<th> Course Code </th>
              		<th> Course Name </th>
              	</tr>
              </thead>
              <tbody style="font-size:13px;">
              <?php
               	if($qq3->num_rows>0){
      				while($count = $qq3->fetch_assoc()){
	    				
	    				$c=$count['offeredInSem'];

	    				$q6="SELECT * FROM v_prog_courses WHERE pName = 'PhD. Computer Systems Engineering' AND offeredInSem='{$c}'";
	    				$qq6=$conn->query($q6);
	    				if($qq6->num_rows > 0){
	    					while($values=$qq6->fetch_assoc()){
	    						echo "<tr>";
	    						echo "<td>".$values['offeredInSem']."</td>";
	    						echo "<td>".$values['cCode']."</td>";
	    						echo "<td>".$values['cTitle']."</td>";
	    						echo "</tr>";
	    					}

	    				}
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