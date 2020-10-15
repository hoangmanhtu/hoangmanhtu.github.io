<?php
require_once "Mvc/Backend/Models/Producer.php";
 class ProducerController extends Controller
 {
     public function index()
     {
         $producer_model=new Producer();
         $producers=$producer_model->getAll();
         $arr_output= [
             'producers' =>$producers
         ];
         $this->content=$this->render("Mvc/backend/views/producers/index.php",$arr_output);
         require_once "Mvc/backend/views/layouts/main.php";
     }
//     thêm NSX
    public function create()
    {
        if(isset($_POST["submit"])) {
            $name = $_POST["name"];
            $description = $_POST['description'];
            $status = $_POST["status"];
            $avatar_file = $_FILES["avatar"];
            if (empty($name)) {
                $this->error = " * Name không được để trống";
            }
            if (empty($description)) {
                $this->error = " * Mô Tả không được để trống";
            }
            if ($avatar_file["error"] == 0) {
                $extension_arr = ["jpg", "png", "gif", "jpeg"];
                $extension = pathinfo($avatar_file["name"], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                if (!in_array($extension, $extension_arr)) {
                    $this->error = " * Phải upload đúng File ảnh";
                }
            }
            if (empty($this->error)) {
                $avatar = "";
                if ($avatar_file['error'] == 0) {
                    $dir_uploads = __DIR__ . '/../../../assets/uploads/producers';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    $avatar = time() . '-' . $avatar_file['name'];
                    move_uploaded_file($avatar_file['tmp_name'], $dir_uploads . '/' . $avatar);
                }
                $producer_model=new Producer();
                $producer_model->name = $name;
                $producer_model->description = $description;
                $producer_model->status = $status;
                $producer_model->avatar = $avatar;
                $is_insert = $producer_model->insert();
                if ($is_insert) {
                    $_SESSION["success"] = " Thêm Mới Thành Công";
                } else {
                    $_SESSION["error"] = " Thêm Mới Thất Bại";
                }
                header("location:index.php?area=backend&controller=producer");
                exit();
            }
        }
        $this->content=$this->render("Mvc/backend/views/producers/create.php");
        require_once "Mvc/backend/views/layouts/main.php";
    }
//    chi tiết NSX
    public function detail()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?area=backend&controller=producer');
            exit();
        }
        $id = $_GET['id'];
        $producer_model=new Producer();
        $producer=$producer_model->getById($id);
        $this->content=$this->render("Mvc/backend/views/producers/detail.php",["producer"=>$producer]);
        require_once 'Mvc/backend/views/layouts/main.php';
    }
//    update NSX
    public function update()
    {
        if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
            $_SESSION["error"] = " ID không hợp lệ";
            header("location:index.php?area=backend&controller=producer");
            exit();
        }
        $id = $_GET["id"];
        $producer_model = new Producer();
        $producer = $producer_model->getById($id);
        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $description = $_POST["description"];
            $status = $_POST["status"];
            $avatar_file = $_FILES["avatar"];
            if (empty($name)) {
                $this->error = " * Name không được để trống";
            }
            if (empty($description)) {
                $this->error = " * Mô Tả không được để trống";
            }

            if ($avatar_file["error"] == 0) {

                $arr_extentsion = ["png", "jpg", "jpeg", "gif"];
                $extentsion = pathinfo($avatar_file["name"], PATHINFO_EXTENSION);
                $extentsion = strtolower($extentsion);
                if (!in_array($extentsion, $arr_extentsion)) {
                    $this->error = " * Cần upload đúng file ảnh ";
                }
            }
            if (empty($this->error)) {
                $avatar = $producer["avatar"];
                    if (!empty($avatar_file["name"][0])) {
                        $producer_model = new Producer();
                        $producer_model->images($id);
                        $dir_uploads = __DIR__ . "/../../../assets/uploads/producers";
                        if (!file_exists($dir_uploads)) {
                            mkdir($dir_uploads);
                        }
                        $avatar = time() . "-" . $avatar_file["name"];
                        move_uploaded_file($avatar_file['tmp_name'], $dir_uploads . '/' . $avatar);
                    }
                    $producer_model = new Producer();
                    $producer_model->name = $name;
                    $producer_model->avatar = $avatar;
                    $producer_model->description = $description;
                    $producer_model->status = $status;
                    $producer_model->updated_at = date('Y-m-d H:i:s');
                    $is_update = $producer_model->update($id);
                    if ($is_update) {
                        $_SESSION['success'] = 'Update thành công';
                    } else {
                        $_SESSION['error'] = 'Update thất bại';
                    }
                    header("location:index.php?area=backend&controller=producer");
                    exit();
                }
        }
        $this->content = $this->render("Mvc/Backend/views/producers/update.php", ["producer" => $producer]);
        require_once "Mvc/Backend/views/layouts/main.php";
    }
//    xóa NSX
    public function  delete()
    {
        if(!isset($_GET["id"]) || !is_numeric($_GET["id"]))
        {
            $_SESSION["error"] =" ID không hợp lệ";
            header("location : index.php?area=backend&controller=producer");
        }
        $id=$_GET["id"];
        $producer_model=new Producer();
        $producer_model->images($id);
        $is_delete=$producer_model->delete($id);
        if($is_delete)
        {
            $_SESSION["success"] = " Xóa Thành Công";
        }
        else
        {
            $_SESSION["error"] = " Xóa Thất Bại ";
        }
        header("location:index.php?area=backend&controller=producer");
        exit();

    }
 }