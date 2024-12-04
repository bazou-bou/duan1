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
                        <li><a href="index.php">Trang chủ</a></li>
                        <li>Tin tức chi tiết</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.page-header-->
<!-- <div class="content"> -->
<div class="container">

    <div class="row">
        <?php if (!empty($newList)) { ?>
            <?php foreach ($newList as $new) { ?>

                <!-- <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"> -->
                <!-- <div class="row"> -->
                <!-- <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"> -->
                <!-- <div class="post-block "> -->
                <!-- post block -->
                <!-- <div class="post-content"> -->
                <h2 class="post-title"><?= htmlspecialchars($new->title) ?></a></h2>
                <div class="meta">
                    <span class="meta-date">December 25,2020</span>
                    <span>| &nbsp; &nbsp;</span>
                    <span class="meta-admin">By <a href="#" class="meta-title">Admin</a></span>
                    <span>|&nbsp; &nbsp;</span>
                    
                </div>
                <div class="post-img">
                <img src="<?= htmlspecialchars(BASE_URL . $new->new_img) ?>" alt="News Image" class="img-responsive" loading="lazy">

                </div>
                <p>Phasellus vehicula metus ligula, et aliquam massa eleifend nonaurisac lectus
                    vehicula nisl suscipit sagittis raesent sed mi convallis pulvinaex aclobortis
                    risuurabitur laoreet tellus et feugiat viverra magnanisi pretium nequenon
                    aliquamarcu dolor in nuci varius natoque penatibusete.
                    <br>
                    <br> Etiam sed lorem sapieuis pharetrasedx in frinliquam acpurus semorbi
                    nonmagna idipsum lacinia vehicula isnt egetut orcuspendisse malesuada tempus
                    liberosed tinciduntnisi pulvinar auisque finibus molestie congue one etiam
                    bibendum id magna nec iaculiuisque tempor purus sed elit dapibus consectetu
                    fermentum elementums turpis sed ornarerci varius natoque penatibuset magnis dis
                    parturient montes nascetue.
                </p>
                <div class="mb40">
                    <img src="view/images/right_img.jpg" alt="" class="alignright">
                    <p> Aliquam idnisi consectetur auctor libero sagittis, tempor elituspendisse sit
                        amet justo pulvinar eleifend nulla Praesent vel aliquet urnaauris loremi pum
                        dolsor sit molestie sollicitudin nisl non volutpatm mollis sit amet elefied
                        nullas. </p>
                    <p>Eros lacusac lorem tristique arcu facilisisquislacinia eratn lacinia Praesent
                        vel aliquet urnaauris molestie sollicitudin nisl non volutp risus lorem
                        ipusm lorem ipusm dolor sit famese gestas. </p>
                </div>
                <img src="view/images/left_img.jpg" alt="" class="alignleft">
                <p class="mb30"> Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua.tristique arcu nisidapibus justo viverrasit amet
                    sodales risus lorem ipusm lorem ipusm doidapibus justo</p>
                <p>Viverrasit amet sodales risus lorem ipusm lorem ipusm dolor sit famese gest fugi
                    tempor elitusifend nulla quislac Eros lacusaccinia eratn lacinia moac lorem
                    tristique arcu. </p>
                <!-- related post block -->
                <!-- </div> -->
                <!-- </div> -->
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
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="related-post-content">
                                    <!-- related post -->
                                    <div class="related-img">
                                        <a href="#" class="imghover"><img src="view/images/related_post_1.jpg"
                                                alt="" class="img-responsive"></a>
                                    </div>
                                    <h4 class="related-title"><a href="#" class="title">E-Commerce Free
                                            Template</a></h4>
                                    <div class="meta post-meta">in <a href="#" class="">"free template"</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="related-post-content">
                                    <!-- related post -->
                                    <div class="related-img">
                                        <a href="#" class="imghover"><img src="view/images/related_post_2.jpg"
                                                alt="" class="img-responsive"></a>
                                    </div>
                                    <h4 class="related-title"><a href="#" class="title">Online Mobile
                                            Store</a></h4>
                                    <div class="meta post-meta">in <a href="#" class="">"eccommerce
                                            template"</a></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="related-post-content">
                                    <!-- related post -->
                                    <div class="related-img">
                                        <a href="#" class="imghover"><img src="view/images/related_post_3.jpg"
                                                alt="" class="img-responsive"></a>
                                    </div>
                                    <h4 class="related-title"><a href="#" class="title">E-Commerce Free
                                            Template</a></h4>
                                    <div class="meta post-meta">in <a href="#" class="">"free template"</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.related post -->
                        </div>
                    </div>
                </div>
                <!-- /.related post block -->

                <!-- </div> -->

                <!-- </div> -->

                <!-- </div> -->
            <?php } ?>
        <?php } else { ?>
            <p>Không có tin tức nào để hiển thị.</p>
        <?php } ?>
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