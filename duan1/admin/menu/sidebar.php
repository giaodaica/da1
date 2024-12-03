<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
  <div class="sidebar-logo">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark">
      <a href="<?= BASE_URL ?>" class="logo">
        <img
          src="assets/img/kaiadmin/logo.png"
          alt="navbar brand"
          class="navbar-brand"
          height="50" />
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
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <ul class="nav nav-secondary">
        <li class="nav-item active">
          <a
            data-bs-toggle="collapse"
            href="#dashboard"
            class="collapsed"
            aria-expanded="false">
            <i class="fas fa-home"></i>
            <p>Quản Trị</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="dashboard">
            <ul class="nav nav-collapse">
              <li>
                <a href="<?= BASE_URL_ADMIN ?>">
                  <span class="sub-item">Quay về trang chủ</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Công cụ</h4>
        </li>
 
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#submenu">
            <i class="fas fa-bars"></i>
            <p>Quản lý hàng</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="submenu">
            <ul class="nav nav-collapse">
              <li>
                <a data-bs-toggle="collapse" href="#subnav1">
                  <span class="sub-item">Quản lý danh mục</span>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="subnav1">
                  <ul class="nav nav-collapse subnav">
                    <li>
                      <a href="?act=list_category&status=presently">
                        <span class="sub-item">Danh Sách</span>
                      </a>
                    </li>
                    <li>
                      <a href="?act=category_an">
                        <span class="sub-item">Danh Mục Đã Ẩn</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li>
                <a data-bs-toggle="collapse" href="#subnav2">
                  <span class="sub-item">Quản lý sản phẩm</span>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="subnav2">
                  <ul class="nav nav-collapse subnav">
                    <li>
                      <a href="?act=render_list_products&comment=presently">
                        <span class="sub-item">Danh sách sản phẩm</span>
                      </a>
                    </li>
                    <li>
                      <a href="?act=render_list_products&comment=hidden">
                        <span class="sub-item">Sản phẩm đã ẩn</span>
                      </a>
                    </li>
                    <li>
                      <a href="?act=hidden_variant">
                        <span class="sub-item">Biến Thể Đã Ẩn</span>
                      </a>
                    </li>
                    <li>
                      <a href="?act=render_list_products">
                        <span class="sub-item"></span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li>
                <a href="#">
                  <span class="sub-item">Quản lý</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#sidebarUsers">
            <i class="fa fa-users"></i>
            <p>Quản lý User</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="sidebarUsers">
            <ul class="nav nav-collapse">
              <li>
                <a href="?act=list_users">
                  <span class="sub-item">Danh sách Users</span>
                </a>
              </li>
              <li>
                <a href="icon-menu.html">
                  <span class="sub-item"></span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#sidebarOrders">
            <i class="fa fa-cubes"></i>
            <p>Quản lý đơn hàng</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="sidebarOrders">
            <ul class="nav nav-collapse">
              <li>
                <a href="?act=list_orders">
                  <span class="sub-item">Danh sách đơn hàng</span>
                </a>
              </li>
              <li>
                <a href="icon-menu.html">
                  <span class="sub-item"></span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- End Sidebar -->