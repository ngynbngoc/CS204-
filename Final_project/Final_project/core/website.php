<?php

Router::get("", function(){
    $home = new HomeController;
    $home->backToHomepage();
});

Router::get("contact", function(){
    include "views/contact.php";
});

Router::get("product/get/{id}", function($id){
    $product = new ProductController;
    $product->getProduct($id);
});

Router::get("login", function(){
    include "views/login.php";
});

Router::get("create/user", function(){
    $user = new UserController;
    $user->createUser();

});

Router::get("logout", function(){
    $_SESSION = [];
    session_destroy();
    header("Location:" . ROOT);
});


Router::get("cart", function(){
    include "views/cart.php";
});

Router::get("cart/{id}", function($id){
    $cart = new CartController;
    $cart->getCart($id);
    $cart->calTotalPrice();
    
});

//id = user_id
Router::post("cart/{id}", function($id){
    $cart = new CartController;
    $cart->getCart($id);
    $cart->calTotalPrice();
});


Router::post("login", function(){
    $user = new UserController;
    $user->validateLogin();
    
});

Router::post("create/user", function(){
    $user = new UserController;
    $user->createUser();
});

if(Router::$found == false){
    include "views/_404.php";
}
