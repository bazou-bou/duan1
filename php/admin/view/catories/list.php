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
            <h3 class="text-center my-3">Trang Danh Sách Sản Phẩm</h3>

            <div class="container-table">
                <table class="table table-bordered  ">
                    <thead class="table-dark">
                        <tr>
                            <th><a href="?act=product-list">Quay lại</a></th>

                        </tr>
                        <tr>
                            <th>Mã danh mục</th>
                            <th>Tên Danh mục</th>
                            <th colspan="2"><a href="?act=catories-create" class="btn btn-primary">Thêm mới</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dsCtr as $product) { ?>
                            <tr>
                                <td><?= htmlspecialchars($product->category_id) ?></td>
                                <td><?= htmlspecialchars($product->name) ?></td>
                                <td class="tdBtn">
                                    <!-- Nút Sửa -->
                                    <a href="?act=catories-update&id=<?= htmlspecialchars($product->category_id) ?>" class="btn btn-warning btn-xs">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                                <td class="tdBtn">
                                    <!-- Nút Xóa -->
                                    <a href="?act=catories-delete&id=<?= htmlspecialchars($product->category_id) ?>" onclick="return confirm('Bạn có chắc xóa?')" class="btn btn-danger btn-xs">
                                        <i class="bi bi-trash"></i>
                                    </a>
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