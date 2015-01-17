<?php
    include 's_session.php';
    include 'database/connection.php';
    include 'inc/header.inc.php';
    include 'inc/navbar.inc.php';
?>
    <script type='text/javascript'>
    $(document).ready(function(){ 

      $(document).ajaxStart(function(){
          $('#loading').show();
            }).ajaxStop(function(){
              $('#loading').hide();
            });
         

      $("#studentUpdateEmail").click(function(){
          $("#updateValue").click(function(){
              var v= $("#getUpdatedValue").val();
              $.get(
              './updateEmailStudent.php',
              { 'email' : $("#getUpdatedValue").val(),'id' : $("#getRegId").html()},
              function(ajaxresult){
                $("#setUpdateEmail").html(ajaxresult);
              });
            });
        });

    });
    </script>
    
    <style>
    #loading{
      display:    none;
      position:   fixed;
      z-index:    1000;
      top:        0;
      left:       0;
      height:     100%;
      width:      100%;
      background: rgba( 255, 255, 255, .8 ) 
            url('img/thekha.gif') 
            50% 50% 
            no-repeat;
      opacity: 0.80;
    }
    </style>

<?php
    $reg = $_GET['SN'];

    $q1= "SELECT DISTINCT sName FROM stu WHERE sReg = '{$reg}'";
    $qq1=$conn->query($q1);
    if($qq1->num_rows>0){
      $sname = $qq1->fetch_assoc();
    }

    $q2= "SELECT DISTINCT sReg FROM stu WHERE sReg = '{$reg}'";
    $qq2=$conn->query($q2);
    if($qq2->num_rows>0){
      $sreg = $qq2->fetch_assoc();
    }

    $q3= "SELECT DISTINCT sName FROM stu WHERE sReg = '{$reg}'";
    $qq3=$conn->query($q3);
    if($qq3->num_rows>0){
      $sName = $qq3->fetch_assoc();
    }

    $q4= "SELECT DISTINCT sEmail FROM stu WHERE sReg = '{$reg}'";
    $qq4=$conn->query($q4);
    if($qq4->num_rows>0){
      $semail = $qq4->fetch_assoc();
    }

    $q5= "SELECT DISTINCT batch FROM stu WHERE sReg = '{$reg}'";
    $qq5=$conn->query($q5);
    if($qq5->num_rows>0){
      $sbatch = $qq5->fetch_assoc();
    }

    $q6= "SELECT DISTINCT pName FROM stu WHERE sReg = '{$reg}'";
    $qq6=$conn->query($q6);
    if($qq6->num_rows>0){
      $pname = $qq6->fetch_assoc();
    }
?>

  <div class="pull-center container" style="width:70%">
    <div class="panel panel-default" >
      <div class="panel-heading" style="padding:2px; font-size: 14px; color:#fff; background-color:#95a5a6">
          <h4 style='text-align:center; color:#fff'>STUDENT PROFILE</h4>
      </div>

   <div class="panel-body">
      <div class="table-responsive">
          <table class="table table-condensed table-striped">
              <thead>
              </thead>
              <tbody style="font-size:14px;">
        
        <?php 
          echo "<tr><td>REGISTRATION NO : <label><span id = 'getRegId'>".$sreg['sReg']."</span></label></td></tr>";?>
        <?php  
          echo "<tr><td>NAME : <label>".$sname['sName']."</label></td></tr>";?>
        <?php 
          echo "<tr><td>EMAIL : <label><span id = 'setUpdateEmail'>".$semail['sEmail']."</span></label><a  class='btn btn-default btn-xs pull-right forget' id='studentUpdateEmail' data-toggle='modal' data-target='.forget-modal'>
          <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>Change</a></td></tr>";?>
        <?php  
          echo "<tr><td>BATCH : <label>".$sbatch['batch']."</label></td></tr>";
          echo "<tr><td>PROGRAM NAME : <label>".$pname['pName']."</label></td></tr>";
        ?>
          
         </tbody>
          </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title">Update</h4>
      </div>
    <div class="modal-body">
      <p>Type here</p>
        <input type="text" id="getUpdatedValue" class="form-control" autocomplete="off">
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" id="updateValue" class="btn btn-custom">Update</button>
      </div>

    </div> 
  </div> 
</div> 

<div id="loading">
    <div>Loading .. </div>
</div>


<?php
    include 'inc/footer.inc.php';
?>