<!-- Page Content -->

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Announcements</h1>
        
      </div>

      <div class="table-responsive">
      <form action="includes/dbdelete.php?table=announcement" method="post">
        
      <?php

      $sql = "SELECT * FROM announcement;";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);

      if ($resultCheck >0){
        
        echo "<table class='table table-striped table-sm'>";
        echo "<thead><tr>";
        // echo "<th scope='col'>". 'Select' . "</th>";
        echo "<th scope='col'>". 'Date' . "</th>";
        echo "<th scope='col'>" . 'Title'
        . "</th><th scope='col'>" . 'Posted By'
        . "</th><th scope='col'>" . ''
        . "</th></tr></thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result))
        {
          echo "<tr>";
          // echo "<td><input type='checkbox' name='announcement_id[]' value='". $row['announcement_id']."'></td>";
          echo "<td>" . $row['date'] 
          . "</td><td>" . $row['title']
          . "</td><td>" . $row['lecturer_name']
          . "</td><td>" . "<button class='btn btn-primary mx-3' type='view' name='action' value='View=". $row['announcement_id']."'>View</button>"
          . "</td></tr>";
        };
          echo "</tbody></table>";
          // echo "<div class='text-center my-4'>";
          // echo "<button class='btn btn-danger' type='submit' name='action' value='Delete'>Delete</button>";
        } else {
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
