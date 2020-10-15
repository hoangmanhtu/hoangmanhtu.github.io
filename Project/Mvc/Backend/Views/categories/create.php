<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?area=backend">Trang Chủ</a></li>
        <li class="breadcrumb-item"><a href="index.php?area=backend&controller=category">Danh sách danh mục</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thêm danh mục</li>
    </ol>
</nav>
    <div class="box box-success">
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="POST" action="" enctype="multipart/form-data" id="create_cform">
            <div class="box-body">
                <div class="form-group">
                    <label for="c_name">Tên Danh Mục :</label>
                    <input type="text" minlength="6" value="<?php echo isset($_POST['name'])?$_POST['name'] : '';?>" class="form-control required"  name="name" id="c_name" placeholder="Nhập tên danh mục ...">
                    <p id="nhacloi"></p>
                </div>
                <div class="form-group">
                    <label for="c_name">Avatar :</label>
                    <input type="file" class="form-control"  name="avatar">
                </div>
                <div class="form-group">
                    <label for="c_description">Mô tả danh mục :</label>
                   <textarea cols="30" rows="5" class="form-control required" placeholder="Mô tả cho danh mục" name="description" id="c_description"><?php echo isset($_POST['description']) ? $_POST['description'] : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="c_status">Trạng thái :</label>
                    <select name="status" id="c_status" class="form-control required">
                        <?php
                            $select_active ="";
                            $selected_disabled="";
                            if(isset($_POST["status"]))
                            {
                                switch ($_POST["status"])
                                {
                                    case  0 :
                                        $selected_disabled= "selected";
                                        break;
                                    case 1:
                                        $select_active = "selected";
                                        break;
                                }
                            }


                        ?>
                        <option value="">Trạng thái danh mục</option>
                        <option value="1" <?php echo $select_active; ?> >Active</option>
                        <option value="0" <?php echo $selected_disabled; ?> >Disabled</option>
                    </select>
                </div>
                <div class="checkbox">
                    <label for="hotcategory">
                        <input type="checkbox" value="<?php echo isset($_POST['hotcategory']) ? $_POST['hotcategory'] : ''; ?>" name="hotcategory" id="hotcategory" > Danh Mục Nổi Bật
                    </label>
                </div>
            </div>
            <div class="box-footer">
                <input type="submit"  value="Thêm Danh Mục" name="submit" id="c_submit"  class=" btn btn-success">
                <a href="index.php?area=backend&controller=category" class=" btn btn-primary">Back</a>
            </div>
        </form>
    </div>

