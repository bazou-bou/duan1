<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Lịch Sử Mua Hàng</title>
    <style>
        .order-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .order-header h2 {
            font-size: 24px;
            color: #343a40;
        }

        .order-header p {
            font-size: 16px;
            color: #495057;
        }

        .order-details h3 {
            margin-top: 20px;
            font-size: 20px;
            color: #343a40;
        }

        .order-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
        }

        .order-item img {
            margin-right: 15px;
            border-radius: 4px;
        }

        .order-item-info h4 {
            font-size: 18px;
            color: #212529;
        }

        .order-item-info p {
            font-size: 14px;
            color: #6c757d;
        }

        .order-summary h3 {
            margin-top: 20px;
            font-size: 20px;
            color: #198754;
        }

        .order-summary p {
            font-size: 16px;
            color: #495057;
        }

        footer {
            margin-top: 30px;
            padding: 15px;
            background-color: #f1f1f1;
            text-align: center;
        }

        .sidebar {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/header.php'; ?>
    </header>

    <main class="main-content">
        <div class="container my-4">
            <div class="order-container">
                <div class="order-header">
                    <h2>Chi tiết đơn hàng #<?php echo $DanhSachobject[0]->order_id; ?></h2>
                    <p><strong>Tên khách hàng: </strong><?php echo $DanhSachobject[0]->name_custom; ?></p>
                    <p><strong>Địa chỉ: </strong><?php echo $DanhSachobject[0]->address; ?></p>
                    <p><strong>Số điện thoại: </strong><?php echo $DanhSachobject[0]->sdt; ?></p>
                </div>

                <div class="order-details">
                    <h3>Chi tiết sản phẩm:</h3>
                    <?php foreach ($DanhSachobject as $item): ?>
                        <div class="order-item">
                            <img src="<?= htmlspecialchars(BASE_URL . $item->product_img) ?>" style="width: 100px; height: 100px;" alt="Product Image">
                            <div class="order-item-info">
                                <h4><?php echo $item->product_name; ?></h4>
                                <p><strong>Số lượng: </strong><?php echo $item->quantity; ?></p>
                                <p><strong>Giá: </strong><?php echo number_format($item->product_price, 0, ',', '.'); ?> VNĐ</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="order-summary">
                    <h3>Tổng tiền:
                        <?php
                        $total_price = 0;
                        foreach ($DanhSachobject as $item) {
                            $total_price += $item->product_price * $item->quantity;
                        }
                        echo number_format($total_price, 0, ',', '.') . " VNĐ";
                        ?>
                    </h3>
                    <p><strong>Trạng thái: </strong>
                        <?php
                        if (isset($DanhSachobject[0]->status)) {
                            if ($DanhSachobject[0]->status == 1) {
                                echo "Đang giao";
                            } elseif ($DanhSachobject[0]->status == 0) {
                                echo "Đã giao thành công";
                            } else {
                                echo "Trạng thái không xác định";
                            }
                        } else {
                            echo "Chưa cập nhật";
                        }
                        ?>
                    </p>
                    <p><strong>Ngày đặt hàng: </strong>
                        <?php
                        if (isset($DanhSachobject[0]->order_date) && !empty($DanhSachobject[0]->order_date)) {
                            $orderDate = new DateTime($DanhSachobject[0]->order_date);
                            echo $orderDate->format('d/m/Y H:i');
                        } else {
                            echo 'Chưa có thông tin';
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/footer.html'; ?>
    </footer>
</body>

</html>
