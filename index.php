<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dungcuytes</title>
    <link rel="stylesheet" href="http://localhost/Dungcuyte/assets/css/style.css">
    <link rel="stylesheet" href="http://localhost/Dungcuyte/assets/css/grid.css">
    <link rel="stylesheet" href="http://localhost/Dungcuyte/assets/css/responsive.css">
    <link rel="stylesheet" href="http://localhost/Dungcuyte/assets/css/slideshow.css">

    <!-- them dong ke tiep se lay duoc toan trang ko margin -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese">
    <link rel="stylesheet" href="http://localhost/Dungcuyte/assets/fonts/fontawesome-free-5.15.3-web/css/all.css">
</head>

<body>
    <div class="app">
        <!-- Header -->
        <?php require './assets/sidebar/header.php'; ?>
        <?php
        if (isset($_GET['new'])) {
            $action = $_GET['new'];
            if ($action == 'unset') {
                unset($_SESSION['cart']);
            }
        }
        ?>

        <!-- Container -->
        <div class="app_container">
            <div class="grid wide">
                <div class="row app__content">
                    <?php require './assets/sidebar/slideshow.php' ?>
                    <?php require './assets/sidebar/banner.php' ?>
                    <div class="col l-12 m-12 c-12">

                        <!-- Home Filter -->
                        <?php require './assets/sidebar/home_filter.php'; ?>
                        <!-- Product -->
                        <div class="home-product">
                            <div class="row">
                                <?php
                                include './assets/php/connect_db.php';
                                if (isset($_GET['action'])) {
                                    $action = $_GET['action'];

                                    // if ($action == 'TT') {
                                    //     $sql = "select * from hanghoa as a, hinhhanghoa as b where MaLoaiHang='$action' AND a.MSHH = b.MSHH";
                                    // }
                                    // if ($action == 'SGK') {
                                    //     $sql = "select * from hanghoa as a, hinhhanghoa as b where MaLoaiHang='$action' AND a.MSHH = b.MSHH";
                                    // }
                                    if ($action == 'CPT') {
                                        $sql = "select * from hanghoa as a, hinhhanghoa as b where MaLoaiHang='$action' AND a.MSHH = b.MSHH";
                                    }
                                    if ($action == 'DL') {
                                        $sql = "select * from hanghoa as a, hinhhanghoa as b where MaLoaiHang='$action' AND a.MSHH = b.MSHH";
                                    }
                                    if ($action == 'GB') {
                                        $sql = "select * from hanghoa as a, hinhhanghoa as b where MaLoaiHang='$action' AND a.MSHH = b.MSHH";
                                    }
                                    if ($action == 'MHA') {
                                        $sql = "select * from hanghoa as a, hinhhanghoa as b where MaLoaiHang='$action' AND a.MSHH = b.MSHH";
                                    }
                                    if ($action == 'MM') {
                                        $sql = "select * from hanghoa as a, hinhhanghoa as b where MaLoaiHang='$action' AND a.MSHH = b.MSHH";
                                    }
                                    if ($action == 'MTT') {
                                        $sql = "select * from hanghoa as a, hinhhanghoa as b where MaLoaiHang='$action' AND a.MSHH = b.MSHH";
                                    }
                                    if ($action == 'TBK') {
                                        $sql = "select * from hanghoa as a, hinhhanghoa as b where MaLoaiHang='$action' AND a.MSHH = b.MSHH";
                                    }
                                    if ($action == 'low') {
                                        $sql = "select * from hanghoa as a, hinhhanghoa as b where a.MSHH = b.MSHH order by Gia asc";
                                    }
                                    if ($action == 'high') {
                                        $sql = "select * from hanghoa as a, hinhhanghoa as b where a.MSHH = b.MSHH order by Gia desc";
                                    }
                                    if ($action == 'best') {
                                        $sql = "select * from hanghoa as a, hinhhanghoa as b where a.MSHH = b.MSHH AND a.SoLuongHang < 10";
                                    }

                                    //$sql = "select * from hanghoa";
                                    $result = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_array($result)) { ?>
                                        <div class="col l-2-4 m-4 c-6">
                                            <a href="http://localhost/Dungcuyte/KhachHang/product.php?MLH= <?= $row['MaLoaiHang'] ?>&id=<?= $row['TenHH'] ?>" class="home-product__link">
                                                <div class="home-product-item">
                                                    <div class="home-product-item__img" style="background-image: url(<?= $row['TenHinh'] ?>);">
                                                    </div>
                                                    <h4 class="home-product-item__name"><?= $row['TenHH'] ?></h4>
                                                    <div class="home-product-item__price">
                                                        <span class="home-product-item__price-old"><?= number_format($row['Gia_Cu'], 0, ',', '.') ?>đ</span>
                                                        <span class="home-product-item__price-current"><?= number_format($row['Gia'], 0, ',', '.') ?>đ</span>
                                                    </div>
                                                    <div class="home-product-item__action">
                                                        <button class="product__info-btn add-cart"><a class="add-cart-link2" href="http://localhost/Dungcuyte/KhachHang/product.php?MLH= <?= $row['MaLoaiHang']  ?>&id=<?= $row['TenHH'] ?>">Mua Ngay</a></button>
                                                    </div>
                                                    <div class="home-product-item__favorite">
                                                        <i class="home-product-item__favorite-icon fas fa-check"></i>Yêu Thích
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php
                                    }
                                } else if (isset($_GET['search'])) {
                                    $search = $_GET['search'];
                                    $sql = "select * from hanghoa as a, hinhhanghoa as b where a.tags LIKE '%$search%' AND a.MSHH = b.MSHH";
                                    $result = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_array($result)) { ?>
                                        <div class="col l-2-4 m-4 c-6">
                                            <a href="http://localhost/Dungcuyte/KhachHang/product.php?MLH= <?= $row['MaLoaiHang'] ?>&id=<?= $row['TenHH'] ?>" class="home-product__link">
                                                <div class="home-product-item">
                                                    <div class="home-product-item__img" style="background-image: url(<?= $row['TenHinh'] ?>);">
                                                    </div>
                                                    <h4 class="home-product-item__name"><?= $row['TenHH'] ?></h4>
                                                    <div class="home-product-item__price">
                                                        <span class="home-product-item__price-old"><?= number_format($row['Gia_Cu'], 0, ',', '.') ?>đ</span>
                                                        <span class="home-product-item__price-current"><?= number_format($row['Gia'], 0, ',', '.') ?>đ</span>
                                                    </div>
                                                    <div class="home-product-item__action">
                                                        <button class="product__info-btn add-cart"><a class="add-cart-link2" href="http://localhost/Dungcuyte/KhachHang/product.php?MLH= <?= $row['MaLoaiHang']  ?>&id=<?= $row['TenHH'] ?>">Mua Ngay</a></button>
                                                    </div>
                                                    <div class="home-product-item__favorite">
                                                        <i class="home-product-item__favorite-icon fas fa-check"></i>Yêu Thích
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php }
                                } else {
                                    $sql = "select * from hanghoa as a, hinhhanghoa as b where a.MSHH = b.MSHH";
                                    $result = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_array($result)) { ?>
                                        <div class="col l-2-4 m-4 c-6">
                                            <a href="http://localhost/Dungcuyte/KhachHang/product.php?MLH= <?= $row['MaLoaiHang'] ?>&id=<?= $row['TenHH'] ?>" class="home-product__link">
                                                <div class="home-product-item">
                                                    <div class="home-product-item__img" style="background-image: url(<?= $row['TenHinh'] ?>);">
                                                    </div>
                                                    <h4 class="home-product-item__name"><?= $row['TenHH'] ?></h4>
                                                    <div class="home-product-item__price">
                                                        <span class="home-product-item__price-old"><?= number_format($row['Gia_Cu'], 0, ',', '.') ?>đ</span>
                                                        <span class="home-product-item__price-current"><?= number_format($row['Gia'], 0, ',', '.') ?>đ</span>
                                                    </div>
                                                    <div class="home-product-item__action">
                                                        <button class="product__info-btn add-cart"><a class="add-cart-link2" href="http://localhost/Dungcuyte/KhachHang/product.php?MLH= <?= $row['MaLoaiHang']  ?>&id=<?= $row['TenHH'] ?>">Mua Ngay</a></button>
                                                    </div>
                                                    <div class="home-product-item__favorite">
                                                        <i class="home-product-item__favorite-icon fas fa-check"></i>Yêu Thích
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                <?php
                                    }
                                }
                                ?>

                            </div>
                        </div>

                        <!-- Pagination-->

                    </div>
                </div>
            </div>
        </div>

        <!-- Footer  -->
        <?php require './assets/sidebar/footer.php'; ?>

    </div>

    <script>
        document.getElementsByClassName("home__filter-btn").addEventListener("click", function() {
            console.log(1)
        });
    </script>
</body>

</html>