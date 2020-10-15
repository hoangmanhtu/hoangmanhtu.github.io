<div class="product mt-50">
    <p class="product-title">Sản phẩm bán chạy</p>
    <div class="product-line"></div>
    <div class="container">
        <div class="row">
            <?php if(!empty($products)):
                foreach($products as $product):
                    $product_title = $product['title'];
                    $product_slug = Helper::getSlug($product_title);
                    $product_id = $product['id'];
                    $product_link = "chi-tiet-san-pham/$product_slug/$product_id";
                    ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 product-grid mt-30 mp-15">
                        <div class="product-img">
                            <a href="<?php echo $product_link; ?>"> <img src="assets/uploads/products/<?php echo $product["avatar"] ?>" class="img-fluid" alt="noithathoanmy.com"></a>
                            <div class="product-icon">
                                <ul>

                                    <li><a href="<?php echo $product_link; ?>"><i class=" btn-icon fa fa-eye" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href=""><i class="btn-icon fa fa-heart-o" aria-hidden="true"></i></a>
                                    </li>
                                    <li> <a href="them-vao-gio-hang/<?php echo $product["id"];?>"><i class=" btn-icon fa fa-shopping-bag" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="<?php echo $product_link; ?>" class="title"><?php echo $product["title"]; ?></a></h3>
                            <?php
                            $rating=0;
                            if($product["total_rating"] > 0)
                            {
                                $rating=round($product["total_number_rating"]/ $product["total_rating"],2);
                            }
                            ?>
                            <ul class="list-star">
                                <?php for($i=1;$i<=5;$i++): ?>
                                    <li><i class="fa fa-star  <?php if( $i <= $rating) echo "star_active"; else  echo "" ?> "></i></li>
                                <?php endfor; ?>
                            </ul>
                            <p>
                                <?php if($product["discount"] > 0) : ?>
                                    <span class="price"><?php echo number_format($product["price"]-($product["price"]*($product["discount"]/100))); ?> VND</span>
                                    <span class="price-sale"> <?php echo number_format($product["price"]); ?>  </span>
                                <?php else: ?>
                                    <span class="price"><?php echo number_format($product["price"]); ?> VND
                        </span>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                    <!--  -->
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    Không có sản phẩm nào !!!
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>