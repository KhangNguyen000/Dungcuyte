<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sản phẩm <?php
                    include '../assets/php/connect_db.php';
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $result = mysqli_query($con, "select * from hanghoa where TenHH='$id'");
                        $row = mysqli_fetch_array($result);
                        echo $row['TenHH'];
                    }
                    ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-5.15.3-web/css/all.css">
    <style>
        .image__product-container {
            width: 50%;
            display: flex;
        }

        .image__product-container-row {
            display: block;
            /* margin: 0 auto; */
            align-items: center;
            justify-content: flex-start;
        }

        .image__product-container-col-2 {
            width: 50%;
            display: flex;
        }

        .image__product-container-col-8 {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image__small {
            width: 100%;
            height: 100px;
        }

        .image__small:hover {
            border: 1px solid #eb0028;
        }

        .image__large {
            width: 100%;
            height: 400px;
        }
    </style>
</head>

<body>
    <div class="app">
        <?php
        require '../assets/sidebar/header.php';
        include '../assets/php/connect_db.php';
        ?>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = mysqli_query($con, "select * from hanghoa as a, hinhhanghoa as b where a.MSHH = b.MSHH AND TenHH='$id'");

            while ($row = mysqli_fetch_array($result)) {
                $mota = explode("$$$", $row['MoTa']);
                $hinhchitiet = explode("$$$", $row['HinhChiTiet']);
                // echo $hinhchitiet[0];
        ?>


                <!-- Container -->
                <div class="app__container">
                    <div class="grid wide">
                        <div class="row app__content">
                            <div class="product__info">
                                <form action="http://localhost/Bookstore/KhachHang/cart.php?action=add&ms=<?= $row['MSHH'] ?>" method="post" class="product__info-form">
                                    <div class="image__product-container">
                                        <div class="image__product-container-row">

                                            <div class="image__product-container-col-8">
                                                <img src="<?php
                                                            echo $row['TenHinh'];
                                                            ?>" id="demo" class="image__large">
                                            </div>
                                            <div class="image__product-container-col-2">
                                                <img src="<?php
                                                            echo $row['TenHinh'];
                                                            ?>" class="image__small" onclick="myFunction(this)"></>
                                                <?php
                                                foreach ($hinhchitiet as $value) { ?>
                                                    <img src="<?php
                                                                echo $value;
                                                                ?>" class="image__small" onclick="myFunction(this)" />
                                                <?php }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="product__info-buy">
                                        <p class="product__info-location">TRANG CHỦ > SẢN PHẨM > <?php
                                                                                                    include '../assets/php/connect_db.php';
                                                                                                    if (isset($_GET['id'])) {
                                                                                                        $id = $_GET['id'];
                                                                                                        $result = mysqli_query($con, "select * from hanghoa where TenHH='$id'");
                                                                                                        $row = mysqli_fetch_array($result);
                                                                                                        echo $row['TenHH'];
                                                                                                    }
                                                                                                    ?> </p>
                                        <h3 class="product__info-heading"><?= $row['TenHH'] ?></h3>
                                        <h3 class="product__info-price"><?= number_format($row['Gia'], 0, ',', '.') ?></h3>

                                        <p class="product__info-description"><?= $mota[0] ?>
                                        </p>
                                        <div class="product__info-action">
                                            <button class="product__quantity-btn">-</button>
                                            <input class="product__quantity-input" type="text" name="quantity" value="1">
                                            <button class="product__quantity-btn">+</button>
                                        </div>
                                        <div class="product__info-contact">

                                            <input class="product__info-btn add-cart" type="submit" value="THÊM VÀO GIỎ HÀNG" name="addcart">
                                            <!-- <button class="product__info-btn facebook"><i class="product__info-contact-icon fab fa-facebook-square"></i>Facebook</button>
                                            <button class="product__info-btn gmail"><i class="product__info-contact-icon fas fa-envelope-open-text"></i>Gmail</button>-->
                                            <button class="product__info-btn gmail"><a href="http://localhost/Bookstore/index.php" class="add-cart-link">TRỞ LẠI</a></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <!-- Introduce Product -->
                        <div class="row app__content">
                            <div class="product__intro hide-on-mobile-tablet">
                                <h3 class="product__intro-heading">THÔNG TIN SẢN PHẨM</h3>
                                <p class="product__intro-paragraph">
                                    <?php
                                    echo ($mota[1]) ?>
                                </p>


                                <button class="collapsible" type="button">Xem thêm</button>

                                <div class="content">
                                    <h3 class="product__intro-heading"><?= $row['TenHH'] ?></h3>
                                    <p class="product__intro-paragraph">
                                        <?php echo ($mota[2]) ?>
                                    </p>

                                </div>
                                <button class="collapsible2" type="button">Thu gọn</button>
                            </div>

                    <?php
                }
            }
                    ?>
                        </div>
                        <div class="row">
                            <div class="product__similar"><button class="product__similar-btn">SẢN PHẨM TƯƠNG TỰ</button></div>
                            <?php
                            if (isset($_GET['MLH'])) {
                                $MLH = $_GET['MLH'];
                                //include '../assets/php/connect_db.php';
                                $result = mysqli_query($con, "select * from hanghoa as a, hinhhanghoa as b where a.MSHH = b.MSHH LIMIT 10");
                                while ($row = mysqli_fetch_array($result)) { ?>
                                    <div class="col l-2-4 m-4 c-6">
                                        <a href="http://localhost/Bookstore/KhachHang/product.php?MLH= <?= $row['MaLoaiHang'] ?>&id=<?= $row['TenHH'] ?>" class="home-product__link">
                                            <div class="home-product-item">
                                                <div class="home-product-item__img" style="background-image: url(<?= $row['TenHinh'] ?>);">
                                                </div>
                                                <h4 class="home-product-item__name"><?= $row['TenHH'] ?></h4>
                                                <div class="home-product-item__price">
                                                    <span class="home-product-item__price-old"><?= number_format($row['Gia_Cu'], 0, ',', '.') ?>đ</span>
                                                    <span class="home-product-item__price-current"><?= number_format($row['Gia'], 0, ',', '.') ?>đ</span>
                                                </div>
                                                <div class="home-product-item__action">
                                                    <button class="product__info-btn add-cart"><a class="add-cart-link2" href="http://localhost/Bookstore/KhachHang/product.php?MLH= <?= $row['MaLoaiHang']  ?>&id=<?= $row['TenHH'] ?>">Mua Ngay</a></button>
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


                    <?php require '../assets/sidebar/footer.php'; ?>

                </div>
                <script>
                    const myFunction = (smallImg) => {
                        const largerImg = document.getElementById("demo");
                        largerImg.src = smallImg.src
                    }
                    var coll = document.querySelector(".collapsible");
                    var coll2 = document.querySelector(".collapsible2");
                    coll2.style.display = "none";
                    coll.addEventListener("click", function() {
                        var content = this.nextElementSibling;
                        content.style.display = "block";
                        if (content.style.display === "block") {
                            coll.style.display = "none";
                            coll2.style.display = "block";
                        } else {
                            coll2.style.display = "none";
                        }
                    });
                    coll2.addEventListener("click", function() {
                        var content = this.previousElementSibling;
                        content.style.display = "none";
                        coll2.style.display = "none";
                        coll.style.display = "block";
                    });
                    // <?php //echo "console.log('" . $mota[1] . ".')" 
                        ?>
                </script>
</body>

</html>