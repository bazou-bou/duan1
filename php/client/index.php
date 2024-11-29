<?php
session_start();
define("BASE_URL", "http://localhost/shopBanGiay/php/");
// 1. Nhúng các file cần thiết
include_once "controller/ProductController.php";
include_once "model/Product.php";
include_once "model/ProductQuery.php";
include_once "controller/CartController.php";
include_once "model/CartQuery.php";


// 2. Giới thiệu cách người dùng sẽ tương tác với phần mềm
// Người dùng sẽ sử dụng đường url để thể hiển tương tác của mình
// VD: Nếu muốn truy cập trang danh sách --> Người dùng sẽ truyền param ?act=product-list lên đường dẫn url
// VD: Nếu muốn truy cập trang chi tiết với id=3 --> Người dùng sẽ truyền param ?act=detail&id=3 lên đường đẫn url

// 2.1. Lấy giá trị param "act" từ đường dẫn url
$act = "";
if (isset($_GET["act"])) {
    $act = $_GET["act"];
    //echo $act . "<br>";
}

// 2.2. Lấy giá trị "id" từ đường dẫn url
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    //echo $id . "<br>";
}

$item_id="";
if (isset($_GET["item_id"])) {
    $item_id = $_GET["item_id"];
    //echo $item_id . "<br>";
}

$search = "";
if (isset($_GET["search"])) {
    $search = $_GET["search"];
    //echo $search. "<br>";
}

$category = "";
if (isset($_GET["category"])) {
    $category = $_GET["category"];
    //echo $category . "<br>";
}


// 3. Kiểm tra giá trị act và gọi phương thức tương ứng
switch ($act) {
    case "":
        header("Location: ?act=client-list");
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
        $productCtrl->showDetail($id);
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
        // Hiển thị giỏ hàng của người dùng
    case "client-listgiohang":
        $cartCtrl = new CartController();
        $cartCtrl->showCart($id);
        break;


    case "client-addcart":
        $cartCtrl = new CartController();
        $userId =  $_SESSION["user_id"];
        $quantity = $_SESSION["quantity"];
        $cartCtrl->addToCart($userId, $id, $quantity);
        break;
        // Xóa sản phẩm khỏi giỏ hàng
    case "client-remove-listgiohang":
        if (isset($_GET['product_id'])) {
            $cartCtrl = new CartController();
           // $cartCtrl->removeFromCart($userId, $_GET['product_id']);
        }
        break;

        // Cập nhật số lượng sản phẩm trong giỏ hàng
    case "client-update-listgiohang":
        if (isset($_POST['quantity']) && isset($_GET['id'])) {
            $cartCtrl = new CartController();
            
            $cartCtrl->updateCart($userId, $_GET['id'], $_POST['quantity']);
        }
        break;
        // Nếu không có hành động nào khớp, hiển thị trang lỗi 404
        case "update-cart":
            if (!empty($_POST['quantity'])) {
                $cartCtrl = new CartController();
                $quantities = $_POST["quantity"]; // Lấy mảng quantity từ POST
        
                // Lặp qua từng sản phẩm trong giỏ hàng
                foreach ($quantities as $item_id => $quantity) {
                    $item_id = intval($item_id); // Đảm bảo id là số nguyên
                    $quantity = intval($quantity); // Đảm bảo số lượng là số nguyên
        
                    // Gọi phương thức cập nhật giỏ hàng
                    $cartCtrl->updateCart($item_id, $quantity);
                }
            }
            break;
        





    default:
        include "view/404.php";
        break;
}