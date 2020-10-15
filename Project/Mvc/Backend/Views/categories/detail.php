<!---->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?area=backend">Trang Chủ</a></li>
        <li class="breadcrumb-item"><a href="index.php?area=backend&controller=category">Danh sách danh mục</a></li>
        <li class="breadcrumb-item active" aria-current="page">Chi tiết danh mục mã : <?php echo $category["id"] ?></li>
    </ol>
</nav>
<!--    -->
<div class="box box-success">
    <table class="table table-bordered">
        <tr>
            <th>Mã danh mục</th>
            <td><?php echo $category['id']; ?></td>
        </tr>
        <tr>
            <th>Tên danh mục</th>
            <td><?php echo $category['name']; ?></td>
        </tr>
        <tr>
            <th>Avatar</th>
            <td>
                <?php if (!empty($category['avatar'])): ?>
                    <img src="assets/uploads/categories/<?php echo $category['avatar'] ?>" width="60"/>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Mô tả danh mục</th>
            <td><?php echo $category['description']; ?></td>
        </tr>
        <tr>
            <th>Trạng thái</th>
            <td>
                <?php
                $status_text = 'Active';
                if ($category['status'] == 0) {
                    $status_text = 'Disabled';
                }
                echo $status_text;
                ?>
            </td>
        </tr>
        <tr>
            <th>Danh Mục Nổi Bật</th>
            <td><?php if(isset($category["hotcategory"]) && $category["hotcategory"]== 1 ): ?>
                    <i class="fa fa-check"></i>
                <?php else: ?>
                    <div><i class="fa fa-times"></i></div>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Ngày tạo</th>
            <td>
                <?php echo date('d/m/yy', strtotime($category['created_at'])); ?>
            </td>
        </tr>
        <tr>
            <th>Ngày cập nhật cuối </th>
            <td>
                <?php
                if(isset($category["updated_at"]))
                {
                echo date('d/m/yy', strtotime($category['updated_at']));
                }
                ?>

            </td>
        </tr>
    </table>
</div>
<a class="btn btn-primary" href="index.php?area=backend&controller=category">Back</a>

