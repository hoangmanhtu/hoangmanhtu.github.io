<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?area=backend">Trang Chủ</a></li>
        <li class="breadcrumb-item"><a href="index.php?area=backend&controller=product">Danh sách sản phẩm</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thêm sản phẩm</li>
    </ol>
</nav>
<?php
//print_r($categories);die();
//
//?>
<!-- /.box-header -->
<!-- form start -->
<form role="form" method="POST" action="" enctype="multipart/form-data" id="create_productform">
    <div class="row">
        <div class="col-sm-6">
            <div class="box box-success">
                <div class="box-body">
                    <div class="form-group">
                        <label for="c_name">Tên Sản phẩm :</label>
                        <input type="text" minlength="6" value="<?php echo isset($_POST['title'])?$_POST['title'] : '';?>" class="form-control required"  name="title" id="p_title" placeholder="Nhập tên sản phẩm ...">
                        <p id="nhacloi"></p>
                    </div>
                    <div class="form-group">
                        <label >Avatar :</label>
                        <input type="file" class="form-control"  name="avatar">
                    </div>
                    <div class="form-group">
                        <label for="">ảnh mô tả sản phẩm  :</label>
                        <input type="file" class="form-control" multiple="multiple" name="avatars[]">
                    </div>
                    <div class="form-group">
                        <label for="summary">Mô tả ngắn sản phẩm :</label>
                        <textarea cols="30" rows="5" class="form-control required" placeholder="Mô  ngắn cho sản phẩm" name="summary" id="summary"><?php echo isset($_POST['summary']) ? $_POST['summary'] : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Mô tả chi tiết sản phẩm :</label>
                        <textarea cols="30" rows="5" class="form-control required" placeholder="Mô tả chi tiết sản phâm" name="content" id="content"><?php echo isset($_POST['content']) ? $_POST['content'] : ''; ?></textarea>
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
                        <input type="number" name="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : '' ?>"
                               class="form-control" id="price"/>
                    </div>
                    <div class="form-group">
                        <label for="discount">% Khuyến Mại :</label>
                        <input type="number" name="discount" value="<?php echo isset($_POST['discount']) ? $_POST['discount'] : '0' ?>"
                               class="form-control" id="discount"/>
                    </div>
                    <div class="form-group">
                        <label for="quality">Số Lượng :</label>
                        <input type="number" name="quality" value="<?php echo isset($_POST['quality']) ? $_POST['quality'] : '' ?>"
                               class="form-control" id="quality"/>
                        <p class="error"><?php echo isset($this->error["quality"])? $this->error["quality"] : '';  ?></p>
                    </div>
                    <div class="form-group">
                        <label for="p_status">Trạng thái :</label>
                        <select name="status" id="p_status" class="form-control required">
                            <?php
                            $selected_active = '';
                            $selected_disabled = '';
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
                            <option  value="" >Trạng thái sản phẩm</option>
                            <option value="1" <?php echo $selected_active ?>>Active</option>
                            <option value="0" <?php echo $selected_disabled; ?>>Disabled</option>
                        </select>
                    </div>
                    <div class="checkbox">
                        <label for="hotproduct">
                            <input type="checkbox" value="<?php echo isset($_POST['hotproduct']) ? $_POST['hotproduct'] : ''; ?>" name="hotproduct" id="hotproduct" > Sản Phẩm Nổi Bật
                        </label>
                    </div>
                    <div class="box-footer">
                        <input type="submit"  value="Thêm Sản Phẩm" name="submit" id="p_submit"  class=" btn btn-success">
                        <a href="index.php?area=backend&controller=product" class=" btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

