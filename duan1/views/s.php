<?php
// print_r($d);
// echo "<pre>";
// print_r($data_products);
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
} else {
    $username = '';
}

?>
<style>
    .form-fill{
        width: 225px;
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
   <?php require_once "menu/header.php"; ?>


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="<?= BASE_URL?>">Home</a>
                    <a class="breadcrumb-item text-dark" href="?act=shop">Shop</a>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
 
            <!-- Shop Sidebar End -->

            <?php if(empty($data_products)){
                echo "sản phẩm này tạm thời không có";
            }else{?>
                    
            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-8">
                <div class="row pb-3">
                    
                   <?php foreach($data_products as $products){ ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="<?= "./admin". $products['image'] ?>" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href="?act=products_detail&product_id=<?= $products['product_id'] ?>"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href=""><?= $products['name'] ?></a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5><?= number_format($products['price'])."Đ"; ?></h5><h6 class="text-muted ml-2"></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php } ?>
                </div>
            </div>
            <!-- Shop Product End -->
           <?php } ?>
        </div>
    </div>
    <!-- Shop End -->


    <?php require_once "menu/footer.php"; ?>
</body>

</html>
