<?php
    include 'inc/header.inc.php';
    include 'inc/navbar.inc.php';
?>

<div class="container">
    <div class="row">
        <div id="formalign">
            <div class="form-wrap">
                <form action="facultylogincheck.php" method="post" id="login-form" autocomplete="off">
                    <div class="form-group">
                        <label for="input" class="sr-only">Service No</label>
                        <input type="text" name="fServiceNo" class="form-control" placeholder="Service No">
                    </div>
                    <div class="form-group">
                        <label for="student_pass" class="sr-only">Password</label>
                        <input type="password" name="fPassword" id="fPassword" class="form-control" placeholder="Password">
                    </div>
                    <div class="checkbox">
                        <span class="character-checkbox" onclick="showPassword()"></span>
                        <span class="label">Show password</span>
                    </div>
                    <input type="submit" class="btn btn-custom btn-lg btn-block" name="submit" value="submit">
                </form>
            </div>
        </div> 
    </div> <!-- /.container -->
</div>
<script>
    function showPassword() {
        var key_attr = $('#fPassword').attr('type');
        if(key_attr != 'text') {
            $('.checkbox').addClass('show');
            $('#fPassword').attr('type', 'text');
        } else {
            $('.checkbox').removeClass('show');
            $('#fPassword').attr('type', 'password');
        }
    }
</script>

<?php
    include 'inc/footer.inc.php';
?>
