<?php

include_once '../../database/dbconnect.php';

//student
if ($_GET['table']=='courses') {

  for ($row = 0; $row < count($_POST['course_id']); $row++) {

    $courseID = $_POST['course_id'][$row];
    $user_id = 's001';
    $course_students_id = $_POST['course_id'][$row].$user_id;    
  
    $sql = "UPDATE courses
    SET
    course_students_id = $course_students_id
    WHERE course_id =$courseID;";
  
    $result = mysqli_query($conn, $sql);

    print_r($sql);
    print_r($conn);
    print_r($result);
    echo $sql;
    header("Location: ../common/courses-list.php?UpdateEntries=Successful"+$sql);
  }
  

}
else if ($_GET['table']=='product') {

  for ($row = 0; $row < count($_POST['product_id']); $row++) {

    $selectedID = $_POST['product_id'][$row];
    $product = $_POST['fProduct'][$row];
    $model = $_POST['fModel'][$row];
    $price = $_POST['fPrice'][$row];
    $country = $_POST['fCountry'][$row];
    $currency = $_POST['fCurrency'][$row];
    
    $sql = "UPDATE product
    SET
    product = '$product'
    , model = '$model'
    , price = '$price'
    , country = '$country'
    , currency = '$currency'
    WHERE product_id =$selectedID;";

    $result = mysqli_query($conn, $sql);

    print_r($conn);
    print_r($result);

    header("Location: ../product-table.php?UpdateEntries=Successful");
  }
}

//lecturer
if ($_GET['table']=='announcement' && $_POST['announcement_id']) {

  $messageID = $_POST['announcement_id'];
  $title = $_POST['fTitle'];
  $date = $_POST['fDate'];
  $message = $_POST['fMessage'];

  $sql = "UPDATE announcement
  SET
  title = '$title'
  , date = '$date'
  , message = '$message'
  WHERE announcement_id =$messageID;";

  $result = mysqli_query($conn, $sql);

  print_r($sql);
  print_r($conn);
  print_r($result);
  echo $sql;
  header("Location: ../announcement-view.php?UpdateEntries=Successful&announcement_id=".$messageID);
}


else if ($_GET['table']=='added_courses') {

for ($row = 0; $row < count($_POST['user_id']); $row++) {

  $courseID = $_GET['course_id'];
  $studentID = $_POST['user_id'][$row];
  if(isset($_POST['fAttendance'][$row])) { $attendance = 1; }
  else { $attendance = 0; }
  $performance = $_POST['fPerformance'][$row];
  
  $sql = "UPDATE added_courses
  SET
  attendance = '$attendance'
  , performance = '$performance'
  WHERE user_id =$studentID AND course_id =$courseID;";

  // echo $sql;
  $result = mysqli_query($conn, $sql);

  print_r($conn);
  print_r($result);

  header("Location: ../course-students.php?course_id=$courseID&UpdateEntries=Successful");

}
}

else if ($_GET['table']=='announcement'&&strpos($_POST['action'],'View')===0) {
$selectedID = substr($_POST['action'], strpos($_POST['action'], "=") + 1); 
    $sql = "SELECT * FROM announcement WHERE announcement_id =$selectedID;";
    mysqli_query($conn, $sql);


header("Location: ../announcement-view.php?announcement_id=$selectedID");
}
?>


