<?php
class Product
{
    public $product_id;
    public $name;
    public $description;
    public $price;
    public $stock;
    public $img;
    public $views;
    public $category_id;

    public function __construct() {}
    public function __destruct() {}
}

class categories
{   
    public $category_id;
    public $name;
    public $status;

    public function __construct()
    {
        
    }
    public function __destruct()
    {
        
    }
}

class User
{
    public $user_id;
    public $username ;
    public $password;
    public $email ;
    public $role;

    public function __construct() {}
    public function __destruct() {}
}