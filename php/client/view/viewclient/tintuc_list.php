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
            <div class="isotope">
                <?php if (!empty($newList)) { ?>
                    <?php foreach ($newList as $new) { ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 post-masonry ">
                            <div class="post-block">
                                <!-- post block -->
                                <h3 class="post-title"><a href="#" class="title"><?= htmlspecialchars($new->title) ?></a></h3>
                                <div class="meta">
                                    <span class="meta-date"><?= htmlspecialchars($new->created_at) ?></span>
                                    <span>|&nbsp; &nbsp;</span>
                                    <span class="meta-admin">By <a href="#" class="meta-title">Admin</a></span>
                                </div>
                                <div class="post-img">
                                    <a href="#" class="imghover">
                                        <img src="<?= htmlspecialchars(BASE_URL . $new->new_img) ?>" alt="News Image" class="img-responsive"></a>
                                </div>
                                <div class="post-content">
                                    <p><?= htmlspecialchars(mb_strimwidth($new->content, 0, 100, "...")) ?>
                                    </p>
                                    <a href="?act=tintuc_chitiet" class="btn-link">
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