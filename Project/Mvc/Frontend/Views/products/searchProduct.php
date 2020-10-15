<?php if(!empty($products)): ?>
<ul class="result_product">
    <?php foreach ($products as $product):
            $product_title = $product['title'];
            $product_slug = Helper::getSlug($product_title);
            $product_id = $product['id'];
            $product_link = "chi-tiet-san-pham/$product_slug/$product_id";
            ?>
            <li>
                <div class="left">
                    <a href="<?php echo $product_link; ?>">
                        <img src="assets/uploads/products/<?php echo $product["avatar"] ?>" alt="<?php echo $product["title"]; ?>" />
                    </a>
                </div>
                <div class="right">
                    <h5><a href="<?php echo $product_link; ?>" class="title"><?php echo $product["title"]; ?></a></h5>
                    <p>
                        <?php if($product["discount"] > 0) : ?>
                            <span class="price"><?php echo number_format($product["price"]-($product["price"]*($product["discount"]/100))); ?> VND</span>
                            <span class="price-sale"> <?php echo number_format($product["price"]); ?>  VND</span>
                        <?php else: ?>
                            <span class="price"><?php echo number_format($product["price"]); ?> VND
                                    </span>
                        <?php endif; ?>
                    </p>
                </div>
                <div style="clear: both"></div>
            </li>
            <li class="center"></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <ul>
        <li style="text-align: center">Không có sản phẩm nào !!</li>
    </ul>
<?php endif; ?>


