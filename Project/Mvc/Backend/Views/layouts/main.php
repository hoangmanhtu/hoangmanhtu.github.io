<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trang Quản Trị Admin</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="Assets/backend/css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/backend/css/font-awesome.min.css">
    <link rel="stylesheet" href="Assets/backend/css/ionicons.min.css">
    <link rel="stylesheet" href="Assets/backend/css/AdminLTE.min.css">
    <link rel="stylesheet" href="Assets/backend/css/_all-skins.min.css">
    <link rel="stylesheet" href="Assets/backend/css/css.css">
    <link rel="stylesheet" href="Assets/backend/css/style.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<style>
</style>
<div class="wrapper">
     <?php require_once 'Mvc/Backend/views/layouts/header.php'; ?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="Assets/backend/images/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $_SESSION["user"]["fullname"]; ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active treeview menu-open">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span> Home </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Quản lý danh mục</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="index.php?area=backend&controller=category"><i class="fa fa-circle-o"></i> Danh sách danh mục</a></li>
                        <li><a href="index.php?area=backend&controller=category&action=create"><i class="fa fa-circle-o"></i> Thêm Danh Mục</a></li>

                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>NSX & Thương Hiệu</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="index.php?area=backend&controller=producer"><i class="fa fa-circle-o"></i> Danh sách NSX- TH</a></li>
                        <li><a href="index.php?area=backend&controller=producer&action=create"><i class="fa fa-circle-o"></i> Thêm mới NSX- TH</a></li>

                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-th"></i>
                        <span>Quản lý sản phẩm</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="index.php?area=backend&controller=product"><i class="fa fa-circle-o"></i> Danh sách Sản Phẩm</a></li>
                        <li><a href="index.php?area=backend&controller=product&action=create"><i class="fa fa-circle-o"></i> Thêm mới Sản phẩm</a></li>

                    </ul>
                </li>
                <li class="">
                    <a href="index.php?area=backend&controller=ShoppingCart"><i class="fa fa-shopping-bag"></i> Quản lý đơn hàng</a>
                </li>

<!--                <li class="treeview">-->
<!--                    <a href="#">-->
<!--                        <i class="fa fa-table"></i> <span>Support</span>-->
<!--                        <span class="pull-right-container">-->
<!--              <i class="fa fa-angle-left pull-right"></i>-->
<!--            </span>-->
<!--                    </a>-->
<!--                    <ul class="treeview-menu">-->
<!--                        <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>-->
<!--                        <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--                <li class="treeview">-->
<!--                    <a href="#">-->
<!--                        <i class="fa fa-edit"></i> <span>Quản lý tin tức</span>-->
<!--                        <span class="pull-right-container">-->
<!--              <i class="fa fa-angle-left pull-right"></i>-->
<!--            </span>-->
<!--                    </a>-->
<!--                    <ul class="treeview-menu">-->
<!--                        <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>-->
<!--                        <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>-->
<!--                        <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
                        <li><a href="index.php?area=backend&controller=user"><i class="fa fa-user"></i>Quản lý user</a></li>
                <li>
                    <a href="abc.html">
                        <i class="fa fa-table"></i> <span>Thống kê - Báo Cáo</span>

                    </a>
                </li>
                <li><a href="index.php?area=backend&controller=login&action=logout"  onclick="return confirm('Bạn có chắc chắn muốn đăng xuất không ?')"><i class="fa fa-book"></i> <span>Đăng xuất</span></a></li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <br>
                    <?php if (!empty($this->error)): ?>
                        <div class="alert alert-danger error_check">
                            <?php echo "<i class='fa fa-times'></i>" .$this->error; ?>
                        </div>
                    <?php endif ?>
                    <!-- Content Header (Page header) -->
                    <?php  if(isset($_SESSION['success'])): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo "<i class='fa fa-check'></i>" . $_SESSION["success"];
                        unset($_SESSION["success"]); ?>
                    </div>
                    <?php endif;?>
                    <?php  if(isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo "<i class='fa fa-times'></i>" .$_SESSION["error"];
                            unset($_SESSION["error"]); ?>
                        </div>
                    <?php endif;?>
            <!--        content -->

        <?php  echo $this->content; ?>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php require_once 'Mvc/Backend/views/layouts/footer.php'; ?>
</div>

<script src="Assets/backend/js/jquery.min.js"></script>
<script src="Assets/backend/js/bootstrap.min.js"></script>
<script src="Assets/backend/js/adminlte.min.js"></script>
<script src="Assets/backend/js/jquery.slimscroll.min.js"></script>
<script src="Assets/backend/js/dashboard2.js"></script>
<script src="Assets/backend/js/demo.js"></script>
<script src="Assets/backend/js/jquery.validate.min.js"></script>
<script src="Assets/backend/js/additional-methods.min.js"></script>
<script src="Assets/backend/js/validate_form.js"></script>
<script src="Assets/backend/js/search_product.js"></script>
<script src="assets/Backend/ckeditor/ckeditor.js"></script>
<script src="assets/Backend/js/script.js"></script>
</body>
</html>