<?php 
// If you want to see the POST data when the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST["name_custom"]);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Thanh Toán</title>
    <style>
        body {
            background-color: #f5f5f5;
        }

        .form-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-checkout {
            background-color: #28a745;
            color: #fff;
            width: 100%;
        }

        .btn-checkout:hover {
            background-color: #218838;
        }

        .cart-item img {
            max-width: 80px;
            max-height: 80px;
            object-fit: cover;
            border-radius: 5px;
        }

        .cart-item .item-info {
            margin-left: 15px;
        }

        .cart-item .item-info .item-name {
            font-weight: bold;
        }

        .cart-item .item-info .item-price {
            color: #dc3545;
        }

        .cart-item .item-info .item-quantity {
            margin-top: 5px;
        }

        .cart-item .actions {
            text-align: center;
        }

        .total-price {
            font-size: 1.25rem;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/header.php'; ?>
    </header>

    <main class="container mt-5">
        <h1 class="text-center mb-4">Thông Tin Thanh Toán</h1>
        <div class="row">
            <!-- Phần hiển thị các sản phẩm sắp mua -->
            <div class="col-md-6">
                <h4>Sản Phẩm Sắp Mua</h4>
                <div class="card mb-3">
                    <div class="card-body">
                        <?php
                            $totalAmount = 0; // Biến tổng số tiền
                            foreach ($cartItems as $item) {
                                $itemTotal = $item->quantity * $item->product_price; // Tính tổng của từng sản phẩm
                                $totalAmount += $itemTotal; // Cộng dồn vào tổng
                        ?>
                        <div class="row mb-3">
                            <div class="col-3">
                                <img src="<?= htmlspecialchars(BASE_URL . $item->product_image) ?>" alt="Product Image" class="img-fluid rounded">
                            </div>
                            <div class="col-6">
                                <p class="fw-bold"><?= htmlspecialchars($item->product_name) ?></p>
                                <p class="text-danger"><?= number_format($item->product_price, 0, ',', '.') ?> VNĐ</p>
                                <p>Số lượng: <?= $item->quantity ?></p>
                                <p class="text-danger"><?= number_format($itemTotal, 0, ',', '.') ?> VNĐ</p>
                            </div>
                            <div class="col-3 text-center">
                                <a href="?act=client-detail&id=<?= $item->product_id ?>" class="btn btn-primary btn-sm">Chi Tiết</a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <!-- Hiển thị tổng tiền -->
                <div class="total-price">
                    <p>Tổng cộng: <?= number_format($totalAmount, 0, ',', '.') ?> VNĐ</p>
                </div>
            </div>

            <!-- Phần thu thập thông tin thanh toán -->
            <div class="col-md-6">
                <div class="form-container">
                    <form method="post" action="?act=client_paypage">
                    <?php if (!empty($baoThanhCong)) { ?>
                        <div class="alert alert-success text-center mb-4"><?= htmlspecialchars($baoThanhCong) ?></div>
                    <?php } ?>
                    
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="name_custom" name="name_custom" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ giao hàng</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="number" class="form-control" id="sdt" name="sdt" required>
                        </div>

                        <div class="mb-3">
                            <label for="payment-method" class="form-label">Phương thức thanh toán</label>
                            <select class="form-select" id="payment-method" name="payment_method" required>
                                <option value="cod">Thanh toán khi nhận hàng (COD)</option>
                                <option value="online">Thanh toán trực tuyến</option>
                            </select>
                        </div>

                        <!-- Hiển thị tổng thanh toán -->
                        <div class="mb-3">
                            <p class="total-price">Tổng thanh toán: <?= number_format($totalAmount, 0, ',', '.') ?> VNĐ</p>
                        </div>

                        <button type="submit" name="submitForm" class="btn btn-checkout">Xác Nhận Thanh Toán</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/footer.html'; ?>
    </footer>
</body>

</html>
