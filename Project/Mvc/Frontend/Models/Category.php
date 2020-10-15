<?php
class Category extends Model
{
    public function getAll()
    {
        $sql_select_all = "SELECT * FROM categories where status=1 and hotcategory=1";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }
    public function MenuCategory()
    {
        $sql_select_all = "SELECT * FROM categories where status=1";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }
    public function getDetail($id)
    {
        $sql_select_all = "SELECT * FROM categories where status=1  and  id=$id";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $categories = $obj_select_all->fetch(PDO::FETCH_ASSOC);
        return $categories;
    }
}