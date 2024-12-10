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
        include "view/product/list.php";
    }





    public function toggleStatus($id, $table, $field)
    {
         $toggleStatus = $this->productQuery->toggleStatus($id, $table, $field);

        if ($toggleStatus == "ok") {
             header("Location: ?act=$table-list");
            exit;
        } else {
             echo "Không thể thay đổi trạng thái.";
        }
    }



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
           
            if ($product->name === "") $loi_ten = "Hãy nhập tên giày đi!!";
            if ($product->price === "") $loi_price = "Hãy nhập giá giày đi!!";
            if ($product->description === "") $loi_description = "Hãy nhập mô tả giày đi!!";
            if ($product->stock === "") $loi_stock = "Hãy nhập số lượng giày đi!!";
            if ($product->views === "") $loi_views = "Hãy nhập lượt xem giày đi!!";
            if ($product->category === "") $loi_category = "Hãy chọn phân loại giày đi!!";

             $thanSo01 = $_FILES['fileUpload']['tmp_name'];
            $thanSo02 = "../upload/" . $_FILES['fileUpload']['name'];
            if (move_uploaded_file($thanSo01, $thanSo02)) {
                $product->img = "upload/" . $_FILES['fileUpload']['name'];
                $loi_anh = "";
            } else {
                $loi_anh = "Không upload lên đc";
            }

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


 
    public function showCategory($category)
    {
        $DanhSachCtegory = $this->productQuery->findCategory($category);
        include "view/product/category.php";
    }

 
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
 

            if (isset($_POST["submitForm"])) {
                $product = new Product();
                $product->name = $_POST["name"];
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


                $thanSo01 = $_FILES['fileUpload']['tmp_name']; 
                $thanSo02 = "../upload/" . $_FILES['fileUpload']['name'];
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
            $product->status = $_POST["status"];


            if ($_POST["name"] === "") {
                $loi_ten_danhmuc = "Hãy nhập tên danh mục";
            }
            if ($_POST["status"] === "") {
                $loi_tranthai_danhmuc = "Hãy nhập trạng thái của danh mục";
            }

            $thanSo01 = $_FILES['fileUpload']['tmp_name']; 
            $thanSo02 = "../upload/" . $_FILES['fileUpload']['name'];
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
                $product->status = $_POST["status"];


                if ($_POST["name"] === "") {
                    $loi_ten_danhmuc = "Hãy nhập tên danh mục";
                }
                if ($_POST["status"] === "") {
                    $loi_tranthai_danhmuc = "Hãy nhập trạng thái của danh mục";
                }

                $thanSo01 = $_FILES['fileUpload']['tmp_name']; 
                $thanSo02 = "../upload/" . $_FILES['fileUpload']['name'];
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

    public function showBannerList()
    {
        $bannerList = $this->productQuery->allBanner();
        include "view/product/banner.php";  
    }

    public function showBannerCreate()
    {
        $loi_ten = $loi_anh  = $loi_description = "";

        if (isset($_POST["submitForm"])) {
            $product = new Banner();
            $product->title = $_POST["title"] ?? '';
            $product->image_path = $_POST["image_path"] ?? '';
            $product->status = $_POST["status"] ?? '';

            if ($product->title === "") $loi_ten = "Hãy nhập tên giày đi!!";
            if ($product->status === "") $loi_description = "Hãy nhập mô tả giày đi!!";




            $thanSo01 = $_FILES['fileUpload']['tmp_name'];
            $thanSo02 = "../upload/" . $_FILES['fileUpload']['name'];
            if (move_uploaded_file($thanSo01, $thanSo02)) {
                $product->image_path = "upload/" . $_FILES['fileUpload']['name'];
                $loi_anh = "";
            } else {
                $loi_anh = "Không upload lên đc";
            }

            if ($loi_ten === "" && $loi_anh === ""  && $loi_description === "") {
                $baoThanhCong = "Bạn đã cập nhật thành công";
                $dataCreated = $this->productQuery->insertBanner($product);
                if ($dataCreated == "ok") {
                    header("Location: ?act=banner-list");
                    exit();
                }
            }
        }

        include "view/product/bannercreate.php";  
    }

    public function showBannerUpdate($id)
    {
        if ($id !== "") {
            $loi_ten = $loi_anh = $loi_description = $baoThanhCong = "";
            $banner = $this->productQuery->findBanner($id);
            $dsbanner = $this->productQuery->allBanner();  


            $oldImagePath = $banner->image_path; 

            if (isset($_POST["submitForm"])) {
                $banner = new Banner();
                $banner->title = $_POST["title"] ?? '';
                $banner->image_path = $_POST["image_path"] ?? '';
                $banner->status = $_POST["status"] ?? '';


                if ($banner->title === "") {
                    $loi_ten = "Hãy nhập tiêu đề banner!";
                }
                if ($banner->status === "") {
                    $loi_description = "Hãy chọn trạng thái banner!";
                }

                if ($_FILES['fileUpload']['name'] != "") {
                    $thanSo01 = $_FILES['fileUpload']['tmp_name']; 
                    $thanSo02 = "../upload/" . $_FILES['fileUpload']['name']; 

                    if (move_uploaded_file($thanSo01, $thanSo02)) {
                        $banner->image_path = "upload/" . $_FILES['fileUpload']['name']; 
                        $loi_anh = "";
                    } else {
                        $loi_anh = "Không upload được ảnh!";
                    }
                } else {
                    $banner->image_path = $oldImagePath;
                }
                if ($loi_ten === "" && $loi_anh === "" && $loi_description === "") {
                    $baoThanhCong = "Bạn đã cập nhật banner thành công!";
                    $dataUpdated = $this->productQuery->updateBanner($banner, $id); 

                    if ($dataUpdated == "ok") {
                        header("Location: ?act=banner-list");
                        exit();
                    }
                }
            }

            include "view/product/bannerupdate.php";  
        } else {
            echo "Lỗi: Không tìm thấy thông tin ID của banner.";
        }
    }

    public function showBannerDelete($id)
    {
        if ($id !== "") {
            $dataDeleted = $this->productQuery->deleteBanner($id);  
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
        $contactList = $this->productQuery->allContact(); 
        include "view/contact/contact_list.php";  
    }

    public function showContactDelete($id)
    {
        if ($id !== "") {
            $dataDeleted = $this->productQuery->deleteContact($id); 
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
        $newList = $this->productQuery->allNew();  
        include "view/news/news_list.php";  
    }

    public function showNewDelete($id)
    {
        if ($id !== "") {
            $dataDeleted = $this->productQuery->deleteNew($id);  
            if ($dataDeleted == "ok") {
                header("Location: ?act=news-list");
                exit();
            }
        } else {
            echo "Lỗi: Không tìm thấy ID của contact.";
        }
    }

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

            if ($new->title === "") $loi_ten = "Hãy nhập tiêu đề!!";
            if ($new->content === "") $loi_content = "bài viết không để trống!!";
          
            $thanSo01 = $_FILES['fileUpload']['tmp_name'];
            $thanSo02 = "../upload/" . $_FILES['fileUpload']['name'];
            if (move_uploaded_file($thanSo01, $thanSo02)) {
                $new->new_img = "upload/" . $_FILES['fileUpload']['name'];
                $loi_anh = "";
            } else {
                $loi_anh = "Không upload lên đc";
            }

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
        $new = $this->productQuery->findNew($id);  
        $dsnew = $this->productQuery->allNew();  


        $oldImagePath = $new->new_img;  

        if (isset($_POST["submitForm"])) {
            $new = new News();
            $new->title = $_POST["title"] ?? '';
            $new->new_img = $_POST["new_img"] ?? '';
            $new->content = $_POST["content"] ?? '';
            $new->status = $_POST["status"] ?? '';

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

            if ($_FILES['fileUpload']['name'] != "") {
                $thanSo01 = $_FILES['fileUpload']['tmp_name']; 
                $thanSo02 = "../upload/" . $_FILES['fileUpload']['name']; 

                if (move_uploaded_file($thanSo01, $thanSo02)) {
                    $new->new_img = "upload/" . $_FILES['fileUpload']['name']; 
                    $loi_anh = "";
                } else {
                    $loi_anh = "Không upload được ảnh!";
                }
            } else {
                $new->new_img = $oldImagePath;
            }

            if ($loi_ten === "" && $loi_anh === "" && $loi_content === ""  && $loi_status === "" && $loi_created_at === "") {
                $baoThanhCong = "Bạn đã cập nhật tin tức thành công!";
                $dataUpdated = $this->productQuery->updateNew($new, $id);  

                if ($dataUpdated == "ok") {
                    header("Location: ?act=news-list");
                    exit();
                }
            }
        }

        include "view/news/new_update.php"; 
    } else {
        echo "Lỗi: Không tìm thấy thông tin ID của banner.";
    }
}

}
