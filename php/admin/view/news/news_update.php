<header>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/admin/view/html/header.html'; ?>
</header>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa bài viết</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            background-color: #6c63ff;
            color: #fff;
            height: 100vh;
            padding: 20px;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 250px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #584dc1;
        }

        .content-header {
            margin-left: 270px;
            margin-right: 30px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .content-header h2 {
            font-size: 1.75rem;
            font-weight: bold;
        }

        .main-content {
            margin-left: 270px;
        }

        .text-danger {
            color: red;
            font-size: 0.875rem;
        }

        /* CSS cho nội dung bài viết */
        textarea#content {
            max-height: 300px;
            min-height: 150px;
            overflow-y: auto;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            background-color: #fff;
        }

        /* Tùy chỉnh thanh kéo */
        textarea#content::-webkit-scrollbar {
            width: 10px;
        }

        textarea#content::-webkit-scrollbar-thumb {
            background: #6c63ff;
            border-radius: 10px;
        }

        textarea#content::-webkit-scrollbar-thumb:hover {
            background: #584dc1;
        }

        textarea#content::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        /* Responsive layout */
        @media (max-width: 768px) {
            .sidebar {
                position: static;
                height: auto;
                width: 100%;
            }

            .content-header {
                margin-left: 0;
                border: top 10px;
            }

            .main-content {
                margin-left: 0;
                border: top 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">


            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <div class="sidebar">
                    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/admin/view/html/sidebar.html'; ?>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 main-content">
                <div class="content-header">
                    <h2>Chỉnh sửa bài viết</h2>
                </div>

                <!-- Form chỉnh sửa -->
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Trạng thái -->
                        <div class="col-md-3">
                            <h5>Trạng thái hiển thị</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="public" value="1" <?= $new->status == 1 ? 'checked' : '' ?>>
                                <label class="form-check-label" for="public">Công khai</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="private" value="0" <?= $new->status == 0 ? 'checked' : '' ?>>
                                <label class="form-check-label" for="private">Không công khai</label>
                            </div>
                            <!-- Trạng thái -->
                            <div class="mb-3">
                                <select name="status" class="form-select">
                                    <option value="1" <?= ($new->status == 1) ? 'selected' : '' ?>>Hoạt động</option>
                                    <option value="0" <?= ($new->status == 0) ? 'selected' : '' ?>>Không hiển thị</option>
                                </select>
                                <div class="text-danger"><?= htmlspecialchars($loi_status) ?></div>
                            </div>
                        </div>

                        <!-- Thông tin bài viết -->
                        <div class="col-md-6">
                            <h5>Thông tin bài viết</h5>
                            <div class="mb-3">
                                <label for="title" class="form-label">Tiêu đề</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($new->title ?? '') ?>">
                                <div class="text-danger"><?= htmlspecialchars($loi_ten ?? '') ?></div>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Nội dung</label>
                                <textarea class="form-control" id="content" name="content" rows="5"><?= htmlspecialchars($new->content ?? '') ?></textarea>
                                <div class="text-danger"><?= htmlspecialchars($loi_content ?? '') ?></div>
                            </div>

                            <h5>Ảnh bài viết</h5>
                            <!-- Hình ảnh -->
                            <div class="mb-3">
                                <?php if (!empty($new->new_img)): ?>
                                    <p><strong>Ảnh hiện tại:</strong></p>
                                    <img src="../<?= htmlspecialchars($new->image_path) ?>" class="preview" alt="new" style="width: 200px; height: 150px;">
                                <?php endif; ?>
                                <input type="file" name="fileUpload" id="fileUpload" class="form-control">
                                <label for="fileUpload" class="input-group-label">Chọn ảnh mới (nếu có)</label>
                            </div>
                            <div class="text-danger"><?= htmlspecialchars($loi_anh) ?></div>
                            
                    


                            <!-- Nút lưu và quay lại -->
                            <div class="text-center">
                                <button type="submit" name="submitForm" class="btn btn-success">Lưu lại</button>
                                <a href="?act=news-list" class="btn btn-danger">Quay lại</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>