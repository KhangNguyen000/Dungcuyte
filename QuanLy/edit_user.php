<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý người dùng</title>
    <link  rel="stylesheet" href="../assets/css/style.css">
    <link  rel="stylesheet" href="../assets/css/grid.css">
    <link  rel="stylesheet" href="../assets/css/responsive.css">
    <link  rel="stylesheet" href="../assets/css/user_manage.css">


    <!-- them dong ke tiep se lay duoc toan trang ko margin -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-5.15.3-web/css/all.css">
</head>

<body>
    <div class="app">
        <?php require '../assets/sidebar/header.php';
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user'] == 'admin') {
            } else {
                header('location: http://localhost/Dungcuyte/KhachHang/logout.php');
            }
        } else {
            echo "<script> confirm('You are not logged in');</script>";

            header('location: http://localhost/Dungcuyte/QuanLy/admin.php');
        }
        ?>

        <div class="app__container">
            <div class="grid wide">
                <div class="row app__content">
                    <div class="col l-2 m-0 c-0">
                        <!-- Category -->
                        <nav class="category">
                            <h3 class="category__heading">
                                <i class="category__heading-icon fas fa-tasks"></i> Manage List
                            </h3>
                            <ul class="category-list">
                                <li class="category-item">
                                    <a href="http://localhost/Dungcuyte/QuanLy/admin.php" class="category-item-link">Dashboard</a>
                                </li>
                                <li class="category-item">
                                    <a href="http://localhost/Dungcuyte/QuanLy/product_manage.php" class="category-item-link">Product Manage</a>
                                </li>
                                <li class="category-item">
                                    <a href="http://localhost/Dungcuyte/QuanLy/user_manage.php" class="category-item-active category-item-link">Account Manage</a>
                                </li>
                                <li class="category-item">
                                    <a href="http://localhost/Dungcuyte/QuanLy/order_manage.php" class="category-item-link">Order Manage</a>
                                </li>
                                <li class="category-item">
                                    <a href="" class="category-item-link">Configuration</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col l-10">


                        <div class="auth-form__register-container">
                            <?php
                            include '../assets/php/connect_db.php';
                            if (isset($_POST['add'])) {
                                $ms = $_POST['txtMS'];
                                $hoten = $_POST['txtHoTen'];
                                $chucvu = $_POST['txtChucVu'];
                                $tencongty = $_POST['txtTenCongTy'];
                                $sodienthoai = $_POST['txtSoDienThoai'];
                                $email = $_POST['txtEmail'];
                                $user = $_POST['txtUser'];
                                $pass = $_POST['txtPassword'];
                                //$i = 1;

                                if ($tencongty = $_POST['txtTenCongTy']) {
                                    $sql1 = ("insert into khachhang values('$ms','$hoten','$tencongty','$sodienthoai','$email','$user','$pass')");

                                    if (mysqli_query($con, $sql1)) {
                                        echo "<script> alert('Success');</script>";
                                    } else {
                                        echo "<script> alert('Fail');</script>";
                                    }
                                }

                                if ($chucvu = $_POST['txtChucVu']) {
                                    $sql1 = ("insert into nhanvien values('$ms','$hoten','$chucvu','$sodienthoai','$email','$user','$pass')");

                                    if (mysqli_query($con, $sql1)) {
                                        echo "<script> alert('Success');</script>";
                                    } else {
                                        echo "<script> alert('Fail');</script>";
                                    }
                                }
                            }


                            if (isset($_POST['update'])) {
                                $ms = $_POST['txtMS'];

                                $hoten = $_POST['txtHoTen'];

                                $tencongty = $_POST['txtTenCongTy'];

                                $sodienthoai = $_POST['txtSoDienThoai'];

                                $email = $_POST['txtEmail'];

                                $user = $_POST['txtUser'];

                                $pass = $_POST['txtPassword'];

                                $sql1 = ("update khachhang set HoTenKH='$hoten',TenCongTy='$tencongty',SoDienThoai='$sodienthoai',Email='$email',User='$user',Password='$pass' where MSKH='$ms'");

                                if (mysqli_query($con, $sql1)) {
                                    echo "<script> alert('Success');</script>";
                                    header('Location: http://localhost/Dungcuyte/QuanLy/user_manage.php');
                                } else {
                                    echo "<script> alert('Fail');</script>";
                                }
                            }
                            mysqli_close($con);
                            ?>
                            <!-- Header -->
                            <div class="auth-form__header">
                                <h4 class="product__heading">Update Infomation</h4>
                            </div>
                            <!-- Content -->
                            <form class="auth-form__form" method="POST" action="">
                                <br> <input type="text" name="txtMS" class="auth-form__input" placeholder="ID User">
                                <br> <input type="text" name="txtHoTen" class="auth-form__input" placeholder="Full Name">
                                <br> <input type="text" name="txtTenCongTy" class="auth-form__input" placeholder="Company Name">
                                <br> <input type="text" name="txtChucVu" class="auth-form__input" placeholder="Office (in shop)">
                                <br> <input type="text" name="txtSoDienThoai" class="auth-form__input" placeholder="Phone Number">
                                <br> <input type="text" name="txtEmail" class="auth-form__input" placeholder="Email or Address">
                                <br> <input type="text" name="txtUser" class="auth-form__input" placeholder="User Name">
                                <br> <input type="password" name="txtPassword" class="auth-form__input" placeholder="Password">

                                <!-- Button -->
                                <div class="button__form">

                                    <input class="btn btn--primary" type="submit" name="update" value="UPDATE">
                                    <input class="btn btn--primary" type="submit" name="add" value="ADD NEW">
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require '../assets/sidebar/footer.php'; ?>
    </div>

    <!-- Sau div toan trang la Modal -->
</body>

</html>