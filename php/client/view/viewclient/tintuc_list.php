<?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/viewClient/header.php'; ?>
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/style.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/owl.carousel.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/owl.theme.default.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">

<!-- /. header-section-->
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
<!-- blog -->
<div class="space-medium">
    <div class="container">
        <div class="row">
            <?php if (!empty($newList)) { ?>
                <?php foreach ($newList as $new) { ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 post-masonry ">
                        <div class="post-block">
                            <!-- post block -->
                            <h3 class="post-title"><a href="?act=tintuc_chitiet" class="title"><?= htmlspecialchars($new->title) ?></a></h3>
                            <div class="meta">
                                <span class="meta-date">04/10/2024</span>
                                <span>|&nbsp; &nbsp;</span>
                                <span class="meta-admin">By <a href="#" class="meta-title">Admin</a></span>
                            </div>
                            <div class="post-img">
                                <a href="?act=client-newdetail&id=<?= htmlspecialchars($new->new_id) ?>">
                                    <img src="<?= htmlspecialchars(BASE_URL . $new->new_img) ?>" alt="News Image" class="img-responsive" loading="lazy">

                            </div>
                            <div class="post-content">
                                <p><?= htmlspecialchars(mb_strimwidth($new->content, 0, 100, "...")) ?>
                                </p>
                                <a href="?act=client-newdetail&id=<?= htmlspecialchars($new->new_id) ?>" class="btn-link">
                                    <center>ĐỌC THÊM </center>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p>Không có tin tức nào để hiển thị.</p>
            <?php } ?>

        </div>
        <div class="row">
            <div class="st-pagination">
                <ul class="pagination">
                    <li><a href="#" aria-label="previous"><span aria-hidden="true">Trang trước</span></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#" aria-label="Next"><span aria-hidden="true">Trang sau</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- blog -->

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
    /* Đặt khoảng cách giữa các bài viết */
.post-masonry {
    margin-bottom: 30px;
}

/* Tạo giao diện cho từng bài viết */
.post-block {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    transition: box-shadow 0.3s ease, transform 0.3s ease;
    height: 100%; /* Đảm bảo chiều cao cố định */
    display: flex;
    flex-direction: column; /* Nội dung dọc */
    justify-content: space-between; /* Đẩy các phần cách đều nhau */
}

/* Hiệu ứng hover cho bài viết */
.post-block:hover {
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    transform: translateY(-5px);
}

/* Hình ảnh của bài viết */
.post-img img {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-bottom: 1px solid #ddd; /* Phân cách hình ảnh với nội dung */
}

/* Tiêu đề bài viết */
.post-title {
    margin: 15px;
    font-size: 18px;
    font-weight: bold;
    text-align: center;
}

.post-title a {
    text-decoration: none;
    color: #333;
}

.post-title a:hover {
    color: #007bff;
}

/* Thông tin meta (ngày, admin) */
.meta {
    font-size: 14px;
    color: #777;
    text-align: center;
    margin-bottom: 10px;
}

/* Nội dung bài viết */
.post-content {
    padding: 15px;
    font-size: 14px;
    line-height: 1.6;
    color: #555;
    flex-grow: 1; /* Đảm bảo phần nội dung giãn để các nút luôn ở cuối */
}

/* Nút đọc thêm */
.btn-link {
    display: block;
    text-align: center;
    margin: 15px;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.btn-link:hover {
    background-color: #0056b3;
}

/* Đáp ứng màn hình nhỏ */
@media (max-width: 700px) {
    .post-masonry {
        margin-bottom: 20px;
    }

    .post-title {
        font-size: 16px;
    }

    .btn-link {
        font-size: 12px;
        padding: 8px 16px;
    }
}

</style>