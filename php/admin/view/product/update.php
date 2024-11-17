<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="../../img/logoweb.png" type="image/png" sizes="128x128">
    <title>Trang Tạo Mới Sản Phẩm</title>
    <style>
        .formCreate {
            border: 2px solid #ddd;
            /* Light border around the form */
            border-radius: 8px;
            /* Rounded corners */
            padding: 20px;
            /* Add some padding inside the form */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Shadow effect for a 3D look */
            background-color: #fff;
            /* White background */
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

    <main>
        <div class="container mt-5">
            <form method="post" enctype="multipart/form-data" class="mx-auto formCreate" style="max-width: 800px;">
                <?php if (!empty($baoThanhCong)) { ?>
                    <div class="alert alert-success text-center"><?= htmlspecialchars($baoThanhCong) ?></div>
                <?php } ?>

                <h3 class="text-center mb-4">Trang Tạo Mới Sản Phẩm</h3>

                <!-- Name -->
                <div class="input-group mb-3">
                    <input type="text" name="name" id="name" class="form-control" required placeholder=" " placeholder=" " value="<?= htmlspecialchars($DanhSachOne->name) ?>">

                    <label for="name" class="input-group-label">Nhập tên giày</label>
                </div>
                <div class="text-danger"><?= htmlspecialchars($loi_ten) ?></div>

                <!-- Price -->
                <div class="input-group mb-3">
                    <input type="text" name="price" id="price" class="form-control" value="<?= htmlspecialchars($DanhSachOne->price) ?>" required placeholder=" ">
                    <label for="price" class="input-group-label">Nhập giá giày</label>
                </div>
                <div class="text-danger"><?= htmlspecialchars($loi_price) ?></div>

                <!-- Image -->
                <div class="input-group mb-3">
                    <input type="file" name="fileUpload" id="fileUpload" class="form-control" required placeholder=" ">
                    <label for="fileUpload" class="input-group-label">Nhập hình ảnh giày</label>
                </div>
                <div class="text-danger"><?= htmlspecialchars($loi_anh) ?></div>

                <!-- Description -->
                <div class="input-group mb-3">
                    <input type="text" name="description" id="description" class="form-control" value="<?= htmlspecialchars($DanhSachOne->description) ?>" required placeholder=" ">
                    <label for="description" class="input-group-label">Nhập miêu tả giày</label>
                </div>
                <div class="text-danger"><?= htmlspecialchars($loi_description) ?></div>

                <!-- Stock -->
                <div class="input-group mb-3">
                    <input type="number" name="stock" id="stock" class="form-control" value="<?= htmlspecialchars($DanhSachOne->stock) ?>" required placeholder=" ">
                    <label for="stock" class="input-group-label">Nhập số lượng giày</label>
                </div>
                <div class="text-danger"><?= htmlspecialchars($loi_stock) ?></div>

                <!-- Views -->
                <div class="input-group mb-3">
                    <input type="number" name="views" id="views" class="form-control" value="<?= htmlspecialchars($DanhSachOne->views) ?>" required placeholder=" ">
                    <label for="views" class="input-group-label">Nhập số lượng xem giày</label>
                </div>
                <div class="text-danger"><?= htmlspecialchars($loi_views) ?></div>

                <!-- Category -->
                <div class="mb-3" style="padding-bottom: 20px;">
                    <select class="form-select" id="category" name="category" style="height: 40px;">
                        <option value="" disabled <?= empty($product->category) ? 'selected' : '' ?> disabled>Phân loại</option>
                        <select name="category_id" id="category_id">
                            <?php foreach ($dsCtr as $item) { ?>
                                <option value="<?php echo $item->category_id; ?>"
                                    <?php echo ($item->category_id == $product->category_id) ? 'selected' : ''; ?>>
                                    <?php echo $item->name; ?>
                                </option>
                            <?php } ?>
                        </select>

                    </select>
                    <div class="text-danger"><?= htmlspecialchars($loi_category) ?></div>
                </div>

                <!-- Buttons -->
                <div class="text-center">
                    <button type="submit" name="submitForm" class="btn btn-success">Lưu lại</button>
                    <a href="?act=product-list" class="btn btn-danger">Quay lại</a>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/admin/view/html/footer.html'; ?>
    </footer>
</body>

</html>