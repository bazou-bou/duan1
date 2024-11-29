<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Giỏ Hàng</title>
    <style>
        body {
            background-color: #f5f5f5;
        }

        .cart-container {
            margin-top: 20px;
        }

        .cart-item-card {
            background: #ffffff;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .cart-item-image {
            max-height: 150px;
            object-fit: cover;
            border-radius: 10px 0 0 10px;
        }

        .cart-item-details {
            flex: 1;
        }

        .cart-item-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .cart-total {
            font-size: 1.3rem;
            font-weight: bold;
        }

        .btn-checkout {
            background-color: #28a745;
            color: #fff;
        }

        .btn-checkout:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/header.php'; ?>
    </header>

    <main class="container cart-container">
        <h1 class="text-center mb-4">Giỏ Hàng của bạn</h1>
        <?php if (!empty($cartItems)) { ?>
            <div class="row g-4">
                <?php 
                    $totalAmount = 0;
                    foreach ($cartItems as $item) {
                        $itemTotal = $item->quantity * $item->product_price;
                        $totalAmount += $itemTotal;
                ?>
                <div class="col-md-6 col-lg-4">
                    <div class="d-flex cart-item-card p-3">
                        <img src="<?= htmlspecialchars(BASE_URL . $item->product_image) ?>" alt="Product Image"
                            class="cart-item-image">
                        <div class="cart-item-details ms-3">
                            <h5 class="mb-1"><?= htmlspecialchars($item->product_name) ?></h5>
                            <p class="mb-1 text-muted">Giá: <?= number_format($item->product_price, 0, ',', '.') ?> VNĐ</p>
                            <p class="mb-1">Số lượng: <?= $item->quantity ?></p>
                            <p class="fw-bold">Tổng: <?= number_format($itemTotal, 0, ',', '.') ?> VNĐ</p>
                            <div class="cart-item-actions">
                            <a href="?act=client-remove-listgiohang&product_id=<?= $item->product_id ?>" class="btn btn-danger btn-sm">Xóa</a>

                                <a href="?act=client-detail&id=<?= $item->product_id ?>" class="btn btn-primary btn-sm">Xem Chi Tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="mt-4 text-end">
                <p class="cart-total">Tổng Thanh Toán: <?= number_format($totalAmount, 0, ',', '.') ?> VNĐ</p>
                <a href="?act=checkout" class="btn btn-checkout btn-lg">Thanh Toán</a>
            </div>
        <?php } else { ?>
            <div class="alert alert-warning text-center">Giỏ hàng của bạn đang trống!</div>
        <?php } ?>
    </main>

    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/footer.html'; ?>
    </footer>
</body>

</html>
