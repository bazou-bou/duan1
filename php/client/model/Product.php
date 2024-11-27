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
    public $category;
    public $status;

    public function __construct() {}
    public function __destruct() {}
}

class Users {
    public $user_id;
    public $username;
    public $password;
    public $email;
    public $role;
    public $status;
}

class Comments{
    public $comment_id;
    public $product_id;
    public $user_id;
    public $username;
    public $content;
    public $comment_date;
    public $status;
    public function __construct() {}
    public function __destruct() {}
}

class categories
{   
    public $category_id;
    public $name;
    public $img;
    public $status;

    public function __construct()
    {
        
    }
    public function __destruct()
    {
        
    }
}

class Card{
    public $cart_id;
    public $user_id;
    public $username;
    public $item_id;
    public $product_id;
    public $product_name;
    public $quantity;
    public $product_image;
    public $product_price;
    public function __construct()
    {
        
    }
    public function __destruct()
    {
        
    }
}
