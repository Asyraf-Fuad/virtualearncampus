<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>PHP CRUD - Edit and Update Data</title>
</head>
<body>
    <?php

    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection, 'Course');

    $id = $_POST['courseID'];

    $query = "SELECT * FROM course_form WHERE courseID='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        while($row = mysqli_fetch_array($query_run))
        {
            ?>
            <div class="container">
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <h2> PHP - CRUD : Update Data</h2>
                            <hr>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <!-- <div class="form-group">
                                    <label for=""> id </label>
                                    <input type="text" name="id" class="form-control" value="<?php echo $row['id'] ?>" placeholder="Enter First Name" required>
                                </div> -->
                                <div class="form-group">
                                    <label for=""> Course Name </label>
                                    <input type="text" name="courseName" class="form-control" value="<?php echo $row['courseName'] ?>" placeholder="Enter Last Name" required>
                                </div>
                                <div class="form-group">
                                    <label for=""> Course ID </label>
                                    <input type="text" name="courseID" class="form-control" value="<?php echo $row['courseID'] ?>" placeholder="Enter Contact" readonly>
                                </div>
                                <div class="form-group">
                                    <label for=""> Course Description </label>
                                    <input type="text" name="courseDesc" class="form-control" value="<?php echo $row['courseDesc'] ?>" placeholder="Enter Last Name" required>
                                </div>
                                <div class="form-group">
                                    <label for=""> Course Lecture ID </label>
                                    <input type="text" name="courseLecID" class="form-control" value="<?php echo $row['courseLecID'] ?>" placeholder="Enter Last Name" required>
                                </div>
                                <div class="form-group">
                                    <label for=""> Course Duration </label>
                                    <input type="text" name="courseDura" class="form-control" value="<?php echo $row['courseDura'] ?>" placeholder="Enter Last Name" required>
                                </div>

                                <button type="submit" name="update" class="btn btn-primary"> Update Data </button>

                                <a href="viewcourses.php" class="btn btn-danger"> CANCEL </a>
                            </form>

                        </div>
                    </div>
                    
                    <?php
                    if(isset($_POST['update']))
                    {
                        $courseName = $_POST['courseName'];
                        $courseID = $_POST['courseID'];
                        $courseDesc = $_POST['courseDesc'];
                        $courseLecID = $_POST['courseLecID'];
                        $courseDura = $_POST['courseDura'];

                        $query = "UPDATE course_form SET courseName='$courseName', courseID='$courseID', courseDesc='$courseDesc', courseLecID='$courseLecID', courseDura='$courseDura' WHERE courseID='$courseID'  ";
                        $query_run = mysqli_query($connection, $query);

                        if($query_run)
                        {
                            echo '<script> alert("Data Updated"); </script>';
                            header("location:viewcourses.php");
                        }
                        else
                        {
                            echo '<script> alert("Data Not Updated"); </script>';
                        }
                    }
                    ?>

                </div>
            </div>
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
</body>
</html>