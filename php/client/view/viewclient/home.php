<?php
include_once("model/ProductQuery.php");

$productQuery = new ProductQuery();
$bannerList = $productQuery->allBanner();


$isLoggedIn = isset($_SESSION['user_id']);
$_SESSION["quantity"] = 1;
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/viewClient/header.php'; ?>



<style>
    .carousel-inner .item img {
        height: 500px;
        object-fit: cover;
        width: 100%;
    }
</style>




<div class="slider">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php foreach ($bannerList as $index => $banner) { ?>
                <li data-target="#myCarousel" data-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>"></li>
            <?php } ?>
        </ol>

        <div class="carousel-inner" role="listbox">
            <?php foreach ($bannerList as $index => $banner) { ?>
                <div class="item <?= $index === 0 ? 'active' : '' ?>">
                    <img src="<?= htmlspecialchars(BASE_URL . $banner->image_path) ?>" class="img-responsive center-block img-rounded img-thumbnail " alt="Slide <?= $index + 1 ?>">

                </div>
            <?php } ?>
        </div>

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

<div class="space-medium">
    <div class="container">
    <div class="row justify-content-center">
    <?php
    $limitedCategories = array_slice($DanhSachCategory, 0, 4);
    foreach ($limitedCategories as $category) {
    ?>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card category-card shadow-sm p-3">
                <div class="d-flex align-items-center">
                    <div class="category-img me-3">
                        <a href="#">
                            <img class="img-fluid rounded-circle" src="<?php echo htmlspecialchars(BASE_URL . $category->img, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>">
                        </a>
                    </div>
                    <div class="category-content">
                        <a href="#" class="text-decoration-none">
                            <h6 class="category-title text-primary mb-1">
                                <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                            </h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
    </div>
</div>

<div class="container">

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="box">
            <div class="box-head">
                <h3 class="head-title">Sản phẩm mới nhất</h3>
            </div>
            <div class="box-body">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <?php foreach ($DanhSachobject as $product) { ?>
                        <div class="col mb-4">
                            <a href="?act=client-detail&id=<?= htmlspecialchars($product->product_id) ?>" class="text-decoration-none">
                                <div class="card product-item" style="border: none">
                                    <div class="product-thumb">
                                        <img src="<?= htmlspecialchars(BASE_URL . $product->img) ?>" class="card-img-top" alt="<?= htmlspecialchars($product->name) ?>">
                                        <div class="product-action-link">
                                            <button class="btn cart-btn">
                                                <i class="bi bi-cart-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="product-title"><?= htmlspecialchars($product->name) ?></h5>
                                    </div>
                                    <div class="card-footer">
                                        <a href="?act=client-detail&id=<?= htmlspecialchars($product->product_id) ?>" class="stretched-link">Xem Chi Tiết</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>




</div>


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
                    <?php
                    foreach ($danhSachHot as $product) { ?>
                        <div class="item col mb-4">
                            <a href="?act=client-detail&id=<?= htmlspecialchars($product->product_id) ?>" class="text-decoration-none">
                                <div class="card product-item" style="border: none">
                                    <div class="product-thumb">
                                        <img src="<?= htmlspecialchars(BASE_URL . $product->img) ?>" class="card-img-top" alt="<?= htmlspecialchars($product->name) ?>">
                                        <div class="product-action-link">
                                            <button class="btn cart-btn">
                                                <i class="bi bi-cart-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="product-title"><?= htmlspecialchars($product->name) ?></h5>
                                        <p class="product-price"><?= number_format($product->price, 0, ',', '.') ?> VNĐ</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="?act=client-detail&id=<?= htmlspecialchars($product->product_id) ?>" class="stretched-link">Xem Chi Tiết</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container">
<div class="row">
    <hr>
    <h1>Tin tức</h1>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <?php if (!empty($newList[0])) { ?>
            <div class="featured-news">
                <a href="?act=client-newdetail&id=<?= htmlspecialchars($newList[0]->new_id) ?>">
                    <img src="<?= htmlspecialchars(BASE_URL . $newList[0]->new_img) ?>" alt="<?= htmlspecialchars($newList[0]->title) ?>" class="img-fluid custom-img">
                </a>
                <h3 class="news-title mt-3"> 
                    <a href="?act=client-newdetail&id=<?= htmlspecialchars($newList[0]->new_id) ?>">
                        <?= htmlspecialchars($newList[0]->title) ?>
                    </a>
                </h3>
                <p class="custom-content"><?= htmlspecialchars(mb_strimwidth($newList[0]->content, 0, 200, "...")) ?></p>
            </div>
        <?php } ?>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12">
        <?php for ($i = 1; $i <= 2; $i++) { 
            if (!empty($newList[$i])) { ?>
                <div class="small-news mb-4 d-flex">
                    <a href="?act=client-newdetail&id=<?= htmlspecialchars($newList[$i]->new_id) ?>" class="text-decoration-none">
                        <img src="<?= htmlspecialchars(BASE_URL . $newList[$i]->new_img) ?>" alt="<?= htmlspecialchars($newList[$i]->title) ?>" class="img-fluid mb-2 custom-img" style="width: 250px; height: 150px; ">
                    </a>
                    <div class="ml-3" style="flex-grow: 1;">
                        <h5 class="news-title mt-2" style="margin-left: 20px;">
                            <a href="?act=client-newdetail&id=<?= htmlspecialchars($newList[$i]->new_id) ?>">
                                <?= htmlspecialchars($newList[$i]->title) ?>
                            </a>
                        </h5>
                        <p style="margin-left: 20px;" class="custom-content"><?= htmlspecialchars(mb_strimwidth($newList[$i]->content, 0, 100, "...")) ?></p>

                    </div>
                </div>
        <?php } } ?>
    </div>
</div>






<div class="bg-default pdt40 pdb40">
    <div class="container">
        <div class="row">
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
        </div>
    </div>
</div>

<div class="footer">
    <div class="container">
        <div class="row">

            <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer-widget">
                    <h3 class="footer-title">Thông tin hỗ trợ</h3>
                    <div class="contact-info">
                        <span class="contact-icon"><i class="fa fa-map-marker"></i></span>
                        <span class="contact-text">Trịnh Văn Bô,<br>Thủ đô Hà Nội, Việt Nam</span>
                    </div>
                    <div class="contact-info">
                        <span class="contact-icon"><i class="fa fa-phone"></i></span>
                        <span class="contact-text">+084-123-4567</span>
                    </div>
                    <div class="contact-info">
                        <span class="contact-icon"><i class="fa fa-envelope"></i></span>
                        <span class="contact-text">nhom12@ltweb.com</span>
                    </div>
                </div>
            </div>
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
        </div>
    </div>
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
    </div>
</div>

<script src="../viewclient/js/jquery.min.js" type="text/javascript"></script>
<script src="../viewclient/js//bootstrap.min.js" type="text/javascript"></script>
<script src="../viewclient/js/menumaker.js" type="text/javascript"></script>
<script type="text/javascript" src="../viewclient/js/jquery.sticky.js"></script>
<script type="text/javascript" src="../viewclient/js/sticky-header.js"></script>
<script type="text/javascript" src="../viewclient/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="../viewclient/js/multiple-carousel.js"></script>
</body>



</html>


<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            items: 4, 
            margin: 10, 
            loop: true,
            autoplay: true, 
            autoplayTimeout: 3000, 
            nav: true, 
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

    .related-title a {
        text-decoration: none;
        font-size: 18px;
        font-weight: 600;
        color: #333;
        transition: color 0.3s ease;
    }

    .related-title a:hover {
        color: #007bff;
        text-decoration: none;
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
    object-fit: cover; 
}

.custom-content {
    font-size: 16px;  
    line-height: 1.5;  
    min-height: 180px;  
    overflow: hidden;  
}

.small-news img {
    height: 200px;  
    object-fit: cover;
}

.small-news h5 {
    font-size: 18px;
    margin-top: 10px;
}





.product-title {
    text-align: center;  
    color: #007bff;
}

.product-thumb {
    position: relative;
}


.cart-btn {
    background-color: rgba(255, 255, 255, 0.7);
    border: none;
    padding: 10px;
    border-radius: 50%;
}

.cart-btn i {
    font-size: 1.5rem; 
    color: #ff6f61;
}

.card-body {
    text-align: center;
}


</style>