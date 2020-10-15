<div class="bread_category">
    <div class="container">
        <div class="col-sm-12">
            <div class="banner_noidung" style="text-align: center">
                <p class="title">noithathoanmy.com</p>
                <p style="text-align: center !important;border-top: 5px solid white;padding: 5px;width: 100px;margin: auto;"></p>
                <marquee>Siêu thị nội thất hoàn mỹ xin kính chào quý khách !</marquee>
                <p >Danh sách tất cả sản phẩm của nội thất hoàn mỹ
                </p>
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
                          <li class="active">Danh Sách Sản Phẩm</a>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
<div class="product_category mt-30">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="category_title">
                    <div class="title">
                        <p>DANH MỤC SẢN PHẨM</p>
                    </div>
                    <?php
                    require_once "Mvc/frontend/controllers/CategoryController.php";
                    $category=new CategoryController();
                    $category->Category();
                    ?>

                </div>
                <div class="category_title mt-30">
                    <form method="POST" action="">
                    <div class="title">
                        <p>Lọc Sản phẩm</p>
                    </div>
                    <ul>
                        <div class="title-filler mt-10 mp-10">
                            <p>Thương hiệu sản phẩm :</p>
                        </div>
                        <?php
                        require_once "Mvc/frontend/controllers/ProducerController.php";
                        $producer=new ProducerController();
                        $producer->index();
                        ?>
                        <div class="title-filler mt-10 mp-10">
                            <p> giá sản phẩm :</p>
                        </div>
                        <?php
                        $checked1="";
                        $checked2="";
                        $checked3="";
                        $checked4="";
                        if(isset($_POST["price"]))
                        {
                            if(in_array(1,$_POST["price"]))
                            {
                                $checked1="checked";
                            }
                            if(in_array(2,$_POST["price"]))
                            {
                                $checked2="checked";
                            }
                            if(in_array(3,$_POST["price"]))
                            {
                                $checked3="checked";
                            }
                            if(in_array(4,$_POST["price"]))
                            {
                                $checked4="checked";
                            }
                        }
                        ?>
                        <li>
                            <input type="checkbox" id="Dưới 2 triệu" <?php echo $checked1; ?> name="price[]" value="1">&nbsp;&nbsp;&nbsp;
                            <label for="Dưới 2 triệu">Dưới 2 Triệu</label>
                        </li>
                        <li>
                            <input type="checkbox" id="price33" <?php echo $checked2; ?> name="price[]" value="2">&nbsp;&nbsp;&nbsp;
                            <label for="price33"> Từ 2 triệu - 4 triệu</label>
                        </li>
                        <li>
                            <input type="checkbox" id="price343" <?php echo $checked3; ?> name="price[]" value="3">&nbsp;&nbsp;&nbsp;
                            <label for="price343">Từ 4 triệu - 10 triệu</label>
                        </li>
                        <li>
                            <input type="checkbox" id="price52" <?php echo $checked4; ?> name="price[]" value="4">&nbsp;&nbsp;&nbsp;
                            <label for="price52">Trên 10 triệu</label>
                        </li>
                        <li class="submit-filler">
                            <input type="submit" name="filter" class="btn btn-success" value="Tìm Kiếm">&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="danh-sach-san-pham" class="btn btn-primary">Xóa tìm kiếm</a>
                        </li>
                    </ul>
                    </form>
                </div>
                <div class="category_title mt-20 mp-15">
                    <div class="title">
                        <p>Sắp xếp</p>
                    </div>
                    <select name="" id="" class="form-control">
                        <option > -- Chọn bộ lọc --</option>
                        <option value="1"> Hàng mới về</option>
                        <option value="1">Gía giảm dần</option>
                        <option value="1">Giá tăng dần </option>
                    </select>
                </div>
            </div>


            <!-- category-left -->
            <div class="col-sm-9" id="show_all_product">
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
                            <div class="container">
                                <h5 style="text-align: center;margin-top: 20px;">Không có sản phẩm nào !!!</h5>
                            </div>
                        <?php endif; ?>
                    </div>
                <ul class='pagination justify-content-center' id="pagination">
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
        </div>