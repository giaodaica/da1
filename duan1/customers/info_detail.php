<?php
// print_r($data_Custm);
//  echo $data_Custm['full_name'];
// echo $_SESSION['id'];
// if(empty($data_Custm)){
//     echo "troongs";
// }else{
//     echo "co";
// }
// echo $data_Custm['full_name'];
require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>
<!DOCTYPE html>
<html lang="en">
<style>


</style>

<head>
    <meta charset="utf-8">
    <title>Thông Tin Khách Hàng : Anh Hiếu</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="stylesheet" href="css/style.hieu.css">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">Giới Thiệu</a>
                    <a class="text-body mr-3" href="">Liên Hệ</a>
                    <a class="text-body mr-3" href="">Hỗ Trợ</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center" style="padding-right: 100px;">
                    <?php
                    if (isset($data_Gift) && !empty($data_Gift)) { ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-bell text-primary"> <?php echo count($data_Gift) ?></i></a>
                            <div class="dropdown-menu rounded-0 border-0 m-0 custom-dropdown">
                                <label class="dropdown-item" style="font-weight: bold;">Voucher Của Bạn</label>
                                <?php foreach ($data_Gift as $Gift) { ?>
                                    <a href="?act=shop" class="dropdown-item"><?= $Gift['code'] . "(-" . $Gift['discount_percent'] * 100 ?>%) Mua sắm ngay!!</a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } elseif (isset($_SESSION['user']) && empty($data_Gift)) { ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-bell text-primary"></i></a>
                            <div class="dropdown-menu rounded-0 border-0 m-0 custom-dropdown">
                                <label class="dropdown-item" style="font-weight: bold;">Voucher Của Bạn</label>
                                <a href="?act=shop" class="dropdown-item <?php echo "nav-link disabled" ?>">Bạn đã sử dụng hết voucher!!</a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-bell text-primary"></i></a>
                            <div class="dropdown-menu rounded-0 border-0 m-0 custom-dropdown">
                                <label class="dropdown-item" style="font-weight: bold;">Voucher Của Bạn</label>
                                <a href="?act=register" class="dropdown-item <?php if (isset($_SESSION['role_admin'])) {
                                                                                    echo "nav-link disabled";
                                                                                } ?>">Đăng ký thành viên để nhận nhiều ưu đãi</a>
                            </div>
                        </div>
                    <?php  } ?>
                    <?php
                    if (isset($_SESSION['user'])) { ?>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"><?php if (isset($_SESSION['user'])) {
                                                                                                                            echo $_SESSION['user'];
                                                                                                                        } ?></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <?php if (isset($_SESSION['role_customers'])) { ?>
                                    <button class="dropdown-item" type="button"><a class="text-dark" href="?act=info">Truy Cập Bee member</a></button>
                                    <button class="dropdown-item" type="button"><a class="text-dark" href="?act=info_customers">Đơn hàng của tôi</a></button>
                                    <button class="dropdown-item" type="button"><a class="text-dark" href="?act=info_customers">Sổ địa chỉ nhận hàng</a></button>
                                <?php  } ?>
                                <?php if (isset($_SESSION['role_admin'])) { ?>
                                    <button class="dropdown-item" type="button"><a class="text-dark" href="?act=admin">Admin</a></button>
                                <?php  } ?>
                                <?php if (isset($_SESSION['role_epl']) && !empty($_SESSION['role_epl'])) { ?>
                                    <button class="dropdown-item" type="button"><a class="text-dark" href="?act=admin">Nhân Viên</a></button>
                                <?php  } ?>
                                <button class="dropdown-item" type="button"><a class="text-dark" href="?act=logout">Đăng Xuất</a></button>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Tài Khoản</button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" type="button"><a class="text-dark" href="?act=login">Đăng Nhập</a></button>
                                <button class="dropdown-item" type="button"><a class="text-dark" href="?act=register">Đăng Ký</a></button>
                            </div>
                        </div>
                    <?php  } ?>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">FPL</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Bee</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="">
                    <div class="input-group input-remake">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Danh Mục</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <!-- áo -->
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Áo<i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <?php
                                foreach ($d as $categories) { ?>
                                    <?php if ($categories->only == 0) { ?>
                                        <a href="" class="dropdown-item"><?= $categories->name ?></a>
                                    <?php } ?>
                                <?php }
                                ?>
                            </div>
                        </div>
                        <!-- end áo -->
                        <!-- quần -->
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Quần<i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <?php
                                foreach ($d as $categories) { ?>
                                    <?php if ($categories->only == 1) { ?>
                                        <a href="" class="dropdown-item"><?= $categories->name ?></a>
                                    <?php } ?>
                                <?php }
                                ?>
                            </div>
                        </div>
                        <!-- end quần -->
                        <!-- đồ ngủ -->
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Bộ Đồ Ngủ<i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <?php
                                foreach ($d as $categories) { ?>
                                    <?php if ($categories->only == 2) { ?>
                                        <a href="" class="dropdown-item"><?= $categories->name ?></a>
                                    <?php } ?>
                                <?php }
                                ?>
                            </div>
                        </div>
                        <!-- end đồ ngủ -->
                        <!-- đồ thể thao -->
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Đồ Thể Thao<i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <?php
                                foreach ($d as $categories) { ?>
                                    <?php if ($categories->only == 5 || $categories->only == 4) { ?>
                                        <a href="" class="dropdown-item"><?= $categories->name ?></a>
                                    <?php } ?>
                                <?php }
                                ?>
                            </div>
                        </div>
                        <!-- end đồ thể thao -->

                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="<?= BASE_URL ?>" class="nav-item nav-link active">Trang Chủ</a>
                            <a href="?act=shop" class="nav-item nav-link">Shop</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="?act=shoping-Cart" class="dropdown-item">Giỏ Hàng</a>
                                    <a href="" class="dropdown-item">Hóa Đơn</a>
                                    <a href="" class="dropdown-item">Lịch Sử Mua Hàng</a>
                                </div>
                            </div>
                            <a href="?act=shop-Contact" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">

                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->



    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <span class="breadcrumb-item active">Thông Tin Cá Nhân</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <div class="container text-center">

        <div class="row">
            <div class="col-4">
                <div class="list-group">
                    <a href="?act=info" class="list-group-item list-group-item-action " aria-current="true">
                        Trang Chủ
                    </a>
                    <a href="#" class="history_shop list-group-item list-group-item-action">Đơn Hàng Của Tôi</a>
                    <a href="?act=info_detail" class="info-ctm list-group-item list-group-item-action" id="info_ctm" <?php if (empty($data_Custm)) {
                                                                                                                            echo "success='true'";
                                                                                                                        } else {
                                                                                                                            echo "success='fale'";
                                                                                                                        } ?>>Tài khoản của bạn</a>
                </div>


                <?php
                if (!empty($data_Custm) && $data_Custm['authen'] === "Chưa Xác Thực") { ?>
                    <div class="">
                        <button id="openPopup">Xác nhận email</button>

                        <!-- Popup -->
                        <div class="popup-overlay" id="popupOverlay">
                            <div class="popup" id="popup">
                                <!-- Step 1: Nhập số điện thoại -->
                                <div id="step1">
                                    <h2>Email</h2>
                                    <form action="" method="post">
                                        <input type="email" id="text_email" placeholder="" name="email" value="<?php echo $data_Custm['email'] ?>" readonly>
                                        <button id="sendOtp">Gửi OTP</button>
                                    </form>
                                </div>

                                <!-- Step 2: Nhập OTP -->
                                <div id="step2" style="display: none;">
                                    <h2>Nhập mã OTP</h2>
                                    <form action="?act=confirm_email" method="post">
                                        <input type="text" id="otpCode" placeholder="Nhập mã OTP" value="" name="otp">
                                        <button id="verifyOtp">Xác nhận</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>




            </div>

            
            <?php if (!empty($data_Custm)) { ?>

                <div>
                    <form action="?act=update_Info" method="post">
                        <div class="form-group">
                            <label for="">Họ và tên</label>
                            <input type="text" name="full_name" id="full_name" class="form-control" placeholder="" aria-describedby="helpId" value="<?php if (isset($data_Custm['full_name'])) {
                                                                                                                                                        echo $data_Custm['full_name'];
                                                                                                                                                    } ?>">
                            <small id="eFullname" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="number" name="phone" id="phone" class="form-control" placeholder="" aria-describedby="helpId" value="<?php if (isset($data_Custm['phone'])) {
                                                                                                                                                    echo $data_Custm['phone'];
                                                                                                                                                } ?>">
                            <small id="ePhone" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email_users" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?php if (isset($data_Custm['email'])) {
                                                                                                                                                    echo $data_Custm['email'];
                                                                                                                                                } ?>" readonly>
                            <small id="ePhone" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="" aria-describedby="helpId" value="<?php if (isset($data_Custm['address'])) {
                                                                                                                                                    echo $data_Custm['address'];
                                                                                                                                                } ?>">
                            <small id="eAddress" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="">Giới Tính</label>
                            <br>
                            <input type="radio" name="gender" id="gender" value="1" <?php if (isset($data_Custm['gender']) == 1) {
                                                                                        echo "checked";
                                                                                    } ?>> Nam
                            <input type="radio" name="gender" id="gender" value="0" <?php if (isset($data_Custm['gender']) == 0) {
                                                                                        echo "checked";
                                                                                    } ?>> Nữ
                            <small id="eGender" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="">Sinh Nhật</label>
                            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" placeholder="" aria-describedby="helpId" value="<?php if (isset($data_Custm['date_of_birth'])) {
                                                                                                                                                                echo $data_Custm['date_of_birth'];
                                                                                                                                                            } ?>">
                            <small id="eBirthday" class="text-muted"></small>
                        </div>

                        <div class="form-group">
                        <?php
                        if($data_Custm['authen'] == "Đã Xác Thực"){ ?>
                                <p class="text-success">Đã Xác Thực</p>
                       <?php }
                        ?>
                        </div>
                        <button type="submit" class="btn btn-success">Sửa thông tin</button>

                    <?php } else { ?>

                        <form action="?act=insert_Info" method="post">
                            <div class="form-group">
                                <label for="">Họ và tên</label>
                                <input type="text" name="full_name" id="full_name" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="eFullname" class="text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="number" name="phone" id="phone" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="ePhone" class="text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email_users" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="eAddress" class="text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="">Giới Tính</label>
                                <br>
                                <input type="radio" name="gender" id="gender" value="1"> Nam
                                <input type="radio" name="gender" id="gender" value="0"> Nữ
                                <small id="eGender" class="text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="">Sinh Nhật</label>
                                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="eBirthday" class="text-muted"></small>
                            </div>
                            <div style="color: red;"><?php if (isset($error)) {
                                                            echo $error;
                                                        } ?></div>
                            <button type="submit" class="btn btn-success">Cập Nhật</button>
                        </form>
                    </form>
                <?php } ?>
                </div>
                <!-- xác nhận sdt start -->
                <!-- <div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmPhoneModal">
        Xác nhận số điện thoại
    </button>
<div class="modal fade" id="confirmPhoneModal" tabindex="-1" role="dialog" aria-labelledby="confirmPhoneModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmPhoneModalLabel">Xác Nhận Số Điện Thoại</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          <form action="?act=confirm_phone" method="post">
          <div class="modal-body">
                <label for="">Số</label>
                <input type="text" name="">
                <label for="">otp</label>
                <input type="text" name="otp" id="">
            </div>
            <div class="modal-footer">
                <button type="submit" form="form_confirm" class="btn btn-primary"  name="form_confirm">Xác Nhận</button>
            </div>
          </form>
        </div>
    </div>
</div>
        </div> -->
                <!-- xác nhận sdt end -->
        </div>
    </div>



    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed dolor. Rebum tempor no vero est magna amet no</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                        <p>Duo stet tempor ipsum sit amet magna ipsum tempor est</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#">Domain</a>. All Rights Reserved. Designed
                    by
                    <a class="text-primary" href="https://htmlcodex.com">HTML Codex</a>
                    <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="script.js">

    </script>
</body>

</html>
<input type="text" id="full_name" placeholder="Nhập tên của bạn">
<small id="eFullname" class="text-muted"></small>

<script>
    const fullname = document.getElementById("full_name");
    const eFullname = document.getElementById("eFullname");

    const phone = document.getElementById("phone");
    const ePhone = document.getElementById("ePhone");

    const address = document.getElementById("address");
    const eAddress = document.getElementById("eAddress");

    const gender = document.getElementById("gender");
    const eGender = document.getElementById("eGender");

    const date_of_birth = document.getElementById("date_of_birth");
    const eBirthday = document.getElementById("eBirthday");

    // Kiểm tra Họ và Tên
    fullname.addEventListener("blur", () => {
        if (fullname.value.trim() === "") {
            eFullname.style.display = "block";
            eFullname.innerHTML = "Bạn không được để trống trường này";
        } else if (fullname.value.trim().length < 5) {
            eFullname.style.display = "block";
            eFullname.innerHTML = "Vui lòng nhập đầy đủ họ và tên";
        } else if (/\d/.test(fullname.value.trim())) {
            eFullname.style.display = "block";
            eFullname.innerHTML = "Bạn đang nhập số, vui lòng kiểm tra lại";
        } else {
            eFullname.style.display = "none";
        }
    });
    fullname.addEventListener("focus", () => {
        eFullname.style.display = "none";
    });

    // Kiểm tra Số điện thoại
    phone.addEventListener("blur", () => {
        if (phone.value.trim() === "") {
            ePhone.style.display = "block";
            ePhone.innerHTML = "Số điện thoại không được để trống";
        } else if ((phone.value.trim().length < 10)) { // Kiểm tra định dạng số điện thoại
            ePhone.style.display = "block";
            ePhone.innerHTML = "Số điện thoại phải gồm 10 chữ số";
        } else {
            ePhone.style.display = "none";
        }
    });
    phone.addEventListener("focus", () => {
        ePhone.style.display = "none";
    });

    // Kiểm tra Địa chỉ
    address.addEventListener("blur", () => {
        if (address.value.trim() === "") {
            eAddress.style.display = "block";
            eAddress.innerHTML = "Địa chỉ không được để trống";
        } else if (address.value.trim().length < 10) {
            eAddress.style.display = "block";
            eAddress.innerHTML = "Địa chỉ quá ngắn, vui lòng nhập đầy đủ";
        } else {
            eAddress.style.display = "none";
        }
    });
    address.addEventListener("focus", () => {
        eAddress.style.display = "none";
    });

    // Kiểm tra Giới tính
    gender.addEventListener("blur", () => {
        if (gender.value === "") {
            eGender.style.display = "block";
            eGender.innerHTML = "Vui lòng chọn giới tính";
        } else {
            eGender.style.display = "none";
        }
    });
    gender.addEventListener("focus", () => {
        eGender.style.display = "none";
    });

    // Kiểm tra Ngày sinh
    // Kiểm tra Ngày sinh
    date_of_birth.addEventListener("blur", () => {
        const today = new Date();
        const selectedDate = new Date(date_of_birth.value);

        // Đặt thời gian của cả ngày hiện tại và ngày chọn về 00:00:00 để chỉ so sánh ngày
        today.setHours(0, 0, 0, 0);
        selectedDate.setHours(0, 0, 0, 0);

        if (date_of_birth.value.trim() === "") {
            eBirthday.style.display = "block";
            eBirthday.innerHTML = "Ngày sinh không được để trống";
        } else if (selectedDate.getTime() === today.getTime()) { // Kiểm tra nếu ngày sinh là hôm nay
            eBirthday.style.display = "block";
            eBirthday.innerHTML = "Bạn có chắc ngay sinh là ngày hôm nay";
        } else {
            eBirthday.style.display = "none";
        }
    });
    date_of_birth.addEventListener("focus", () => {
        eBirthday.style.display = "none";
    });
    const openPopup = document.getElementById('openPopup');
    const popupOverlay = document.getElementById('popupOverlay');
    const step1 = document.getElementById('step1');
    const step2 = document.getElementById('step2');
    const sendOtp = document.getElementById('sendOtp');
    const verifyOtp = document.getElementById('verifyOtp');

   // Hiển thị popup
openPopup.addEventListener('click', () => {
    popupOverlay.style.display = 'flex';
});

// Đóng popup khi nhấn ra ngoài
popupOverlay.addEventListener('click', (e) => {
    if (e.target === popupOverlay) {
        popupOverlay.style.display = 'none';
    }
});

// Chuyển từ bước nhập số điện thoại sang nhập OTP
sendOtp.addEventListener('click', (e) => {
    e.preventDefault(); // Ngăn chặn form submit

    const text_email = document.getElementById('text_email').value;
    if (!text_email) {
        alert('Vui lòng nhập email hợp lệ.');
        return;
    }

    // Gửi yêu cầu AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '?act=send-otp', true); // Gọi đúng route send-otp trong MVC
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
                alert(response.message);
                // Chuyển tới bước nhập OTP
                document.getElementById('step1').style.display = 'none';
                document.getElementById('step2').style.display = 'block';
            } else {
                alert(response.message);
            }
        }
    };

    // Gửi dữ liệu email
    xhr.send(`email=${encodeURIComponent(text_email)}`);
});


</script>