<?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/viewClient/header.php'; ?>
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/style.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/owl.carousel.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/owl.theme.default.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">


<!-- slider -->
<div class="slider">
    <div class="owl-carousel owl-one owl-theme">
        <div class="item">
            <div class="slider-img">
                <img src="../viewclient/images/banner_cvs.webp" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-6 col-xs-12">
                        <div class="slider-captions">
                            <a href="cart.html" class="btn btn-primary btn-lg hidden-xs">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="slider-img"><img src="../viewclient/images/slider_2.jpg" alt=""></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-6 col-xs-12">
                        <div class="slider-captions">
                            <h1 class="slider-title">Google Pixel 2</h1>
                            <p class="hidden-xs">The latest Qualcomm Snapdragon 835 processor | Water-resistant metal unibody | Up to 7 hours of battery.</p>
                            <p class="slider-price">$ 938.10</p>
                            <a href="cart.html" class="btn btn-primary btn-lg hidden-xs">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="slider-img"><img src="../viewclient/images/slider_3.jpg" alt=""></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-6 col-xs-12">
                        <div class="slider-captions">
                            <div class="brand-img">
                                <img src="../viewclient/images/apple_logo.png" alt="">
                            </div>
                            <h1 class="slider-title">iphone 8 plus </h1>
                            <p class="hidden-xs">5.5 inch Retina HD Display | 12MP wide-angle cameras
                                <br> | 64 GB &amp; 256 GB ROM Memory
                            </p>
                            <p class="slider-price">$759.64</p>
                            <a href="cart.html" class="btn btn-primary btn-lg hidden-xs">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.slider -->
<!-- mobile showcase -->
<div class="space-medium">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="showcase-block">
                    <div class="display-logo ">
                        <a href="#">
                            <h2> Converse Chuck 1970</h2>
                        </a>
                    </div>
                    <div class="showcase-img">
                        <a href="#"><img src="../viewclient/images/ds_1.webp" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="showcase-block">
                    <div class="display-logo ">
                        <a href="#">
                            <h2> Converse Chuck 1970</h2>
                        </a>
                    </div>
                    <div class="showcase-img">
                        <a href="#"><img src="../viewclient/images/ds_1.webp" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="showcase-block">
                    <div class="display-logo ">
                        <a href="#">
                            <h2> Converse Chuck 1970</h2>
                        </a>
                    </div>
                    <div class="showcase-img">
                        <a href="#"><img src="../viewclient/images/ds_1.webp" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="showcase-block">
                    <div class="display-logo ">
                        <a href="#">
                            <h2> Converse Chuck 1970</h2>
                        </a>
                    </div>
                    <div class="showcase-img">
                        <a href="#"><img src="../viewclient/images/ds_1.webp" alt=""></a>
                    </div>
                </div>
            </div>
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
                    <div class="row">
                        <?php foreach ($DanhSachobject as $product) { ?>
                            <!-- product -->
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="?act=client-detail&id=<?= htmlspecialchars($product->product_id) ?>" class="text-decoration-none">
                                    <div class="product-block">
                                        <div class="product-img"><img src="<?= htmlspecialchars(BASE_URL . $product->img) ?>" alt=""></div>
                                        <div class="product-content">
                                            <h5><a href="#" class="product-title"><?= htmlspecialchars($product->name) ?></a></h5>
                                            <div class="product-meta"><a href="#" class="product-price"><?= number_format($product->price, 0, ',', '.') ?> VNĐ</a>
                                                <!-- <a href="#" class="discounted-price">$1400</a>
                                        <span class="offer-price">20%off</span> -->
                                            </div>
                                            <div class="shopping-btn">
                                                <a href="#" class="product-btn btn-like"><i class="fa fa-heart"></i></a>
                                                <a href="#" class="product-btn btn-cart"><i class="fa fa-shopping-cart"></i></a>
                                            </div>
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
            <div class="row">
                <div class="owl-carousel owl-two owl-theme">
                    <!-- product -->
                    <div class="item">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-block">
                                <div class="product-img"><img src="../viewclient/images/product_img_5.png" alt=""></div>
                                <div class="product-content">
                                    <h5><a href="#" class="product-title">Apple iPhone 6 <strong>(32 GB, Gold)</strong></a></h5>
                                    <div class="product-meta"><a href="#" class="product-price">$1700</a>
                                        <a href="#" class="discounted-price">$2000</a>
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
                    </div>
                    <!-- product -->
                    <div class="item">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-block">
                                <div class="product-img"><img src="../viewclient/images/product_img_6.png" alt=""></div>
                                <div class="product-content">
                                    <h5><a href="#" class="product-title">Apple iPhone 7 <strong>(256 GB, Black)</strong> </a></h5>
                                    <div class="product-meta"><a href="#" class="product-price">$1400</a>
                                        <a href="#" class="discounted-price"><strike>$1800</strike></a>
                                        <span class="offer-price">20%off</span>
                                    </div>
                                    <div class="shopping-btn">
                                        <a href="#" class="product-btn btn-like"><i class="fa fa-heart"></i></a>
                                        <a href="#" class="product-btn btn-cart"><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.product -->
                    <!-- product -->
                    <div class="item">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-block">
                                <div class="product-img"><img src="../viewclient/images/product_img_7.png" alt=""></div>
                                <div class="product-content">
                                    <h5><a href="#" class="product-title">Apple iPhone 6S <strong>(32GB, Gold)</strong> </a></h5>
                                    <div class="product-meta"><a href="#" class="product-price">$1300</a>
                                        <a href="#" class="discounted-price"><strike>$2000</strike></a>
                                        <span class="offer-price">20%off</span>
                                    </div>
                                    <div class="shopping-btn">
                                        <a href="#" class="product-btn btn-like"><i class="fa fa-heart"></i></a>
                                        <a href="#" class="product-btn btn-cart"><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.product -->
                    <!-- product -->
                    <div class="item">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-block">
                                <div class="product-img"><img src="../viewclient/images/product_img_8.png" alt=""></div>
                                <div class="product-content">
                                    <h5><a href="#" class="product-title">Apple iPhone X <strong>(64 GB, Grey)</strong></a></h5>
                                    <div class="product-meta"><a href="#" class="product-price">$1200</a>
                                        <a href="#" class="discounted-price"><strike>$2000</strike></a>
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