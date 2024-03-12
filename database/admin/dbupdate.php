<?php

include_once '../dbconnect.php';

if(isset($_POST['update']))
{
$id = $_POST['id'];
$course_name = $_POST['course_name'];
$course_id = $_POST['course_id'];
$course_description = $_POST['course_description'];
$lecturer_id = $_POST['lecturer_id'];
$course_duration = $_POST['course_duration'];
$course_arrangement = $_POST['course_arrangement'];

$query = "UPDATE courses SET course_name='$course_name', course_description='$course_description', lecturer_id='$lecturer_id', course_duration='$course_duration', course_arrangement='$course_arrangement' WHERE course_id='$course_id'  ";
$query_run = mysqli_query($conn, $query);

if($query_run)
{
    echo '<script> alert("Data Updated"); </script>';
    header("Location: ../../admin/courses-list.php?Entries=UpdateSuccessful");
}
else
{
    echo '<script> alert("Data Not Updated"); </script>';
}
}
?>