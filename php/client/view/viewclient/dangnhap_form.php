<?php
// session_start();




if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usernameOrEmail = $_POST['loginName'];
    $password = $_POST['loginPassword'];


    $userFound = null;
    foreach ($dsUser as $user) {
        if (($user->email === $usernameOrEmail || $user->username === $usernameOrEmail) && $user->password === $password) {
            $userFound = $user;
            break;
        }
    }

    if ($userFound) {

        $_SESSION['user_id'] = $userFound->user_id;
        $_SESSION['username'] = $userFound->username;
        $_SESSION['role'] = $userFound->role;
        $_SESSION['email'] = $userFound->email;


        if ($userFound->status == '1') {
            if ($userFound->role == 1) {
                header("Location: http://localhost/shopBanGiay/php/admin/?act=products-list");
                exit; // Dừng script ngay sau khi chuyển hướng
            } else {
                header("Location: ?act=client-list");
                exit; // Dừng script để tránh thực thi thêm mã không cần thiết
            }
        } else {
            echo "
            <script>
                if (confirm('Tài khoản của bạn đã bị khóa! Bấm OK để đăng nhập lại.')) {
                    window.location.href = '?act=client-login';
                }
            </script>";
            exit;
        }
    } else {

        $errorMessage = "Thông tin đăng nhập không chính xác!";
    }
}
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/viewClient/header.php'; ?>
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/style.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/owl.carousel.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/owl.theme.default.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="?act=client-list">Trang chủ</a></li>
                        <li>Đăng nhập</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- login-form -->

<div class="content">
    <div class="container">
        <div class="box">
            <div class="row">
                <div class="col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-5 col-sm-12 col-xs-12 ">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 mb20">
                                <h3 class="mb10">Đăng nhập</h3>
                            </div>
                            <!-- form -->
                            <form method="POST" enctype="multipart/form-data" class="mx-auto">
                                <!-- Hiển thị thông báo lỗi nếu có -->
                                <?php if (isset($errorMessage)): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $errorMessage; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-label" for="loginName"></label>
                                        <div class="login-input">
                                            <input id="loginName" name="loginName" type="text" class="form-control"
                                                placeholder="Địa chỉ email" required>
                                            <div class="login-icon"><i class="fa fa-user"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="form-label" for="loginPassword"></label>
                                        <div class="login-input">
                                            <input type="password" id="loginPassword" name="loginPassword" class="form-control"
                                                placeholder="Mật khẩu" required>
                                            <div class="login-icon"><i class="fa fa-lock"></i></div>
                                            <div class="eye-icon"><i class="fa fa-eye"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb20 ">
                                    <button class="btn btn-primary btn-block mb10">Đăng nhập</button>
                                    <div style="margin: 0 auto; width: 50%">
                                        <a href="?act=client-dangky" style="margin-right: 40px;" class="text-blue">Đăng ký</a>
                                        <a href="index.php?act=matkhau_quen" class="text-blue">Quên mật khẩu </a>
                                    </div>
                                </div>
                            </form>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                <h4 class="mb20">Hoặc đăng nhập với</h4>
                                <div class="social-media">
                                    <a href="#" class="btn-social-rectangle btn-facebook"><i
                                            class="fa fa-facebook"></i><span class="social-text">Facebook</span></a>
                                    <a href="#" class="btn-social-rectangle btn-twitter"><i
                                            class="fa fa-twitter"></i><span class="social-text">Twitter</span> </a>
                                    <a href="#" class="btn-social-rectangle btn-googleplus"><i
                                            class="fa fa-google-plus"></i><span class="social-text">Google
                                            Plus</span></a>
                                </div>
                            </div>
                            <!-- /.form -->
                        </div>
                    </div>
                </div>
                <!-- features -->
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 ">
                    <div class="box-body">
                        <div class="feature-left">
                            <div class="feature-icon">
                                <img src="view/images/feature_icon_1.png" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>Mức độ uy tín!</h4>
                                <p>Được đánh giá an toàn, tin cậy hàng đầu Việt Nam với nhiều chính sách hỗ trợ chăm sóc khách hàng.</p>
                            </div>
                        </div>
                        <div class="feature-left">
                            <div class="feature-icon">
                                <img src="view/images/feature_icon_2.png" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>Thanh toán tức thì!</h4>
                                <p>Thanh toán mọi nơi mọi lúc, giao dịch nhanh gọn, bảo đảm, an toàn, với liên kết 90% ngân hàng, ví tiền, VISA trong toàn quốc!
                                </p>
                            </div>
                        </div>
                        <div class="feature-left">
                            <div class="feature-icon">
                                <img src="view/images/feature_icon_3.png" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>Ưu đãi hấp dẫn!</h4>
                                <p>Với mong muốn làm hài lòng khách hàng, Mobistore luôn mang đến những ưu đãi cực kỳ tốt với chất lượng cao
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.features -->
            </div>
        </div>
    </div>
</div>
<!-- /.login-form -->

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