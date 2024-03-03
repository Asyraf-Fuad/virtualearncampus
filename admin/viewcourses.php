<?php

include_once '../common/template.php';

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('dashboard','','admin');

// require_once('../config/db.php');
// $query = "select * from course_form";
// $result = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap.min.css">
    <title>Fetch data from database</title>
</head>
<body class="bg-dark">
<div class= "container">
<div class="row mt-5">
<div class="col">
<div class="card mt-5">
<div class="card-header">
<h2 class="display-6 text-center">Courses available</h2>
</div>
<div class="card-body">
<table class="table table-bordered text-center">
<tr class="bg-dark text-white">
<td> S/N </td>
<td> Course Name</td>
<td> Course ID </td>
<td> Course Description </td>
<td> Course Lecturer ID </td>
<td> Course Duration </td>
<td> Edit </td>
<td> Delete </td>

</tr>
<tr>


    <?php
        $x=1;
        while($row = mysqli_fetch_assoc($result))
        {

    ?>

    <td><?php echo $x; ?></td>
    <td><?php echo $row['courseName']; ?></td>
    <td><?php echo $row['courseID']; ?></td>
    <td><?php echo $row['courseDesc']; ?></td>
    <td><?php echo $row['courseLecID']; ?></td>
    <td><?php echo $row['courseDura']; ?></td>
    <form action="updatecourses.php" method="post">
        <input type="hidden" name="courseID" value="<?php echo $row['courseID']?>">
        <th> <input type="submit" name="edit" class="btn btn-primary" value="EDIT"></th>
    </form>

    <th> 
    <form action="delete.php" method="post">
       <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
       <input type="submit" name="delete" class="btn btn-danger" value="DELETE"> 
    </form>
 </th>
    <!-- <td><a href="#" class="btn btn-danger">Delete</a></td> -->
            <?php 
                $x++;
            ?>

</tr> 
    <?php
        }
    ?>


</table>
    
</body>
</html>