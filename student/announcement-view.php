<?php

include_once '../common/template.php';
include_once '../database/dbconnect.php';

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('announcements', '', 'student');

global $user;
$user='student1';
include_once '../announcement-view.php';

?>
