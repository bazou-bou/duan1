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
            <h3 class="text-center my-3">Trang Danh Sách Người Dùng</h3>

            <div class="container-table">
                <table class="table table-bordered  ">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Tên người dùng</th>
                            <th>Ảnh người dùng</th>
                            <th>Email</th>
                            <th>Chức vụ</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                            <!-- <th colspan="2"><a href="?act=product-create" class="btn btn-primary">Thêm mới</a></th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($DanhSachUsers as $user) { ?>
                            <tr>
                                <td><?= htmlspecialchars($user->user_id) ?></td>
                                <td><?= htmlspecialchars($user->username) ?></td>
                                <td>
                                    <div class="anh">
                                        null
                                    </div>
                                </td>
                                <td><?= htmlspecialchars($user->email) ?></td>
                                <td>
                                    <?= htmlspecialchars($user->role == 0 ? 'user' : ($user->role == 1 ? 'admin' : 'unknown')) ?>
                                </td>
                                <!-- User Status -->
                                <td colspan="1">
                                    <?= htmlspecialchars($user->status == 0 ? 'Blocked' : ($user->status == 1 ? 'Active' : 'Unknown')) ?>
                                </td>

                                <td colspan="1" class="tdBtn">
                                    <?php if ($user->status == 0): ?>
                                        <!-- Unban Button (User is currently blocked) -->
                                        <a href="?act=unban&user_id=<?= htmlspecialchars($user->user_id) ?>"
                                            onclick="return confirm('Bạn có chắc muốn mở khóa tài khoản này không?')"
                                            class="btn btn-success btn-xs">
                                            <i class="bi bi-unlock-fill"></i> Unban
                                        </a>
                                    <?php elseif ($user->status == 1): ?>
                                        <!-- Ban Button (User is currently active) -->
                                        <a href="?act=ban&user_id=<?= htmlspecialchars($user->user_id) ?>"
                                            onclick="return confirm('Bạn có chắc muốn khóa tài khoản này không?')"
                                            class="btn btn-danger btn-xs">
                                            <i class="bi bi-lock-fill"></i> Ban
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