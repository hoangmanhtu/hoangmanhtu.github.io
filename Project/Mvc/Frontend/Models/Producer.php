<?php
class  Producer extends Model
{
    public function getAllProducer()
    {
        $sql_select = "Select * from producer where status=1";
        $obj_select_all = $this->connection->prepare($sql_select);
        $obj_select_all->execute();
        $producers = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $producers;
    }
}