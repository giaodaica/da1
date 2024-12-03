<?php
// print_r($d);
// echo "<pre>";
// print_r($data_products);
// print_r($data_key);
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
} else {
    $username = '';
}

?>
<style>
    .form-fill {
        width: 225px;
    }
    .key{
        border-radius: 5px;
        width: 368px;
        height: 30px;
    }
    p{
        font-size: large;
        font-weight: bold;
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
    <?php require_once "menu/header.php"; ?>


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="<?= BASE_URL ?>">Home</a>
                    <a class="breadcrumb-item text-dark" href="?act=shop">Shop</a>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <form action="?act=forgot_password" method="post">
            <div class="mb-3">
                <label for="">Chúng tôi sẽ gửi mật khẩu mới qua email bạn đã xác thực với hệ thống</label>
                <input type="email" name="email" id="" class="key" placeholder="Vui lòng nhập email">
            </div>
        </form>
       <?php if(!isset($error)){?>
        <div class="text-danger">Mật Khẩu Mới Đã Gửi Vào Email Của Bạn Nếu Không Thấy Hãy Kiểm Tra Ở Thư Spam</div>
     <?php  }else{
        echo $error;
     } ?>

    </div>
    <!-- Shop End -->
  
       
    <?php require_once "menu/footer.php"; ?>
</body>

</html>