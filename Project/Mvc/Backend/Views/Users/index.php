<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?area=backend">Trang Chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh Sách tài khoản</li>
    </ol>
</nav>
<?php
//echo "<pre>";
//    print_r($products);
//echo "</pre>";
?>
<div class="box box-success" >

    <table class="table table-bordered">
        <thead>
        <tr class="table-active">
            <th scope="col">Mã</th>
            <th style="width: 20%;" scope="col">Họ và tên</th>
            <th style="width: 25%;" scope="col">Email</th>
            <th style="width:20%;" scope="col">Số điện thoại</th>
            <th style="width:15%;" scope="col">Quyền</th>
            <th style="width: 20%;" scope="col">Ngày tạo</th>
        </tr>
        </thead>
        <tbody>

        <?php if (!empty($users)):?>

            <?php
            foreach ($users as $user):
                ?>
                <tr>
                    <td><?php echo $user["id"];?></td>
                    <td>
                           <?php echo $user["fullname"];  ?>
                    </td>
                    <td><?php echo $user["email"]; ?> </td>
                    <td>0<?php echo  $user["phone"] ?></td>
                    <td>
                        <?php
                        $status_user="";
                            if($user["status"] ==1)
                            {
                                $status_user="Tài khoản Admin";
                            }
                            else
                            {
                                $status_user="Tài khoản khách hàng";
                            }
                            echo $status_user;
                        ?>
                        </td>
                    <td><?php echo date('d/m/Y',strtotime($user["created_at"]));?></td>
                </tr>
            <?php  endforeach;?>
        <?php  else: ?>
            <tr>
                <td colspan="9">No data found</td>
            </tr>
        <?php endif;?>
    </table>
