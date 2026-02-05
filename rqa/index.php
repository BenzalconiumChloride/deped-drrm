<?php
require_once '../global-library/database.php';
// require_once '../general-library/auth.php'; // Comment out or remove this line
// require_once '../include/config.php';

if (isset($_GET['rqa'])) {
    $view = 'rqa';
} else {
    $view = '';
}

$currentPage = 'rqa';

switch ($view) {
    case 'rqa':
        $content   = 'rqa.php';
        $pageTitle = 'RQA';
        break;
        break;

    default:
        $content   = 'rqa.php';
        $pageTitle = 'RQA';
        break;
}

require_once '../include/template.php';
?>