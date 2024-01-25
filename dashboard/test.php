<!-- HTML boilerplate functions -->
<?php function templateHeader(){ ?>
<!doctype html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <title>VirtuaLearnCampus</title>
    <link rel='stylesheet' href='css/style.css''>
    <link rel='stylesheet' href='https://unpkg.com/@icon/themify-icons/themify-icons.css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.3.1/css/flag-icon.min.css' rel='stylesheet'/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href='css/index.css' rel='stylesheet'>
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

<?php function itemForms($page, $table) {
global $userAuth;
if ($page=='forms'){ 
    { $activeForms='active'; $showForms='show';}
    if ($table=='courses'){$activeCourses='active';}
    else if ($table=='product'){$activeProduct='active';} }
if ($userAuth=='Admin'): ?>
<li class='nav-item'>
    <a class='nav-link accordion-header <?php echo $activeForms ?>' data-bs-toggle='collapse' href='#collapseForms' role='button' aria-expanded='false' aria-controls='collapseForms'>
    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-file'><path d='M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z'></path><polyline points='13 2 13 9 20 9'></polyline></svg>
    <span data-feather='file'></span>
    Forms
    </a>
    <div class='<?php echo $showForms ?> collapse' id='collapseForms'>
    <div class='nav-link'>
        <ul class='nav flex-column sub-menu'>
        <li class='nav-item'><i class='glyphicon glyphicon-home'></i><a class='nav-link <?php echo $activeCourses ?>' href='courses-list.php'>Courses</a></li>
        <li class='nav-item'> <a class='nav-link <?php echo $activeProduct ?>' href='product-form.php'>Products</a></li>
        </ul>
    </div>
    </div>
</li>
<?php endif; }?>

<?php function itemTables($page, $table) {
if ($page=='tables'){ 
    { $showTables='show'; $activeTables='active';}
    if ($table=='courses'){$activeCourses='active'; }
    else if ($table=='product'){$activeProduct='active';} 
    else if ($table=='summary'){$activeSummary='active';} } ?>
    <li class="nav-item">
            <a class="nav-link accordion-header <?php echo $activeTables ?>" data-bs-toggle="collapse" href="#collapseTables" role="button" aria-expanded="false" aria-controls="collapseTables">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
              <span data-feather="layers"></span>
              Courses
            </a>
            <div class="<?php echo $showTables ?>collapse" id="collapseTables">
              <div class="nav-link">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link <?php echo $activeCourses ?>" href="courses-list.php">Search Courses</a></li>
                  <li class="nav-item"> <a class="nav-link <?php echo $activeCourses ?>" href="courses-mylist.php">My Courses</a></li>
                </ul>
              </div>
            </div>
          </li>
<?php }?>

  <?php function itemAnnouncements($page) { 
    if ($page=='announcements'){ $activeAnnouncements='active';}?>
    <li class="nav-item">
    <a class="nav-link <?php echo $activeAnnouncements ?> pr-2" aria-current="page" href="announcements.php">
    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M160 368c26.5 0 48 21.5 48 48v16l72.5-54.4c8.3-6.2 18.4-9.6 28.8-9.6H448c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16V352c0 8.8 7.2 16 16 16h96zm48 124l-.2 .2-5.1 3.8-17.1 12.8c-4.8 3.6-11.3 4.2-16.8 1.5s-8.8-8.2-8.8-14.3V474.7v-6.4V468v-4V416H112 64c-35.3 0-64-28.7-64-64V64C0 28.7 28.7 0 64 0H448c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H309.3L208 492z"/></svg>      <span data-feather="home"></span>
      Announcements
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php echo $activeAnnouncements ?> pr-2" aria-current="page" href="announcements.php">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-square-text" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
</svg>
      <span data-feather="home"></span>
      Announcements
    </a>
  </li>
<?php }?>

<?php function leftPane($page, $table) {?>
  <div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">

          <?php templateUserProfile();?>

        <ul class="nav flex-column">
          
          
          <?php
          itemDashboard($page);
          itemForms($page, $table);
          itemTables($page, $table);
          itemAnnouncements($page);
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
  <script src="js/index-charts.js"></script> 
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
      </script>  
  </body>
</html>
<?php } ?>