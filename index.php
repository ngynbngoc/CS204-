<?php

/* ------------------------------ session login ----------------------------- */
session_start();

if(!isset($_SESSION['logged_in'])) {
    $_SESSION['logged_in'] = false;
}

define("ROOT", substr($_SERVER['PHP_SELF'], 0,-9));


/* --------------------------- database connection -------------------------- */
include "core/DB.php";
DB::createInstance();
DB::connect("localhost", "root", "", "itec_shopping_website");


/* --------------------------------- models --------------------------------- */
include "models/User.php";
include "models/Product.php";
include "models/Cart.php";


/* ---------------------------------- controllers --------------------------------- */
include "controllers/Controller.php";
include "controllers/HomeController.php";
include "controllers/UserController.php";
include "controllers/ProductController.php";
include "controllers/CartController.php";


/* ---------------------------------- core ---------------------------------- */
include "core/Router.php";
include "core/website.php";




?>