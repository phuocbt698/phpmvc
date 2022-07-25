<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=_URL_ . '/public/admin/accsset/'?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link <?=($title == 'dashboard') ? 'active' : ''?>">
              <i class="fas fa-tachometer-alt" style="margin-right: 5px;"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item <?=($title == 'banner') ? 'menu-open' : ''?>">
            <a href="<?=_URL_ . '/admin/banner'?>" class="nav-link <?=($title == 'banner') ? 'active' : ''?>">
            <i class="fas fa-solid fa-images" style="margin-right: 5px;"></i>
              <p>Banner
              <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=_URL_ . '/admin/banner'?>" class="nav-link <?=($title == 'category' && $action == '') ? 'active' : ''?>">
                <i class="fas fa-list" style="margin-right: 5px;"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=_URL_ . '/admin/banner/create'?>" class="nav-link <?=($title == 'category' && $action == 'create') ? 'active' : ''?>">
                <i class="fas fa-plus-circle" style="margin-right: 5px;"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?=($title == 'category') ? 'menu-open' : ''?>">
            <a href="<?=_URL_ . '/admin/category'?>" class="nav-link <?=($title == 'category') ? 'active' : ''?>">
              <i class="fas fa-grip-horizontal" style="margin-right: 5px;"></i>
              <p>Category
              <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=_URL_ . '/admin/category'?>" class="nav-link <?=($title == 'category' && $action == '') ? 'active' : ''?>">
                <i class="fas fa-list" style="margin-right: 5px;"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=_URL_ . '/admin/category/create'?>" class="nav-link <?=($title == 'category' && $action == 'create') ? 'active' : ''?>">
                <i class="fas fa-plus-circle" style="margin-right: 5px;"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?=($title == 'product') ? 'menu-open' : ''?>">
            <a href="<?=_URL_ . '/admin/product'?>" class="nav-link <?=($title == 'product') ? 'active' : ''?>">
            <i class="fas fa-cubes" style="margin-right: 5px;"></i>
              <p>Products
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=_URL_ . '/admin/product'?>" class="nav-link <?=($title == 'product' && $action == '') ? 'active' : ''?>">
                <i class="fas fa-list" style="margin-right: 5px;"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=_URL_ . '/admin/product/create'?>" class="nav-link <?=($title == 'product' && $action == 'create') ? 'active' : ''?>">
                <i class="fas fa-plus-circle" style="margin-right: 5px;"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=_URL_ . '/admin/product/attribute'?>" class="nav-link <?=( $title == 'product' && $action == 'attribute') ? 'active' : ''?>">
                <i class="fas fa-magnet" style="margin-right: 5px;"></i>
                  <p>Thêm mới thuộc tính</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?=($title == 'order') ? 'menu-open' : ''?>">
            <a href="<?=_URL_ . '/admin/order'?>" class="nav-link <?=($title == 'order') ? 'active' : ''?>">
            <i class="fas fa-cart-plus" style="margin-right: 5px;"></i>
              <p>Order
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=_URL_ . '/admin/order'?>" class="nav-link <?=($title == 'order' && $action == '') ? 'active' : ''?>">
                <i class="fas fa-list" style="margin-right: 5px;"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=_URL_ . '/admin/order/create'?>" class="nav-link <?=($title == 'order' && $action == 'create') ? 'active' : ''?>">
                <i class="fas fa-plus-circle" style="margin-right: 5px;"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?=($title == 'user') ? 'menu-open' : ''?>">
            <a href="<?=_URL_ . '/admin/user'?>" class="nav-link <?=($title == 'user') ? 'active' : ''?>">
            <i class="fas fa-user-shield" style="margin-right: 5px;"></i>
              <p>Admin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=_URL_ . '/admin/user'?>" class="nav-link <?=($title == 'user' && $action == '') ? 'active' : ''?>">
                <i class="fas fa-list" style="margin-right: 5px;"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=_URL_ . '/admin/user/create'?>" class="nav-link <?=($title == 'user' && $action == 'create') ? 'active' : ''?>">
                <i class="fas fa-plus-circle" style="margin-right: 5px;"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?=($title == 'role') ? 'menu-open' : ''?>">
            <a href="<?=_URL_ . '/admin/role'?>" class="nav-link <?=($title == 'role') ? 'active' : ''?>">
            <i class="fas fa-shield-alt" style="margin-right: 5px;"></i>
              <p>Role
              <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=_URL_ . '/admin/role'?>" class="nav-link <?=($title == 'role' && $action == '') ? 'active' : ''?>">
                <i class="fas fa-list" style="margin-right: 5px;"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=_URL_ . '/admin/role/create'?>" class="nav-link <?=($title == 'role' && $action == 'create') ? 'active' : ''?>">
                <i class="fas fa-plus-circle" style="margin-right: 5px;"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?=($title == 'customer') ? 'menu-open' : ''?>">
            <a href="<?=_URL_ . '/admin/customer'?>" class="nav-link <?=($title == 'customer') ? 'active' : ''?>">
            <i class="fas fa-users" style="margin-right: 5px;"></i>
              <p>Customer
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=_URL_ . '/admin/customer'?>" class="nav-link <?=($title == 'customer' && $action == '') ? 'active' : ''?>">
                <i class="fas fa-list" style="margin-right: 5px;"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=_URL_ . '/admin/customer/create'?>" class="nav-link <?=($title == 'customer' && $action == 'create') ? 'active' : ''?>">
                <i class="fas fa-plus-circle" style="margin-right: 5px;"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?=_URL_ . '/admin/login/logout'?>" class="nav-link">
            <i class="fas fa-sign-out-alt" style="margin-right: 5px;"></i>
              <p>Logout</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>