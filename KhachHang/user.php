<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
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
                                <li class="category-item">
                                    <a id="demo" href="./user.php?action=info" class="category-item-link">Thông tin tài khoản</a>
                                </li>
                                
                                <li class="category-item">
                                    <a href="./user.php?action=edit" class="category-item-link">Cập nhật thông tin</a>
                                </li>
                                <li class="category-item">
                                    <a href="./user.php?action=change" class="category-item-link">Đổi mật khẩu</a>
                                </li>
                            </ul>
                        </nav>
                        <?php
                        if (isset($_GET['action'])) {
                            $action = $_GET['action'];
                            if ($action == 'info') {
                                echo '<style>.user-change__password{display:none;}</style>';
                                echo '<style>.user-change__info{display:none;}</style>';
                                //echo '<style>.user__cart-manage{display:none;}</style>';
                            }
                            if ($action == 'change') {
                                echo '<style>.user-infomation{display:none;}</style>';
                                echo '<style>.user-change__info{display:none;}</style>';
                                //echo '<style>.user__cart-manage{display:none;}</style>';
                            }
                            if ($action == 'edit') {
                                echo '<style>.user-infomation{display:none;}</style>';
                                echo '<style>.user-change__password{display:none;}</style>';
                                //echo '<style>.user__cart-manage{display:none;}</style>';
                            }
                            
                        } else {
                            //echo '<style>.user__cart-manage{display:none;}</style>';
                            echo '<style>.user-change__password{display:none;}</style>';
                            echo '<style>.user-change__info{display:none;}</style>';
                        }
                        ?>
                    </div>
                    <div class="col l-10">
                        <!-- User Info -->
                        <div class="user-infomation">
                            <div class="product__manage-block-heading">
                                <h4 class="product__heading">Thông tin tài khoản</h4>
                                <!-- <button class="product__heading-btn"><a href="../directional.php?action=edit_user" class="action__link">+ Add User</a></button> -->
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
                                if (isset($_SESSION['user'])) {
                                    $a = $_SESSION['user'];
                                    $i = 1;
                                    if ($a == 'admin') {
                                        $result = mysqli_query($con, "select * from nhanvien where User='$a'");
                                        mysqli_close($con);
                                        while ($row = mysqli_fetch_array($result)) { ?>
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
                                                    <button class="action__btn-edit"><a href="../user.php?action=edit" class="action__link">Edit</a></button>
                                                    <!-- <button class="action__btn del"><a href="../user_manage.php?id=" class="action__link">Delete</a></button> -->
                                                </td>
                                            </tr>
                                        <?php }
                                    } else {
                                        $result = mysqli_query($con, "select * from khachhang where User='$a'");
                                        mysqli_close($con);
                                        //$i = 1;
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
                                                    <button class="action__btn-edit"><a href="http://localhost/Dungcuyte/KhachHang/user.php?action=edit" class="action__link">Edit</a></button>
                                                    <!-- <button class="action__btn del"><a href="../user_manage.php?id=" class="action__link">Delete</a></button> -->
                                                </td>
                                            </tr>
                                <?php }
                                    }
                                } else {
                                    echo "<script> confirm('You are not logged in');</script>";
                                    header('location: ../register_login.php?action=login');
                                } ?>
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
                        </div>
                        <!-- User Change Password -->
                        <div class="user-change__password">
                            <?php
                            if (isset($_POST['change'])) {
                                $username = $_POST['username'];
                                $oldpass = $_POST['old_password'];
                                $newpass = $_POST['new_password'];
                                include '../assets/php/connect_db.php';

                                $query = "UPDATE khachhang set Password='$newpass' where User='$username'";
                                if (mysqli_query($con, $query)) {
                                    echo "<script>alert('Password was changed success!')</script>";
                                    header('Location: ../KhachHang/logout.php');
                                } else {
                                    echo '<script>alert("Fail !")</script>';
                                }
                            }
                            ?>
                            <div class="product__manage-block-heading">
                                <h4 class="product__heading">Đổi mật khẩu</h4>
                                <!-- <button class="product__heading-btn"><a href="../directional.php?action=edit_user" class="action__link">+ Add User</a></button> -->
                            </div>
                            <form action="" method="post" class="user-change__password-form">
                                <br> <input type="text" name="username" class="user-change__password-input" placeholder="User">
                                <br> <input type="password" name="old_password" class="user-change__password-input" placeholder="Password">
                                <br> <input type="password" name="new_password" class="user-change__password-input" placeholder="New Password">
                                <br> <input type="submit" name="change" class="user-change__password-btn" value="SUBMIT">
                            </form>
                        </div>
                        <!-- User Change Info -->
                        <div class="user-change__info">
                            <?php
                            if (isset($_POST['edit'])) {
                                $id = $_POST['txtID'];
                                $name = $_POST['txtName'];
                                $phone = $_POST['txtPhone'];
                                $cty = $_POST['txtCompany'];
                                $email = $_POST['txtEmail'];
                                include '../assets/php/connect_db.php';

                                $query = "UPDATE khachhang set HoTenKH='$name', TenCongTy='$cty', SoDienThoai='$phone',Email='$email' where MSKH='$id'";
                                if (mysqli_query($con, $query)) {
                                    echo "<script>alert('Update success!')</script>";
                                    header('Location: ../KhachHang/user.php?action=info');
                                } else {
                                    echo '<script>alert("Fail !")</script>';
                                }
                            }
                            ?>
                            <div class="product__manage-block-heading">
                                <h4 class="product__heading">Cập nhật thông tin</h4>
                                <!-- <button class="product__heading-btn"><a href="../directional.php?action=edit_user" class="action__link">+ Add User</a></button> -->
                            </div>
                            <form action="" method="post" class="user-change__password-form">
                                <br> <input type="text" name="txtID" class="user-change__info-input" placeholder="Enter your ID">
                                <br> <input type="text" name="txtName" class="user-change__info-input" placeholder="Enter your full name">
                                <br> <input type="text" name="txtCompany" class="user-change__info-input" placeholder="Enter your company">
                                <br> <input type="text" name="txtPhone" class="user-change__info-input" placeholder="Enter your Phone Update">
                                <br> <input type="text" name="txtEmail" class="user-change__info-input" placeholder="Enter your Email Update">
                                <br> <input type="submit" name="edit" class="user-change__password-btn" value="UPDATE">
                            </form>
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

    <!-- Sau div toan trang la Modal -->
    <script type="text/javascript">
        // function ok() {
        //     var test = document.querySelector('.category-item-link');
        //     setTimeout(()=>{
        //         test.classList.toggle('category-item-active');
        //     },1000)
        // }
        $(document).ready(function(){
            $("a").click(function(){
            $("category-item-link").toggleClass("category-item-active");
            });
        });
    </script>
</body>
<?php ob_flush() ?>

</html>