<?php

Router::get("", function(){
    $home = new HomeController;
    $home->backToHomepage();
});


Router::get("product/get/{id}", function($id){
    $product = new ProductController;
    $product->getProduct($id);
});


if(Router::$found == false){
    include "views/_404.php";
}
