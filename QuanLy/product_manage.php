<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="stylesheet" href="../assets/css/product_manage.css">
    <link rel="stylesheet" href="../assets/css/grid.css">

    <!-- them dong ke tiep se lay duoc toan trang ko margin -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-5.15.3-web/css/all.css">
</head>

<body>

    <div class="app">
        <?php require_once '../assets/sidebar/header.php';
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user'] == 'admin') {
            } else {
                header('location: http://localhost/Bookstore/KhachHang/logout.php');
            }
        } else {
            echo "<script> confirm('You are not logged in');</script>";

            header('location: http://localhost/Bookstore/QuanLy/admin.php');
        } ?>

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
                                    <a href="http://localhost/Bookstore/QuanLy/admin.php" class="category-item-link">Dashboard</a>
                                </li>
                                <li class="category-item">
                                    <a href="http://localhost/Bookstore/QuanLy/product_manage.php" class="category-item-active category-item-link">Product Manage</a>
                                </li>
                                <li class="category-item">
                                    <a href="http://localhost/Bookstore/QuanLy/user_manage.php" class="category-item-link">Account Manage</a>
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
                            <h4 class="product__heading">Product Infomation</h4>
                            <button class="product__heading-btn"><a href="http://localhost/Bookstore/QuanLy/edit_product.php" class="product__heading-btn-link">+ Add Product</a></button>
                        </div>

                        <table class="table">
                            <tr class="table__heading">
                                <th class="table__th-id">ID</th>
                                <th class="table__th-image">IMAGE</th>
                                <th class="table__th-name">NAME</th>
                                <th class="table__th-idproduct">ID PRODUCT</th>
                                <th class="table__th-quantity">Q</th>
                                <th class="table__th-price">PRICE</th>
                                <th class="table__th-description">DESCRIPTION</th>
                                <th class="table__th-action">ACTION</th>
                            </tr>
                            <?php
                            $id = 1;
                            include '../assets/php/connect_db.php';
                            $result = mysqli_query($con, "select * from hanghoa as a, hinhhanghoa as b where a.MSHH = b.MSHH");
                            mysqli_close($con);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <tr class="table__content">
                                    <td class="table__td-id"><?= $id++ ?></td>
                                    <td class="table__td-image"><img src="<?= $row['TenHinh'] ?>" alt="" class="td-img"></td>
                                    <td class="table__td-name"><?= $row['TenHH'] ?></td>
                                    <td class="table__td-idproduct"><?= $row['MSHH'] ?></td>
                                    <td class="table__td-quantity"><?= $row['SoLuongHang'] ?></td>
                                    <td class="table__td-price"><?= number_format($row['Gia'], 0, ',', '.') ?></td>
                                    <td class="table__td-description"><?= $row['MoTa'] ?></td>
                                    <td class="table__td-action">
                                        <button class="action__btn edit"><a href="http://localhost/Bookstore/QuanLy/directional.php?action=edit_product" class="action__link">Edit</a></button>
                                        <button class="action__btn del"><a href="http://localhost/Bookstore/QuanLy/product_manage.php?id=<?= $row['MSHH'] ?>" class="action__link">Delete</a></button>
                                    </td>
                                </tr>
                            <?php } ?>

                            <?php
                            if (isset($_GET['id'])) {
                                // $action=$_GET['action'];
                                $id = $_GET['id'];
                                include '../assets/php/connect_db.php';
                                $sql = "delete from hanghoa where MSHH = '$id'";

                                if (mysqli_query($con, $sql)) {
                                    echo "<script> alert('Success');</script>";
                                } else {
                                    echo "<script> alert('Fail');</script>";
                                }

                                mysqli_close($con);
                            }


                            ?>

                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once '../assets/sidebar/footer.php' ?>
    </div>

    <!-- Sau div toan trang la Modal -->
</body>

</html>