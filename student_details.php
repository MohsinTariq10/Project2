<?php
		$connection=mysql_connect("localhost","root","toor");
		mysql_select_db("project",$connection);


?>

<html>
	<head>
		<title>
		Student Profile
		</title>
		<style>
		#initials
		{

		    padding:50px;
		     margin:50px;

		}


		</style>
	</head>
	<body>
	<h2><i>Welcome to Your profile!</i></h2>







		<?php


		$reg_num=$_GET['student_reg'];
		  // check this
		$student_details_query="select * from students_details WHERE student_reg='$reg_num' ";
		$run_query=mysql_query($student_details_query);

		if (!$run_query) {
    	die('Invalid query: ' . mysql_error());
		}


		while($row_details=mysql_fetch_array($run_query))
		{

           $student_reg=$row_details['student_reg'];
           $student_name=$row_details['student_name'];
           $student_fname=$row_details['student_fname'];
           $student_cnic=$row_details['student_cnic'];
           $student_img=$row_details['student_img'];
            echo "<img src='admin_area/students_images/$student_img' width='180' height='180' align='center' border='5b'>";

           	echo "<table width='950' height='200' border='5' align='center'>";
            echo "<tr>";
            echo "<td bgcolor='#E5E4E2'>"."<b>" ."Name"."</b>"."</td>";
			echo "<td bgcolor='#E5E4E2'>". $student_name."</td>";



			echo "<td bgcolor='#E5E4E2'>". "Registration no" ."</td>";
			echo "<td bgcolor='#E5E4E2'>". $student_reg ."</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td bgcolor='#E5E4E2'>". "Father Name" ."</td>";
			echo "<td bgcolor='#E5E4E2'>". $student_fname ."</td>";



			echo "<td bgcolor='#E5E4E2'>". "CNIC" ."</td>";
			echo "<td bgcolor='#E5E4E2'>". $student_cnic ."</td>";
			echo "</tr>";










		}
		echo "</table>";


		echo"<a href='dashboard.php?student_reg=$reg_num'>Dashboard</a><br>";

		echo"<a href='Courses.php'>Courses</a><br>";
		echo"<a href='Results.php?student_reg=$reg_num'>Result</a><br>";





		?>









	</body>





</html>
