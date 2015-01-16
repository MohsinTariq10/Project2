<?php
    include 'database/connection.php';
    include 'inc/header.inc.php';
    include 'inc/navbar.inc.php';
?>
<script>
    $(document).ready(function(){ 
        $("#submit").click(function(){
          var sn= $("#fServiceNo").val();
          var url = "facultypage.php?FS="+sn;
          $.get(
          './facultylogincheck.php',
          { 'SN' : $("#fServiceNo").val(),'pass' : $("#fPassword").val()},
          function(ajaxresult){
            if(ajaxresult == 'Yes'){
                $(location).attr('href',url);
                }
            else
                alert("Invalid user name or password");
          });
        });
    });
</script>
<?php

?>
<div class="container">
    <div class="row">
        <div id="formalign">
            <div class="form-wrap">
                <form action="#" method="post" id="login-form" autocomplete="off">
                    <div class="form-group">
                        <label for="input" class="sr-only">Service No</label>
                        <input type="text" id="fServiceNo" class="form-control" placeholder="Service No">
                    </div>
                    <div class="form-group">
                        <label for="student_pass" class="sr-only">Password</label>
                        <input type="password" id="fPassword" class="form-control" placeholder="Password">
                    </div>
                    <div class="checkbox">
                        <span class="character-checkbox" onclick="showPassword()"></span>
                        <span class="label">Show password</span>
                    </div>
                    <input type="submit" class="btn btn-custom btn-lg btn-block" id="submit" value="submit">
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
