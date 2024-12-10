<?php
//var_dump($_SESSION);
//Kiểm tra đã đăng nhập chưa 
if (isset($_SESSION['user_id'])) {
    $username = $_SESSION['username'];
} else {
    $username = "khách";
}
if (isset($_POST['search'])) {
    $search=trim($_POST['search']);
    echo $search;
    header("Location: ?act=product-search&search=$search");
}


?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from easetemplate.com/free-website-templates/mobistore/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Nov 2021 09:40:15 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="create ecommerce website template for your online store, responsive mobile templates">
    <meta name="keywords" content="ecommerce website templates, online store,">
    <title>Shop BTL</title>
    <link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/css/styleindex.css">
    <link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/css/chitietsanpham.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/style.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- Liên kết tới Bootstrap Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<style>
    /* Loại bỏ gạch dưới cho tất cả các liên kết */
a {
  text-decoration: none;
}
*{
    margin: 0;
    padding: 0;
    text-decoration: none;
    list-style: none;
    font-size: 1.5rem;
}


</style>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">

</head>

<body>
    <!-- top-header-->
    <!-- header-section-->
    <div class="header-wrapper">
        <div class="container">
            <div class="row">
                <!-- logo -->
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-8">
                    <div class="logo">
                        <a href="?act=client-home" id="logo" class="navbar-brand">
                            <img src="http://localhost/shopBanGiay/php/client/img/logo02.png" alt="Logo" class="img-fluid">
                        </a>
                    </div>
                </div>
                <!-- /.logo -->
                <!-- search -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <form action="" method="post" class="search-bg">
                        <input name="search" class="form-control search-input" type="search" placeholder="Tìm kiếm..." aria-label="Tìm kiếm" required>
                        <button type="submit" class="search-btn">
                            <i class="fa fa-search"></i> <!-- Icon tìm kiếm -->
                        </button>
                    </form>
                </div>

                <!-- /.search -->
                <!-- account -->
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="account-section">
                        <ul>
                            <li>
                                <?php if (isset($_SESSION['user_id'])): ?>
                                    <a href="?act=client-logout" class="title hidden-xs"><?= $username ?></a>
                                <?php else: ?>
                                    <a href="?act=client-login" class="title hidden-xs"><?= $username ?></a>
                                <?php endif; ?>
                            </li>
                            <li class="hidden-xs">|</li>
                            <li>
                                <?php if (isset($_SESSION['user_id'])): ?>
                                    <a href="?act=client-logout" class="title hidden-xs">Đăng xuất</a>
                                <?php else: ?>
                                    <a href="?act=client-login" class="title hidden-xs">Đăng nhập</a>
                                <?php endif; ?>
                            </li>
                            <li>
                                <?php if (isset($_SESSION['user_id'])) { ?>
                                    <a class="nav-link text-black" href="?act=client-listgiohang&id=<?= htmlspecialchars($_SESSION['user_id']) ?>">
                                        <i class="fa fa-shopping-cart cart-icon"></i>
                                    </a>
                                    
                                <?php } else { ?>
                                    <a class="nav-link text-black" href="">
                                        <i class="fa fa-shopping-cart cart-icon"></i>
                                    </a>
                                <?php } ?>

                            </li>
                            <li>
                                <?php if (isset($_SESSION['user_id'])) { ?>
                                    <a class="nav-link text-black" href="?act=client_order">
                                    <i class="bi bi-bag cart-icon"></i>
                                    </a>
                                    
                                <?php } else { ?>
                                   
                                <?php } ?>

                            </li>

                        </ul>
                    </div>
                    <!-- /.account -->
                </div>
                <!-- search -->
            </div>
        </div>
        <!-- navigation -->
        <div class="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- navigations-->
                        <div id="navigation">
                            <ul>
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
                    <!-- /.navigations-->
                </div>
            </div>
        </div>
    </div>
    <!-- /. header-section-->