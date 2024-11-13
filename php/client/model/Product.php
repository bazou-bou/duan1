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

    public function __construct() {}
    public function __destruct() {}
}

class Users{
    public $user_id;
    public $username;
    public $password;
    public $email;
    public $role;
}
