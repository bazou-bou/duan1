<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Website Bán Giày Converse</title>

    <style>
        * {
            vertical-align: middle;
        }

        .tdBtn {
            text-align: center;
        }
    </style>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .order-container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .order-header h2 {
            margin: 0;
        }

        .order-details {
            margin-bottom: 20px;
        }

        .order-item {
            display: flex;
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        .order-item img {
            max-width: 100px;
            margin-right: 20px;
        }

        .order-item-info {
            flex: 1;
        }

        .order-item-info h4 {
            margin: 0 0 5px;
        }

        .order-item-info p {
            margin: 0;
        }

        .order-summary {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/admin/view/html/header.html'; ?>
    </header>

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
                    if ($DanhSachobject[0]->status == 0) {
                        echo "Đang giao";
                    } elseif ($DanhSachobject[0]->status == 1) {
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
                    // Chuyển đổi ngày thành định dạng đẹp hơn (ví dụ: ngày/tháng/năm)
                    $orderDate = new DateTime($DanhSachobject[0]->order_date);
                    echo $orderDate->format('d/m/Y H:i'); // Định dạng: ngày/tháng/năm giờ:phút
                } else {
                    echo 'Chưa có thông tin';
                }
                ?>
            </p>
        </div>
    </div>

    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/admin/view/html/footer.html'; ?>
    </footer>
</body>

</html>