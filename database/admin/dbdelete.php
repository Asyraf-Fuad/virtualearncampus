<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'virtualearncampus');

if(isset($_POST['delete']))
{
    $id = $_POST['course_id'];

    $query = "DELETE FROM courses WHERE course_id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("location:../../admin/courses-list.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>