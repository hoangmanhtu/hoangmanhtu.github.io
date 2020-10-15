<div class="category mt-50">
    <div class="product-title">Danh Mục tiêu biểu</div>
    <div class="product-line"></div>
    <div class="container">
        <div class="row">
            <?php if(!empty($category)):
                foreach ($category as $category):
                    $category_name = $category['name'];
                    $category_slug = Helper::getSlug($category_name);
                    $category_id = $category['id'];
                    $category_link = "san-pham/$category_slug/$category_id/1";
                ?>
            <div class="col-sm-2 category-title mt-20">
                <a href="<?php echo $category_link; ?>"><img class="img-fluid img-category" src="Assets/uploads/categories/<?php echo $category["avatar"] ?>" alt="noithathoanmy.com"></a>
                <div class="category-content mt-10">
                    <h3><a href=""><?php echo $category["name"]; ?></a></h3>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else : ?>
            <div style="text-align: center;"> <?php echo "Không có danh mục nào hot" ?></div>
            <?php  endif; ?>
        </div>
    </div>
</div>