<?php
		$connection=mysql_connect("localhost","root","toor");
		mysql_select_db("project",$connection);
?>

<html>
<head>
<title>Results</title>
</head>

<body>
	<?php
		//displaying the initial details

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


           	echo "<table width='950' height='200' border='5' align='center' margin='5px'>";
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


		//displaying the results -first semester
		$total_ch=0;
		$ch_into_gpa=0;
		echo"<a href='dashboard.php?student_reg=$reg_num'>Dashboard</a><br>";

		echo"<a href='Courses.php'>Courses</a><br>";
		echo"<a href='Results.php?student_reg=$reg_num'>Result</a><br>";





		$first_result_query="select * from students_results where student_reg='$reg_num' AND course_semester='1'";
		$run_query=mysql_query($first_result_query);
		if (!$run_query)
		{
    		die('Invalid query: ' . mysql_error());
		}
		if(mysql_num_rows($run_query)!=0)
		{

		echo "<table width='950' height='200' border='5' align='center'>";
		echo "<tr>";
		echo "<th align='center' colspan='6'>"."First semester"."</th>";
		echo "</tr>";

		echo "<tr>";
		echo "<th>"."Course Title"."</th>";
		echo "<th>"."Grade"."</th>";
		echo "<th>"."GPA"."</th>";
		echo "</tr>";


		while($row_results=mysql_fetch_array($run_query))
		{
			$course_title=$row_results['course_title'];
			$course_grade=$row_results['course_grade'];
			$course_gpa=$row_results['course_gpa'];
			$course_ch=$row_results['course_ch'];

			//converting these value to float to calculate the sgpa later

			$course_ch_float=floatval($course_ch);
			$course_gpa_float=floatval($course_gpa);
			$ch_into_gpa=$ch_into_gpa+($course_gpa_float*$course_ch_float);
			$total_ch=$total_ch+$course_ch_float;


			echo "<tr>";
			echo "<td>".$course_title."</td>";
		    echo "<td>".$course_grade."</td>";
		    echo "<td>".$course_gpa."</td>";

			echo "</tr>";



		}
		$sgpa=$ch_into_gpa/$total_ch;
		echo "<tr>";
		echo "<td colspan='6'>"."<b>"."sgpa--".$sgpa."</b>"."</td>";


		echo "</table>";
		}
		else
			echo '';
		//end of results -first semester


		//displaying second semester result

		$total_ch=0;
		$ch_into_gpa=0;
		echo "</table>";




		$first_result_query="select * from students_results where student_reg='$reg_num' AND course_semester='2'";
		$run_query=mysql_query($first_result_query);
		if (!$run_query)
		{
    		die('Invalid query: ' . mysql_error());
		}




		if(mysql_num_rows($run_query)!=0)
		{
		echo "<table width='950' height='200' border='5' align='center'>";
		echo "<tr>";
		echo "<th align='center' colspan='6'>"."Second semester"."</th>";
		echo "</tr>";

		echo "<tr>";
		echo "<th>"."Course Title"."</th>";
		echo "<th>"."Grade"."</th>";
		echo "<th>"."GPA"."</th>";
		echo "</tr>";


		while($row_results=mysql_fetch_array($run_query))
		{
			$course_title=$row_results['course_title'];
			$course_grade=$row_results['course_grade'];
			$course_gpa=$row_results['course_gpa'];
			$course_ch=$row_results['course_ch'];

			//converting these value to float to calculate the sgpa later

			$course_ch_float=floatval($course_ch);
			$course_gpa_float=floatval($course_gpa);
			$ch_into_gpa=$ch_into_gpa+($course_gpa_float*$course_ch_float);
			$total_ch=$total_ch+$course_ch_float;


			echo "<tr>";
			echo "<td>".$course_title."</td>";
		    echo "<td>".$course_grade."</td>";
		    echo "<td>".$course_gpa."</td>";

			echo "</tr>";



		}
		$sgpa=$ch_into_gpa/$total_ch;
		echo "<tr>";
		echo "<td colspan='6'>"."<b>"."sgpa--".$sgpa."</b>"."</td>";


		echo "</table>";
		}
		else
			echo '';
		//end of results -second semester

		//displaying third semester result


		$total_ch=0;
		$ch_into_gpa=0;
		echo "</table>";




		$first_result_query="select * from students_results where student_reg='$reg_num' AND course_semester='3'";
		$run_query=mysql_query($first_result_query);
		if (!$run_query)
		{
    		die('Invalid query: ' . mysql_error());
		}
		if(mysql_num_rows($run_query)!=0)
		{
		echo "<table width='950' height='200' border='5' align='center'>";
		echo "<tr>";
		echo "<th align='center' colspan='6'>"."Third semester"."</th>";
		echo "</tr>";

		echo "<tr>";
		echo "<th>"."Course Title"."</th>";
		echo "<th>"."Grade"."</th>";
		echo "<th>"."GPA"."</th>";
		echo "</tr>";


		while($row_results=mysql_fetch_array($run_query))
		{
			$course_title=$row_results['course_title'];
			$course_grade=$row_results['course_grade'];
			$course_gpa=$row_results['course_gpa'];
			$course_ch=$row_results['course_ch'];

			//converting these value to float to calculate the sgpa later

			$course_ch_float=floatval($course_ch);
			$course_gpa_float=floatval($course_gpa);
			$ch_into_gpa=$ch_into_gpa+($course_gpa_float*$course_ch_float);
			$total_ch=$total_ch+$course_ch_float;


			echo "<tr>";
			echo "<td>".$course_title."</td>";
		    echo "<td>".$course_grade."</td>";
		    echo "<td>".$course_gpa."</td>";

			echo "</tr>";



		}
		$sgpa=$ch_into_gpa/$total_ch;
		echo "<tr>";
		echo "<td colspan='6'>"."<b>"."sgpa--".$sgpa."</b>"."</td>";


		echo "</table>";
		}
		else
			echo '';
		//end of results -third semester



		//displaying fourthsemester result


		$total_ch=0;
		$ch_into_gpa=0;
		echo "</table>";




		$first_result_query="select * from students_results where student_reg='$reg_num' AND course_semester='4'";
		$run_query=mysql_query($first_result_query);
		if (!$run_query)
		{
    		die('Invalid query: ' . mysql_error());
		}
		if(mysql_num_rows($run_query)!=0)
		{
		echo "<table width='950' height='200' border='5' align='center'>";
		echo "<tr>";
		echo "<th align='center' colspan='6'>"."Fourth semester"."</th>";
		echo "</tr>";

		echo "<tr>";
		echo "<th>"."Course Title"."</th>";
		echo "<th>"."Grade"."</th>";
		echo "<th>"."GPA"."</th>";
		echo "</tr>";


		while($row_results=mysql_fetch_array($run_query))
		{
			$course_title=$row_results['course_title'];
			$course_grade=$row_results['course_grade'];
			$course_gpa=$row_results['course_gpa'];
			$course_ch=$row_results['course_ch'];

			//converting these value to float to calculate the sgpa later

			$course_ch_float=floatval($course_ch);
			$course_gpa_float=floatval($course_gpa);
			$ch_into_gpa=$ch_into_gpa+($course_gpa_float*$course_ch_float);
			$total_ch=$total_ch+$course_ch_float;


			echo "<tr>";
			echo "<td>".$course_title."</td>";
		    echo "<td>".$course_grade."</td>";
		    echo "<td>".$course_gpa."</td>";

			echo "</tr>";



		}
		$sgpa=$ch_into_gpa/$total_ch;
		echo "<tr>";
		echo "<td colspan='6'>"."<b>"."sgpa--".$sgpa."</b>"."</td>";


		echo "</table>";
		}
		else
			echo '';
		//end of results -fourth semester


		//displaying fifth semester result


		$total_ch=0;
		$ch_into_gpa=0;
		echo "</table>";




		$first_result_query="select * from students_results where student_reg='$reg_num' AND course_semester='5'";
		$run_query=mysql_query($first_result_query);
		if (!$run_query)
		{
    		die('Invalid query: ' . mysql_error());
		}
		if(mysql_num_rows($run_query)!=0)
		{
		echo "<table width='950' height='200' border='5' align='center'>";
		echo "<tr>";
		echo "<th align='center' colspan='6'>"."Fifth semester"."</th>";
		echo "</tr>";

		echo "<tr>";
		echo "<th>"."Course Title"."</th>";
		echo "<th>"."Grade"."</th>";
		echo "<th>"."GPA"."</th>";
		echo "</tr>";


		while($row_results=mysql_fetch_array($run_query))
		{
			$course_title=$row_results['course_title'];
			$course_grade=$row_results['course_grade'];
			$course_gpa=$row_results['course_gpa'];
			$course_ch=$row_results['course_ch'];

			//converting these value to float to calculate the sgpa later

			$course_ch_float=floatval($course_ch);
			$course_gpa_float=floatval($course_gpa);
			$ch_into_gpa=$ch_into_gpa+($course_gpa_float*$course_ch_float);
			$total_ch=$total_ch+$course_ch_float;


			echo "<tr>";
			echo "<td>".$course_title."</td>";
		    echo "<td>".$course_grade."</td>";
		    echo "<td>".$course_gpa."</td>";

			echo "</tr>";



		}
		$sgpa=$ch_into_gpa/$total_ch;
		echo "<tr>";
		echo "<td colspan='6'>"."<b>"."sgpa--".$sgpa."</b>"."</td>";


		echo "</table>";
		}
		else
			echo '';
		//end of results -fifth semester


		//displaying sixth semester result


		$total_ch=0;
		$ch_into_gpa=0;
		echo "</table>";




		$first_result_query="select * from students_results where student_reg='$reg_num' AND course_semester='6'";
		$run_query=mysql_query($first_result_query);
		if (!$run_query)
		{
    		die('Invalid query: ' . mysql_error());
		}
		if(mysql_num_rows($run_query)!=0)
		{
		echo "<table width='950' height='200' border='5' align='center'>";
		echo "<tr>";
		echo "<th align='center' colspan='6'>"."Sixth semester"."</th>";
		echo "</tr>";

		echo "<tr>";
		echo "<th>"."Course Title"."</th>";
		echo "<th>"."Grade"."</th>";
		echo "<th>"."GPA"."</th>";
		echo "</tr>";


		while($row_results=mysql_fetch_array($run_query))
		{
			$course_title=$row_results['course_title'];
			$course_grade=$row_results['course_grade'];
			$course_gpa=$row_results['course_gpa'];
			$course_ch=$row_results['course_ch'];

			//converting these value to float to calculate the sgpa later

			$course_ch_float=floatval($course_ch);
			$course_gpa_float=floatval($course_gpa);
			$ch_into_gpa=$ch_into_gpa+($course_gpa_float*$course_ch_float);
			$total_ch=$total_ch+$course_ch_float;


			echo "<tr>";
			echo "<td>".$course_title."</td>";
		    echo "<td>".$course_grade."</td>";
		    echo "<td>".$course_gpa."</td>";

			echo "</tr>";



		}
		$sgpa=$ch_into_gpa/$total_ch;
		echo "<tr>";
		echo "<td colspan='6'>"."<b>"."sgpa--".$sgpa."</b>"."</td>";


		echo "</table>";
		}
		else
			echo '';
		//end of results -sixth semester


		//displaying seventh semester result


		$total_ch=0;
		$ch_into_gpa=0;
		echo "</table>";




		$first_result_query="select * from students_results where student_reg='$reg_num' AND course_semester='7'";
		$run_query=mysql_query($first_result_query);
		if (!$run_query)
		{
    		die('Invalid query: ' . mysql_error());
		}
		if(mysql_num_rows($run_query)!=0)
		{
		echo "<table width='950' height='200' border='5' align='center'>";
		echo "<tr>";
		echo "<th align='center' colspan='6'>"."Seventh semester"."</th>";
		echo "</tr>";

		echo "<tr>";
		echo "<th>"."Course Title"."</th>";
		echo "<th>"."Grade"."</th>";
		echo "<th>"."GPA"."</th>";
		echo "</tr>";


		while($row_results=mysql_fetch_array($run_query))
		{
			$course_title=$row_results['course_title'];
			$course_grade=$row_results['course_grade'];
			$course_gpa=$row_results['course_gpa'];
			$course_ch=$row_results['course_ch'];

			//converting these value to float to calculate the sgpa later

			$course_ch_float=floatval($course_ch);
			$course_gpa_float=floatval($course_gpa);
			$ch_into_gpa=$ch_into_gpa+($course_gpa_float*$course_ch_float);
			$total_ch=$total_ch+$course_ch_float;


			echo "<tr>";
			echo "<td>".$course_title."</td>";
		    echo "<td>".$course_grade."</td>";
		    echo "<td>".$course_gpa."</td>";

			echo "</tr>";



		}
		$sgpa=$ch_into_gpa/$total_ch;
		echo "<tr>";
		echo "<td colspan='6'>"."<b>"."sgpa--".$sgpa."</b>"."</td>";


		echo "</table>";
		}
		else
			echo '';
		//end of results seventh semester



		//displaying eight semester result


		$total_ch=0;
		$ch_into_gpa=0;
		echo "</table>";




		$first_result_query="select * from students_results where student_reg='$reg_num' AND course_semester='8'";
		$run_query=mysql_query($first_result_query);
		if (!$run_query)
		{
    		die('Invalid query: ' . mysql_error());
		}
		if(mysql_num_rows($run_query)!=0)
		{
		echo "<table width='950' height='200' border='5' align='center'>";
		echo "<tr>";
		echo "<th align='center' colspan='6'>"."Eight semester"."</th>";
		echo "</tr>";

		echo "<tr>";
		echo "<th>"."Course Title"."</th>";
		echo "<th>"."Grade"."</th>";
		echo "<th>"."GPA"."</th>";
		echo "</tr>";


		while($row_results=mysql_fetch_array($run_query))
		{
			$course_title=$row_results['course_title'];
			$course_grade=$row_results['course_grade'];
			$course_gpa=$row_results['course_gpa'];
			$course_ch=$row_results['course_ch'];

			//converting these value to float to calculate the sgpa later

			$course_ch_float=floatval($course_ch);
			$course_gpa_float=floatval($course_gpa);
			$ch_into_gpa=$ch_into_gpa+($course_gpa_float*$course_ch_float);
			$total_ch=$total_ch+$course_ch_float;


			echo "<tr>";
			echo "<td>".$course_title."</td>";
		    echo "<td>".$course_grade."</td>";
		    echo "<td>".$course_gpa."</td>";

			echo "</tr>";



		}
		$sgpa=$ch_into_gpa/$total_ch;
		echo "<tr>";
		echo "<td colspan='6'>"."<b>"."sgpa--".$sgpa."</b>"."</td>";


		echo "</table>";
		}
		else
			echo '';
		//end of results -eight semester






		?>



</body>





</html>
