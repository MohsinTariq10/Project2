<?php
    include 'database/connection.php';
    include 'inc/header.inc.php';
    include 'inc/navbar.inc.php';
?>

<?php
    //$reg = $_GET['SN'];

    $q1= "SELECT cCode FROM v_course";
    $qq1=$conn->query($q1);
    if($qq1->num_rows>0){
      $ccode = $qq1->fetch_assoc();
    }

    $q1= "SELECT cTitle FROM v_course";
    $qq1=$conn->query($q1);
    if($qq1->num_rows>0){
      $ctitle = $qq1->fetch_assoc();
    }

    $q1= "SELECT cCH FROM v_course";
    $qq1=$conn->query($q1);
    if($qq1->num_rows>0){
      $cch = $qq1->fetch_assoc();
    }

    $q1= "SELECT pName FROM v_course";
    $qq1=$conn->query($q1);
    if($qq1->num_rows>0){
      $pname = $qq1->fetch_assoc();
    }

    $q1= "SELECT fName FROM v_course";
    $qq1=$conn->query($q1);
    if($qq1->num_rows>0){
      $fname = $qq1->fetch_assoc();
    }

    $q1= "SELECT description FROM v_course";
    $qq1=$conn->query($q1);
    if($qq1->num_rows>0){
      $desc = $qq1->fetch_assoc();
    }

    $q1= "SELECT link FROM v_course";
    $qq1=$conn->query($q1);
    if($qq1->num_rows>0){
      $link = $qq1->fetch_assoc();
    }
    
?>

  <div class="container pull-center">   
    <div class="panel panel-default" >
      <div class="panel-heading" style="padding:2px; font-size: 14px; color:#fff; background-color:#95a5a6">
        <?php          
              echo "<h4 style='text-align:center; color:#fff'>COURSE DETAILS</h4>";
        ?>         
      </div>
    <div class="panel-body">
      <div class="table-responsive">
          <table class="table table-condensed">
              <thead>
              </thead>
              <tbody style="font-size:14px;">
              <?php
                 
                echo "<tr><td>COURSE CODE : <label>".$ccode['cCode']."</label></td></tr>
                <tr><td>NAME : <label>".$ctitle['cTitle']."</label></td></tr> 
                <tr><td>CREDIT HOURS : <label>".$cch['cCH']."</label></td></tr>
                <tr><td>OFFERED IN PROGRAM : <label>".$pname['pName']."</label></td></tr>
                <tr><td>COURSE INSTRUCTOR : <label>".$fname['fName']."</label></td></tr>
                <tr><td>COURSE DESCRIPTION : <label>".$desc['description']."</label></td></tr>
                <tr><td>LINK TO COURSE MATERIAL : <label>".$link['link']."</label></td></tr>";
                
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