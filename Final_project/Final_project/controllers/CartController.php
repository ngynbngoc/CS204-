<?php

class CartController extends Controller{

    
    /* ------------------------------- properties ------------------------------- */
    public $user_id;
    public $total_price = 0;
    public $cart;
    

    /* --------------------------------- constructs -------------------------------- */
    public function __construct(){
        parent::__construct();
    }


    /* --------------------------------- method --------------------------------- */
    

   public function createNewCart($user_id){
        $cart_model = new Cart($this->conn);

        $cart_model->createCart($user_id);
        var_dump("new cart created");
        
        var_dump("cart already existed");
        
   }

   public function getCart($user_id){
        $this->user_id = $user_id;
        $cart_md = new Cart($this->conn);
        
        $cart = $cart_md->fetchAllProductsInCart($this->user_id);
        
        $this->cart = $cart;
        
        include "views/cart.php";
   }

   public function getCurrentCart($user_id){
        $this->user_id = $user_id;
        $cart_md = new Cart($this->conn);
     
        return $cart_md->fetchCart($this->user_id);

   }

   public function insertCart($product_id, $cart_id, $quantity, $price){
        $cart_md = new Cart($this->conn);
        $cart_md->insertIntoCartList($cart_id, $product_id,  $quantity, $price);

   }

   public function calTotalPrice(){
     $cart_md = new Cart($this->conn);
     $c = $cart_md->fetchAllProductsInCart($this->user_id);
     $total_price = 0;
     foreach ($c as $item) {
               
          $total_price = $total_price + ($item['price'] * $item['quantity']);
     }
     
     $cart_md->addTotalPrice($this->user_id, $total_price);
     
     return $total_price;
     
   }

   public function editQty($qty, $product_id, $user_id, $cart_id){

     $cart_md = new Cart($this->conn);
     $quantity = $cart_md->getProductQty($product_id, $cart_id);
     
     $quantity = $quantity['quantity'];

     $qty += $quantity;
     var_dump($qty);

     $cart_md->editQuantity($cart_id, $qty, $product_id);

   }
   

}