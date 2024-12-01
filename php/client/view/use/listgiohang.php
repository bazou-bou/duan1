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

        /* Tăng độ rõ ràng cho checkbox */
        .checkbox-custom {
            border: 2px solid #007bff !important;
            border-radius: 3px;
            width: 20px;
            height: 20px;
        }

        .checkbox-custom:checked {
            background-color: #007bff;
        }

        /* Đồng bộ chiều rộng nút thanh toán với bảng */
        .btn-checkout {
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/viewClient/header.php'; ?>
    </header>

    <main class="container cart-container">
        <h1 class="text-center mb-4">Giỏ Hàng của bạn</h1>
        <?php if (!empty($cartItems)) { ?>
            <table class="table table-borderless bg-white">
                <thead class="table-light">
                    <tr>
                        <th style="width: 5%; text-align: center;">Chọn</th>
                        <th style="width: 15%;">Hình Ảnh</th>
                        <th>Tên Sản Phẩm</th>
                        <th style="width: 15%;">Giá</th>
                        <th style="width: 10%;">Số Lượng</th>
                        <th style="width: 15%;">Tổng</th>
                        <th style="width: 15%; text-align: center;">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalAmount = 0;
                    foreach ($cartItems as $item) {
                        $itemTotal = $item->quantity * $item->product_price;
                        ?>
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" class="form-check-input select-item checkbox-custom"
                                    data-item-total="<?= $itemTotal ?>"
                                    name="selected_items[]"
                                    value="<?= $item->item_id ?>">
                            </td>
                            <td>
                                <img src="<?= htmlspecialchars(BASE_URL . $item->product_image) ?>"
                                    alt="Product Image"
                                    class="img-thumbnail"
                                    style="max-height: 100px; object-fit: cover;">
                            </td>
                            <td><?= htmlspecialchars($item->product_name) ?></td>
                            <td class="text-danger fs-5"><?= number_format($item->product_price, 0, ',', '.') ?> VNĐ</td>
                            <td>
                                <form class="update_quantity" action="?act=update-cart&id=<?= $item->product_id ?>&item_id=<?= $item->item_id ?>" method="post">
                                    <input type="number" class="form-control" name="quantity[<?= $item->item_id ?>]" value="<?= $item->quantity ?>">
                                </form>
                            </td>
                            <td class="text-danger fs-5"><?= number_format($itemTotal, 0, ',', '.') ?> VNĐ</td>
                            <td class="text-center">
                                <a href="?act=remove-item&item_id=<?= $item->item_id ?>" class="btn btn-danger btn-sm">Xóa</a>
                                <a href="?act=client-detail&id=<?= $item->product_id ?>" class="btn btn-primary btn-sm">Chi Tiết</a>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="6" class="text-end cart-total">Tổng Thanh Toán:</td>
                        <td class="text-danger fs-4" id="total-amount">0 VNĐ</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <div class="text-end">
                <button type="submit" class="btn btn-checkout btn-lg">Thanh Toán</button>
            </div>
        <?php } else { ?>
            <div class="alert alert-warning text-center">Giỏ hàng của bạn đang trống!</div>
        <?php } ?>
    </main>

    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/footer.html'; ?>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Tự động submit form khi thay đổi số lượng
            const quantityInputs = document.querySelectorAll(".update_quantity input[type='number']");

            quantityInputs.forEach((input) => {
                input.addEventListener("change", function () {
                    const form = this.closest("form");
                    if (form) {
                        form.submit();
                    }
                });
            });

            // Cập nhật tổng thanh toán khi checkbox thay đổi
            const checkboxes = document.querySelectorAll(".select-item");
            const totalAmountElement = document.getElementById("total-amount");

            function updateTotal() {
                let total = 0;
                checkboxes.forEach((checkbox) => {
                    if (checkbox.checked) {
                        total += parseFloat(checkbox.dataset.itemTotal);
                    }
                });
                totalAmountElement.textContent = total.toLocaleString("vi-VN") + " VNĐ";
            }

            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener("change", updateTotal);
            });
        });
    </script>
</body>

</html>
