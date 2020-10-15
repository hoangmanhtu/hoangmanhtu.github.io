<div class="bread_category">
    <div class="container">
        <div class="col-sm-12">
            <div class="banner_noidung" style="text-align: center">
                <p class="title"><?php echo $product["title"] ?></p>
                <p style="text-align: center !important;border-top: 5px solid white;padding: 5px;width: 100px;margin: auto;"></p>
                <marquee>Siêu thị nội thất hoàn mỹ xin kính chào quý khách !</marquee>
            </div>
        </div>
    </div>
</div>
<div style="background-color: #d2d4d4;padding:7px 0px 5px 0px">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="bread">
                    <li>
                        <a href=""> <i class="fa fa-home"></i> Trang Chủ</a>
                    </li>
                    <li> / </li>
                    <li> <a href="danh-sach-san-pham">  Danh sách sản phẩm</a></li>
                    <li> / </li>
                    <?php
                    $category_name = $product['category_name'];
                    $category_slug = Helper::getSlug($category_name);
                    $category_id = $product['category_id'];
                    $category_link = "san-pham/$category_slug/$category_id/1";
                    ?>
                    <li><a href="<?php echo $category_link; ?>"><?php echo $product["category_name"];?></a></li>
                    <li> / </li>
                    <li class="active"><?php echo $product["title"]; ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="mt-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12 ">
                <div class="product-img-detail">
                    <marquee direction="left" style="">Bạn cần hỗ trợ xin vui lòng liên hệ Hotline : 039.567.9339</marquee>
                    <img src="assets/uploads/products/<?php echo $product["avatar"];?>" id="img-main" alt="">
                    <ul class="img-summary">
                        <?php foreach ($product_images as $product_image) :
                        if($product_image["product_id"] == $product["id"]) :
                        ?>
                        <li>
                            <img src="assets/uploads/product_images/<?php echo $product_image["avatar"]; ?>" alt="noithathoanmy.com" id="<?php echo $product_image["id"]; ?>" onclick="changeImage('<?php echo $product_image["id"];?>')">
                        </li>
                        <?php
                        endif;
                        endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="product-detail col-lg-6 col-sm-12">
                <p class="title"><?php echo $product["title"]; ?></p>

                <ul class="list-star">
                    <?php
                    $rating=0;
                    if($product["total_rating"] > 0)
                    {
                        $rating=round($product["total_number_rating"]/ $product["total_rating"],2);
                    }
                    ?>
                    <?php for($i=1;$i<=5;$i++): ?>
                    <li><i class=" <?php if( $i <= $rating) echo "star_active"; else  echo "" ?> fa fa-star"></i></li>
                    <?php endfor; ?>
                    <li>(<?php echo $product["total_rating"]; ?>) người đánh giá</li>
                </ul>
                <p>
                    <?php if($product["discount"] > 0) : ?>
                        <span class="price"><?php echo number_format($product["price"]-($product["price"]*($product["discount"]/100))); ?> VND</span>
                        <span class="price-sale"> <?php echo number_format($product["price"]); ?> VND  </span>
                    <?php else: ?>
                        <span class="price"><?php echo number_format($product["price"]); ?> VND
                            </span>
                    <?php endif; ?>
                </p>
                <p>Thương hiệu : <span class="producer"><?php echo $product["producer_name"]; ?></span></p>
                <p>Mô tả ngắn sản phẩm :</p>
                <p style="color: grey; margin-left: 10px;"><?php echo $product["summary"]; ?></p>
                <div class="line"></div>
                <p>Bảo hành 3 năm về sản phẩm. Bảo trì trọn đời sản phẩm. <span><a href="">Tìm hiểu</a></span>
                </p>
                <p>Xem mẫu sản phẩm thực tế. <span><a href="">Địa chỉ hệ thống showroom</a></span> </p>
                <div class="shopping mt-20">
                    <a href="them-vao-gio-hang/<?php echo $product["id"];?>" class="submit-support">Đặt mua và giao hàng tận nơi</a>
                    <!-- <span class="heart"><a  href=""><i class="icon-heart fa fa-heart-o" aria-hidden="true"></i></a></span> -->
                </div>
                <div class="lienhe">
                    <p>Gọi đặt mua: <span><a href="tel:0395679339"> 039.567.9339</a></span> (09:30-22:00) </p>
                    <div class="footer-support mt-20">
                        <input type="text" id="fullname" placeholder="Vui lòng nhập số điện thoại ">
                    </div>
                    <input value="GỌI CHO TÔI" type="submit" class="submit-support">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-detail-content mt-50 mp-30">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <button class="submit-support">Thông tin sản phẩm</button>
                <div class="content">
                    <?php echo $product["content"] ?>
                </div>
            </div>
        </div>
    </div>
</div>