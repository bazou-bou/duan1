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





    public function toggleStatus($id, $table, $field)
    {
        // Truyền giá trị field linh hoạt
        $toggleStatus = $this->productQuery->toggleStatus($id, $table, $field);

        if ($toggleStatus == "ok") {
            // Chuyển hướng nếu cập nhật thành công
            header("Location: ?act=$table-list");
            exit;
        } else {
            // Hiển thị lỗi nếu cập nhật thất bại
            echo "Không thể thay đổi trạng thái.";
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
            // $product->status = $_POST["status"] ?? '';

            // Validation
            if ($product->name === "") $loi_ten = "Hãy nhập tên giày đi!!";
            if ($product->price === "") $loi_price = "Hãy nhập giá giày đi!!";
            if ($product->description === "") $loi_description = "Hãy nhập mô tả giày đi!!";
            if ($product->stock === "") $loi_stock = "Hãy nhập số lượng giày đi!!";
            if ($product->views === "") $loi_views = "Hãy nhập lượt xem giày đi!!";
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
                    header("Location: ?act=products-list");
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
            $dsCtr = $this->productQuery->allCatories();
            // var_dump($dsCtr);
            // var_dump($DanhSachOne);

            if (isset($_POST["submitForm"])) {
                $product = new Product();
                $product->name = $_POST["name"];
                //  $product->img=$_POST["img"];
                $product->stock = $_POST["stock"];
                $product->price = $_POST["price"];
                $product->description = $_POST["description"];
                $product->views = $_POST["views"];
                $product->category_id = $_POST["category_id"];

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
                if ($_POST["category_id"] === "") {
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
        $loi_anh = "";

        if (isset($_POST["submitForm"])) {
            $product = new categories();
            $product->name = $_POST["name"];
            //  $product->img=$_POST["img"];
            $product->status = $_POST["status"];
            // $product->img = $_POST["img"];


            if ($_POST["name"] === "") {
                $loi_ten_danhmuc = "Hãy nhập tên danh mục";
            }
            if ($_POST["status"] === "") {
                $loi_tranthai_danhmuc = "Hãy nhập trạng thái của danh mục";
            }

            $thanSo01 = $_FILES['fileUpload']['tmp_name']; //Bộ nhớ tạm đang lưu trữ file
            $thanSo02 = "../upload/" . $_FILES['fileUpload']['name']; // Đường dẫn để chuyển file từ bộ nhớ tạm vào
            if (move_uploaded_file($thanSo01, $thanSo02)) {
                $product->img = "upload/" . $_FILES['fileUpload']['name'];
                $loi_anh = "";
            } else {
                $loi_anh = "Không uplod lên đc";
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
            $loi_anh = "";

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

                $thanSo01 = $_FILES['fileUpload']['tmp_name']; //Bộ nhớ tạm đang lưu trữ file
                $thanSo02 = "../upload/" . $_FILES['fileUpload']['name']; // Đường dẫn để chuyển file từ bộ nhớ tạm vào
                if (move_uploaded_file($thanSo01, $thanSo02)) {
                    $product->img = "upload/" . $_FILES['fileUpload']['name'];
                    $loi_anh = "";
                } else {
                    $loi_anh = "Không uplod lên đc";
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

    public function showThongke()
    {
        $DanhSachUsers = $this->productQuery->allUser();
        $donHang = $this->productQuery->donHang();
        $totalUsers = $this->productQuery->totalUsers();
        $topKhachHang = $this->productQuery->topKhachHang();
        $doanhSoTheoNam=$this->productQuery->revenueByYear();
        $donHangTheoNam=$this->productQuery->locDonHangTheoNam();


        $doanhThu = $this->productQuery->doanhthu();
        // var_dump($donHangTheoNam);
        // echo "<br>";
        // var_dump($doanhSoTheoNam);

        include "view/product/thongke.php";
    }

    public function listOrder()
    {
        $DanhSachobject = $this->productQuery->allOrder();

        include "view/product/orderlist.php";
    }

    public function listOrderItem($id)
    {
        $DanhSachobject = $this->productQuery->findOrder($id);

        include "view/product/orderitemlist.php";
    }

    // 1. Phương thức hiển thị danh sách banner
    public function showBannerList()
    {
        $bannerList = $this->productQuery->allBanner();  // Gọi phương thức lấy tất cả banner từ model
        include "view/product/banner.php";  // Gọi view hiển thị danh sách banner
    }

    // 2. Phương thức hiển thị trang tạo mới banner
    public function showBannerCreate()
    {
        $loi_ten = $loi_anh  = $loi_description = "";

        if (isset($_POST["submitForm"])) {
            $product = new Banner();
            $product->title = $_POST["title"] ?? '';
            $product->image_path = $_POST["image_path"] ?? '';
            $product->status = $_POST["status"] ?? '';

            // Validation
            if ($product->title === "") $loi_ten = "Hãy nhập tên giày đi!!";
            // if ($product->image_path === "") $loi_price = "Hãy nhập giá giày đi!!";
            if ($product->status === "") $loi_description = "Hãy nhập mô tả giày đi!!";




            // File upload
            $thanSo01 = $_FILES['fileUpload']['tmp_name'];
            $thanSo02 = "../upload/" . $_FILES['fileUpload']['name'];
            if (move_uploaded_file($thanSo01, $thanSo02)) {
                $product->image_path = "upload/" . $_FILES['fileUpload']['name'];
                $loi_anh = "";
            } else {
                $loi_anh = "Không upload lên đc";
            }

            // If no errors, insert product
            if ($loi_ten === "" && $loi_anh === ""  && $loi_description === "") {
                $baoThanhCong = "Bạn đã cập nhật thành công";
                // var_dump($product->title);
                $dataCreated = $this->productQuery->insertBanner($product);
                if ($dataCreated == "ok") {
                    header("Location: ?act=banner-list");
                    exit();
                }
            }
        }

        include "view/product/bannercreate.php";  // Gọi view để tạo mới banner
    }

    // 3. Phương thức hiển thị trang chỉnh sửa banner
    public function showBannerUpdate($id)
    {
        if ($id !== "") {
            $loi_ten = $loi_anh = $loi_description = $baoThanhCong = "";
            $banner = $this->productQuery->findBanner($id);  // Lấy thông tin banner hiện tại
            $dsbanner = $this->productQuery->allBanner();  // Lấy danh sách banner

            // var_dump($banner); // Kiểm tra đối tượng banner

            $oldImagePath = $banner->image_path;  // Lưu lại đường dẫn ảnh cũ

            if (isset($_POST["submitForm"])) {
                $banner = new Banner();
                $banner->title = $_POST["title"] ?? '';
                $banner->image_path = $_POST["image_path"] ?? '';
                $banner->status = $_POST["status"] ?? '';


                // Validate các trường dữ liệu
                if ($banner->title === "") {
                    $loi_ten = "Hãy nhập tiêu đề banner!";
                }
                if ($banner->status === "") {
                    $loi_description = "Hãy chọn trạng thái banner!";
                }

                // Nếu có ảnh mới, thực hiện upload
                if ($_FILES['fileUpload']['name'] != "") {
                    $thanSo01 = $_FILES['fileUpload']['tmp_name']; // Bộ nhớ tạm lưu trữ file
                    $thanSo02 = "../upload/" . $_FILES['fileUpload']['name']; // Đường dẫn lưu file

                    if (move_uploaded_file($thanSo01, $thanSo02)) {
                        $banner->image_path = "upload/" . $_FILES['fileUpload']['name']; // Cập nhật đường dẫn ảnh
                        $loi_anh = "";
                    } else {
                        $loi_anh = "Không upload được ảnh!";
                    }
                } else {
                    // Nếu không có ảnh mới, giữ lại ảnh cũ
                    $banner->image_path = $oldImagePath;
                }
                // Nếu không có lỗi, tiến hành cập nhật banner
                if ($loi_ten === "" && $loi_anh === "" && $loi_description === "") {
                    $baoThanhCong = "Bạn đã cập nhật banner thành công!";
                    $dataUpdated = $this->productQuery->updateBanner($banner, $id);  // Cập nhật vào cơ sở dữ liệu

                    if ($dataUpdated == "ok") {
                        header("Location: ?act=banner-list");
                        exit();
                    }
                }
            }

            include "view/product/bannerupdate.php";  // Gọi view để chỉnh sửa banner
        } else {
            echo "Lỗi: Không tìm thấy thông tin ID của banner.";
        }
    }

    // 4. Phương thức xóa banner
    public function showBannerDelete($id)
    {
        if ($id !== "") {
            $dataDeleted = $this->productQuery->deleteBanner($id);  // Xóa banner theo ID
            if ($dataDeleted == "ok") {
                header("Location: ?act=banner-list");
                exit();
            }
        } else {
            echo "Lỗi: Không tìm thấy ID của banner.";
        }
    }

    public function showContactList()
    {
        $contactList = $this->productQuery->allContact();  // Gọi phương thức lấy tất cả contact từ model
        include "view/contact/contact_list.php";  // Gọi view hiển thị danh sách contact
    }

    public function showContactDelete($id)
    {
        if ($id !== "") {
            $dataDeleted = $this->productQuery->deleteContact($id);  // Xóa Contact theo ID
            if ($dataDeleted == "ok") {
                header("Location: ?act=contact-list");
                exit();
            }
        } else {
            echo "Lỗi: Không tìm thấy ID của contact.";
        }
    }

    public function showNewList()
    {
        $newList = $this->productQuery->allNew();  // Gọi phương thức lấy tất cả contact từ model
        include "view/news/news_list.php";  // Gọi view hiển thị danh sách contact
    }

    public function showNewDelete($id)
    {
        if ($id !== "") {
            $dataDeleted = $this->productQuery->deleteNew($id);  // Xóa Contact theo ID
            if ($dataDeleted == "ok") {
                header("Location: ?act=news-list");
                exit();
            }
        } else {
            echo "Lỗi: Không tìm thấy ID của contact.";
        }
    }

    // Khái báo phương thức showCreate() để xử lý trường hợp người dùng truy cập trang tạo mới
    public function showCreateNew()
    {
        $loi_ten = $loi_anh  = $loi_content = $loi_view  = $baoThanhCong = "";
        $dsnewCtr = $this->productQuery->allNew();

        if (isset($_POST["submitForm"])) {
            $new = new News();
            $new->title = $_POST["title"] ?? '';
            $new->content = $_POST["content"] ?? '';
            $new->new_img = $_POST["new_img"] ?? '';
            $new->view = $_POST["view"] ?? '';
            $new->created_at = $_POST["category"] ?? '';
            $new->status = $_POST["status"] ?? '';

            // Validation
            if ($new->title === "") $loi_ten = "Hãy nhập tiêu đề!!";
            if ($new->content === "") $loi_content = "bài viết không để trống!!";
            // if ($new->view === "") $loi_view = "Hãy nhập mô tả giày đi!!";
            // if ($new->status === "") $loi_status = "Hãy nhập số lượng giày đi!!";


            // File upload
            $thanSo01 = $_FILES['fileUpload']['tmp_name'];
            $thanSo02 = "../upload/" . $_FILES['fileUpload']['name'];
            if (move_uploaded_file($thanSo01, $thanSo02)) {
                $new->new_img = "upload/" . $_FILES['fileUpload']['name'];
                $loi_anh = "";
            } else {
                $loi_anh = "Không upload lên đc";
            }

            // If no errors, insert product
            if ($loi_ten === "" && $loi_anh === "" && $loi_content === "" && $loi_view === "" ) {
                $baoThanhCong = "Bạn đã cập nhật thành công";
                $dataCreated = $this->productQuery->insertNew($new);
                if ($dataCreated == "ok") {
                    header("Location: ?act=news-create");
                    exit();
                }
            }
        }

        include "view/news/news_create.php";
    }

    public function showNewUpdate($id)
{
    if ($id !== "") {
        $loi_ten = $loi_anh = $loi_content  = $loi_status = $loi_created_at = $baoThanhCong = "";
        $new = $this->productQuery->findNew($id);  // Lấy thông tin banner hiện tại
        $dsnew = $this->productQuery->allNew();  // Lấy danh sách banner

        var_dump($new); // Kiểm tra đối tượng banner

        $oldImagePath = $new->new_img;  // Lưu lại đường dẫn ảnh cũ

        if (isset($_POST["submitForm"])) {
            // Lấy dữ liệu từ form
            $new = new News();
            $new->title = $_POST["title"] ?? '';
            $new->new_img = $_POST["new_img"] ?? '';
            $new->content = $_POST["content"] ?? '';
            // $new->view = $_POST["view"] ?? '';
            $new->status = $_POST["status"] ?? '';
            // $new->created_at = $_POST["created_at"] ?? '';

            // Validate các trường dữ liệu
            if ($new->title === "") {
                $loi_ten = "Hãy nhập tiêu đề new!";
            }
            if ($new->content === "") {
                $loi_content = "Hãy nhập bài viết!";
            }
            
            if ($new->status === "") {
                $loi_status = "Hãy chọn trạng thái new!";
            }
            if ($new->created_at === "") {
                $loi_created_at = "Hãy chọn ngày new!";
            }

            // Nếu có ảnh mới, thực hiện upload
            if ($_FILES['fileUpload']['name'] != "") {
                $thanSo01 = $_FILES['fileUpload']['tmp_name']; // Bộ nhớ tạm lưu trữ file
                $thanSo02 = "../upload/" . $_FILES['fileUpload']['name']; // Đường dẫn lưu file

                if (move_uploaded_file($thanSo01, $thanSo02)) {
                    $new->new_img = "upload/" . $_FILES['fileUpload']['name']; // Cập nhật đường dẫn ảnh
                    $loi_anh = "";
                } else {
                    $loi_anh = "Không upload được ảnh!";
                }
            } else {
                // Nếu không có ảnh mới, giữ lại ảnh cũ
                $new->new_img = $oldImagePath;
            }

            // Nếu không có lỗi, tiến hành cập nhật banner
            if ($loi_ten === "" && $loi_anh === "" && $loi_content === ""  && $loi_status === "" && $loi_created_at === "") {
                $baoThanhCong = "Bạn đã cập nhật tin tức thành công!";
                $dataUpdated = $this->productQuery->updateNew($new, $id);  // Cập nhật vào cơ sở dữ liệu

                if ($dataUpdated == "ok") {
                    header("Location: ?act=news-list");
                    exit();
                }
            }
        }

        include "view/news/new_update.php";  // Gọi view để chỉnh sửa banner
    } else {
        echo "Lỗi: Không tìm thấy thông tin ID của banner.";
    }
}

}
