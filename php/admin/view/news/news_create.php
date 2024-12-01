<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="../../img/logoweb.png" type="image/png" sizes="128x128">
    <link rel="stylesheet" href="http://localhost/shopBanGiay/php/admin/view/css/styleindex.css">
    <title>Tạo Mới Sản Phẩm</title>
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
    <main class="main-content">
        <div class="container mt-5">
            <form method="post" enctype="multipart/form-data" class="mx-auto formCreate" style="max-width: 800px;">
                <?php if (!empty($baoThanhCong)) { ?>
                    <div class="alert alert-success text-center mb-4"><?= htmlspecialchars($baoThanhCong) ?></div>
                <?php } ?>
                <h3 class="text-center mb-4">Trang Tạo Mới Tin Tức</h3>

                <div class="mb-3 input-group">
                    <input type="text" name="title" id="title" class="form-control" required value="<?= htmlspecialchars($new->title ?? '') ?>" placeholder=" ">
                    <label for="title" class="input-group-label">Nhập tiêu đề</label>
                    <div class="text-danger"><?= htmlspecialchars($loi_ten) ?></div>
                </div>

                <div class="mb-3 input-group">
                    <input type="text" name="content" id="content" class="form-control" required value="<?= htmlspecialchars($new->content ?? '') ?>" placeholder=" ">
                    <label for="content" class="input-group-label">Nhập nội dung</label>
                    <div class="text-danger"><?= htmlspecialchars($loi_content) ?></div>
                </div>

                <div class="mb-3 " style="padding-bottom: 20px;">
                    <label for="fileUpload" class="form-label">Nhập hình ảnh</label>
                    <input type="file" name="fileUpload" id="fileUpload" class="form-control " required>
                    <div class="text-danger"><?= htmlspecialchars($loi_anh) ?></div>
                </div>
                <div class="mb-3 " style="padding-bottom: 20px;">
                    <label for="date" class="form-label">Nhập ngày</label>
                    <input type="date" name="creared_at" id="creared_at" class="form-control "  required value="<?= htmlspecialchars($new->created_at ?? '') ?>" placeholder=" ">
                    
                </div>
                <div class="mb-3 " style="padding-bottom: 20px;">
                    <label for="number" class="form-label">lượt xem</label>
                    <input type="number" name="view" id="view" class="form-control "  required value="<?= htmlspecialchars($new->view ?? '') ?>" placeholder=" ">
                    
                </div>

               
                

                <div class="mb-3" style="padding-bottom: 20px;">
                    <select class="form-select" id="status" name="status" style="height: 40px;">
                        <option value="" disabled <?= empty($new->status) ? 'selected' : '' ?> disabled>Trạng thái</option>
                        <option value="1" class="form-control">Hiển thị</option>
                        <option value="0" class="form-control">Không hiển thị</option>

                    </select>

                </div>

                <div class="text-center">
                    <button type="submit" name="submitForm" class="btn btn-success">Lưu lại</button>
                    <a href="?act=news-list" class="btn btn-danger">Quay lại</a>
                </div>
            </form>

            <footer>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/admin/view/html/footer.html'; ?>
            </footer>
        </div>
        <div class="sidebar">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/admin/view/html/sidebar.html'; ?>
        </div>
        </div>


        </div>
    </main>
</body>

</html>