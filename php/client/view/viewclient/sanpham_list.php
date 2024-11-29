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
                        <li>Sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /. header-section-->

<!-- product-list -->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <!-- sidenav-section -->
                <div id='cssmenu'>
                    <?php foreach ($DanhSachCategory as $category) { ?>
                        <ul>
                            <li class='has-sub'><a href='#'><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></a></li>
                            <!-- <li class='has-sub'><a href='#'>Giá Bán</a>
                            <ul>
                                <li>
                                    <label>
                                        <input type="checkbox">
                                        <span class="checkbox-list">Tất cả</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox">
                                        <span class="checkbox-list">Dưới 2 triệu</span>
                                    </label>
                                </li>
                                <li><span>
                                        <label>
                                            <input type="checkbox">
                                            <span class="checkbox-list">Từ 2 - 5 triệu</span>
                                        </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox">
                                        <span class="checkbox-list">Từ 5 - 10 triệu</span>
                                    </label>
                                </li>

                                <li><span>
                                        <label>
                                            <input type="checkbox">
                                            <span class="checkbox-list">Từ 10 - 15 triệu</span>
                                        </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox">
                                        <span class="checkbox-list">Trên 15 triệu</span>
                                    </label>
                                </li>

                            </ul>
                        </li> -->
                        </ul>
                        <?php } ?>
                </div>
            <!-- /.sidenav-section -->
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb10 alignright">
                        <form>
                            <div class="select-option form-group">
                                <select name="select" class="form-control" placeholder="Sắp xếp theo">
                                    <option value="" default>Sắp xếp theo</option>
                                    <option value="">Bán Chạy</option>
                                    <option value="">Giá Thấp</option>
                                    <option value="">Giá Cao</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($DanhSachobject as $product) { ?>
                        <!-- product -->
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb30">
                            <a href="?act=client-detail&id=<?= htmlspecialchars($product->product_id) ?>">
                                <div class="product-block">
                                    <div class="product-img"><img src="<?= htmlspecialchars(BASE_URL . $product->img) ?>" alt=""></div>
                                    <div class="product-content">
                                        <h5><a href="#" class="product-title"><?= htmlspecialchars($product->name) ?></a></h5>
                                        <div class="product-meta"><a href="#" class="product-price"><?= number_format($product->price, 0, ',', '.') ?></a>
                                            <!-- <a href="#" class="discounted-price">$1400</a>
                                        <span class="offer-price">20%off</span> -->
                                        </div>
                                        <div class="shopping-btn">
                                            <a href="#" class="product-btn btn-like"><i class="fa fa-heart"></i></a>
                                            <a href="#" class="product-btn btn-cart"><i
                                                    class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                    <!-- /.product -->
                </div>
                <div class="row">
                    <!-- pagination start -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="st-pagination">
                            <ul class="pagination">
                                <li><a href="#" aria-label="previous"><i class="fa fa-angle-left" style="font-size: 16px;"></i></a>
                                </li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li> <a href="#" aria-label="Next"><i class="fa fa-angle-right" style="font-size: 16px;"></i></li>
                            </ul>
                        </div>
                    </div>
                    <!-- pagination close -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.product-list -->