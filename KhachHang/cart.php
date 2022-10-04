<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-5.15.3-web/css/all.css">

</head>

<body>
    <div class="app">
        <!-- Header -->
        <?php
        require '../assets/sidebar/header.php';
        include '../assets/php/connect_db.php';
        if (isset($_GET['action']) && isset($_GET['ms'])) {
            $action = $_GET['action'];
            $ms = $_GET['ms'];
            $sql = "select * from hanghoa as a, hinhhanghoa as b where a.MSHH='$ms' AND b.MSHH='$ms'";
            $query = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($query);
            $quantity = $row['SoLuongHang'];
            if (isset($_SESSION['cart'])) {
                if (isset($_SESSION['cart'][$ms])) {
                    $_SESSION['cart'][$ms]['sl'] += 1;
                } else {
                    $_SESSION['cart'][$ms]['sl'] = 1;
                }
                $_SESSION['cart'][$ms]['name'] = $row['TenHH'];
                $_SESSION['cart'][$ms]['image'] = $row['TenHinh'];
                $_SESSION['cart'][$ms]['price'] = $row['Gia'];
                $_SESSION['cart'][$ms]['ms'] = $row['MSHH'];
            } else {
                $_SESSION['cart'][$ms]['sl'] = 1;
                $_SESSION['cart'][$ms]['name'] = $row['TenHH'];
                $_SESSION['cart'][$ms]['image'] = $row['TenHinh'];
                $_SESSION['cart'][$ms]['price'] = $row['Gia'];
                $_SESSION['cart'][$ms]['ms'] = $row['MSHH'];
            }
        }
        ?>
        <!-- Container -->
        <div class="app__container">
            <div class="grid wide">
                <div class="row">

                    <!-- Heading -->
                    <?php if (isset($_SESSION['cart'])) {
                        $s = 0;
                    ?>
                        <div class="cart__heading">
                            <div class="cart__info-heading">Thông tin sản phẩm</div>
                            <div class="cart__quantity-heading">Số lượng</div>
                            <div class="cart__price-heading">Giá</div>
                        </div>
                        <!-- Content -->
                        <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                            <div class="cart__container">
                                <div class="cart__info">
                                    <img src="<?= $value['image'] ?>" alt="" class="cart__info-img">
                                    <h4 class="cart__info-name"><?= $value['name'] ?></h4>
                                </div>
                                <div class="cart__quantity">
                                    <div class="product__info-action">
                                        <button class="product__quantity-btn"><a href="http://localhost/Dungcuyte/KhachHang/update.php?id=sub&key=<?= $value['ms']  ?>" class="product__quantity-btn-link">-</a></button>
                                        <input class="product__quantity-input" type="text" value="<?= $value['sl']  ?>">
                                        <button class="product__quantity-btn"><a href="http://localhost/Dungcuyte/KhachHang/update.php?id=plus&key=<?= $value['ms']  ?>" class="product__quantity-btn-link">+</a></button>
                                        <!-- <h4 class="cart__info-name"></h4> -->
                                    </div>
                                </div>
                                <div class="cart__price">
                                    <h3 class="cart__info-price"><?= number_format($value['price'], 0, ',', '.') ?></h3>
                                    <button class="cart__info-delete-btn"><a href="http://localhost/Dungcuyte/KhachHang/update.php?ms=<?= $value['ms']  ?>" class="cart__info-delete-btn-link">Xóa</a></button>
                                    <!-- <i class="far fa-trash-alt"></i> -->
                                </div>
                            </div>
                        <?php $s += ($value['price'] * $value['sl']);
                        } ?>
                        <!-- footer -->
                        <div class="cart__heading">
                            <div class="cart__info-heading"></div>
                            <div class="cart__info-price">Tổng cộng: &nbsp; <?php echo number_format($s, 0, ',', '.')  ?></div>
                            <div class="cart__price-heading">
                                <button class="cart__action update"><a href="http://localhost/Dungcuyte/index.php" class="cart__info-delete-all-link">Thêm</a></button>
                                <button class="cart__action del"><a href="http://localhost/Dungcuyte/KhachHang/update.php?action=del" class="cart__info-delete-all-link">Xóa</a></button>
                            </div>
                        </div>
                    <?php }
                    ?>
                    <!-- Xu ly mua hang -->
                    <?php
                    include '../assets/php/connect_db.php';
                    if (!isset($_SESSION['user'])) {
                        echo '<script>alert("You are not logged in")</script>';
                    } else {
                        $tendangnhap = $_SESSION['user'];
                        $timkiem = mysqli_query($con, "select * from khachhang where User='$tendangnhap'");
                        while ($row = mysqli_fetch_array($timkiem)) {
                            $ms = $row['MSKH'];
                        }
                        if (isset($_POST['submit'])) {
                            if ($_POST['txtDiaChi'] == "") {
                                echo '<script>alert("Please fill infomation !")</script>';
                                //$ms = "";
                                $dh = "";
                                header('Refresh: 1;url= ./cart.php');
                            } else {
                                //$ms = $_POST['txtMS'];
                                $diachi = $_POST['txtDiaChi'];
                                $us = $_SESSION['user'];
                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                $kq = mysqli_query($con, "select * from khachhang where MSKH='$ms' AND User='$us'");
                                $ktra = mysqli_num_rows($kq);
                                if ($ktra == 0) {
                                    echo '<script>alert("Please try again, Your ID is not exist!");</script>';
                                    header('Refresh: 3;url= http://localhost/Dungcuyte/Khachhang/cart.php');
                                } else {
                                    $result = mysqli_query($con, "select * from diachi where MaDC='$ms'");
                                    $check = mysqli_num_rows($result);
                                    if ($check == 1) {
                                        //echo '<script>alert("Please try again, Your ID existed!");</script>';

                                        $dh = date("Y-m-d");
                                        $d = strtotime("+3 days");
                                        $gh = date("Y-m-d", $d);
                                        $s = rand();
                                        $result = mysqli_query($con, "select * from dathang");
                                        $sql = "insert into dathang  values('$s','$ms','A01','$dh','$gh','Đang xác nhận')";
                                        $query = mysqli_query($con, $sql);

                                        foreach ($_SESSION['cart'] as $key => $value) {
                                            $a = $value['sl'];
                                            $sql1 = "insert into chitietdathang  values('$s','$key','$a','5')";
                                            $query1 = mysqli_query($con, $sql1);
                                        }
                                        echo '<script>alert("Order Success!");</script>';
                                        unset($_SESSION['cart']);
                                        header('Refresh: 0;url= http://localhost/Dungcuyte/index.php');
                                    } else {

                                        $msdc = $ms;
                                        $sql1 = ("insert into diachi values('$msdc','$diachi','$ms')");
                                        if (mysqli_query($con, $sql1)) {
                                            $dh = date("Y-m-d");
                                            $d = strtotime("+3 days");
                                            $gh = date("Y-m-d", $d);
                                            $s = rand();
                                            $result = mysqli_query($con, "select * from dathang");
                                            $sql = "insert into dathang  values('$s','$ms','A01','$dh','$gh')";
                                            $query = mysqli_query($con, $sql);

                                            foreach ($_SESSION['cart'] as $key => $value) {
                                                $a = $value['sl'];
                                                $sql1 = "insert into chitietdathang  values('$s','$key','$a','10')";
                                                $query1 = mysqli_query($con, $sql1);
                                            }
                                            echo '<script>alert("Order Success!");</script>';
                                            unset($_SESSION['cart']);
                                            header('Refresh: 0;url= http://localhost/Dungcuyte/index.php');
                                        } else {
                                            echo "<script> alert('Fail');</script>";
                                            header('Refresh: 0;url= http://localhost/Dungcuyte/KhachHang/cart.php');
                                        }
                                    }
                                }
                            }
                        }
                    }
                    ?>
                    <!-- Form de mua hang -->
                    <div class="form__order">
                        <h4 class="form__order-heading">Thông tin đặt hàng</h4>
                        <form action="http://localhost/Dungcuyte/KhachHang/cart.php" class="cart__form-order" method="POST">
                            <!-- <br> <input type="text" name="txtMS" class="cart__form__input" placeholder="ID User"> -->
                            <br> <input type="text" name="txtHoTen" class="cart__form__input" placeholder="Full Name">
                            <br> <input type="text" name="txtSoDienThoai" class="cart__form__input" placeholder="Phone Number">
                            <br> <input type="text" name="txtDiaChi" class="cart__form__input-text" placeholder="Address">
                            <br> <input type="submit" name="submit" class="cart__form__btn" value="Đặt hàng">
                        </form>
                    </div>

                    <div class="show__info-order-customer">
                        <!-- Thong tin khach hang -->
                        <div class="show__info-order-text">

                            <?php
                            if (isset($_POST['submit']) &&  isset($_SESSION['cart']) && isset($_SESSION['user'])) {
                                echo "<style>.show__info-order-customer{display:block;width:100%;background-color:#fff;box-shadow: 0 0 3px black; margin-top:10px;}</style>";
                                $tendangnhap = $_SESSION['user'];
                                $timkiem = mysqli_query($con, "select * from khachhang where User='$tendangnhap'");
                                while ($row = mysqli_fetch_array($timkiem)) {
                                    $ms = $row['MSKH'];
                                }

                                // xu ly so luong
                                foreach ($_SESSION['cart'] as $key =>  $value) {
                                    $ms = $value['ms'];
                                    $sql = "select * from hanghoa where MSHH='$ms'";
                                    $query = mysqli_query($con, $sql);
                                    $row = mysqli_fetch_array($query);
                                    $quantity = $row['SoLuongHang'];
                                    if ($value['sl'] <= $quantity) {
                                        $new_quantity = $quantity - $value['sl'];
                                        //$qu = $value['sl'];
                                        $sql = mysqli_query($con, "update hanghoa set SoLuongHang='$new_quantity' where MSHH='$ms'");
                                        //echo '<script>alert("'.$qu.'")</script>';
                                    } else {
                                        echo '<script>alert("Not Enough Products: ' . $value['name'] . '- We just have: ' . $quantity . ' !")</script>';
                                        $value['sl'] = $quantity;
                                        $a = $value['sl'];
                                        $test = mysqli_query($con, "update chitietdathang set SoLuong='$a' where MSHH='$ms'");
                                        $new_quantity = $quantity - $quantity;
                                        $sql = mysqli_query($con, "update hanghoa set SoLuongHang='$new_quantity' where MSHH='$ms'");
                                    }
                                }

                                // mysqli_close($con);
                                // include '../assets/php/connect_db.php';
                                // $ms = $_POST['txtMS'];
                                $tendangnhap = $_SESSION['user'];
                                $timkiem = mysqli_query($con, "select * from khachhang where User='$tendangnhap'");
                                while ($row = mysqli_fetch_array($timkiem)) {
                                    $ms = $row['MSKH'];
                                }
                                $result = mysqli_query($con, "select * from khachhang where MSKH = '$ms'");
                                while ($row  = mysqli_fetch_array($result)) {
                                    echo "+ID Customer: " . $row['MSKH'] . "<br>";
                                    echo "+Full Name Customer: " . $row['HoTenKH'] . "<br>";
                                    echo "+Phone Number: " . $row['SoDienThoai'] . "<br>";
                                }

                                $result = mysqli_query($con, "select * from diachi where MADC = '$ms'");
                                while ($row  = mysqli_fetch_array($result)) {
                                    echo "+Address: " . $row['DiaChi'] . "<br>";
                                }
                                $result = mysqli_query($con, "select * from dathang where SoDonDH = '$s'");
                                while ($row  = mysqli_fetch_array($result)) {
                                    echo "+ ID Order:" . $row['SoDonDH'] . "<br>";
                                    echo "+ Date Order: " . $row['NgayDH'] . "-- Date Shipping: " . $row['NgayGH'] . "<br>";
                                }
                            }
                            ?>
                        </div>
                        <!-- Thong tin don hang -->
                        <table class="table__showinfo">
                            <tr class="table_showinfo__heading-cart">
                                <th class="table__th--showinfo">ID Product</th>
                                <th class="table__th--showinfo">Name Product</th>
                                <th class="table__th--showinfo">Quantity</th>
                                <th class="table__th--showinfo">Discount</th>
                                <th class="table__th--showinfo">Price</th>

                            </tr>
                            <?php
                            $sql = "select * from chitietdathang where SoDonDH='$s'";
                            $ketqua = mysqli_query($con, $sql);
                            $i = 0;
                            while ($row = mysqli_fetch_array($ketqua)) {
                            ?>
                                <tr class="table_showinfo__content">
                                    <td class="table__td--showinfo"><?= $mshh = $row['MSHH'] ?></td>
                                    <td class="table__td--showinfo"><?php $sql3 = "select * from hanghoa where MSHH = '$mshh'";
                                                                    $ketqua3 = mysqli_query($con, $sql3);
                                                                    while ($row3 = mysqli_fetch_array($ketqua3)) {
                                                                        echo $row3['TenHH'];
                                                                    }  ?></td>
                                    <td class="table__td--showinfo"><?= $soluong = $row['SoLuong'] ?></td>
                                    <td class="table__td--showinfo"><?= $discount = $row['GiamGia'] / 100 ?> </td>
                                    <td class="table__td--showinfo"><?php $sql3 = "select * from hanghoa where MSHH = '$mshh'";
                                                                    $ketqua3 = mysqli_query($con, $sql3);
                                                                    while ($row3 = mysqli_fetch_array($ketqua3)) {
                                                                        echo number_format($gia = $row3['Gia'], 0, ',', '.');
                                                                    }  ?></td>
                                </tr>

                            <?php $i += ($gia * $soluong) - ($gia * $discount);
                            } ?>
                            <tr class="table_showinfo__heading">
                                <td class="table__td--showinfo"></td>
                                <td class="table__td--showinfo"></td>
                                <td class="table__td--showinfo"></td>
                                <td class="table__td--showinfo">Total:</td>
                                <td class="table__td--showinfo"><?php echo number_format($i, 0, ',', '.') ?></td>
                            </tr>
                        </table>
                        <?php
                        if (isset($_GET['hanhdong'])) {
                            $action = $_GET['hanhdong'];
                            // Xoa don hang
                            if ($action == 'delete') {
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $sql = "delete from chitietdathang where SoDonDH = '$id'";
                                    $sql1 = "delete from dathang where SoDonDH = '$id'";
                                    mysqli_query($con, $sql);
                                    mysqli_query($con, $sql1);
                                    if (mysqli_query($con, $sql1)) {
                                        echo "<script> alert('Your product order deleted !');</script>";
                                        header('Refresh: 2;url= http://localhost/Dungcuyte/index.php?new=unset');
                                    } else {
                                        echo "<script> alert('Fail');</script>";
                                    }
                                }
                            }
                            if ($action == 'continue') {
                                header('Refresh: 1;url= http://localhost/Dungcuyte/index.php?new=unset');
                            }
                        }
                        ?>

                        <div class="show__info-order-action">
                            <button class="show__info-order-action-btn-continue"><a href="http://localhost/Dungcuyte/KhachHang/cart.php?hanhdong=continue" class="show__info-order-action-btn-link">Continue Buy</a></button>
                            <button class="show__info-order-action-btn-delete"><a href="http://localhost/Dungcuyte/KhachHang/cart.php?hanhdong=delete&id=<?php echo $s ?>" class="show__info-order-action-btn-link">Delete</a></button>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <!-- Footer -->
        <?php require '../assets/sidebar/footer.php'; ?>

    </div>
    <script>
        var coll = document.querySelector(".collapsible");
        coll.addEventListener("click", function() {
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    </script>
</body>

</html>