<?php
    
?>
<link href="css/login-form.css" rel="stylesheet">

 <div class="container">
    <div class="row">
    <div id="formalign">
          <div class="form-wrap">
                <form action="login.php" method="post" id="login-form" autocomplete="off">
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
                    <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" name="submit" value="Log in">
                </form>
          </div>
    </div> 
    </div> <!-- /.container -->
  </div>
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
