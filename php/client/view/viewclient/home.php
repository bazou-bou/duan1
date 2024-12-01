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
        /* Ảnh bao phủ khung */
        width: 100%;
        /* Đảm bảo ảnh chiếm toàn bộ chiều rộng */
        border-radius: 10px;
        /* Bo góc nhẹ */
    }

    .product-thumb {
        position: relative;
        overflow: hidden;
        /* Đảm bảo không có phần tử nào vượt ra ngoài khung */
    }

    .product-thumb .product-name {
        position: absolute;
        bottom: 10px;
        /* Căn từ dưới lên */
        left: 10px;
        /* Căn từ trái qua */
        background: rgba(128, 128, 128, 0.7);
        /* Nền xám với độ mờ nhẹ */
        color: #000;
        /* Chữ màu đen */
        padding: 5px 10px;
        /* Thêm khoảng cách bên trong */
        border-radius: 5px;
        /* Bo góc nhẹ */
        font-size: 14px;
        /* Kích thước chữ */
        font-weight: bold;
        /* Chữ đậm */
        z-index: 10;
        /* Hiển thị trên ảnh */
        text-decoration: none;
        /* Loại bỏ gạch chân */
        transition: background 0.3s ease, color 0.3s ease;
        /* Hiệu ứng khi hover */
    }

    .product-thumb .product-name:hover {
        background: rgba(105, 105, 105, 0.9);
        /* Đậm màu hơn khi hover */
        color: #fff;
        /* Chữ đổi thành trắng khi hover */
    }

    .product-thumb img {
        border-radius: 10px;
        /* Bo góc hình ảnh */
        object-fit: cover;
        /* Ảnh bao phủ khung */
        width: 100%;
        height: 100%;
        /* Đảm bảo ảnh luôn vừa khung */
    }

    .card-footer a.stretched-link {
        color: #007bff;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .card-footer a.stretched-link:hover {
        color: #0056b3;
        text-decoration: underline;
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
        <div class="row owl-carousel owl-two owl-theme">
            <?php
            $limitedCategories = array_slice($DanhSachCategory, 0, 4);
            foreach ($limitedCategories as $category) {
            ?>
                <div class="product-thumb position-relative">
                    <!-- Hình ảnh sản phẩm -->
                    <img src="<?= htmlspecialchars(BASE_URL . $category->img) ?>" class="card-img-top" alt="<?= htmlspecialchars($category->name) ?>">

                    <!-- Nền xám, chữ đen, góc dưới trái -->
                    <a href="?act=client-category&category=<?= htmlspecialchars($category->name) ?>" class="product-name">
                        <?= htmlspecialchars($category->name) ?>
                    </a>
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
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
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
                        <!-- product -->

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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="box">
                <div class="box-head">
                    <h3 class="head-title">Đang khuyến mãi</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <!-- product -->
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="product-block">
                                <div class="product-img"><img src="../viewclient/images/product_img_3.png" alt=""></div>
                                <div class="product-content">
                                    <h5><a href="#" class="product-title">Samsung Galaxy Note 8</a></h5>
                                    <div class="product-meta"><a href="#" class="product-price">$1500</a>
                                        <a href="#" class="discounted-price"><strike>$2000</strike></a>
                                        <span class="offer-price">40%off</span>
                                    </div>
                                    <div class="shopping-btn">
                                        <a href="#" class="product-btn btn-like"><i class="fa fa-heart"></i></a>
                                        <a href="#" class="product-btn btn-cart"><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.product -->
                        <!-- product -->
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="product-block">
                                <div class="product-img"><img src="../viewclient/images/product_img_4.png" alt=""></div>
                                <div class="product-content">
                                    <h5><a href="#" class="product-title">Vivo V5 Plus <strong>(Matte Black)</strong></a></h5>
                                    <div class="product-meta"><a href="#" class="product-price">$1500</a>
                                        <a href="#" class="discounted-price"><strike>$2000</strike></a>
                                        <span class="offer-price">15%off</span>
                                    </div>
                                    <div class="shopping-btn">
                                        <a href="#" class="product-btn btn-like">
                                            <i class="fa fa-heart"></i></a>
                                        <a href="#" class="product-btn btn-cart"><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.product -->
                        <!-- product -->
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="product-block">
                                <div class="product-img"><img src="../viewclient/images/product_img_1.png" alt=""></div>
                                <div class="product-content">
                                    <h5><a href="#" class="product-title">Google Pixel <strong>(128GB, Black)</strong></a></h5>
                                    <div class="product-meta"><a href="#" class="product-price">$1100</a>
                                        <a href="#" class="discounted-price"><strike>$1400</strike></a>
                                        <span class="offer-price">20%off</span>
                                    </div>
                                    <div class="shopping-btn">
                                        <a href="#" class="product-btn btn-like"><i class="fa fa-heart"></i></a>
                                        <a href="#" class="product-btn btn-cart"><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.product -->
                        <!-- product -->
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="product-block">
                                <div class="product-img"><img src="../viewclient/images/product_img_2.png" alt=""></div>
                                <div class="product-content">
                                    <h5><a href="#" class="product-title">HTC U Ultra <strong>(64GB, Blue)</strong></a></h5>
                                    <div class="product-meta"><a href="#" class="product-price">$1200</a>
                                        <a href="#" class="discounted-price"><strike>$1700</strike></a>
                                        <span class="offer-price">10%off</span>
                                    </div>
                                    <div class="shopping-btn">
                                        <a href="#" class="product-btn btn-like"><i class="fa fa-heart"></i></a>
                                        <a href="#" class="product-btn btn-cart"><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.product -->
                    </div>
                </div>
            </div>
        </div>
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