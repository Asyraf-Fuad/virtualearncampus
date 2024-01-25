<?php
if (isset($_POST['login-submit'])) {

    require 'dbconnect.php';

    $username = $_POST['loginUserid'];
    $password = $_POST['loginPwd'];
    
    if (empty($username) || empty($password)) {

        // echo "Login unsuccessful, please try again.";
        // echo "<br><a href='../login.php'>Go back</a> to login.";
        header("Location: ../login.php?error=emptyfields");
        exit();

    } else {

        $sql = "SELECT * FROM users WHERE username=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {

            // echo "Login unsuccessful, please try again.";
            // echo "<br><a href='../login.php'>Go back</a> to login.";
            header("Location: ../login.php?error=sqlerror");
            exit();

        } else {

            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if ($row = mysqli_fetch_assoc($result)) {
                
                    if ($password != $row['password']) {

                    // echo "Wrong password, please try again.";
                    // echo "<br><a href='../login.php'>Go back</a> to login.";
                    header("Location: ../login.php?error=wrongpwd");
                    exit();

                    } else if ($password == $row['password']){
                     

                        //print_r($row);
                        session_start();
                        header("Location: ../dashboard/index.php");
                    
                        // header("Location: ../login.php?login=success");
                
                    } else {
                    
                        // echo "Wrong password, please try again.";
                        // echo "<br><a href='../login.php'>Go back</a> to login.";
                        header("Location: ../login.php?error=wrongpwd");
                        
                        exit();
                    }

            } else {
                // echo "No such user registered, please try again.";
                // echo "<br><a href='../login.php'>Go back</a> to login.";
                header("Location: ../login.php?error=nouser");
                exit();
            };
        };
    };

} else {
    header("Location: ../login.php?error=connectionerror");
}

?>