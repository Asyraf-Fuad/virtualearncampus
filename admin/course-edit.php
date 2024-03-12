<?php

include_once '../common/template.php';
include_once '../database/dbconnect.php';

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('courses','course-list','admin');

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <?php
    $id = $_POST['course_id'];

    $sql = "SELECT * FROM courses WHERE course_id=$id;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck >0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            
                      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">PHP - CRUD : Update Data</h1>
                        </div>
                            <form action="../database/admin/dbupdate.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['course_id'] ?>">
                                <!-- <div class="form-group">
                                    <label for=""> id </label>
                                    <input type="text" name="id" class="form-control" value="<?php echo $row['id'] ?>" placeholder="Enter First Name" required>
                                </div> -->
                                <div class="form-group">
                                    <label for=""> Course Name </label>
                                    <input type="text" name="course_name" class="form-control" value="<?php echo $row['course_name'] ?>" placeholder="Enter Last Name" required>
                                </div>
                                <div class="form-group">
                                    <label for=""> Course ID </label>
                                    <input type="text" name="course_id" class="form-control" value="<?php echo $row['course_id'] ?>" placeholder="Enter Contact" readonly>
                                </div>
                                <div class="form-group">
                                    <label for=""> Course Description </label>
                                    <input type="text" name="course_description" class="form-control" value="<?php echo $row['course_description'] ?>" placeholder="Enter Last Name" required>
                                </div>
                                <div class="form-group">
                                    <label for=""> Course Lecture ID </label>
                                    <input type="text" name="lecturer_id" class="form-control" value="<?php echo $row['lecturer_id'] ?>" placeholder="Enter Last Name" required>
                                </div>
                                <div class="form-group">
                                    <label for=""> Course Duration </label>
                                    <input type="text" name="course_duration" class="form-control" value="<?php echo $row['course_duration'] ?>" placeholder="Enter Last Name" required>
                                </div>
                                <div class="form-group">
                                    <label for=""> Course Arrangment </label>
                                    <input type="text" name="course_arrangement" class="form-control" value="<?php echo $row['course_arrangement'] ?>" placeholder="Enter Last Name" required>
                                </div>

                                <button type="submit" name="update" class="btn btn-primary"> Update Data </button>

                                <a href="courses-list.php" class="btn btn-danger"> CANCEL </a>
                            </form>

            <?php
        }
    }
    else
    {
        echo '<script> alert("No Record Found"); </script>';
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>No Record Found</h4>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

</main>