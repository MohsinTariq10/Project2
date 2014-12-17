<?php
    include 'views/header.view.php';
    include 'views/navbar.view.php';
    require 'config.php';
    require 'functions.php';

    $conn =  connect($config);
    if($conn){
        if(isset($_POST['submit'])){
            echo "<h1> here i am </h1>";
            $student_reg=$_POST['student_reg'];
            $student_pass=$_POST['student_pass'];
            $result = query("select * from student where reg_num=':reg' AND password= :pass",
                array('reg' => $student_reg, 'pass' => $student_pass),$conn);

            if($result.rowCount()==1){
              echo "You are logged in succefully";
              echo "<br>";
              echo "<a href='student_details.php?student_reg=$student_reg'>View your Profile</a>";
            }else{
                echo "<script>alert('Invalid user name or password')</script>";
            }
        }
    }else{
        echo "Could not connect to the db.";
    }


?>

<link href="css/login-form.css" rel="stylesheet">

<section id="login">
<div class="container">
  <div class="row">
      <div class="col-xs-12">
          <div class="form-wrap">
            <h1>Log in with your email account</h1>
                <form role="form" action="login.php" method="post" id="login-form" autocomplete="off">
                    <div class="form-group">
                        <label for="input" class="sr-only">Registration Number</label>
                        <input type="text" name="student_reg" id="email" class="form-control" placeholder="11PWCSE0938">
                    </div>
                    <div class="form-group">
                        <label for="student_pass" class="sr-only">Password</label>
                        <input type="password" name="student_pass" id="key" class="form-control" placeholder="Password">
                    </div>
                    <div class="checkbox">
                        <span class="character-checkbox" onclick="showPassword()"></span>
                        <span class="label">Show password</span>
                    </div>
                    <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">
                </form>
                <a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a
          </div>
    </div> <!-- /.col-xs-12 -->
  </div> <!-- /.row -->
</div> <!-- /.container -->
</section>

<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title">Recovery password</h4>
      </div>
      <div class="modal-body">
        <p>Type your email account</p>
        <input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-custom">Recovery</button>
      </div>
    </div> <!-- /.modal-content -->
  </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->

<script>
    function showPassword() {
        var key_attr = $('#key').attr('type');
        if(key_attr != 'text') {
            $('.checkbox').addClass('show');
            $('#key').attr('type', 'text');
        } else {
            $('.checkbox').removeClass('show');
            $('#key').attr('type', 'password');
        }
    }

</script>
<?php
    include 'views/footer.view.php';
?>
