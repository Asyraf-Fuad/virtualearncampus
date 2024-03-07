<?php

include_once '../common/template.php';
include_once '../database/dbconnect.php';

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('announcements','', 'lecturer');
?>

<!-- Page Content -->
    <!-- Announcement Form -->
    <div class="container">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-5">
          <div class="pt-5 pb-0 text-center">
            <!-- <img class="d-block mx-auto mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
            <h2>Edit Announcement</h2>
            <p class="lead">Click confirm to save all edits.</p>

          </div>

            <?php      
            if(isset($_GET['announcement_id'])) {
              $selectedID=$_GET['announcement_id'];
              $sql = "SELECT * FROM announcement WHERE announcement_id =$selectedID;";
              $result = mysqli_query($conn, $sql);
              $resultCheck = mysqli_num_rows($result);
              }

            if ($resultCheck >0){
              while ($row = mysqli_fetch_assoc($result))
              {
            ?>

            <div class='alert alert-warning' role='alert'>
            Are you sure you want to update the announcement?
            </div>

        <form action="database/dbupdate.php?table=announcement" method="POST" class="needs-validation" novalidate>
                        
          <hr class="mb-4">
            <div class="row gy-3">
              <div class="col-12">
                <label for="customerName" class="form-label">Title</label>
                <?php echo '<input type="text" class="form-control" name="fTitle" placeholder="Title of Announcement" value="'.$row['title'].'" >'; ?>
              </div>
    
              <div class="col-sm-6">
                <label for="salespersonName" class="form-label">Lecturer Name</label>
                <?php echo '<input type="text" class="form-control" name="fLecturerName" placeholder="Enter Name" value="'.$row['lecturer_name'].'" readonly>'; ?>
              </div>

              <div class="col-sm-3">
                <label for="employeeID" class="form-label">Date</label>
                <?php echo '<input id="date" type="text" class="form-control" name="fDate" placeholder="Date" value="'.$row['date'].'" >'; ?>
              </div>
              <div class="col-sm-3">
                <label for="employeeID" class="form-label">Message ID</label>
                <?php echo '<input type="text" class="form-control" name="fMessageID" placeholder="MessageID" value="'.$row['announcement_id'].'" readonly>'; ?>
              </div>
            </div>

            <hr class="my-4">

            <div class="row g-3">
            <div class="col-12">
                <label for="customerName" class="form-label">Message</label>
                <?php echo '<input type="text" class="form-control" name="fMessage" placeholder="Enter Message Here..." value="'.$row['message'].'" >'; ?>
              </div>

            </div>

            <hr class="my-4">
            <div class="g-3 p-4 d-flex text-center justify-content-center">
            <button class='btn btn-secondary mx-2' type='button'>
            <!-- <a href='announcement-view.php?announcement_id=<?php echo $_GET['announcement_id'] ?>' style='all:unset'>Cancel</a> -->
            <a style='all:unset' onclick="history.back();">Cancel</a>
            </button>
              <button class="btn btn-warning" type="submit" name='announcement_id' value=<?php echo $row['announcement_id'] ?>>Confirm</button>
            </div>
              
            
          </form>

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
