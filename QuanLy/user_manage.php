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
    <link rel="stylesheet" href="../assets/css/user_manage.css">

    <!-- them dong ke tiep se lay duoc toan trang ko margin -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-5.15.3-web/css/all.css">
</head>

<body>
    <div class="app">
        <?php
        require '../assets/sidebar/header.php';
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user'] == 'admin') {
            } else {
                echo "<script> confirm('You are not logged in');</script>";
                header('location: http://localhost/Bookstore/KhachHang/logout.php');
            }        } else {
            echo "<script> confirm('You are not logged in');</script>";

            header('location: http://localhost/Bookstore/QuanLy/admin.php');
        }
        ?>

        <div class="app__container">
            <div class="grid wide">
                <div class="row app__content app__content2">
                    <div class="col l-2 m-0 c-0">
                        <!-- Category -->
                        <nav class="category">
                            <h3 class="category__heading">
                                <i class="category__heading-icon fas fa-tasks"></i> Manage List
                            </h3>
                            <ul class="category-list">
                                <li class="category-item">
                                    <a href="http://localhost/Bookstore/QuanLy/admin.php" class="category-item-link">Dashboard</a>
                                </li>
                                <li class="category-item">
                                    <a href="http://localhost/Bookstore/QuanLy/product_manage.php" class="category-item-link">Product Manage</a>
                                </li>
                                <li class="category-item">
                                    <a href="http://localhost/Bookstore/QuanLy/user_manage.php" class="category-item-active category-item-link">Account Manage</a>
                                </li>
                                <li class="category-item">
                                    <a href="http://localhost/Bookstore/QuanLy/order_manage.php" class="category-item-link">Order Manage</a>
                                </li>
                                <li class="category-item">
                                    <a href="" class="category-item-link">Configuration</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col l-10">
                        <div class="product__manage-block-heading">
                            <h4 class="product__heading">User Infomation</h4>
                            <button class="product__heading-btn"><a href="http://localhost/Bookstore/QuanLy/directional.php?action=edit_user" class="action__link">+ Add User</a></button>
                        </div>

                        <table class="table">
                            <tr class="table__heading">
                                <th class="table__th-id">ID</th>
                                <th class="table__th-id-user">ID Customer</th>
                                <th class="table__th-name">NAME</th>
                                <th class="table__th-company">COMPANY</th>
                                <th class="table__th-phone">PHONE</th>
                                <th class="table__th-email">EMAIL</th>
                                <th class="table__th-user">USER</th>
                                <th class="table__th-password">PASSWORD</th>
                                <th class="table__th-action">ACTION</th>
                            </tr>
                            <?php
                            include '../assets/php/connect_db.php';
                            $result = mysqli_query($con, "select * from khachhang");
                            mysqli_close($con);
                            $i = 1;
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <tr class="table__content">
                                    <td class="table__td-id"><?= $i++ ?></td>
                                    <td class="table__td-id-user"><?= $row['MSKH'] ?></td>
                                    <td class="table__td-name"><?= $row['HoTenKH'] ?></td>
                                    <td class="table__td-company"><?= $row['TenCongTy'] ?></td>
                                    <td class="table__td-phone"><?= $row['SoDienThoai'] ?></td>
                                    <td class="table__td-email"><?= $row['Email'] ?></td>
                                    <td class="table__td-user"><?= $row['User'] ?></td>
                                    <td class="table__td-password"><?= $row['Password'] ?></td>
                                    <td class="table__td-action">
                                        <button class="action__btn edit"><a href="http://localhost/Bookstore/QuanLy/directional.php?action=edit_user" class="action__link">Edit</a></button>
                                        <button class="action__btn del"><a href="http://localhost/Bookstore/QuanLy/user_manage.php?id=<?= $row['MSKH'] ?>" class="action__link">Delete</a></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>

                        <?php
                        if (isset($_GET['id'])) {
                            // $action=$_GET['action'];
                            $id = $_GET['id'];
                            include '../assets/php/connect_db.php';
                            $sql = "delete from khachhang where MSKH = '$id'";

                            if (mysqli_query($con, $sql)) {
                                echo "<script> alert('Success');</script>";
                            } else {
                                echo "<script> alert('Fail');</script>";
                            }

                            mysqli_close($con);
                        }


                        ?>



                        <!-- Nhan vien -->
                        <div class="product__manage-block-heading">
                            <h4 class="product__heading">Staff Infomation</h4>
                            <button class="product__heading-btn"><a href="http://localhost/Bookstore/QuanLy/directional.php?action=edit_user" class="action__link">+ Add User</a></button>
                        </div>

                        <table class="table">
                            <tr class="table__heading">
                                <th class="table__th-id">ID</th>
                                <th class="table__th-id-user">ID Customer</th>
                                <th class="table__th-name">NAME</th>
                                <th class="table__th-company">OFFICE</th>
                                <th class="table__th-phone">PHONE</th>
                                <th class="table__th-email">Address</th>
                                <th class="table__th-user">USER</th>
                                <th class="table__th-password">PASSWORD</th>
                                <th class="table__th-action">ACTION</th>
                            </tr>
                            <?php
                            include '../assets/php/connect_db.php';
                            $result = mysqli_query($con, "select * from nhanvien");
                            mysqli_close($con);
                            $i = 1;
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <tr class="table__content">
                                    <td class="table__td-id"><?= $i++ ?></td>
                                    <td class="table__td-id-user"><?= $row['MSNV'] ?></td>
                                    <td class="table__td-name"><?= $row['HoTenNV'] ?></td>
                                    <td class="table__td-company"><?= $row['ChucVu'] ?></td>
                                    <td class="table__td-phone"><?= $row['SoDienThoai'] ?></td>
                                    <td class="table__td-email"><?= $row['DiaChi'] ?></td>
                                    <td class="table__td-user"><?= $row['User'] ?></td>
                                    <td class="table__td-password"><?= $row['Password'] ?></td>
                                    <td class="table__td-action">
                                        <button class="action__btn edit"><a href="http://localhost/Bookstore/QuanLy/directional.php?action=edit" class="action__link">Edit</a></button>
                                        <button class="action__btn del"><a href="http://localhost/Bookstore/QuanLy/user_manage.php?id=<?= $row['MSNV'] ?>" class="action__link">Delete</a></button>
                                    </td>
                                </tr>



                            <?php } ?>

                        </table>
                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            include '../assets/php/connect_db.php';
                            $sql = "delete from nhanvien where MSNV = '$id'";

                            if (mysqli_query($con, $sql)) {
                                echo "<script> alert('Success');</script>";
                            } else {
                                echo "<script> alert('Fail');</script>";
                            }

                            mysqli_close($con);
                        }


                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        require '../assets/sidebar/footer.php';
        ?>
    </div>

    <!-- Sau div toan trang la Modal -->
</body>

</html>