<?php

if(isset($_POST["addCartBtn"])){
    $c = new CartController();
    $current_Cart = $c->getCurrentCart($_SESSION['id']);
    $cart_id = $current_Cart[0]['id'];

    
    $product_list = [];
    foreach ($cart as $item) {
        array_push($product_list, $item['product_id']);
    }
    

    //if product_id is not in the current cart's products -> add new
    if(!in_array($_POST['product_id'], $product_list)){
        $c->insertCart($_POST['product_id'], $cart_id, $_POST['quantity'], $_POST['price']);
    }
    
    //if product already in cart -> quantity inc
    if(in_array($_POST['product_id'], $product_list)){
       $c->editQty($_POST['quantity'], $_POST['product_id'], $_SESSION['id'], $cart_id);
    }

    header("Location: ". ROOT. "cart/" . $_SESSION['id']);
    
    
}


?>