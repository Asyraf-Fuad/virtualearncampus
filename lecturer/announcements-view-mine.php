<?php

include_once '../common/template.php';
include_once '../database/dbconnect.php';

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('announcements','announcements-view-mine','lecturer');
?>
<!-- Page Content -->

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Announcements</h1>
        
      </div>

      <?php
        if (isset($_GET['DeleteEntries']) && $_GET['DeleteEntries']=='Successful') {
          echo "<div class='alert alert-success' role='alert'>Announcement successfully deleted.</div>";
        } else if (isset($_GET['UpdateEntries']) && $_GET['UpdateEntries']=='Successful') {
          echo "<div class='alert alert-success' role='alert'>Message successfully updated.</div>";
        }
      ?>

      <div class="table-responsive">
      <form action="database/dbdelete.php?table=announcement" method="post">
        
      <?php
      // $username="Mr Alex";
      $sql = "SELECT * FROM announcement where lecturer_name = 'Mr Alex';";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);

      if ($resultCheck >0){
        
        echo "<table class='table table-striped table-sm'>";
        echo "<thead><tr>";
        echo "<th scope='col'>". 'Select' . "</th>";
        echo "<th scope='col'>". 'Date' . "</th>";
        echo "<th scope='col'>" . 'Title'
        . "</th><th scope='col'>" . 'Posted By'
        . "</th><th scope='col'>" . ''
        . "</th></tr></thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result))
        {
          echo "<tr>";
          echo "<td><input type='checkbox' name='announcement_id[]' value='". $row['announcement_id']."'></td>";
          echo "<td>" . $row['date'] 
          . "</td><td>" . $row['title']
          . "</td><td>" . $row['lecturer_name']
          . "</td><td>" . "<button class='btn btn-primary mx-3' type='view' name='action' value='View=". $row['announcement_id']."'>View</button>"
          . "<a href='./announcement-edit.php?announcement_id=". $row['announcement_id']."' style='all:unset'><button class='btn btn-warning mx-3' type='button'>Edit</button></a>"
          . "</td></tr>";
        };
          echo "</tbody></table><div class='text-center my-4'>";
          // echo "<button class='btn btn-danger' type='submit' name='action' value='Delete'>Delete</button>";
?>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Delete
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Delete</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class='alert alert-danger' role='alert'>Are you sure you want to delete this announcement?</div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button class='btn btn-danger' type='submit' name='action' value='Delete'>Delete</button>
                </div>
              </div>
            </div>
          </div>

        <?php } else {
          echo "0 results";
        }
      ?>

      </form>
      </div>

        
          <footer class="my-3 text-muted text-center text-small">
            <p id="clock"></p>
            <p class="mb-1">&copy; VirtuaLearnCampus</p>
          </footer>  


    </main>

<?php templateFooter(); ?>
