<style>
    select {
      width: 200px;
      padding: 5px;
    }
    option {
      padding: 5px;
    }
    option[data-color="red"] { background-color: #ff0000; color: #fff; }
    option[data-color="yellow"] { background-color: yellow; color: #000000; }
    option[data-color="orange"] { background-color: #ffa500; color: #fff; }
    option[data-color="green"] { background-color: #008000; color: #fff; }
    option[data-color="blue"] { background-color: #0000ff; color: #fff; }
    option[data-color="indigo"] { background-color: #4b0082; color: #fff; }
    option[data-color="violet"] { background-color: #8a2be2; color: #fff; }
    option[data-color="black"] { background-color: #000000; color: #fff; }
    option[data-color="cyan"] { background-color: #00ffff; color: #000; }
</style>
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

            <form action="?act=post_insert_voucher" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="">Tên voucher</label>
                  <input type="text" name="code" id="" class="form-control" placeholder="" aria-describedby="helpId"  >
                  <small id="helpId" class="text-muted">Help text</small>
                </div>
                <div class="form-group">
                  <label for="">% giảm</label>
                  <input type="text" name="discount_percent" id="" class="form-control" placeholder="" aria-describedby="helpId">
                  <small id="helpId" class="text-muted">Help text</small>
                </div>
                <div class="form-group">
                  <label for="">Số lượng</label>
                  <input type="text" name="quantity" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                  <label for="">Giá trị đơn tối thiểu</label>
                  <input type="text" name="minimum" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                
        <button class="btn btn-primary">thêm mới</button>
            </form>

            </div>
          </div>
        </div>

      <?php require_once "menu/footer.php" ?>