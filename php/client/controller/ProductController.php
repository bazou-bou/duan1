<?php

// 1. Khai báo class ProductController
class ProductController
{
    // Khai báo thuộc tính
    public $productQuery;



    // Khai báo phương thức 
    public function __construct()
    {
        $this->productQuery = new ProductQuery();
    }

    public function __destruct()
    {
        // Code...
    }

    // Khái báo phương thức showList() để xử lý trường hợp người dùng truy cập trang danh sách
    public function showList()
    {
        // Hiển thị file view tương ứng. Hiển thị file list.php
        $DanhSachobject = $this->productQuery->all();

        $DanhSachCategory = $this->productQuery->allCatories();
        //var_dump($DanhSachCategory);
        // Gọi dữ liệu sản phẩm hot
        $hotProductsResult = $this->productQuery->getHotProducts();
        $danhSachHot = $hotProductsResult['products'] ?? [];
        include "view/use/list.php";
    }

    public function showHome()
    {
        // Hiển thị file view tương ứng. Hiển thị file list.php
        $DanhSachobject = $this->productQuery->all();

        $DanhSachCategory = $this->productQuery->allCatories();
        //var_dump($DanhSachCategory);
        // Gọi dữ liệu sản phẩm hot
        $hotProductsResult = $this->productQuery->getHotProducts();
        $danhSachHot = $hotProductsResult['products'] ?? [];

        $newList = $this->productQuery->allNewCl();
        include "view/viewclient/home.php";
    }

    public function showDetail($id)
    {
        // Lấy chi tiết sản phẩm từ productQuery
        $DanhSachOne = $this->productQuery->find($id);

        // Lấy các sản phẩm cùng loại
        $danhsachCategory = $this->productQuery->findCategory($DanhSachOne->category);

        // Lấy danh sách bình luận
        $danhSachComment = $this->productQuery->findComment($id);

        // Kiểm tra và xử lý bình luận khi form được gửi
        $loi_comment = "";
        $loi_name = "";
        $loi_email = "";
        if (isset($_POST['postComment'])) {
            // Kiểm tra dữ liệu từ form
            $loi_comment = "";
            if (empty($_POST['msg'])) {
                $loi_comment = "Bình luận không được để trống.";
            }

            // Nếu không có lỗi, kiểm tra trạng thái đăng nhập
            if ($loi_comment == "" || $loi_name == "" || $loi_email == "") {
                // Kiểm tra xem người dùng đã đăng nhập chưa
                if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0) {
                    // Người dùng đã đăng nhập
                    $userId = $_SESSION['user_id']; // Lấy ID người dùng từ session
                    $username = $_SESSION['username']; // Lấy tên người dùng từ session

                    // Thêm bình luận vào cơ sở dữ liệu
                    $comment = new Comments();
                    $comment->product_id = $id;
                    $comment->user_id = $userId;
                    $comment->username = $username;
                    $comment->content = htmlspecialchars($_POST['msg']); // Escaping comment content
                    $comment->comment_date = date('Y-m-d H:i:s'); // Thêm thời gian hiện tại

                    // Thêm bình luận vào cơ sở dữ liệu
                    if ($this->productQuery->addComment($comment)) {
                        // Thêm thành công
                        echo "Bình luận của bạn đã được gửi thành công!";
                    } else {
                        // Lỗi khi thêm bình luận
                        $loi_comment = "Có lỗi xảy ra khi gửi bình luận.";
                    }
                } else {
                    // Người dùng chưa đăng nhập, hiển thị thông báo và chuyển hướng
                    echo "<script type='text/javascript'>
                            alert('Bạn cần đăng nhập để bình luận.');
                            window.location.href = '?act=client-login'; // Chuyển hướng tới trang đăng nhập
                          </script>";
                    exit(); // Dừng chương trình để đảm bảo không có gì khác xảy ra sau khi chuyển hướng
                }
            }
        }


        // Gọi view để hiển thị chi tiết sản phẩm và các bình luận
        include "view/use/detail.php";
    }





    // Khái báo phương thức showCreate() để xử lý trường hợp người dùng truy cập trang tạo mới
    public function showSearch($search)
    {
        // Làm sạch từ khóa tìm kiếm
        $search = addslashes(trim($search));
        $DanhSachCategory = $this->productQuery->allCatories();


        // Tìm kiếm sản phẩm
        $searchResult = $this->productQuery->searchProduct($search);
        $danhSachSearch = $searchResult['products'] ?? [];
        $soLuongSearch = $searchResult['count'] ?? 0;

        $message = null;
        if (empty($danhSachSearch)) {
            $message = "Không tìm thấy sản phẩm nào phù hợp với từ khóa '$search'.";
        } else {
            $message = "Tìm thấy $soLuongSearch sản phẩm phù hợp với từ khóa '$search'.";
        }

        // Lấy danh sách sản phẩm hot
        $hotProductsResult = $this->productQuery->getHotProducts();
        $danhSachHot = $hotProductsResult['products'] ?? [];

        // Gửi dữ liệu tới view
        include "view/use/searchProduct.php";
    }





    // Khái báo phương thức showDetail($id) để xử lý trường hợp người dùng truy cập trang chi tiết
    // Lưu ý: Phải nhận vào param là $id muốn xem xem chi tiết
    public function showCategory($category)
    {
        $category = $category;
        $DanhSachCategory = $this->productQuery->allCatories();


        $DanhSachobject = $this->productQuery->all();
        $DanhSachOneCategory = $this->productQuery->findCategory($category);
        include "view/use/category.php";
    }



    public function insertUser()
    {

        $loi_ten_danhmuc = "";
        $loi_tranthai_danhmuc = "";
        $baoThanhCong = "";

        if (isset($_POST["submitForm"])) {
            $product = new Users();
            $product->username = $_POST["username"];
            $product->password = $_POST["password"];
            $product->email = $_POST["email"];



            if ($_POST["username"] === "") {
                $loi_ten_danhmuc = "Hãy nhập uesername";
            }
            if ($_POST["password"] === "") {
                $loi_tranthai_danhmuc = "Hãy nhập mật khẩu của bạn";
            }
            if ($_POST["email"] === "") {
                $loi_tranthai_danhmuc = "Hãy nhập email của bạn";
            }
            // if ($_POST["role"] === "") {
            //     $loi_tranthai_danhmuc = "Hãy nhập trạng thái của danh mục";
            // }


            if ($loi_ten_danhmuc === "" && $loi_tranthai_danhmuc === "") {
                $baoThanhCong = "Bạn đã tạo ok";
                $dataCreated = $this->productQuery->createUser($product);
                if ($dataCreated == "ok") {
                    $product = new Users();
                }
            }
        }
        include "view/login/dangky.php";
    }
    public function listUser()
    {
        // Lấy danh sách người dùng từ Query
        $dsUser = $this->productQuery->allUser();

        // Gửi danh sách người dùng sang view login.php
        include "view/login/login.php";
    }

    public function showLogout()
    {
        session_start();


        session_unset();
        session_destroy();


        echo "<script>window.location.href = '?act=client-login';</script>";
        exit();
    }




    public function createPay($id)
    {
        $loi_ten_danhmuc = "";
        $loi_tranthai_danhmuc = "";
        $loi_sdt_danhmuc = ""; // Separate error message for phone number
        $baoThanhCong = "";

        if (isset($_POST["submitForm"])) {
            // Sanitize input data to prevent XSS or unwanted data
            $product = new Pay();
            $product->name_custom = trim(htmlspecialchars($_POST["name_custom"])); // Sanitize name
            $product->address = trim(htmlspecialchars($_POST["address"])); // Sanitize address
            $product->sdt = trim(htmlspecialchars($_POST["sdt"])); // Sanitize phone number

            // Input validation
            if ($product->name_custom === "") {
                $loi_ten_danhmuc = "Hãy nhập tên người nhận";
            }
            if ($product->address === "") {
                $loi_tranthai_danhmuc = "Hãy nhập địa chỉ người nhận";
            }
            if ($product->sdt === "") {
                $loi_sdt_danhmuc = "Nhập số điện thoại người nhận";
            }

            // If no errors, process payment
            if ($loi_ten_danhmuc === "" && $loi_tranthai_danhmuc === "" && $loi_sdt_danhmuc === "") {
                $baoThanhCong = "Bạn đã tạo đơn hàng thành công";
                $dataCreated = $this->productQuery->pay($id, $product);

                // Check if the payment was processed successfully
                if ($dataCreated == "ok") {
                    // Redirect to ?act=client_order
                    $this->productQuery->deleteCart($id);
                    header("Location: ?act=client_order");
                    exit; // Stop the script execution after redirection
                }
            }
        }

        // Include the payment page view
        include "view/use/paypage.php";
    }



    public function listOrderCl($id)
    {

        $DanhSachobject = $this->productQuery->clientOrder($id);

        include "view/use/order.php";
    }

    public function listOrderItem($id)
    {
        $DanhSachobject = $this->productQuery->findOrder($id);

        include "view/use/orderitem.php";
    }

    public function showNewList()
    {
        $newList = $this->productQuery->allNewCl(); // Lấy danh sách tin tức
        include "view/viewclient/tintuc_list.php"; // Gọi view với biến $newList
    }

    public function showNewDetail($id)
    {
        $newDetail = $this->productQuery->findNewCl($id);
        $newList = $this->productQuery->allNewCl(); 
        
        // Gọi view để hiển thị chi tiết tin tức
        include "view/viewclient/tintuc_chitiet.php";
    }

    public function deleteCartItem($id)
    {
        $userId = $_SESSION['user_id'];
        $this->productQuery->deleteCartitem($id);
        header("Location: ?act=client-listgiohang&id=$userId");
    }

    public function insertContact()
    {

        $loi_ten = "";
        $loi_email = "";
        $loi_sđt = "";
        $loi_mess = "";
        $baoThanhCong = "";

        if (isset($_POST["submitForm"])) {
            $contact = new Contact();
            $contact->contact_name = $_POST["contact_name"];
            $contact->contact_email = $_POST["contact_email"];
            $contact->contact_phone = $_POST["contact_phone"];
            $contact->contact_mess = $_POST["contact_mess"]; 

            if ($_POST["contact_name"] === "") {
                $loi_ten = "Hãy nhập uesername";
            }
            if ($_POST["contact_email"] === "") {
                $loi_email = "Hãy nhập email của bạn";
            }
            if ($_POST["contact_phone"] === "") {
                $loi_sđt = "Hãy nhập số điện thoại của bạn";
            }
            if ($_POST["contact_mess"] === "") {
                $loi_mess = "Hãy nhập phản hồi của bạn";
            }

            if ($loi_ten === "" && $loi_email === ""  && $loi_sđt === ""  && $loi_mess === "") {
                $baoThanhCong = "Bạn đã gửi phản hồi thành công.";
                $dataCreated = $this->productQuery->createContact($contact);
                if ($dataCreated == "ok") {
                    $_SESSION['baoThanhCong'] = $baoThanhCong;
                }
            }
        }
        include "view/viewclient/lienhe.php";
    }
}