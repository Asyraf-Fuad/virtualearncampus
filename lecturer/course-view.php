<?php

include_once '../common/template.php';
include_once '../database/dbconnect.php';

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('courses', '', 'lecturer');

global $user;
$user='Mr Alex';
include_once '../common/course-view.php';

?>
