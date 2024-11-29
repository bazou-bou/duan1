<?php
// session_start();

// if(isset($_POST["username"])){
//     $_SESSION['username'] = "khách";
//     $_SESSION['user_id'] = 0;
// }




if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usernameOrEmail = $_POST['loginName'];
    $password = $_POST['loginPassword'];


    $userFound = null;
    foreach ($dsUser as $user) {
        if (($user->email === $usernameOrEmail || $user->username === $usernameOrEmail) && $user->password === $password) {
            $userFound = $user;
            break;
        }
    }

    if ($userFound) {

        $_SESSION['user_id'] = $userFound->user_id;
        $_SESSION['username'] = $userFound->username;
        $_SESSION['role'] = $userFound->role;
        $_SESSION['email'] = $userFound->email;


        if ($userFound->status == '1') {
            if ($userFound->role == 1) {
                header("Location: http://localhost/shopBanGiay/php/admin/?act=products-list");
                exit; // Dừng script ngay sau khi chuyển hướng
            } else {
                header("Location: ?act=client-list");
                exit; // Dừng script để tránh thực thi thêm mã không cần thiết
            }
        } else {
            echo "
            <script>
                if (confirm('Tài khoản của bạn đã bị khóa! Bấm OK để đăng nhập lại.')) {
                    window.location.href = '?act=client-logout';
                }
            </script>";
            exit;
        }
    } else {

        $errorMessage = "Thông tin đăng nhập không chính xác!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/css/styleindex.css">
    <link rel="icon" href="../../img/logoweb.png" type="image/png" sizes="128x128">
    <style>
        /* * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .slide {
            width: 100%;
            height: 500px;
            overflow: hidden;
        }

        .tab-content {
            width: 500px;
        }

        .nav-link {
            width: 250px;
        }

        .nav-item {
            width: 250px;
        }

        .nav {
            width: 500px;
        }

        .content {
            display: flex;
            justify-content: center;
            margin-top: 50px;
        } */
    </style>
    <title>Website Bán Giày Converse</title>
</head>

<body>
    <header>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view//html/header.php'; ?>


    </header>
    <div class="content">
        <div class="center">


            <!-- Pills navs -->

            <!-- Pills content -->
            <div class="content">
                <div class="center">
                    <!-- Phần chứa form đăng nhập -->
                    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="tab-login" data-bs-toggle="pill" href="#pills-login" role="tab"
                                aria-controls="pills-login" aria-selected="true">Login</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">

                            <!-- Form đăng nhập -->
                            <form method="POST" enctype="multipart/form-data" class="mx-auto">
                                <!-- Hiển thị thông báo lỗi nếu có -->
                                <?php if (isset($errorMessage)): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $errorMessage; ?>
                                    </div>
                                <?php endif; ?>

                                <!-- Email hoặc Username -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="loginName" name="loginName" class="form-control" required />
                                    <label class="form-label" for="loginName">Email or username</label>
                                </div>

                                <!-- Mật khẩu -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="loginPassword" name="loginPassword" class="form-control" required />
                                    <label class="form-label" for="loginPassword">Password</label>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6 d-flex justify-content-center">
                                        <div class="form-check mb-3 mb-md-0">
                                            <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                                            <label class="form-check-label" for="loginCheck"> Remember me </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-center">
                                        <a href="#!">Forgot password?</a>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                                <div class="text-center">
                                    <p>Not a member? <a href="?act=client-dangky">Register</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/footer.html'; ?>
            </footer>
</body>

</html>