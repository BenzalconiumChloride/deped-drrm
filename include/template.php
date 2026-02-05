<?php

if (!defined('WEB_ROOT')) {

    header('Location: ../index.php');

    exit;

}



$self = WEB_ROOT . 'index.php';



?>

<!DOCTYPE html>



<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">



<head>

    <meta charset="utf-8">

    <link rel="icon" href="<?php echo WEB_ROOT; ?>assets/images/favicon.png" type="image/png" />

    <title>DepEd Silay</title>



    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">



    <?php include($_SERVER["DOCUMENT_ROOT"] . '/' . $webRoot . '/include/global-css.php'); ?>





</head>



<body class="main">


    <div class="left-menu sticky-top">

        <?php include($_SERVER["DOCUMENT_ROOT"] . '/' . $webRoot . '/include/header.php'); ?>

    </div>





    <?php require_once $content; ?>





    <?php include($_SERVER["DOCUMENT_ROOT"] . '/' . $webRoot . '/include/footer.php'); ?>



    <script>

        window.addEventListener('load', function() {

            const loader = document.getElementById('global-loader');

            if (loader) {

                loader.classList.add('fade-out');

                // Optional: remove from DOM after animation

                setTimeout(() => {

                    loader.style.display = 'none';

                }, 300);

            }

        });

    </script>

    <?php include($_SERVER["DOCUMENT_ROOT"] . '/' . $webRoot . '/include/global-js.php'); ?>



</body>



</html>