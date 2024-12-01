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
class Banner{
    public $id;
    public $image_path;
    public $title;
    public $status;
    public function __construct() {}
    public function __destruct() {}
}


class Pay{
    public $name_custom;
    public $address;
    public $sdt;

    public function __construct() {}
    public function __destruct() {}
    
}


class OrderCl{
    public $order_id;
    public $total;
    public $status;
    public $address;
    // public $username ;
    public $sdt;
    public $name_custom;

    public function __construct()
    {
        
    }
    public function __destruct()
    {
        
    }
}

class OrderItemCl
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
