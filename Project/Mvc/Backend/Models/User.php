<?php
class User extends Model
{
    public function getAll()
    {
        $sql_select="select * from users";
        $obj_select=$this->connection->prepare($sql_select);
        $obj_select->execute();
        $users=$obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
}