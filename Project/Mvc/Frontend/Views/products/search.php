    <div class="row">
            <?php if(!empty($products)):
                foreach($products as $product):
                    $product_title = $product['title'];
                    $product_slug = Helper::getSlug($product_title);
                    $product_id = $product['id'];
                    $product_link = "chi-tiet-san-pham/$product_slug/$product_id";
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 product-grid mt-20 mp-15">
                        <div class="product-img">
                            <a href=""> <img src="Assets/uploads/products/<?php echo $product["avatar"]; ?>" class="img-fluid" alt="noithathoanmy.com"></a>
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
                                    <span class="price-sale"> <?php echo number_format($product["price"]); ?> VND </span>
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
                <div class="container">
                    Không có sản phẩm nào !!!
                </div>
            <?php endif; ?>
    </div>
    <ul class='pagination justify-content-center' id="pagination">
        <?php if($numPage == 1):
            ?>
            <li class="page-item active" id="<?php echo $i ?>">
                <a class="page-link active" href="#"><?php echo $i; ?></a>
            </li>
        <?php endif; ?>
        <?php  if($page > 1):
            $prev_page=$page-1;
            ?>
            <li class="page-item" id="<?php echo $prev_page; ?>">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php endif; ?>
        <?php for($i=1;$i<= $numPage;$i++):
            if($i == $page): ?>
                <li class="page-item active" id="<?php echo $i ?>">
                    <p class="page-link active"><?php echo $i; ?></p>
                </li>
            <?php else: ?>
                <li class="page-item" id="<?php echo $i ?>">
                    <a class="page-link " href="#"><?php echo $i ?></a>
                </li>
            <?php endif;
        endfor; ?>
        <?php   if($page < $numPage ):
            $next_page=$page + 1;
            ?>
            <li class="page-item" id="<?php echo $next_page; ?>">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php endif;?>
    </ul>
    </div>
    </div>
    </div>

