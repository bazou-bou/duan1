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
            <h3 class="text-center my-3">Trang Banner</h3>
            <?php var_dump($bannerList) ?>
            <div class="container-table">
                <table class="table table-bordered  ">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Tiêu Đề</th>
                            <th>Ảnh</th>
                            <th>Trạng thái</th>
                            <th colspan="2"><a href="?act=banner-create" class="btn btn-primary">Thêm mới</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bannerList as $banner) { ?>
                            <tr>
                                <td><?= ($banner->id) ?></td>
                                <td><?= ($banner->title) ?></td>
                                <td>
                                    <div class="anh">
                                        <img src="<?= (BASE_URL . $banner->image_path) ?>" style="width: 100px; height: 100px;" alt="Product Image">
                                    </div>
                                </td>
                                
                                <td class="tdBtn">
                                    <!-- Nút Sửa -->
                                    <a href="?act=banner-update&id=<?= ($banner->id) ?>" class="btn btn-warning btn-xs">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                                <td class="tdBtn">
                                    <!-- Nút Xóa -->
                                    <a href="?act=banner-delete&id=<?= ($banner->id) ?>" onclick="return confirm('Bạn có chắc xóa?')" class="btn btn-danger btn-xs">
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