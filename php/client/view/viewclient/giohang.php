<?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/viewClient/header.php'; ?>
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/style.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/owl.carousel.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/owl.theme.default.css">
<link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/viewclient/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">

<!-- page-header -->
<div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="?act=client-list">Trang chủ</a></li>
                            <li>Giỏ hàng</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.page-header-->
    <!-- cart-section -->

    <div class="container">
    <div class="cart-content mt30 mb30">
        <div class="title-header mb20">
            <h2 class="title">Giỏ Hàng</h2>
            <p><span class="text-blue"><?= count($cartItems) ?></span> sản phẩm trong giỏ hàng của bạn</p>
        </div>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th></th>
                    <th>Sản phẩm</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $totalPrice = 0; 
                foreach ($cartItems as $item): 
                    $subTotal = $item['product_price'] * $item['quantity'];
                    $totalPrice += $subTotal;
                ?>
                    <tr>
                        <td>
                            <div class="item-center pdl10">
                                <input type="checkbox" class="checkboxStyle">
                            </div>
                        </td>
                        <td>
                            <div class="product-title item-center">
                                <img src="/shopBanGiay/uploads/<?= $item['product_image'] ?>" alt="<?= $item['product_name'] ?>" width="100">
                                <div>
                                    <p><?= $item['product_name'] ?></p>
                                    <p>Màu sắc: Không xác định</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="item-center"><?= number_format($item['product_price'], 0, ',', '.') ?>đ</div>
                        </td>
                        <td>
                            <div class="item-center">
                                <div class="quantity">
                                    <input class="btn-quantity decrease-quantity" type="button" value="-" 
                                        onclick="updateQuantity(<?= $item['product_id'] ?>, <?= $item['quantity'] - 1 ?>)">
                                    <input type="number" max="10" min="1" name="quantity" value="<?= $item['quantity'] ?>"
                                        class="quantity-input">
                                    <input class="btn-quantity increase-quantity" type="button" value="+"
                                        onclick="updateQuantity(<?= $item['product_id'] ?>, <?= $item['quantity'] + 1 ?>)">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="item-center text-red"><?= number_format($subTotal, 0, ',', '.') ?>đ</div>
                        </td>
                        <td>
                            <div class="item-center pinside10">
                                <a href="?act=client-remove-listgiohang=<?= $item['product_id'] ?>" class="far fa-trash-alt">Xóa</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="prices-summary">
            <div class="left-content">
                <a href="?act=client-listsp" class="derection-product text-blue"> Tiếp tục mua hàng</a>
            </div>
            <div class="right-con">
                <div class="total-receipt">
                    <!-- <div class="promotion-code pinside20">
                        <input type="text" class="input-code" placeholder="Nhập mã ưu đãi">
                        <button type="submit" class="submit-code btn-default">Áp dụng</button>
                    </div> -->
                    <ul class="prices pinside20">
                        <li class="prices-item">
                            <span class="prices-text">Tạm tính</span>
                            <span class="prices-value"><?= number_format($totalPrice, 0, ',', '.') ?>đ</span>
                        </li>
                        <!-- <li class="prices-item">
                            <span class="prices-text">Giảm giá</span>
                            <span class="prices-value">0đ</span>
                        </li> -->
                    </ul>
                    <div class="prices-total pinside20">
                        <span class="price-text">Tổng cộng</span>
                        <span class="prices-value prices-final text-red"><?= number_format($totalPrice, 0, ',', '.') ?>đ</span>
                    </div>
                </div>
                <a href="?act=checkout" class="btn-default btn-checkout">Mua Hàng</a>
            </div>
        </div>
    </div>
</div>

    <!-- /.cart-section -->