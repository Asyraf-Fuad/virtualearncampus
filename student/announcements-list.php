<?php

include_once '../common/template.php';
include_once '../database/dbconnect.php';

// HTML boilerplate
templateHeader();
templateTopNav();
leftPane('announcements','announcements-list', 'student');

include_once '../common/announcements-list.php';

?>
