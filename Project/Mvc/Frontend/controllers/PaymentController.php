<?php
require_once 'Mvc/frontend/models/Oder.php';
require_once 'Mvc/frontend/models/OderDetail.php';
//nhúng các file liên quan đén thư viện phpmailler để gửi mail
require_once 'nganhang/PHPMailer/src/PHPMailer.php';
require_once 'nganhang/PHPMailer/src/SMTP.php';
require_once 'nganhang/PHPMailer/src/Exception.php';
//từ khóa use tương tự vói require once
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class PaymentController extends Controller
{
    public  function index()
    {
        if(isset($_POST["submit"]))
        {
            $fullname=$_POST["fullname"];
            $address=$_POST["address"];
            $mobile=$_POST["mobile"];
            $note=$_POST["note"];
            $email=$_POST["email"];
            $method=$_POST["method"];
            $user_id=$_POST["user_id"];
            $status=$_POST["status"];
            if(empty($fullname))
            {
                $this->error="  Không được để trống họ tên";
            }
            if(empty($address))
            {
                $this->error=" Không được để trống địa chỉ người nhận";
            }
            if(empty($mobile))
            {
                $this->error=" * Không được để trống SDT";
            }
            if(empty($this->error))
            {
                $order_model=new Oder();
                $order_model->fullname=$fullname;
                $order_model->address=$address;
                $order_model->mobile=$mobile;
                $order_model->note=$note;
                $order_model->user_id=$user_id;
                $order_model->email=$email;
                $order_model->status=$status;
//                   tính tổng giá trị đơn hàng
                $total_cart=0;
                $total_discount=0;
                $total=0;
                $total_product=0;
                foreach ($_SESSION["cart"] as $cart)
                {
                    $total_item_discount=($cart["price"] * ($cart["discount"]/100)) * $cart["quality"] ;
                    $total_item=($cart["price"] * $cart["quality"]);
                    $total_product=$total_item-$total_item_discount;
                    $total_cart += $total_item;
                    $total_discount += $total_item_discount;
                    $total +=$total_product;
                }
                $order_model->price_total=$total;
                $order_model->payment_status=0;
                $order_id=$order_model->insert();
                $_SESSION["order"] =[
                    "id" => $order_id,
                    "price_total" => $total,
                    "fullname" => $fullname,
                    "email" => $email,
                    "address" => $address,
                    "mobile" => $mobile,
                ];

                if($order_id > 0)
                {
                    $order_detail_model=new OderDetail();
                    $order_detail_model->order_id=$order_id;
                    foreach ($_SESSION["cart"] as $key=>$cart)
//                        lưu thông tin vào bảng order_detail{
                    {
                        $order_detail_model->product_id=$key;
                        $order_detail_model->quality=$cart["quality"];
                        $is_insert=$order_detail_model->insert();
                    }
                    if($method == 0)
                    {
                        $_SESSION["order"] =[
                            "price_total" => $total,
                            "fullname" => $fullname,
                            "email" => $email,
                            "mobile" => $mobile,
                        ];
                        $url_redirect=$_SERVER["SCRIPT_NAME"]. "/thanh-toan-truc-tuyen";
                        header("location: $url_redirect");
                        exit();
                    }
                    else
                    {
                        $this->sendMail($email);
                        unset($_SESSION["cart"]);
                        $url_redirect=$_SERVER["SCRIPT_NAME"]."/".'cam-on';
                        header("location: $url_redirect");
                        exit();
                    }
                }
            }
        }
        $this->content=$this->render("Mvc/frontend/views/payments/index.php");
        require_once 'Mvc/frontend/views/layouts/main.php';
    }
    public function sendMail($email)
    {
        // Instantiation and passing `true` enables exceptions
        $this->content=$this->render('Mvc/frontend/views/payments/OderDetailMail.php');
        $mail = new PHPMailer(true);
        try {
            $mail->CharSet="UTF-8";
            //Server settings
//                thực tế sẽ sử dụng deuggg off
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
//    sử dụng server gmail để gửi mail
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
//    nhập tài khoản gmail cho username
            $mail->Username   = 'hoangmanhtu0809@gmail.com';                     // SMTP username
            ////password k phải là pasword gmail mà gmail có 1 cơ chế tạ password cho các ứng dụng
//    password này sẽ đọc lập với password của bạn
            $mail->Password   = 'sdywepqwzyatyzuk';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('binlun@gmail.com', 'Hoàng Mạnh Tú');
//    gửi tới ai
            $mail->addAddress($email);     // Add a recipient
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Cảm ơn bạn đã mua hành của siêu thị điệu máy T&T';
            $mail->Body    =  $this->content;
            $mail->AltBody =  '';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
//
    public function thank()
    {
        $this->content=$this->render("Mvc/frontend/views/payments/thank.php");
        require_once 'Mvc/frontend/views/layouts/main.php';
    }
    public function online()
    {
        $this->content=$this->render('nganhang/nganluong/index.php');
        echo $this->content;
    }
}

?>