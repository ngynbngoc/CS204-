<?php include "views/includes/header.php"; 
include "core/Form_handle.php";
 ?>

<style>
 <?php include "views/includes/style.css"; ?>>
</style>




<!-- if login => print cart -->
<?php if($_SESSION['logged_in']):?>

<div class="jumbotron jumbotron-fluid cart_banner mb-0">
    <div class="container cart_banner">
        <div class="container cart_title">
            <h1><?php echo $_SESSION['username'];?>'s Cart</h1>
        </div>
    </div>
</div>
    <?php if(!empty($cart)):?>
        <div class="jumbotron jumbotron-fluid mt-0">
                <div class="container text-center cart_list ">
                    <?php foreach($cart as $item): ?>
                    <div class="item container mt-3">
                        <div class="row text-center">
                            <div class="col-md-4">
                                <img class="item_img" style="max-width: 150px;" src="<?php echo ROOT. $item['product_img'];?>" alt="">
                            </div>
                            <div class="col-md-4">
                                <h5><?php echo $item['product_name'];?></h5>
                                <br>
                                <h6><?php echo 'Price: $'. $item['price'];?></h6>
                            </div>

                            <div class="col-md-4">
                                <h5><?php echo "Qty: ". $item['quantity'];?></h5>
                            </div>
                        </div>

                    </div>
                    
                    <?php endforeach; ?>
                    

                    <div class="container w-90 total_price text-right mt-5">
                        <hr>
                        <?php if(sizeof($cart) == 1): ?>
                            <h3 class="">Total: $<?php echo $cart[0]['price']*$cart[0]['quantity']; ?></h3>
                        <?php else: ?>
                            <h3 class="">Total: $<?php echo $cart[0]['total_price']; ?></h3> 
                        <?php endif; ?>   
                    </div>
                </div>
                
                

            
        </div>

    <?php else:?>
        <div class="jumbotron jumbotron-fluid text-center">
            <h1 class=>No item in cart</h1>
        </div>
    <?php endif;?>

<!-- else => print "Login to add to cart" + a button lead to views/login.php -->
<?php else:?>
<div class="jumbotron jumbotron-fluid justify-content-center cart-banner ">
   <div class="container cart-banner">
    <div class="container login_to_buy ">
            <h3 class>Login to start shopping </h3>
            <a href= "<?php echo ROOT;?>login"><button type="submit" style="width: 150px;" class="order_btn Btn mt-2">Login</button></a>
        </div>
   </div>

</div>
<?php endif;?>


<?php 
include "views/includes/footer.php";
?>