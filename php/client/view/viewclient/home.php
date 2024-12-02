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
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="showcase-block">
                        <div class="display-logo ">
                            <a href="#">
                                <h2><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></h2>
                            </a>
                        </div>
                        <div class="showcase-img">
                            <a href="#"><img src="<?php echo htmlspecialchars(BASE_URL . $category->img, ENT_QUOTES, 'UTF-8'); ?>" alt=" <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>"></a>
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
<!-- testimonial -->
<div class="footer">
    <div class="container">
        <div class="row">
            <!-- footer-company-links -->
            <!-- footer-contact links -->
            <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer-widget">
                    <h3 class="footer-title">Thông tin hỗ trợ</h3>
                    <div class="contact-info">
                        <span class="contact-icon"><i class="fa fa-map-marker"></i></span>
                        <span class="contact-text">Trịnh Văn Bô<br>Thủ đô Hà Nội, Việt Nam</span>
                    </div>
                    <div class="contact-info">
                        <span class="contact-icon"><i class="fa fa-phone"></i></span>
                        <span class="contact-text">+084-123-4567 / 89</span>
                    </div>
                    <div class="contact-info">
                        <span class="contact-icon"><i class="fa fa-envelope"></i></span>
                        <span class="contact-text">nhom12@ltweb.com</span>
                    </div>
                </div>
            </div>
            <!-- /.footer-useful-links -->
            <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer-widget">
                    <h3 class="footer-title">Tiện ích</h3>
                    <ul class="arrow">
                    <li class="active"><a href="?act=client-home">Trang chủ</a></li>
                                <li><a href="?act=client-list">Sản phẩm</a>
                                </li>
                                <li><a href="?act=gioithieu">Giới thiệu</a>
                                </li>
                                <li><a href="?act=client-news">Tin tức</a> </li>
                                <li><a href="?act=lienhe">Liên hệ</a>
                                </li>
                    </ul>
                </div>
            </div>
            <!-- /.footer-useful-links -->
            <!-- footer-policy-list-links -->
            <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer-widget">
                    <h3 class="footer-title">Chính sách</h3>
                    <ul class="arrow">
                        <li><a href="#">Thanh toán</a></li>
                        <li><a href="#">Hủy, trả hàng</a></li>
                        <li><a href="#">Giao hàng và vận chuyển</a></li>
                        <li><a href="#">Chính sách bảo mật</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.footer-policy-list-links -->
            <!-- footer-social links -->
            <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer-widget">
                    <h3 class="footer-title">Liên lạc với chúng tôi</h3>
                    <div class="ft-social">
                        <span><a href="#" class="btn-social btn-facebook"><i class="fa fa-facebook"></i></a></span>
                        <span><a href="#" class="btn-social btn-twitter"><i class="fa fa-twitter"></i></a></span>
                        <span><a href="#" class="btn-social btn-googleplus"><i class="fa fa-google-plus"></i></a></span>
                        <span><a href="#" class=" btn-social btn-pinterest"><i class="fa fa-pinterest-p"></i></a></span>
                        <span><a href="#" class=" btn-social btn-instagram"><i class="fa fa-instagram"></i></a></span>
                    </div>
                </div>
            </div>
            <!-- /.footer-social links -->
        </div>
    </div>
    <!-- tiny-footer -->
    <div class="tiny-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="payment-method alignleft">
                        <ul>
                            <li><a href="#"><i class="fa fa-cc-paypal fa-2x"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-mastercard  fa-2x"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-visa fa-2x"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-discover fa-2x"></i></a></li>
                        </ul>
                    </div>
                    <p class="alignright">Copyright © All Rights Reserved 2020 Template Design by
                        <a href="https://easetemplate.com/" target="_blank" class="copyrightlink">Nhom 12</a>
                    </p>
                </div>
            </div>
        </div>
        <!-- /. tiny-footer -->
    </div>
</div>

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