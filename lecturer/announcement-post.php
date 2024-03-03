<?php

include_once '../common/template.php';

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('announcements','announcement-post','lecturer');
?>

<!-- Page Content -->
    <!-- Announcement Form -->
      <div class="container">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-5">
          <div class="pt-5 pb-0 text-center">
            <!-- <img class="d-block mx-auto mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
            <h2>Post an Announcement</h2>
            <p class="lead">Note: Announcement will be visible to all students and lecturers.</p>

            <?php
            if (isset($_GET['Entries']) && $_GET['Entries']=='Successful')
            {
              echo "<div class='text-start alert alert-success' role='alert'> Announcement was successfully submitted!</div>";
            } else if (isset($_GET['Entries']) && $_GET['Entries']=='Error') {
              echo "<div class='text-start alert alert-danger' role='alert'> There was an error with your submission. Please check!</div>";
            }
            ?>
          </div>
              
          <form action="includes/dbinsert.php?table=announcement" method="POST" class="needs-validation" novalidate>
                        
            <hr class="mb-4">
            <div class="row gy-3">
              <div class="col-12">
                <label for="customerName" class="form-label">Title</label>
                <input type="text" class="form-control" name="fTitle" placeholder="Title of Announcement" value="" required>
                <div class="invalid-feedback">
                  Title cannot be blank.
                </div>
              </div>
            
              <div class="col-sm-6">
                <label for="salespersonName" class="form-label">Lecturer Name</label>
                <input type="text" class="form-control" name="fLecturerName" placeholder="Enter Name" value="" required>
                <div class="invalid-feedback">
                  Lecturer Name is required.
                </div>
              </div>
              <div class="col-sm-3">
                <label for="employeeID" class="form-label">Date</label>
                <input id="date" type="text" class="form-control" name="fDate" placeholder="Date" required>
                <div class="invalid-feedback">
                  Date is required.
                </div>
              </div>
              <div class="col-sm-3">
                <label for="employeeID" class="form-label">Message ID</label>
                <input type="text" class="form-control" name="fMessageID" placeholder="MessageID" required>
                <div class="invalid-feedback">
                  Message ID is required.
                </div>
              </div>
            </div>

            <hr class="my-4">

            <div class="row g-3">
            <div class="col-12">
                <label for="customerName" class="form-label">Message</label>
                <input type="text" class="form-control" name="fMessage" placeholder="Enter Message Here..." value="" required>
                <div class="invalid-feedback">
                  Message cannot be blank.
                </div>
              </div>

            </div>

            <hr class="my-4">
            <div class="row g-3 p-4 d-flex justify-content-center">
              <button class="col-md-4 btn btn-primary btn-lg" type="submit">Post Announcement</button>
            </div>
              
            
          </form>
        
          <footer class="my-3 text-muted text-center text-small">
            <p id="clock"></p>
            <p class="mb-1">&copy; VirtuaLearnCampus</p>
          </footer>  

        </main>
      </div>
      
<?php templateFooter(); ?>
