<?php
 class HomeController extends Controller
 {
     public function index()
     {
        $this->content=$this->render("Mvc/backend/views/Home/home.php");
        require_once 'Mvc/backend/views/layouts/main.php';
     }

 }