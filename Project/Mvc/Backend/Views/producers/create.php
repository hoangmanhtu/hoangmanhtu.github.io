<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?area=backend">Trang Chủ</a></li>
        <li class="breadcrumb-item"><a href="index.php?area=backend&controller=producer">Danh sách NSX - Thương Hiệu</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thêm NSX - Thương Hiệu</li>
    </ol>
</nav>
<div class="box box-success">
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="POST" action="" enctype="multipart/form-data" id="create_producerform">
        <div class="box-body">
            <div class="form-group">
                <label for="c_name">Tên Nhà SX :</label>
                <input type="text" minlength="6" value="<?php echo isset($_POST['name'])?$_POST['name'] : '';?>" class="form-control required"  name="name" id="c_name" placeholder="Nhập tên NSX - Thương Hiệu ...">
            </div>
            <div class="form-group">
                <label for="c_name">Avatar :</label>
                <input type="file" class="form-control"  name="avatar">
            </div>
            <div class="form-group">
                <label for="c_description">Mô tả NSX - Thương Hiệu :</label>
                <textarea cols="30" rows="5" class="form-control required" placeholder="Mô tả cho NSX - Thương Hiệu" name="description" id="c_description"><?php echo isset($_POST['description']) ? $_POST['description'] : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="c_status">Trạng thái :</label>
                <select name="status" id="c_status" class="form-control required">

                         <?php
                    $selected_disabled = '';
                    $selected_active = '';
                    if ($producer['status'] == 0) {
                        $selected_disabled = 'selected';
                    } else {
                        $selected_active = 'selected';
                    }
                    ?>
                    <option value="">Trạng thái NSX - Thương Hiệu</option>
                    <option value="1" <?php echo $select_active; ?> >Active</option>
                    <option value="0" <?php echo $selected_disabled; ?> >Disabled</option>
                </select>
            </div>
        </div>
        <div class="box-footer">
            <input type="submit" value="Thêm NSX- Thương Hiệu" name="submit" id="c_submit" class="btn btn-success">
            <a href="index.php?area=backend&controller=category" class=" btn btn-primary">Back</a>
        </div>
    </form>
</div>


