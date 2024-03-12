<?php

include_once '../dbconnect.php';

if ($_GET['table']=='courses') {
    $course_name = $_POST ['course_name'];
    // $courseID = $_POST ['courseID'];
    $course_description = $_POST ['course_description'];
    $lecturer_id = $_POST ['lecturer_id'];
    $course_duration = $_POST ['course_duration'];
    $course_arrangement = $_POST ['course_arrangement'];
        
        $sql = "INSERT INTO courses (
            course_name
            , course_description
            , lecturer_id
            , course_duration
            , course_arrangement
        ) VALUES (
            '$course_name'
            , '$course_description'
            , '$lecturer_id'
            , '$course_duration'
            , '$course_arrangement'
            );";
            
        
        $result = mysqli_query($conn, $sql);
        //  echo $sql;
        //  print_r($conn);
         echo $result;
        if($result && mysqli_affected_rows($conn)==1) {
            header("Location: ../../admin/courses-list.php?Entries=Successful");

        }else{
        header("Location: ../../admin/courses-list.php?Entries=Error");
    }
}

else if ($_GET['table']=='users') {
    $username = $_POST ['username'];
    $password = $_POST ['password'];
    $role = $_POST ['role'];
        
        $sql = "INSERT INTO users (
            username
            , password
            , user_role
        ) VALUES (
            '$username'
            , '$password'
            , '$role'
            );";
            
        
        $result = mysqli_query($conn, $sql);
        //  echo $sql;
        //  print_r($conn);
         echo $result;
        if($result && mysqli_affected_rows($conn)==1) {
            header("Location: ../../admin/users-list.php?Entries=Successful");

        }else{
        header("Location: ../../admin/users-list.php?Entries=Error");
    }
}
?>