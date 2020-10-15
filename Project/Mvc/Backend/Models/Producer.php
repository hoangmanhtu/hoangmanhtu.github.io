<?php
class Producer extends  Model
{
    public $id;
    public $name;
    public $avatar;
    public $description;
    public $status;
    public $created_at;
    public $updated_at;

    public function getAll()
    {
        $sql_select="Select * from producer";
        $obj_select_all=$this->connection->prepare($sql_select);
        $obj_select_all->execute();
        $producers=$obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $producers;
    }
    //thêm danh mục
    public function insert() {
        $sql_insert =
            "INSERT INTO producer(`name`, `avatar`, `description`, `status`)VALUES (:name, :avatar, :description, :status)";
        $obj_insert = $this->connection
            ->prepare($sql_insert);
        $arr_insert = [
            ':name' => $this->name,
            ':avatar' => $this->avatar,
            ':description' => $this->description,
            ':status' => $this->status
        ];
        return $obj_insert->execute($arr_insert);
    }
//        chi tiết danh mục
    public function getById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM producer WHERE id = $id");
        $obj_select->execute();
        $producer = $obj_select->fetch(PDO::FETCH_ASSOC);

        return $producer;
    }
//        update danh mục
    public function update($id)
    {

        $obj_update = $this->connection->prepare("UPDATE producer SET `name` = :name, `avatar` = :avatar, `description` = :description, `status` = :status, `updated_at` = :updated_at 
         WHERE id = $id");
        $arr_update = [
            ':name' => $this->name,
            ':avatar' => $this->avatar,
            ':description' => $this->description,
            ':status' => $this->status,
            ':updated_at' => $this->updated_at,
        ];
        return $obj_update->execute($arr_update);
    }
//        xóa danh mục
    public function delete($id)
    {
        $obj_delete = $this->connection->prepare("DELETE FROM producer WHERE id = $id");
        $is_delete = $obj_delete->execute();
        $obj_delete_product = $this->connection->prepare("DELETE FROM products WHERE producer_id = $id");
        $obj_delete_product->execute();
        return $is_delete;
    }
    public function images($id)
    {
        $obj_delete_img=$this->connection->prepare("select avatar from producer where id=$id");
        $obj_delete_img->execute();
        $result=$obj_delete_img->fetch(PDO::FETCH_ASSOC);

        if($result["avatar"] != "" && file_exists("assets/uploads/producers/".$result["avatar"]))
        {
            unlink("assets/uploads/producers/".$result["avatar"]);
        }
    }


}
?>