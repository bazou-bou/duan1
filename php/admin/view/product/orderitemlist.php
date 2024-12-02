<?php
// Kết nối cơ sở dữ liệu
try {
    $pdo = new PDO('mysql:host=localhost;dbname=duan1', 'root', '051025');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
    exit();
}

// Kiểm tra nếu có dữ liệu POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id']) && isset($_POST['status'])) {
    $order_id = $_POST['order_id'];
    $new_status = $_POST['status'];

    // Cập nhật trạng thái đơn hàng trong cơ sở dữ liệu
    $sql = "UPDATE orders SET status = :status WHERE order_id = :order_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':status', $new_status, PDO::PARAM_INT);
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);

    // Thực thi câu lệnh SQL
    if ($stmt->execute()) {
        $chuyen = $DanhSachobject[0]->order_id;
        // Sau khi cập nhật thành công, chuyển hướng người dùng về trang chi tiết đơn hàng hoặc trang danh sách đơn hàng
        header("Location: ?act=order_item&id= $chuyen");
        exit();
    } else {
        echo "Có lỗi xảy ra khi cập nhật trạng thái đơn hàng.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/shopBanGiay/php/admin/view/css/styleindex.css">
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

    <main class="main-content">
        <div class="container">
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
        $current_status = isset($DanhSachobject[0]->status) ? $DanhSachobject[0]->status : 0;
        switch ($current_status) {
            case 0:
                echo "Chờ xác nhận";
                break;
            case 1:
                echo "Đang chuẩn bị hàng";
                break;
            case 2:
                echo "Đang giao";
                break;
            case 3:
                echo "Đã thanh toán";
                break;
            case 4:
                echo "Đã giao thành công";
                break;
            case 5:
                echo "Đã hủy";
                break;
            default:
                echo "Trạng thái không xác định";
        }
        ?>
    </p>

    <form action='?act=order_item&id=<?= $DanhSachobject[0]->order_id ?>' method="POST">
        <input type="hidden" name="order_id" value="<?php echo $DanhSachobject[0]->order_id; ?>">
        
        <label for="status">Chọn trạng thái mới:</label>
        <select name="status" id="status" class="form-select" required>
            <option value="0" <?php if ($current_status == 0) echo "selected"; ?>>Chờ xác nhận</option>
            <option value="1" <?php if ($current_status == 1) echo "selected"; ?>>Đang chuẩn bị hàng</option>
            <option value="2" <?php if ($current_status == 2) echo "selected"; ?>>Đang giao</option>
            <option value="3" <?php if ($current_status == 3) echo "selected"; ?>>Đã thanh toán</option>
            <option value="4" <?php if ($current_status == 4) echo "selected"; ?>>Đã giao thành công</option>
            <option value="5" <?php if ($current_status == 5) echo "selected"; ?>>Đã hủy</option>
        </select>
        
        <button type="submit" class="btn btn-success mt-2">Cập nhật trạng thái</button>
    </form>

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


            <footer>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/admin/view/html/footer.html'; ?>
            </footer>
        </div>


        <div class="sidebar">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/admin/view/html/sidebar.html'; ?>
        </div>
    </main>
</body>

</html>