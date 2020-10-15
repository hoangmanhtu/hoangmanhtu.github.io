<?php
require_once 'Mvc/frontend/models/Product.php';
class CartController extends Controller
{
    public function __construct()
    {
        if(isset($_SESSION["cart"])== false)
            $_SESSION["cart"]=array();
    }
    public function add()
    {
        $id=$_GET["id"];
        $product_model=new Product();
        $product=$product_model->getById($id);
        $cart=
            [
                "name" =>$product["title"],
                "price" =>$product["price"],
                "avatar" => $product["avatar"],
                "discount" => $product["discount"],
                "quality" => 1
            ];

        if(!isset($_SESSION["cart"]))
        {
            $_SESSION["cart"][$id] = $cart ;
        }
        else
        {
            if(!array_key_exists($id , $_SESSION["cart"]))
            {
                $_SESSION["cart"][$id] = $cart;
            }
            else
            {
                $_SESSION["cart"][$id]["quality"]++;
            }
        }
        $url_redirect=$_SERVER["SCRIPT_NAME"].'/gio-hang-cua-ban';
        header("location:  $url_redirect");
        exit();
        $this->content=$this->render('Mvc/frontend/views/carts/index.php');
        require_once 'Mvc/frontend/views/layouts/main.php';
    }
    public function index()
    {

        if(isset($_POST["submit"]))
        {
            foreach ($_SESSION["cart"] as $product_id=>$cart)
            {
                if( $_POST[$product_id] == 0)
                {
                    unset($_SESSION['cart'][$product_id]);
                }
                else {
                    $_SESSION["cart"][$product_id]["quality"] = $_POST[$product_id];
                }
            }
            $_SESSION["success"]= "Update sản phẩm thành công";
        }
        $this->content=$this->render(
            'Mvc/frontend/views/carts/index.php');
        require_once "Mvc/frontend/views/layouts/main.php";
    }
    public function delete()
    {
        $product_id=$_GET['id'];
        unset($_SESSION["cart"][$product_id]);
        if(empty($_SESSION["cart"]))
        {
            unset($_SESSION["cart"]);
        }
        $_SESSION["success"] =" Xóa sản phẩm khỏi giỏ hàng thành công";
        $url_redireact=$_SERVER["SCRIPT_NAME"]."/gio-hang-cua-ban";
        header("location: $url_redireact ");
        exit();
    }
    public function destroy()
    {
        $_SESSION['cart'] = array();
        $url_redireact=$_SERVER["SCRIPT_NAME"]."/gio-hang-cua-ban";
        header("location: $url_redireact ");
    }
}
