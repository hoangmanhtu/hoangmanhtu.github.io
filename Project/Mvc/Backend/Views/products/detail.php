<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?area=backend">Trang Chủ</a></li>
        <li class="breadcrumb-item"><a href="index.php?area=backend&controller=product">Danh sách sản phẩm</a></li>
        <li class="breadcrumb-item active" aria-current="page">Chi tiết sản phẩm mã : <?php echo $product["id"] ?></li>
    </ol>
</nav>
<!--    -->
<div class="box box-success">
<table class="table table-bordered">
    <tr>
        <th>Mã sản phẩm :</th>
        <td><?php echo $product['id']?></td>
    </tr>
    <tr>
        <th>Tên Sản phẩm :</th>
        <td><?php echo $product['title']?></td>
    </tr>
    <tr>
        <th>Danh mục sản phẩm :</th>
        <td><?php echo $product['category_name']?></td>
    </tr>
    <tr>
        <th>Thương hiệu or NSX :</th>
        <td><?php echo $product['producer_name']?></td>
    </tr>
    <tr>
        <th>Avatar :</th>
        <td>
            <?php if (!empty($product['avatar'])): ?>
                <img height="80" src="assets/uploads/products/<?php echo $product['avatar'] ?>"/>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Mô tả ảnh sản phẩm :</th>
        <td>
            <?php if (!empty($product_images)): ?>
                <?php foreach ($product_images as $key=>$value):?>
                    <img height="80" src="assets/uploads/product_images/<?php echo $value['avatar']; ?>"/>
                <?php endforeach; ?>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Giá sản phẩm :</th>
        <td><?php echo number_format($product['price']). ' đ'; ?></td>
    </tr>
    <tr>
        <th>Số Lượng :</th>
        <td><?php echo $product['quality']; ?></td>
    </tr>
    <tr>
        <th>% Khuyến Mại :</th>
        <td><?php echo $product['discount']; ?> %</td>
    </tr>
    <tr>
        <th>Mô tả ngắn :</th>
        <td><?php echo $product['summary']?></td>
    </tr>
    <tr>
        <th>Mô tả chi tiết sản phẩm</th>
        <td><?php echo $product['content']?></td>
    </tr>
    <tr>
        <th>Trạng thái sản phẩm :</th>
        <td><?php echo Helper::getStatusText($product['status']) ?></td>
    </tr>
    <tr>
        <th>Sản Phẩm Nổi Bật</th>
        <td><?php if(isset($product["hotproduct"]) && $product["hotproduct"]== 1 ): ?>
                <i class="fa fa-check"></i> Sản Phẩm Nổi Bật
            <?php else: ?>
                <div></div>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Ngày tạo: </th>
        <td><?php echo date('d/m/Y', strtotime($product['created_at'])) ?></td>
    </tr>
    <tr>
        <th>Ngày cập nhật cuối cùng :</th>
        <td><?php echo !empty($product['updated_at']) ? date('d/m/Y', strtotime($product['updated_at'])) : '--' ?></td>
    </tr>
</table>
    <div class="box-footer">
        <a href="index.php?area=backend&controller=product" class="btn btn-primary">Back</a>
    </div>

</div>