<?php
$total_cart=0;
$total_discount=0;
$total=0;
$total_product=0;
?>
<div class="container mt-50">
    <?php if(!empty($_SESSION["cart"])): ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="template-cart">
                <form action="" method="post">
                    <div class="table-responsive">
                        <table style="text-align: center;" class="table table-striped table-bordered table-list">
                            <tr>
                                <th class="product" width="27%">Sản phẩm</th>
                                <th class="price"  width="15%">Gía</th>
                                <th class="quanity"  width="8%">Số Lượng</th>
                                <th class="discount"  width="15%">% Khuyến Mại</th>
                                <th class="total"  width="15%">Thành tiền</th>
                                <th class="edit"  width="10%">Xóa</th>
                            </tr>
                            <tbody>
                            <?php foreach ($_SESSION["cart"] as $product_id => $cart):
                            $slug=Helper::getSlug($cart["name"]);
                            $url_detail="chi-tiet-san-pham/$slug/$product_id";
                            ?>
                            <tr>
                                <td>
                                    <div>
                                        <a href="<?php echo $url_detail; ?>">
                                            <img style="width: 120px;height: 70px" src="assets/uploads/products/<?php echo $cart["avatar"]; ?>"
                                                 class="img-responsive" />
                                        </a>
                                    </div>
                                    <div>
                                        <a href="<?php echo $url_detail; ?>"> <?php echo $cart["name"]; ?></a>
                                    </div>
                                </td>
                                <td>
                                    <?php echo number_format($cart["price"]); ?> VND
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="<?php echo $product_id; ?>" value="<?php echo $cart["quality"]; ?>" min="0">
                                </td>
                                <td>
                                    <?php echo isset($cart["discount"])? $cart["discount"] : 0; ?> %
                                </td>
                                <td>
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
                            </td>
                            <td>
                                <a class="btn btn-default" href="xoa-san-pham/<?php echo $product_id; ?>"  onclick="return window.confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng ?');" data-id="2479395">
                                    <i class="fa fa-trash"></em></i>
                                </a>
                            </td>

                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot style="text-align: right;">
                    <tr>
                        <th colspan="6"><a style="text-align:left;" class="btn btn-danger"  onclick="return window.confirm('Bạn có chắc chắn muốn toàn bộ sản phẩm trong giỏ hàng');" href="xoa-toan-bo-san-pham" class="button pull-left">Xóa toàn bộ</a>


                            <a class="btn btn-secondary" href="index.php" class="button pull-right black">Tiếp tục mua hàng</a>
                            <input class="btn btn-success" type="submit" name="submit" class="button pull-right" value="Cập nhật">
                        </th>
                    </tr>
                    </tfoot>
                    </table>
            </div>
            </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12" style="text-align: right;font-size: 20px;">
            <div class="total-col">
                    <div class="label mt-10">Thành tiền :  <?php echo number_format($total_cart); ?> VND</div>
                    <div class="label mt-10">Giảm giá : <?php echo number_format($total_discount); ?> VND</div>
                <div class="label  mt-10 mp-25">Tổng số tiền thanh toán :<?php echo number_format($total); ?> VND</div>
            <div class=" mt-10">
                <a class="submit-support3" href="thanh-toan"> Thanh toán giỏ hàng</a>
            </div>

        </div>
    </div>
</div>
    <?php else: ?>
            <h3 style="text-align: center">Giỏ hàng của bạn trống</h3>
    <?php endif;?>
</div>

<!-- end main -->