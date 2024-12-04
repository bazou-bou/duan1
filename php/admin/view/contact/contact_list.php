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
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }


        h3 {
            color: #3c50eb;
            font-weight: bold;
        }

        .table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table th {
            background-color: #3c50eb;
            color: #fff;
            font-weight: bold;
        }



        .anh img {
            max-width: 100%;
            object-fit: contain;
            border-radius: px;
        }



        .btn {
            font-size: 0.9rem;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .badge {
            font-size: 0.9rem;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>

</head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/admin/view/html/header.html'; ?>
    </header>
    <main class="main-content">
        <div class="container">
            <h3 class="text-center my-3">Trang Phản Hồi Khách Hàng</h3>
            <div class="container-table">
                <table class="table table-bordered  ">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Tên khách hàng</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Thời gian</th>
                            <th>Lời nhắn</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                            <!-- <th colspan="2"><a href="?act=contact-create" class="btn btn-primary">Thêm mới</a></th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contactList as $contact) { ?>
                            <?php var_dump($contact) ?>
                            <tr>
                                <td><?php echo $contact->contact_id; ?></td>
                                <td><?php echo htmlspecialchars($contact->contact_name); ?></td>
                                <td><?php echo htmlspecialchars($contact->contact_email); ?></td>
                                <td><?php echo htmlspecialchars($contact->contact_phone); ?></td>
                                <td><?php echo htmlspecialchars($contact->contact_mess); ?></td>
                                <td><?php echo htmlspecialchars($contact->created_at); ?></td>

                                <td>
                                    <?php if ($contact->contact_status == 1) { ?>
                                        <span class="badge bg-success">new</span>
                                    <?php } else { ?>
                                        <span class="badge bg-danger">replied</span>
                                    <?php } ?>
                                </td>

                                <td class="tdBtn">

                                    <!-- Nút Xóa -->
                                    <a href="?act=contact-delete&id=<?= $contact->contact_id ?>" onclick="return confirm('Bạn có chắc xóa?')" class="btn btn-danger btn-xs">
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