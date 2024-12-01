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
    </style>
</head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/admin/view/html/header.html'; ?>
    </header>

    <main>
        <div class="main-content">
            <div class="container">
                <h3 class="text-center my-3">Trang Tin Tức</h3>

                <div class="container-table">
                    <table class="table table-bordered">
                        <thead class="table-dark">

                            <tr>
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <!-- <th>Bài viết</th> -->
                                <th>Ảnh</th>
                                <th>Lượt xem</th>
                                <th>Thời gian</th>
                                <th>Trạng thái</th>
                                <th colspan="2"><a href="?act=news-create" class="btn btn-primary">Thêm mới</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($newList as $new) { ?>
                                <tr>
                                    <td><?= htmlspecialchars($new->new_id) ?></td>
                                    <td><?= htmlspecialchars($new->title) ?></td>

                                    <td>
                                        <div class="anh">
                                            <img src="<?= htmlspecialchars(BASE_URL . $new->new_img) ?>" style="width: 100px; height: 100px;" alt="new Image">
                                        </div>
                                    </td>
                                    <td><?= htmlspecialchars($new->view) ?></td>

                                    <td><?= htmlspecialchars($new->created_at) ?></td>

                                    <td>
                                        <?php if ($new->status == 1) { ?>
                                            <span class="badge bg-success">Hiển thị</span>
                                        <?php } else { ?>
                                            <span class="badge bg-danger">Không hiển thị</span>
                                        <?php } ?>
                                    </td>

                                    <td class="tdBtn">
                                        <!-- Nút Sửa -->
                                        <a href="?act=new-update&id=<?= ($new->new_id) ?>" class="btn btn-warning btn-xs">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <!-- Nút Xóa -->
                                        <a href="?act=new-delete&id=<?= ($new->new_id) ?>" onclick="return confirm('Bạn có chắc xóa?')" class="btn btn-danger btn-xs">
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
        </div>
    </main>

</body>

</html>