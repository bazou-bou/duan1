<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="../../img/logoweb.png" type="image/png" sizes="128x128">
    <link rel="stylesheet" href="http://localhost/shopBanGiay/php/admin/view/css/styleindex.css">
    <title>Trang Cập Nhật Banner</title>
    <style>
        .formCreate {
            border: 2px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .input-group {
            position: relative;
            padding-bottom: 20px;
        }

        .input-group .form-control {
            padding-left: 30px;
            height: 40px;
        }

        .input-group-label {
            position: absolute;
            top: 40%;
            left: 10px;
            transform: translateY(-50%);
            color: #000;
            transition: transform 300ms ease, font-size 300ms ease, top 200ms ease;
            font-size: 1rem;
            pointer-events: none;
        }

        .form-control:focus+.input-group-label,
        .form-control:not(:placeholder-shown)+.input-group-label {
            transform: translateY(-130%);
            font-size: 1rem;
            top: 0;
        }

        .form-control:focus {
            outline: none;
            border-color: #3c50eb;
        }

        .form-control::placeholder {
            color: transparent;
        }
    </style>
</head>

<body>

    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/admin/view/html/header.html'; ?>
    </header>

    <main class="main-content">
        <div class="container mt-5">
            <form method="post" enctype="multipart/form-data" class="mx-auto formCreate" style="max-width: 800px;">
                <?php if (!empty($baoThanhCong)) { ?>
                    <div class="alert alert-success text-center"><?= htmlspecialchars($baoThanhCong) ?></div>
                <?php } ?>

                <h3 class="text-center mb-4">Trang Cập Nhật Banner</h3>

                <!-- Tiêu đề -->
                <div class="input-group mb-3">
                    <input type="text" name="title" id="title" class="form-control" required placeholder=" " value="<?= $banner->title ?>">
                    <label for="title" class="input-group-label">Nhập tiêu đề</label>
                </div>
                <div class="text-danger"><?= htmlspecialchars($loi_ten) ?></div>

                <!-- Hình ảnh -->
                <div class="mb-3">
                    <?php if (!empty($banner->image_path)): ?>
                        <p><strong>Ảnh hiện tại:</strong></p>
                        <img src="../<?= htmlspecialchars($banner->image_path) ?>" class="preview" alt="Banner" style="width: 200px; height: 150px;">
                    <?php endif; ?>
                    <input type="file" name="fileUpload" id="fileUpload" class="form-control">
                    <label for="fileUpload" class="input-group-label">Chọn ảnh mới (nếu có)</label>
                </div>
                <div class="text-danger"><?= htmlspecialchars($loi_anh) ?></div>

                <!-- Trạng thái -->
                <div class="mb-3">
                    <select name="status" class="form-select">
                        <option value="1" <?= ($banner->status == 1) ? 'selected' : '' ?>>Hoạt động</option>
                        <option value="0" <?= ($banner->status == 0) ? 'selected' : '' ?>>Không hiển thị</option>
                    </select>
                    <div class="text-danger"><?= htmlspecialchars($loi_description) ?></div>
                </div>

                <!-- Nút lưu và quay lại -->
                <div class="text-center">
                    <button type="submit" name="submitForm" class="btn btn-success">Lưu lại</button>
                    <a href="?act=banner-list" class="btn btn-danger">Quay lại</a>
                </div>
            </form>

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
