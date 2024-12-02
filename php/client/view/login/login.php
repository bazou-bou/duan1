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
        /* Cô lập Bootstrap 3 */
        .bootstrap3-section .form-control {
            /* Giao diện Bootstrap 3 */
            border-radius: 4px;
        }

        /* Cô lập Bootstrap 5 */
        .bootstrap5-section .form-control {
            /* Giao diện Bootstrap 5 */
            border-radius: 0;
        }
    </style>


    <title>Website Bán Giày Converse</title>
</head>

<body>
    <header>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/viewClient/header.php'; ?>


    </header>
    <main>
        <!-- Login 4 - Bootstrap Brain Component -->
        <section class="p-3 p-md-4 p-xl-5">
            <div class="container">
                <div class="card border-light-subtle shadow-sm">
                    <div class="row g-0">
                        <div class="col-12 col-md-6">
                            <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="http://localhost/shopBanGiay/php/client/img/bia.jpg" alt="Shoe BTL logo">
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="card-body p-3 p-md-4 p-xl-5">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-5">
                                            <h3>Đăng nhập</h3>
                                        </div>
                                    </div>
                                </div>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="row gy-3 gy-md-4 overflow-hidden ">
                                        <div class="form-floating mb-3">
                                            <input type="text" id="loginName" name="loginName" class="form-control" placeholder=" " required>
                                            <label for="loginName">Tên đăng nhập</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="password" id="loginPassword" name="loginPassword" class="form-control" placeholder=" " required>
                                            <label for="loginPassword">Mật khẩu</label>
                                        </div>

                                        <div class="col-12">
                                            <div class="row justify-content-between">
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" name="remember_me" id="remember_me">
                                                        <label class="form-check-label text-secondary" for="remember_me">
                                                            Nhớ tôi
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-end">
                                                        <a href="#!" class="link-secondary text-decoration-none">Quên mật khẩu?</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn bsb-btn-xl btn-secondary" type="submit">Đăng nhập ngay</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="mt-4 ">
                                    <p class="mb-0 text-secondary text-end">Bạn chưa có tài khoản? <a href="?act=client-dangky">Đăng ký</a></p>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex align-items-center my-4">
                                            <hr class="flex-grow-1">
                                            <p class="mx-3 mb-0 text-muted">Đăng nhập bằng</p>
                                            <hr class="flex-grow-1">
                                        </div>

                                        <div class="d-flex gap-3 flex-column flex-xl-row">
                                            <a href="#!" class="btn bsb-btn-2xl btn-outline-dark rounded-0 d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-google text-danger" viewBox="0 0 16 16">
                                                    <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                                                </svg>
                                                <span class="ms-2 fs-6">Google</span>
                                            </a>

                                            <a href="#!" class="btn bsb-btn-2xl btn-outline-dark rounded-0 d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook text-primary" viewBox="0 0 16 16">
                                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                                </svg>
                                                <span class="ms-2 fs-6">Facebook</span>
                                            </a>

                                            <a href="#!" class="btn bsb-btn-2xl btn-outline-dark rounded-0 d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-twitter text-info" viewBox="0 0 16 16">
                                                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                                </svg>
                                                <span class="ms-2 fs-6">Twitter</span>
                                            </a>

                                            <a href="#!" class="btn bsb-btn-2xl btn-outline-dark rounded-0 d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-apple me-2" viewBox="0 0 16 16">
                                                    <path d="M11.318 1.07a3.237 3.237 0 0 1-.947 2.348c-.593.618-1.571 1.089-2.356 1.089a3.54 3.54 0 0 1-.035-.574c0-.931.387-1.888.97-2.518A3.136 3.136 0 0 1 9.703 0c.138.012.278.02.41.02.717 0 1.62.454 2.054 1.05-.044.02-.877.43-1.26 1zm1.896 14.06a6.359 6.359 0 0 1-3.003 1.6c-1.158.294-2.338.307-3.072.027-1.14-.402-2.222-1.475-3.015-2.892-1.31-2.327-1.528-5.312-.47-6.82.446-.604 1.012-.962 1.66-.982.456-.014.893.148 1.353.311.369.133.742.27 1.133.27.417 0 .82-.143 1.218-.287.5-.184 1.016-.376 1.637-.321.626.055 1.14.248 1.536.58.393.33.674.745.907 1.205.38.723.537 1.466.55 1.524-.01.007-.72.276-.73 1.212-.003.569.41 1.066.42 1.077.016.02.892.36 1.267 1.382.29.812.23 1.535.208 1.724-.004.036-.007.067-.011.092-.093.56-.444 1.162-.837 1.665z" />
                                                </svg>
                                                <span class="ms-2 fs-6">Apple</span>
                                            </a>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>


    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/footer.html'; ?>
    </footer>
</body>

</html>