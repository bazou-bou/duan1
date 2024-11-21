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
                <h3 class="text-center my-3">Trang Danh Sách Bình Luận</h3>

                <div class="container-table">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên người bình luận</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Nội dung bình luận</th>
                                <th scope="col">Ngày đăng</th>
                                <th scope="col">Thao tác</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php var_dump($DanhSachComment);
                            foreach ($DanhSachComment as $key => $comment) { ?>
                                <tr>
                                    <td scope="row"><?php echo $comment->comment_id; ?></td>
                                    <td><?php echo $comment->username; ?></td>
                                    <td><?php echo $comment->product_id; ?></td>
                                    <td><?php echo $comment->content; ?></td>
                                    <td><?php echo $comment->comment_date; ?></td>
                                    <td><a href="?act=admin-edit-comment&id=<?= $comment->id ?>" class="btn btn-warning">Sửa</a></td>
                                    <td><a href="?act=admin-delete-comment&id=<?= $comment->id ?>" onclick="return confirm('Bạn có chắc xóa bình luận này?')" class="btn btn-danger">Xóa</a></td>
                                </tr>
                            <?php } ?>
                            <!-- Hiển thị danh sách bình luận -->
                            <!-- Thêm, sửa, xóa bình luận -->
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