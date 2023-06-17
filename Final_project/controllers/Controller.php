<?php

class Controller{

    /* ------------------------------- properties ------------------------------- */
    public $conn;
    public $request;
    public $params;
    public $files;

    /* -------------------------------- construct ------------------------------- */
    public function __construct(){
        $this->conn = DB::getConn();
        $this->request = $_POST;
        $this->params = $_GET;
        $this->files = $_FILES;
    }
}