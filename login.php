<?php

include_once './database/dbconnect.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">

</head>
<body>

    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
          <div class="col-md-3 mb-2 mb-md-0">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
              <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>
          </div>
    
          <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="#" class="nav-link px-2">Admin Login</a></li>
            <li><a href="#" class="nav-link px-2">Courses</a></li>
            <li><a href="#" class="nav-link px-2">FAQs</a></li>
            <li><a href="#" class="nav-link px-2">About</a></li>
          </ul>
        </header>
    </div>


    
    <div class="outside-login">
        <main class="form-signin text-center d-flex align-items-center justify-content-center">
            <form class="mx-auto" action="database/login.inc.php" method="POST">
                <h1 class="h3 mt-4 mb-3 fw-normal">Student Portal</h1>
      
                <div class="form-floating mx-auto col-md-15">
                    <input type="text" class="form-control" id="floatingInput" placeholder="User ID" name="loginUserid">
                    <label for="floatingInput">Username</label>
                </div>

                <div class="form-floating mx-auto col-md-15">
                 <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="loginPwd">
                 <label for="floatingPassword">Password</label>
                </div>
      
                <div class="form-check text-start my-3 col-md-15 mx-auto">
                    <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">Remember me
                    </label>
                    <a href="#" style="color:blue; text-decoration: none;"><p>Forgot password?</p></a>
                </div>
                <button class="btn btn-primary col-md-15 py-2 mt-3" type="submit" name="login-submit">Sign in</button>
                    <p class="mt-5 mb-3 text-body-secondary">© VirtuLearnCampus</p>
            </form>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


</body>
</html>