
<?php
// print_r($data_catagori);

?>
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
                        <h1><a class="text-info" href="?act=add_category">Thêm Danh Mục Mới</a></h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tên Danh Mục</th>
                                    <th scope="col">Giới Hạn</th>
                                    <th scope="col">Ảnh Mô Tả</th>
                                    <th scope="col">Trạng Thái</th>
                                    <th scope="col">Hành Đông</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data_catagori as $list_cate => $index) {
                                    
                                    ?>
                                    <?php if($index['status'] == "0"){ ?>    
                                        <tr>
                                        <td><?= $index['category_name'] ?></td>
                                        <td><?= $index['only'] ?></td>
                                        <td><img src="<?= $index['image'] ?>" alt="" width="60"></td>
                                        <td><?= $index['status']== 1 ? "Hiện" : "Ẩn" ?></td>
                                        <td>
                                            <a href="?act=presently_category&category_id=<?= $index['category_id']?>">Hiện</a>
                                        </td>
                                        <td>
                                        <a href="?act=update_category&category_id=<?= $index['category_id']?>">Sửa</a>
                                        </td>
                                        <td><a href="?act=render_list_products&comment=presently&category_id=<?=  $index['category_id'] ?>">Xem Sản Phẩm(<?= $index['product_count'] ?>)</a></td>
                                    </tr>
                                   <?php }?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php require_once "menu/footer.php" ?>
