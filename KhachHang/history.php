<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử mua hàng</title>
    <link rel="stylesheet" href="http://localhost/Bookstore/assets/css/style.css">
    <link rel="stylesheet" href="http://localhost/Bookstore/assets/css/grid.css">
    <link rel="stylesheet" href="http://localhost/Bookstore/assets/css/responsive.css">
    <link rel="stylesheet" href="http://localhost/Bookstore/assets/css/user_manage.css">

    <!-- them dong ke tiep se lay duoc toan trang ko margin -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese">
    <link rel="stylesheet" href="http://localhost/Bookstore/assets/fonts/fontawesome-free-5.15.3-web/css/all.css">
</head>

<body>
    <div class="app">
        <?php
        require '../assets/sidebar/header.php';
        ?>

        <div class="app__container">
            <div class="grid wide">
                <div class="row app__content app__content2">
                    <div class="col l-2 m-0 c-0">
                        <!-- Category -->
                        <nav class="category">
                            <h3 class="category__heading">
                                <i class="category__heading-icon fas fa-tasks"></i> Danh mục
                            </h3>
                            <ul class="category-list">
                                <!-- <li class="category-item">
                                    <a href="http://localhost/Bookstore/user.php?action=info" class="category-item-link">User Information</a>
                                </li> -->
                                <li class="category-item">
                                    <a href="http://localhost/Bookstore/KhachHang/history.php" class="category-item-active category-item-link">Lịch sử mua hàng</a>
                                </li>
                                <!-- <li class="category-item">
                                    <a href="http://localhost/Bookstore/user.php?action=edit" class="category-item-link">Edit Infomation</a>
                                </li>
                                <li class="category-item">
                                    <a href="http://localhost/Bookstore/user.php?action=change" class="category-item-link">Change Password</a>
                                </li> -->
                            </ul>
                        </nav>

                    </div>
                    <div class="col l-10">
                        <table class="table_oder">
                            <tr class="table_oder__heading">
                                <th class="table__th-id-order">ID Order</th>
                                <th class="table__th-id-user-order">ID Customer</th>
                                <th class="table__th-id-staff">ID Staff</th>
                                <th class="table__th-date-order">Date Order</th>
                                <th class="table__th-date-transport">Date Transport</th>
                                <th class="table__th-action-order"></th>
                            </tr>
                            <?php
                            include '../assets/php/connect_db.php';
                            if (isset($_SESSION['user'])) {
                                $user = $_SESSION['user'];
                            }
                            $search = mysqli_query($con, "select * from khachhang where User='$user'");
                            while ($r = mysqli_fetch_array($search)) {
                                $maso = $r['MSKH'];
                            }
                            $result = mysqli_query($con, "select * from dathang where MSKH = '$maso' order by NgayDH");

                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <tr class="table_oder__content">
                                    <td class="table__td-id-order"><?= $row['SoDonDH'] ?></td>
                                    <td class="table__td-id-user-order"><?= $row['MSKH'] ?></td>
                                    <td class="table__td-id-staff"><?= $row['MSNV'] ?></td>
                                    <td class="table__td-date-order"><?= $row['NgayDH'] ?></td>
                                    <td class="table__td-date-transport"><?= $row['NgayGH'] ?></td>

                                    <td class="table__td-action-order">
                                        <button class="action__btn edit"><a href="http://localhost/Bookstore/Khachhang/history.php?action=show&id=<?= $row['SoDonDH'] ?>&ms=<?= $row['MSKH'] ?>" class="action__link">Show</a></button>
                                        <button class="action__btn del"><a href="http://localhost/Bookstore/KhachHang/history.php?action=delete&id=<?= $row['SoDonDH'] ?>" class="action__link">Delete</a></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                        <?php
                        if (isset($_GET['action'])) {
                            $action = $_GET['action'];
                            // Xoa don hang
                            if ($action == 'delete') {
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $sql = "delete from chitietdathang where SoDonDH = '$id'";
                                    $sql1 = "delete from dathang where SoDonDH = '$id'";
                                    mysqli_query($con, $sql);
                                    mysqli_query($con, $sql1);
                                    if (mysqli_query($con, $sql1)) {
                                        echo "<script> alert('Success');</script>";
                                    } else {
                                        echo "<script> alert('Fail');</script>";
                                    }
                                }
                            }
                        }
                        ?>

                        <div id="a" class="show__info-order">

                            <div class="show__info-order-text">

                                <?php
                                if (isset($_GET['action'])) {
                                    $action = $_GET['action'];
                                    if ($action == 'show') {
                                        echo '<style>.show__info-order{display:block;width:100%;background-color:#fff;box-shadow: 0 0 3px black; margin-top:10px;}</style>';
                                        if (isset($_GET['id']) && isset($_GET['ms'])) {
                                            $id = $_GET['id'];
                                            $ms = $_GET['ms'];
                                            echo "ID Order: " . $id;
                                            echo "&nbsp;-&nbsp;";
                                            echo "Status: <b>Not Yet</b>";
                                            echo "<br>";
                                            // Thong tin ve dat hang
                                            $sql1 = "select * from dathang where SoDonDH = '$id'";
                                            $ketqua1 = mysqli_query($con, $sql1);
                                            while ($row1 = mysqli_fetch_array($ketqua1)) {
                                                echo "+Date Order: " . $row1['NgayDH'] . "<br>";
                                                echo "+ID Customer: " . $row1['MSKH'] . "<br>";
                                            }

                                            // Thong tin ve khach hang
                                            $sql2 = "select * from khachhang where MSKH = '$ms'";
                                            $ketqua2 = mysqli_query($con, $sql2);
                                            while ($row2 = mysqli_fetch_array($ketqua2)) {
                                                echo "+Full Name Customer: " . $row2['HoTenKH'] . "<br>";
                                                echo "+Phone Number: " . $row2['SoDienThoai'] . "<br>";
                                            }

                                            // Thong tin ve dia chi
                                            $sql3 = "select * from diachi where MADC = '$ms'";
                                            $ketqua3 = mysqli_query($con, $sql3);
                                            while ($row3 = mysqli_fetch_array($ketqua3)) {
                                                echo "+Address: " . $row3['DiaChi'] . "<br>";
                                            }
                                        }
                                    }
                                }
                                ?>
                            </div>
                            <!-- Show thong tin don hang -->
                            <table class="table__showinfo">
                                <tr class="table_showinfo__heading">
                                    <th class="table__th--showinfo">ID Product</th>
                                    <th class="table__th--showinfo">Name Product</th>
                                    <th class="table__th--showinfo">Quantity</th>
                                    <th class="table__th--showinfo">Discount</th>
                                    <th class="table__th--showinfo">Price</th>

                                </tr>
                                <?php
                                $sql = "select * from chitietdathang where SoDonDH='$id'";
                                $ketqua = mysqli_query($con, $sql);
                                $s = 0;
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
                                        <td class="table__td--showinfo"><?= $discount = $row['GiamGia'] / 100 ?></td>
                                        <td class="table__td--showinfo"><?php $sql3 = "select * from hanghoa where MSHH = '$mshh'";
                                                                        $ketqua3 = mysqli_query($con, $sql3);
                                                                        while ($row3 = mysqli_fetch_array($ketqua3)) {
                                                                            echo number_format($gia = $row3['Gia'], 0, ',', '.');
                                                                        }  ?></td>
                                    </tr>

                                <?php $s += ($gia * $soluong) - ($gia * $discount);
                                } ?>
                                <tr class="table_showinfo__heading">
                                    <td class="table__td--showinfo"></td>
                                    <td class="table__td--showinfo"></td>
                                    <td class="table__td--showinfo"></td>
                                    <td class="table__td--showinfo">Total:</td>
                                    <td class="table__td--showinfo"><?php echo number_format($s, 0, ',', '.') ?></td>
                                </tr>
                            </table>
                            <button onclick="document.getElementById('a').style.display = 'none'">Close</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require '../assets/sidebar/footer.php';
    ?>
    </div>

    <script src="http://localhost/Bookstore/assets/js/handle.js"></script>
    
    <!-- Sau div toan trang la Modal -->
</body>
<?php ob_flush() ?>

</html>