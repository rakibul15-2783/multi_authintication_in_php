<?php

   class User{

    public $con ="";
    
    function __construct(){
        $con =new mysqli("localhost","root","","php_practice");
        
    }

    function login($username, $password){
        $con =new mysqli("localhost","root","","php_practice");
        if(empty($username)){
            echo '<div class="alert alert-danger"><strong>Error: </strong>Username/ Email/ Phone Number is Required.  </div>';
        }
        else if(empty($password)){
            echo '<div class="alert alert-danger"><strong>Error: </strong>Password is Required.  </div>';
        }
        else{
            $this->con =new mysqli("localhost","root","","php_practice");
            $qur ="SELECT * FROM tbl_users WHERE name='$username' AND password='$password'";
            $result = $this->con->query($qur);
            if($result->num_rows > 0){
                session_start();
                $_SESSION['name']="rakib";
                header("location:dashboard.php");
            }
            else{
                echo '<div class="alert alert-danger">Username or Password is Invalid.</div>';
            }
        }
        
    }

}