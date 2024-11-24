<?php
class CartController
{
    private $cartQuery;

    public function __construct()
    {
        $this->cartQuery = new CartQuery();
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
    public function addToCart($userId, $productId, $quantity)
    {
        $this->cartQuery->addProductToCart($userId, $productId, $quantity);
        header("Location: ?act=client-listgiohang&id=$userId");
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart($userId, $productId)
    {
        $this->cartQuery->removeProductFromCart($userId, $productId);
        header("Location: ?act=client-listgiohang&id=$userId");
    }

    // Cập nhật số lượng sản phẩm trong giỏ
    public function updateCart($userId, $productId, $quantity)
    {
        if ($quantity > 0) {
            $this->cartQuery->updateQuantity($userId, $productId, $quantity);
        } else {
            $this->cartQuery->removeProductFromCart($userId, $productId);
        }
        header("Location: ?act=client-listgiohang&id=$userId");  // Quay lại giỏ hàng
    }
}
?>
