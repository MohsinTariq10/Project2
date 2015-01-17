<?php
    include 'database/connection.php';
    include 'inc/header.inc.php';
    include 'inc/navbar.inc.php';
?>
  
 <div class="row">
    <div id="formalign1">
          <div class="form-wrap">
                <form action="facultyreg.php" method="post" id="login-form" autocomplete="off">
                    <div class="form-group">
                        <label for="input" class="sr-only">Service Number</label>
                        <input type="text" name="fno" id="fNo" class="form-control" placeholder="Service No">
                    </div>
                    <div class="form-group">
                        <label for="student_pass" class="sr-only">Name</label>
                        <input type="text" name="fname" id="fName" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="student_pass" class="sr-only">Email</label>
                        <input type="text" name="fmail" id="fEmail" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="student_pass" class="sr-only">Qualification</label>
                        <input type="text" name="fqual" id="fQual" class="form-control" placeholder="Qualification">
                    </div>
                    <div class="form-group">
                        <label for="student_pass" class="sr-only">Rank</label>
                        <select class="form-control" name="fRank">
                            <option>Professor</option>
                            <option>Associate Professor</option>
                            <option>Assistant Professor</option>
                            <option>Lecturer</option>
                            <option>Lab Engineer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="student_pass" class="sr-only">Appointment</label>
                        <select class="form-control" name="fApp">
                            <option>Chairman</option>
                            <option>Semester Coordinator</option> 
                            <option>Nil</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="student_pass" class="sr-only">Password</label>
                        <input type="Password"  name="fpass" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="student_pass" class="sr-only">Confirm Password</label>
                        <input type="Password" name="fconpass" class="form-control" placeholder="Confirm Password">
                    </div>
                    <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" name="submit" value="Register">
                </form>
          </div>
    </div> 
</div>
<?php
    if(isset ($_POST['submit']))
    {

        $SN = $_POST['fno'];
        //echo $SN;

        $name = $_POST['fname'];
        //echo $name;

        $mail = $_POST['fmail'];
        //echo $mail;

        $qual = $_POST['fqual'];
        //echo $qual;

        $rank = $_POST['fRank'];
        //echo $rank;

        $app = $_POST['fApp'];
        //echo $app;

        $fpass = $_POST['fpass'];
        //echo $fpass;

        $q1="INSERT INTO fac VALUES ('{$SN}','{$name}','{$mail}','{$qual}','{$rank}','{$app}','N','{$fpass}')";
        $r=$conn->query($q1);

    }
?>
<?php
    include 'inc/footer.inc.php';
?>
