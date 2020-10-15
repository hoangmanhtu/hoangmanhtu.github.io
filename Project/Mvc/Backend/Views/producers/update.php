<div class="box box-success">
<?php if (empty($producer)): ?>
    <h2>Không tồn tại category</h2>
<?php else: ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?area=backend">Trang Chủ</a></li>
            <li class="breadcrumb-item"><a href="index.php?area=backend&controller=producer">Danh sách NSX - Thương Hiệu</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sửa NSX - Thương Hiệu</li>
        </ol>
    </nav>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên NSX - Thương Hiệu</label>
            <input type="text" name="name" placeholder="Tên NSX - Thương Hiệu" value="<?php echo isset($producer['name']) ? $producer['name'] : ""; ?>" class="form-control"/>
        </div>

        <div class="form-group">
            <label>Avatar</label>
            <input type="file" name="avatar" class="form-control"/>
        </div>
        <?php if (!empty($producer['avatar'])): ?>
            <img style="margin: 10px 0px;" src="assets/uploads/producers/<?php echo $producer['avatar']; ?>" height="100"/>
        <?php endif; ?>


        <div class="form-group">
            <label>Mô tả</label>
            <textarea class="form-control" name="description"><?php echo isset($producer['description']) ? $producer['description'] : "" ?></textarea>
        </div>

        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select name="status" class="form-control required" id="status">
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
                <option value="1" <?php echo $selected_active ?>>Active</option>
                <option value="0" <?php echo $selected_disabled; ?>>Disabled</option>

            </select>
        </div>
        <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
        <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
    </form>
<?php endif; ?>