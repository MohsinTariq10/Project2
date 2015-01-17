<?php
    include 'f_session.php';
    include 'database/connection.php';
    include 'inc/header.inc.php';
    include 'inc/navbar.inc.php';
?>

<?php

    $FSN = $_GET['FS'];
    $q1 = "SELECT fName FROM v_fac WHERE fId={$FSN}";
    $fName = $conn->query($q1);
    if(!$fName){
      echo "query failed";
    }

    $q2="SELECT COUNT(DISTINCT cCode) AS count FROM v_fac WHERE fId={$FSN}";
    $noOfCourses = $conn->query($q2);
     if ($noOfCourses->num_rows > 0) {
      $row = $noOfCourses->fetch_assoc();
      $tc = $row['count'];
    }

    $q3 = "SELECT DISTINCT cTitle FROM v_fac WHERE fId={$FSN}";
    $coursesNames = $conn->query($q3);
      
?>

<style type="text/css">
	.facultypagewelcome{
		border: 1px solid #95a5a6; border-radius:3px; padding:20px;
	}

</style>


<div class="pull-center container" style="width:70%">
    <div class="panel panel-default" >
      <div class="panel-heading" style="padding:2px; font-size: 14px; color:#fff; background-color:#95a5a6">
        <?php
          if($fName->num_rows>0){
            while($row=$fName->fetch_assoc()){
              $Name=$row['fName'];
              echo "<h4 style='text-align:center; color:#fff'>".$Name."</h4>";
            }
          }
        ?>
          
      </div>
    <div class="panel-body">
      
              <?php
                for($i=0;$i<$tc;$i++){
                  $row = $coursesNames->fetch_assoc();
                  $coursesName = $row['cTitle'];
                  echo "<label> ".$coursesName."</label>";

                  $link = "enrolledstudent.php?sid=$FSN&course=$coursesName";
                  echo "<a class='btn btn-default pull-right' style='margin:4px;' href='facultyprofile.php?SN=$FSN' aria-label='Right Align'>
                      <span class='glyphicon glyphicon-user' aria-hidden='true'></span>
                      Update Profile
                      </a>";    
                  echo "<a class='btn btn-default pull-right' style='margin:4px;' href='$link' role='button'>View Enrolled Students</a>";
                  echo "<table class='table'>";
                  echo "<tbody>";
                  $q4 = "SELECT DISTINCT description FROM v_fac WHERE fId={$FSN}";
                  $desc = $conn->query($q4);
                  if($desc->num_rows>0){
                  $r=$desc->fetch_assoc();
                  echo "<tr><td><h5>Description : ".$r['description']."<h5><a class='btn btn-default btn-sm pull-right' href='#' role='button'>Change</a></td></tr>";
                  }

                  echo "<tr><td><h5>Link to Groups</h5><a class='btn btn-default btn-sm pull-right' href='#' role='button'>Change</a></tr></td>
                  
                  <tr><td><h5>Course Results <h6>(To change the results upload excel sheet with updated results)</h6></h5></td></tr>
                  </tbody></table>
                  <button type='button' class='btn btn-default' aria-label='Left Align'>
                  <span class='glyphicon glyphicon-paperclip' aria-hidden='true'></span>
                  Excel Spread Sheet</button><a class='btn btn-default' href='#'' role='button'>Download Template</a>";
                }        
              ?>
      </div>
    </div>
  </div>
</div>

<?php
  include 'inc/footer.inc.php';
?>