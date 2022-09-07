<?php
ob_start();
session_start();
include '../assets/php/connect_db.php';
if (!isset($_SESSION['cart'])) {
    header('Location: http://localhost/Dungcuyte/index.php');
} else {
    if (isset($_GET['ms'])) {
        $ms = $_GET['ms'];
        if ($ms) {
            if (array_key_exists($ms, $_SESSION['cart'])) {
                unset($_SESSION['cart'][$ms]);
                header('Location: http://localhost/Dungcuyte/KhachHang/cart.php');
                // $_SESSION['cart'][$key]['sl']-=1;
            }
        }
    }

    if (isset($_GET['id']) && isset($_GET['key'])) {
        $id = $_GET['id'];
        $key = $_GET['key'];
        if ($id == 'plus') {
            if (array_key_exists($key, $_SESSION['cart'])) {
                $_SESSION['cart'][$key]['sl'] += 1;
            }
        }
        if ($id == 'sub') {
            if (array_key_exists($key, $_SESSION['cart'])) {
                $_SESSION['cart'][$key]['sl'] -= 1;
            }
        }
        header('Location: http://localhost/Dungcuyte/KhachHang/cart.php');
    }
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        if ($action) {
            unset($_SESSION['cart']);
            header('Location: http://localhost/Dungcuyte/index.php');
        }
    }
}
