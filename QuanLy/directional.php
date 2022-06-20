<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
if ($action == 'index') {
    include './index.php';
}

if ($action == 'edit_user') {
    include './edit_user.php';
}

if ($action == 'edit_product') {
    include './edit_product.php';
}

if ($action == 'register_login') {
    include './register_login.php';
}


if ($action == 'AP') {
    include "./test.php";
}


if ($action == 'product') {
    //echo '<style>.grid__column-10{display:none;}</style>';
   include './test.php';
}


function getCurURL()
{
    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
        $pageURL = "";
    } else {
      $pageURL = '';
    }
    if (isset($_SERVER["SERVER_PORT"]) && $_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}
//echo getCurURL();
