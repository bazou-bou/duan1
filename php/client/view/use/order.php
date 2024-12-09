<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=duan1', 'root', '051025');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id']) && isset($_POST['status'])) {
    $order_id = $_POST['order_id'];
    $new_status = $_POST['status'];

    $sql = "UPDATE orders SET status = :status WHERE order_id = :order_id AND status != 5 AND status != 4"; // Tránh cập nhật trạng thái cho đơn hàng đã giao
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':status', $new_status, PDO::PARAM_INT);
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: ?act=client_order");
        exit();
    } else {
        echo "Có lỗi xảy ra khi hủy đơn hàng.";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Lịch Sử Mua Hàng</title>
    <style>
        .canceled {
            opacity: 0.5;
            pointer-events: none; 
        }
    </style>
</head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/viewClient/header.php'; ?>
    </header>

    <main class="container mt-5">
        <h1 class="text-center mb-4">Lịch Sử Mua Hàng</h1>
        
        <?php if (empty($DanhSachobject)) { ?>
            <p class="text-center">Bạn chưa có đơn hàng nào.</p>
        <?php } else { ?>

            <div class="row">
    <?php foreach ($DanhSachobject as $order) { 
        $isCanceled = $order->status == 5 ? 'canceled' : '';
    ?>
        <div class="col-12 mb-4">
            <div class="card shadow-sm <?= $isCanceled ?>">
                <div class="card-header bg-primary text-white">
                    <strong>Mã đơn hàng:</strong> <?= htmlspecialchars($order->order_id) ?> |
                    <strong>Trạng thái:</strong> 
                    <?php
                        switch (htmlspecialchars($order->status)) {
                            case 0: echo "Chờ xác nhận"; break;
                            case 1: echo "Đang chuẩn bị hàng"; break;
                            case 2: echo "Đang giao"; break;
                            case 3: echo "Đã thanh toán"; break;
                            case 4: echo "Đã giao thành công"; break;
                            case 5: echo "Đã Hủy"; break;
                            default: echo "Trạng thái không xác định";
                        }
                    ?>
                </div>
                <div class="card-body">
                    <p><strong>Tên khách hàng:</strong> <?= htmlspecialchars($order->name_custom) ?></p>
                    <p><strong>Địa chỉ:</strong> <?= htmlspecialchars($order->address) ?></p>
                    <p><strong>Số điện thoại:</strong> <?= htmlspecialchars($order->sdt) ?></p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <p class="mb-0"><strong>Tổng cộng:</strong> <?= number_format($order->total, 0, ',', '.') ?> VNĐ</p>
                        <div>
                            <a class="btn btn-primary btn-sm" href='?act=client_orderitem&id=<?= $order->order_id ?>'>Chi tiết đơn hàng</a>

                            <?php if ($order->status == 0) { ?>
                            <form action="?act=client_order" method="POST" style="display:inline;">
                                <input type="hidden" name="order_id" value="<?= $order->order_id ?>">
                                <input type="hidden" name="status" value="5"> 
                                <button type="submit" class="btn btn-danger btn-sm ms-2">Hủy</button>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>


        <?php } ?>
    </main>

    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/footer.html'; ?>
    </footer>
</body>

</html>
