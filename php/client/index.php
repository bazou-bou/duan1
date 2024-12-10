<?php
session_start();
define("BASE_URL", "http://localhost/shopBanGiay/php/");
// 1. Nhúng các file cần thiết
include_once "controller/ProductController.php";
include_once "model/Product.php";
include_once "model/ProductQuery.php";
include_once "controller/CartController.php";
include_once "model/CartQuery.php";



$act = "";
if (isset($_GET["act"])) {
    $act = $_GET["act"];
   
}

$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$item_id = "";
if (isset($_GET["item_id"])) {
    $item_id = $_GET["item_id"];
}

$search = "";
if (isset($_GET["search"])) {
    $search = $_GET["search"];
}

$category = "";
if (isset($_GET["category"])) {
    $category = $_GET["category"];
}


switch ($act) {
    case "":
        header("Location: ?act=client-home");
        break;

    case "client-home":
        $productCtrl = new ProductController();
        $productCtrl->showHome();
        break;
    case "client-list":
        $productCtrl = new ProductController();
        $productCtrl->showList();
        break;

    case "client-create":
        $productCtrl = new ProductController();
        $productCtrl->showCreate();
        break;

    case "client-category":
        $productCtrl = new ProductController();
        $productCtrl->showCategory($category);
        break;

    case "client-detail":
        $productCtrl = new ProductController();
        $productCtrl->showProductVariant($id);
        break;

    case "product-search":
        $productCtrl = new ProductController();
        $productCtrl->showSearch($search);
        break;

    case "client-update":
        $productCtrl = new ProductController();
        $productCtrl->showUpdate($id);
        break;

    case "client-login":
        $productCtrl = new ProductController();
        $productCtrl->listUser();
        break;

    case "client-dangky":
        $productCtrl = new ProductController();
        $productCtrl->insertUser();
        break;

    case "client-logout":
        $productCtrl = new ProductController();
        $productCtrl->showLogout();
        break;
    case "client-listgiohang":
        $cartCtrl = new CartController();
        $cartCtrl->showCart($id);
        break;


    case "client-addcart":
        $cartCtrl = new CartController();
        $userId =  $_SESSION["user_id"];
        $quantity = $_SESSION["quantity"];
        $variant = $_SESSION["variant_name"];
        // var_dump($variant);
        $cartCtrl->addToCart($userId, $id,  $variant ,$quantity);
        break;
    case "client-remove-listgiohang":
        if (isset($_GET['product_id'])) {
            $cartCtrl = new CartController();
        }
        break;

    case "client-update-listgiohang":
        if (isset($_POST['quantity']) && isset($_GET['id'])) {
            $cartCtrl = new CartController();

            $cartCtrl->updateCart($userId, $_GET['id'], $_POST['quantity']);
        }
        break;
    case "update-cart":
        if (!empty($_POST['quantity'])) {
            $cartCtrl = new CartController();
            $quantities = $_POST["quantity"];

            foreach ($quantities as $item_id => $quantity) {
                $item_id = intval($item_id);
                $quantity = intval($quantity);

                $cartCtrl->updateCart($item_id, $quantity);
            }
        }
        break;

    case "gioithieu":
        include './view/viewClient/gioithieu.php';
        break;
        // case "tintuc_list":
        //     include './view/viewClient/tintuc_list.php';
        //     break;
        // case "tintuc_chitiet":
        //     include './view/viewClient/tintuc_chitiet.php';
        //     break;
    case "lienhe":
        include './view/viewClient/lienhe.php';
        break;


    case "client_pay":
        $cartCtrl = new CartController();
        $cartCtrl->showproduct($id);
        break;

    case "client_paypage":
        $productCtrl = new ProductController();
        $userId = $_SESSION['user_id']; 
        // $variant = $_SESSION['variant_name']; 
        // var_dump($_SESSION['variant_name']);

        try {
            $productCtrl->createPay($userId);
        } catch (Exception $e) {
            error_log("Payment processing error: " . $e->getMessage());
            header("Location: /error"); 
            exit();
        }
        break;


    case "client_order":
        $productCtrl = new ProductController();
        $id = $userId = $_SESSION['user_id'];
        $productCtrl->listOrderCl($id);
        break;

    case "client_orderitem":
        $productCtrl = new ProductController();
        $productCtrl->listOrderItem($id);
        break;


    case "client-news":
        $newCtrl = new ProductController();
        $newCtrl->showNewList();
        break;

    case "client-newdetail":
        $productCtrl = new ProductController();
        $productCtrl->showNewDetail($id);
        break;

    case "client-deletecart":
        $newCtrl = new ProductController();
        $newCtrl->deleteCartItem($id);
        break;

    case "client-contact":
        $productCtrl = new ProductController();
        $productCtrl->insertContact();
        break;


    default:
        include "view/404.php";
        break;
}
