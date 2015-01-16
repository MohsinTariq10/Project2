<?php
    include 'session.php';
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
         


      $("#updateName").click(function(){
        alert('Name k lye');
          $("#updateValue").click(function(){
              var v= $("#getUpdatedValue").val();
              $.get(
              './updateName.php',
              { 'name' : $("#getUpdatedValue").val(),'id' : $("#getServiceId").html()},
              function(ajaxresult){
                alert(ajaxresult);
                $("#setUpdateName").html(ajaxresult);
              });
            });
        });

      $("#updateEmail").click(function(){
        alert('mail k lye');
          $("#updateValue").click(function(){
              var v= $("#getUpdatedValue").val();
              $.get(
              './updateEmail.php',
              { 'email' : $("#getUpdatedValue").val(),'id' : $("#getServiceId").html()},
              function(ajaxresult){
                $("#setUpdateEmail").html(ajaxresult);
              });
            });
        });

        $("#submitPassword").click(function(){
            alert('Password');
              var v= $("#newPassword").val();
              $.get(
              './updatePassword.php',
              { 'password' : $("#newPassword").val(),'id' : $("#getServiceId").html()},
              function(ajaxresult){
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
    $id = $_GET['SN'];
    $q1= "SELECT DISTINCT fName FROM V_fac WHERE fId = {$id}";
    $qq1=$conn->query($q1);
    if($qq1->num_rows>0){
      $fname = $qq1->fetch_assoc();
    }

    $q2= "SELECT DISTINCT fId FROM V_fac WHERE fId = {$id}";
    $qq2=$conn->query($q2);
    if($qq2->num_rows>0){
      $fid = $qq2->fetch_assoc();
    }

    $q3= "SELECT DISTINCT fEmail FROM V_fac WHERE fId = {$id}";
    $qq3=$conn->query($q3);
    if($qq3->num_rows>0){
      $femail = $qq3->fetch_assoc();
    }

    $q4= "SELECT DISTINCT fQual FROM V_fac WHERE fId = {$id}";
    $qq4=$conn->query($q4);
    if($qq4->num_rows>0){
      $fqual = $qq4->fetch_assoc();
    }

    $q5= "SELECT DISTINCT fRank FROM V_fac WHERE fId = {$id}";
    $qq5=$conn->query($q5);
    if($qq5->num_rows>0){
      $frank = $qq5->fetch_assoc();
    }

    $q6= "SELECT DISTINCT fAppointment FROM V_fac WHERE fId = {$id}";
    $qq6=$conn->query($q6);
    if($qq6->num_rows>0){
      $fappointment = $qq6->fetch_assoc();
    }
?>
  <div class="container" style="width:40%">
    <div class="row-fluid">

      <div class="panel panel-default pull-center" style="background-color:#95a5a6">
          <?php          
              echo "<h4 style='text-align:center; color:#fff'>Welcome</h4>";
          ?>         
      </div>

      <table class="table table-condensed" style="border: 1px solid #95a5a6">
        <tbody style="font-family: Arial, Helvetica, sans-serif; font-size:13px;">
        
        <?php 
          echo "<tr><td>SERVICE NO :<span id = 'getServiceId'> ".$fid['fId']."</span></td></tr>";?>
        <?php  
          echo "<tr><td>NAME : <span id = 'setUpdateName'>".$fname['fName']."</span>
          <a class='btn btn-default btn-xs pull-right forget' id='updateName' data-toggle='modal' data-target='.forget-modal'>
          <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>Change</a></td></tr>";?>
        <?php 
          echo "<tr><td>EMAIL : <span id = 'setUpdateEmail'>".$femail['fEmail']."</span><a  class='btn btn-default btn-xs pull-right forget' id='updateEmail' data-toggle='modal' data-target='.forget-modal'>
          <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>Change</a></td></tr>";?>
        <?php  
          echo "<tr><td>QUALIFICATION : <span id = 'setUpdateQual'>".$fqual['fQual'] ."</span><a href='javascript:;' class='btn btn-default btn-xs pull-right forget' id='updateQual' data-toggle='modal' data-target='.forget-modal' aria-label='Right Align'>
          <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>Change</a></td></tr>";
          echo "<tr><td>RANK : <span id = 'setUpdateRank'>".$frank['fRank'] ."</span><a href='javascript:;' class='btn btn-default btn-xs pull-right forget' id='updateRank' data-toggle='modal' data-target='.forget-modal' aria-label='Right Align'>
          <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>Change</a></td></tr>";
          echo "<tr><td>APPOINTMENT : <span id = 'setUpdateApp'>".$fappointment['fAppointment']."</span><a href='javascript:;' class='btn btn-default btn-xs pull-right forget' id='updateAppointment' data-toggle='modal' data-target='.forget-modal' aria-label='Right Align'>
          <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>Change</a></td></tr>";
          echo "<tr><td>CHANGE PASSWORD :";
          echo "<input type='password'  id='newPassword'  placeholder='New Password'>";
          echo "<input type='password'  id='key'  placeholder='Confirm Password'></td></tr>";
          echo "<tr><td ><button type='button' id='submitPassword' class='btn btn-default btn-block' aria-label='Right Align'><span class='glyphicon glyphicon-ok'></span></button></td></tr>
          ";
        ?>
          
        </tbody>
      </table>
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
