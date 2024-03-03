<!-- Page Content -->
    <!-- Announcement Form -->
    <div class="container">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-5">
          <div class="pt-5 pb-0 text-center">
            <!-- <img class="d-block mx-auto mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
            <h2>Announcement</h2>
            <p class="lead">Go back to view all announcements.</p>

            <?php
            if (isset($_GET['UpdateEntries']) && $_GET['UpdateEntries']=='Successful')
            {
              echo "<div class='text-start alert alert-success' role='alert'> Announcement was successfully updated!</div>";
            } else if (isset($_GET['UpdateEntries']) && $_GET['UpdateEntries']=='Error') {
              echo "<div class='text-start alert alert-danger' role='alert'> There was an error with your submission. Please check!</div>";
            }
            ?>
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

        <form action="./announcement-edit.php?announcement_id=<?php echo $row['announcement_id'] ?>" method="POST" class="needs-validation" novalidate>
                        
          <hr class="mb-4">
            <div class="row gy-3">
              <div class="col-12">
                <label for="customerName" class="form-label">Title: </label>
                <text><?php echo $row['title'] ?></text>
              </div>
    
              

              <div class="col-sm-3">
                <label for="employeeID" class="form-label">Date: </label>
                <text><?php echo $row['date'] ?></text>
              </div>
              <!-- <div class="col-sm-3">
                <label for="employeeID" class="form-label">Message ID:</label>
                <text>?php echo $row['announcement_id'] ?></text>
              </div> -->
            </div>

            <hr class="my-4">

            <div class="row g-3">
               <div class="col-sm-6">
                <label for="salespersonName" class="form-label">Posted By: </label>
                <text><?php echo $row['lecturer_name'] ?></text>
              </div>

              <div class="col-12">
                <label for="customerName" class="form-label">Message: </label>
                <p><?php echo $row['message'] ?> </p>
              </div>

            </div>

            <hr class="my-4">
            <div class="g-3 p-4 d-flex text-center justify-content-center">
              <button class='btn btn-secondary mx-2' type='button'>
              <!-- <a href='announcements-list.php' style='all:unset'>Go Back</a> -->
              <a style='all:unset' onclick="history.back();">Go Back</a>
              </button>
              <?php if($user == $row['lecturer_name']) { ?>
              <button class="col-md-1 btn btn-primary" type="edit">Edit</button>
              <?php } ?>
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
