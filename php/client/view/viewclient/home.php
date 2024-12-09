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
    <?php
    $limitedCategories = array_slice($DanhSachCategory, 0, 4);
    foreach ($limitedCategories as $category) {
    ?>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-4">
            <div class="card h-100">
                <div class="product-thumb position-relative">
                    <!-- Hình ảnh sản phẩm -->
                    <img src="<?= htmlspecialchars(BASE_URL . $category->img) ?>" class="card-img-top img-fluid" alt="<?= htmlspecialchars($category->name) ?>">

                    <!-- Nền xám, chữ đen, góc dưới trái -->
                    <a href="?act=client-category&category=<?= htmlspecialchars($category->name) ?>" class="product-name bg-light text-dark p-2 position-absolute bottom-0 start-0 w-100 text-center">
                        <?= htmlspecialchars($category->name) ?>
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
                    <h3 class="head-title">Tin tức</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <!-- product -->
                        <div class="related-post-block">
                            <div class="row">
                                <?php foreach ($newList as $news) { ?>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="related-post-content">
                                            <div class="related-img">
                                                <a href="?act=client-newdetail&id=<?= htmlspecialchars($news->new_id) ?>"><img src="<?= htmlspecialchars(BASE_URL . $news->new_img) ?>" alt="Product Image"></a>
                                            </div>
                                            <h4 class="related-title"><a href="?act=client-newdetail&id=<?= htmlspecialchars($news->new_id) ?>"><?= htmlspecialchars($news->title) ?></a></h4>
                                            <p><?= htmlspecialchars(mb_strimwidth($news->content, 0, 60, "...")) ?></p>
                                            <a href="?act=client-newdetail&id=<?= htmlspecialchars($news->new_id) ?>" class="btn-link">ĐỌC THÊM</a>
                                        </div>
                                    </div>
                                <?php } ?>
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
</style>