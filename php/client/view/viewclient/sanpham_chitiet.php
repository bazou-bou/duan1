<?php


$isLoggedIn = isset($_SESSION['user_id']); // Kiểm tra người dùng đã đăng nhập
$_SESSION["quantity"] = 1;
if (isset($_POST["quantity"])) {
    $_SESSION["quantity"] = intval($_POST["quantity"]); // Chuyển đổi sang số nguyên
}

var_dump($_SESSION["quantity"]); // Debug, nên xoá sau khi kiểm tra
?>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/viewClient/header.php'; ?>
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/style.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/owl.carousel.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/owl.theme.default.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- page-header -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="?act=lient-list">Trang chủ</a></li>
                        <li>Chi tiết sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.page-header-->
<!-- product-single -->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="box">
                    <!-- product-description -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="main-image">
                                    <img id="main-img" src="<?= htmlspecialchars(BASE_URL . $DanhSachOne->img) ?>" class="img-fluid" />
                                </div>
                                <ul id="demo1_thumbs" class="slideshow_thumbs">

                                    <li>
                                        <a
                                            href="https://www.xtmobile.vn/vnt_upload/product/10_2021/thumbs/600_iphone_13_256gb_xanh.jpg">
                                            <div class=" thumb-img"><img
                                                    src="https://www.xtmobile.vn/vnt_upload/product/10_2021/thumbs/600_iphone_13_256gb_xanh.jpg"
                                                    alt=""></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="https://www.xtmobile.vn/vnt_upload/product/10_2021/thumbs/600_iphone_13_256gb_trang.jpg">
                                            <div class=" thumb-img"><img
                                                    src="https://www.xtmobile.vn/vnt_upload/product/10_2021/thumbs/600_iphone_13_256gb_trang.jpg"
                                                    alt=""></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.xtmobile.vn/vnt_upload/product/10_2021/thumbs/600_iphone_13_256gb_hong.jpg"
                                            alt="">
                                            <div class=" thumb-img"><img
                                                    src="https://www.xtmobile.vn/vnt_upload/product/10_2021/thumbs/600_iphone_13_256gb_hong.jpg"
                                                    alt=""></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div id="slideshow"></div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="product-single">
                                    <h2><?= htmlspecialchars($DanhSachOne->name) ?></h2>
                                    <div class="product-rating">
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span class="text-secondary">&nbsp;<?= htmlspecialchars($DanhSachOne->views) ?> reviews</span>
                                    </div>
                                    <p class="product-price" style="font-size: 25px;"><?= number_format($DanhSachOne->price, 0, ',', '.') ?> vnd<strike
                                            style="color:rgba(128, 128, 128, 0.658); font-size: 18px;">
                                            6.990.000đ</strike>
                                    </p>
                                    <!--  -->

                                    <div class="box-capacity">
                                        <a href="">
                                            <span class="capacity">36</span>

                                        </a>

                                        <a href="" class="current-phone">
                                            <span class="capacity">37</span>

                                        </a>

                                        <a href="">
                                            <span class="capacity">38</span>

                                        </a>
                                    </div>


                                    <!-- <div class="color-phone">
                                        <a href="" class="current-color">
                                            <span>36</span>
                                        </a>
                                        <a href="">
                                            <span>37</span>
                                        </a>
                                        <a href="">
                                            <span>38</span>
                                        </a>
                                        <a href="">
                                            <span>39</span>
                                        </a>
                                        <a href="">
                                            <span>40</span>
                                        </a>
                                        <a href="">
                                            <span>41</span>
                                        </a>
                                    </div> -->
                                    <div class="product-quantity">
                                        <h4>Số lượng</h4>
                                        <div class="quantity mb20">
                                            <input class="btn-quantity decrease-quantity" onclick="dcQuantity()"
                                                type="button" value="-">
                                            <input type="number" max="10" min="1" name="quantity" value="1"
                                                class="quantity-input" id="quantity-input">
                                            <input class="btn-quantity increase-quantity" onclick="icQuantity()"
                                                type="button" value="+">
                                        </div>
                                        <span class="rest-quantity">5 sản phẩm có sẵn</span>
                                    </div>
                                    <div>
                                        <button class="btn btn-default btn-buy-now">
                                            Mua Ngay
                                        </button>
                                        <button type="submit" class="btn btn-default">
                                            <i class="fa fa-shopping-cart"></i><a href="?act=client-addcart&id=<?= htmlspecialchars($DanhSachOne->product_id) ?>" type="submit">Thêm vào giỏ hàng</a>
                                        </button>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="box-head scroll-nav">
                    <div class="head-title">
                        <a class="page-scroll active" href="#product">Mô tả sản phẩm</a>
                        <a class="page-scroll" href="#rating">Đánh giá và nhận xét</a>
                        <a class="page-scroll" href="#review">Thêm nhận xét</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- highlights -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="description-details">
                    <div class="description-left">
                        <h2 class="dgctpro">Đặc điểm nổi bật</h2>
                        <div itemprop="description" class="content_hide content-desc" style="height: 1180px;">
                        <p><?= htmlspecialchars($DanhSachOne->description) ?></p>
                            <h2><a href="https://www.xtmobile.vn/iphone-13-128gb" target="_blank"><span
                                        style="color: rgb(0, 0, 205);">iPhone 13 128GB</span></a>&nbsp;gây
                                ấn tượng với thiết kế sang trọng, cấu hình mạnh mẽ với chip A15
                                Bionic, dung lượng lớn, camera độc đáo. Đây là một trong những lý do
                                khiến người dùng không nên bỏ qua&nbsp;<a
                                    href="https://www.xtmobile.vn/iphone-13" target="_blank"><span
                                        style="color: rgb(0, 0, 205);">iPhone 13</span></a>&nbsp;series
                                trong năm nay.</h2>

                            <h3>Thiết kế cao cấp, sang trọng</h3>

                            <p>Đánh giá iPhone 13 128GB cho thấy ngoại hình máy không có nhiều khác
                                biệt so với iPhone 12. Apple tiếp tục sử dụng cạnh viền vát phẳng mang
                                đến sự nam tính và mạnh mẽ. Phần thân máy siêu mỏng, kết hợp với
                                mặt kính cường lực bóng bẩy và khung nhôm chắc chắn mang đến độ bền
                                tốt hơn.</p>

                            <p style="text-align: center;"><img alt="thiet-ke-iphone-13-128gb-xtmobile"
                                    src="https://www.xtmobile.vn/vnt_upload/product/10_2021/thiet-ke-iphone-13-128gb-xtmobile.jpg"
                                    style="width: 680px; height: 510px;"></p>

                            <p>Để trang bị viên pin lớn hơn cho dòng iPhone 13, "Táo khuyết" sẽ tăng độ
                                dày của máy lên thêm khoảng 0,26mm. Mặt trước máy vẫn sử dụng notch
                                tai thỏ đặt trưng, tuy nhiên kích thước có phần nhỏ gọn hơn thế hệ
                                trước. Trong khi đó, mặt sau được thay đổi cách sắp xếp camera giúp
                                người dùng dễ dàng phân biệt giữa iPhone 13 và iPhone 12.</p>

                            <p>Nếu như iPhone 12 sở hữu mô-đun camera hình vuông với ống kính xếp dọc
                                thì trên iPhone 13 128GB giá rẻ được sắp xếp theo đường chéo. Bên cạnh
                                đó, cụm camera cũng có phần to và lồi hơn. Thế hệ iPhone 2021 ra mắt
                                năm này được Apple bổ sung khá nhiều màu sắc mới mẻ, giúp người dùng
                                có nhiều lựa chọn hơn.</p>
                        </div>
                        <button class="less-evaluation text-center" style="display:none"><i
                                class="fa fa-minus-circle"></i> Rút gọn</button>
                        <button class="more-evaluation text-center"><i class="fa fa-plus-circle"></i> Xem
                            thêm</button>

                    </div>
                </div>
            </div>
        </div>
        <!-- rating reviews  -->
        <div id="rating">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="box container-rating-review">
                        <div class="box-head">
                            <h3 class="head-title">Đánh giá và nhận xét</h3>
                        </div>
                        <div class="box-body">
                            <div class="row  rating-box">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="rating-review">
                                        <div class="">
                                            <h1 class="score-rating">4</h1>
                                        </div>
                                        <div>
                                            <div class="product-rating">
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star-o"></i></span>
                                            </div>
                                            <p class="text-secondary">12 nhận xét</p>
                                        </div>
                                    </div>
                                    <div class="rating-view-details">
                                        <div class="rating-level">
                                            <div class="product-rating">
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                            </div>
                                            <span>12</span>
                                        </div>

                                        <div class="rating-level">
                                            <div class="product-rating">
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star-o"></i></span>
                                            </div>
                                            <span>0</span>
                                        </div>
                                        <div class="rating-level">
                                            <div class="product-rating">
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star-o"></i></span>
                                                <span><i class="fa fa-star-o"></i></span>
                                            </div>
                                            <span>0</span>
                                        </div>

                                        <div class="rating-level">
                                            <div class="product-rating">
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star-o"></i></span>
                                                <span><i class="fa fa-star-o"></i></span>
                                                <span><i class="fa fa-star-o"></i></span>
                                            </div>
                                            <span>0</span>
                                        </div>
                                        <div class="rating-level">
                                            <div class="product-rating">
                                                <span><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star-o"></i></span>
                                                <span><i class="fa fa-star-o"></i></span>
                                                <span><i class="fa fa-star-o"></i></span>
                                                <span><i class="fa fa-star-o"></i></span>
                                            </div>
                                            <span>0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row review-box">
                                <div class="customer-reviews">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <p class="reviews-text"><span class="text-default">Nika Nguyen</span> </p>
                                        <div class="product-rating">
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                        </div>
                                        <p>Giao hàng siêu đúng hẹn, hàng cũng được đóng gói cẩn thận.
                                            Hiện tại mình xài được vài bữa thì không bị vấn đề gì.
                                            Hàng của shopdunk thì không lo về chất lượng.</p>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="divider-line"></div>
                                    </div>
                                </div>
                                <div class="customer-reviews">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <p class="reviews-text"> <span class="text-default">Lưu Tee</span>
                                        </p>
                                        <div class="product-rating">
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                        </div>

                                        <p>Mặc dù vận chuyển lâu do lỗi, nhưng shop vẫn hỗ trợ mình rất nhiệt tình
                                        </p>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="divider-line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div id="review">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="box">
                            <div class="box-head">
                                <h3 class="head-title">Đánh giá và nhận xét của bạn</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="review-form">

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 review-left">
                                            <div class="review-rating">
                                                <h4>Đánh giá của bạn về sản phẩm này</h4><br />
                                                <div class="star-rate" id="rateYo"></div>
                                            </div>
                                        </div>
                                        <form class="review-right">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label sr-only " for="name"></label>
                                                    <input id="name" type="text" class="form-control"
                                                        placeholder="Họ tên" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label sr-only " for="email"></label>
                                                    <input id="email" type="text" class="form-control"
                                                        placeholder="Email" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label sr-only " for="textarea"></label>
                                                    <textarea class="form-control" id="textarea" name="textarea"
                                                        rows="4" placeholder="Mời bạn nhập bình luận"></textarea>
                                                </div>
                                                <button id="submit" name="singlebutton" class="btn btn-primary">Gửi
                                                    đánh giá</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.reviews-form -->

        </div>


    </div>
    <!-- /.product-description -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="box-head">
                    <h3 class="head-title">Sản phẩm liên quan</h3>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <?php
                    foreach ($danhsachCategory as $product) {
                    ?>
                        <!-- product -->
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb30">
                            <a href="?act=client-detail&id=<?= htmlspecialchars($product->product_id) ?>" class="text-decoration-none">
                                <div class="product-block">
                                    <div class="product-img"><img src="<?= htmlspecialchars(BASE_URL . $product->img) ?>" alt="<?= htmlspecialchars($product->name) ?>"></div>
                                    <div class="product-content">
                                        <h5><a href="#" class="product-title"><?= htmlspecialchars($product->name) ?></a></h5>
                                        <div class="product-meta"><a href="#" class="product-price"><?= number_format($product->price, 0, ',', '.') ?> VNĐ</a>
                                            <!-- <a href="#" class="discounted-price">$1400</a>
                                    <span class="offer-price">20%off</span> -->
                                        </div>
                                        <div class="shopping-btn">
                                            <a href="#" class="product-btn btn-like"><i class="fa fa-heart"></i></a>
                                            <a href="?act=client-detail&id=<?= htmlspecialchars($product->product_id) ?>" class="product-btn btn-cart"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
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
    <!-- /.product-single -->
</div>

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
                        <span class="contact-text">Phường Linh Trung, Thủ Đức<br>Thành phố Hồ Chí Minh, Việt Nam - 1955</span>
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
                        <li><a href="index.html">Home </a></li>
                        <li><a href="product-list.html">Mobie</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="blog-default.html">Blog</a></li>
                        <li><a href="contact-us.html">Contact</a></li>
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

<script type="text/javascript">
    $('#slideshow').desoSlide({
        thumbs: $('ul.slideshow_thumbs li > a'),
        effect: {
            provider: 'animate',
            name: 'fade'
        }

    });
</script>

<script type="text/javascript">
    $(function() {
        $("#rateYo").rateYo({
            rating: 3.6,
            starWidth: "25px"
        });

    });
</script>

<script>
    function dcQuantity() {
        var result = document.getElementById('quantity-input');
        var qty = result.value;
        if (!isNaN(qty) && qty > 1) {
            result.value--;
            document.getElementById('quantity-input').innerHTML = qty;
        }
        return false;
    };

    function icQuantity() {
        var result = document.getElementById('quantity-input');
        var qty = result.value;
        if (!isNaN(qty) && qty < 10) {
            result.value++;
            document.getElementById('quantity-input').innerHTML = qty;
        }
        return false;
    }
</script>

<script>
    $(document).ready(function() {
        $('.less-evaluation').click(function() {
            $('.content-desc').css('height', '1180px');
            $(this).css('display', 'none');
            $('.more-evaluation').css('display', 'block');
        })
    })

    $(document).ready(function() {
        $('.more-evaluation').click(function() {
            $('.content-desc').css('height', 'auto');
            $(this).css('display', 'none');
            $('.less-evaluation').css('display', 'block');
        })
    })

    $(document).ready(function() {
        $('.page-scroll').click(function() {
            $('.page-scroll').removeClass('active');
            $(this).addClass('active');
        })
    })
</script>

</body>


<!-- Mirrored from easetemplate.com/free-website-templates/mobistore/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Nov 2021 09:40:40 GMT -->

</html>