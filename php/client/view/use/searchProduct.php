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
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- Font Awesome -->
    <title>Website Bán Giày Converse</title>
    <style>
        #search-title {
            text-align: left;
            /* Căn lề trái */
            margin-left: 0;
            /* Đảm bảo sát lề trái */
        }

        #search-title h2 {
            font-size: 1.2rem;
            /* Kích thước chữ tiêu đề */
        }

        .search-keyword {
            font-size: 1.1rem;
            /* Làm nổi bật từ khóa */
            font-weight: bold;
        }

        .search-count {
            font-size: 1rem;
            /* Kích thước chữ nhỏ hơn từ khóa */
            margin-left: 5px;
            /* Khoảng cách giữa từ khóa và số lượng */
        }

        .d-inline {
            display: inline;
            /* Đảm bảo các phần tử hiển thị cùng dòng */
        }

        #sticky-search-title {
            position: sticky;
            /* Cố định tại vị trí khi cuộn */
            top: 0;
            /* Dính ở đầu trang */
            z-index: 1000;
            /* Đảm bảo nằm trên các phần tử khác */
            background-color: #fff;
            /* Màu nền để nội dung bên dưới không bị che */
            padding: 10px 15px;
            /* Khoảng cách xung quanh nội dung */
            border-bottom: 1px solid #ddd;
            /* Viền phân cách phía dưới */
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



</head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/header.php'; ?>
    </header>

    <main>
        <section id="featured-products" class="my-4">


            <div class="row g-4">

                <!-- Sidebar -->
                <div class="col-lg-3 col-md-4">
                    <aside id="sidebar" class="bg-light p-3 rounded">
                        <h2 class="fs-4">Danh Mục Nổi Bật</h2>
                        <ul class="list-unstyled">
                            <li class="d-flex align-items-center mb-3">
                                <img src="../../img/watch/watch3.jpg" alt="Giày Nam" class="category-image me-3 img-fluid" style="max-width: 50px;">
                                <a href="?act=client-category&category=Giày nam" class="text-decoration-none">Giày Nam</a>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <img src="../../img/shoes/lacoste/shoeL4.jpg" alt="Giày Nữ" class="category-image me-3 img-fluid" style="max-width: 50px;">
                                <a href="?act=client-category&category=Giày nữ" class="text-decoration-none">Giày Nữ</a>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <img src="../../img/watch/watch5.jpg" alt="Giày Trẻ Em" class="category-image me-3 img-fluid" style="max-width: 50px;">
                                <a href="?act=client-category&category=Giày trẻ em" class="text-decoration-none">Giày Trẻ Em</a>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <img src="../../img/bags/bag2.webp" alt="Khuyến Mãi" class="category-image me-3 img-fluid" style="max-width: 50px;">
                                <a href="#" class="text-decoration-none">Khuyến Mãi</a>
                            </li>
                        </ul>
                    </aside>
                </div>

                <!-- Featured Products -->
                <div class="col-lg-9 col-md-8">
                    <div id="search-title" class="mb-4">
                        <h2 class="fs-5 fw-bold mb-1">Kết quả tìm kiếm cho:</h2>
                    </div>
                    <div id="sticky-search-title">
                        <p class="d-inline search-keyword mb-0"><?= htmlspecialchars($search); ?></p>
                        <small class="d-inline search-count text-muted">(<?= htmlspecialchars($soLuongHot); ?>)</small>
                    </div>



                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
                        <?php foreach ($danhSachSearch as $product) { ?>
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
                            <?php } else { ?>
                                <p>Không có sản phẩm phù hợp.</p>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </section>
        <hr style="height: 5px;">

        <!-- Additional Products Section -->
        <section id="display-products" class="my-4 hot_view">
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
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/footer.html'; ?>
    </footer>
</body>

</html>