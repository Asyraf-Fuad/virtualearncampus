<!-- Page Content -->
<?php echo $user ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List of Courses</h1>
        
      </div>

      <?php
        if (isset($_GET['course_id']) && $_GET['course_id']=='none') {
          echo "<div class='alert alert-warning' role='alert'>Please select course(s) you wish to add to your list.</div>";
        }
        else if (isset($_GET['Entries']) && $_GET['Entries']=='Successful') {
          echo "<div class='alert alert-success' role='alert'>Course(s) successfully added to your list. <a href='courses-mylist.php'>Click to view My Courses</a></div>";
        }
      ?>

      <div class="table-responsive">
      <form action="includes/dbinsert.php?table=add-courses" method="POST">
        
      <?php

      $sql = "SELECT * FROM courses;";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);

      if ($resultCheck >0){
        
        echo "<table class='table table-striped table-sm'>";
        echo "<thead><tr>";
        if($user=='student') { 
        echo "<th scope='col'>". 'select' . "</th>";
        }
        echo "<th scope='col'>" . 'Course ID'
        . "</th><th scope='col'>" . 'Course Name'
        . "</th><th scope='col'>" . 'Course Lecturers'
        . "</th><th scope='col'>" . ''
        . "</th></tr></thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result))
        {
          echo "<tr>";
          if($user=='student') { 
          echo "<td><input type='checkbox' name='course_id[]' value='". $row['course_id']."'></td>";
          }
          echo "<td>" . $row['course_id'] 
          . "</td><td>" . $row['course_name']
          . "</td><td>" . $row['lecturer_name']
          . "</td><td>" . "<button class='btn btn-primary mx-3' type='view' name='action' value='View=". $row['course_id']."'>View</button>"
          . "</td></tr>";
        };
          echo "</tbody></table><div class='text-center my-4'>";
            // echo "<button class='btn btn-primary mx-3' type='submit' name='action' value='AddCourse'>Add to My Courses</button>";
            ?>
            
            <!-- Button trigger modal -->
          <?php if($user=='student') { ?>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add to My Courses
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Add</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class='alert alert-primary' role='alert'>Are you sure you want to add this course to your list?</div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Go Back</button>
                  <button class='btn btn-primary' type='submit' name='action' value='AddCourse'>Add Course</button>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>

        <?php } else {
          echo "0 results";
        }
      ?>

      </form>
      </div>


    </main>

<?php templateFooter(); ?>
