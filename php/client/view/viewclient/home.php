<?php
include_once("model/ProductQuery.php");

$productQuery = new ProductQuery();
$bannerList = $productQuery->allBanner();


$isLoggedIn = isset($_SESSION['user_id']); // Kiểm tra người dùng đã đăng nhập
$_SESSION["quantity"] = 1;
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/viewClient/header.php'; ?>



<style>
    .carousel-inner .item img {
        height: 500px;
        /* Chiều cao cố định cho ảnh */
        object-fit: cover;
        /* Đảm bảo ảnh bao phủ toàn bộ khung mà không bị biến dạng */
        width: 100%;
        /* Đảm bảo ảnh chiếm toàn bộ chiều rộng của carousel */
    }
</style>



<!--  -->
<!-- slider -->
<div class="slider">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Các chỉ dẫn (Indicators) -->
        <ol class="carousel-indicators">
            <?php foreach ($bannerList as $index => $banner) { ?>
                <li data-target="#myCarousel" data-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>"></li>
            <?php } ?>
        </ol>

        <!-- Nội dung slideshow -->
        <div class="carousel-inner" role="listbox">
            <?php foreach ($bannerList as $index => $banner) { ?>
                <div class="item <?= $index === 0 ? 'active' : '' ?>">
                    <img src="<?= htmlspecialchars(BASE_URL . $banner->image_path) ?>" class="img-responsive center-block img-rounded img-thumbnail " alt="Slide <?= $index + 1 ?>">

                </div>
            <?php } ?>
        </div>

        <!-- Các điều khiển trước/sau -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>
<!-- /.slider -->
<!-- mobile showcase -->
<div class="space-medium">
    <div class="container">
        <div class="row">
            <div class="row justify-content-center">
                <?php
                $limitedCategories = array_slice($DanhSachCategory, 0, 4);
                foreach ($limitedCategories as $category) {
                ?>

                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card category-card shadow-sm p-3">
                            <div class="d-flex align-items-center">
                                <a href="?act=client-category&category=<?= htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8');  ?>">
                                    <div class="category-img me-3">
                                        <a href="?act=client-category&category=<?= htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8');  ?>">
                                            <img class="img-fluid rounded-circle" src="<?php echo htmlspecialchars(BASE_URL . $category->img, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>">
                                        </a>
                                    </div>
                                    <div class="category-content">
                                        <a href="?act=client-category&category=<?= htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8');  ?>" class="text-decoration-none">
                                            <h6 class="category-title text-primary mb-1">
                                                <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                                            </h6>
                                        </a>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- /.mobile showcase -->

    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-head">
                        <h3 class="head-title">Sản phẩm mới nhất</h3>
                    </div>
                    <div class="box-body">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-5 g-4"> <!-- Sửa ở đây để mỗi hàng có 5 sản phẩm -->
                            <?php foreach ($DanhSachobject as $product) { ?>
                                <!-- product -->
                                <div class="col mb-4">
                                    <a href="?act=client-detail&id=<?= htmlspecialchars($product->product_id) ?>" class="text-decoration-none">
                                        <div class="card product-item">
                                            <div class="product-thumb">
                                                <!-- Hình ảnh sản phẩm -->
                                                <img src="<?= htmlspecialchars(BASE_URL . $product->img) ?>" class="card-img-top" alt="<?= htmlspecialchars($product->name) ?>">
                                                <div class="product-action-link">
                                                    <button class="btn cart-btn">
                                                        <i class="bi bi-cart-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <!-- Tên sản phẩm -->
                                                <h5 class="product-title"><?= htmlspecialchars($product->name) ?></h5>
                                                <!-- Giá sản phẩm -->
                                                <p class="product-price"><?= number_format($product->price, 0, ',', '.') ?> VNĐ</p>
                                            </div>
                                            <div class="card-footer">
                                                <a href="?act=client-detail&id=<?= htmlspecialchars($product->product_id) ?>" class="stretched-link">Xem Chi Tiết</a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <!-- /.product -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- /.latest products -->
    <!-- seller products -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="box">
                    <div class="box-head">
                        <h3 class="head-title">Bán chạy nhất</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-carousel">
            <div class="box-body">
                <div class="row ">
                    <div class="owl-carousel owl-two owl-theme">
                        <!-- product -->
                        <?php
                        foreach ($danhSachHot as $product) { ?>
                            <div class="item col mb-4">
                                <a href="?act=client-detail&id=<?= htmlspecialchars($product->product_id) ?>" class="text-decoration-none">
                                    <div class="card product-item">
                                        <div class="product-thumb">
                                            <!-- Hình ảnh sản phẩm -->
                                            <img src="<?= htmlspecialchars(BASE_URL . $product->img) ?>" class="card-img-top" alt="<?= htmlspecialchars($product->name) ?>">
                                            <div class="product-action-link">
                                                <button class="btn cart-btn">
                                                    <i class="bi bi-cart-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <!-- Tên sản phẩm -->
                                            <h5 class="product-title"><?= htmlspecialchars($product->name) ?></h5>
                                            <!-- Giá sản phẩm -->
                                            <p class="product-price"><?= number_format($product->price, 0, ',', '.') ?> VNĐ</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="?act=client-detail&id=<?= htmlspecialchars($product->product_id) ?>" class="stretched-link">Xem Chi Tiết</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                        <!-- /.product -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.seller products -->
<!-- featured products -->
<div class="container">
    <div class="row">
        <hr>
        <h1>Tin tức</h1>
        <!-- Tin lớn bên trái (bố cục dọc) -->
        <div class="col-lg-6 col-md-6 col-sm-12">
            <?php if (!empty($newList[0])) { ?>
                <div class="featured-news">
                    <a href="?act=client-newdetail&id=<?= htmlspecialchars($newList[0]->new_id) ?>">
                        <img src="<?= htmlspecialchars(BASE_URL . $newList[0]->new_img) ?>" alt="<?= htmlspecialchars($newList[0]->title) ?>" class="img-fluid custom-img">
                    </a>
                    <h3 class="news-title mt-3"> <!-- Thêm mt-3 để tạo khoảng cách giữa ảnh và tiêu đề -->
                        <a href="?act=client-newdetail&id=<?= htmlspecialchars($newList[0]->new_id) ?>">
                            <?= htmlspecialchars($newList[0]->title) ?>
                        </a>
                    </h3>
                    <p class="custom-content"><?= htmlspecialchars(mb_strimwidth($newList[0]->content, 0, 200, "...")) ?></p>
                </div>
            <?php } ?>
        </div>

        <!-- Hai tin nhỏ bên phải (bố cục ngang) -->
        <div class="col-lg-6 col-md-6 col-sm-12">
            <?php for ($i = 1; $i <= 2; $i++) {
                if (!empty($newList[$i])) { ?>
                    <div class="small-news mb-4 d-flex">
                        <a href="?act=client-newdetail&id=<?= htmlspecialchars($newList[$i]->new_id) ?>" class="text-decoration-none">
                            <!-- Đảm bảo hai ảnh có kích thước bằng nhau -->
                            <img src="<?= htmlspecialchars(BASE_URL . $newList[$i]->new_img) ?>" alt="<?= htmlspecialchars($newList[$i]->title) ?>" class="img-fluid mb-2 custom-img" style="width: 250px; height: 150px; ">
                        </a>
                        <div class="ml-3" style="flex-grow: 1;">
                            <h5 class="news-title mt-2" style="margin-left: 20px;"> <!-- Thêm mt-2 để tạo khoảng cách giữa ảnh và tiêu đề -->
                                <a href="?act=client-newdetail&id=<?= htmlspecialchars($newList[$i]->new_id) ?>">
                                    <?= htmlspecialchars($newList[$i]->title) ?>
                                </a>
                            </h5>
                            <p style="margin-left: 20px;" class="custom-content"><?= htmlspecialchars(mb_strimwidth($newList[$i]->content, 0, 100, "...")) ?></p>

                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>





    <!-- /.featured products -->
    <!-- features -->
    <div class="bg-default pdt40 pdb40">
        <div class="container">
            <div class="row">
                <!-- features -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="feature-left">
                        <div class="feature-outline-icon">
                            <i class="fa fa-credit-card"></i>
                        </div>
                        <div class="feature-content">
                            <h3 class="text-white">Thanh toán an toàn</h3>
                            <p>Mang đến dịch vụ trải nghiệm thoải mái nhất, an toàn, tiện dụng, Mobistore! </p>
                        </div>
                    </div>
                </div>
                <!-- features -->
                <!-- features -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="feature-left">
                        <div class="feature-outline-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="feature-content">
                            <h3 class="text-white">Phản hồi 24/7</h3>
                            <p>Trợ giúp liên lạc, tham khảo , tra cứu 24/7!</p>
                        </div>
                    </div>
                </div>
                <!-- features -->
                <!-- features -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="feature-left feature-circle">
                        <div class="feature-outline-icon">
                            <i class="fa fa-rotate-left "></i>
                        </div>
                        <div class="feature-content">
                            <h3 class="text-white">Đổi trả miễn phí</h3>
                            <p>Miễn phí bảo hành đổi trả lên đến 365 ngày!</p>
                        </div>
                    </div>
                </div>
                <!-- features -->
                <!-- features -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="feature-left">
                        <div class="feature-outline-icon">
                            <i class="fa fa-dollar"></i>
                        </div>
                        <div class="feature-content">
                            <h3 class="text-white">Giá tốt nhất</h3>
                            <p>Giá thành tốt nhất trong thị trường. Cập nhật sản phẩm 24/7!</p>
                        </div>
                    </div>
                </div>
                <!-- features -->
            </div>
        </div>
    </div>
    <!-- /.features -->
    <!-- testimonial -->
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/viewclient/footer.php'; ?>
    </footer>


    <script src="../viewclient/js/jquery.min.js" type="text/javascript"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../viewclient/js//bootstrap.min.js" type="text/javascript"></script>
    <!-- <script src="../viewclient/js/bootstrap.min.js" type="text/javascript"></script> -->
    <script src="../viewclient/js/menumaker.js" type="text/javascript"></script>
    <script type="text/javascript" src="../viewclient/js/jquery.sticky.js"></script>
    <script type="text/javascript" src="../viewclient/js/sticky-header.js"></script>
    <script type="text/javascript" src="../viewclient/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="../viewclient/js/multiple-carousel.js"></script>
    </body>


    <!-- Mirrored from easetemplate.com/free-website-templates/mobistore/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Nov 2021 09:40:40 GMT -->

    </html>


    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                items: 4, // Số lượng sản phẩm hiển thị
                margin: 10, // Khoảng cách giữa các sản phẩm
                loop: true, // Lặp lại carousel
                autoplay: true, // Tự động chuyển
                autoplayTimeout: 3000, // Thời gian chuyển giữa các sản phẩm
                nav: true, // Hiển thị nút điều hướng (trái/phải)
            });
        });
    </script>

    <style>
        .category-card {
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .category-card:hover {
            transform: scale(1.02);
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
        }

        .category-img img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border: 3px solid #f8f9fa;
        }

        .category-content .category-title {
            font-size: 18px;
            font-weight: bold;
        }

        .category-content p {
            font-size: 14px;
            margin-top: 5px;
        }

        .featured-news img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 15px;
            object-fit: cover;
            height: 250px;
            /* Chiều cao ảnh tin lớn */
        }

        .featured-news .news-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .featured-news p {
            font-size: 14px;
            color: #555;
        }

        .small-news img {
            width: 100%;
            border-radius: 8px;
            object-fit: cover;
            height: 120px;
            /* Chiều cao ảnh tin nhỏ */
        }

        .small-news .news-title {
            font-size: 16px;
            font-weight: 600;
            margin-top: 10px;
        }

        @media (max-width: 768px) {

            .featured-news img,
            .small-news img {
                height: auto;
            }
        }

        /* Giao diện bài viết liên quan */
        .related-post-content {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 300px;
            height: 500px;
        }

        .related-post-content:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        /* Loại bỏ gạch chân cho liên kết trong bài viết liên quan */
        .related-title a {
            text-decoration: none;
            /* Tắt gạch chân */
            font-size: 18px;
            font-weight: 600;
            color: #333;
            transition: color 0.3s ease;
            /* Hiệu ứng chuyển đổi màu */
        }

        .related-title a:hover {
            color: #007bff;
            /* Đổi màu khi hover */
            text-decoration: none;
            /* Giữ không gạch chân khi hover */
        }

        .btn-link {
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            font-size: 14px;
            color: #fff;
            background: #007bff;
            border-radius: 5px;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .btn-link:hover {
            background-color: #0056b3;
            text-decoration: none;
        }

        .post-title {
            font-weight: 600;

        }

        .custom-img {
            height: 300px;
            /* Điều chỉnh chiều cao hình ảnh */
            object-fit: cover;
            /* Đảm bảo ảnh không bị méo, cắt xén vừa vặn */
        }

        .custom-content {
            font-size: 16px;
            /* Tăng kích thước chữ cho dễ đọc */
            line-height: 1.5;
            /* Tăng khoảng cách giữa các dòng */
            min-height: 180px;
            /* Đảm bảo chiều cao của nội dung đủ dài */
            overflow: hidden;
            /* Giới hạn nội dung tràn ra ngoài */
        }

        /* Cải thiện kích thước của tin nhỏ */
        .small-news img {
            height: 200px;
            /* Điều chỉnh chiều cao hình ảnh của các tin nhỏ */
            object-fit: cover;
        }

        .small-news h5 {
            font-size: 18px;
            margin-top: 10px;
        }
    </style>