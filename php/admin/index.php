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
        header("Location: ?act=products-list");
        break;

    case "products-list":
        // Hiển thị trang danh sách và xử lý logic
        $productCtrl = new ProductController();
        $productCtrl->showList();
        break;

    case "products-create":
        // Hiển thị trang tạo mới và xử lý logic
        $productCtrl = new ProductController();
        $productCtrl->showCreate();
        break;

    case "products-category":
        // Hiển thị trang chi tiết và xử lý logic
        $productCtrl = new ProductController();
        $productCtrl->showCategory($category);
        break;

    case "products-update":
        // Hiển thị trang chỉnh sửa và xử lý logic
        $productCtrl = new ProductController();
        $productCtrl->showUpdate($id);
        break;

    case "products-status":
        // Hiện thị trang xóa và xử lý logic
        $productCtrl = new ProductController();
        $table = "products";
        $productCtrl->toggleStatus($id, $table, $field = "product_id");
        break;

    case "users-list":
        // Hiển thị trang chi tiết và xử lý logic
        $productCtrl = new ProductController();
        $productCtrl->showUsers();
        break;

    case "users-status":
        // Hiện thị trang xóa và xử lý logic
        $productCtrl = new ProductController();
        $table = "users";
        $productCtrl->toggleStatus($id, $table, $field = "user_id");
        break;

    case "categories-list":
        $catoriesCtrl = new ProductController();
        $catoriesCtrl->showCrt();
        break;

    case "categories-create":
        $catoriesCtrl = new ProductController();
        $catoriesCtrl->createCtr();
        break;

    case "categories-update":
        $catoriesCtrl = new ProductController();
        $catoriesCtrl->updateCtr($id);
        break;

    case "categories-status":
        // Hiện thị trang xóa và xử lý logic
        $productCtrl = new ProductController();
        $table = "categories";
        $productCtrl->toggleStatus($id, $table, $field = "category_id");
        break;

    case "comments-list":
        $productCtrl = new ProductController();
        $productCtrl->showComment();
        break;

    case "comments-status":
        // Hiện thị trang xóa và xử lý logic
        $productCtrl = new ProductController();
        $table = "comments";
        $productCtrl->toggleStatus($id, $table, $field = "comment_id");
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

    case "contact-list":
        // Show the list of contact
        $contactCtrl = new ProductController();
        $contactCtrl->showContactList();
        break;

    case "contact-delete":
        // Delete the contact
        $contactCtrl = new ProductController();
        $contactCtrl->showContactDelete($id);
        break;

    case "news-list":
        // Show the list of news
        $newCtrl = new ProductController();
        $newCtrl->showNewList();
        break;
        
    case "news-create":
        // Show the list of news
        $newCtrl = new ProductController();
        $newCtrl->showCreateNew();
        break;

    case "new-delete":
        // Delete the news
        $newCtrl = new ProductController();
        $newCtrl->showNewDelete($id);
        break;

    default:
        // Hiển thị "trang 404 fage not found" nếu giá trị "act" không nằm trong danh sách phía trên.
        include "view/404.php";
        break;
}
