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
        FROM user u JOIN cart c on u.id = c.user_id
        WHERE c.user_id = ? ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $id );
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function createCart($user_id){
        $sql = "insert into cart (user_id, total_price) values (?, 0)";
        $stmt= $this->conn->prepare($sql);
        $stmt->bind_param("s", $user_id );
        $stmt->execute();

        if($stmt->affected_rows == 1){
            return true;
        }
        else{
            return false;
        }
    }

    public function fetchAllProductsInCart($id){
        $sql = "SELECT * 
        FROM cart c join cart_list l on c.id = l.cart_id 
        join product p on p.product_id = l.product_id
        WHERE c.user_id = ? ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $id );
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function insertIntoCartList($cart_id, $product_id, $quantity, $price){

        $sql = "INSERT INTO cart_list (cart_id, product_id, quantity, price) values (?,?,?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $cart_id,  $product_id, $quantity, $price);
        $stmt->execute();

    }

    public function addTotalPrice($user_id, $total_price){

        $sql = "UPDATE cart
                set total_price = ?
                where user_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $total_price, $user_id);
        $stmt->execute();
    }

    public function editQuantity($cart_id, $qty, $product_id){
        $sql = "UPDATE cart_list
                SET cart_list.quantity = ? 
                WHERE cart_list.cart_id =? AND cart_list.product_id =?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $qty, $cart_id, $product_id);
        $stmt->execute();
    }

    public function getProductQty($proId, $cart_id){
        $sql = "SELECT * 
        FROM product p join cart_list c on p.product_id = c.product_id 
        join cart t on t.id= c.cart_id  
        where c.product_id = ? and c.cart_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $proId, $cart_id);
        $stmt->execute();
        $res =$stmt->get_result();

        return $res->fetch_assoc();
    }
   

}