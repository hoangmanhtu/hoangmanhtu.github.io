<?php
require_once  "Mvc/Frontend/Models/Category.php";
 class CategoryController extends Controller
 {
     public function CategoryHot()
     {
         $categories=new Category();
         $category=$categories->getAll();
         $this->content=$this->render("Mvc/frontend/views/categories/CategoryHot.php",["category" => $category]);
         echo $this->content;

     }
     public function MenuCategory()
     {
         $category=new Category();
         $categories=$category->MenuCategory();
         $this->content=$this->render("Mvc/frontend/views/categories/MenuCategory.php",["categories" => $categories]);
         echo $this->content;
     }
     public function Category()
     {
         $category=new Category();
         $categories=$category->MenuCategory();
         $this->content=$this->render("Mvc/frontend/views/categories/Category.php",["categories" => $categories]);
         echo $this->content;
     }
 }
