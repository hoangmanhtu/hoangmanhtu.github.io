<?php
$total_cart=0;
$total_discount=0;
$total=0;
$total_product=0;
?>
<div class="container mt-30 mp-30">
    <div class="row">
        <div class="col-sm-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="lich-su-mua-hang">Danh sách đơn hàng</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chi Tiết Đơn Hàng</li>
                </ol>
            </nav>
<!--            -->
            <table class="table table-bordered" style="text-align: center;">
                <tr>
                    <th style="text-align: center;">Tên Sản Phẩm</th>
                    <th style="text-align: center;">Đơn giá</th>
                    <th style="text-align: center;">Số Lượng</th>
                    <th style="text-align: center;"> % Khuyến Mại</th>
                    <th style="text-align: center;">Thành Tiền</th>
                </tr>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product):
                        $product_id=$product["product_id"];
                        $slug=Helper::getSlug($product["product_name"]);
                        $url_detail="chi-tiet-san-pham/$slug/$product_id";
                        ?>
                        <tr>
                            <td>
                                <a href="<?php echo $url_detail; ?>"><?php echo $product["product_name"];?></a>
                            </td>

                            <td>
                                <?php echo number_format($product["product_price"]);  ?> VNĐ
                            </td>
                            <td>
                                <?php echo $product["quality"];  ?>
                            </td>
                            <td>
                                <?php echo $product["product_discount"];  ?> %
                            </td>

                            <td><?php
                                $total_item_discount=($product["product_price"] * ($product["product_discount"]/100)) * $product["quality"] ;
                                $total_item=($product["product_price"] * $product["quality"]);
                                $total_product=$total_item-$total_item_discount;
                                echo number_format($total_product);
                                $total_cart += $total_item;
                                $total_discount += $total_item_discount;
                                $total +=$total_product;
                                ?>
                                VND
                            </td>

                        </tr>
                    <?php endforeach;?>
                        <th colspan="5" style="text-align: right;padding: 30px ">
                            <p style="padding: 3px 0px"> Tổng Tiền : <?php echo number_format($total_cart); ?> VND</p>
                            <p  style="padding: 3px 0px">- Giảm Giá : <?php echo number_format($total_discount); ?> VND</p>
                            <p  style="padding: 3px 0px"> Thành Tiền : <?php echo number_format($total); ?> VND</p>
                        </th>
                <?php else:?>
                    <tr>
                        <td colspan="11">No data found</td>
                    </tr>
                <?php endif;?>
            </table>
        </div>
    </div>
</div>




