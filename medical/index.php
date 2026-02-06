<?php

require_once '../global-library/database.php';

// require_once '../general-library/auth.php'; // Comment out or remove this line

// require_once '../include/config.php';


if (isset($_GET['medical'])) {
    $view = 'Medical';
} else {
    $view = '';
}

$currentPage = 'Medical';


switch ($view) {
    case 'Medical':
        $content   = 'medical.php';
        $pageTitle = 'Medical';
        break;


    default:
        $content   = 'medical.php';
        $pageTitle = 'Medical';
        break;
}

require_once '../include/template.php';
