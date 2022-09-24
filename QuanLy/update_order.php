<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Order</title>
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
        require '../assets/sidebar/header.php';
        ?>

        <?php
        $i = 1;
        require '../assets/php/connect_db.php';
        if (isset($_POST['submit'])) {
            $dathang = $_POST['dathang'];
            $tinhtrang = $_POST['tinhtrang'];
            $sqlUpDH = "UPDATE `dathang` SET `TinhTrang` = '$tinhtrang' WHERE `dathang`.`SoDonDH` = '$dathang';";
            if(mysqli_query($con, $sqlUpDH)){
                header('location: http://localhost/Dungcuyte/QuanLy/order_manage.php');
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
                                <h3 class="auth-form__heading">CẬP NHẬT TÌNH TRẠNG ĐƠN HÀNG</h3>
                            </div>
                            <!-- Content -->
                            <form class="auth-form__form" method="POST" action="">
                                <br> <select name="dathang">
                                    <?php
                                    $sqlDH = "SELECT * from dathang";
                                    $res = mysqli_query($con, $sqlDH);
                                    while ($row = mysqli_fetch_array($res)) {
                                    ?>
                                        <option value="<?= $row['SoDonDH'] ?>"><?= $row['SoDonDH'] ?></option>
                                    <?php } ?>
                                </select>

                                <br> <select name="tinhtrang">
                                    <option value="Đang xác nhận">Đang xác nhận</option>
                                    <option value="Đã xác nhận đơn hàng">Đã xác nhận đơn hàng</option>
                                    <option value="Đang vận chuyển">Đang vận chuyển</option>
                                    <option value="Đã nhận hàng">Đã nhận hàng</option>
                                </select>
                                <!-- Button -->
                                <br><input class="btn btn--primary" type="submit" name="submit" value="CẬP NHẬT">
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