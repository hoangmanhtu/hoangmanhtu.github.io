<?php
require_once "Mvc/Backend/Models/Category.php";
   class CategoryController extends Controller{
       public function index()
       {
           $category_model=new Category();
           $categories=$category_model->getAll();
           $this->content=$this->render("Mvc/backend/views/categories/index.php",["categories" => $categories]);
           require_once "Mvc/backend/views/layouts/main.php";
       }
//       kiểm tra validate
    public function validateCategory()
    {
        $name =  $_POST["c_name"];
        $category_model = new Category();
        $category_title = $category_model->getCategory($name);
        if(!empty($category_title) )
        {
            echo "True";
        }
        else
        {
            echo "false";
        }
    }
       public function create()
       {
           if(isset($_POST["submit"]))
           {
               $name = $_POST["name"];
               $description = $_POST['description'];
               $status = $_POST["status"];
               $avatar_file = $_FILES["avatar"];
               $hotcategory=isset($_POST["hotcategory"])? 1 : 0;
               if (empty($name)) {
                   $this->error = " * Danh mục không được để trống";
               }
               if ($avatar_file["error"] == 0) {
                   $extension_arr = ["jpg", "png", "gif", "jpeg"];
                   $extension = pathinfo($avatar_file["name"], PATHINFO_EXTENSION);
                   $extension = strtolower($extension);
//                   $size = $avatar_file["size"];
//                   $size = $size / 1024 / 1024;
//                   $size = round($size, 2);
                   if (!in_array($extension, $extension_arr)) {
                       $this->error = " * Phải upload đúng File ảnh";
                   }
               }
               if (empty($this->error)) {
                   $avatar = "";
                   if ($avatar_file['error'] == 0) {
                       $dir_uploads = __DIR__ . '/../../../assets/uploads/categories';
                       if (!file_exists($dir_uploads)) {
                           mkdir($dir_uploads);
                       }
                       $avatar = time() . '-' . $avatar_file['name'];
                       move_uploaded_file($avatar_file['tmp_name'], $dir_uploads . '/' . $avatar);
                   }

                   $category_model = new Category();
                   $category_title=$category_model->getCategory($name);
                   if(!empty($category_title))
                   {
                       $this->error="Tên danh mục đã tồn tại";
                   }
                   else
                   {
                       $category_model->name = $name;
                       $category_model->hotcategory=$hotcategory;
                       $category_model->description = $description;
                       $category_model->status = $status;
                       $category_model->avatar = $avatar;
                       $is_insert = $category_model->insert();
                       if ($is_insert) {
                           $_SESSION["success"] = " Thêm Mới Thành Công";
                       } else {
                           $_SESSION["error"] = " Thêm Mới Thất Bại";
                       }
                       header("location:index.php?area=backend&controller=category");
                       exit();
                    }
               }
           }
           $this->content=$this->render("Mvc/backend/views/categories/create.php");
           require_once "Mvc/backend/views/layouts/main.php";
       }
//       category detail
        public function detail()
        {
            if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
                $_SESSION['error'] = 'ID không hợp lệ';
                header('Location: index.php?area=backend&controller=category');
                exit();
            }
            $id = $_GET['id'];
            $category_model=new Category();
            $category=$category_model->getById($id);
            $this->content=$this->render("Mvc/backend/views/categories/detail.php",["category"=>$category]);
            require_once 'Mvc/backend/views/layouts/main.php';
        }
    //        update danh mục
    public function update()
    {
        if(!isset($_GET["id"]) || !is_numeric($_GET["id"]))
        {
            $_SESSION["error"] = " ID không hợp lệ";
            header("location:index.php?area=backend&controller=category");
            exit();
        }
        $id=$_GET["id"];
        $category_model = new Category();
        $category=$category_model->getById($id);
        if(isset($_POST["submit"]))
        {
            $name=$_POST["name"];
            $description=$_POST["description"];
            $status=$_POST["status"];
            $avatar_file=$_FILES["avatar"];
            $hotcategory=isset($_POST["hotcategory"]) ? 1: 0;
            if (empty($name)) {
                $this->error = " * Name không được để trống";
            }
            if($avatar_file["error"]==0)
            {
                $arr_extentsion=["png","jpg","jpeg","gif"];
                $extentsion=pathinfo($avatar_file["name"],PATHINFO_EXTENSION);
                $extentsion=strtolower($extentsion);
                if(!in_array($extentsion,$arr_extentsion))
                {
                    $this->error = " * Cần upload đúng file ảnh ";
                }
            }
            if(empty($this->error)) {
                $avatar = $category["avatar"];
                if (!empty($avatar_file["name"][0])) {
                    $category_model = new Category();
                    $category_model->images($id);
                    $dir_uploads = __DIR__ . "/../../../assets/uploads/categories";
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    $avatar = time() . "-" . $avatar_file["name"];
                    move_uploaded_file($avatar_file['tmp_name'], $dir_uploads . '/' . $avatar);
                }
                $category_model = new Category();
                $category_model->name = $name;
                $category_model->avatar = $avatar;
                $category_model->description = $description;
                $category_model->status = $status;
                $category_model->hotcategory=$hotcategory;
                $category_model->updated_at = date('Y-m-d H:i:s');
                $is_update = $category_model->update($id);
                if ($is_update) {
                    $_SESSION['success'] = 'Update thành công';
                } else {
                    $_SESSION['error'] = 'Update thất bại';
                }
                header("location:index.php?area=backend&controller=category");
                exit();
            }
        }
        $this->content=$this->render("Mvc/backend/views/categories/update.php",["category" => $category]);
        require_once "Mvc/backend/views/layouts/main.php";
    }
    //        xóa danh mục
    public function delete()
    {
        if(!isset($_GET["id"]) || !is_numeric($_GET["id"]))
        {
            $_SESSION["error"] =" ID không hợp lệ";
            header("location : index.php?area=backend&controller=category");
        }
        $id=$_GET["id"];
        $category_model=new Category();
        $category_model->images($id);
        $is_delete=$category_model->delete($id);
        if($is_delete)
        {
            $_SESSION["success"] = "Xóa Thành Công";
        }
        else
        {
            $_SESSION["error"] = " Xóa Thất Bại ";
        }
        header("location:index.php?area=backend&controller=category");
        exit();
    }


   }