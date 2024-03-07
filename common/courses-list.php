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
        
      <?php

      $sql = "SELECT * FROM courses LEFT JOIN users ON courses.lecturer_id = users.user_id;";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);

      if ($resultCheck >0) {
      ?>
        <table class='table table-striped table-sm'>
        <thead><tr>

        <?php
        if($user=='student') { 
        ?>
        <th scope='col'>select</th>
        <?php } ?>

        <th scope='col'>Course ID</th>
        <th scope='col'>Course Name</th>
        <th scope='col'>Course Lecturers</th>
        </tr></thead>
        <tbody>
        
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
          <?php
          if($user=='student') {
          ?> 
          <td><input type='checkbox' name='course_id[]' value="<?php echo $row['course_id'] ?>"></td>
          <?php } ?>

          <td><?php echo $row['course_id']; ?></td> 
          <td><?php echo $row['course_name']; ?></td>
          <td><?php echo $row['username']; ?></td>
          <!-- <td><button class='btn btn-primary mx-3' type='view' name='action' value='View="<?php echo $row['course_id'] ?>"'>View</button></td> -->
          <td>
          <form action="../database/dbinsert.php?table=add-courses" method="post">
          <input type="hidden" name="course_id" value="<?php echo $row['course_id']?>">
          <input type="submit" name="action" class="btn btn-primary" value="View">
          </form>
          </td>
          
          <?php
          if($user=='admin') {
          ?> 
          <td>
          <form action="course-edit.php" method="post">
          <input type="hidden" name="course_id" value="<?php echo $row['course_id']?>">
          <input type="submit" name="edit" class="btn btn-primary" value="Edit">
          </form>
          </td>

          <td>
            <form action="delete.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <input type="submit" name="delete" class="btn btn-danger" value="Delete"> 
            </form>
          </td>

          <?php } ?>
        
        </tr>

          <?php } ?>

          </tbody></table><div class='text-center my-4'>
            
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

      </div>


    </main>

<?php templateFooter(); ?>
