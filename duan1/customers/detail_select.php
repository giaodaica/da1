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
        <form action="?act=select_history_order" method="post">
            <div class="mb-3">
                <label for="">Nhập mã đơn hàng để tra cứu</label>
                <input type="text" name="key" id="" class="key">
            </div>
        </form>
    </div>
    <!-- Shop End -->
    <?php if(isset($data_key) && !empty($data_key)){ ?>
        <div>
            <h3>Chi Tiết Đơn Hàng <?php if(isset($_POST['key'])){echo $_POST['key'];} ?></h3>
            <p>Họ Tên Khách Hàng : <?= $data_key['recipient_name'] ?></p> 
          <p>  Địa Chỉ Nhận Hàng : <?= $data_key['recipient_address'] ?></p>
            <p>Số Điện Thoại : <?= $data_key['recipient_phone'] ?></p>
          <p>  Email : <?= $data_key['email'] ?></p>
            <table class="table">
  <thead>
    <tr>
      <th scope="col">Tên Sản Phẩm</th>
      <th scope="col">Hình Ảnh</th>
      <th scope="col">Số Lượng</th>
      <th scope="col">Kích Cỡ</th>
      <th scope="col">Màu Sắc</th>
      <th scope="col">Giá</th>
      <th scope="col">Trạng Thái Đơn Hàng</th>
      <th scope="col">Thời Gian Đặt Hàng</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?= $data_key['name'] ?></th>
      <td><img src="<?= "./admin". $data_key['image'] ?>" alt="" width="100"></td>
      <td><?= $data_key['quantity'] ?></td>
      <td><?= $data_key['size'] ?></td>
      <td><?= $data_key['color'] ?></td>
      <td><?= number_format($data_key['subtotal']) ?></td>
      <td><?php
      switch($data_key['status']){
        case "Chờ xử lý":
            echo "<p class='text-warning'>Chờ Xử Lý</p>";
            break;
            case "Đã hoàn tất":
                echo "<p class='text-success'>Đã giao hàng</p>";
                break;
                case "Đã Xác Nhận":
                    echo "<p class='text-info'>Đã Xác Nhận</p>";
                    break;
                    
      }
      
      ?></td>
      <td><?= $data_key['order_date'] ?></td>
    </tr>
    
   
  </tbody>
</table>
        </div>
  <?php  }else{
    if(isset($_POST['key'])){
        echo "Không Tìm Thấy Đơn Hàng Này Hãy Kiểm Tra Lại Mã Đơn Hàng Trong Email Của Bạn";
    }
  } ?>


    <?php require_once "menu/footer.php"; ?>
</body>

</html>