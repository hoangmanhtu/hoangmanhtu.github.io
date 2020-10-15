<div class="container mt-30" style="background-color: #f4f4f4;padding: 25px;border-radius: 10px">
            <form action="" method="POST" id="shopping_pay">
                <div class="row">
                    <div class="col-md-6 col-sm-6" >
                        <div class="footer-support">
                            <h5 style="margin-bottom: 20px;text-align: center;font-weight: bold;text-transform: uppercase">Thông tin khách hàng</h5>
                        <input type="hidden" name="user_id" value="<?php if(isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"])): echo $_SESSION["user_account"]["id"];   else: echo "";  endif;?>">
                            <p>Họ tên người nhận :</p>
                            <input type="text" name="fullname" value="<?php if(isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"])): echo $_SESSION["user_account"]["fullname"];   else: echo "";  endif;?>" placeholder="Họ tên khách hàng.. *">
                            <p>Địa chỉ người nhận :</p>
                            <input type="text" name="address" value="<?php if(isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"])): echo $_SESSION["user_account"]["address"];   else: echo "";  endif;?>" placeholder="Địa chỉ... *">
                            <p>Số điện thoại người nhận :</p>
                            <input type="text"  name="mobile"  value="<?php if(isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"])): echo $_SESSION["user_account"]["phone"];   else: echo "";  endif;?>" placeholder="Số điện thoại... *">
                            <p>Email :</p>
                            <input type="email" name="email" value="<?php if(isset($_SESSION["user_account"]) && !empty($_SESSION["user_account"])): echo $_SESSION["user_account"]["email"];   else: echo "";  endif;?>" placeholder="">
                            <p>Ghi chú thêm : (nếu có)</p>
                            <input type="text" name="note" placeholder="Ghi chú thêm...">
                            <input type="hidden" name="status" value="0">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Chọn phương thức thanh toán :</label> <br />
                            <input type="radio" name="method" value="0" id="tructuyen" /> <label for="tructuyen"> Thanh toán trực tuyến</label>  <br />
                            <input type="radio" name="method" checked value="1" id="cod" /> <label for="cod"> COD (dựa vào địa chỉ của bạn)</label>  <br />
                        </div>
                        <input type="submit" name="submit" value="Thanh toán" class="btn btn-outline-success">
                        <a href="gio-hang-cua-ban" class="btn btn-outline-secondary">Về trang giỏ hàng</a>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <h5 style="margin-bottom: 20px;text-align: center;font-weight: bold;text-transform: uppercase"  class="center-align">Thông tin đơn hàng</h5>
                        <?php
                        $total_cart=0;
                        $total_discount=0;
                        $total=0;
                        $total_product=0;
                        if (isset($_SESSION['cart'])):
                            ?>
                            <table class="table table-bordered" style="text-align: center">
                                <tbody>
                                <tr>
                                    <th width="30%">Tên sản phẩm</th>
                                    <th width="25%">Giá</th>
                                    <th width="10%">Số lượng</th>
                                    <th width="10%">% Khuyến mãi</th>
                                    <th width="25%">Thành tiền</th>
                                </tr>
                                <?php foreach ($_SESSION['cart'] AS $product_id => $cart):
                                    $product_link = 'chi-tiet-san-pham/' . Helper::getSlug($cart['name']) . "/$product_id";
                                    ?>
                                    <tr>
                                        <td >
                                            <?php if (!empty($cart['avatar'])): ?>
                                                <a href="<?php echo $product_link; ?>"><img class="mp-10" src="assets/uploads/products/<?php echo $cart['avatar']; ?>" width=100" height="60"></a>
                                            <?php endif; ?>
                                            <div class="content-product">
                                                <a href="<?php echo $product_link; ?>" class="content-product-a">
                                                    <?php echo $cart['name']; ?>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo number_format($cart['price'], 0, '.', '.') ?> vnđ
                                        </td>
                                        <td>
                                            <?php echo $cart['quality']; ?>
                                        </td>
                                        <td>
                                            <?php echo $cart['discount']; ?> %
                                        </td>
                                        <td>
                                              <?php
                                            $total_item_discount=($cart["price"] * ($cart["discount"]/100)) * $cart["quality"] ;
                                            $total_item=($cart["price"] * $cart["quality"]);
                                            $total_product=$total_item-$total_item_discount;
                                            $total_cart += $total_item;
                                            $total_discount += $total_item_discount;
                                            $total +=$total_product;
                                            echo number_format($total_product);
                                            ?>
                                            VND
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="5"  style="text-align:right;">
                                        Tổng giá trị đơn hàng :
                                        <span style="font-weight: bold;font-size: 16px;">
                                    <?php echo number_format($total) ?> VND
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        <?php endif; ?>

                    </div>
                </div>
            </form>
        </div>