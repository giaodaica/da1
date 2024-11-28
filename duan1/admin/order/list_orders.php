<!DOCTYPE html>
<html lang="en">
<style>
    .total {
        display: flex;
        width: 499.6px;
        height: 106px;
        padding: 25px;
        border-radius: 10px;
        text-align: center;
        white-space: nowrap;
        /* Ngăn không cho xuống dòng */
    }

    .total-1 {
        margin-top: 20px;
        border: 1px solid black;
        display: flex;
        width: 699.6px;
        height: 106px;
        padding: 25px;
        border-radius: 10px;
        white-space: nowrap;
        /* Ngăn không cho xuống dòng */
    }

    .right {
        margin-left: 250px;
    }

    .left {
        margin-left: 20px;
    }

    .form-control {
        width: 600px !important;
    }

    .input-group {
        flex-wrap: nowrap !important;
    }

    .action {
        margin-left: 200px !important;
    }

    .action a {
        color: red !important;

    }

    ul {
        list-style: none;
        display: flex;
        gap: 20px;
        padding-top: 20px;
    }

    li {
        text-decoration: none;
        border-radius: 5px;
    }

    .menu-links {
        font-weight: bold;
        padding: 7px 15px;

    }

    a.menu-links:hover {
        color: blue !important;
        text-decoration: none;
    }

    .detail {
        color: blue;
        padding-top: 50px;
        padding-left: 365px;
    }

    td {
        white-space: nowrap;
    }

    a {
        white-space: nowrap;
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
                <nav
                    class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <nav
                            class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pe-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input
                                    type="text"
                                    placeholder="Search ..."
                                    class="form-control" />
                            </div>
                        </nav>

                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a
                                    class="dropdown-toggle profile-pic"
                                    data-bs-toggle="dropdown"
                                    href="#"
                                    aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img
                                            src="assets/img/profile.jpg"
                                            alt="..."
                                            class="avatar-img rounded-circle" />
                                    </div>
                                    <span class="profile-username">
                                        <span class="op-7">Admin</span>
                                        <span class="fw-bold"><?php if (isset($_SESSION['user'])) {
                                                                    echo $_SESSION['user'];
                                                                } ?></span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg">
                                                    <img
                                                        src="assets/img/profile.jpg"
                                                        alt="image profile"
                                                        class="avatar-img rounded" />
                                                </div>
                                                <div class="u-text">
                                                    <h4><?php if (isset($_SESSION['user'])) {
                                                            echo $_SESSION['user'];
                                                        } ?></h4>
                                                    <p class="text-muted">hello@example.com</p>
                                                    <a
                                                        href="profile.html"
                                                        class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">My Profile</a>
                                            <a class="dropdown-item" href="#">My Balance</a>
                                            <a class="dropdown-item" href="#">Inbox</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Account Setting</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="?act=logout">Logout</a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
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
                        <div class="Ctotal" id="">


                            <div class="">
                                <ul class="menu-list">
                                    <li><a class="menu-links" href="?act=list_orders">Tất cả</a></li>
                                    <li><a class="menu-links" href="?act=list_orders&action=<?php echo "Chờ Xử Lý "; ?>">Chờ xác nhận</a></li>
                                    <li><a class="menu-links" href="?act=list_orders&action=<?php echo "Đã Xác Nhận"; ?>">Đã xác nhận</a></li>
                                    <li><a class="menu-links" href="?act=list_orders&action=<?php echo "Đang giao hàng"; ?>">Đang giao hàng</a></li>
                                    <li><a class="menu-links" href="?act=list_orders&action=<?php echo "Đã Hoàn Tất"; ?>">Đã giao hàng</a></li>
                                    <li><a class="menu-links" href="?act=list_orders&action=<?php echo "Giao hàng thất bại"; ?>">Giao hàng thất bại</a></li>
                                    <li><a class="menu-links" href="?act=list_orders&action=<?php echo "Đã hủy"; ?>">Đã hủy</a></li>

                                </ul>
                            </div>
                            <?php if (!isset($_GET['action'])) { ?>
                                <?php foreach ($orders as $data_cart_item) { ?>
                                    <div class="total-1">

                                        <div class="time">
                                            Ngày Tạo :
                                            <?php
                                            if (!empty($data_cart_item)) {
                                                // Đảm bảo giá trị ngày giờ có định dạng phù hợp
                                                $orderDate = strtotime($data_cart_item['order_date']);
                                                echo date('d/m/Y H:i:s', $orderDate);
                                            }
                                            ?>
                                            <div class="total_cart">Tổng đơn : <?php if (!empty($data_cart_item)) {
                                                                                    echo number_format($data_cart_item['total_amount']);
                                                                                } ?>
                                                <div class="status">
                                                    <p
                                                        <?php switch ($data_cart_item['status']) {
                                                            case "Chờ xử lý":
                                                                echo "class='text-warning'";
                                                                break;
                                                            case "Đã hoàn tất":
                                                                echo "class='text-success'";
                                                                break;
                                                            case "Đã hủy":
                                                                echo "class='text-danger'";
                                                                break;
                                                            case "Đã Xác Nhận":
                                                                echo "class='text-info'";
                                                                break;
                                                        } ?>><?php echo $data_cart_item['status'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="detail"><a href="?act=detail&order_id=<?= $data_cart_item['order_id'] ?>" class="text-danger">Chi tiết</a></div>

                                    </div>
                                <?php } ?>

                                <nav aria-label="Page navigation example">
                                    <?php
                                    $current_page = isset($_GET['page']) && $_GET['page'] > 0 ? $_GET['page'] : 1;
                                    ?>
                                    <ul class="pagination">

                                        <li class="page-item <?php echo $current_page == 1 ? 'disabled' : ''; ?>">
                                            <a class="page-link" href="?act=list_orders&page=<?php echo max(1, $current_page - 1); ?>">Trước</a>
                                        </li>


                                        <?php
                                        $start = max(1, $current_page - 2);
                                        $end = $current_page + 2;
                                        for ($i = $start; $i <= $end; $i++) {
                                        ?>
                                            <?php if (!empty($orders)) { ?>
                                                <li class="page-item <?php echo $i == $current_page ? 'active' : ''; ?>">
                                                    <a class="page-link" href="?act=list_orders&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                                </li>
                                            <?php } ?>
                                        <?php } ?>
                                        <?php if (!empty($orders)) { ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?act=list_orders&page=<?php echo $current_page + 1; ?>">Sau</a>
                                            </li>
                                        <?php  } else { ?>
                                            <li class="page-item disabled">
                                                <a class="page-link" href="?act=list_orders&page=<?php echo $current_page + 1; ?>">Sau</a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </nav>

                        </div>

                    </div>
                </div>
            <?php  } else { ?>
                <form action="?act=confirm" method="post">
                    <table class="table">
                        <thead class="">
                            <tr>
                                <th scope="col"><input type="checkbox" id="checkAll" class="me-3">Tất Cả</th>
                                <th>Địa chỉ</th>
                                <th>Người nhận</th>
                                <th>Số điện thoại</th>
                                <th>Ngày đặt</th>
                                <th>Tổng Đơn</th>
                                <th>Voucher</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                                <th>Chi Tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($order_action as $render_action) {
                                   
                            ?>

                                <tr>
                                    <td>
                                        <input type="checkbox" class="item" name="checkbox[]" value="<?= $render_action['order_id'] ?>">
                                        <p class="d-inline-flex gap-1">
                                        <a class="btn btn-outline-success btn-sm" data-bs-toggle="collapse" href="#collapseExample<?= $render_action['order_id'] ?>" role="button" aria-expanded="false" aria-controls="collapseExample<?= $render_action['order_id'] ?>">
                                        <i class="bi bi-plus">xem thêm</i> 
                                        </a>
                                    </p>
                                    <div class="collapse" id="collapseExample<?= $render_action['order_id'] ?>">
                                        <div class="card card-body">
                                            <p>Email: <?= $render_action['email'] ?></p>
                                            <p>Ghi Chú: <?= $render_action['note'] ?></p>
                                            <p><a href="?act=update_info&order_id=<?= $render_action['order_id'] ?>">Sửa Thông Tin</a></p>
                                        </div>
                                    </div>
                                </td>
                                    <td><?= $render_action['recipient_address'] ?></td>
                                    <td><?= $render_action['recipient_name'] ?></td>
                                    <td><?= $render_action['recipient_phone'] ?></td>
                                    <td><?= $render_action['order_date'] ?></td>
                                    <td><?= number_format($render_action['total_amount']) ?></td>
                                    <td><?= ($render_action['discount_percent']*100). "%" ?></td>
                                    <?php switch ($render_action['status']) {
                                        case "Chờ xử lý":
                                            echo "<td class='text-warning'>Chờ Xử Lý</td>";
                                            break;
                                        case "Đã Xác Nhận":
                                            echo "<td class='text-info'>Đã Xác Nhận</td>";
                                            break;
                                        case "Đang giao hàng":
                                            echo "<td class='text-primary'>Đang giao hàng</td>";
                                            break;
                                        case "Đã hoàn tất":
                                            echo "<td class='text-success'>Giao hàng thành công</td>";
                                            break;
                                        case "Giao hàng thất bại":
                                            echo "<td class='text-danger'>Giao hàng thất bại</td>";
                                            break;
                                        case "Đã hủy":
                                            echo "<td class='text-danger'>Đã hủy</td>";
                                            break;
                                    } ?>
                                    <?php switch ($render_action['status']) {
                                        case "Chờ xử lý":
                                            echo "<td><a href='?act=delivery&order_id=" . $render_action['order_id'] . "&name=Đã Xác Nhận&action=" . $_GET['action'] . "' class='btn btn-primary'>Xác Nhận Đơn Hàng</a></td>";
                                            break;
                                        case "Đã Xác Nhận":
                                            echo "<td><a href='?act=delivery&order_id=" . $render_action['order_id'] . "&name=Đang giao hàng&action=" . $_GET['action'] . "' class='btn btn-primary'>Giao hàng</a></td>";
                                            break;

                                        case "Đang giao hàng":
                                            echo "<td>
                                              <a href='?act=delivery&order_id=" . $render_action['order_id'] . "&name=Đã hoàn tất&action=" . $_GET['action'] . "' class='btn btn-primary btn-sm'>Đã hoàn tất</a>
                                              
                                              <a href='?act=delivery&order_id=" . $render_action['order_id'] . "&name=Giao hàng thất bại&action=" . $_GET['action'] . "' class='btn btn-warning btn-sm'>Giao hàng thất bại</a>
                                              </td>";

                                            break;
                                    } ?>
                                    <th><a href="?act=detail_order&order_id=<?= $render_action['order_id'] ?>">Xem</a></th>
                                </tr>

                            <?php }
                            ?>

                        </tbody>

                    </table>
                    <nav aria-label="Page navigation example">
                        <?php
                                $current_page = isset($_GET['page']) && $_GET['page'] > 0 ? $_GET['page'] : 1;
                        ?>
                        <ul class="pagination">

                            <li class="page-item <?php echo $current_page == 1 ? 'disabled' : ''; ?>">
                                <a class="page-link" href="?act=list_orders&action=<?= $_GET['action']; ?>&page=<?php echo max(1, $current_page - 1); ?>">Trước</a>
                            </li>


                            <?php
                                $start = max(1, $current_page - 2);
                                $end = $current_page + 2;
                                for ($i = $start; $i <= $end; $i++) {
                            ?>
                                <?php if (!empty($order_action)) { ?>
                                    <li class="page-item <?php echo $i == $current_page ? 'active' : ''; ?>">
                                        <a class="page-link" href="?act=list_orders&action=<?= $_GET['action'] ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                            <?php if (!empty($order_action)) { ?>
                                <li class="page-item">
                                    <a class="page-link" href="?act=list_orders&action=<?= $_GET['action'] ?>&page=<?php echo $current_page + 1; ?>">Sau</a>
                                </li>
                            <?php  } else { ?>
                                <li class="page-item disabled">
                                    <a class="page-link" href="?act=list_orders&action=<?= $_GET['action'] ?>&page=<?php echo $current_page + 1; ?>">Sau</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </nav>
                    <?php
                                if (isset($_GET['action'])) {
                                    switch ($_GET['action']) {
                                        case "Chờ Xử Lý":
                                            echo "<input type='hidden' name='action_future' value='Đã Xác Nhận'>";
                                            break;
                                        case "Đã Xác Nhận":
                                            echo "<input type='hidden' name='action_future' value='Đang giao hàng'>";
                                            break;
                                        case "Đang giao hàng":
                                            echo "<input type='hidden' name='action_future' value='Đã hoàn tất'>";
                                            break;
                                    }
                                }
                    ?>
                    <?php if ($_GET['action'] != "Đã Hoàn Tất") { ?>
                        <button class="btn btn-success">xác nhận</button>
                    <?php } ?>
                </form>
            <?php  } ?>
            </div>

            <?php require_once "menu/footer.php" ?>
            <script>
                const checkAll = document.getElementById("checkAll");
                const checkboxes = document.querySelectorAll(".item");

                // Event listener for "Check All" checkbox
                checkAll.addEventListener("change", function() {
                    checkboxes.forEach((checkbox) => {
                        checkbox.checked = checkAll.checked;
                    });
                });

                // Event listener for individual checkboxes
                checkboxes.forEach((checkbox) => {
                    checkbox.addEventListener("change", function() {
                        if (!this.checked) {
                            checkAll.checked = false;
                        } else if ([...checkboxes].every((item) => item.checked)) {
                            checkAll.checked = true;
                        }
                    });
                });
            </script>