<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?area=backend">Trang Chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh Sách Danh Mục</li>
    </ol>
</nav>
    <div align="right" style="margin:0px 0px 15px 0px;">
        <a class="btn btn-success" href="index.php?area=backend&controller=category&action=create"><i class="fa fa-plus"></i> Thêm Mới Danh Mục</a>
    </div>
    <div class="box box-success">

        <table class="table table-bordered">
            <thead>
            <tr class="table-active">
                <th scope="col">Mã</th>
                <th style="width: 20%;" scope="col">Tên Danh Mục</th>
                <th style="width: 15%;" scope="col">Avatar</th>
                <th style="width:25%;" scope="col">Mô tả danh mục</th>
                <th style="width: 10%;" scope="col">Trạng thái</th>
                <th style="width: 15%;" scope="col">Ngày tạo</th>
                <th style="width: 15%;text-align: center"  scope="col">Chức năng </th>
            </tr>
            </thead>
            <tbody>

            <?php
            if(!empty($categories)):
            foreach ($categories as $category): ?>
                <tr>
                    <th scope="row"><?php echo $category["id"]; ?></th>
                    <td><?php echo $category["name"]; ?></td>
                    <td>
                        <?php if (!empty($category['avatar'])): ?>
                            <img src="assets/uploads/categories/<?php echo $category['avatar'] ?>" width="100" height="50"/>
                        <?php endif; ?>
                    </td>
                    <td><?php echo $category["description"]; ?></td>
                    <?php
                    $status="";
                    if($category["status"] ==1)
                    {
                        $status ="Active";
                    }
                    else
                    {
                        $status ="Disable";
                    }
                    ?>
                    <td><?php echo $status;?></td>
                    <td><?php  echo date('d/m/Y', strtotime($category['created_at'])); ?></td>
                    <td style="text-align: center">
                        <a style="margin-right: 10px;" href="index.php?area=backend&controller=category&action=detail&id=<?php echo $category['id'] ?>">
                            <i class="fa fa-eye "></i></a>
                        <a style="margin-right: 10px;" href="index.php?area=backend&controller=category&action=update&id=<?php echo $category['id'] ?>">
                            <i class="fa fa-pencil"></i></a>
                        <a  style="margin-right: 10px;"
                            href="index.php?area=backend&controller=category&action=delete&id=<?php echo $category['id']?>"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này')">
                            <i class="fa fa-trash"></i>
                        </a>

                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
            <?php else: ?>
                <tr>
                    <td colspan="9">No data found</td>
                </tr>
            <?php endif;?>
        </table>
    </div>

