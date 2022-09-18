<?php
session_start();
?>
<header class="header">
    <div class="grid">
        <div class="row">
            <!-- <div class="col l-12">
                </div> -->
            <div class="header__top">
                <div class="header__top-logo">
                    <h1 class="header__top-logo-text"> Dungcuyte &nbsp;<span class="header__top-logo-text-color" style="color: #4285f4">API</span></h1>
                </div>
                <div class="header__top-action">
                    <?php
                    if (isset($_SESSION['user'])) {
                        echo '<style>.header__top-action-signed{display:flex;}</style>';
                    } else {
                        echo '<style>.header__top-action-sign{display:flex;}</style>';
                    }
                    ?>
                    <div class="header__top-register__login-wrap">
                        <div class="header__top-action-sign">
                            <div class="header__top-register"><a href="http://localhost/Dungcuyte/KhachHang/register_login.php?action=register" class="header__top-action-sign-link">ĐĂNG KÝ</a></div>
                            <div class="header__top-login"><a href="http://localhost/Dungcuyte/KhachHang/register_login.php?action=login" class="header__top-action-sign-link">ĐĂNG NHẬP</a></div>
                        </div>

                        <div class="header__top-action-signed">
                            <i class="header__top-sign-in-icon fas fa-user-circle"></i>
                            <div class="header__top-sign-in-user-name"><?php
                                                                        if (isset($_SESSION['user'])) {
                                                                            echo $_SESSION['user'];
                                                                        }
                                                                        ?></div>

                            <div class="header__top-action-signed-wrap">
                                <ul class="header__top-action-signed-wrap-list">
                                    <li class="header__top-action-signed-wrap-item"><a href="http://localhost/Dungcuyte/KhachHang/user.php" class="header__top-action-signed-wrap-item-link"><i class="fas fa-user-edit"></i> Quản lý tài khoản</a></li>
                                    <li class="header__top-action-signed-wrap-item"><a href="http://localhost/Dungcuyte/KhachHang/history.php" class="header__top-action-signed-wrap-item-link"><i class="fas fa-history"></i> Lịch sử mua hàng</a></li>
                                    <li class="header__top-action-signed-wrap-item"><a href="http://localhost/Dungcuyte/KhachHang/logout.php" class="header__top-action-signed-wrap-item-link"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="header__top-cart">

                        <i class="header__top-cart-icon fas fa-shopping-cart"></i>
                        <div class="header__top-cart-notice"><?php
                                                                if (isset($_SESSION['cart'])) {
                                                                    $i = 0;
                                                                    foreach ($_SESSION['cart'] as $key => $value) {
                                                                        $i++;
                                                                    }
                                                                    echo $i;
                                                                } else {
                                                                    echo 0;
                                                                }
                                                                ?></div>

                        <div class="header__top-cart-wrap--no-cart">
                            <img src="http://localhost/Dungcuyte/assets/image/giohang.png" alt="" class="header__top-cart-wrap-img">
                        </div>
                        <?php
                        if (isset($_SESSION['cart'])) {
                        ?>
                            <div class="header__top-cart-wrap--has-cart">
                                <h3 class="header__cart-list-heading">Product Added</h3>
                                <ul class="header__cart-list-item-ul">
                                    <?php
                                    foreach ($_SESSION['cart'] as $key => $value) {

                                    ?>
                                        <li class="header__cart-list-item-li">
                                            <img src="<?php echo $value['image'] ?>" alt="" class="header__cart-list-item-img">
                                            <div class="header__cart-list-item-info">
                                                <div class="header__cart-list-item-head">
                                                    <h3 class="header__cart-list-item-name"><?php echo $value['name'] ?></h3>
                                                    <div class="header__cart-list-item-price-wrap">
                                                        <span class="header__cart-list-item-price"><?php echo number_format($value['price'], 0, ',', '.') ?> VND</span>
                                                        <span class="header__cart-list-item-multiply">x</span>
                                                        <span class="header__cart-list-item-quantity"><?php echo $value['sl'] ?></span>
                                                    </div>
                                                </div>

                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <div class="header__cart-btn">
                                    <button class="header__cart-view-cart-btn"><a href="http://localhost/Dungcuyte/KhachHang/cart.php" class="header__cart-view-cart-btn-link">View Cart</a></button>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        if (!isset($_SESSION['cart'])) {
                            echo "<style>
                            .header__top-cart:hover .header__top-cart-wrap--no-cart {
                                display: block;
                                cursor: pointer;
                            }</style>";
                        } else {
                            echo "<style>.header__top-cart:hover .header__top-cart-wrap--has-cart {
                                display: block;
                                cursor: pointer;
                            }</style>";
                        }
                        ?>
                    </div>

                </div>
            </div>
            <div class="header__bottom hide-on-mobile-tablet">
                <div class="header__bottom-navbar">
                    <div class="header__bottom-navbar-menu"> <a href="http://localhost/Dungcuyte/index.php" class="header__bottom-navbar-menu-link"><i class="fas fa-home"></i></a></div>
                    <div class="header__bottom-navbar-menu">TẤT CẢ SẢN PHẨM &nbsp; <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        <div class="header__bottom-navbar-menu-none">
                            <ul class="header__bottom-navbar-menu-none-list">
                                <li class="header__bottom-navbar-menu-none-item">
                                    <h4 class="header__bottom-navbar-menu-none-item--brand"><i class="list__list-icon fas fa-chevron-circle-right">&nbsp;</i>Y TẾ CHUYÊN DỤNG</h4>


                                    <ul class="list__list">
                                        <li class="list__list-item"><a href="http://localhost/Dungcuyte/index.php?action=CPT" class="list__list-item--link">Chỉ phẫu thuật</a></li>
                                        <li class="list__list-item"><a href="http://localhost/Dungcuyte/index.php?action=DL" class="list__list-item--link">Đai lưng</a></li>
                                        <li class="list__list-item"><a href="http://localhost/Dungcuyte/index.php?action=GB" class="list__list-item--link">Ghế bô</a></li>
                                        <li class="list__list-item"><a href="http://localhost/Dungcuyte/index.php?action=MHA" class="list__list-item--link">Máy đo huyết áp</a></li>
                                    </ul>

                                </li>
                                <li class="header__bottom-navbar-menu-none-item">
                                    <h4 class="header__bottom-navbar-menu-none-item--brand"><i class="list__list-icon fas fa-chevron-circle-right"></i>&nbsp;Y TẾ GIA ĐÌNH</h4>

                                    <ul class="list__list">
                                        <li class="list__list-item">
                                            <a href="http://localhost/Dungcuyte/index.php?action=MM" class="list__list-item--link">Máy massage</a>
                                        </li>
                                        <li class="list__list-item">
                                            <a href="http://localhost/Dungcuyte/index.php?action=MTT" class="list__list-item--link">Máy trợ thính</a>
                                        </li>
                                        <li class="list__list-item">
                                            <a href="http://localhost/Dungcuyte/index.php?action=TBK" class="list__list-item--link">Thiết bị khác</a>
                                        </li>

                                    </ul>

                                </li>


                            </ul>
                        </div>
                    </div>
                    <!-- <div class="header__bottom-navbar-menu">TIN TỨC GIÀY</div> -->
                    <div class="header__bottom-navbar-menu">HỆ THỐNG CỬA HÀNG</div>
                    <div class="header__bottom-navbar-menu">SALE OFF</div>
                    <div class="header__bottom-navbar-menu">HƯỚNG DẪN ĐẶT HÀNG</div>
                    <div class="header__bottom-navbar-menu">LIÊN HỆ</div>
                </div>
                <form action="http://localhost/Dungcuyte/index.php" method="GET" class="header__bottom-search">
                    <!-- <input type="text" placeholder="Search" class="header__bottom-search-input"> -->
                    <input type="text" name="search" placeholder="Search" class="header__bottom-search-input__responsive" />
                    <input type="submit" placeholder="Search" class="header__bottom-search-button__responsive" />
                </form>
            </div>
        </div>
    </div>
</header>