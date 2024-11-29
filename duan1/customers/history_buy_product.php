<?php
// echo "<pre>";
// print_r($data_Custm);
//  echo $data_Custm['full_name'];
// echo $_SESSION['id'];
// if(empty($data_Custm)){
//     echo "troongs";
// }else{
//     echo "co";
// }
// echo $data_Custm['full_name'];
// print_r($data_cart_item);
// print_r($_GET['act']);
// print_r($_GET['page']);
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
<?php require_once "menu/header.php"; ?>



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
            </div>
            <div class="Ctotal" id="">
                <div class="info">
                    <b><?= empty($data_Custm['full_name']) ? "Chào bạn" : $data_Custm['full_name'] ?></b>
                    <p><?= empty($data_Custm['phone']) ? "" : $data_Custm['phone'] ?></p>
                </div>
                <?php if (empty($data_Custm)) { ?>
                    <button type="button" class="btn-custom" style="background-color: #D0F2ff;">Cập nhật thông tin cá nhân và địa chỉ để có trải nghiệm đặt hàng nhanh và thuận tiện hơn<a class="hander_if" href="?act=info_detail">Cập Nhật</a></button>
                <?php } ?>
                <?php require_once "premium.php" ?>
                <div class="">
                    <ul class="menu-list">
                        <li><a class="menu-links" href="?act=history_shop">Tất cả</a></li>
                        <li><a class="menu-links" href="?act=action_history&action=<?php echo "Chờ Xử Lý "; ?>">Chờ xác nhận</a></li>
                        <li><a class="menu-links" href="?act=action_history&action=<?php echo "Đã Xác Nhận"; ?>">Đã xác nhận</a></li>
                        <li><a class="menu-links" href="?act=action_history&action=<?php echo "Đã Hoàn Tất"; ?>">Đã giao hàng</a></li>
                        <li><a class="menu-links" href="?act=action_history&action=<?php echo "Đã hủy"; ?>">Đã hủy</a></li>
                    </ul>
                </div>
                <?php foreach ($data_cart_item_edit as $data_cart_item) { ?>
                    <div class="total-1">

                        <div class="time">
                            Ngày Tạo :
                            <?php
                            if (!empty($data_cart_item)) {
                                // Đảm bảo giá trị ngày giờ có định dạng phù hợp
                                $orderDate = strtotime($data_cart_item['order_date']);
                                echo date('d/m/Y H:i:s', $orderDate);
                            }
                            ?>
                            <div class="total_cart">Tổng đơn : <?php if (!empty($data_cart_item)) {
                                                                    echo number_format($data_cart_item['total_amount']);
                                                                } ?>
                                                                <?php 
                                                                  if($data_cart_item['hello']==1){ ?>
                                                                    <b class="text-success">Đã Thanh Toán</b>
                                                           <?php }?>
                                <div class="status">
                                    <p
                                        <?php switch ($data_cart_item['status']) {
                                           case "Chờ xử lý":
                                            echo "class='text-warning'";
                                            break;
                                        case "Đã hoàn tất":
                                            echo "class='text-success'";
                                            break;
                                        case "Đã hủy":
                                            echo "class='text-danger'";
                                            break;
                                            case "Đã Xác Nhận":
                                                echo "class='text-info'";
                                                break;
                                        } ?>><?php echo $data_cart_item['status'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="detail"><a href="?act=detail&order_id=<?= $data_cart_item['order_id'] ?>" class="text-danger">Chi tiết</a></div>

                    </div>
                <?php } ?>

                <nav aria-label="Page navigation example">
                    <?php
                    $current_page = isset($_GET['page']) && $_GET['page'] > 0 ? $_GET['page'] : 1;
                    ?>
                    <ul class="pagination">
                      
                        <li class="page-item <?php echo $current_page == 1 ? 'disabled' : ''; ?>">
                            <a class="page-link" href="?act=history_shop&page=<?php echo max(1, $current_page - 1); ?>">Trước</a>
                        </li>

                      
                        <?php
                        $start = max(1, $current_page - 2); 
                        $end = $current_page + 2;          
                        for ($i = $start; $i <= $end; $i++) {
                        ?>
                            <?php if(!empty($data_cart_item_edit)){ ?>
                                <li class="page-item <?php echo $i == $current_page ? 'active' : ''; ?>">
                                <a class="page-link" href="?act=history_shop&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                           <?php } ?>
                        <?php } ?>
                      <?php if(!empty($data_cart_item_edit)){ ?>
                        <li class="page-item">
                            <a class="page-link" href="?act=history_shop&page=<?php echo $current_page + 1; ?>">Sau</a>
                        </li>
                    <?php  }else{ ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="?act=history_shop&page=<?php echo $current_page + 1; ?>">Sau</a>
                        </li>
                    <?php } ?>
                    </ul>
                </nav>

            </div>

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
    <script src="sevice.js"></script>
</body>

</html>