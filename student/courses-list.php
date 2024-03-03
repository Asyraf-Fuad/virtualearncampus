<?php

include_once '../common/template.php';
include_once '../database/dbconnect.php';

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('courses','courses-list','student');

global $user;
$user='student';
include_once '../common/courses-list.php';

?>
