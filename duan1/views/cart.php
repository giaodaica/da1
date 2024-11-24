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
<?php require_once "menu/header.php"; ?>


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


    <?php require_once "menu/footer.php"; ?>
</body>



</html>
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