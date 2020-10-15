<div class="slider mp-30">
    <div class="owl-carousel owl-theme" id="myCrousel">
        <div class="item">
            <img src="Assets/Frontend/images/slider1.jpg" alt="">
        </div>
        <div class="item">
            <img src="Assets/Frontend/images/slider2.jpg" alt="">
        </div>
        <div class="item">
            <img src="Assets/Frontend/images/slider3jpg.jpg" alt="">
        </div>
        <div class="item">
            <img src="Assets/Frontend/images/slider4.jpg" alt="">
        </div>
        <div class="item">
            <img src="Assets/Frontend/images/slider5.jpg" alt="">
        </div>
    </div>
</div>
<!-- end silder -->
<!-- category -->
<?php
    require_once "Mvc/frontend/controllers/CategoryController.php";
    $category=new CategoryController();
    $category->CategoryHot();
?>
<!-- endcategory -->
<?php
    require_once "Mvc/frontend/controllers/ProductController.php";
    $category=new ProductController();
    $category->ProductSelling();
?>
<div align=center class="all_product mt-30 mp-30">
    <a href="danh-sach-san-pham" class="submit-support"><i class="fa fa-hand-o-right"></i>  Xem toàn bộ sản phẩm</a>
</div>
<!-- slider category -->

<!-- modal -->
<!-- end modal  -->
<!-- div flex sdt -->
<strong><a class="hottline" href="tel:0395679339"><i class="fa fa-phone"></i> Hottline : <span> 039.567.9339</span></a></strong>
<!-- end flex sdt -->
<!-- supprot -->
<!-- hottline -->
<div class="support mt-50">
    <div class="container">
        <a href=""><img class="img-fuild" src="Assets/Frontend/images/support.jpg" alt="noithathoanmy.com"></a>
    </div>
</div>
<!-- endhottline -->
<!-- end support -->
<!-- product hot -->
<?php
    require_once "Mvc/frontend/controllers/ProductController.php";
    $products=new ProductController();
    $products->ProductNews();
    ?>
<!-- end product -->
<div class="product mt-50">
    <p class="product-title">TIN TỨC - SỰ KIỆN</p>
    <div class="mp-30 product-line "></div>
    <div class="container">
        <div class="row">
            <div class="hot-news">
                <div class="new-img">
                    <a href=""> <img src="Assets/Frontend/images/tintuc1.jpg" alt="noithathoanmy.com"></a>
                </div>
                <div class="news-content">
                    <h4><a href="" alt="">Biệt thự tại vinhome Hà Nội</a></h4>
                    <p>Mong muốn mang đến cho một nửa thế giới những điều tuyệt vời nhất, Nội thất Hoàn Mỹ triển khai chương trình ưu đãi “vàng” dành cho khách hàng kí Hợp đồng sản xuất – thi công trong thời gian từ 29/02 – 09/03/2020. Cụ thể trong thời
                        gian khuyến mãi, tất cả khách hàng …</p>
                </div>
            </div>
            <div class="both"></div>
            <div class="hot-news">
                <div class="new-img">
                    <a href=""><img src="Assets/Frontend/images/tintuc2.jpg" alt="noithathoanmy.com"></a>
                </div>
                <div class="news-content">
                    <h4><a href="" alt="">Biệt thự tại vinhome Long Biên</a></h4>
                    <p>Mong muốn mang đến cho một nửa thế giới những điều tuyệt vời nhất, Nội thất Hoàn Mỹ triển khai chương trình ưu đãi “vàng” dành cho khách hàng kí Hợp đồng sản xuất – thi công trong thời gian từ 29/02 – 09/03/2020. Cụ thể trong thời
                        gian khuyến mãi, tất cả khách hàng …</p>
                </div>
            </div>
            <div class="both"></div>
            <div class="hot-news">
                <div class="new-img">
                    <a href=""> <img src="Assets/Frontend/images/tintuc3.jpg" alt="noithathoanmy.com"></a>
                </div>
                <div class="news-content">
                    <h4><a href="" alt="">Biệt thự Eco Green</a></h4>
                    <p>Mong muốn mang đến cho một nửa thế giới những điều tuyệt vời nhất, Nội thất Hoàn Mỹ triển khai chương trình ưu đãi “vàng” dành cho khách hàng kí Hợp đồng sản xuất – thi công trong thời gian từ 29/02 – 09/03/2020. Cụ thể trong thời
                        gian khuyến mãi, tất cả khách hàng …</p>
                </div>
            </div>
            <div class="both"></div>
            <div class="hot-news">
                <div class="new-img">
                    <a href=""><img src="Assets/Frontend/images/tintuc4.jpg" alt="noithathoanmy.com"></a>
                </div>
                <div class="news-content">
                    <h4><a href="" alt="">Nhà vườn tại KĐT Nam An Khánh</a></h4>
                    <p>Mong muốn mang đến cho một nửa thế giới những điều tuyệt vời nhất, Nội thất Hoàn Mỹ triển khai chương trình ưu đãi “vàng” dành cho khách hàng kí Hợp đồng sản xuất – thi công trong thời gian từ 29/02 – 09/03/2020. Cụ thể trong thời
                        gian khuyến mãi, tất cả khách hàng …</p>
                </div>
            </div>
            <div class="both"></div>
        </div>
    </div>
</div>