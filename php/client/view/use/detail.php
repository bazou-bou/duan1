<?php


$isLoggedIn = isset($_SESSION['user_id']); // Kiểm tra người dùng đã đăng nhập
$_SESSION["quantity"] = 1;
if (isset($_POST["quantity"])) {
    $_SESSION["quantity"] = intval($_POST["quantity"]); // Chuyển đổi sang số nguyên
}

var_dump($_SESSION["quantity"]); // Debug, nên xoá sau khi kiểm tra
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/css/chitietsanpham.css">
    <link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/css/styleindex.css">
    <link rel="icon" href="../../img/logoweb.png" type="image/png" sizes="128x128">

    <style>

    </style>

</head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/header.php'; ?>
    </header>

    <main>
        <div class="container py-5">
            <div class="row product-info">
                <!-- Main Image -->
                <div class="col-md-6">
                    <div class="main-image">
                        <img id="main-img" src="<?= htmlspecialchars(BASE_URL . $DanhSachOne->img) ?>" class="img-fluid" />
                    </div>
                    <!-- Thumbnail Slider -->
                    <div class="product-slider mt-3">
                        <?php
                        $images = ['shoeA1', 'shoeA2', 'shoeA3', 'shoeA4'];
                        foreach ($images as $image) {
                            echo "<div class='slider-item'>
                                        <img src='../../img/shoes/adidas/$image.jpg' class='thumbnail-img' data-img='../../img/shoes/adidas/$image.jpg' alt='$image' onclick='changeMainImage(this)' />
                                      </div>";
                        }
                        ?>
                    </div>
                </div>

                <!-- Product Details Section -->
                <div class="col-md-6">
                    <h3 class="card-title"><?= htmlspecialchars($DanhSachOne->name) ?></h3>
                    <div class="d-flex align-items-center mb-3">
                        <div class="stars">
                            <span class="fa fa-star text-warning"></span>
                            <span class="fa fa-star text-warning"></span>
                            <span class="fa fa-star text-warning"></span>
                            <span class="fa fa-star text-secondary"></span>
                            <span class="fa fa-star text-secondary"></span>
                        </div>
                        <span class="ms-2"><?= htmlspecialchars($DanhSachOne->views) ?> reviews</span>
                    </div>
                    <h4 class="price">Giá bán: <span><?= number_format($DanhSachOne->price, 0, ',', '.') ?> vnd</span></h4>

                    <!-- Color Options -->
                    <div class="d-flex align-items-center mt-3">
                        <h5 class="fs-5">Màu sắc:</h5>
                        <?php
                        foreach ($images as $image) {
                            echo "<img src='../../img/shoes/adidas/$image.jpg' class='color-option ms-2' data-img='../../img/shoes/adidas/$image.jpg' onclick='changeMainImage(this)' alt='$image'>";
                        }
                        ?>
                    </div>

                    <!-- Quantity Selection -->
                    <div class="d-flex align-items-center mt-3">
                        <h5 class="fs-5">Số lượng:</h5>
                        <div class="input-group">
                            <button class="btn btn-sm px-2 no-border" type="button" id="button-decrement">-</button>
                            <form method="POST" action="" enctype="multipart/form-data">
                                <input type="number" id="quantity" name="quantity" class="form-control text-center form-control-sm no-border no-spinner" value="1" min="1">
                                <!-- <button type="submit">Gửi</button> -->

                                <button class="btn btn-sm px-2 no-border" type="button" id="button-increment">+</button>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-3">
                        <button class="btn btn-success me-2" type="submit" id="addToCartButton">
                            <i class="fas fa-shopping-cart"></i> <a href="?act=client-addcart&id=<?= htmlspecialchars($DanhSachOne->product_id) ?>" type="submit">Thêm vào giỏ hàng</a>
                        </button>

                        <button class="btn btn-outline-danger" type="button"><i class="fas fa-heart"></i></button>
                    </div>
                    </form>
                    <!-- Description -->
                    <div class="mt-3">
                        <p><?= htmlspecialchars($DanhSachOne->description) ?></p>
                    </div>
                </div>
            </div>
            <br>
            <hr>
            <div class="row mt-5">
                Đánh giá
            </div>
            <br>
            <hr>
            <!-- Main comment -->
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-7 col-12 pb-4">
                            <h1>Bình luận</h1>
                            <div id="comments-container">
                                <?php
                                // Lấy 5 bình luận đầu tiên
                                $commentsToShow = array_slice($danhSachComment, 0, 5);
                                foreach ($commentsToShow as $comment) { ?>
                                    <div class="comment mt-4 p-3 border rounded">
                                        <div class="d-flex align-items-start">
                                            <img src="http://localhost/shopBanGiay/img/avata02.jpg" alt="" class="rounded-circle" width="40" height="40">
                                            <div class="ms-3">
                                                <h4 class="mb-1"><?= htmlspecialchars($comment->username) ?></h4>
                                                <span class="text-muted"><?= date('d-m-Y', strtotime($comment->comment_date)) ?></span>
                                            </div>
                                        </div>
                                        <p class="mt-2 bg-light p-2 rounded"><?= htmlspecialchars($comment->content) ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-5 col-12 mt-4">
                            <form id="align-form" method="post">
                                <div class="form-group">
                                    <h4>Để lại bình luận</h4>
                                    <label for="message">Bình luận</label>
                                    <textarea name="msg" id="msg" cols="30" rows="5" class="form-control"></textarea>
                                    <span class="text-danger" id="loi_comment"><?= htmlspecialchars($loi_comment) ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="name">Tên</label>
                                    <input type="text" name="username" id="username" class="form-control">
                                    <span class="text-danger" id="loi_name"> <?= htmlspecialchars($loi_name) ?> </span>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                    <span class="text-danger" id="loi_email"> <?= htmlspecialchars($loi_email) ?> </span>
                                </div>
                                <div class="form-inline">
                                    <input type="checkbox" name="check" id="checkbx" class="mr-1">
                                    <label for="subscribe">Đăng ký để nhận tin mới từ tôi</label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="postComment" id="postComment" class="btn btn-outline-success">Gửi đi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end comment -->
            <br>
            <hr>



            <!-- Related Products -->
            <div>
                <h2>Sản phẩm cùng loại</h2>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                    <?php
                    foreach ($danhsachCategory as $product) {
                    ?>
                        <div class="col mb-4">
                            <a href="?act=client-detail&id=<?= htmlspecialchars($product->product_id) ?>" class="text-decoration-none">
                                <div class="card product-item">
                                    <div class="product-thumb">
                                        <!-- Hình ảnh sản phẩm -->
                                        <img src="<?= htmlspecialchars(BASE_URL . $product->img) ?>" class="card-img-top" alt="<?= htmlspecialchars($product->name) ?>">
                                        <div class="product-action-link">
                                            <button class="btn cart-btn">
                                                <i class="bi bi-cart-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!-- Tên sản phẩm -->
                                        <h5 class="product-title"><?= htmlspecialchars($product->name) ?></h5>
                                        <!-- Giá sản phẩm -->
                                        <p class="product-price"><?= number_format($product->price, 0, ',', '.') ?> VNĐ</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="?act=client-detail&id=<?= htmlspecialchars($product->product_id) ?>" class="stretched-link">Xem Chi Tiết</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/footer.html'; ?>
    </footer>

    <script>
        // Function to change the main image
        function changeMainImage(element) {
            document.getElementById('main-img').src = element.getAttribute('data-img');
        }

        // Quantity button functionality
        document.getElementById('button-decrement').addEventListener('click', function() {
            let quantityInput = document.getElementById('quantity');
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

        //prevents
        document.getElementById('postComment').addEventListener('click', function(event) {
            let name = document.getElementById('username').value;
            let email = document.getElementById('email').value;
            let comment = document.getElementById('msg').value;
            let loi_comment = document.getElementById('loi_comment');
            let loi_name = document.getElementById('loi_name');
            let loi_email = document.getElementById('loi_email');
            if (name == '') {
                loi_name.innerHTML = 'Tên không được để trống';
                event.preventDefault();
            } else {
                loi_name.innerHTML = '';
            }
            if (email == '') {
                loi_email.innerHTML = 'Email không được để trống';
                event.preventDefault();
            } else {
                loi_email.innerHTML = '';
            }
            if (comment == '') {
                loi_comment.innerHTML = 'Bình luận không được để trống';
                event.preventDefault();
            } else {
                loi_comment.innerHTML = '';
            }
            // Kiểm tra đăng nhập


            if (name == '' || email == '' || comment == '') {
                return false;
            }
        });


        document.getElementById('button-increment').addEventListener('click', function() {
            let quantityInput = document.getElementById('quantity');
            quantityInput.value = parseInt(quantityInput.value) + 1;
        });
        $(document).ready(function() {
            let offset = 5; // Bắt đầu từ bình luận thứ 6
            $('#load-more-comments').on('click', function() {
                $.ajax({
                    url: 'load_more_comments.php', // File xử lý lấy thêm bình luận
                    method: 'POST',
                    data: {
                        offset: offset
                    },
                    success: function(response) {
                        // Thêm bình luận vào phần tử #comments-container
                        $('#comments-container').append(response);
                        offset += 5; // Cập nhật offset để lấy 5 bình luận tiếp theo
                    }
                });
            });
        });



        document.getElementById("addToCartButton").addEventListener("click", function() {
            // Gửi form bằng JavaScript
            document.getElementById("addToCartForm").submit();

            // Chuyển trang sau khi gửi form
            window.location.href = "?act=client-list"; // Thay URL bằng trang bạn muốn chuyển đến
        });
    </script>


</body>

</html>