<?php
    $courseName = $_POST ['courseName'];
    $courseID = $_POST ['courseID'];
    $courseDesc = $_POST ['courseDesc'];
    $courseLecID = $_POST ['courseLecID'];
    $courseDura = $_POST ['courseDura'];


    //Databse connection
    $conn = new mysqli('localhost', 'root','', 'Course');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
        header("Location: ./courses.php?Entries=Error");


    }else{
        $stmt = $conn->prepare("insert into course_form(courseName, courseID, courseDesc, courseLecID, courseDura)values(?,?,?,?,?)");
        $stmt->bind_param("sssss", $courseName,$courseID,$courseDesc,$courseLecID,$courseDura);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        header("Location: ./courses.php?Entries=Successful");
    }
?>