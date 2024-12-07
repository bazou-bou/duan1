


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Lịch Sử Mua Hàng</title>
</head>

<body>
    <header>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/viewClient/header.php'; ?>
    </header>

    <main class="container mt-5">
        <h1 class="text-center mb-4">Lịch Sử Mua Hàng</h1>
        <div class="row">
            <?php if (empty($DanhSachobject)) { ?>
                <p class="text-center">Bạn chưa có đơn hàng nào.</p>
            <?php } else { ?>
                <?php foreach ($DanhSachobject as $order) { ?>
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <strong>Mã đơn hàng:</strong> <?= htmlspecialchars($order->order_id) ?> |
                                <strong>Trạng thái:</strong>
                                 <?php if(htmlspecialchars($order->status)==1){?>
                                    Chờ xác nhận
                              <?php  }  ?>
                              <?php
                            if (htmlspecialchars($order->status) == 0) {
                                echo "Chờ xác nhận";
                            } 
                            elseif (htmlspecialchars($order->status) == 1) {
                                echo "Đang chuẩn bị hàng";
                            } 
                            elseif (htmlspecialchars($order->status) == 2) {
                                echo "Đang giao";
                            } 
                            elseif (htmlspecialchars($order->status) == 3) {
                                echo "Đã thanh toán";
                            } 
                            
                            elseif (htmlspecialchars($order->status) == 4) {
                                echo "Đã giao thành công";
                            } 
                            elseif (htmlspecialchars($order->status) == 5) {
                                echo "Đã Hủy";
                            } 
                            else {
                                echo "Trạng thái không xác định";
                            }
                       
                        ?>
                            </div>
                            <div class="card-body">
                                <p><strong>Tên khách hàng:</strong> <?= htmlspecialchars($order->name_custom) ?></p>
                                <p><strong>Địa chỉ:</strong> <?= htmlspecialchars($order->address) ?></p>
                                <p><strong>Số điện thoại:</strong> <?= htmlspecialchars($order->sdt) ?></p>
                                <p class="mt-3 text-end">
                                    <strong>Tổng cộng:</strong> <?= number_format($order->total, 0, ',', '.') ?> VNĐ
                                </p>
                                <p class="mt-3 text-end">
                                <button type="button" class="btn btn-danger">Hủy</button>
                                <a class="btn btn-primary" href='?act=client_orderitem&id=<?= $order->order_id ?>'>Chi tiết đơn hàng</a>

                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </main>

    <footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/footer.html'; ?>
    </footer>
</body>

</html>
