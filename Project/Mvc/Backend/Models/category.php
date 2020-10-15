<?php
class Category extends  Model
{
    public $id;
    public $name;
    public $avatar;
    public $description;
    public $status;
    public $hotcategory;
    public $created_at;
    public $updated_at;
    //thêm danh mục
    public function insert() {
        $sql_insert =
            "INSERT INTO categories(`name`, `avatar`, `description`, `status`,`hotcategory`)
        VALUES (:name, :avatar, :description, :status,:hotcategory)";
        $obj_insert = $this->connection
            ->prepare($sql_insert);
        $arr_insert = [
                        ':name' => $this->name,
                        ':avatar' => $this->avatar,
                        ':description' => $this->description,
                        ':status' => $this->status,
                        ':hotcategory' =>$this->hotcategory
        ];
        return $obj_insert->execute($arr_insert);
    }
//    lấy tất cả danh mục
    public function getAll()
    {
        $sql_select="Select * from categories";
        $obj_select_all=$this->connection->prepare($sql_select);
        $obj_select_all->execute();
        $categories=$obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }
//        chi tiết danh mục
    public function getById($id)
    {
        $obj_select = $this->connection->prepare("SELECT * FROM categories WHERE id = $id");
        $obj_select->execute();
        $category = $obj_select->fetch(PDO::FETCH_ASSOC);
        return $category;
    }
//        update danh mục
    public function update($id)
    {

        $obj_update = $this->connection->prepare("UPDATE categories SET `name` = :name, `avatar` = :avatar, `description` = :description, `status` = :status,`hotcategory` = :hotcategory, `updated_at` = :updated_at 
         WHERE id = $id");
        $arr_update = [
            ':name' => $this->name,
            ':avatar' => $this->avatar,
            ':description' => $this->description,
            ':status' => $this->status,
            ':hotcategory' => $this->hotcategory,
            ':updated_at' => $this->updated_at,
        ];
        return $obj_update->execute($arr_update);
    }
//        xóa danh mục
    public function delete($id)
    {
        $obj_delete = $this->connection->prepare("DELETE FROM categories WHERE id = $id");
        $is_delete = $obj_delete->execute();
        $obj_delete_product = $this->connection->prepare("DELETE FROM products WHERE category_id = $id");
        $obj_delete_product->execute();
        return $is_delete;
    }
    public function images($id)
    {
        $obj_delete_img=$this->connection->prepare("select avatar from categories where id=$id");
        $obj_delete_img->execute();
        $result=$obj_delete_img->fetch(PDO::FETCH_ASSOC);

        if($result["avatar"] != "" && file_exists("assets/uploads/categories/".$result["avatar"]))
        {
            unlink("assets/uploads/categories/".$result["avatar"]);
        }
    }
    public function getCategory($name) {

        $sql_select_one = "SELECT * FROM categories WHERE `name` = :name";
        $obj_select_one = $this->connection->prepare($sql_select_one);
        $arr_select = [
            ':name' => $name,
        ];
        $obj_select_one->execute($arr_select);
        return $obj_select_one->fetch(PDO::FETCH_ASSOC);

    }


}
?>