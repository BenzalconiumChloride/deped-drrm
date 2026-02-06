<?php

require_once '../global-library/database.php';

// require_once '../general-library/auth.php'; // Comment out or remove this line

// require_once '../include/config.php';


if (isset($_GET['school-incident'])) {
    $view = 'School Incident';
} else {
    $view = '';
}

$currentPage = 'school-incident';


switch ($view) {
    case 'School Incident':
        $content   = 'school-incident.php';
        $pageTitle = 'School Incident';
        break;


    default:
        $content   = 'school-incident.php';
        $pageTitle = 'School Incident';
        break;
}

require_once '../include/template.php';
