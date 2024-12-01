<?php
class CartController
{
    private $productQuery;
    private $cartQuery;

    public function __construct()
    {
        $this->cartQuery = new CartQuery();
        $this->productQuery = new ProductQuery();
    }

    // Hiển thị giỏ hàng của người dùng
    public function showCart($id)
    {
        // $cartItems = $this->cartQuery->getCartByUser($userId);
        $cartItems = $this->cartQuery->getCartByUser($id);
        // include "views/cart/listgiohang.php";  // Hiển thị giỏ hàng

        include "view/use/listgiohang.php";
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart($userId, $productId, $quantity = 1)
    {
        try {
            if ($userId == null) {
                // Người dùng chưa đăng nhập, hiển thị thông báo và chuyển hướng
                echo "<script type='text/javascript'>
                                    alert('Bạn cần đăng nhập để mua hàng.');
                                    window.location.href = '?act=client-login'; // Chuyển hướng tới trang đăng nhập
                                  </script>";
                exit(); // Dừng chương trình để đảm bảo không có gì khác xảy ra sau khi chuyển hướng
            } else {
                // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng hay chưa
                $cartItem = $this->cartQuery->getCartByUserAndProduct($userId, $productId);

                if ($cartItem) {
                    // Nếu tồn tại, tăng số lượng
                    $newQuantity = $cartItem->quantity + $quantity;
                    $this->cartQuery->updateQuantity($cartItem->item_id, $newQuantity);
                } else {
                    // Nếu chưa, thêm mới sản phẩm với số lượng mặc định
                    $this->cartQuery->addProductToCart($userId, $productId, $quantity);
                }

                // Chuyển hướng về giỏ hàng
                header("Location: ?act=client-listgiohang&id=$userId");
                exit;
            }
        } catch (Exception $e) {
            // Xử lý lỗi nếu có
            echo "Lỗi khi thêm sản phẩm vào giỏ hàng: " . $e->getMessage();
        }
    }


    // Xóa sản phẩm khỏi giỏ hàng
    // public function removeFromCart($userId, $productId)
    // {
    //     $this->cartQuery->removeProductFromCart($userId, $productId);
    //     header("Location: ?act=client-listgiohang&id=$userId");
    // }

    // Cập nhật số lượng sản phẩm trong giỏ
    public function updateCart($item_id, $quantity)
    {
        //var_dump($quantity);
        //var_dump($item_id);
        if ($quantity > 0) {
            $update = $this->cartQuery->updateQuantity($item_id, $quantity);
            if ($update == 'ok') {
                $userId = $_SESSION['user_id'];
                //var_dump($userId);
                header("Location: ?act=client-listgiohang&id=$userId");  // Quay lại giỏ hàng
            }
            // } else {
            //     $this->cartQuery->removeProductFromCart($item_id, $quantity);
            // }
            //header("Location: ?act=client-listgiohang&id=$userId");  // Quay lại giỏ hàng
        }
    }



    public function showproduct($id)
    {
        // $cartItems = $this->cartQuery->getCartByUser($userId);
        $cartItems = $this->cartQuery->getCartByUser($id);
        // include "views/cart/listgiohang.php";  // Hiển thị giỏ hàng

        include "view/use/paypage.php";
    }
}
