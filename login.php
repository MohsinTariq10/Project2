<?php
	include 'database/connection.php';
    include 'inc/header.inc.php';
    include 'inc/navbar.inc.php';
    /*    
    if(isset($_POST['submit'])){
        $FSN=$_POST['fServiceNo'];

        $stmt = dbQuery('select * from stu where fid={$FSN}'),
            array('reg' => $student_reg, 'pass' => $student_pass));
        $result = $stmt->fetchAll;
        if ($stmt->rowCount() == 1) {
            $user_id = $result[0][0];
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_reg'] = $student_reg;
            $r = dbRow('select * from student where reg_num=:reg AND password= :pass',
                array('reg' => $student_reg, 'pass' => $student_pass));
            $_SESSION['userdata'] = $r;
            header('Location: index.php');
            // header("Location:student_details.php?id=".$user_id);
            // echo "You are logged in succefully";
            // echo "<br>";
            // echo "<a href='student_details.php?student_reg=$student_reg'>View your Profile</a>";
        }else{
            echo "<script>alert('Invalid user name or password')</script>";
        }
    }
    */
    include 'inc/loginform.inc.php';
    include 'inc/footer.inc.php';
?>
