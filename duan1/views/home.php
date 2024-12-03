<?php
// print_r($d);
// phpinfo();
// print_r($_SESSION['order_info']);
// print_r($_SESSION);
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
} else {
    $username = '';
}
?>
<style>
    .voucher{
        border: 1px solid white;
        width: 400;
        height: 100;
        padding: 10px 100px 15px;
        border-radius: 5px 5px 5px;
        background-color: white;
    }
    .giao{
        display: flex;
        gap: 50px;
        padding-left: 120px;
    }
</style>
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
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
        a.h6.text-decoration-none.text-truncate {
     padding-left: 80px;
     font-weight: bold;
        }
    </style>
</head>

<body>
   <?php require_once "menu/header.php"; ?>
    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/banner1.png" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Thời trang nam</h1>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Mua Ngay</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/banner2.png" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Áo polo</h1>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Mua Ngay</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/banner3.png" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Áo sơ mi</h1>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Mua Ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="img/banner4.png" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Giảm 20%</h6>
                        <a href="" class="btn btn-primary">Mua Ngay</a>
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="img/banner5.png" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Áo khoác nam</h3>
                        <a href="" class="btn btn-primary">Mua Ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Sản phẩm chất lượng</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Miễn Phí Ship</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Hoàn trả trong vòng 14 ngày</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Hỗ trợ 24/7</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->
        <!-- voucher  -->

     
        <div class="container">
        <h3 style="padding-left: 400px;">Nhận Ngay Khuyến Mại</h3>
    <div class="giao">
        <?php
        foreach($data_voucher as $render){ ?>
            <div class="voucher">
            <div class="name" id="voucher-name"><?= $render['code'] ?></div>
            <div class="discount">Giảm <?= ($render['discount_percent']*100)."%" ?></div>
            <?php if($render['quantity'] !=0){ ?>
                <div class="action"><a class="text-danger" href="?act=add_cp&id_cp=<?= $render['voucher_id'] ?>">Nhận Ngay(<span id="voucher-count"><?= $render['quantity'] ?></span>)</a></div>
           <?php }else{ ?>
            <p class="text-danger">Đã Hết</p>
          <?php } ?>
        </div>
        <?php } ?>
       
      
    </div>
</div>


        <!-- voucher  -->



    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Danh Mục</span></h2>
        <div class="row px-xl-5 pb-3">

           <?php foreach($d as $List_category) { ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="?act=">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                                <img src="<?= "./admin".$List_category['image'] ?>" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6><?= $List_category['name'] ?></h6>
                        </div>
                    </div>
                </a>
            </div>
       <?php    } ?>
        </div>
    </div>
    <!-- Categories End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Sản Phẩm Hot</span></h2>
        <div class="row px-xl-5">
            <?php foreach($products as $data_products){ ?>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="<?= "./admin".$data_products['image'] ?>" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="?act=products_detail&product_id=<?= $data_products['product_id']?>"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="?act=products_detail&product_id=<?= $data_products['product_id']?>"><?= $data_products['name'] ?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5><?= $data_products['price']." "?>Đ</h5><h6 class="text-muted ml-2"><del><?= number_format($data_products['price']*1.2)." Đ" ?></del>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
            </div>
         <?php } ?>
            
        </div>
    </div>
    <!-- Products End -->
    <?php require_once "menu/footer.php"; ?>
</body>

</html>
<script>
        window.onload = function() {
            const welcomeMessage = document.getElementById('welcome-message');

            // Hiện thông điệp nếu có tên người dùng
            if (welcomeMessage.classList.contains('hidden') === false) {
                welcomeMessage.style.top = '20px'; // Di chuyển xuống màn hình
                welcomeMessage.style.opacity = '1'; // Đặt độ trong suốt về 100%

                // Đợi một lúc trước khi làm mờ và ẩn đi
                setTimeout(() => {
                    welcomeMessage.style.opacity = '0'; // Làm mờ thông điệp
                }, 2000); // Thời gian chờ trước khi bắt đầu làm mờ

                // Đợi cho đến khi mờ hoàn toàn để ẩn thông điệp
                setTimeout(() => {
                    welcomeMessage.classList.add('hidden');
                    welcomeMessage.style.top = '-100px'; // Trở về vị trí ban đầu
                }, 1500); // Thời gian chờ sau khi làm mờ hoàn toàn
            }
        };

 
    </script>