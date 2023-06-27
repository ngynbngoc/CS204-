<?php

class ProductController extends Controller{

    /* ------------------------------- properties ------------------------------- */
    public $product_id;
    public $product_name;
    public $product_price;
    public $seller_id;
    public $quantity;
    
    
    //array
    public $product ;
    public $products = [];
    



    /* ------------------------------- constructor ------------------------------ */
    public function __construct(){
        parent::__construct();
    }



    /* -------------------------------- functions ------------------------------- */
    public function getProduct($id){
        $this->product_id = $id;

        //fetch Product info (seller info included)
        $pd_model = new Product($this->conn);
        $product = $pd_model->fetchProduct($this->product_id);
        
        $products = $pd_model->fetchAllProducts();

        //fetch Comment info
        //$cm_model = new Comment($this->conn);
        //$comment = $cm_model->fetchAllComments($this->id); //$this->id = comment.product_id

        include "views/product.php";

    }


    public function getAllProducts(){
        $pd_model = new Product($this->conn);
        $products = $pd_model->fetchAllProducts();

        include "views/home.php";
    }
    
}
