
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Trang admin</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    />
  <style>
    .btn-custom{
     margin-top: 26px;
      width: 100px;
      height: 40px;
    }
  </style>
    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
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
                  height="20"
                />
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
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
          >
            <div class="container-fluid">
              <nav
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
              >
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1">
                      <i class="fa fa-search search-icon"></i>
                    </button>
                  </div>
                  <input
                    type="text"
                    placeholder="Search ..."
                    class="form-control"
                  />
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

            
            <form action="?act=revenue" method="post" style="display: flex;">
                         
                                <div class="me-3">
                                    Từ ngày
                                    <input type="date" name="time_after" id="" class="form-control">
                                </div>
                                <div class="me-3">
                                    Tới ngày
                                    <input type="datetime-local" name="time_before" id="" class="form-control">
                                </div>
                          
                            <button class="btn btn-primary btn-custom">Xem</button>

                        </form>
                           <table class="table table-striped table-inverse table-responsive">
                           <h1>Doanh Thu</h1>
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Tổng Doanh Thu</th>
                                    <th>Số Dơn Hàng</th>
                                    <th>Số lượng sản phẩm bán được</th>
                                    <th>Lợi Nhuận</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $total = 0;
                                    $total_quantity = 0;
                                    foreach($data_sum as $render){
                                      $total += $render['total_amount'];
                                      $total_quantity += $render['total_quantity'];
                                    }  ?>
                                    <?php
                                    $total_t = 0;
                                    $total_d = 0;
                                    foreach($profit as $loinhuan){
                                      if($loinhuan['discount_percent'] > 0){
                                        $disc = ($loinhuan['price'] * $loinhuan['total_quantity']) * $loinhuan['discount_percent'];
                                        $total_d += $disc;
                                      }
                                      $loi = (($loinhuan['price'] * $loinhuan['total_quantity'])) - ($loinhuan['gianhap'] * $loinhuan['total_quantity']);
                                      $total_t += $loi;
                                    } ?>
                                      <tr>
                                        <td scope="row"><?= number_format($total) ?></td>
                                        <td><?= count($data_sum) ?></td>
                                        <td><?= $total_quantity ?></td>
                                        <td><?php echo $total_t - $total_d?></td>
                                    </tr>
                                </tbody>
                        </table>
                        <table class="table table-striped table-inverse table-responsive">
                           <h1>Đơn Hàng</h1>
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Số đơn thành công (đã xử lý , giao hàng thành công)</th>
                                    <th>Số đơn đang chờ xử lý</th>
                                    <th>Số đơn bị hủy</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $total_success = 0;
                                    $total_wait = 0;
                                    $total_cancel = 0;
                                    $rate = 0;
                                
                                    foreach($data_order as $render_order){
                                      if($render_order['status'] == "Chờ xử lý"){
                                        $total_wait++;
                                      } 
                                      if($render_order['status'] == "Đã hoàn tất" || $render_order['status'] == "Đã Xác Nhận" ){
                                        $total_success++;
                                      }
                                      if($render_order['status'] == "Đã hủy"){
                                        $total_cancel++;
                                      }
                                    }  ?>
                                      <tr>
                                        <td scope="row"><?= $total_success ?></td>
                                        <td><?= $total_wait ?></td>
                                        <td><?= $total_cancel ?></td>
                                    </tr>
                                </tbody>
                        </table>
                      
                    </div>
                </div> 

            </div>
      <?php require_once "menu/footer.php" ?>

          </div>
        </div>
