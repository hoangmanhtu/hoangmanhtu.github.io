<?php
require_once  "Mvc/Frontend/Models/Login.php";
require_once  "Mvc/Frontend/Models/Oder.php";
require_once  "Mvc/Frontend/Models/OderDetail.php";
 class  LoginController extends Controller
 {
//        validate email
    public function validateEmail()
    {
        $email =  $_POST["email"];
        $user_model = new Login();
        $user = $user_model->getUser($email);
        if(!empty($user))
        {
            echo "True";
        }
        else
        {
            echo "false";
        }
    }
    public function register()
    {
        if(isset($_POST["submit"]))
        {
            $fullname=$_POST["fullname"];
            $email=$_POST["email"];
            $phone=$_POST["phone"];
            $password=$_POST["password"];
            $status=$_POST["status"];
            $confirm_password=$_POST["confirm_password"];
            if(empty($fullname))
            {
                $this->error=" * Họ và tên không Được Để Trống";
            }
            if(empty($email))
            {
                $this->error=" * Email không Được Để Trống";
            }
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = " * Phải đúng định dạng Email";
            }
            if(empty($phone))
            {
                $this->error=" * Số điện thoại Không Được Để Trống";
            }
            if(empty($password))
            {
                $this->error=" * Password Không Được Để Trống";
            }
            if(empty($confirm_password))
            {
                $this->error=" * Confirm Password Không Được Để Trống";
            }
            else if ($password != $confirm_password)
            {
                $this->error=" * Confirm Password chưa đúng";
            }
            if(empty($this->error))
            {
                $user_model=new Login();
                $user=$user_model->getUser($email);
                if(!empty($user))
                {
                    $this->error=" * Email đã được đăng ký";
                }
                else
                {
                    $user_model->status=$status;
                    $user_model->fullname=$fullname;
                    $user_model->email=$email;
                    $user_model->phone = $phone;
                    $user_model->password = md5($password);
                    $is_register = $user_model->register();
                    if($is_register) {
                        $_SESSION['success'] = 'Đăng ký thành công';
                    } else {
                        $_SESSION['error'] = 'Đăng ký thất bại';
                    }

                    $url_redirect = $_SERVER["SCRIPT_NAME"] . "/dang-nhap";
                    header("Location: $url_redirect");
                    exit();
                }
            }
        }
        $this->content=$this->render("Mvc/frontend/views/login/register.php");
        require_once  "Mvc/frontend/views/layouts/main.php";
    }
//
    public function index()
    {
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (empty($email)) {
                $this->error = ' * Tên đăng nhập không được để trống';
            }
            if (empty($password)) {
                $this->error = ' * Mật khẩu không được để trống';
            }
            if (empty($this->error)) {
                $user_model = new Login();
                $password = md5($password);
                $user = $user_model->getUserLogin($email, $password);
                if (empty($user)) {
                    $_SESSION['error'] = 'Sai username hoặc password';
                    $url_redirect = $_SERVER["SCRIPT_NAME"] . "/dang-nhap";
                    header("Location: $url_redirect");
                    exit();
                } else {
                    $_SESSION['success'] = 'Đăng nhập thành công';
                    $_SESSION['user_account'] = $user;
                    header('Location: index.php');
                    exit();
                }
            }
        }
        $this->content=$this->render("Mvc/frontend/views/login/login.php");
        require_once  "Mvc/frontend/views/layouts/main.php";
    }
//        logout
    public function logout() {
        unset($_SESSION['user_account']);
        $_SESSION['success'] = ' Logout thành công';
        $url_redirect = $_SERVER["SCRIPT_NAME"] . "/dang-nhap";
        header("Location: $url_redirect");
        exit();
    }
    public function history()
    {
       $id=$_SESSION["user_account"]["id"];
        $order_model=new Oder();
        $orders=$order_model->listOrder($id);
        $this->content=$this->render('Mvc/frontend/views/login/shoppingcart.php',["orders" => $orders]);
        require_once 'Mvc/frontend/views/layouts/main.php';
    }
    public function historyallproduct()
    {
        $id=$_GET["id"];
        $order_model=new OderDetail();
        $products=$order_model->listProduct($id);
//        echo "<pre>";
//        print_r($products);
//        echo "</pre>";
//        die();
        $this->content=$this->render('Mvc/frontend/views/login/HistoryAllProduct.php',["products" => $products]);
        require_once 'Mvc/frontend/views/layouts/main.php';

    }
    public function delete_orders()
    {

        $id = $_GET['id'];
        $order_model=new Oder();
        $is_delete = $order_model->delete_Oder($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Ban đã hủy đơn hàng thành công';
        } else {
            $_SESSION['error'] = 'Đơn hàng có vấn đề - Hãy liên hệ với Shop để được giải quyết';
        }
        $url_redireact=$_SERVER["SCRIPT_NAME"]."/lich-su-mua-hang";
        header("location: $url_redireact ");
        exit();
    }

}

?>
