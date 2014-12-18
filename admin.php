<?php
    include 'inc/header.inc.php';
    include 'inc/navbar.inc.php';

    if(isset($_POST['submit'])){
        $student_reg=$_POST['student_reg'];
        $student_pass=$_POST['student_pass'];

        // check lagana hai k reg aur pass hai ya nai based on that error post karna hai

        $stmt = dbQuery('select * from student where reg_num=:reg AND password= :pass',
            array('reg' => $student_reg, 'pass' => $student_pass));
        $result = $stmt->fetchAll();
        if ($stmt->rowCount() == 1) {
            $user_id = $result[0][0];
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_reg'] = $student_reg;
            // header("Location:student_details.php?id=".$user_id);
            echo "You are logged in succefully";
            echo "<br>";
            echo "<a href='student_details.php?student_reg=$student_reg'>View your Profile</a>";
        }else{
            echo "<script>alert('Invalid user name or password')</script>";
        }
    }

    include 'inc/loginform.inc.php';
    include 'inc/footer.inc.php';
?>
