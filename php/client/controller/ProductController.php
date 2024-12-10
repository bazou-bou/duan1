<?php

class ProductController
{
    public $productQuery;



    public function __construct()
    {
        $this->productQuery = new ProductQuery();
    }

    public function __destruct()
    {
    }

    public function showList()
    {
        $DanhSachobject = $this->productQuery->all();

        $DanhSachCategory = $this->productQuery->allCatories();

        $hotProductsResult = $this->productQuery->getHotProducts();
        $danhSachHot = $hotProductsResult['products'] ?? [];
        include "view/use/list.php";
    }

    public function showHome()
    {
        $DanhSachobject = $this->productQuery->all();

        $DanhSachCategory = $this->productQuery->allCatories();
        $hotProductsResult = $this->productQuery->getHotProducts();
        $danhSachHot = $hotProductsResult['products'] ?? [];

        $newList = $this->productQuery->allNewCl();
        include "view/viewclient/home.php";
    }

    public function showDetail($id)
    {
        $DanhSachOne = $this->productQuery->find($id);

        $danhsachCategory = $this->productQuery->findCategory($DanhSachOne->category);

        $danhSachComment = $this->productQuery->findComment($id);

        $loi_comment = "";
        $loi_name = "";
        $loi_email = "";
        if (isset($_POST['postComment'])) {
            $loi_comment = "";
            if (empty($_POST['msg'])) {
                $loi_comment = "Bình luận không được để trống.";
            }

            if ($loi_comment == "" || $loi_name == "" || $loi_email == "") {
                if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0) {
                    $userId = $_SESSION['user_id']; 
                    $username = $_SESSION['username'];

                    $comment = new Comments();
                    $comment->product_id = $id;
                    $comment->user_id = $userId;
                    $comment->username = $username;
                    $comment->content = htmlspecialchars($_POST['msg']);
                    $comment->comment_date = date('Y-m-d H:i:s');

                    if ($this->productQuery->addComment($comment)) {
                        echo "Bình luận của bạn đã được gửi thành công!";
                    } else {
                        $loi_comment = "Có lỗi xảy ra khi gửi bình luận.";
                    }
                } else {
                    echo "<script type='text/javascript'>
                            alert('Bạn cần đăng nhập để bình luận.');
                            window.location.href = '?act=client-login'; // Chuyển hướng tới trang đăng nhập
                          </script>";
                    exit();
                }
            }
        }


        include "view/use/detail.php";
    }
    public function showProductVariant($id)
    {
        // Lấy thông tin sản phẩm và biến thể từ phương thức find_variant
        $DanhSachOne = $this->productQuery->find_variant($id);  
    
        // Kiểm tra nếu sản phẩm không tồn tại
        if (!$DanhSachOne) {
            echo "Sản phẩm không tồn tại!";
            exit();
        }
    
        // Lấy danh mục sản phẩm (Nếu có, tùy vào cấu trúc dữ liệu)
        $danhsachCategory = $this->productQuery->findCategory($DanhSachOne->category);
    
        // Lấy các bình luận của sản phẩm
        $danhSachComment = $this->productQuery->findComment($id);
    
        // Các lỗi cần hiển thị khi gửi bình luận
        $loi_comment = "";
        $loi_name = "";
        $loi_email = "";
    
        // Kiểm tra khi người dùng gửi bình luận
        if (isset($_POST['postComment'])) {
            $loi_comment = "";
            // Kiểm tra nếu nội dung bình luận trống
            if (empty($_POST['msg'])) {
                $loi_comment = "Bình luận không được để trống.";
            }
    
            // Nếu không có lỗi, tiến hành thêm bình luận
            if ($loi_comment == "" && $loi_name == "" && $loi_email == "") {
                if (isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0) {
                    $userId = $_SESSION['user_id']; 
                    $username = $_SESSION['username'];
    
                    // Tạo đối tượng bình luận mới
                    $comment = new Comments();
                    $comment->product_id = $id;
                    $comment->user_id = $userId;
                    $comment->username = $username;
                    $comment->content = htmlspecialchars($_POST['msg']);
                    $comment->comment_date = date('Y-m-d H:i:s');
    
                    // Thêm bình luận vào cơ sở dữ liệu
                    if ($this->productQuery->addComment($comment)) {
                        echo "Bình luận của bạn đã được gửi thành công!";
                    } else {
                        $loi_comment = "Có lỗi xảy ra khi gửi bình luận.";
                    }
                } else {
                    // Nếu người dùng chưa đăng nhập, yêu cầu đăng nhập
                    echo "<script type='text/javascript'>
                            alert('Bạn cần đăng nhập để bình luận.');
                            window.location.href = '?act=client-login'; // Chuyển hướng tới trang đăng nhập
                          </script>";
                    exit();
                }
            }
        }
    
        // Bao gồm file view để hiển thị thông tin sản phẩm và các biến thể của nó
        include "view/use/detail.php";
    }
    





    public function showSearch($search)
    {
        $search = addslashes(trim($search));
        $DanhSachCategory = $this->productQuery->allCatories();


        $searchResult = $this->productQuery->searchProduct($search);
        $danhSachSearch = $searchResult['products'] ?? [];
        $soLuongSearch = $searchResult['count'] ?? 0;

        $message = null;
        if (empty($danhSachSearch)) {
            $message = "Không tìm thấy sản phẩm nào phù hợp với từ khóa '$search'.";
        } else {
            $message = "Tìm thấy $soLuongSearch sản phẩm phù hợp với từ khóa '$search'.";
        }

        $hotProductsResult = $this->productQuery->getHotProducts();
        $danhSachHot = $hotProductsResult['products'] ?? [];

        include "view/use/searchProduct.php";
    }





   
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
        $dsUser = $this->productQuery->allUser();

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
        $loi_sdt_danhmuc = "";
        $baoThanhCong = "";
    
        if (isset($_POST["submitForm"])) {
        
            $product = new Pay();
            $product->name_custom = trim(htmlspecialchars($_POST["name_custom"])); 
            $product->address = trim(htmlspecialchars($_POST["address"])); 
            $product->sdt = trim(htmlspecialchars($_POST["sdt"]));
    
            // Lấy variant từ session, mặc định là 37 nếu không có trong session
            $product->variant = isset($_SESSION['variant_name']) ? $_SESSION['variant_name'] : 37;
    
            // Kiểm tra các trường thông tin đã nhập
            if ($product->name_custom === "") {
                $loi_ten_danhmuc = "Hãy nhập tên người nhận";
            }
            if ($product->address === "") {
                $loi_tranthai_danhmuc = "Hãy nhập địa chỉ người nhận";
            }
            if ($product->sdt === "") {
                $loi_sdt_danhmuc = "Nhập số điện thoại người nhận";
            }
    
            // Nếu tất cả dữ liệu hợp lệ
            if ($loi_ten_danhmuc === "" && $loi_tranthai_danhmuc === "" && $loi_sdt_danhmuc === "") {
                $baoThanhCong = "Bạn đã tạo đơn hàng thành công";
                $dataCreated = $this->productQuery->pay($id, $product);

    
                // Nếu đơn hàng đã được tạo thành công, xóa giỏ hàng và chuyển hướng đến trang đơn hàng
                if ($dataCreated == "ok") {
                    $this->productQuery->deleteCart($id);
                    unset($_SESSION['variant_name']); // Reset variant_name trong session
                    header("Location: ?act=client_order");

                    exit; 
                }
            }
        }
    
        // Bao gồm view cho trang thanh toán
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
        $newList = $this->productQuery->allNewCl();
        include "view/viewclient/tintuc_list.php";
    }

    public function showNewDetail($id)
    {
        $newDetail = $this->productQuery->findNewCl($id);
        $newList = $this->productQuery->allNewCl(); 
        
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