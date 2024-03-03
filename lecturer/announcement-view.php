<?php

include_once '../common/template.php';
include_once '../database/dbconnect.php';

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('announcements','announcement-view', 'lecturer');

global $user;
$user='Mr Alex';
include_once '../announcement-view.php';

?>
