<?php
// print_r($products);
// echo "<pre>";
// print_r($data_products);

// print_r($data_variants);
// echo "</pre>";
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
} else {
    $username = '';
}


if (isset($_GET['act']) && $_GET['act'] == "products_detail" && isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $conn = new PDO("mysql:host=localhost;dbname=db_duan1", "root", "");
    $sql = "UPDATE `products` SET `views` = views + 1 WHERE `products`.`product_id` = $product_id";
    $conn->exec($sql);
}

?>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

        .error {
            color: red;
            font-weight: bold;
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
                    <span class="breadcrumb-item active">Shop Detail</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <?php if (empty($data_products)) { ?>
        <?php echo "Không tìm thấy sản phẩm này"; ?>
    <?php } else { ?>
        <!-- Shop Detail Start -->
        <div class="container-fluid pb-5">
            <div class="row px-xl-5">
                <div class="col-lg-5 mb-30">
                    <div id="product-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner bg-light">
                            <div class="carousel-item active">
                                <img class="w-100 h-100" src="<?= "./admin" . $data_products['image'] ?>" alt="Image">
                            </div>

                            <?php if (!empty($data_variants_black['image'])) { ?>
                                <div class="carousel-item">
                                    <img class="w-100 h-100" src="<?= "./admin" . $data_variants_black['image'] ?>" alt="Image">
                                </div>
                            <?php } ?>

                            <?php if (!empty($data_variants_blue['image'])) { ?>
                                <div class="carousel-item">
                                    <img class="w-100 h-100" src="<?= "./admin" . $data_variants_blue['image'] ?>" alt="Image">
                                </div>
                            <?php } ?>

                            <?php if (!empty($data_variants_red['image'])) { ?>
                                <div class="carousel-item">
                                    <img class="w-100 h-100" src="<?= "./admin" . $data_variants_red['image'] ?>" alt="Image">
                                </div>
                            <?php } ?>

                            <?php if (!empty($data_variants_yellow['image'])) { ?>
                                <div class="carousel-item">
                                    <img class="w-100 h-100" src="<?= "./admin" . $data_variants_yellow['image'] ?>" alt="Image">
                                </div>

                            <?php } ?> <?php if (!empty($data_variants_orange['image'])) { ?>
                                <div class="carousel-item">
                                    <img class="w-100 h-100" src="<?= "./admin" . $data_variants_orange['image'] ?>" alt="Image">
                                </div>
                            <?php } ?>

                        </div>
                        <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                            <i class="fa fa-2x fa-angle-left text-dark"></i>
                        </a>
                        <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                            <i class="fa fa-2x fa-angle-right text-dark"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-7 h-auto mb-30">
                    <div class="h-100 bg-light p-30">
                        <h3><?= $data_products['name'] ?></h3>
                        <h3 class="font-weight-semi-bold mb-4"><?= $data_products['price'] ?></h3>
                        <p class="mb-4"><?= $data_products['mota'] ?></p>
                        <div class="d-flex mb-3">
                            <form action="?act=add-to-cart&products_id=<?= $data_products['product_id'] ?>" method="POST">
                                <div class="size-group">
                                    <strong class="text-dark mr-3">Sizes:</strong>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="size-2" name="size" value="S">
                                        <label class="custom-control-label" for="size-2">S</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="size-3" name="size" value="M">
                                        <label class="custom-control-label" for="size-3">M</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="size-4" name="size" value="L">
                                        <label class="custom-control-label" for="size-4">L</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="size-5" name="size" value="XL">
                                        <label class="custom-control-label" for="size-5">XL</label>
                                    </div>
                                </div>
                                <br>
                                <div class="color-group">
                                    <strong class="text-dark mr-3">Màu</strong>
                                    <?php
                                    // Mảng chứa thông tin màu và điều kiện hiển thị
                                    $colors = [
                                        ['name' => 'Đen', 'value' => 'Đen', 'id' => 'color-1', 'condition' => !empty($data_variants_black['image'])],
                                        ['name' => 'Trắng', 'value' => 'Trắng', 'id' => 'color-2', 'condition' => true],
                                        ['name' => 'Đỏ', 'value' => 'Đỏ', 'id' => 'color-3', 'condition' => !empty($data_variants_red['image'])],
                                        ['name' => 'Xanh', 'value' => 'Xanh', 'id' => 'color-4', 'condition' => !empty($data_variants_blue['image'])],
                                        ['name' => 'Cam', 'value' => 'Cam', 'id' => 'color-5', 'condition' => !empty($data_variants_orange['image'])],
                                        ['name' => 'Vàng', 'value' => 'Vàng', 'id' => 'color-6', 'condition' => !empty($data_variants_yellow['image'])],

                                    ];

                                    foreach ($colors as $color) {
                                        if ($color['condition']) {
                                            echo '<div class="custom-control custom-radio custom-control-inline">';
                                            echo '<input type="radio" class="custom-control-input" id="' . $color['id'] . '" name="color" value="' . $color['value'] . '">';
                                            echo '<label class="custom-control-label" for="' . $color['id'] . '">' . $color['name'] . '</label>';
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div id="stock-message" class="text-success mt-3"></div>
                                <div class="d-flex align-items-center mb-4 pt-2">
                                    <input type="hidden" name="price_present" id="" value="<?= $data_products['price'] ?>">
                                    <input type="hidden" name="name" id="" value="<?= $data_products['name'] ?>">
                                    <?php if ($data_products['stock_quantity'] == 0) { ?>
                                        <h4 class="text-danger">Tạm Hết Hàng</h4>
                                    <?php } else { ?>
                                        <button class="btn btn-primary px-3" type="submit"><i class="fa fa-shopping-cart mr-1"></i>Thêm vào giỏ</button>
                                    <?php } ?>
                                    <br>
                                    <div class="error" style="color: red;"><?php if (isset($error)) {
                                                                                echo $error;
                                                                            } ?></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- thu day -->
            <div class="row px-xl-5">
                <div class="col">
                    <div class="bg-light p-30">
                        <div class="tab-content">
                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="mb-4"><?= count($rating)." lời nhận xét về sản phẩm"; ?></h4>
                                        <?php foreach($rating as $render){ ?>
                                            <div class="media mb-4">
                                            <div class="media-body">
                                                <h6><?= $render['full_name'] ?><small> - <i><?= $render['rating_date'] ?></i></small></h6>
                                                <div class="text-primary mb-2">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <p><?= $render['comments'] ?></p>
                                            </div>
                                            <?php if(isset($_SESSION['role_admin'])){ ?>
                                            <p><a class="text-danger" href="?act=delete_rating&rating_id=<?= $render['ratings_id'] ?>&products_id=<?= $_GET['product_id'] ?>">Xóa</a></p>
                                           <?php } ?>
                                        </div>
                                       <?php } ?>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="mb-4">Nhận xét về sản phẩm</h4>
                                        <form action="?act=post_comment&products_id=<?php if(isset($_GET['product_id'])){echo $_GET['product_id'];} ?>" method="POST">
                                            <div class="form-group">
                                                <label for="message">Đánh giá của bạn</label>
                                                <textarea id="message" cols="30" rows="5" class="form-control" name="index"></textarea>
                                            </div>
                                            <?php
                                        

                                            if (isset($_SESSION['error_cm'])) {
                                                if (time() - $_SESSION['error_cm_time'] > 5) {
                                                    unset($_SESSION['error_cm']);
                                                    unset($_SESSION['error_cm_time']);
                                                } else { ?>
                                                     <h5 class="text-danger"><?= $_SESSION['error_cm'] ?></h5>
                                             <?php   }
                                            }
                                            ?>
                                            <div class="form-group mb-0">
                                                <button class="btn btn-success" type="submit" name="cm">Gửi Đánh Giá</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Detail End -->
    <?php } ?>


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Có Thể Bạn Sẽ Thích</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                <?php foreach($data_products_recoment as $render_c){ ?>
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="<?= "./admin".$render_c['image'] ?>" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href="?act=products_detail&product_id=<?= $render_c['product_id']?>"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="?act=products_detail&product_id=<?= $render_c['product_id']?>" style="padding-left: 90px;"><?= $render_c['name'] ?></a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5><?= $render_c['price'] ?></h5>
                                <h6 class="text-muted ml-2"><del><?= $render_c['price']/0.2 ?></del></h6>
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
                <?php } ?>                 
            </div>
        </div>
    </div>
    <!-- Products End -->

    <?php require_once "menu/footer.php"; ?>
</body>


</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    function checkStock() {
        let selectedSize = $('input[name="size"]:checked').val();
        let selectedColor = $('input[name="color"]:checked').val();

        // Kiểm tra xem người dùng đã chọn đủ size và màu chưa
        if (selectedSize && selectedColor) {
            // Gửi AJAX đến server
            $.ajax({
                url: '<?= BASE_URL ?>?act=check_stock&products_id=<?= $_GET['product_id'] ?>', // Đường dẫn kiểm tra tồn kho
                method: 'POST',
                data: {
                    size: selectedSize,
                    color: selectedColor
                },
                success: function (response) {
                    $('#stock-message').text(response); // Hiển thị thông báo tồn kho
                },
                error: function () {
                    $('#stock-message').text('Lỗi xảy ra khi kiểm tra tồn kho.');
                }
            });
        } else {
            // Yêu cầu người dùng chọn đầy đủ
            $('#stock-message').text('Vui lòng chọn cả size và màu sắc.');
        }
    }

    // Gọi hàm khi thay đổi size hoặc màu
    $('input[name="size"], input[name="color"]').on('change', function () {
        checkStock();
    });
});
</script>
