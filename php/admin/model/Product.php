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
    public $status;

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
    public $status;

    public function __construct() {}
    public function __destruct() {}
}
class Oder
{
    public $order_id;
    public $user_id;
    public $total;
    public $status;
    public $sdt;
    public $name_custom;
    public $address;

    public function __construct()
    {
        
    }
    public function __destruct()
    {
        
    }
}

class OrderItem
{
    public $order_item_id;
    public $order_id ;
    public $product_id ;
    public $quantity;
    public $order_img;
    public $order_date;
    // public $order_price;
    public $address;
    public $name_custom;
    public $sdt;
    public $product_name;
    public $product_price;
    public $product_img;
    public $status;

    public function __construct()
    {
        
    }

    public function __destruct()
    {
        
    }
}
class Comments{
    public $comment_id;
    public $product_id;
    public $user_id;
    public $username;
    public $content;
    public $comment_date;
    public function __construct() {}
    public function __destruct() {}
}