<?php
    include 'database/connection.php';
    include 'inc/header.inc.php';
    include 'inc/navbar.inc.php';
?>

<?php
 $id=$_GET['sid'];
 $course=$_GET['course'];
 $q="SELECT DISTINCT sReg,sName,batch FROM v_stu WHERE cTitle IN (SELECT cTitle FROM  v_fac WHERE fId={$id} AND cTitle='{$course}')";
 $r=$conn->query($q);
?>
<div class="row-fluid" style="margin:5px;">
  <div class="col-md-4">
            <!-- block -->
    <div class="panel panel-default" >
      <div class="panel-heading" style="padding:2px; font-size: 14px; color:#fff; background-color:#95a5a6">
      Enrolled Student
      </div>
    <div class="panel-body">
      <div class="table-responsive">
          <table class="table table-condensed">
              <thead>
                  <tr>
                      <th>Reg No</th>
                      <th>Name</th>
                      <th>Batch</th>
                  </tr>
              </thead>
              <tbody style="font-size:14px;">
              <?php
                if($r->num_rows>0){
                  while($row = ($r->fetch_assoc())){
                    echo "<tr>";
                    echo "<td>".$row['sReg']."</td>";
                    echo "<td>".$row['sName']."</td>";
                    echo "<td>".$row['batch']."</td>";
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