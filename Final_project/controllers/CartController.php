<?php

class CartController extends Controller{

    
    /* ------------------------------- properties ------------------------------- */
    public $cart_id;

    public $cart = [];
    

    /* --------------------------------- constructs -------------------------------- */
    public function __construct(){
        parent::__construct();
    }


    /* --------------------------------- method --------------------------------- */
    public function getCart($id){
        $cart_model = new Cart($this->conn);
        $this->cart = $cart_model->fetchCart($id);

        include "views/cart.php";
    }


}