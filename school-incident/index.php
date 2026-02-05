<?php

require_once '../global-library/database.php';

// require_once '../general-library/auth.php'; // Comment out or remove this line

// require_once '../include/config.php';


if (isset($_GET['disaster'])) {
    $view = 'Disaster';
} else {
    $view = '';
}

$currentPage = 'disaster';


switch ($view) {
    case 'Disaster':
        $content   = 'disaster.php';
        $pageTitle = 'Disaster';
        break;


    default:
        $content   = 'disaster.php';
        $pageTitle = 'Disaster';
        break;
}

require_once '../include/template.php';
