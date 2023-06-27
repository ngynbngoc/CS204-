<?php
include "views/includes/header.php";
?>

<div class="jumbotron jumbotron-fluid banner mt-5">
    <div class="container banner mt-1">
        
    </div>
</div>

<div class="container products-field">
    <div class="row">
        <?php foreach($products as $product): ?>
            <div class="col-md-4 col-lg-3 col-sm-6 mb-5 d-flex align-items-stretch">
                <div class="card product-card text-center">
                    <a href = "<?php echo ROOT .'product/get/' . $product['product_id']?>"><img class="product_img_url card-img-top" src="<?php echo ROOT. $product['product_img']; ?>" alt=""></a>
                    <div class="card-body ">
                     <a class="name" href = "<?php echo ROOT .'product/get/' . $product['product_id']?>"> <h5 class="card-title product_name"><?php echo $product['product_name']?></h5></a>
                       
                    </div>
                    <h5 class="card-text product_price"><?php echo '$'. $product['price']; ?></h5>
                    
                    <div class="btn-container text-center mb-3">
                        <a href = "<?php echo ROOT . 'product/get/'. $product['product_id']?>"><button type="submit" class=" order_btn btn btn-lg" ><i class="fa fa-shopping-bag" aria-hidden="true"></i> Order</button></a>
                    </div>
                    
                    
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>



<?php
include "views/includes/footer.php";
?>