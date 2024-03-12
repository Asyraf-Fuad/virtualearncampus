<?php

include_once '../common/template.php';
include_once '../database/dbconnect.php';

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('users','users-list','admin');

global $user;
$user='admin';

?>

<!-- Page Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List of Users</h1>       
      </div>

      <div class="table-responsive">
      <?php

      $sql = "SELECT * FROM users;";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);

      if ($resultCheck >0) {
      ?>
        <table class='table table-striped table-sm'>
        <thead><tr>
        <th scope='col'>User ID</th>
        <th scope='col'>Username</th>
        <th scope='col'>Password</th>
        <th scope='col'>Role</th>
        </tr></thead>
        <tbody>
        
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>

        <tr>
          <td><?php echo $row['user_id']; ?></td> 
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['password']; ?></td>
          <td><?php echo $row['user_role']; ?></td>
        </tr>

        <?php } ?>

        </tbody>
        </table><div class='text-center my-4'>
            
            <!-- Button trigger modal -->
          <?php if($user=='student') { ?>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add to My Users
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
