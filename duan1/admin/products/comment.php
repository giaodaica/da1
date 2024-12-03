
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
            <table class="table">
                <thead>
                    <tr>
                        <th>Tên Khách Hàng</th>
                        <th>Nội Dung</th>
                        <th>Thời gian đăng</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                   <?php foreach($data_comment as $render){ 
                    ?>
                    <tr>
                        <td scope="row"><?= $render['full_name'] ?></td>
                        <td><?= $render['comments'] ?></td>
                        <td><?= $render['rating_date'] ?></td>
                        <td><a href="<?= BASE_URL ?>?act=products_detail&product_id=<?= $render['product_id']?>">Xem</a></td>
                    </tr>
                  <?php } ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                    <?php
                    $current_page = isset($_GET['page']) && $_GET['page'] > 0 ? $_GET['page'] : 1;
                    ?>
                    <ul class="pagination">
                      
                        <li class="page-item <?php echo $current_page == 1 ? 'disabled' : ''; ?>">
                            <a class="page-link" href="?act=list_comment&page=<?php echo max(1, $current_page - 1); ?>">Trước</a>
                        </li>

                      
                        <?php
                        $start = max(1, $current_page - 2); 
                        $end = $current_page + 2;          
                        for ($i = $start; $i <= $end; $i++) {
                        ?>
                            <?php if(!empty($data_comment)){ ?>
                                <li class="page-item <?php echo $i == $current_page ? 'active' : ''; ?>">
                                <a class="page-link" href="?act=list_comment&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                           <?php } ?>
                        <?php } ?>
                      <?php if(!empty($data_comment)){ ?>
                        <li class="page-item">
                            <a class="page-link" href="?act=list_comment&page=<?php echo $current_page + 1; ?>">Sau</a>
                        </li>
                    <?php  }else{ ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="?act=list_comment&page=<?php echo $current_page + 1; ?>">Sau</a>
                        </li>
                    <?php } ?>
                    </ul>
                </nav>
            </div>
          </div>
        </div>

      <?php require_once "menu/footer.php" ?>