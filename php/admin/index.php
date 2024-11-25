<?php
define("BASE_URL", "http://localhost/shopBanGiay/php/");
// 1. Nhúng các file cần thiết
include_once "controller/ProductController.php";
include_once "model/Product.php";
include_once "model/ProductQuery.php";


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
    echo $id . "<br>";
}

$user_id="";
if (isset($_GET["user_id"])) {
    $user_id = $_GET["user_id"];
    echo $user_id . "<br>";
}

// 2.3. Lấy giá trị "category" từ đư��ng d��n url
$category = "";
if (isset($_GET["category"])) {
    $category = $_GET["category"];
    //echo $category . "<br>";
}


// 3. Kiểm tra giá trị act và gọi phương thức tương ứng
switch ($act) {
    case "":
        // Điều hướng sang trang mặc định (trang danh sách) nếu người dùng không truyền "act"
        header("Location: ?act=product-list");
        break;

    case "product-list":
        // Hiển thị trang danh sách và xử lý logic
        $productCtrl = new ProductController();
        $productCtrl->showList();
        break;

    case "product-create":
        // Hiển thị trang tạo mới và xử lý logic
        $productCtrl = new ProductController();
        $productCtrl->showCreate();
        break;

    case "product-category":
        // Hiển thị trang chi tiết và xử lý logic
        $productCtrl = new ProductController();
        $productCtrl->showCategory($category);
        break;

    case "product-update":
        // Hiển thị trang chỉnh sửa và xử lý logic
        $productCtrl = new ProductController();
        $productCtrl->showUpdate($id);
        break;

    case "toggleStatus":
        // Hiện thị trang xóa và xử lý logic
        $productCtrl = new ProductController();
        $table="products";
        $productCtrl->toggleStatus($id , $table);
        break;

    case "product-listusers":
        // Hiển thị trang chi tiết và xử lý logic
        $productCtrl = new ProductController();
        $productCtrl->showUsers();
        break;

     case "catories-list":
        $catoriesCtrl = new ProductController();
        $catoriesCtrl->showCrt();
        break;

    case "catories-create":
        $catoriesCtrl = new ProductController();
        $catoriesCtrl->createCtr();
        break;
        
    case "catories-update":
        $catoriesCtrl= new ProductController();
        $catoriesCtrl->updateCtr($id);
        break;

    case "catories-delete":
        $catoriesCtrl = new ProductController();
        $catoriesCtrl->deleteCtr($id);
        break;

    case "comment-list":
        $productCtrl = new ProductController();
        $productCtrl->showComment();
        break;


    case "unban":
        $productCtrl = new ProductController();
        $productCtrl->unban($user_id);
        break;

    case "ban":
        $productCtrl = new ProductController();
        $productCtrl->ban($user_id);
        break;
    case "orders_list":
        $productCtrl = new ProductController();
        $productCtrl->listOrder();
        break;

    case "order_item":
        $productCtrl = new ProductController();
        $productCtrl->listOrderItem($id);

        break;

    // Banners
    case "banner-list":
        // Show the list of banners
        $bannerCtrl = new ProductController();
        $bannerCtrl->showBannerList();
        break;

    case "banner-create":
        // Show the banner creation form
        $bannerCtrl = new ProductController();
        $bannerCtrl->showBannerCreate();
        break;

    case "banner-update":
        // Show the banner update form
        $bannerCtrl = new ProductController();
        $bannerCtrl->showBannerUpdate($id);
        break;

    case "banner-delete":
        // Delete the banner
        $bannerCtrl = new ProductController();
        $bannerCtrl->showBannerDelete($id);
        break;

    default:
        // Hiển thị "trang 404 fage not found" nếu giá trị "act" không nằm trong danh sách phía trên.
        include "view/404.php";
        break;
}
