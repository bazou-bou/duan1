<?php

require_once __DIR__ . '/../../confix.php';

class CartQuery
{
    private $pdo;

    public function __construct()
    {
        $dbConfig = new DatabaseConfig();
        $this->pdo = $dbConfig->getConnection();
    }

    // Lấy giỏ hàng của người dùng
    public function getCartByUser($userId)
    {
        $sql = "SELECT ci.*, p.name, p.price, p.img 
                FROM cart_items ci 
                JOIN products p ON ci.product_id = p.product_id 
                WHERE ci.cart_id = (SELECT cart_id FROM carts WHERE user_id = :userId LIMIT 1)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Thêm sản phẩm vào giỏ
    public function addProductToCart($userId, $productId, $quantity)
    {
        $cartId = $this->getCartId($userId);

        if ($cartId) {
            $sql = "SELECT * FROM cart_items WHERE cart_id = :cartId AND product_id = :productId";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':cartId' => $cartId, ':productId' => $productId]);
            $item = $stmt->fetch(PDO::FETCH_OBJ);

            if ($item) {
                $this->updateQuantity($cartId, $productId, $quantity);
            } else {
                $this->insertProduct($cartId, $productId, $quantity);
            }
        } else {
            $this->createNewCart($userId, $productId, $quantity);
        }
    }

    // Cập nhật số lượng sản phẩm trong giỏ
    public function updateQuantity($cartId, $productId, $quantity)
    {
        $sql = "UPDATE cart_items SET quantity = quantity + :quantity WHERE cart_id = :cartId AND product_id = :productId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':quantity' => $quantity, ':cartId' => $cartId, ':productId' => $productId]);
    }

    // Thêm sản phẩm vào giỏ mới
    private function insertProduct($cartId, $productId, $quantity)
    {
        $sql = "INSERT INTO cart_items (cart_id, product_id, quantity) VALUES (:cartId, :productId, :quantity)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':cartId' => $cartId, ':productId' => $productId, ':quantity' => $quantity]);
    }

    // Tạo giỏ mới cho người dùng
    private function createNewCart($userId, $productId, $quantity)
    {
        $sql = "INSERT INTO carts (user_id) VALUES (:userId)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':userId' => $userId]);
        $cartId = $this->pdo->lastInsertId();
        $this->insertProduct($cartId, $productId, $quantity);
    }

    // Lấy cart_id của người dùng
    private function getCartId($userId)
    {
        $sql = "SELECT cart_id FROM carts WHERE user_id = :userId LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':userId' => $userId]);
        return $stmt->fetchColumn();
    }

    // Xóa sản phẩm khỏi giỏ
    public function removeProductFromCart($userId, $productId)
    {
        $cartId = $this->getCartId($userId);

        if ($cartId) {
            $sql = "DELETE FROM cart_items WHERE cart_id = :cartId AND product_id = :productId";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':cartId' => $cartId, ':productId' => $productId]);
        }
    }
}
?>
