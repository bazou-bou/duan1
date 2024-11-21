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
        include "view/product/list.php";
    }

    public function showDelete($product_id)
    {
        if ($product_id != "") {
            //1> gọi xuống model để xóa
            $dataDelete = $this->productQuery->delete($product_id);
            //2.cuyển hướng về trang danh sách
            if ($dataDelete === "ok") {
                header("location:?act=product-list");
            }
        } else {
            echo "Lỗi không tìm thấy id này!";
        }
    }

    // Khái báo phương thức showCreate() để xử lý trường hợp người dùng truy cập trang tạo mới
    public function showCreate()
    {
        $loi_ten = $loi_anh = $loi_price = $loi_description = $loi_stock = $loi_views = $loi_category = $baoThanhCong = "";
        $dsCtr = $this->productQuery->allCatories();

        if (isset($_POST["submitForm"])) {
            $product = new Product();
            $product->name = $_POST["name"] ?? '';
            $product->stock = $_POST["stock"] ?? '';
            $product->price = $_POST["price"] ?? '';
            $product->description = $_POST["description"] ?? '';
            $product->views = $_POST["views"] ?? '';
            $product->category_id = $_POST["category"] ?? '';
            $product->status = $_POST["status"] ?? '';

            // Validation
            if ($product->name === "") $loi_ten = "Hãy nhập tên giày đi!!";
            if ($product->price === "") $loi_price = "Hãy nhập giá giày đi!!";
            if ($product->description === "") $loi_description = "Hãy nhập mô tả giày đi!!";
            if ($product->stock === "") $loi_stock = "Hãy nhập số lượng giày đi!!";
            if ($product->views === "") $loi_views = "Hãy nhập lượt xem giày đi!!";
            if ($product->category === "") $loi_category = "Hãy chọn phân loại giày đi!!";
            if ($product->category === "") $loi_category = "Hãy chọn phân loại giày đi!!";

            // File upload
            $thanSo01 = $_FILES['fileUpload']['tmp_name'];
            $thanSo02 = "../upload/" . $_FILES['fileUpload']['name'];
            if (move_uploaded_file($thanSo01, $thanSo02)) {
                $product->img = "upload/" . $_FILES['fileUpload']['name'];
                $loi_anh = "";
            } else {
                $loi_anh = "Không upload lên đc";
            }

            // If no errors, insert product
            if ($loi_ten === "" && $loi_anh === "" && $loi_price === "" && $loi_description === "" && $loi_stock === "" && $loi_views === "" && $loi_category === "") {
                $baoThanhCong = "Bạn đã cập nhật thành công";
                $dataCreated = $this->productQuery->insert($product);
                if ($dataCreated == "ok") {
                    header("Location: ?act=product-list");
                    exit();
                }
            }
        }

        include "view/product/create.php";
    }


    // Khái báo phương thức showDetail($id) để xử lý trường hợp người dùng truy cập trang chi tiết
    // Lưu ý: Phải nhận vào param là $id muốn xem xem chi tiết
    public function showCategory($category)
    {
        $DanhSachCtegory = $this->productQuery->findCategory($category);
        include "view/product/category.php";
    }

    // Khái báo phương thức showUpdate($id) để xử lý trường hợp người dùng truy cập trang chỉnh sửa
    // Lưu ý: Phải nhận vào param là $id muốn xem chỉnh sửa
    public function showUpdate($id)
    {
        if ($id !== "") {
            $loi_ten = "";
            $loi_anh = "";
            $loi_price = "";
            $loi_description = "";
            $loi_stock = "";
            $loi_views = "";
            $loi_category = "";
            $baoThanhCong = "";
            $DanhSachOne = $this->productQuery->find($id);
            
            if (isset($_POST["submitForm"])) {
                $product = new Product();
                $product->name = $_POST["name"];
                //  $product->img=$_POST["img"];
                $product->stock = $_POST["stock"];
                $product->price = $_POST["price"];
                $product->description = $_POST["description"];
                $product->views = $_POST["views"];
                $product->category_id = $_POST["category"];

                if ($_POST["name"] === "") {
                    $loi_ten = "Hãy nhập tên giày đi!!";
                }
                if ($_POST["price"] === "") {
                    $loi_price = "Hãy nhập giá giày đi!!";
                }
                if ($_POST["description"] === "") {
                    $loi_description = "Hãy nhập mô tả giày đi!!";
                }
                if ($_POST["stock"] === "") {
                    $loi_stock = "Hãy nhập số lượng giày đi!!";
                }
                if ($_POST["views"] === "") {
                    $loi_views = "Hãy nhập lượt xem giày đi!!";
                }
                if ($_POST["category"] === "") {
                    $loi_category = "Hãy chọn phân loại giày đi!!";
                }


                $thanSo01 = $_FILES['fileUpload']['tmp_name']; //Bộ nhớ tạm đang lưu trữ file
                $thanSo02 = "../upload/" . $_FILES['fileUpload']['name']; // Đường dẫn để chuyển file từ bộ nhớ tạm vào
                if (move_uploaded_file($thanSo01, $thanSo02)) {
                    $product->img = "upload/" . $_FILES['fileUpload']['name'];
                    $loi_anh = "";
                } else {
                    $loi_anh = "Không uplod lên đc";
                }
                if ($loi_ten === "" && $loi_anh === "" && $loi_price === "" && $loi_description === "" && $loi_stock === "" && $loi_views === "" && $loi_category === "") {
                    $baoThanhCong = "Bạn đã cập nhập ok";
                    $dataCreated = $this->productQuery->update($product, $id);
                    if ($dataCreated == "ok") {
                        $product = new Product();
                    }
                }
            }
            include "view/product/update.php";
        } else {
            echo "Lỗi: Không nhận được thông tin ID. Mời bạn kiểm tra lại. <hr>";
        }
    }

    public function showUsers()
    {
        $DanhSachUsers = $this->productQuery->allUser();
        include "view/product/users.php";
    }

    public function showComment()
    {
        $DanhSachComment = $this->productQuery->allComment();
        include "view/product/comment.php";
    }

    public function unban($user_id)
    {
        try {
            $banUser=$this->productQuery->unban($user_id);
            if ($banUser=="ok") {
                header("Location: ?act=product-listusers");
            }
            exit();
        } catch (Exception $e) {
            // Handle the error (e.g., log it and display a user-friendly message)
            echo "Error unbanning user: " . $e->getMessage();
        }
    }
    
    public function ban($user_id)
    {
        try {
            $banUser=$this->productQuery->ban($user_id);
            if ($banUser=="ok") {
                header("Location: ?act=product-listusers");
            }
            exit();
        } catch (Exception $e) {
            // Handle the error (e.g., log it and display a user-friendly message)
            echo "Error banning user: " . $e->getMessage();
        }
    }
    

    public function showCrt()
    {
        $dsCtr = $this->productQuery->allCatories();
        include "view/catories/list.php";
    }
    public function createCtr()
    {
        $loi_ten_danhmuc = "";
        $loi_tranthai_danhmuc = "";
        $baoThanhCong = "";

        if (isset($_POST["submitForm"])) {
            $product = new categories();
            $product->name = $_POST["name"];
            //  $product->img=$_POST["img"];
            $product->status = $_POST["status"];


            if ($_POST["name"] === "") {
                $loi_ten_danhmuc = "Hãy nhập tên danh mục";
            }
            if ($_POST["status"] === "") {
                $loi_tranthai_danhmuc = "Hãy nhập trạng thái của danh mục";
            }


            if ($loi_ten_danhmuc === "" && $loi_tranthai_danhmuc === "") {
                $baoThanhCong = "Bạn đã cập nhập ok";
                $dataCreated = $this->productQuery->createCtr($product);
                if ($dataCreated == "ok") {
                    $product = new Product();
                }
            }
        }
        include "view/catories/create.php";
    }

    public function updateCtr($id)
    {
        if ($id !== "") {
            $loi_ten_danhmuc = "";
            $loi_tranthai_danhmuc = "";
            $baoThanhCong = "";

            $dsachCtr = $this->productQuery->findCtr($id);
            if (isset($_POST["submitForm"])) {
                $product = new categories();
                $product->name = $_POST["name"];
                //  $product->img=$_POST["img"];
                $product->status = $_POST["status"];


                if ($_POST["name"] === "") {
                    $loi_ten_danhmuc = "Hãy nhập tên danh mục";
                }
                if ($_POST["status"] === "") {
                    $loi_tranthai_danhmuc = "Hãy nhập trạng thái của danh mục";
                }


                if ($loi_ten_danhmuc === "" && $loi_tranthai_danhmuc === "") {
                    $baoThanhCong = "Bạn đã cập nhập ok";
                    $dataCreated = $this->productQuery->updateCtr($product, $id);
                    if ($dataCreated == "ok") {
                        $product = new categories();
                    }
                }
            }
            include "view/catories/update.php";
        } else {
            echo "Lỗi: Không nhận đucợ thông tin ID. Mời bạn kiểm tra lại. <hr>";
        }
    }

    public function deleteCtr($category_id)
    {
        if ($category_id != "") {
            //1> gọi xuống model để xóa
            $dataDelete = $this->productQuery->deleteCtr($category_id);
            //2.cuyển hướng về trang danh sách
            if ($dataDelete === "ok") {
                header("location:?act=catories-list");
            }
        } else {
            echo "Lỗi không tìm thấy id này!";
        }
    }

    public function listOrder(){
        $DanhSachobject = $this->productQuery->allOrder();

        include "view/product/orderlist.php";
    }

    public function listOrderItem($id){
        $DanhSachobject = $this->productQuery->findOrder($id);

        include "view/product/orderitemlist.php";


    }

}
