<?php

include_once '../common/template.php';

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('courses','course-new','admin');

?>



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

<?php
            if (isset($_GET['Entries']) && $_GET['Entries']=='Successful')
            {
              echo "<div class='text-start alert alert-success' role='alert'> Announcement was successfully submitted!</div>";
            } else if (isset($_GET['Entries']) && $_GET['Entries']=='Error') {
              echo "<div class='text-start alert alert-danger' role='alert'> There was an error with your submission. Please check!</div>";
            }
            ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Register</h1> 
      </div>

<form action="connect.php" method="post">
<p>Please fill in this form to add new course</p>
  <label for="name">Course name:</label><br>
  <input type="text" id="courseName" name="courseName" required><br>
  <label for="lname">Course ID:</label><br>
  <input type="text" id="courseID" name="courseID" required><br>
  <label for="fname">Course description:</label><br>
  <input type="text" id="courseDesc" name="courseDesc" required><br>
  <label for="fname">Course lecturer ID:</label><br>
  <input type="text" id="courseLecID" name="courseLecID" required><br>
  <label for="fname">Course duration:</label><br>
  <input type="text" id="courseDura" name="courseDura" required><br>
  <br>
  <input type="submit" value="Add">
</form>



</main>

    

