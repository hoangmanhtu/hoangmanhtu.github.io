<?php
 class Login extends Model
 {
     public $fullname;
     public $email;
     public $phone;
     public $password;
     public $status;
     public function getUser($email) {
     $sql_select_one =
         "SELECT * FROM users WHERE `email` = :email AND `status`= 1";
     $obj_select_one = $this->connection->prepare($sql_select_one);
     $arr_select = [
         ':email' => $email,
     ];
     $obj_select_one->execute($arr_select);
     $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
     return $user;
 }
     public function register() {
         $sql_insert = "INSERT INTO users(`fullname`,`email`,`phone`, `password`,`status`)
                        VALUES(:fullname,:email,:phone, :password,:status)";
         $obj_insert = $this->connection
             ->prepare($sql_insert);
         $arr_insert = [
             ':fullname' => $this->fullname,
             ':email' => $this->email,
             ':phone' => $this->phone,
             ':password' => $this->password,
             ':status' => $this->status
         ];
         return $obj_insert->execute($arr_insert);
     }
     public function getUserLogin($email, $password) {
         $sql_select_one =
             "SELECT * FROM users WHERE 
            `email` = :email AND `password` = :password AND `status`= 1";
         $obj_select_one =
             $this->connection->prepare($sql_select_one);
         //truyền giá trị thật cho các placeholder trong câu truy vấn
         $arr_select = [
             ':email' => $email,
             ':password' => $password
         ];
         //thực thi truy vấn
         $obj_select_one->execute($arr_select);
         $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
         return $user;
     }
 }