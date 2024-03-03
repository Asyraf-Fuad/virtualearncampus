<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'Course');

if(isset($_POST['delete']))
{
    $id = $_POST['id'];

    $query = "DELETE FROM course_form WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("location:viewcourses.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>