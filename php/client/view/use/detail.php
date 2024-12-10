<?php

$isLoggedIn = isset($_SESSION['user_id']); 
$_SESSION["quantity"] = 1;

if (isset($_POST["quantity"])) {
    $requestedQuantity = intval($_POST["quantity"]);
    if ($requestedQuantity > $DanhSachOne->stock) {
        // Giới hạn số lượng sản phẩm không vượt quá số lượng tồn kho
        $_SESSION["quantity"] = $DanhSachOne->stock;
        $error = "Số lượng yêu cầu vượt quá số lượng tồn kho.";
    } elseif ($requestedQuantity < 1) {
        // Không cho phép số lượng nhỏ hơn 1
        $_SESSION["quantity"] = 1;
        $error = "Số lượng sản phẩm phải lớn hơn hoặc bằng 1.";
    } else {
        $_SESSION["quantity"] = $requestedQuantity;
    }
} else {
    $_SESSION["quantity"] = 1;
}


$isLoggedIn = isset($_SESSION['user_id']); 
$_SESSION["quantity"] = 1;
if (isset($_POST["quantity"])) {
    $_SESSION["quantity"] = intval($_POST["quantity"]); 
} else {
    $_SESSION["quantity"] = 1;
}

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
        .img-comment {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .product_style1 {
            font-size: 30px;

        }

        .product_style2 {
            font-size: 20px;
        }
    </style>

</head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/viewClient/header.php'; ?>
    </header>

    <main>
        <div class="container py-5">
            <div class="row product-info">
                <div class="col-md-6">
                    <div class="main-image">
                        <img id="main-img" src="<?= htmlspecialchars(BASE_URL . $DanhSachOne->img) ?>" class="img-fluid" />
                    </div>
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

                <div class="col-md-6">
                    <h3 class="mb-3 product_style1"><?= htmlspecialchars($DanhSachOne->name) ?></h3>
                    <div class="d-flex align-items-center mb-3">
                        <div class="stars product_style2">
                            <span class="fa fa-star text-warning"></span>
                            <span class="fa fa-star text-warning"></span>
                            <span class="fa fa-star text-warning"></span>
                            <span class="fa fa-star text-secondary"></span>
                            <span class="fa fa-star text-secondary"></span>
                        </div>
                        
                    </div>
                    <h4 class="price product_style2">Giá bán: <span><?= number_format($DanhSachOne->price, 0, ',', '.') ?> vnd</span></h4>

                    <div class="d-flex align-items-center mt-3 product_style2">
                        <h2 class="fs-5">Màu sắc:</h2>
                        <?php
                        foreach ($images as $image) {
                            echo "<img src='../../img/shoes/adidas/$image.jpg' class='color-option ms-2' data-img='../../img/shoes/adidas/$image.jpg' onclick='changeMainImage(this)' alt='$image'>";
                        }
                        ?>
                    </div>

                    <div class="d-flex align-items-center mt-3">
                        <h2 class="fs-5 product_style2 mb-0 me-2">Số lượng:</h2>
                        <div class="input-group">
                            <button class="btn btn-sm px-2 no-border" type="button" id="button-decrement">-</button>
                            <form method="POST" action="" enctype="multipart/form-data">
                                <input type="number" id="quantity" name="quantity" class="form-control text-center form-control-sm no-border no-spinner" value="<?= htmlspecialchars($_SESSION['quantity']) ?>" min="1">
                                <button class="btn btn-sm px-2 no-border" type="button" id="button-increment">+</button>
                            </form>
                        </div>

                    </div>

                    <div class="d-flex align-items-center mt-3">
                        <button class="btn btn-success me-2" type="submit" id="addToCartButton">
                            <i class="fas fa-shopping-cart"></i> <a href="?act=client-addcart&id=<?= htmlspecialchars($DanhSachOne->product_id) ?>" class="text-white">Thêm vào giỏ hàng</a>
                        </button>
                        <button class="btn btn-outline-danger" type="button"><i class="fas fa-heart"></i></button>
                    </div>

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
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-7 col-12 pb-4">
                            <h1>Bình luận</h1>
                            <div id="comments-container">
                                <?php
                                $commentsToShow = array_slice($danhSachComment, 0, 5);
                                foreach ($commentsToShow as $comment) { ?>
                                    <div class="comment mt-4 p-3 border rounded">
                                        <div class="d-flex align-items-start">
                                            <img src="http://localhost/shopBanGiay/img/avata02.jpg" alt="" class="rounded-circle img-comment" width="40" height="40">
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
            <br>
            <hr>



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
                                        <img src="<?= htmlspecialchars(BASE_URL . $product->img) ?>" class="card-img-top" alt="<?= htmlspecialchars($product->name) ?>">
                                        <div class="product-action-link">
                                            <button class="btn cart-btn">
                                                <i class="bi bi-cart-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="product-title"><?= htmlspecialchars($product->name) ?></h5>
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
        function changeMainImage(element) {
            document.getElementById('main-img').src = element.getAttribute('data-img');
        }





        

document.getElementById('button-increment').addEventListener('click', function () {
    let quantityInput = document.getElementById('quantity');
    let currentValue = parseInt(quantityInput.value);
    let maxStock = <?= $DanhSachOne->stock ?>;

    if (currentValue < maxStock) {
        quantityInput.value = currentValue + 1;
        quantityInput.form.submit(); 
    } else {
        quantityInput.value = currentValue - 1;
        alert("Số lượng yêu cầu vượt quá tồn kho.");

    }
});

document.getElementById('quantity').addEventListener('input', function () {
    let quantityInput = document.getElementById('quantity');
    let currentValue = parseInt(quantityInput.value);
    let maxStock = <?= $DanhSachOne->stock ?>; // Lấy số lượng tồn kho từ PHP

    if (currentValue > maxStock) {
        quantityInput.value = maxStock; // Giới hạn số lượng nhập không vượt quá tồn kho
        alert("Số lượng yêu cầu vượt quá tồn kho.");
    } else if (currentValue < 1) {
        quantityInput.value = 1; // Không cho phép nhập nhỏ hơn 1
        alert("Số lượng sản phẩm phải lớn hơn hoặc bằng 1.");
    }
});




        document.getElementById('button-decrement').addEventListener('click', function() {
            let quantityInput = document.getElementById('quantity');
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });

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


            if (name == '' || email == '' || comment == '') {
                return false;
            }
        });


        document.getElementById('button-increment').addEventListener('click', function() {
            let quantityInput = document.getElementById('quantity');
            quantityInput.value = parseInt(quantityInput.value) + 1;
        });
        $(document).ready(function() {
            let offset = 5;
            $('#load-more-comments').on('click', function() {
                $.ajax({
                    url: 'load_more_comments.php',
                    method: 'POST',
                    data: {
                        offset: offset
                    },
                    success: function(response) {

                        $('#comments-container').append(response);
                        offset += 5;
                    }
                });
            });
        });
        document.getElementById('quantity').addEventListener('input', function() {
            this.form.submit();
        });
        document.getElementById('button-decrement').addEventListener('click', function() {
            let quantityInput = document.getElementById('quantity');
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 0;
                quantityInput.form.submit();
            }
        });

        document.getElementById('button-increment').addEventListener('click', function() {
            let quantityInput = document.getElementById('quantity');
            quantityInput.value = parseInt(quantityInput.value) + 0;
            quantityInput.form.submit();
        });





        document.getElementById("addToCartButton").addEventListener("click", function() {
            document.getElementById("addToCartForm").submit();

            window.location.href = "?act=client-list";
        });
    </script>


</body>

</html>