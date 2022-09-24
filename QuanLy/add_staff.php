<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm nhân viên</title>
    <link rel="stylesheet" href="http://localhost/Dungcuyte/assets/css/style.css">
    <link rel="stylesheet" href="http://localhost/Dungcuyte/assets/css/grid.css">
    <link rel="stylesheet" href="http://localhost/Dungcuyte/assets/css/responsive.css">
    <link rel="stylesheet" href="http://localhost/Dungcuyte/assets/css/register_login.css">
    <!-- them dong ke tiep se lay duoc toan trang ko margin -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese">
    <link rel="stylesheet" href="http://localhost/Dungcuyte/assets/fonts/fontawesome-free-5.15.3-web/css/all.css">
</head>

<body>
    <div class="app">
        <?php
        require '../assets/php/connect_db.php';
        require '../assets/sidebar/header.php';
        ?>

        <?php
        $i = 1;
        if (isset($_POST['submit'])) {
            // $cong = mysqli_query($con, "select * from nhanvien");
            $msnv = 'NV' . rand();
            $hoten = $_POST['txtHoTenNV'];
            $chucvu = $_POST['txtChucVu'];
            $diachi = $_POST['txtDiaChi'];
            $sodienthoai = $_POST['txtSoDienThoai'];
            $user = $_POST['txtUser'];
            $pass = $_POST['txtPassword'];
            if (($hoten == '') || ($chucvu == '') || ($sodienthoai == '') || ($diachi == '') || ($user == '') || ($pass == '')) {
                echo "<script> alert('Please fill your infomation');</script>";
            } else {
                $sql = "select * from nhanvien where User='$user'";
                $result = mysqli_query($con, $sql);
                $s = mysqli_num_rows($result);
                if ($s > 0) {
                    echo "<script> alert('User Name Existed ! Please try again');</script>";
                } else {

                    $sql1 = ("insert into nhanvien values('$msnv','$hoten','$chucvu','$diachi','$sodienthoai','$user','$pass')");

                    if (mysqli_query($con, $sql1)) {
                        echo "<script> alert('Success');</script>";
                        header('Refresh:1 ;url= http://localhost/Dungcuyte/QuanLy/admin.php');
                    } else {
                        echo "<script> alert('Fail');</script>";
                    }
                }
            }
        }
        mysqli_close($con);
        ?>

        <?php
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            if ($action == 'register') {
                echo '<style>.auth-form__login-container {display: none;}</style>';
            } else if ($action == 'login') {
                echo '<style>.auth-form__register-container {display: none;}</style>';
            }
        }
        ?>
        <div class="app__container">
            <div class="grid wide">
                <div class="row">
                    <!-- Register -->
                    <div class="auth-form">
                        <!-- <div class="col l-2 m-0 c-0"></div> -->
                        <!-- Form Container -->
                        <div class="auth-form__register-container">
                            <!-- Header -->
                            <div class="auth-form__header">
                                <h3 class="auth-form__heading">ĐĂNG KÝ</h3>
                            </div>
                            <!-- Content -->
                            <form class="auth-form__form" method="POST" action="">
                                <br> <input type="text" name="txtHoTenNV" class="auth-form__input" placeholder="Họ và tên">
                                <br> <input type="text" name="txtChucVu" class="auth-form__input" placeholder="Chức vụ">
                                <br> <input type="text" name="txtDiaChi" class="auth-form__input" placeholder="Địa chỉ">
                                <br> <input type="text" name="txtSoDienThoai" class="auth-form__input" placeholder="Số ĐT">
                                <br> <input type="text" name="txtUser" class="auth-form__input" placeholder="Tên đăng nhập">
                                <br> <input type="password" name="txtPassword" class="auth-form__input" placeholder="Mật khẩu 6 - 8 ký tự">
                                <div class="auth-form__aside">
                                    <p class="auth-form__policy-text">
                                        Hoàn thành đăng ký, bạn có đồng ý về
                                        <a href="" class="auth-form__policy-link">Chính sách dịch vụ</a> và
                                        <a href="" class="auth-form__policy-link">Bảo mật</a>
                                    </p>
                                </div>
                                <!-- Button -->
                                <input class="btn btn--primary" type="submit" name="submit" value="ĐĂNG KÝ">
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php //require 'http://localhost/Dungcuyte/assets/sidebar/footer.php'; 
        ?>
    </div>

    <!-- Sau div toan trang la Modal -->
</body>
<?php ob_flush() ?>

</html>