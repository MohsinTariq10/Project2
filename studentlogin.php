<?php
	include 'database/connection.php';
    include 'inc/header.inc.php';
    include 'inc/navbar.inc.php';
?>

<link href="css/login-form.css" rel="stylesheet">

<div class="container">
    <div class="row">
        <div id="formalign">
            <div class="form-wrap">
                <form action="studentlogincheck.php" method="post" id="login-form" autocomplete="off">
                    <div class="form-group">
                        <label for="input" class="sr-only">Registration Number</label>
                        <input type="text" name="student_reg" id="studentreg" class="form-control" placeholder="11PWCSE0942">
                    </div>
                    <div class="form-group">
                        <label for="student_pass" class="sr-only">Password</label>
                        <input type="password" name="student_pass" id="studentpass" class="form-control" placeholder="Password">
                    </div>
                    <div class="checkbox">
                        <span class="character-checkbox" onclick="showPassword()"></span>
                        <span class="label">Show password</span>
                    </div>
                    <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" name="stu_submit" value="Log in">
                </form>
            </div>
        </div> 
    </div> <!-- /.container -->
</div>

<script>
    function showPassword() {
        var key_attr = $('#studentpass').attr('type');
        if(key_attr != 'text') {
            $('.checkbox').addClass('show');
            $('#studentpass').attr('type', 'text');
        } else {
            $('.checkbox').removeClass('show');
            $('#studentpass').attr('type', 'password');
        }
    }
</script>

<?php    
    include 'inc/footer.inc.php';
?>
