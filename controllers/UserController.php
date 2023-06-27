<?php


class UserController extends Controller{
    /* ------------------------------- properties ------------------------------- */
    public $errors = [];


    /* ------------------------------- constructor ------------------------------ */
    public function __construct(){
        parent::__construct();
    }

    /* -------------------------------- functions ------------------------------- */

    public function createUser(){
        $username = $this->request['username'];
        $pw = $this->request['password'];
        $email = $this->request['email'];
        $pw_confirm = $this->request['password-confirm'];

        $user = new User($this->conn);

         //check if username exists 
        if($user->validateUserExists($username) == true){
            $this->errors['username'] = "Username already taken!";
        }

        
        //check username and pw > 5 chars
        if(strlen($username) < 5 || strlen($pw) < 5){
            $this->errors['length'] = "All inputs must be longer than 5!";
        }


        //validate user email, use filter_var($email, FILTER_VALIDATE_EMAIL)
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->errors['email'] = "This email is invalid";
        }

        //check password match
        if($pw != $pw_confirm){
            $this->errors['password'] = "Password not matched";
        }

        if(empty($errors)){
            //call createNewUser method on the user model
            //dont forget to hash the password
                $user->createNewUser($username, $pw, $email);
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;

                $user_id = $user->getUserID($username);
                $_SESSION['id'] = $user_id['id'];
                
                //create cart for the new user
                $cart = new CartController;
                $cart->createNewCart($user->user['id']);
                

                header("Location: ". ROOT. "?msg=Successful-login");
        }
        else{

            header("Location: ". ROOT. "login");
            var_dump($this->errors);
        }
    }


    public function validateLogin() {
       $user = new User($this->conn);
      
       //if user found
       if($user->validateUserExists($this->request['username']) == true){
            var_dump($user->user);
            var_dump($this->request['password']);
            
            //if password match
            if(password_verify($this->request['password'], $user->user['password'])){
                
                $_SESSION['logged_in'] = true;
                $_SESSION['id'] = $user->user['id'];
                $_SESSION['username'] = $user->user['username'];
                $_SESSION['email'] = $user->user['email'];

                header("Location: ". ROOT. "?msg=Successful-login");
            }else{
                header("Location: ". ROOT. "login");
                
            }
       }
       else{
        echo "user not found";
       }
    }
}