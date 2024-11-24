<?php
// echo "<pre>";
// print_r($products);
// print_r($data_cart);
// print_r($_GET);
// print_r($data_voucher);
// print_r($_POST);
// print_r($_SESSION['cart']);
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
} else {
    $username = '';
}
?>
<style>
    .hello_g {
        font-size: large;
        color: black;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sale Up To 50% - FplBee</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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
    <style>
        #welcome-message {
            position: fixed;
            /* Thay đổi thành fixed để luôn nằm ở góc phải */
            top: -100px;
            /* Bắt đầu ở vị trí trên cùng */
            right: 20px;
            /* Đặt ở góc phải */
            background-color: #4caf50;
            color: white;
            padding: 20px;
            border-radius: 5px;
            opacity: 1;
            /* Bắt đầu với độ trong suốt 100% */
            transition: top 1s, opacity 2s;
            /* Thời gian chuyển tiếp cho hiệu ứng */
            z-index: 9999;
            /* Đặt z-index cao để thông điệp nổi bật */
        }
    </style>
</head>

<body>
    <div id="welcome-message" class="<?php echo $username ? '' : 'hidden'; ?>">
        <?php if (isset($_SESSION['role_admin'])) { ?>
            Chào admin, <?php echo htmlspecialchars($username); ?>!
        <?php } ?>
        <?php if (isset($_SESSION['role_epl'])) { ?>
            Chào nhân viên, <?php echo htmlspecialchars($username); ?>!
        <?php } ?>
        <?php if (isset($_SESSION['role_customers'])) { ?>
            Chào mừng bạn, <?php echo htmlspecialchars($username); ?>!
        <?php } ?>
    </div>

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
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm sản phẩm">
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
                            <a href="?act=shop" class="nav-item nav-link">Cửa hàng</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Tra cứu <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="?act=shoping-Cart" class="dropdown-item">Giỏ Hàng</a>
                                    <a href="" class="dropdown-item">Hóa Đơn</a>
                                    <a href="" class="dropdown-item">Lịch Sử Mua Hàng</a>
                                </div>
                            </div>
                            <a href="?act=shop-Contact" class="nav-item nav-link">Liên Hệ</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
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
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Cart Start -->
    <?php if (empty($data_cart)) { ?>
        <div class="container"><?php echo "Giỏ hàng trống" ?></div>
    <?php } else { ?>

        <!-- Cart Start -->
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-lg-8 table-responsive mb-5">
                    <table class="table table-light table-borderless table-hover text-center mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <?php
                            $total = 0;
                            foreach ($data_cart as $render_cart) {
                                $total += $render_cart['quantity'] * $render_cart['price'];
                            ?>
                                <tr>
                                    <td class="align-middle"><img src="<?php echo "./admin". $render_cart['image'] ?>" alt="" style="width: 50px;"><?= $render_cart['name'] . " " . $render_cart['color'] ?></td>
                                    <td class="align-middle"><?= $render_cart['price'] ?></td>
                                    <td class="align-middle">
                                        <form action="?act=update_quantity&cart_item_id=<?php if (isset($render_cart['cart_item_id'])) {
                                                                                            echo $render_cart['cart_item_id'];
                                                                                        } else {
                                                                                            echo $render_cart['id'];
                                                                                        }; ?>" method="Post">
                                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-sm btn-primary btn-minus">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                                <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="<?= $render_cart['quantity'] ?>" name="quantity" >
                                                <div class="input-group-btn">
                                                    <button class="btn btn-sm btn-primary btn-plus">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="align-middle"><?= number_format($render_cart['quantity'] * $render_cart['price']) ?></td>
                                    <td class="align-middle"><a href="?act=delete_item_cart&id_cart=<?= isset($render_cart['cart_item_id']) ? $render_cart['cart_item_id'] : $render_cart['id']; ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></a></td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <?php
                    if (isset($_SESSION['user'])) { ?>
                        <form class="mb-30" action="" method="post">
                            <div class="input-group">
                                <?php
                                foreach($data_voucher as $voucher){}
                                if (empty($data_voucher)) { ?>
                                 
                                <?php } else { ?>
                                    <select name="voucher" id="">
                                        <?php foreach ($data_voucher as $render_voucher) { ?>
                                            <?php if($render_voucher['is_used'] == 0){ ?>
                                                <option value="<?php echo $render_voucher['discount_percent'] ?>"><?php echo $render_voucher['code'] . " Giảm " . $render_voucher['discount_percent'] * 100; ?>%</option>
                                                <?php } ?>
                                           <?php } ?>
                                    </select>
                                <?php } ?>
                                <div class="input-group-append">
                                    <input type="hidden" name="voucher_id" value="<?php foreach($data_voucher as $data_her){
                                        if(isset($_POST['voucher'])){
                                            $voucher = $_POST['voucher'];
                                        }else{
                                            $voucher = "";
                                        }
                                        if($data_her['discount_percent'] == $voucher){
                                            echo $data_her['voucher_id'];
                                        }
                                    }?>">
                                    <?php if(!empty($data_voucher)){ ?>
                                        <button class="btn btn-primary">Áp dụng voucher</button>
                                    <?php }else{ ?>
                                  <?php  } ?>
                                </div>
                            </div>
                        </form>
                    <?php  }
                    ?>
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Tổng</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Tổng Tiền</h6>
                                <h6><?= number_format($total) ?></h6>
                            </div>
                            <?php if (isset($_SESSION['user'])) { ?>
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-medium">Ưu đãi</h6>
                                    <h6 class="font-weight-medium"><?php
                                                                    if (isset($_POST['voucher'])) {
                                                                        echo ($_POST['voucher'] * 100) . "%";
                                                                    } else {
                                                                        echo "0";
                                                                    } ?></h6>
                                </div>
                            <?php } else { ?>
                                <div class="d-flex justify-content-between">
                                    <?php if (!isset($_SESSION['user'])) { ?>
                                        <h6 class="font-weight-medium">Ưu đãi</h6>
                                        <h6 class="font-weight-medium">Giảm 50% khi đăng ký tài khoản</h6>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="pt-2">
                            <form action="?act=shop-Pay" method="post">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5>Thanh toán</h5>
                                    <h5><?php if (!isset($_SESSION['user'])) { ?>
                                            <del><?php echo (isset($_POST['voucher'])) ? number_format(($total - $total * $_POST['voucher']), 0) . "Đ" : number_format($total) . "Đ"; ?></del>
                                        <?php } else { ?>
                                            <?php echo (isset($_POST['voucher'])) ? number_format(($total - $total * $_POST['voucher']), 0) . "Đ" : number_format($total) . "Đ"; ?>
                                        <?php  } ?>
                                    </h5>
                                </div>
                                <?php if (!isset($_SESSION['user'])) { ?>
                                    <div class="hello_g" style="padding-left: 290px;"><b><?= number_format($total - ($total * 0.5)) . "Đ" ?></b></div>
                                <?php } ?>
                                    <input type="hidden" name="voucher" value="<?php if(isset($_POST['voucher'])){echo $_POST['voucher'];} ?>">
                                    <input type="hidden" name="voucher_id" value="<?php if(isset($_POST['voucher_id'])){echo $_POST['voucher_id'];} ?>">
                                    <input type="hidden" name="total" value="<?php if(isset($_POST['voucher'])){ echo ($total); }else{echo $total;} ?>">
                                <button class="btn btn-block btn-primary font-weight-bold my-3 py-3" <?php if (!isset($_SESSION['user'])) {
                                                                                                            echo "id='guest_submit'";
                                                                                                        } ?>>Thanh Toán</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
    <!-- Cart End -->


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
                                    <button class="btn btn-primary">Sign Up</button>
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
</body>

<script>
    const btn_guest = document.getElementById("guest_submit");

    function confirm_hieu() {
        btn_guest.addEventListener("click", function(event) {
            // Hiển thị hộp thoại confirm và kiểm tra kết quả
            const userConfirmed = confirm("Bạn đồng ý tạo tài khoản để nhận được ưu đãi?");

            // Nếu người dùng chọn OK, chuyển đến trang a.php
            if (userConfirmed) {
                window.location.href = "?act=register";
            event.preventDefault();
            } else {
                // Nếu người dùng chọn Cancel, chuyển đến trang b.php
                window.location.href = "?act=shop-Pay";
            }

            // Ngừng hành động mặc định (nếu có)
        });
    }

    // Gọi hàm để gắn sự kiện cho nút
    confirm_hieu();
    
</script>

</html>