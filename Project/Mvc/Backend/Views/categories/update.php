<?php if (empty($category)): ?>
    <h2>Không tồn tại category</h2>
<?php else: ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?area=backend">Trang Chủ</a></li>
            <li class="breadcrumb-item"><a href="index.php?area=backend&controller=category">Danh sách danh mục</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chỉnh Sửa Danh Mục Mã : <?php echo $category['id'] ?></li>
        </ol>
    </nav>
    <form method="POST" action="" id="update_cform" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên danh mục</label>
            <input type="text" name="name" id="c_name" value="<?php echo isset($category['name']) ? $category['name'] : ""; ?>" class="form-control required"/>
        </div>

        <div class="form-group">
            <label>Ảnh đại diện</label>
            <input type="file" name="avatar" class="form-control"/>
        </div>
        <?php if (!empty($category['avatar'])): ?>
            <img style="margin: 10px 0px;" src="assets/uploads/categories/<?php echo $category['avatar']; ?>" height="100"/>
        <?php endif; ?>


        <div class="form-group">
            <label>Mô tả</label>
            <textarea class="form-control required" name="description"><?php echo isset($category['description']) ? $category['description'] : "" ?></textarea>
        </div>

        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select name="status" class="form-control required" id="status">
                <?php
                $selected_disabled = '';
                $selected_active = '';
                if ($category['status'] == 0) {
                    $selected_disabled = 'selected';
                } else {
                    $selected_active = 'selected';
                }
                ?>
                <option value="">Trạng thái danh mục</option>
                <option value="1" <?php echo $selected_active ?>>Active</option>
                <option value="0" <?php echo $selected_disabled; ?>>Disabled</option>

            </select>
        </div>
        <div class="form-group">
            <input type="checkbox" name="hotcategory" <?php if(isset($category["hotcategory"]) && $category["hotcategory"]== 1 ) : ?> checked <?php endif; ?> id="hotcategory"/>
            <label for="hotcategory">Danh Mục Nổi Bật</label>
        </div>
        <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
        <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
    </form>
<?php endif; ?>