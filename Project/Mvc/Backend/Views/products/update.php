<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?area=backend">Trang Chủ</a></li>
        <li class="breadcrumb-item"><a href="index.php?area=backend&controller=product">Danh sách sản phẩm</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thêm sản phẩm</li>
    </ol>
</nav>
<!-- form start -->
<form role="form" method="POST" action="" enctype="multipart/form-data" id="create_productform">
    <div class="row">
        <div class="col-sm-6">
            <div class="box box-success">
                <div class="box-body">
                    <div class="form-group">
                        <label for="c_name">Tên Sản phẩm :</label>
                        <input type="text" minlength="6" value="<?php echo isset($_POST['title']) ? $_POST['title'] : $product['title'] ?>" class="form-control required"  name="title" id="p_title" placeholder="Nhập tên sản phẩm ...">
                        <p id="nhacloi"></p>
                    </div>
                    <div class="form-group">
                        <label >Avatar :</label>
                        <input type="file" class="form-control"  name="avatar">
                        <br>
                        <?php if (!empty($product['avatar'])): ?>
                            <img height="80" width="120" src="assets/uploads/products/<?php echo $product['avatar'] ?>"/>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="">ảnh mô tả sản phẩm  :</label>
                        <input type="file" class="form-control" multiple="multiple" name="avatars[]">
                        <br>
                        <?php if (!empty($product_images)): ?>
                            <?php foreach ($product_images as $key=>$value):?>
                                <img height="80" width="120" src="assets/uploads/product_images/<?php echo $value['avatar']; ?>"/>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="summary">Mô tả ngắn sản phẩm :</label>
                        <textarea cols="30" rows="3" class="form-control required" placeholder="Mô ngắn cho sản phẩm" name="summary" id="summary">
                            <?php echo isset($_POST['summary']) ? $_POST['summary'] : $product['summary'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Mô tả chi tiết sản phẩm :</label>
                        <textarea cols="30" rows="3" class="form-control required" placeholder="Mô tả chi tiết sản phâm" name="content" id="content"><?php echo isset($_POST['content']) ? $_POST['content'] : $product['content'] ?></textarea>
                    </div>
                    <!--            -->
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="box box-success">
                <div class="box-body">
                    <!--            -->
                    <div class="form-group">
                        <label for="category_id">Chọn danh mục :</label>
                        <select name="category_id" class="form-control" id="category_id">
                            <option value="">-- Tất cả danh mục -- </option>
                            <?php foreach ($categories as $category):
                                $selected = '';
                                if ($category['id'] == $product['category_id']) {
                                    $selected = 'selected';
                                }
                                if (isset($_POST['category_id']) && $category['id'] == $_POST['category_id']) {
                                    $selected = 'selected';
                                }
                                ?>
                                <option value="<?php echo $category['id'] ?>" <?php echo $selected; ?>>
                                    <?php echo $category['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="producer_id">Chọn thương hiệu :</label>
                        <select name="producer_id" class="form-control" id="producer_id">
                            <option value="">-- Tất cả thương hiệu --</option>
                            <?php foreach ($producers as $producer):
                                $selected = '';
                                if ($producer['id'] == $product['producer_id']) {
                                    $selected = 'selected';
                                }
                                if (isset($_POST['producer_id']) && $producer['id'] == $_POST['producer_id']) {
                                    $selected = 'selected';
                                }
                                ?>
                                <option value="<?php echo $producer['id'] ?>" <?php echo $selected; ?>>
                                    <?php echo $producer['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Giá sản phẩm :</label>
                        <input type="number" name="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : $product['price'] ?>"
                               class="form-control" id="price"/>
                    </div>
                    <div class="form-group">
                        <label for="discount">% Khuyến Mại :</label>
                        <input type="number" name="discount" value="<?php echo isset($_POST['discount']) ? $_POST['discount'] : $product['discount'] ?>"
                               class="form-control" id="discount"/>
                    </div>
                    <div class="form-group">
                        <label for="quality">Số Lượng :</label>
                        <input type="number" name="quality" value="<?php echo isset($_POST['quality']) ? $_POST['quality'] : $product['quality'] ?>"
                               class="form-control" id="quality"/>
                        <p class="error"><?php echo isset($this->error["quality"])? $this->error["quality"] : '';  ?></p>
                    </div>
                    <div class="form-group">
                        <label for="p_status">Trạng thái :</label>
                        <select name="status" id="p_status" class="form-control required">
                            <?php
                            $selected_disabled = '';
                            $selected_active = '';
                            if ($product['status'] == 0) {
                                $selected_disabled = 'selected';
                            } else {
                                $selected_active = 'selected';
                            }
                            if (isset($_POST['status'])) {
                                switch ($_POST['status']) {
                                    case 0:
                                        $selected_disabled = 'selected';
                                        break;
                                    case 1:
                                        $selected_active = 'selected';
                                        break;
                                }
                            }
                            ?>
                            <option >Trạng thái sản phẩm</option>
                            <option value="1" <?php echo $selected_active ?>>Active</option>
                            <option value="0" <?php echo $selected_disabled; ?>>Disabled</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="hotproduct" <?php if(isset($product["hotproduct"]) && $product["hotproduct"]== 1 ) : ?> checked <?php endif; ?> id="hotproduct"/>
                        <label for="hotproduct">Sản Phẩm Nổi Bật</label>
                    </div>
                    <div class="box-footer">
                        <input type="submit"  value="Sửa Sản Phẩm" name="submit" id="p_submit"  class=" btn btn-success">
                        <a href="index.php?area=backend&controller=product" class=" btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

