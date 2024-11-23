
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
                    aria-expanded="false"
                  >
                    <div class="avatar-sm">
                      <img
                        src="assets/img/profile.jpg"
                        alt="..."
                        class="avatar-img rounded-circle"
                      />
                    </div>
                    <span class="profile-username">
                      <span class="op-7">Admin</span>
                      <span class="fw-bold"><?php if(isset($_SESSION['user'])){echo $_SESSION['user'];} ?></span>
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
                              class="avatar-img rounded"
                            />
                          </div>
                          <div class="u-text">
                            <h4><?php if(isset($_SESSION['user'])){echo $_SESSION['user'];} ?></h4>
                            <p class="text-muted">hello@example.com</p>
                            <a
                              href="profile.html"
                              class="btn btn-xs btn-secondary btn-sm"
                              >View Profile</a
                            >
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
                                        
                                    </tr>
                                  <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                    <?php
                    $current_page = isset($_GET['page']) && $_GET['page'] > 0 ? $_GET['page'] : 1;
                    ?>
                    <ul class="pagination">
                      
                        <li class="page-item <?php echo $current_page == 1 ? 'disabled' : ''; ?>">
                            <a class="page-link" href="?act=render_list_products&comment=<?= $_GET['comment']?>&page=<?php echo max(1, $current_page - 1); ?>">Trước</a>
                        </li>

                      
                        <?php
                        $start = max(1, $current_page - 2); 
                        $end = $current_page + 2;          
                        for ($i = $start; $i <= $end; $i++) {
                        ?>
                            <?php if(!empty($data_products)){ ?>
                                <li class="page-item <?php echo $i == $current_page ? 'active' : ''; ?>">
                                <a class="page-link" href="?act=render_list_products&comment=<?= $_GET['comment']?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                           <?php } ?>
                        <?php } ?>
                      <?php if(!empty($data_products)){ ?>
                        <li class="page-item">
                            <a class="page-link" href="?act=render_list_products&comment=<?= $_GET['comment']?>&page=<?php echo $current_page + 1; ?>">Sau</a>
                        </li>
                    <?php  }else{ ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="?act=render_list_products&comment=<?= $_GET['comment']?>&page=<?php echo $current_page + 1; ?>">Sau</a>
                        </li>
                    <?php } ?>
                    </ul>
                </nav>
                    </div>
                </div>
            </div>

            <?php require_once "menu/footer.php" ?>
