<?php

include_once './dbconnect.php';

// student
echo $_GET['table'];
echo $_POST['action'];

if (!isset($_POST['course_id'])){
    header("Location: ../courses-mylist.php?course_id=none");
}
if (isset($_POST['course_id']) && $_GET['table']=='add-courses'&&$_POST['action']=='Delete') {
    foreach($_POST['course_id'] as $selectedID) {
        $sql = "DELETE FROM added_courses WHERE course_id =$selectedID AND user_id=2;";
        mysqli_query($conn, $sql);
    }

header("Location: ../courses-mylist.php?DeleteEntries=Successful");
}
if ($_GET['table']=='announcement'&&strpos($_POST['action'],'View')===0) {
    $selectedID = substr($_POST['action'], strpos($_POST['action'], "=") + 1); 
        $sql = "SELECT * FROM announcement WHERE announcement_id =$selectedID;";
        mysqli_query($conn, $sql);
    

header("Location: ../announcement-view.php?announcement_id=$selectedID");
}
// else if ($_GET['table']=='product') {
//     foreach($_POST['product_id'] as $selectedID) {
//         $sql = "DELETE FROM product WHERE product_id =$selectedID;";
//         mysqli_query($conn, $sql);
//     }

// header("Location: ../product-table.php?DeleteEntries=Successful");
// }

//lecturer
echo $_GET['table'];
echo $_POST['action'];
echo strpos($_POST['action'],'View');

if ($_GET['table']=='announcement'&&$_POST['action']=='Delete') {
    foreach($_POST['announcement_id'] as $selectedID) {
        $sql = "DELETE FROM announcement WHERE announcement_id =$selectedID;";
        mysqli_query($conn, $sql);
    }

header("Location: ../announcements-view-mine.php?DeleteEntries=Successful");
}
if ($_GET['table']=='announcement'&&strpos($_POST['action'],'View')===0) {
    $selectedID = substr($_POST['action'], strpos($_POST['action'], "=") + 1); 
        $sql = "SELECT * FROM announcement WHERE announcement_id =$selectedID;";
        mysqli_query($conn, $sql);
    

header("Location: ../announcement-view.php?announcement_id=$selectedID");
}
// else if ($_GET['table']=='product') {
//     foreach($_POST['product_id'] as $selectedID) {
//         $sql = "DELETE FROM product WHERE product_id =$selectedID;";
//         mysqli_query($conn, $sql);
//     }

// header("Location: ../product-table.php?DeleteEntries=Successful");
// }

?>