<?php

class Cart{
    
    /* ------------------------------- properties ------------------------------- */
    public $conn;


    /* ----------------------------- constructor ---------------------------- */
    public function __construct($conn){
        $this->conn = $conn;
    }

    /* ----------------------------- public function ---------------------------- */
    public function fetchCart($id){
        $sql = "SELECT * 
        FROM product p JOIN cart c ON p.id= c.product_id
        JOIN user u ON u.cart_id = c.id
        join cart_list l on l.cart_id = c.id and l.product_id = p.id
        WHERE u.id = ? ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $id );
        $stmt->execute();
        $stmt->get_result();
        
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }


}