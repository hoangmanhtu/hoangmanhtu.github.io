<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?area=backend">Trang Chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh Sách Sản phẩm</li>
    </ol>
</nav>
<div style="margin: 10px 250px">
    <input style="padding: 22px 12px !important;" type="text" id="search_text" name="search_product" class="form-control" placeholder="Nhập từ khóa cần tìm kiếm .......">
</div>

<div align="right" style="margin:0px 0px 15px 0px;">
    <a class="btn btn-success" href="index.php?area=backend&controller=product&action=create"><i class="fa fa-plus"></i> Thêm Mới Sản Phẩm</a>
</div>

<?php
//echo "<pre>";
//    print_r($products);
//echo "</pre>";
?>
<div class="box box-success" id="order_table_text">

    <table class="table table-bordered">
        <thead>
        <tr class="table-active">
            <th scope="col">Mã</th>
            <th style="width: 20%;" scope="col">Tên Sản Phẩm</th>
            <th style="width: 15%;" scope="col">Avatar</th>
            <th style="width:15%;" scope="col">Giá</th>
            <th style="width:15%;" scope="col">% Khuyến Mại</th>
            <th style="width: 10%;" scope="col">Trạng thái</th>
            <th style="width: 12%;" scope="col">Ngày tạo</th>
            <th style="width: 18%;text-align: center"  scope="col">Chức năng </th>
        </tr>
        </thead>
        <tbody>

         <?php if (!empty($products)):?>

        <?php
             foreach ($products as $product):
            ?>
        <tr>
            <td><?php echo $product["id"];?></td>
            <td>
                <ul>
                    <li><?php echo $product["title"];  ?></li>
                    <li class="rating">
                        <?php
                        $rating=0;
                        if($product["total_rating"] > 0)
                        {
                            $rating=round($product["total_number_rating"]/ $product["total_rating"],2);
                        }
                        ?>
                        Đánh giá : <span>
                                <?php for($i=1;$i<=5;$i++): ?>
                                    <i class="fa fa-star <?php if( $i <= $rating) echo "active"; else  echo "" ?>"></i>
                                <?php endfor; ?>
                            </span>
                        <span style="font-size: 15px"> (<?php echo $rating; ?> )</span>
                    </li>
                </ul>

            </td>
            <td><?php if(!empty($product["avatar"])): ?>
                    <img height="70" width="130" src="assets/uploads/products/<?php echo $product["avatar"];?>" alt="">
                <?php endif;?>
            </td>
            <td><?php echo number_format($product["price"]); ?> đ</td>
            <td><?php echo number_format($product["discount"]); ?> %</td>
            <td><?php echo Helper::getStatusText($product["status"]) ?></td>
            <td><?php echo date('d/m/Y',strtotime($product["created_at"]));?></td>
            <td style="text-align: center">
                <?php
                $url_detail = "index.php?area=backend&controller=product&action=detail&id=" . $product['id'];
                $url_update = "index.php?area=backend&controller=product&action=update&id=" . $product['id'];
                $url_delete = "index.php?area=backend&controller=product&action=delete&id=" . $product['id'];
                ?>
                <a title="Chi tiết" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a> &nbsp;
                <a title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil"></i></a> &nbsp;
                <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Are you sure delete?')"><i
                        class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php  endforeach;?>
        <?php  else: ?>
        <tr>
            <td colspan="9">No data found</td>
        </tr>
        <?php endif;?>
    </table>
    <div align="center">
        <ul class='pagination text-center' id="pagination">
            <?php if($numPage == 1){
                return '';
            }
            ?>
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
                        <a class="page-link active" href="#"><?php echo $i; ?></a>
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
</div>

