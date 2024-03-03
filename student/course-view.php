<?php

include_once '../common/template.php';
include_once '../database/dbconnect.php';

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('courses', '', 'student');

global $user;
$user='student';
include_once '../course-view.php';

?>
