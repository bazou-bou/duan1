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

    public function showCart($id)
    {
        $cartItems = $this->cartQuery->getCartByUser($id);

        include "view/use/listgiohang.php";
    }

    public function addToCart($userId, $productId, $quantity = 1)
    {
        try {
            if ($userId == null) {
                echo "<script type='text/javascript'>
                                    alert('Bạn cần đăng nhập để mua hàng.');
                                    window.location.href = '?act=client-login'; // Chuyển hướng tới trang đăng nhập
                                  </script>";
                exit(); 
            } else {
                
                $cartItem = $this->cartQuery->getCartByUserAndProduct($userId, $productId);

                if ($cartItem) {
                    $newQuantity = $cartItem->quantity + $quantity;
                    $this->cartQuery->updateQuantity($cartItem->item_id, $newQuantity);
                } else {
                    $this->cartQuery->addProductToCart($userId, $productId, $quantity);
                }

                header("Location: ?act=client-listgiohang&id=$userId");
                exit;
            }
        } catch (Exception $e) {
            echo "Lỗi khi thêm sản phẩm vào giỏ hàng: " . $e->getMessage();
        }
    }


    // public function removeFromCart($userId, $productId)
    // {
    //     $this->cartQuery->removeProductFromCart($userId, $productId);
    //     header("Location: ?act=client-listgiohang&id=$userId");
    // }

    public function updateCart($item_id, $quantity)
    {
   
        if ($quantity > 0) {
            $update = $this->cartQuery->updateQuantity($item_id, $quantity);
            if ($update == 'ok') {
                $userId = $_SESSION['user_id'];
                header("Location: ?act=client-listgiohang&id=$userId");  
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
