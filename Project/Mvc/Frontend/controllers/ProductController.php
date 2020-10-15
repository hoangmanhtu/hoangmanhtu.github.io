<?php
require_once  "Mvc/frontend/models/Product.php";
require_once 'Mvc/frontend/models/Category.php';
require_once 'Mvc/frontend/models/Rating.php';
 class ProductController extends Controller
 {
     public function ProductNews()
     {
         $products=new Product();
         $products=$products->ProductNews();
         $this->content=$this->render("Mvc/frontend/views/products/ProductNews.php",["products" => $products]);
         echo $this->content;
     }
     public function ProductSelling()
     {
         $products=new Product();
         $products=$products->SellingProduct();
         $this->content=$this->render("Mvc/frontend/views/products/SellingProduct.php",["products" => $products]);
         echo $this->content;
     }
     public function detail() {
         $id=$_GET["id"];
         $product_model=new Product();
         $product=$product_model->getById($id);
         $product_images=$product_model->getImages();
         $rating_model=new Rating();
         $ratings=$rating_model->All_Rating($id);
         $this->content =$this->render('Mvc/frontend/views/products/detail.php',
             [
                 "product" => $product,
                 'product_images' =>$product_images,
                 'ratings' => $ratings
             ]
         );
         require_once 'Mvc/frontend/views/layouts/main.php';
     }
     public function showAll()
    {
        $params=[];
        if(isset($_POST['filter'])) {
            $str_producer_id = '';
            $str_price = '';
            if (isset($_POST["producer"])) {
                $str_producer_id = implode(",", $_POST['producer']);
                $str_producer_id = "($str_producer_id)";
                $str_producer_id = "products.producer_id IN $str_producer_id";
                $params["str_producer_id"] = $str_producer_id;
            }
            if (isset($_POST["price"])) {
                foreach ($_POST["price"] as $price) {
                    switch ($price) {
                        case 1:
                            $str_price .= " OR (products.price < 2000000) ";
                            break;
                        case 2:
                            $str_price .= " OR (products.price BETWEEN 2000000 AND 4000000) ";
                            break;
                        case 3 :
                            $str_price .= " OR (products.price BETWEEN 4000000 AND 10000000) ";
                            break;
                        case 4 :
                            $str_price .= " OR (products.price > 10000000) ";
                            break;
                    }
                }
                $str_price = substr($str_price, 3);
                $str_price = "($str_price)";
                $params["str_price"] = $str_price;
            }
        }
        $pageSize = 9;
        $page = "";
        if (isset($_POST["page"]) && is_numeric($_POST["page"])) {
            $page = $_POST["page"];
        } else {
            $page = 1;
        }
        $product_model = new Product();
        $count = $product_model->countTotal($params);
        $numPage = ceil($count / $pageSize);
        $products = $product_model->Show_All($pageSize, $page, $params);
        $this->content = $this->render('Mvc/frontend/views/products/Show_All.php',
            ["products" => $products,
                "numPage" => $numPage,
                "page" => $page
            ]
        );
            require_once 'Mvc/frontend/views/layouts/main.php';
    }
     public function search()
     {
         $params=[];
         if(isset($_POST['filter'])) {
             $str_producer_id='';
             $str_price='';
             if(isset($_POST["producer"]))
             {
                 $str_producer_id=implode(",",$_POST['producer']);
                 $str_producer_id="($str_producer_id)";
                 $str_producer_id="products.producer_id IN $str_producer_id";
                 $params["str_producer_id"] =$str_producer_id;
             }
             if(isset($_POST["price"]))
             {
                 foreach ($_POST["price"] as $price)
                 {
                     switch ($price)
                     {
                         case 1:
                             $str_price .= " OR (products.price < 2000000) ";
                             break;
                         case 2:
                             $str_price .= " OR (products.price BETWEEN 2000000 AND 4000000) ";
                             break;
                         case 3 :
                             $str_price .= " OR (products.price BETWEEN 4000000 AND 10000000) ";
                             break;
                         case 4 :
                             $str_price .= " OR (products.price > 10000000) ";
                             break;
                     }
                 }
                 $str_price=substr($str_price,3);
                 $str_price="($str_price)";
                 $params["str_price"]=$str_price;
             }
         }
         $pageSize = 9;
         $page = "";
         if (isset($_POST["page"]) && is_numeric($_POST["page"])) {
             $page = $_POST["page"];
         } else
         {
             $page = 1;
         }
         $product_model = new Product();
         $count = $product_model->countTotal($params);
         $numPage = ceil($count / $pageSize);
         $products = $product_model->Show_All($pageSize, $page,$params);
         $this->content = $this->render('Mvc/frontend/views/products/search.php',
             ["products" => $products,
                 "numPage" => $numPage,
                 "page" => $page
             ]
         );
         echo $this->content;
     }


     public function ProductCategory()
     {
         $params=[];
         if(isset($_POST['filter'])) {
             $str_producer_id='';
             $str_price='';
             if(isset($_POST["producer"]))
             {
                 $str_producer_id=implode(",",$_POST['producer']);
                 $str_producer_id="($str_producer_id)";
                 $str_producer_id="products.producer_id IN $str_producer_id";
                 $params["str_producer_id"] =$str_producer_id;
             }
             if(isset($_POST["price"]))
             {
                 foreach ($_POST["price"] as $price)
                 {
                     switch ($price)
                     {
                         case 1:
                             $str_price .= " OR (products.price < 2000000) ";
                             break;
                         case 2:
                             $str_price .= " OR (products.price BETWEEN 2000000 AND 4000000) ";
                             break;
                         case 3 :
                             $str_price .= " OR (products.price BETWEEN 4000000 AND 10000000) ";
                             break;
                         case 4 :
                             $str_price .= " OR (products.price > 10000000) ";
                             break;
                     }
                 }
                 $str_price=substr($str_price,3);
                 $str_price="($str_price)";
                 $params["str_price"]=$str_price;
             }
         }
         $id=$_GET["id"];
         $page = isset($_GET["page"])&&is_numeric($_GET["page"]) ? $_GET["page"] : 1;
         $pageSize = 4;
         $product_model=new Product();
         $count=$product_model->countTotalId($id,$params);
         $numPage=ceil($count/$pageSize);
         $products=$product_model->ProductCategory($id,$pageSize,$page,$params);
//         echo "<pre>";
//         print_r($products);
//         echo "</pre>";
//         die();
         $category_model=new Category();
         $category=$category_model->getDetail($id);
         $this->content =$this->render('Mvc/frontend/views/products/ProductCategory.php',
             ["products" => $products,
                 "numPage" => $numPage,
                 "page" => $page,
                 "category" => $category,
             ]
         );
         require_once 'Mvc/frontend/views/layouts/main.php';
     }
     public function searchProduct()
     {
         $search=$_POST["search"];
         $product_model=new Product();
         $products=$product_model->search($search);
         $this->content=$this->render("Mvc/frontend/views/products/searchProduct.php",['products' => $products] );
         echo $this->content;
     }
 }