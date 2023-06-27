<?php

class Product{

    /* ------------------------------- properties ------------------------------- */
    public $conn;


    /* ----------------------------- constructor ---------------------------- */
    public function __construct($conn){
        $this->conn = $conn;
    }

    /* ----------------------------- public function ---------------------------- */
    public function fetchProduct($id){
        $sql = "SELECT * FROM Product p join Seller s on p.seller_id = s.id where p.product_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }


    public function fetchAllProducts(){
        $sql = "SELECT * FROM Product p join Seller s on p.seller_id = s.id";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->fetch_all(MYSQLI_ASSOC);
    }


}