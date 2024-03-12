<?php
function userSession($roleDashboard) { 
global $loginUserid, $userRole, $username, $userAuth, $userStatus;

if (!isset($_SESSION['loginUserid'])) {

header('location:../error.php?status=notloggedin');

} else if (isset($_SESSION['loginUserid']) && (isset($_SESSION['role'])) && $_SESSION['status']=='Active') {

if ($_SESSION['role'] == $roleDashboard ) {

$loginUserid = $_SESSION['loginUserid'];
$username = $_SESSION['username'];
$userRole = $_SESSION['role'];
$userAuth = $_SESSION['auth'];
$userStatus = $_SESSION['status'];

}
else {
  header( 'location:../error.php?status=accessdenied');
}

} else {

session_start();
session_unset();
session_destroy();
header("location: ../error.php?status=deactivated");

}
} ?>

<!-- HTML boilerplate functions -->
<?php function templateHeader(){ ?>
<!doctype html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <title>VirtuaLearnCampus</title>
    <link rel='stylesheet' href='../css/style.css''>
    <link rel='stylesheet' href='https://unpkg.com/@icon/themify-icons/themify-icons.css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.3.1/css/flag-icon.min.css' rel='stylesheet'/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href='../css/index.css' rel='stylesheet'>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body>
<?php } ?>

<?php function templateTopNav() { ?>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <div class="navbar-brand col-md-3 col-lg-2 me-0 px-3">
    <span><img class="bg-white navbar-brand py-0" src="../images/teslah-logo-mini-white.svg" width="30" alt=""></span>
    <a class="navbar-dark navbar-brand" href="#">VirtuaLearnCampus</a>
  </div>
  
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark"></input>ß
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-4" href="../logout.php">Logout</a>
    </div>
  </div>
</header>
<?php } ?>

<?php function templateUserProfile() {
    global $loginUserid, $employeeName, $jobPosition, $userDept; ?>
<!-- User Profile -->
<div class="nav inline-flex px-3 p-4">
<div class="d-flex flex-column nav-profile-image mx-1">
  
    <?php 
    echo "<img width='50' src='../images/users/user-img.png' alt='user-img.png'>"           
    ?>

 </div>
 <div class="d-flex flex-column user-font m-1">
   
    <?php
    echo "<span>".$employeeName."User ID</span>";
    echo "<span>".$jobPosition."Username</span>";
    echo "<span>".$jobPosition."Quote of the day</span>";
    ?>

</div>
</div>
<?php }?>

<?php function itemDashboard($page) { 
    if ($page=='dashboard'){ $activeDashboard='active';}?>
<li class="nav-item">
    <a class="nav-link <?php echo $activeDashboard ?> pr-2" aria-current="page" href="index.php">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
      <span data-feather="home"></span>
      Dashboard
    </a>
  </li>
<?php }?>

<?php function itemCourses($page, $table, $user) {
// global $userAuth;
if ($page=='courses'){ 
    { $activeCourses='active'; $showCourses='show';}
    if ($table=='courses-list'){$activeCoursesList='active';}
    else if ($table=='course-new'||$table=='courses-mylist'||$table=='courses-view-mine'){$activeCoursesMyList='active';} }
// if ($userAuth=='Admin'): ?>
<li class='nav-item'>
    <a class='nav-link accordion-header <?php echo $activeCourses ?>' data-bs-toggle='collapse' href='#collapseCourses' role='button' aria-expanded='false' aria-controls='collapseCourses'>
    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-file'><path d='M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z'></path><polyline points='13 2 13 9 20 9'></polyline></svg>
    <span data-feather='file'></span>
    Courses
    </a>
    <div class='<?php echo $showCourses ?> collapse' id='collapseCourses'>
    <div class='nav-link'>
        <ul class='nav flex-column sub-menu'>
        <li class='nav-item'><i class='glyphicon glyphicon-home'></i><a class='nav-link <?php echo $activeCoursesList ?>' href='courses-list.php'>View All Courses</a></li>
        <?php if ($user=='admin'){ ?>
        <li class='nav-item'> <a class='nav-link <?php echo $activeCoursesMyList ?>' href='course-new.php'>Add New Course</a></li>
        <?php } ?>
        <?php if ($user=='student'){ ?>
        <li class='nav-item'> <a class='nav-link <?php echo $activeCoursesMyList ?>' href='courses-mylist.php'>View My Courses</a></li>
        <?php } ?>  
        <?php if ($user=='lecturer'){ ?>
        <li class='nav-item'> <a class='nav-link <?php echo $activeCoursesMyList ?>' href='courses-view-mine.php'>View My Courses</a></li>
        <?php } ?>
      </ul>
    </div>
    </div>
</li>
<!-- ?php endif; }?> -->
<?php }?>

<?php function itemAnnouncements($page, $table, $user) {
  // global $userAuth;
if ($page=='announcements'){ 
    { $showAnnouncements='show'; $activeAnnouncements='active';}
    if ($table=='announcements-list'){$activeAnnouncementsAll='active'; }
    else if ($table=='announcements-view-mine'){$activeAnnouncementPostMine='active';} 
    else if ($table=='announcement-post'){$activeAnnouncementPost='active';} }
     ?>
    <li class="nav-item">
            <a class="nav-link accordion-header <?php echo $activeAnnouncements ?>" data-bs-toggle="collapse" href="#collapseAnnouncements" role="button" aria-expanded="false" aria-controls="collapseAnnouncements">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
              <span data-feather="layers"></span>
              Announcements
            </a>
            <div class="<?php echo $showAnnouncements ?>collapse" id="collapseAnnouncements">
              <div class="nav-link">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link <?php echo $activeAnnouncementsAll ?>" href="announcements-list.php">View All</a></li>
                  <?php if ($user=='lecturer'){ ?>
                    <li class="nav-item"> <a class="nav-link <?php echo $activeAnnouncementPostMine ?>" href="announcements-view-mine.php">My Posts</a></li>
                  <li class="nav-item"> <a class="nav-link <?php echo $activeAnnouncementPost ?>" href="announcement-post.php">Post New</a></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </li>
<?php }?>

<?php function itemUsers($page, $table, $user) {
// global $userAuth;
if ($page=='users'){ 
    { $activeUsers='active'; $showUsers='show';}
    if ($table=='users-list'){$activeUsersList='active';}
    else if ($table=='user-new'){$activeNewUser='active';}
    else if ($table=='students-list'){$activeStudentsList='active';}
    else if ($table=='lecturers-list'){$activeLecturersList='active';} }
// if ($userAuth=='Admin'): ?>
<li class='nav-item'>
    <a class='nav-link accordion-header <?php echo $activeUsers ?>' data-bs-toggle='collapse' href='#collapseUsers' role='button' aria-expanded='false' aria-controls='collapseUsers'>
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
    </svg>
    Users
    </a>
    <div class='<?php echo $showUsers ?> collapse' id='collapseUsers'>
    <div class='nav-link'>
        <ul class='nav flex-column sub-menu'>
        <?php if ($user=='admin'){ ?>
        <li class='nav-item'> <a class='nav-link <?php echo $activeUsersList ?>' href='users-list.php'>View All Users</a></li>
        <li class='nav-item'> <a class='nav-link <?php echo $activeNewUser ?>' href='user-new.php'>Register New User</a></li>
        <?php } ?>
        <?php if ($user=='student'){ ?>
        <li class='nav-item'> <a class='nav-link <?php echo $activeLecturersList ?>' href='lecturers-list.php'>View All Lecturers</a></li>
        <?php } ?>  
        <?php if ($user=='lecturer'){ ?>
          <li class='nav-item'> <a class='nav-link <?php echo $activeStudentsList ?>' href='students-list.php'>View All Students</a></li>
        <?php } ?>
      </ul>
    </div>
    </div>
</li>
<!-- ?php endif; }?> -->
<?php }?>

<?php function leftPane($page, $table, $user) {?>
  <div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">

          <?php templateUserProfile();?>

        <ul class="nav flex-column">
          
          
          <?php
          itemDashboard($page);
          itemCourses($page, $table, $user);
          itemAnnouncements($page, $table, $user);
          itemUsers($page, $table, $user);
          ?>
          
        </ul>
        
      </div>
    </nav>

<?php }?>

<?php function templateFooter() { ?>
  </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script src="../js/index-charts.js"></script> 
  <script type="text/javascript"> 
          var clockElement = document.getElementById('clock');

          function clock() {
              var date = new Date();

              // Replace '400px' below with where you want the format to change.
              if (window.matchMedia('(max-width: 400px)').matches) {
                  // Use this format for windows with a width up to the value above.
                  clockElement.textContent = date.toLocaleString();
              } else {
                  // While this format will be used for larger windows.
                  clockElement.textContent = date.toString();
              }
          }

          setInterval(clock, 1000);

          var dateElement = document.getElementById('date');

          function date() {
              var date = new Date();

              dateElement.textContent = date.toString();
          }
      </script>  
  </body>
</html>
<?php } ?>