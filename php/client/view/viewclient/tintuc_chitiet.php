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
                        <li><a href="?act=client-list">Trang chủ</a></li>
                        <li>Tin tức</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.page-header-->
<div class="content">
    <div class="container">
        <div class="row">
            <!-- <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="row"> -->
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="post-block ">
                    <!-- post block -->
                    <?php if (!empty($newDetail)) { ?>
                        <div class="post-content">
                            <h2 class="post-title"><?= htmlspecialchars($newDetail->title) ?></h2>
                            <div class="meta">
                                <span class="meta-date">December 25,2020</span>
                                <span>| &nbsp; &nbsp;</span>
                                <span class="meta-admin">By <a href="#" class="meta-title">Admin</a></span>
                            </div>
                            <div class="post-img">
                                <center> <img src="<?= htmlspecialchars(BASE_URL . $newDetail->new_img) ?>" alt="News Image" style="max-width: 50%;"></center>
                            </div>

                            <p class="mb30">
                            <p><?= htmlspecialchars($newDetail->content) ?></p>
                            </p>
                            <!-- related post block -->
                        </div>
                    <?php } else { ?>
                        <p>Bài viết không tồn tại hoặc đã bị xóa.</p>
                    <?php } ?>
                </div>
                <div class="related-post">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-md-12 col-sm-12">
                            <div class="related-head">
                                <h3 class="related-post-title mb30">Bài viết liên quan</h3>
                            </div>
                        </div>
                    </div>

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
                </div>

            </div>

        </div>
        <!-- /.related post block -->
    </div>
    <!-- </div>
            </div> -->
</div>
</div>

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
<style>
    /* Giao diện bài viết liên quan */
    .related-post-content {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        width: 260px;
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