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
        // $sql = "SELECT ci.*, p.name, p.price, p.img 
        //         FROM cart_items ci 
        //         JOIN products p ON ci.product_id = p.product_id 
        //         WHERE ci.cart_id = (SELECT cart_id FROM carts WHERE user_id = :userId LIMIT 1)";
        // $stmt = $this->pdo->prepare($sql);
        // $stmt->bindParam(':userId', $userId);
        // $stmt->execute();
        // return $stmt->fetchAll(PDO::FETCH_OBJ);

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
                    WHERE carts.user_id = '{$id}'
                    ORDER BY carts.cart_id, cart_items.item_id";

            $data = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            $cartItems = [];
            foreach ($data as $value) {
                $product = new Card();
                $product->cart_id = $value["cart_id"];
                $product->user_id = $value["user_id"];
                $product->username = $value["username"];
                $product->item_id = $value["item_id"];
                $product->product_id = $value["product_id"];
                $product->product_name = $value["product_name"];
                $product->quantity = $value["quantity"];
                $product->product_image = $value["product_image"];
                $product->product_price = $value["product_price"];
                $product->product_price = $value["product_price"];

                $cartItems[] = $product;
            }

            return $cartItems;
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Truy xuất đơn hàng thất bại";
        }
    }
    public function getCartVByUser($id)
    {
        // $sql = "SELECT ci.*, p.name, p.price, p.img 
        //         FROM cart_items ci 
        //         JOIN products p ON ci.product_id = p.product_id 
        //         WHERE ci.cart_id = (SELECT cart_id FROM carts WHERE user_id = :userId LIMIT 1)";
        // $stmt = $this->pdo->prepare($sql);
        // $stmt->bindParam(':userId', $userId);
        // $stmt->execute();
        // return $stmt->fetchAll(PDO::FETCH_OBJ);

        try {
            $sql = "SELECT 
                    carts.cart_id, 
                    carts.user_id, 
                     
                    users.username, 
                    cart_items.item_id, 
                    cart_items.product_id, 
                    cart_items.variant, 
                    products.name AS product_name, 
                    cart_items.quantity, 
                    products.img AS product_image, 
                    products.price AS product_price 
                    FROM carts 
                    LEFT JOIN cart_items ON carts.cart_id = cart_items.cart_id 
                    LEFT JOIN products ON cart_items.product_id = products.product_id 
                    LEFT JOIN users ON carts.user_id = users.user_id 
                    WHERE carts.user_id = '{$id}'
                    ORDER BY carts.cart_id, cart_items.item_id";

            $data = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            $cartItems = [];
            foreach ($data as $value) {
                $product = new Cardvariant();
                $product->cart_id = $value["cart_id"];
                $product->user_id = $value["user_id"];
                $product->username = $value["username"];
                $product->item_id = $value["item_id"];
                $product->product_id = $value["product_id"];
                $product->product_name = $value["product_name"];
                $product->quantity = $value["quantity"];
                $product->product_image = $value["product_image"];
                $product->product_price = $value["product_price"];
                $product->product_price = $value["product_price"];
                $product->variant = $value["variant"];

                $cartItems[] = $product;
            }

            return $cartItems;
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Truy xuất đơn hàng thất bại";
        }
    }

    public function getCartByUserAndProduct($userId, $productId)
    {
        try {
            $sql = "SELECT 
                carts.cart_id, 
                carts.user_id, 
                users.username, 
                cart_items.item_id, 
                cart_items.product_id,
                cart_items.variant,
                products.name AS product_name, 
                cart_items.quantity, 
                products.img AS product_image, 
                products.price AS product_price 
                FROM carts 
                LEFT JOIN cart_items ON carts.cart_id = cart_items.cart_id 
                LEFT JOIN products ON cart_items.product_id = products.product_id 
                LEFT JOIN users ON carts.user_id = users.user_id 
                WHERE carts.user_id = '{$userId}' AND cart_items.product_id = '{$productId}'
                ORDER BY carts.cart_id, cart_items.item_id";

            $data = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                $product = new Cardvariant();
                $product->cart_id = $data["cart_id"];
                $product->user_id = $data["user_id"];
                $product->username = $data["username"];
                $product->item_id = $data["item_id"];
                $product->product_id = $data["product_id"];
                $product->product_name = $data["product_name"];
                $product->quantity = $data["quantity"];
                $product->product_image = $data["product_image"];
                $product->product_price = $data["product_price"];
                $product->variant = $data["variant"];

                return $product;
            } else {
                return null; // Không tìm thấy sản phẩm
            }
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Truy xuất đơn hàng thất bại";
        }
    }


    // Thêm sản phẩm vào giỏ
    public function addProductToCart($userId, $productId, $quantity, $variant)
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
                $this->insertProduct($cartId, $productId, $quantity, $variant);
            }
        } else {
            $this->createNewCart($userId, $productId, $quantity, $variant);
        }
    }

    // Cập nhật số lượng sản phẩm trong giỏ
    public function updateQuantity($item_id, $quantity,)
    {
        try {
            // var_dump($quantity);
            $sql = "UPDATE cart_items SET quantity = $quantity WHERE item_id = $item_id;";
            $this->pdo->exec($sql);
            return 'ok';
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Cập nhập đơn hàng thất bại";
        }
    }

    // Thêm sản phẩm vào giỏ mới
    private function insertProduct($cartId, $productId, $quantity, $variant)
    {
        $sql = "INSERT INTO cart_items (cart_id, product_id, quantity, variant) VALUES (:cartId, :productId, :quantity, :variant)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':cartId' => $cartId, ':productId' => $productId, ':quantity' => $quantity, ':variant' => $variant]);
    }

    // Tạo giỏ mới cho người dùng
    private function createNewCart($userId, $productId, $quantity, $variant)
    {
        $sql = "INSERT INTO carts (user_id) VALUES (:userId)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':userId' => $userId]);
        $cartId = $this->pdo->lastInsertId();
        $this->insertProduct($cartId, $productId, $quantity, $variant);
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
    // public function removeProductFromCart($userId, $productId)
    // {
    //     $cartId = $this->getCartId($userId);


    //     if ($cartId) {
    //         $sql = "DELETE FROM cart_items WHERE cart_id = :cartId AND product_id = :productId";
    //         $stmt = $this->pdo->prepare($sql);
    //         $stmt->execute([':cartId' => $cartId, ':productId' => $productId]);
    //     }
    // }

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
