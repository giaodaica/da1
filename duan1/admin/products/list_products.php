
<!DOCTYPE html>

<html lang="en">
<style>
    .pagination{
        padding-left: 900px !important;
    }
</style>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Trang admin</title>
    <meta
        content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
        name="viewport" />
    <link
        rel="icon"
        href="assets/img/kaiadmin/favicon.ico"
        type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["assets/css/fonts.min.css"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />
</head>

<body>
    <div class="wrapper">
    <?php require_once "menu/sidebar.php"; ?>
     

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img
                                src="assets/img/kaiadmin/logo_light.svg"
                                alt="navbar brand"
                                class="navbar-brand"
                                height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
               <!-- Navbar Header -->
            <?php require_once "menu/nav_bar.php" ?>
          <!-- End Navbar -->
            </div>

            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">FPL BEE</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="#">
                                    <i class="icon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Sản Phẩm</a>
                            </li>
                            <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Danh Sách Sản Phẩm</a>
                            </li>
                        </ul>
                    </div>
                    <div class="page-category">
                        <h1><a class="text-info" href="?act=new_products">Thêm Sản Phẩm Mới</a></h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tên Sản Phẩm</th>
                                    <th scope="col">Danh Mục</th>
                                    <th scope="col">Ảnh Mô Tả</th>
                                    <th scope="col">Mô Tả Sản Phẩm</th>
                                    <th scope="col">Giá Nhập</th>
                                    <th scope="col">Giá Bán</th>
                                    <th scope="col">Số Lượng Đã Bán</th>
                                    <th scope="col">Số Lượng Tồn Kho</th>
                                    <th scope="col">Trạng Thái Kho Hàng</th>
                                    <th scope="col">Comment</th>
                                    <th scope="col">Ngày Nhập</th>
                                    <th scope="col">Hành Đông</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                               <?php if(!isset($_GET['category_id']) || empty($_GET['category_id'])){ ?>
                                <?php foreach ($data_products as $list_products => $index) { ?>
                                    <?php if($index['comment'] == "1"){ ?>    
                                        <tr>
                                        <td><?= $index['name'] ?></td>
                                        <td><?= $index['category'] ?></td>
                                        <td><img src="<?= $index['image'] ?>" alt="" width="60"></td>
                                        <td><?= $index['mota'] ?></td>
                                        <td><?= number_format($index['gianhap']) ?></td>
                                        <td><?= number_format($index['price']) ?></td>
                                        <td><?= $index['Quantity_sold'] ?></td>
                                        <td><?= $index['stock_quantity'] ?></td>
                                        <td><?php if ($index['status'] == "Available") {
                                                echo "Còn Hàng";
                                            } else {
                                                echo "Hết Hàng";
                                            } ?></td>
                                        <td><?= $index['comment'] == 1 ? "Hiển Thị" : "Ẩn"; ?></td>
                                        <td><?= $index['ngaynhap']?></td>
                                        <td>
                                            <a href="?act=delete_products&products_id=<?= $index['product_id']?>">Xóa</a>
                                        </td>
                                        <td>
                                        <a href="?act=update_products&products_id=<?= $index['product_id']?>">Sửa</a>
                                        </td>
                                        <td>
                                            <a href="?act=render_list_variant&id=<?= $index['product_id'] ?>">Variant(<?= $index['variant_count'] ?>)</a>
                                        </td>
                                    </tr>
                                   <?php }else{ ?>
                                    <tr>
                                        <td><?= $index['name'] ?></td>
                                        <td><?= $index['category'] ?></td>
                                        <td><img src="<?= $index['image'] ?>" alt="" width="60"></td>
                                        <td><?= $index['mota'] ?></td>
                                        <td><?= number_format($index['gianhap']) ?></td>
                                        <td><?= number_format($index['price']) ?></td>
                                        <td><?= $index['Quantity_sold'] ?></td>
                                        <td><?= $index['stock_quantity'] ?></td>
                                        <td><?php if ($index['status'] == "Available") {
                                                echo "Còn Hàng";
                                            } else {
                                                echo "Hết Hàng";
                                            } ?></td>
                                        <td><?= $index['comment'] == 1 ? "Hiển Thị" : "Ẩn"; ?></td>
                                        <td><?= $index['ngaynhap']?></td>

                                        <td>
                                            <a href="?act=presently&products_id=<?= $index['product_id']?>">Hiện</a>
                                        </td>
                                        <td>
                                        <a href="?act=update_products&products_id=<?= $index['product_id']?>">Sửa</a>

                                        </td>
                                        <td>
                                            <a href="?act=delete&products_id=<?= $index['product_id']?>">Xóa Vĩnh Viễn</a>
                                        </td>
                                        <td>
                                            <a href="?act=render_list_variant&id=<?= $index['product_id'] ?>">Variant</a>
                                        </td>
                                    </tr>
                                  <?php } ?>
                                <?php } ?>
                              <?php }else { ?>
                                <?php foreach ($data_products as $list_products => $index) {
                                     ?>
                                    <?php if($index['comment'] == "1" && $index['category_id'] == $_GET['category_id']){ ?>    
                                        <tr>
                                        <td><?= $index['name'] ?></td>
                                        <td><?= $index['category'] ?></td>
                                        <td><img src="<?= $index['image'] ?>" alt="" width="60"></td>
                                        <td><?= $index['mota'] ?></td>
                                        <td><?= number_format($index['gianhap']) ?></td>
                                        <td><?= number_format($index['price']) ?></td>
                                        <td><?= $index['Quantity_sold'] ?></td>
                                        <td><?= $index['stock_quantity'] ?></td>
                                        <td><?php if ($index['status'] == "Available") {
                                                echo "Còn Hàng";
                                            } else {
                                                echo "Hết Hàng";
                                            } ?></td>
                                        <td><?= $index['comment'] == 1 ? "Hiển Thị" : "Ẩn"; ?></td>
                                        <td><?= $index['ngaynhap']?></td>
                                        <td>
                                            <a href="?act=delete_products&products_id=<?= $index['product_id']?>">Xóa</a>
                                        </td>
                                        <td>
                                        <a href="?act=update_products&products_id=<?= $index['product_id']?>">Sửa</a>
                                        </td>
                                        <td>
                                            <a href="?act=render_list_variant&id=<?= $index['product_id'] ?>">Variant(<?= $index['variant_count'] ?>)</a>
                                        </td>
                                    </tr>
                                   <?php }else{ ?>
                                     
                                  <?php } ?>
                                <?php } ?>
                               <?php   } ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                    <?php
                    $current_page = isset($_GET['page']) && $_GET['page'] > 0 ? $_GET['page'] : 1;
                    ?>
                    <ul class="pagination">
                      
                        <li class="page-item <?php echo $current_page == 1 ? 'disabled' : ''; ?>">
                            <a class="page-link" href="?act=render_list_products&comment=<?= $_GET['comment']?>&page=<?php echo max(1, $current_page - 1); ?><?php if(isset($_GET['category_id'])){echo "&category_id=".$_GET['category_id'];} ?>">Trước</a>
                        </li>

                      
                        <?php
                        $start = max(1, $current_page - 2); 
                        $end = $current_page + 2;          
                        for ($i = $start; $i <= $end; $i++) {
                        ?>
                            <?php if(!empty($data_products)){ ?>
                                <li class="page-item <?php echo $i == $current_page ? 'active' : ''; ?>">
                                <a class="page-link" href="?act=render_list_products&comment=<?= $_GET['comment']?>&page=<?php echo $i; ?><?php if(isset($_GET['category_id'])){echo "&category_id=".$_GET['category_id'];} ?>"><?php echo $i; ?></a>
                            </li>
                           <?php } ?>
                        <?php } ?>
                      <?php if(!empty($data_products)){ ?>
                        <li class="page-item">
                            <a class="page-link" href="?act=render_list_products&comment=<?= $_GET['comment']?>&page=<?php echo $current_page + 1; ?><?php if(isset($_GET['category_id'])){echo "&category_id=".$_GET['category_id'];} ?>">Sau</a>
                        </li>
                    <?php  }else{ ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="?act=render_list_products&comment=<?= $_GET['comment']?>&page=<?php echo $current_page + 1; ?><?php if(isset($_GET['category_id'])){echo "&category_id=".$_GET['category_id'];} ?>">Sau</a>
                        </li>
                    <?php } ?>
                    </ul>
                </nav>
                    </div>
                </div>
            </div>

            <?php require_once "menu/footer.php" ?>
