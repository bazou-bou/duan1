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
</head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/admin/view/html/header.html'; ?>
    </header>

    <main class="main-content">
        <div class="container">
            <h3 class="text-center my-3">Danh sách đơn hàng</h3>

            <div class="container-table">
                <table class="table table-bordered  ">
                    <thead class="table-dark">
                        <tr>
                            <th>Id đơn hàng</th>
                            <th>Id người dùng</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Số điện thoại</th>
                            <th>Tên người nhận</th>
                            <th>Địa chỉ nhận</th>

                            <!-- <th colspan="2"><a href="?act=product-create" class="btn btn-primary">Thêm mới</a></th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($DanhSachobject as $value) { ?>
                            <tr>
                                <td><?= htmlspecialchars($value->order_id) ?></td>
                                <td><?= htmlspecialchars($value->user_id) ?></td>

                                <td><?= htmlspecialchars($value->total) ?></td>
                                <td><?= htmlspecialchars($value->status) ?></td>
                                <td><?= htmlspecialchars($value->sdt) ?></td>

                                <td><?= htmlspecialchars($value->name_custom) ?></td>

                                <td><?= htmlspecialchars($value->address) ?></td>
                                <td><a href='?act=order_item&id=<?= $value->order_id ?>'>Chi tiết đơn hàng</a></td>


                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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