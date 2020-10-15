<div class="header-top">
    <div class="container">
        <div class="flex-container">
            <div class="flex-left">
                <ul class="panel-header">
                    <li>
                        <a href="">Hoàn Mỹ Décor</a>
                    </li>
                    <li> | </li>
                    <li>
                        <a href="">Hoàn Mỹ Gallery</a>
                    </li>
                    <li> | </li>
                    <li>
                        <a href="">Nhà máy sản xuất Nội Thất </a>
                    </li>
                    <li> | </li>
                    <li><a href="">Cam kết sản phẩm và dịch vụ</a></li>
                </ul>
            </div>
            <div class="flex-right">
                <ul class="panel-header-user">

                    <?php if(!isset($_SESSION['user_account'])): ?>
                    <li>
                        <span class="icon"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;</span> <span><a href="dang-nhap">Đăng nhập</a></span></li>
                    <li> | </li>
                    <li><span class="icon"><i class="fa fa-key" aria-hidden="true"></i></span>&nbsp;<a href="dang-ky">Đăng ký</a></li>
                    <?php else : ?>
                    <li  class="user-login">
                        <a  href="lich-su-mua-hang"><i class="fa fa-user"></i>&nbsp;<?php echo  $_SESSION['user_account']["fullname"]; ?></a>
                    </li>
                        <li> | </li>
                    <li>
                        <a href="logout"><i class="fa fa-sign-out" ></i> Đăng xuất</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end-header -->
<div class="header-content pt-20 pb-20">
    <div class="container">
        <div class="row">
            <div id="logo" class="col-lg-3 col-md-12 col-sm-12 clearfix ">
                <img src="Assets/frontend/images/logo.png" alt="Nội thất hoàn mỹ">
            </div>
            <div class="col-lg-6 pt-10 col-md-12 col-sm-12">
                <ul class="menu">
                    <li>
                        <a href="">Trang Chủ</a>
                    </li>
                   <?php
                        require_once  "Mvc/Frontend/Controllers/CategoryController.php";
                        $category=new CategoryController();
                        $category->MenuCategory();
                   ?>
                    <li>
                        <a href="">Tin Tức</a>
                    </li>
                    <li>
                        <a href="">giới thiệu</a>
                    </li>
                    <li>
                        <a href="">liên hệ</a>
                    </li>
                </ul>
            </div>
            <div class="shopping col-lg-3 col-md-12 col-sm-12 pt-10">
                <ul class="panel-header-shopping">
                    <li><a href=""><i class="icon-search fa fa-search" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="icon-heart fa fa-heart-o" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="icon-shopping fa fa-shopping-bag" aria-hidden="true"></i></a>
                        <?php $total=0;
                        if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])):
                        {
                            foreach ($_SESSION["cart"] as $list)
                            {
                                $total +=$list["quality"];
                            }
                        }
                        ?>
                        <p class="cart_number"><?php echo $total; ?></p>
                        <?php else : ?>
                        <?php
                            endif;
                        ?>
                    </li>
                </ul>
                <!-- form search -->
                <div class="search hidden">
                    <form action="" method="POST">
                        <input type="text" placeholder="Tìm kiếm sản phẩm ..." id="search_product">
                        <a href=""><i class="submit-search fa fa-search" aria-hidden="true"></i></a>
                    </form>
                    <div id="result">
                        <?php
                            require_once  "Mvc/frontend/controllers/ProductController.php";
                            $obj=new ProductController();
                            $obj->searchProduct();
                        ?>
                    </div>
                </div>
                <!-- end form search -->
                <!-- shoping cart -->
                <?php  if(!empty($_SESSION["cart"])): ?>
                <div class="minicart hidden">
                    <div style="display: block; height: 300px; padding-top: 10px; overflow: auto;">
                    <?php

                    $total_cart=0;
                    $total_discount=0;
                    $total=0;
                    ?>
                    <?php
                    foreach ($_SESSION["cart"] as $product_id=> $cart):
                    $slug=Helper::getSlug($cart["name"]);
                    $url_detail="chi-tiet-san-pham/$slug/$product_id"; ?>
                    <div class="cart-minitab">
                        <div class="cart-img">
                            <a href="<?php echo $url_detail; ?>"><img class="img-fulid" src="assets/uploads/products/<?php echo $cart["avatar"]; ?>" alt="Nội thất hoàn mỹ"></a>
                        </div>

                        <div class="list-content">
                            <a style="font-weight: bold;" href="<?php echo $url_detail; ?>"><?php echo $cart["name"]; ?></a>
                            <p>Số lượng :  <?php echo $cart["quality"]; ?></p>
                            <p>Giá :
                                <?php
                                $total_item_discount1=($cart["price"] * ($cart["discount"]/100)) ;
                                $total_item1=$cart["price"] - $total_item_discount1;
                                echo number_format($total_item1);
                                ?>
                            VND
                            </p>

                            <p >
                                Thành tiền :
                                <?php
                                $total_item_discount=($cart["price"] * ($cart["discount"]/100)) * $cart["quality"] ;
                                $total_item=($cart["price"] * $cart["quality"]);
                                $total_product=$total_item-$total_item_discount;
                                echo number_format($total_product);
                                $total_cart += $total_item;
                                $total_discount += $total_item_discount;
                                $total +=$total_product;
                                ?>
                                VND
                            </p>
                        </div>
                        <div class="both"></div>
                    </div>
                    <div style="width: 100%;border-bottom: 1px solid #dadada;padding: 5px 0px"></div>
                    <?php endforeach; ?>
                    </div>
                       <p class="mt-10 mp-10" style="font-weight: bold;font-size: 14px;"> Tổng tiền thanh toán : <?php echo number_format($total); ?> VND </p>
                    <div class="cart-submit">
                        <a href="thanh-toan" class="submit-support3">Thanh toán</a>
                        <a href="gio-hang-cua-ban" class="submit-support3">Xem giỏ hàng</a>
                    </div>
                </div>
                <?php else: ?>
                <div class="minicart hidden">
                    <p style="text-align: center">Không có sản phẩm nào trong giỏ hàng</p>
                </div>

                <?php endif; ?>
                <!-- end shoping cart -->
            </div>
        </div>
    </div>
</div>