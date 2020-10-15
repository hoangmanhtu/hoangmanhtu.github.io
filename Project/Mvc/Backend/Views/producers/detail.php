<!---->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?area=backend">Trang Chủ</a></li>
        <li class="breadcrumb-item"><a href="index.php?area=backend&controller=producer">Danh sách NSX - Thương Hiệu</a></li>
        <li class="breadcrumb-item active" aria-current="page">Chi tiết NSX - Thương Hiệu mã : <?php echo $producer["id"] ?></li>
    </ol>
</nav>
<!--    -->
<div class="box box-success">
    <table class="table table-bordered">
        <tr>
            <th>Mã NSX - Thương Hiệu</th>
            <td><?php echo $producer['id']; ?></td>
        </tr>
        <tr>
            <th>Tên NSX - Thương Hiệu</th>
            <td><?php echo $producer['name']; ?></td>
        </tr>
        <tr>
            <th>Avatar</th>
            <td>
                <?php if (!empty($producer['avatar'])): ?>
                    <img src="assets/uploads/producers/<?php echo $producer['avatar'] ?>" width="130" height="70px"/>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Mô tả NSX - Thương Hiệu</th>
            <td><?php echo $producer['description']; ?></td>
        </tr>
        <tr>
            <th>Trạng thái</th>
            <td>
                <?php
                $status_text = 'Active';
                if ($producer['status'] == 0) {
                    $status_text = 'Disabled';
                }
                echo $status_text;
                ?>
            </td>
        </tr>
        <tr>
            <th>Ngày tạo</th>
            <td>
                <?php echo date('d/m/Y', strtotime($producer['created_at'])); ?>
            </td>
        </tr>
        <tr>
            <th>Ngày cập nhật cuối </th>
            <td>
                <?php
                if(isset($producer["updated_at"]))
                {
                    echo date('d/m/Y', strtotime($producer['updated_at']));
                }
                ?>

            </td>
        </tr>
    </table>
    <div class="box-footer">
        <a class="btn btn-primary" href="index.php?area=backend&controller=producer">Back</a>
    </div>
</div>


