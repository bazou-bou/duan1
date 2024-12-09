<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/css/styleindex.css">
    <link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/css/chitietsanpham.css">
    <link rel="icon" href="../../img/logoweb.png" type="image/png" sizes="128x128">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .slide {
            width: 100%;
            height: 500px;
            overflow: hidden;
        }

        .hot_view {
            background-color: white;
            padding: 10px;
            margin-bottom: 20px;
        }

        .hot_img {
            display: block;
            margin: 0 auto;
            width: 50%;
        }
    </style>
    <title>Website Bán Giày Converse</title>
</head>

<body>
    <header>


    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/viewClient/header.php'; ?>
    </header>
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="?act=client-list">Trang chủ</a></li>
                            <li>Sản Phẩm</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    </div>


    

    <main>
        <section id="featured-products" class="my-4">


    <main>
        <section id="featured-products" class="my-4">
           
            <div class="row g-4">

                <div class="col-lg-3 col-md-4">
                    <aside id="sidebar" class="bg-light p-3 rounded">
                        <h2 class="fs-4">Danh Mục Nổi Bật</h2>
                        <ul class="list-unstyled">
                            <?php foreach ($DanhSachCategory as $category) { ?>
                                <li>
                                    <img src="<?php echo htmlspecialchars(BASE_URL . $category->img, ENT_QUOTES, 'UTF-8'); ?>" alt=" <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>" class="category-image me-3 img-fluid" style="max-width: 50px; max-height: 50px;">
                                    <a href="?act=client-category&category=<?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>">
                                        <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                                    </a>
                                </li>
                                <hr>
                            <?php } ?>
                        </ul>
                    </aside>
                </div>



                <div class="col-lg-9 col-md-8">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                        <?php foreach ($DanhSachobject as $product) { ?>
                            <div class="col mb-4">
                                <a href="?act=client-detail&id=<?= htmlspecialchars($product->product_id) ?>" class="text-decoration-none">
                                    <div class="card product-item">
                                        <div class="product-thumb">
                                            <img src="<?= htmlspecialchars(BASE_URL . $product->img) ?>" class="card-img-top" alt="Product Image">
                                            <div class="product-action-link">
                                                <button class="btn cart-btn">
                                                    <i class="bi bi-cart-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="product-title"><?= htmlspecialchars($product->name) ?></h5>
                                            <p class="product-price"><?= number_format($product->price, 0, ',', '.') ?> VNĐ</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="?act=client-detail&id=<?= htmlspecialchars($product->product_id) ?>" class="stretched-link">Xem Chi Tiết</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </section>

        <!-- Additional Products -->
        <section id="display-products" class="my-4 hot_view" id="display-products">
            <img src="http://localhost/shopBanGiay/img/hot_view.gif" class="hot_img">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-5 containerhot">
                <?php
                $limitedProducts = array_slice($danhSachHot, 0, 5);
                foreach ($limitedProducts as $product) { ?>
                    <?php if (is_object($product)) { ?>
                        <div class="col mb-4">
                            <a href="?act=client-detail&id=<?= htmlspecialchars($product->product_id ?? '') ?>" class="text-decoration-none">
                                <div class="card product-item">
                                    <div class="product-thumb">
                                        <img src="<?= htmlspecialchars(BASE_URL . ($product->img ?? 'default-image.jpg')) ?>" class="card-img-top" alt="Product Image">
                                        <div class="product-action-link">
                                            <button class="btn cart-btn">
                                                <i class="bi bi-cart-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="product-title"><?= htmlspecialchars($product->name ?? 'Tên sản phẩm không có') ?></h5>
                                        <p class="product-price"><?= number_format($product->price ?? 0, 0, ',', '.') ?> VNĐ</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="?act=client-detail&id=<?= htmlspecialchars($product->product_id ?? '') ?>" class="stretched-link">Xem Chi Tiết</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </section>
    </main>

    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/viewclient/footer.php'; ?>
    </footer>
</body>

</html>