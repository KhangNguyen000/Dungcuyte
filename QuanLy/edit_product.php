<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/product_manage.css">

    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- <link rel="stylesheet" href="./assets/css/auth_form.css"> -->

    <!-- them dong ke tiep se lay duoc toan trang ko margin -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-5.15.3-web/css/all.css">
    <style>
        .tooltip {
            position: relative;
            display: inline-block;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 140px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 150%;
            left: 50%;
            margin-left: -75px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>
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
                                    <a href="http://localhost/Dungcuyte/QuanLy/product_manage.php" class="category-item-active category-item-link">Product Manage</a>
                                </li>
                                <li class="category-item">
                                    <a href="http://localhost/Dungcuyte/QuanLy/user_manage.php" class="category-item-link">Account Manage</a>
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
                        <!-- Add Product -->
                        <?php
                        include '../assets/php/connect_db.php';

                        if (isset($_POST['submit'])) {
                            $type_product = $_POST['type_product'];
                            $id_product = $_POST['id_product'];
                            $name_product = $_POST['name_product'];
                            $old_price_product = $_POST['old_price_product'];
                            $price_product = $_POST['price_product'];
                            $description_product = $_POST['description_product'];
                            $tag_product = $_POST['tag_product'];
                            $quantity_product = $_POST['quantity_product'];
                            $ten_thu_muc = $_POST['ten_thu_muc'];
                            // Upload image
                            // $target_dir = "../assets/hinhanh/";
                            // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                            // move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                            $target_dir = "http://localhost/Dungcuyte/assets/hinhanh/$ten_thu_muc";
                            // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

                            $sql = "insert into hanghoa values('$id_product','$name_product','$old_price_product','$price_product','$quantity_product','$description_product','$tag_product','$type_product') ";

                            if (mysqli_query($con, $sql)) {
                                $result = mysqli_query($con, "select * from hanghoa where MSHH='$id_product'");
                                $check = mysqli_num_rows($result);
                                $random = rand(110, 10000);
                                if ($check > 0) {
                                    $sqlhinh = "insert into hinhhanghoa values('$random','$id_product','$target_dir','$target_dir')";
                                    mysqli_query($con, $sqlhinh);
                                }
                                echo "<script> alert('Success');</script>";
                                // header('Location: http://localhost/Dungcuyte/QuanLy/edit_product.php');
                            } else {
                                echo "<script> alert('Fail');</script>";
                            }

                            mysqli_close($con);
                        }
                        if (isset($_POST['update'])) {
                            $id_product = $_POST['id_product'];
                            $old_price_product = $_POST['old_price_product'];
                            $price_product = $_POST['price_product'];
                            $quantity_product = $_POST['quantity_product'];
                            include '../assets/php/connect_db.php';
                            $sql = "update hanghoa set Gia_Cu='$old_price_product',Gia='$price_product',SoLuongHang='$quantity_product' where MSHH='$id_product'";
                            if (mysqli_query($con, $sql)) {
                                echo "<script> alert('Success');</script>";
                                header('Refresh: 1;url= http://localhost/Dungcuyte/QuanLy/product_manage.php');
                            } else {
                                echo "<script> alert('Fail');</script>";
                                header('Refresh: 1;url= http://localhost/Dungcuyte/QuanLy/product_manage.php');
                            }
                            mysqli_close($con);
                        } else if (isset($_POST['add'])) {
                            $id_type_product = $_POST['id_type_product'];
                            $name_type_product = $_POST['name_type_product'];
                            include '../assets/php/connect_db.php';
                            $sql = "insert into loaihanghoa values('$id_type_product','$name_type_product')";
                            if (mysqli_query($con, $sql)) {
                                echo "<script> alert('Success');</script>";
                                header('Refresh: 1;url= http://localhost/Dungcuyte/QuanLy/product_manage.php');
                            } else {
                                echo "<script> alert('Fail');</script>";
                                header('Refresh: 1;url= http://localhost/Dungcuyte/QuanLy/product_manage.php');
                            }
                            mysqli_close($con);
                        }
                        ?>
                        <form action="http://localhost/Dungcuyte/QuanLy/edit_product.php" method="POST" enctype="multipart/form-data">

                            <h5 class="form__add-product-label">ID Type of Product:</h5>
                            <select name="type_product" id="type-product">
                                <option value="none">Type Product</option>
                                <?php
                                include '../assets/php/connect_db.php';
                                $ketqua = mysqli_query($con, "select * from loaihanghoa");
                                while ($row = mysqli_fetch_array($ketqua)) {
                                    echo '<option value="' . $row['MaLoaiHang'] . '">' . $row['MaLoaiHang'] . ' -' . $row['TenLoaiHang'] . '</option>';
                                }

                                ?>
                            </select>
                            <!-- Type -->
                            <h5 class="form__add-product-label">Type Product:</h5>
                            <input type="text" name="id_type_product" class="form__add-product-input">
                            <h5 class="form__add-product-label">Name Type Product:</h5>
                            <input type="text" name="name_type_product" class="form__add-product-input">
                            <input type="submit" class="form__add-product-submit" name="add" value="ADD">
                            <!-- Product -->
                            <h5 class="form__add-product-label">ID Product:</h5>
                            <input type="text" name="id_product" class="form__add-product-input" placeholder="Enter for Update">
                            <h5 class="form__add-product-label">Name Product:</h5>
                            <input type="text" name="name_product" class="form__add-product-input">
                            <h5 class="form__add-product-label">Old Price:</h5>
                            <input type="text" name="old_price_product" class="form__add-product-input" placeholder="Enter for Update">
                            <h5 class="form__add-product-label">Price:</h5>
                            <input type="text" name="price_product" class="form__add-product-input" placeholder="Enter for Update">
                            <h5 class="form__add-product-label">Description:</h5>
                            <textarea type="text" name="description_product" class="form__add-product-input description"></textarea>

                            <h5 class="form__add-product-label">Quantity:</h5>
                            <input type="text" name="quantity_product" class="form__add-product-input" placeholder="Enter for Update">
                            <h5 class="form__add-product-label">Tags:</h5>
                            <input type="text" name="tag_product" class="form__add-product-input" placeholder="Enter for Update">
                            <h5 class="form__add-product-label">Folder Image:</h5>
                            <input type="text" name="ten_thu_muc" class="form__add-product-input" placeholder="Enter for Update">
                            <!-- <h5 class="form__add-product-label">Image:</h5>
                            <input type="file" value="Select Image" name="fileToUpload" id="fileToUpload" class="form__add-product-input"> -->
                            <!-- <input type="text" class="form__add-product-input" name="image_product" placeholder="URL IMAGE"> -->
                            <div class="form__add-product-submit-wrap">
                                <input type="submit" class="form__add-product-submit" name="submit" value="Submit">
                                <input type="submit" class="form__add-product-submit" name="update" value="Update">
                            </div>
                        </form>
                        <?php require "./clipboard.php" ?>
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