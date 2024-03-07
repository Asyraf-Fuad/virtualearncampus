<?php

include_once '../../database/dbconnect.php';

//student
if ($_GET['table']=='add-courses' && $_POST['action']=='AddCourse') {

    for ($row = 0; $row < count($_POST['course_id']); $row++) {

        $courseID = $_POST['course_id'][$row];
        
        $sql = "INSERT INTO added_courses (
            course_id
            , user_id
        ) VALUES (
            '$courseID'
            -- , '$loginUserid'
            , 5
            );";
    
        $result = mysqli_query($conn, $sql);
    
        print_r($conn);
        print_r($result);
            
        echo $result;
        echo mysqli_affected_rows($conn);

        if($result && mysqli_affected_rows($conn)==1) {
            header("Location: ../common/courses-list.php?Entries=Successful");
        } else {
            print_r($conn);
        print_r($result);
            
        echo $result;
        echo mysqli_affected_rows($conn);
            header("Location: ../common/courses-list.php?Entries=Error");
        }      
    }
}

else if ($_GET['table']=='add-courses'&&$_POST['action']=='View') {
    $selectedID = $_POST['course_id']; 
        $sql = "SELECT * FROM courses WHERE course_id =$selectedID;";
        mysqli_query($conn, $sql);
    

header("Location:admin/course-view.php?course_id=$selectedID");
}

//lecturer
if ($_GET['table']=='announcement') {

    $announcement_id = $_POST['fMessageID'];
    $title = $_POST['fTitle'];
    $lecturer_name = $_POST['fLecturerName'];
    $date = $_POST['fDate'];
    $message = $_POST['fMessage'];
    
    $sql = "INSERT INTO announcement (
        announcement_id
        , title
        , lecturer_name
        , date
        , message
    ) VALUES (
        '$announcement_id'
        , '$title'
        , '$lecturer_name'
        , '$date'
        , '$message'
        );";
        
    
    $result = mysqli_query($conn, $sql);
    //  echo $sql;
    //  print_r($conn);
    //  echo $result;
    if($result && mysqli_affected_rows($conn)==1) {
        header("Location: ../announcement-post.php?Entries=Successful");
    } else {
        header("Location: ../announcement-post.php?Entries=Error");
    }
    }
    
    else if ($_GET['table']=='add-courses'&&$_POST['action']=='View') {
        $selectedID = $_POST['course_id']; 
            $sql = "SELECT * FROM courses WHERE course_id =$selectedID;";
            mysqli_query($conn, $sql);
        
    
    header("Location:../admin/course-view.php?course_id=$selectedID");
    }
?>




