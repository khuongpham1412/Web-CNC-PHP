<div id="wrapper">

<!-- Sidebar -->
<ul class="sidebar navbar-nav">
  <li class="nav-item active">
    <a class="nav-link" href="#">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Thống Kê</span>
    </a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-folder"></i>
      <span>Quản Lý</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <h6 class="dropdown-header">QUẢN LÝ</h6>
      <a class="dropdown-item" href="index.php?action=quanlysp">Quản Lý Sản Phẩm</a>
      <a class="dropdown-item" href="index.php?action=quanlydh">Quản Lý Đơn Hàng</a>
      <a class="dropdown-item" href="index.php?action=quanlykh">Quản Lý Khách Hàng</a>
      <a class="dropdown-item" href="#">Quản Lý Nhân Viên</a>
      <div class="dropdown-divider"></div>
      
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Charts</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="fas fa-fw fa-table"></i>
      <span>Tables</span></a>
  </li>
</ul>
<?php include("content.php"); ?>

<!-- /.content-wrapper -->

</div>