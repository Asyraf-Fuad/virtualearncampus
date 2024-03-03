            <?php      
            if(isset($_GET['course_id'])) {
              $selectedID=$_GET['course_id'];
              $sql = "SELECT * FROM courses WHERE course_id =$selectedID;";
              $result = mysqli_query($conn, $sql);
              $resultCheck = mysqli_num_rows($result);
              }

            if ($resultCheck >0){
              while ($row = mysqli_fetch_assoc($result))
              {
            ?>

<!-- Page Content -->
    <!-- Announcement Form -->
    <div class="container">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-5">
          <div class="pt-5 pb-0 text-center">
            <!-- <img class="d-block mx-auto mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
            <h2><?php echo $row['course_name'] ?></h2>
            <p class="lead">Course ID: <?php echo $row['course_id'] ?></p>

            <?php
            if (isset($_GET['course_id']) && $_GET['course_id']=='none') {
              echo "<div class='alert alert-warning' role='alert'>Please select course(s) you wish to add to your list.</div>";
            }
            else if (isset($_GET['Entries']) && $_GET['Entries']=='Successful') {
              echo "<div class='alert alert-success' role='alert'>Course(s) successfully added to your list. <a href='courses-mylist.php'>Click to view My Courses</a></div>";
            }
            ?>
          </div>



        <!-- <form action="./announcement-edit.php?announcement_id=<?php echo $row['announcement_id'] ?>" method="POST" class="needs-validation" novalidate> -->
                        
          <hr class="mb-4">
            <div class="row gy-3">
              <!-- <div class="col-sm-12">
                <label for="courseID" class="form-label">Course ID: </label>
                <text>?php echo $row['course_id'] ?></text>
              </div>

              <div class="col-sm-12">
                <label for="courseName" class="form-label">Course Name: </label>
                <text>?php echo $row['course_name'] ?></text>
              </div> -->

              <div class="col-sm-12">
                <label for="lecturerName" class="form-label">Course Lecturer: </label>
                <text><?php echo $row['lecturer_name'] ?></text>
              </div>

              <div class="col-sm-12">
                <label for="lecturerName" class="form-label">Lecturer Email: </label>
                <text><?php echo $row['lecturer_email'] ?></text>
              </div>

              <div class="col-12">
                <label for="arrangmenet" class="form-label">Arrangement: </label>
                <text><?php echo $row['course_arrangement'] ?></text>
              </div>             
              
              <!-- <div class="col-sm-3">
                <label for="employeeID" class="form-label">Message ID:</label>
                <text>?php echo $row['announcement_id'] ?></text>
              </div> -->
            </div>

            <hr class="my-4">

            <div class="row g-3">

              <div class="col-12">
                <label for="description" class="form-label">Description: </label>
                <p><?php echo $row['course_description'] ?> </p>
              </div>

            </div>

            <hr class="my-4">
            <div class="g-3 p-4 d-flex text-center justify-content-center">
              <button class='btn btn-secondary mx-2' type='button'>
              <a href='courses-list.php' style='all:unset'>Go Back</a>
              </button>
              <!-- <button class="col-md-1 btn btn-primary" type="edit">Edit</button> -->
            </div>
              
            
          <!-- </form> -->

          <?php
        }
      } else {
        echo "Can't fetch message";
      }
      ?>
        
          <footer class="my-3 text-muted text-center text-small">
            <p id="clock"></p>
            <p class="mb-1">&copy; VirtuaLearnCampus</p>
          </footer>  

        </main>
      
<?php templateFooter(); ?>
