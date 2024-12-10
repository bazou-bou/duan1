<?php
// session_start();
// if($_SESSION["username"]=="khách"){
//     $_SESSION['user_id'] =0;
// }

// Kiểm tra nếu dữ liệu tìm kiếm được gửi
if (isset($_POST['search'])) {
    $search=trim($_POST['search']);
    echo $search;
    header("Location: ?act=product-search&search=$search");
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
    <link rel="icon" href="../../img/logoweb.png" type="image/png" sizes="128x128">
    <title>Trang quản lý</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar-custom {
            background-color: black;
        }

        .navbar-brand img {
            max-width: 200px;
            height: auto;
        }

        .nav-link,
        .dropdown-toggle {
            color: white !important;
        }

        .cart-icon,
        .settings-icon {
            font-size: 1.5rem;
        }

        .navbar-nav .dropdown:hover .dropdown-menu {
            display: block;
            position: absolute;
            top: 100%;
            right: 0;
        }

        .dropdown-menu {
            min-width: 150px;
            transform: translateX(-10%);
        }

        .navbar-nav .nav-link .bi {
            color: white;
        }
    </style>
</head>

<body>
    <!-- Thanh điều hướng -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a href="#" id="logo" class="navbar-brand">
                <img src="./img/logo01.png" alt="Logo" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li><a class="nav-link px-2 text-white" href="?act=client-list">Quản lý sản phẩm</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" aria-expanded="false">
                            Quản lý phân loại
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                            <li><a class="dropdown-item" href="?act=client-category&category=Giày nam">Giày nam</a></li>
                            <li><a class="dropdown-item" href="?act=client-category&category=Giày nữ">Giày nữ</a></li>
                            <li><a class="dropdown-item" href="?act=client-category&category=Giày trẻ em">Giày trẻ em</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link px-2 text-white" href="?act=client-listusers">Quản lý người dùng</a></li>
                </ul>

                <!-- Form tìm kiếm -->
                <form action="" method="post" class="d-flex">
                    <input name="search" class="form-control me-2" type="search" placeholder="Tìm kiếm..." aria-label="Tìm kiếm" required>
                </form>

                <ul class="navbar-nav">
                    <!-- Giỏ hàng -->
                    <li class="nav-item">

                        <?php if(isset($_SESSION['user_id'])){?>

                        <a class="nav-link text-white" href="?act=client-listgiohang&id=<?= htmlspecialchars($_SESSION['user_id']) ?>">
                            
                            <i class="bi bi-cart cart-icon"></i>
                        </a> 
                        <?php }else{?> 
                            <a class="nav-link text-white" href="">
                            
                            <i class="bi bi-cart cart-icon"></i>
                        </a> 
                        <?php } ?>
                    </li>

                    <!-- Đăng nhập dạng thả xuống -->
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white" href="#" id="settingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-gear settings-icon"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingsDropdown">
                            <?php if (isset($_SESSION['username']) && $_SESSION['username']!="khách" ) { ?>
                                <li><a class="dropdown-item" href="#"><?= htmlspecialchars($_SESSION['username']) ?></a></li>
                                <li><a class="dropdown-item" href="?act=client-logout">Đăng xuất</a></li>
                            <?php } else { ?>
                                <li><a class="dropdown-item" href="?act=client-login">Đăng nhập</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>
