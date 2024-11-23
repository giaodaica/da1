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

                    <form class="form" action="?act=post_products" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="">Tên Sản Phẩm</label>
                          <input type="text" name="name" id="" class="form-control" placeholder="nhập tên sản phẩm" aria-describedby="helpId" >
                          <small id="helpId" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                          <label for="">Danh Mục</label>
                          <select class="form-control" name="category_id" id="">
                           <?php foreach($data_category as $category){ ?>
                             <option value="<?= $category['category_id'] ?>"><?= $category['name']; ?></option>
                          <?php } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="">Giá bán</label>
                          <input type="number" name="price" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                          <label for="">Giá Nhập</label>
                          <input type="number" name="gianhap" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                          <label for="">Số Lượng Nhập</label>
                          <input type="number" name="stock_quantity" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted"></small>
                        </div>
                       <div class="form-group">
                         <label for="">Trạng Thái</label>
                         <select class="form-control" name="status" id="">
                           <option value="Available">Còn hàng</option>
                           <option value="Unavailable">Hết Hàng</option>
                         </select>
                       </div>
                        <div class="form-group">
                          <label for="">Ẩn/Hiện</label>
                          <select class="form-control" name="comment" id="">
                            <option value="1">Hiện</option>
                            <option value="0">Ẩn</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="">Ảnh Sản Phẩm</label>
                          <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                          <label for="">Số lượng đã bán</label>
                          <input type="number" name="Quantity_sold" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                          <label for="">Mô Tả</label>
                          <input type="text" name="mota" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                          <label for="">Ngày Nhập</label>
                          <input type="date" name="date" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted"></small>
                        </div>
                        <button class="btn btn-primary" type="submit">Thêm sản phẩm</button>
                    </form>
                    </div>
                </div>
            </div>

            <?php require_once "menu/footer.php" ?>