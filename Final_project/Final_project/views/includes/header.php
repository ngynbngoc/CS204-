<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


<link rel="stylesheet" href="views/includes/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Playfair+Display&display=swap" rel="stylesheet">



<title>Brandii Official Website</title>
</head>
<body>



<nav class="navbar navbar-expand-lg  bg-color navbar-light fixed-top">
        <div class="container">
            <a href=" <?php echo ROOT; ?>"><img src="<?php echo ROOT. 'images/logo.png'; ?>" class="logo" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		    </button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link " href="<?php echo ROOT;?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                    </li>

                    <?php if($_SESSION['logged_in']): ?>
                        <li class="nav-item ">
                            <a class="nav-link " href="<?php echo ROOT.'login' ;?>" tabindex="-1" aria-disabled="true"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $_SESSION['username'];?></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="<?php echo ROOT.'logout' ;?>" tabindex="-1" aria-disabled="true"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                        </li>

                    <?php else: ?>
                        <li class="nav-item ">
                            <a class="nav-link " href="<?php echo ROOT.'login' ;?>" tabindex="-1" aria-disabled="true"><i class="fa fa-user" aria-hidden="true"></i> Login</a>
                        </li>
                    <?php endif; ?>


                    <li class="nav-item ">
                        <a class="nav-link " href="<?php echo ROOT.'contact' ;?>" tabindex="-1" aria-disabled="true"><i class="fa fa-phone" aria-hidden="true"></i> Contact</a>
                    </li>

                    <?php if($_SESSION['logged_in']): ?>
                        <li class="nav-item ">
                            <a class="nav-link " href="<?php echo ROOT.'cart/'. $_SESSION['id'] ;?>" tabindex="-1" aria-disabled="true"><i class="fa fa-cart-plus" aria-hidden="true"></i> Cart</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item ">
                            <a class="nav-link " href="<?php echo ROOT.'cart' ;?>" tabindex="-1" aria-disabled="true"><i class="fa fa-cart-plus" aria-hidden="true"></i> Cart</a>
                        </li>

                    <?php endif; ?>
        
            </div>
    </div>
</nav>