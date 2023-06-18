<?php

define("ROOT", substr($_SERVER['PHP_SELF'], 0,-9));

/* --------------------------- database connection -------------------------- */
include "core/DB.php";


/* ---------------------------------- controllers --------------------------------- */
include "controllers/Controller.php";
include "controllers/HomeController.php";
include "controllers/UserController.php";
include "controllers/ProductController.php";
include "controllers/CartController.php";


/* ---------------------------------- core ---------------------------------- */
include "core/Router.php";
include "core/website.php";



/* --------------------------------- models --------------------------------- */
include "models/User.php";
include "models/Product.php";



?>