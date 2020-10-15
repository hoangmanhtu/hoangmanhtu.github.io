<?php
    session_start();
    require_once 'App/controllers/controller.php';
    require_once 'App/configs/model.php';
    require_once 'App/helpers/helper.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $area=isset($_GET["area"]) ? $_GET["area"] : "Frontend";
    $controller=isset($_GET["controller"]) ? $_GET["controller"] : "Home";
    $action=isset($_GET["action"]) ? $_GET["action"] : "index";
    $controller=ucfirst($controller);
    $controller.="Controller";
    $path_controller="controllers/$controller.php";
    $file_controller="Mvc/$area/$path_controller";
    if(!file_exists($file_controller))
    {
      die("Trang bạn tìm không tồn tại") ;
    }
    require_once "$file_controller";
    $object=new $controller();
    if(!method_exists($object,$action))
    {
        die("Không tồn tại phương thức $action trong class $controller");
    }
    $object->$action();
?>