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
            <h3 class="text-center my-3">Trang Danh Mục</h3>

            <div class="container-table">
                <table class="table table-bordered  ">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Ảnh danh mục</th>
                            <th>Phân loại</th>
                            <th>Mô tả</th>
                            <th>Giá cả</th>
                            <th>Số lượng</th>
                            <th>Trạng thái</th>
                            <th colspan="2"><a href="?act=product-create" class="btn btn-primary">Thêm mới</a></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($DanhSachCtegory as $product) { ?>
                                <tr>
                                    <td><?= htmlspecialchars($product->product_id) ?></td>
                                    <td><?= htmlspecialchars($product->name) ?></td>
                                    <td>
                                        <div class="anh">
                                            <img src="<?= htmlspecialchars(BASE_URL . $product->img) ?>" style="width: 100px; height: 100px;" alt="Product Image">
                                        </div>
                                    </td>
                                    <td><?= htmlspecialchars($product->category) ?></td>
                                    <td><?= htmlspecialchars($product->description) ?></td>
                                    <td><?= htmlspecialchars($product->price) ?></td>
                                    <td><?= htmlspecialchars($product->stock) ?></td>
                                    <td><?= htmlspecialchars($product->views) ?></td>
                                    <td class="tdBtn">
                                        <!-- Nút Sửa -->
                                        <a href="?act=products-update&id=<?= htmlspecialchars($product->product_id) ?>" class="btn btn-warning btn-xs">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </td>
                                    <td colspan="1" class="tdBtn">
                                        <?php if ($product->status == 0): ?>
                                            <a href="?act=products-status&id=<?= htmlspecialchars($product->product_id) ?>"
                                                onclick="return confirm('Bạn có chắc muốn hiển thị sản phẩm này không?')"
                                                class="btn btn-success btn-xs">
                                                <i class="bi bi-unlock-fill"></i> Hiện
                                            </a>
                                        <?php elseif ($product->status == 1): ?>
                                            <a href="?act=products-status&id=<?= htmlspecialchars($product->product_id) ?>"
                                                onclick="return confirm('Bạn có chắc muốn ẩn sản phẩm này không?')"
                                                class="btn btn-danger btn-xs">
                                                <i class="bi bi-lock-fill"></i> Ẩn
                                            </a>
                                        <?php else: ?>
                                            <!-- Unknown Status -->
                                            <span class="text-muted">Unknown Status</span>
                                        <?php endif; ?>
                                    </td>
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