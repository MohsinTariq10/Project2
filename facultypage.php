<?php
    include 'database/connection.php';
    include 'inc/header.inc.php';
    include 'inc/navbar.inc.php';
?>

<?php
    //if(isset($_['submit'])){
        $FSN = $_GET['FS'];
        //$FP = $_POST['fPassword'];
        $q1 = "SELECT fName FROM v_fac WHERE fId={$FSN}";
        $fName = $conn->query($q1);
        if(!$fName){
          echo "query failed";
        }

        $q2="SELECT COUNT(DISTINCT cCode) AS count FROM v_fac WHERE fId={$FSN}";
        $noOfCourses = $conn->query($q2);
         if ($noOfCourses->num_rows > 0) {
          $row = $noOfCourses->fetch_assoc();
          echo $row['count'];
          $tc = $row['count'];
        }
       $q3 = "SELECT DISTINCT cTitle FROM v_fac WHERE fId={$FSN}";
       $coursesNames = $conn->query($q3);
      
?>

<style type="text/css">
	.facultypagewelcome{
		border: 1px solid #2c3e50; border-radius:3px; padding:20px;
	}
</style>


<div class="container">
	<div class="row" style="padding:5px">

		<?php
      if($fName->num_rows>0){
          while($row=$fName->fetch_assoc()){
            $Name=$row['fName'];
		        echo "Welcome : <label> ".$Name."</label>";
          }
		        echo "<a class='btn btn-default pull-right' href='facultyprofile.php?SN=$FSN' aria-label='Right Align'>
  			    <span class='glyphicon glyphicon-user' aria-hidden='true'></span>
			      Update Profile
	          </a>";
      }
    ?>
	</div>

	<div class='row facultypagewelcome'>
    <?php
      for($i=0;$i<$tc;$i++){
        $row = $coursesNames->fetch_assoc();
        $coursesName = $row['cTitle'];
        echo "Course Name : <label> ".$coursesName."</label>";
        $link = "enrolledstudent.php?sid=$FSN&course=$coursesName";
        echo "<a class='btn btn-default pull-right' href='$link' role='button'>View Enrolled Students</a>
      	<div class='form-wrap'>
         	<form action='#' method='post' id='' autocomplete='off'>";

                $q4 = "SELECT DISTINCT description FROM v_fac WHERE fId={$FSN}";
                $desc = $conn->query($q4);
                if($desc->num_rows>0){
                  $r=$desc->fetch_assoc();
                  echo "<h5> Description : ".$r['description']."</h5>";
                }

                  echo "<div class='form-group'>
                  <textarea name='career[message]' class='form-control'
          				placeholder='Add krna ha' required></textarea>
                	</div>";
                  echo "<h5>Link to Groups</h5>
                	<div class='form-group'>
                    	<textarea name='career[message]' class='form-control'
          				placeholder='Add group links' required></textarea>
                	</div>
                 <h5>Course Results <h6>(To change the results upload excel sheet with updated results)</h6></h5>
                 	<div class='form-group'>
                    	<button type='button' class='btn btn-default' aria-label='Left Align'>
  						<span class='glyphicon glyphicon-paperclip' aria-hidden='true'></span>
						Excel Spread Sheet</button>
                    	<a class='btn btn-default' href='#'' role='button'>Download Template</a>
                	</div>
           	</form>
       </div>";
      echo "<br>";
    }
?>
</div>
</div>
<?php
    include 'inc/footer.inc.php';
?>