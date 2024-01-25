<?php
    $email = $_POST ['email'];
    $psw = $_POST ['psw'];
    $pswrepeat = $_POST ['pswrepeat'];

    //Databse connection
    $conn = new mysqli('localhost', 'root','', 'StudentForm');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);

    }else{
        // $stmt = $conn->prepare("insert into student_form(email, psw, pswrepeat)values('abc123@gmail.com','123','123')");
        $stmt = $conn->prepare("insert into student_form(email, psw, pswrepeat)values(?,?,?)");
        $stmt->bind_param("sss", $email,$psw,$pswrepeat);
        $stmt->execute();
        echo "Successfully added";
        $stmt->close();
        $conn->close();
    }
?>

