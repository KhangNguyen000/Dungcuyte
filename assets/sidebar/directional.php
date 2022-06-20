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
