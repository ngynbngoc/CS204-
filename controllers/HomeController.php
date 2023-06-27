<?php

class HomeController extends Controller{


    /* -------------------------------- construct ------------------------------- */
    public function __construct(){
        parent::__construct();
    }

    /* --------------------------------- methods -------------------------------- */
    public function backToHomepage(){
        $product_md = new ProductController;
        $product_md->getAllProducts();
        
    }
    
}