<?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/viewClient/header.php'; ?>
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/style.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/owl.carousel.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/owl.theme.default.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">


<style>
    /* Bỏ viết hoa cho nội dung nhập vào trong các ô input */
    input {
        text-transform: none !important;
        /* Loại bỏ viết hoa cho nội dung trong input */
    }

    /* Bỏ viết hoa cho placeholder */
    input::placeholder,
    textarea::placeholder {
        text-transform: none;
        /* Loại bỏ việc tự động viết hoa */
    }
</style>
<!-- contact-form -->
<!-- page-header -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="?act=client-list">Trang chủ</a></li>
                        <li>Giới thiệu</li>
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
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-head">
                        <h2 class="head-title">Liên hệ với chúng tôi</h2>
                    </div>
                    <div class="box-body contact-form">
                        <div class="row">
                            <form method="POST" action="?act=client-contact">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <input id="name" name="contact_name" type="text" placeholder="Họ và tên" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="phone"></label>
                                        <input id="phone" name="contact_phone" type="text" placeholder="Điền số điện thoại" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="email"></label>
                                        <input id="email" name="contact_email" type="email" placeholder="Điền địa chỉ email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="textarea"></label>
                                        <textarea class="form-control" id="textarea" name="contact_mess" rows="4" placeholder="Chi tiết"></textarea>
                                    </div>
                                    <button type="submit" name="submitForm" class="btn btn-primary">Gửi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.contact-form -->
            <!-- address-block -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-head">
                        <h2 class="head-title">Thông tin liên hệ</h2>
                    </div>
                    <div class="box-body">
                        <div class="contact-block">
                            <h4>Địa chỉ</h4>
                            <p>Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội, Việt Nam</p>
                        </div>
                        <div class="contact-block">
                            <h4>Đường dây nóng</h4>
                            <p class="mb0">Phone: <span class="text-default">084-123-4567</span></p>
                            <p class="mb0">Email: <span class="text-default">nhom12@ltweb.com</span></p>
                        </div>
                        <div class="contact-block">
                            <h4>Liên kết</h4>
                            <div class="ft-social">
                                <span><a href="#" class="btn-social btn-facebook"><i class="fa fa-facebook"></i></a></span>
                                <span><a href="#" class="btn-social btn-twitter"><i class="fa fa-twitter"></i></a></span>
                                <span><a href="#" class="btn-social btn-googleplus"><i class="fa fa-google-plus"></i></a></span>
                                <span><a href="#" class=" btn-social btn-linkedin"><i class="fa fa-linkedin"></i></a></span>
                                <span><a href="#" class=" btn-social btn-pinterest"><i class="fa fa-pinterest-p"></i></a></span>
                                <span><a href="#" class=" btn-social btn-instagram"><i class="fa fa-instagram"></i></a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.address-block -->
        </div>
    </div>
</div>
<!-- testimonial -->
<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/viewclient/footer.php'; ?>
</footer>
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

<!-- thông báo khi phải hồi thành công  -->
<script type="text/javascript">
    <?php if (isset($_SESSION['baoThanhCong'])): ?>
        // Nếu có thông báo thành công, hiển thị confirm
        if (confirm("<?php echo $_SESSION['baoThanhCong']; ?>")) {
            window.location.href = "?act=client-home"; // Điều hướng đến trang khác
        }
        // Xóa thông báo sau khi đã xử lý
        <?php unset($_SESSION['baoThanhCong']); ?>
    <?php endif; ?>
</script>
</body>

</html>