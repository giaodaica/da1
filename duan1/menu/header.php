
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center" style="padding-right: 100px;">
                    <?php
                    if(isset($data_Gift) && !empty($data_Gift)){?>
                        <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-bell text-primary"> <?php echo count($data_Gift) ?></i></a>
                        <div class="dropdown-menu rounded-0 border-0 m-0 custom-dropdown">
                            <label class="dropdown-item" style="font-weight: bold;">Voucher Của Bạn</label>
                           <?php foreach($data_Gift as $Gift){ ?>
                            <a href="?act=shop" class="dropdown-item"><?= $Gift['code']."(-".$Gift['discount_percent']*100?>%) Mua sắm ngay!!</a> 
                          <?php } ?>
                        </div>
                    </div>
                    <?php } elseif (isset($_SESSION['user']) && empty($data_Gift)){ ?>
                        <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-bell text-primary"></i></a>
                        <div class="dropdown-menu rounded-0 border-0 m-0 custom-dropdown">
                            <label class="dropdown-item" style="font-weight: bold;">Voucher Của Bạn</label>
                            <a href="?act=shop" class="dropdown-item <?php echo "nav-link disabled"?>">Bạn đã sử dụng hết voucher!!</a> 
                        </div>
                    </div>
                     <?php } else{ ?>
                        <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-bell text-primary"></i></a>
                        <div class="dropdown-menu rounded-0 border-0 m-0 custom-dropdown">
                            <label class="dropdown-item" style="font-weight: bold;">Voucher Của Bạn</label>
                            <a href="?act=register" class="dropdown-item <?php if(isset($_SESSION['role_admin'])){echo "nav-link disabled";} ?>" >Đăng ký thành viên để nhận nhiều ưu đãi</a> 
                        </div>
                    </div>
                       <?php  }?>
                    <?php
                    if (isset($_SESSION['user'])) { ?>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"><?php if (isset($_SESSION['user'])) {
                                                                                                                            echo $_SESSION['user'];
                                                                                                                        } ?></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <?php if (isset($_SESSION['role_customers'])) { ?>
                                    <button class="dropdown-item" type="button"><a class="text-dark" href="?act=info">Truy Cập Bee member</a></button>
                                    <button class="dropdown-item" type="button"><a class="text-dark" href="?act=history_shop">Đơn hàng của tôi</a></button>
                                <?php  } ?>
                                <?php if (isset($_SESSION['role_admin'])) { ?>
                                    <button class="dropdown-item" type="button"><a class="text-dark" href="?act=admin">Admin</a></button>
                                <?php  } ?>
                                <?php if (isset($_SESSION['role_epl']) && !empty($_SESSION['role_epl'])) { ?>
                                    <button class="dropdown-item" type="button"><a class="text-dark" href="?act=admin">Nhân Viên</a></button>
                                <?php  } ?>
                                <button class="dropdown-item" type="button"><a class="text-dark" href="?act=logout">Đăng Xuất</a></button>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Tài Khoản</button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" type="button"><a class="text-dark" href="?act=login">Đăng Nhập</a></button>
                                <button class="dropdown-item" type="button"><a class="text-dark" href="?act=register">Đăng Ký</a></button>
                                <button class="dropdown-item" type="button"><a class="text-dark" href="?act=select_history_order">Tra Cứu Đơn Hàng</a></button>
                            </div>
                        </div>
                    <?php  } ?>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="<?= BASE_URL ?>" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">FPL</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Bee</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="?act=search" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm sản phẩm" name="key">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Danh Mục</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <!-- áo -->
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Áo<i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <?php
                                foreach ($d as $categories) { ?>
                                    <?php if ($categories->only == 0) { ?>
                                        <a href="?act=s&s=<?= $categories->name ?>" class="dropdown-item"><?= $categories->name ?></a>
                                    <?php } ?>
                                <?php }
                                ?>
                            </div>
                        </div>
                        <!-- end áo -->
                        <!-- quần -->
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Quần<i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <?php
                                foreach ($d as $categories) { ?>
                                    <?php if ($categories->only == 1) { ?>
                                        <a href="?act=s&s=<?= $categories->name ?>" class="dropdown-item"><?= $categories->name ?></a>
                                    <?php } ?>
                                <?php }
                                ?>
                            </div>
                        </div>
                        <!-- end quần -->
                        <!-- đồ ngủ -->
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Bộ Đồ Ngủ<i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <?php
                                foreach ($d as $categories) { ?>
                                    <?php if ($categories->only == 2) { ?>
                                        <a href="?act=s&s=<?= $categories->name ?>" class="dropdown-item"><?= $categories->name ?></a>
                                    <?php } ?>
                                <?php }
                                ?>
                            </div>
                        </div>
                        <!-- end đồ ngủ -->
                        <!-- đồ thể thao -->
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Đồ Thể Thao<i class="fa fa-angle-right float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <?php
                                foreach ($d as $categories) { ?>
                                    <?php if ($categories->only == 5 || $categories->only == 4) { ?>
                                        <a href="?act=s&s=<?= $categories->name ?>" class="dropdown-item"><?= $categories->name ?></a>
                                    <?php } ?>
                                <?php }
                                ?>
                            </div>
                        </div>
                        <!-- end đồ thể thao -->

                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="<?= BASE_URL ?>" class="nav-item nav-link active">Trang Chủ</a>
                            <a href="?act=shop" class="nav-item nav-link">Cửa hàng</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Tra cứu <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="?act=shoping-Cart" class="dropdown-item">Giỏ Hàng</a>
                                    <?php if(isset($_SESSION['user'])){ ?>
                                        <a href="?act=history_shop" class="dropdown-item">Lịch Sử Mua Hàng</a>
                              <?php  }else { ?>
                                <a href="?act=select_history_order" class="dropdown-item">Lịch Sử Mua Hàng</a>
                             <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="?act=shoping-Cart" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"><?php if(isset($_SESSION['cart'])){echo count($_SESSION['cart']);} ?></span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->