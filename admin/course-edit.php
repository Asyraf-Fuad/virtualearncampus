<?php

include_once '../common/template.php';

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('courses','course-new','admin');

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <?php

    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection, 'virtualearncampus');

    $id = $_POST['course_id'];

    $query = "SELECT * FROM courses WHERE course_id=$id";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        while($row = mysqli_fetch_array($query_run))
        {
            ?>
                      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">PHP - CRUD : Update Data</h1>
                        </div>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
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

                                <button type="submit" name="update" class="btn btn-primary"> Update Data </button>

                                <a href="courses-list.php" class="btn btn-danger"> CANCEL </a>
                            </form>
                    
                    <?php
                    if(isset($_POST['update']))
                    {
                        $id = $_POST['id'];
                        $course_name = $_POST['course_name'];
                        $course_id = $_POST['course_id'];
                        $course_description = $_POST['course_description'];
                        $lecturer_id = $_POST['lecturer_id'];
                        $course_duration = $_POST['course_duration'];

                        $query = "UPDATE courses SET course_name='$course_name', course_id='$course_id', course_description='$course_description', lecturer_id='$lecturer_id', course_duration='$course_duration' WHERE course_id='$course_id'  ";
                        $query_run = mysqli_query($connection, $query);

                        if($query_run)
                        {
                            echo '<script> alert("Data Updated"); </script>';
                            header("location:courses-list.php");
                        }
                        else
                        {
                            echo '<script> alert("Data Not Updated"); </script>';
                        }
                    }
                    ?>

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