<?php
require_once  "Mvc/Backend/Models/Login.php";
    class LoginController extends Controller
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
                    header
                    ('Location:index.php?area=backend&controller=login');
                    exit();
                }
            }
        }
            $this->content=$this->render("Mvc/backend/views/users/register.php");
            require_once  "Mvc/backend/views/layouts/main_login.php";
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
                        header('Location: index.php?area=backend&controller=login');
                        exit();
                    }
                    else if($user["status"] == 0)
                    {
                        $_SESSION['error'] = 'Bạn không có quyền truy cập trang này';
                        header('Location: index.php?area=backend&controller=login');
                        exit();
                    }
                    else {
                        $_SESSION['success'] = 'Đăng nhập thành công';
                        $_SESSION['user'] = $user;
                        header('Location: index.php?area=backend&controller=home');
                        exit();
                    }
                }
            }
            $this->content=$this->render("Mvc/backend/views/users/Login.php");
            require_once  "Mvc/backend/views/layouts/main_login.php";
        }
//        logout
        public function logout() {
            unset($_SESSION['user']);
            $_SESSION['success'] = ' Logout thành công';
            header('Location: index.php?area=backend&controller=login');
            exit();
        }

    }

?>