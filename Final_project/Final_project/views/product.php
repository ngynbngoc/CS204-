<?php
include "views/includes/header.php";
include "core/Form_handle.php"; 

?>

<style>
    <?php include "views/includes/style.css" ?>
</style>

<!-- ----------------------------- product detail ----------------------------- -->

<div class="jumbotron jumbotron-fluid">
    <div class="container product mt-5">
        <div class="row">
            <div class="col-md-12 col-lg-6 mb-5 text-center">
                <img class="product_img" style="max-width: 500px;" src="<?php echo ROOT . $product['product_img'] ?>" alt="">
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="container product_detail">
                    <div class="name ">
                        <h3><?php echo $product['product_name']; ?></h3>
                        <h5><?php echo $product['seller_name']; ?></h5>
                    </div>
                    <hr>

                    <div class="price d-flex justify-content-between">
                        <h5>Price</h5>
                        <h5><?php echo "$".$product['price']; ?></h5>
                    </div>
                    <hr>

                    
                    
                   <!-- lead to cart -->
                   <?php if($_SESSION['logged_in']): ?>
                        
                        <form action="<?php echo ROOT. 'cart/'. $_SESSION['id']; ?>" method="post" class="d-flex">
                            <input type="number"  name="quantity" id="quantity" required >
                            <input type="text" name = "product_id" value = "<?php echo $product['product_id']; ?>" class="d-none">
                            <input type="text" name = "price" value = "<?php echo $product['price']; ?>" class="d-none">
                            <button class="btn btn-block Btn "  name = "addCartBtn" type="submit"><i class="fas fa-shopping-bag    "></i> Add to Cart</button>
                        </form>
                    <?php else: ?>
                        <form method="get" action="<?php echo ROOT. 'login'; ?>">
                            <label for="loginRequest">Login to buy</label>
                            <button class="btn btn-block Btn"  type="submit"><i class="fas fa-shopping-bag    "></i> Login</button>
                        </form>
                    <?php endif; ?>

                    <hr>
                    <div class="description">
                        <p><?php echo $product['description']; ?></p>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- ----------------------------- comment section ---------------------------- -->

    <hr class="mt-5">
    <div class="container product mt-5 comment-section">
        <h3>Reviews</h3>

        <form action="">
            <label for="comemnt" class="lead">Tell us your thoughts!</label>
            <br>
            <textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
            <button type="submit" class="btn Btn btn-lg mt-3">Submit</button>
        </form>

    </div>
</div>



<!-- ---------------------------- you may also like --------------------------- -->
<hr>
<div class="jumbotron text-center jumbotron-fluid">
    <h3>You may also like</h3>
    <div class="container mt-5 ">
        <div class="row justify-content-center">
            
        <?php 
            $count = 3;
            $index_array = [];
            while ($count > 0){
                $new_id = rand(0, 11);
                
                if($products[$new_id]['product_id'] != $product['product_id'] and !in_array($new_id, $index_array)):?>
                    <?php $index_array[] = $new_id; ?>
                    <div class='col-md-4 col-lg-3 col-sm-6 mb-5 d-flex align-items-stretch'>
                        <div class='card product-card text-center'>
                            <a href = "<?php echo ROOT. 'product/get/' . $products[$new_id]['product_id']; ?>" ><img class="product_img_url card-img-top" src= "<?php echo ROOT. $products[$new_id]['product_img']; ?>" alt=""></a>
                            <div class="card-body ">
                            <a class="name" href = "<?php echo ROOT. 'product/get/'. $products[$new_id]['product_id']?>"> <h5 class="card-title product_name"><?php echo $products[$new_id]['product_name']?></h5></a>

                            </div>
                            <h5 class="card-text product_price"><?php echo '$'. $products[$new_id]['price'];?></h5>
                            
                            <div class="btn-container text-center mb-3">
                            <a href = "<?php echo ROOT. 'product/get/' . $products[$new_id]['product_id']?>"><button type="submit" class="order_btn btn btn-lg" ><i class="fa fa-shopping-bag" aria-hidden="true"></i> Order</button></a>
                            </div>
                            

                        </div>
                    </div>
                    <?php $count -= 1;?>
                <?php else:
                    continue;
                endif;
            }
            ?>
        </div>
    </div>
</div>



<?php 
include "views/includes/footer.php";
?>
