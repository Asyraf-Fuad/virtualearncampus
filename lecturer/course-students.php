<?php

include_once '../common/template.php';
include_once '../database/dbconnect.php';

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('courses', 'course-students', 'lecturer');

global $courseID; global $courseName;

?>
<!-- Page Content -->

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="pt-3 pb-2 mb-3 border-bottom">
      <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"> -->
        <?php 
        $courseID=$_GET['course_id'];
        $sql = "SELECT * FROM courses WHERE course_id=$courseID;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck >0){
          while ($row = mysqli_fetch_assoc($result))
        {
          $courseName=$row['course_name'];
        }
        }
        ?>
        <h1 class="h2">List of Students</h1>

        <div>
        <h6>Course ID: <?php echo $courseID ?></h6>
        <h6>Course Name: <?php echo $courseName ?></h6>
        </div>
      </div>

      <?php
        if (isset($_GET['UpdateEntries']) && $_GET['UpdateEntries']=='Successful') {
          echo "<div class='alert alert-success' role='alert'>Change(s) successfully submitted.</div>";
        }
        else if (isset($_GET['UpdateEntries']) && $_GET['UpdateEntries']=='Error') {
          echo "<div class='alert alert-warning' role='alert'>An error occured. Please try to submit again.</div>";
        }
      ?>

      <div class="table-responsive">     

      <?php if(isset($_GET['page']) && $_GET['page']=='edit_page'){ ?>
        <form action="includes/dbupdate.php?table=added_courses&course_id=<?php echo $courseID ?>" method="POST">
      <?php } else { ?>
        <form action="course-students.php?course_id=<?php echo $courseID ?>&page=edit_page" method="POST">
      <?php } ?>
      <?php

      $sql = "SELECT * FROM added_courses LEFT JOIN courses ON added_courses.course_id = courses.course_id LEFT JOIN users ON added_courses.user_id = users.user_id WHERE added_courses.course_id=$courseID;";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);

      if ($resultCheck >0){
        
        echo "<table class='table table-striped table-sm'>";
        echo "<thead><tr>";
        // echo "<th scope='col'>". 'select' . "</th>";
        echo "<th scope='col'>" . 'Student ID'
        . "</th><th scope='col'>" . 'Student Name'
        . "</th><th scope='col'>" . 'Attendance'
        . "</th><th scope='col'>" . 'Performance'
        . "</th></tr></thead>";
        echo "<tbody>";

        function printOptions($item, $option) { //$row['performance'], ungraded
          echo "<option value='".$option."'";
          if ($item == $option) {
              echo "selected";
          }
          echo ">".$option."</option>'";
        };

        while ($row = mysqli_fetch_assoc($result))
        {
          if ($row['attendance']==0) {
            $checked='';
          }
          elseif ($row['attendance']==1) { 
            $checked='checked';
          }
          echo "<tr>";
          echo "<td><input style='all:unset' type='text' name='user_id[]' value='". $row['user_id']."'>"
          . "</td><td>" . $row['username'];
        // echo "<td>" . $row['username'];
        //   echo "</td><td><input style='all:unset' type='text' name='user_id[]' value='". $row['user_id']."'>";

        
        if(isset($_GET['page']) && $_GET['page']=='edit_page'){
          echo "</td><td><input type='checkbox' name='fAttendance[]' value=1 $checked >"
          . "</td><td>";

          echo "<select name='fPerformance[]' required>";
          printOptions($row['performance'], 'Ungraded');
          printOptions($row['performance'], 'Pass');
          printOptions($row['performance'], 'Fail');
          echo "</select>";
          // . "</td><td>" . "<button class='btn btn-primary mx-3' type='view' name='action' value='View=". $row['course_id']."'>View</button>"
          echo  "</td></tr>";    
        }
        else {
          echo "</td><td><input type='checkbox' name='fAttendance' value=1 $checked disabled >"
          . "</td><td>" . $row['performance']
          // . "</td><td>" . "<button class='btn btn-primary mx-3' type='view' name='action' value='View=". $row['course_id']."'>View</button>"
          . "</td></tr>";
        }
      }

        echo "</tbody></table><div class='text-center my-4'>";
        if(isset($_GET['page']) && $_GET['page']=='edit_page'){
          echo "<button class='btn btn-primary mx-3' type='button'><a style='all:unset' href='course-students.php?course_id=$courseID'>Cancel</a></button>";
          // echo "<button class='btn btn-warning mx-3' type='button'>Submit</button>";
          ?>

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Submit
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Submit</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class='alert alert-warning' role='alert'>Are you sure you want to submit update(s) made?</div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Go Back</button>
                  <button class='btn btn-warning' type='submit' name='action' value='AddCourse'>Submit</button>
                </div>
              </div>
            </div>
          </div>
          
        <?php }
        else {
          echo "<button class='btn btn-primary mx-3' type='submit'>Manage</button>";
        }
        echo "</div>"
        ?>

        <?php } else {
          echo "0 results";
        }
      ?>

      </form>
      </div>


    </main>

<?php templateFooter(); ?>
