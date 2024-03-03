<?php

include_once '../common/template.php';

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('dashboard','','student');
?>

    <!-- Page Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">               
        </div>
      </div>
      
      <div class="btn-toolbar mb-2 mb-md-0">        
        <a style='all:unset' href='./courses-list.php'><button class='btn btn-warning mx-3'>View Courses</button></a>
        <a style='all:unset' href='./announcements-list.php'><button class='btn btn-warning mx-3'>View Announcements</button></a>
      </div>

          
      </div>
      <hr class="my-4">
      <footer class="my-3 pl-3 text-muted text-center text-small">
        <p id="clock"></p>
        <p class="mb-1">&copy; Learning Management System (LMS)</p>
      </footer>

      </div>
    </main>

<?php templateFooter(); ?>
