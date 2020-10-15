<?php
class Controller {
    /**
     * Controller constructor.
     */
    public function __construct()
    {
        if(isset($_GET["area"]) && strtolower($_GET["area"])== strtolower("Backend") )
        {
            if (!isset($_SESSION["user"]) && $_GET["controller"] != 'login') {
                $_SESSION["error"] = " Bạn chưa đăng nhập";
                header("location:index.php?area=backend&controller=login");
                exit();
            }
        }
    }
    public $error=[];
    public $content;
    public function render($file, $variables = []) {
        extract($variables);
        ob_start();
        require_once $file;
        $view = ob_get_clean();
        return $view;
    }
}