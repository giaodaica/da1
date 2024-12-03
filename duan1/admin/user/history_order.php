<?php
// print_r($data_order);
?>
<!DOCTYPE html>
<html lang="en">

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
                        <h4 class="page-title">Dashboard</h4>
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
                                <a href="#">Pages</a>
                            </li>
                            <li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">Starter Page</a>
                            </li>
                        </ul>
                    </div>
                    <div class="page-category">
                        <hr>

                        <?php if (!empty($data_order)) { ?>


                            <div
                                class="table-responsive">

                                <table
                                    class="table table-striped table-hover table-borderless table align-middle">

                                    <thead class="table">

                                        <caption>
                                            Lịch Sử Mua Hàng
                                        </caption>
                                        <tr>
                                            <th>Tên khách hàng</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>Voucher</th>
                                            <th>Tổng giá trị</th>
                                            <th>Thời gian đặt</th>
                                            <th>Trạng thái</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <?php foreach ($data_order as $render) { 
                                          
                                        ?>
                                            <tr class="table">
                                                <td scope="row"><?= $render['recipient_name'] ?></td>
                                                <td scope="row"><?= $render['recipient_phone'] ?></td>
                                                <td scope="row"><?= $render['recipient_address'] ?></td>
                                                <td scope="row"><?= ($render['discount_percent']*100)."%" ?></td>
                                                <td scope="row"><?= number_format($render['total_amount']) ?></td>
                                                <td scope="row"><?= $render['order_date'] ?></td>
                                                <td scope="row">
                                                    <?php switch ($render['status']) {
                                                        case "Chờ xử lý":
                                                            echo "<p class = 'text-warning'>Chờ Xử Lý</p>";
                                                            break;
                                                        case "Đã hoàn tất":
                                                            echo "<p class = 'text-success'>Đã Giao Hàng</p>";
                                                            break;
                                                        case "Đã hủy":
                                                            echo "<p class = 'text-danger'>Đã hủy</p>";
                                                            break;
                                                        case "Đã Xác Nhận":
                                                            echo "<p class = 'text-info'>Đã xác nhận</p>";
                                                            break;
                                                    } ?>
                                                </td>
                                                <td scope="row"><a href="?act=detail_order&id_order=<?= $render['order_id'] ?>">Chi tiết</a></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                        <?php } else {
                            echo "<h1>KHÁCH CHƯA MUA HÀNG</h1>";
                        } ?>


                    </div>
                </div>
            </div>

            <?php require_once "menu/footer.php" ?>