<?php
// print_r($products);
// echo "<pre>";
// print_r($data_cart_of_user);
// // print_r($data_customer);
// print_r($_POST);
// print_r($_SESSION['cart']);
// echo $_POST['product_quantities'][];


if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
} else {
    $username = '';
}
?>
<style>
    #phuongthuc img {
    width: 300px; 
    height: auto; 
    margin-left: 300px;
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
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <form action="?act=dathang" method="post">
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Địa chỉ/thanh toán</span></h5>
                    <!-- bắt đầu thanh toán -->
                    <div class="bg-light p-30 mb-5">
                        <div class="row">
                            <div class="col-md-9 form-group">
                                <label>Họ và tên</label>
                                <input class="form-control" type="text" placeholder="" name="fullname" value="<?php if(isset($data_customer['full_name'])){echo $data_customer['full_name'];} ?>">
                            </div>
                            <div class="col-md-9 form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" type="text" placeholder="" name="address" value="<?php if(isset($data_customer['full_name'])){echo $data_customer['address'];} ?>">
                                <span></span>

                            </div>
                            <div class="col-md-9 form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" type="text" placeholder="" name="phone" value="<?php if(isset($data_customer['full_name'])){echo $data_customer['phone'];} ?>">
                                <span></span>

                            </div>
                            <div class="col-md-9 form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" placeholder="" name="email" value="<?php if(isset($data_customer['email'])){echo $data_customer['email'];} ?>">
                                <span></span>

                            </div>
                        </div>
                        <span><?php if(isset($error)){
                            echo $error;
                        } ?></span>

                    </div>
                    <div id="phuongthuc"></div>
                </div>
                <div class="col-lg-4">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Chi tiết</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom">
                            <h6 class="mb-3">Sản Phẩm</h6>

                           <?php if(empty($data_cart_of_user) && !empty($_SESSION['cart'])){
                            $data_cart_of_user = $_SESSION['cart'];
                           } ?>
                                <?php foreach($data_cart_of_user as $render){ ?>
                                    <div class="d-flex justify-content-between mb-3">
                                        <h6><?= $render['name'] ?></h6>
                                        <h6><?= "x".$render['quantity'] ?></h6>
                                        <h6><?php echo number_format($render['price'] * $render['quantity'])?></h6>
                                    </div>
                               <?php } ?>
                                <div class="border-bottom pt-3 pb-2">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h6>Tổng đơn</h6>
                                        <h6><?php echo number_format($_POST['total']) ?? 0?></h6>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h6 class="font-weight-medium">Giảm Giá</h6>
                                        <h6 class="font-weight-medium">
                                            
                                          <?php
                                                if(!empty($_POST['voucher'])){
                                                    $vocher = $_POST['voucher'];
                                                    echo ($vocher * 100)."%";
                                                }else{
                                                    echo 0;
                                                }
                                        
                                        ?></h6>
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <div class="d-flex justify-content-between mt-2">
                                        <h5>Tổng</h5>
                                        <h5>
                                            <h5>
                                            <?php 
                                            if(isset($_POST['total'])){
                                            $total = $_POST['total'];
                                                }
                                                if(empty($_POST['voucher'])){
                                                    $vocher = 0 ;
                                                }else{
                                                    $vocher = $_POST['voucher'];
                                                }
                                                echo number_format($total -($total * $vocher));
                                        ?>

                                            </h5>

                                        </h5>
                                    </div>
                                </div>

                       

                        </div>

                    </div>
                    <div class="mb-5">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                        <div class="bg-light p-30">
                          
                          
                            <input type="hidden" name="voucher" value="<?php if(!empty($_POST['voucher'])){echo $_POST['voucher'];} ?>">
                            <input type="hidden" name="total" value="<?= ($total - ($total * (empty($_POST['voucher']) ? 0 : $_POST['voucher']))) ?>">
                            <button class="btn btn-block btn-primary font-weight-bold py-3" id="btnsubmit">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Checkout End -->


    <?php require_once "menu/footer.php"; ?>
</body>
<script>
    const btnsub = document.getElementById("btnsubmit");

    btnsub.addEventListener("click", (event) => {
        if (!xacnhan()) {
            // Ngăn chặn hành động mặc định nếu người dùng nhấn "Cancel"
            event.preventDefault();
        } else {
            console.log("Đơn hàng đã được xác nhận");
            // Thực hiện các hành động đặt hàng ở đây
        }
    });

    function xacnhan() {
        return confirm("Xác nhận đặt hàng?");
    }
    const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
    const phuongThucDiv = document.getElementById("phuongthuc");

    paymentMethods.forEach(method => {
        method.addEventListener("change", () => {
            // Xóa ảnh cũ nếu có
            phuongThucDiv.innerHTML = "";

            // Tạo ảnh mới dựa trên phương thức thanh toán được chọn
            const img = document.createElement("img");
            switch (method.value) {
              
                case "momo":
                    img.src = "pay/img/momo.jpg"; // Đường dẫn ảnh cho Ví điện tử
                    img.alt = "Ví điện tử";
                    break;
                case "bank":
                    img.src = "pay/img/bank.png"; // Đường dẫn ảnh cho Ngân hàng
                    img.alt = "Ngân hàng";
                    break;
            }

            // Thêm ảnh vào thẻ div
            phuongThucDiv.appendChild(img);
        });
    });
    
    
</script>

</html>