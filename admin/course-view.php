<?php

include_once '../common/template.php';
include_once '../database/dbconnect.php';

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('courses', '', 'admin');

global $user;
$user='admin';
include_once '../common/course-view.php';

?>
