<?php
require_once "Mvc/backend/models/product.php";
require_once "Mvc/backend/models/category.php";
require_once "Mvc/backend/models/producer.php";
require_once 'Mvc/backend/models/product_images.php';
    class ProductController extends Controller
    {
        //lấy danh sách sản phẩm
        public function index()
        {
            $pageSize=5;
            $page="";
            if(isset($_POST["page"]) && is_numeric($_POST["page"]))
            {
                $page=$_POST["page"];
            }
            else
            {
                $page=1;
            }
            $product_model=new Product();
            $countProduct=$product_model->countTotal();
            $numPage=ceil($countProduct/$pageSize);
            $product_model=new product();
            $products=$product_model->getAll($pageSize,$page);
            $output=[
                "products" => $products,
                "numPage" => $numPage,
                "page" => $page
                ];
            $this->content=$this->render("Mvc/backend/views/products/index.php",$output);
            require_once "Mvc/backend/views/layouts/main.php";
        }
        public function search()
        {

            $pageSize=5;
            $page="";

            if(isset($_POST["page"]) && is_numeric($_POST["page"]))
            {
                $page=$_POST["page"];
            }
            else
            {
                $page=1;
            }
            $product_model=new Product();
            if(isset($_POST["query"]) && $_POST["query"] != "")
            {
                $search=$_POST["query"];
                $countProductSearch=$product_model->countTotalSearch($search);
                $numPage=ceil($countProductSearch/$pageSize);
                $products=$product_model->search($search,$pageSize,$page);
                $this->content=$this->render("Mvc/backend/views/products/search.php", [
                    "products" => $products,
                    "numPage" => $numPage,
                    "page" => $page]);
                echo $this->content;
            }
            else
            {
                $countProduct=$product_model->countTotal();
                $numPage=ceil($countProduct/$pageSize);
                $products=$product_model->getAll($pageSize,$page);
                $this->content=$this->render("Mvc/backend/views/products/search.php", ["products" => $products,
                    "numPage" => $numPage,
                    "page" => $page]);
                echo $this->content;
            }

        }
//        validate sản phẩm
        public function validateProduct()
        {
            $title =  $_POST["p_title"];
            $product_model = new Product();
            $product_title = $product_model->getProduct($title);
            if(!empty($product_title) )
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
            $category_model=new Category();
            $categories=$category_model->getAll();
            $producer_model=new Producer();
            $producers=$producer_model->getAll();
            if(isset($_POST["submit"])) {
                echo "<pre>";
                print_r($_POST);
                echo "</pre>";
                echo "<pre>";
                print_r($_FILES);
                echo "</pre>";
                $category_id = $_POST['category_id'];
                $producer_id = $_POST['producer_id'];
                $title = $_POST['title'];
                $price = $_POST['price'];
                $summary = $_POST['summary'];
                $content = $_POST['content'];
                $status = $_POST['status'];
                $quality = $_POST["quality"];
                $discount = $_POST["discount"];
                $hotproduct = isset($_POST["hotproduct"]) ? 1 : 0;
                $avatar_file = $_FILES["avatar"];
                $avatars = $_FILES["avatars"];
                if (empty($category_id)) {
                    $this->error = " Vui lòng chọn 1 danh mục";
                }
                if (empty($producer_id)) {
                    $this->error = " Vui lòng chọn 1 thương hiệu or NSX";
                }
                if (empty($title)) {
                    $this->error = "Tên sản phẩm không được để trống";
                }

                if (empty($quality)) {
                    $this->error = "Số lượng của sản phẩm không được để trống";
                }
                if (empty($price)) {
                    $this->error = "Gía của sản phẩm không được để trống";
                }
                for($i=0;$i<count($avatars["name"]);$i++) {
                    $extension_arr = ["jpg", "png", "gif", "jpeg"];
                    $extension = pathinfo($avatars["name"][$i], PATHINFO_EXTENSION);
                    $extension = strtolower($extension);
                    if ($avatars["error"][$i] == 0) {
                        if (!in_array($extension, $extension_arr)) {
                            $this->error = " * Đã có 1 or nhiều file không phải file ảnh.Chỉ được tải file các ảnh jpg,png,jpeq,gif";
                        }
                    }
                    if (empty($this->error)) {
                        if ($avatars["error"][$i] == 0) {
                            $dir_uploads = __DIR__ . '/../../../assets/uploads/product_images';
                            if (!file_exists($dir_uploads)) {
                                mkdir($dir_uploads);
                            }
                            $avatar_name = time() . '-' . $avatars["name"][$i];
                            move_uploaded_file($avatars['tmp_name'][$i], $dir_uploads . '/' . $avatar_name);
                        }
                    }
                }
                if ($avatar_file["error"] == 0) {
                    $extension_arr = ["jpg", "png", "gif", "jpeg"];
                    $extension = pathinfo($avatar_file["name"], PATHINFO_EXTENSION);
                    $extension = strtolower($extension);
                    if (!in_array($extension, $extension_arr)) {
                        $this->error = " * Chỉ được tải file các ảnh jpg,png,jpeq,gif";
                    }
                }
                if (empty($this->error)) {
                    $avatar = "";
                    if ($avatar_file['error'] == 0) {
                        $dir_uploads = __DIR__ . '/../../../assets/uploads/products';
                        if (!file_exists($dir_uploads)) {
                            mkdir($dir_uploads);
                        }
                        $avatar = time() . '-' . $avatar_file['name'];
                        move_uploaded_file($avatar_file['tmp_name'], $dir_uploads . '/' . $avatar);
                    }
                    $product_model = new Product();
                    $product_model->category_id = $category_id;
                    $product_model->producer_id = $producer_id;
                    $product_model->title = $title;
                    $product_model->avatar = $avatar;
                    $product_model->price = $price;
                    $product_model->quality = $quality;
                    $product_model->hotproduct = $hotproduct;
                    $product_model->summary = $summary;
                    $product_model->content = $content;
                    $product_model->status = $status;
                    $product_model->discount = $discount;
                    $product_id = $product_model->insert();
                    if ($product_id > 0) {
                        $product_images_model = new product_images();
                        $product_images_model->product_id = $product_id;
                        for ($i = 0; $i < count($avatars["name"]); $i++) {
                            if ($avatars["error"][$i] == 0) {
                                $product_images_model->avatar = time() . '-' . $avatars["name"][$i];
                                $is_insert = $product_images_model->insert();
                            }
                        }
                    }
                    if ($is_insert) {
                        $_SESSION['success'] = 'Thêm sản phẩm thành công';
                    } else {
                        $_SESSION['error'] = 'Thêm sản phẩm thất bại';
                    }
                header('Location: index.php?area=backend&controller=product');
                exit();
                }
            }
            $this->content=$this->render("Mvc/backend/views/products/create.php",
                ["categories" => $categories,
                 "producers" => $producers]);
            require_once "Mvc/backend/views/layouts/main.php";
        }
//        update lại sản phẩm
        public function update()
        {
            if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
                $_SESSION['error'] = 'ID không hợp lệ';
                header('Location: index.php?area=bakcend&controller=product');
                exit();
            }
            $id = $_GET['id'];
            $product_model = new Product();
            $product = $product_model->getById($id);
            $category_model = new Category();
            $categories = $category_model->getAll();
            $producer_model = new Producer();
            $producers = $producer_model->getAll();
            $product_images_model = new product_images();
            $product_images = $product_images_model->get_images($id);
            if (isset($_POST["submit"])) {
//                echo "<pre>";
//                print_r($_POST);
//                echo "</pre>";
//                echo "<pre>";
//                print_r($_FILES);
//                echo "</pre>";
                $category_id = $_POST['category_id'];
                $producer_id = $_POST['producer_id'];
                $title = $_POST['title'];
                $price = $_POST['price'];
                $summary = $_POST['summary'];
                $content = $_POST['content'];
                $status = $_POST['status'];
                $quality = $_POST["quality"];
                $discount = $_POST["discount"];
                $hotproduct = isset($_POST["hotproduct"]) ? 1 : 0;
                $avatar_file = $_FILES["avatar"];
                $avatars = $_FILES["avatars"];
                if (empty($category_id)) {
                    $this->error = " Vui lòng chọn 1 danh mục";
                }
                if (empty($producer_id)) {
                    $this->error = " Vui lòng chọn 1 thương hiệu or NSX";
                }
                if (empty($title)) {
                    $this->error = "Tên sản phẩm không được để trống";
                }

                if (empty($quality)) {
                    $this->error = "Số lượng của sản phẩm không được để trống";
                }
                if (empty($price)) {
                    $this->error = "Gía của sản phẩm không được để trống";
                }
                for ($i = 0; $i < count($avatars["name"]); $i++) {
                    $extension_arr = ["jpg", "png", "gif", "jpeg"];
                    $extension = pathinfo($avatars["name"][$i], PATHINFO_EXTENSION);
                    $extension = strtolower($extension);
                    if ($avatars["error"][$i] == 0) {
                        if (!in_array($extension, $extension_arr)) {
                            $this->error = " * Đã có 1 or nhiều file không phải file ảnh.Chỉ được tải file các ảnh jpg,png,jpeq,gif";
                        }
                    }
                    if (empty($this->error)) {
                        if(!empty($avatars["name"][0]))
                        {
                            $product_images_model->detail_images($id);
                            $dir_uploads = __DIR__ . '/../../../assets/uploads/product_images';
                            if (!file_exists($dir_uploads)) {
                                mkdir($dir_uploads);
                            }
                            for($i=0;$i< count($avatars["name"]);$i++)
                            {
                            $avatar_name = time() . '-' . $avatars["name"][$i];
                            move_uploaded_file($avatars['tmp_name'][$i], $dir_uploads . '/' . $avatar_name);
                            $product_images_model->product_id = $id;
                            $product_images_model->avatar =time().'-'.$avatars["name"][$i];
                            $is_insert = $product_images_model->insert();
                            }
                        }
                    }
                }
                if ($avatar_file["error"] == 0) {
                    $extension_arr = ["jpg", "png", "gif", "jpeg"];
                    $extension = pathinfo($avatar_file["name"], PATHINFO_EXTENSION);
                    $extension = strtolower($extension);
                    if (!in_array($extension, $extension_arr)) {
                        $this->error = " * Chỉ được tải file các ảnh jpg,png,jpeq,gif";
                    }
                }
                if (empty($this->error)) {
                    $avatar = $product["avatar"];
                    if (!empty($avatar_file["name"][0])) {
                        $product_model->images($id);
                        $dir_uploads = __DIR__ . '/../../../assets/uploads/products';
                        if (!file_exists($dir_uploads)) {
                            mkdir($dir_uploads);
                        }
                        $avatar = time() . '-' . $avatar_file['name'];
                        move_uploaded_file($avatar_file['tmp_name'], $dir_uploads . '/' . $avatar);
                    }
                    $product_model->category_id = $category_id;
                    $product_model->producer_id = $producer_id;
                    $product_model->title = $title;
                    $product_model->avatar = $avatar;
                    $product_model->price = $price;
                    $product_model->summary = $summary;
                    $product_model->content = $content;
                    $product_model->status = $status;
                    $product_model->quality = $quality;
                    $product_model->hotproduct = $hotproduct;
                    $product_model->discount = $discount;
                    $product_model->updated_at = date('y-m-d H:i:s');
                    $is_update = $product_model->update($id);
                    if ($is_update) {
                        $_SESSION['success'] = 'Update dữ liệu thành công';
                    } else {
                        $_SESSION['error'] = 'Update dữ liệu thất bại';
                    }
                    header('Location: index.php?area=backend&controller=product');
                    exit();
                }
            }
                    $this->content = $this->render("Mvc/backend/views/products/update.php",
                        [
                            'categories' => $categories,
                            'producers' => $producers,
                            'product' => $product,
                            'product_images' => $product_images
                        ]);
                    require_once "Mvc/backend/views/layouts/main.php";
        }
//        chi tiết sản phẩm
        public function detail()
        {
            if(!isset($_GET["id"]) || !is_numeric($_GET["id"]))
            {
                $_SESSION["error"] =" ID không hợp lệ";
                header("location:index.php?area=backend&controller=product");
                exit();
            }
            $id=$_GET["id"];
            $product_model=new Product();
            $product=$product_model->getById($id);
            $product_images_model=new product_images();
            $product_images=$product_images_model->get_images($id);
            $this->content=$this->render("Mvc/backend/views/products/detail.php",["product" => $product,
                'product_images' => $product_images
            ]);
            require_once 'Mvc/backend/views/layouts/main.php';
        }
//        xóa sản phẩm
        public function delete()
        {
            if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
                $_SESSION['error'] = 'ID không hợp lệ';
                header('Location: index.php?area=backend&controller=product');
                exit();
            }
            $id = $_GET['id'];
            $product_model = new Product();
            $product_model->images($id);
            $is_delete = $product_model->delete($id);
            $product_images_model=new product_images();
            $product_images_model->detail_images($id);
            if ($is_delete) {
                $_SESSION['success'] = 'Xóa dữ liệu thành công';
            } else {
                $_SESSION['error'] = 'Xóa dữ liệu thất bại';
            }
            header('Location: index.php?area=backend&controller=product');
            exit();
        }
    }

?>