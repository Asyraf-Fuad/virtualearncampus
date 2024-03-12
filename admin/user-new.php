<?php

include_once '../common/template.php';

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('users','user-new','admin');
?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<form action="../database/admin/dbinsert.php?table=users" method="post">
    <div class="container">
      <h1>Register</h1>
      <p>Please fill in this form to create a new account.</p>
      <hr>
  
      <label for="email"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" id="username" required>
  
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" id="password" required>
  
      <label for="role"><b>User Role</b></label>
      <input type="role" placeholder="Enter User's Role" name="role" id="role" required>
      <hr>
  
      <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
      <button type="submit" class="registerbtn">Register</button>
    </div>
  
  </form>
  </main>