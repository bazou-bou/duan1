<?php
class CartController
{
    private $cartQuery;

    public function __construct()
    {
        $this->cartQuery = new CartQuery();
    }

    // Hiển thị giỏ hàng
    public function showCart($userId)
    {
        try {
            $cartItems = $this->cartQuery->getCartByUser($userId);
            include "view/viewclient/giohang.php"; // Giao diện giỏ hàng
        } catch (Exception $e) {
            echo "Lỗi khi hiển thị giỏ hàng: " . $e->getMessage();
        }
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart($userId, $productId, $quantity)
    {
        try {
            $this->cartQuery->addProductToCart($userId, $productId, $quantity);
            header("Location: ?act=client-listgiohang&id=$userId");
        } catch (Exception $e) {
            echo "Lỗi khi thêm sản phẩm vào giỏ hàng: " . $e->getMessage();
        }
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart($userId, $productId)
    {
        try {
            $this->cartQuery->removeProductFromCart($userId, $productId);
            header("Location: ?act=client-listgiohang&id=$userId");
        } catch (Exception $e) {
            echo "Lỗi khi xóa sản phẩm khỏi giỏ hàng: " . $e->getMessage();
        }
    }

    // Cập nhật số lượng sản phẩm trong giỏ
    public function updateCart($userId, $productId, $quantity)
    {
        try {
            if ($quantity > 0) {
                $this->cartQuery->updateQuantity($userId, $productId, $quantity);
            } else {
                $this->cartQuery->removeProductFromCart($userId, $productId);
            }
            header("Location: ?act=client-listgiohang&id=$userId");
        } catch (Exception $e) {
            echo "Lỗi khi cập nhật giỏ hàng: " . $e->getMessage();
        }
    }
    // hiển thị số lượng mà người dùng thêm vào giỏ hàng ở header
    public function getTotalItemsInCart($userId)
    {
        $cartQuery = new CartQuery();
        $totalItems = $cartQuery->getTotalItems($userId);
        return $totalItems;
    }
}