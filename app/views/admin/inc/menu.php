<div class="page">
<div class="page-main">
<div class="header py-4">
  <div class="container">
    <div class="d-flex">
      <a class="header-brand" href="./">
        <img src="<?= BASE_URL; ?>/public/img/cgvlogo.png" class="header-brand-img" alt="Quản lý CGV">
      </a>
      <div class="d-flex order-lg-2 ml-auto">
        <div class="dropdown">
          <a href="<?= BASE_URL; ?>/index/logout" class="nav-link pr-0 leading-none" >
            <span class="avatar"><i class="fa fa-user 3x"></i></span>
            <span class="ml-2 d-none d-lg-block">
              <span class="text-default"><?= Session::getSession('fullname') ?></span>
              <small class="text-muted d-block mt-1">Đăng xuất</small>
            </span>
          </a>

        </div>
      </div>
      <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
        <span class="header-toggler-icon"></span>
      </a>
    </div>
  </div>
</div>
<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
  <div class="container">
    <div class="row align-items-center">
      
      <div class="col-lg order-lg-first">
        <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
          <li class="nav-item">
            <a href="<?= BASE_URL;?>/admin/listMovie" class="nav-link active"><i class="fa fa-home"></i> Home</a>
          </li>
          <li class="nav-item">
            <a href="<?= BASE_URL;?>/admin/listMovie" class="nav-link" ><i class="fa fa-film"></i> Phim</a>
          </li>
          <li class="nav-item dropdown">
            <a href="<?= BASE_URL;?>/admin/listCategory" class="nav-link"><i class="fa fa-ticket"></i> Thể loại</a>
          </li>
          <li class="nav-item">
            <a href="<?= BASE_URL;?>/admin/listUser" class="nav-link"><i class="fa fa-user"></i> Tài khoản</a>
          </li>
          <li class="nav-item">
            <a href="<?= BASE_URL;?>/admin/listOrder" class="nav-link"><i class="fa fa-shopping-cart"></i> Đơn hàng</a>
          </li>
        </ul>
      </div>

      

    </div>
  </div>
</div>