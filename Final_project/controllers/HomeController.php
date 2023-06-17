<?php

class HomeController extends Controller{


    /* -------------------------------- construct ------------------------------- */
    public function __construct(){
        parent::__construct();
    }

    /* --------------------------------- methods -------------------------------- */
    public function backToHomepage(){
        include "views/home.php";
    }
    
}