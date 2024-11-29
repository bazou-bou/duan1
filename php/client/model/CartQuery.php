<?php
require_once __DIR__ . '/../../confix.php';

class CartQuery
{
    private $pdo;

    public function __construct()
    {
        try {
            $config = new DatabaseConfig();
            $this->pdo = $config->getConnection();
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Kết nối database thất bại";
        }
    }

    // Lấy giỏ hàng của người dùng
    public function getCartByUser($id)
    {
        try {
            $sql = "SELECT 
                        carts.cart_id, 
                        carts.user_id, 
                        users.username, 
                        cart_items.item_id, 
                        cart_items.product_id, 
                        products.name AS product_name, 
                        cart_items.quantity, 
                        products.img AS product_image, 
                        products.price AS product_price 
                    FROM carts 
                    LEFT JOIN cart_items ON carts.cart_id = cart_items.cart_id 
                    LEFT JOIN products ON cart_items.product_id = products.product_id 
                    LEFT JOIN users ON carts.user_id = users.user_id 
                    WHERE carts.user_id = :userId
                    ORDER BY carts.cart_id, cart_items.item_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':userId' => $id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage();
        }
    }

    // Thêm sản phẩm vào giỏ hàng
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

    // Thêm sản phẩm vào giỏ hàng (với xử lý hình ảnh)
    private function insertProduct($cartId, $productId, $quantity)
    {
        // Lấy hình ảnh sản phẩm từ bảng products
        $sql = "SELECT img FROM products WHERE product_id = :productId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':productId' => $productId]);
        $productImg = $stmt->fetchColumn();

        if (!$productImg) {
            $productImg = 'default.jpg'; // Ảnh mặc định nếu sản phẩm không có ảnh
        }

        $sql = "INSERT INTO cart_items (cart_id, product_id, quantity, card_img) 
                VALUES (:cartId, :productId, :quantity, :cardImg)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':cartId' => $cartId,
            ':productId' => $productId,
            ':quantity' => $quantity,
            ':cardImg' => $productImg
        ]);
    }

    // Tạo giỏ hàng mới cho người dùng
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

    // Cập nhật số lượng sản phẩm
    public function updateQuantity($cartId, $productId, $quantity)
    {
        $sql = "UPDATE cart_items SET quantity = quantity + :quantity WHERE cart_id = :cartId AND product_id = :productId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':quantity' => $quantity, ':cartId' => $cartId, ':productId' => $productId]);
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
     // hiển thị số lượng mà người dùng thêm vào giỏ hàng ở header
    public function getTotalItems($userId)
    {
        $cartId = $this->getCartId($userId);

        if (!$cartId) {
            return 0;
        }

        $stmt = $this->pdo->prepare("SELECT SUM(quantity) FROM cart_items WHERE cart_id = :cartId");
        $stmt->execute([':cartId' => $cartId]);
        return $stmt->fetchColumn();
    }
}
