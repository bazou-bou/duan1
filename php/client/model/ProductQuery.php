<?php
require_once __DIR__ . '/../../confix.php';

class ProductQuery
{
    public $pdo;

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

    public function __destruct()
    {
        $this->pdo = null;
    }

    // Lấy tất cả sản phẩm kèm tên danh mục
    public function all()
    {
        try {
            $sql = "SELECT p.*, c.name AS category_name FROM products p
                    LEFT JOIN categories c ON p.category_id = c.category_id";
            $data = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            $danhSach = [];
            foreach ($data as $value) {
                $product = new Product();
                $product->product_id = $value["product_id"];
                $product->name = $value["name"];
                $product->description = $value["description"];
                $product->price = $value["price"];
                $product->stock = $value["stock"];
                $product->img = $value["img"];
                $product->views = $value["views"];
                $product->category = $value["category_name"];
                $product->status = $value["status"];
                if ($product->status == 1) {
                $danhSach[] = $product;
                }
            }

            return $danhSach;
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Tìm tất cả thất bại";
        }
    }

    // Tìm sản phẩm theo ID
    // Tìm sản phẩm theo ID
    public function find($id)
    {
        try {
            // Tăng số lượt xem mỗi khi xem chi tiết sản phẩm
            $sqlUpdateViews = "UPDATE products SET views = views + 1 WHERE product_id = $id";
            $this->pdo->exec($sqlUpdateViews);  // Thực thi câu lệnh cập nhật

            // Lấy thông tin sản phẩm
            $sql = "SELECT p.*, c.name AS category_name FROM products p
                LEFT JOIN categories c ON p.category_id = c.category_id
                WHERE p.product_id = $id";
            $data = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                $product = new Product();
                $product->product_id = $data["product_id"];
                $product->name = $data["name"];
                $product->description = $data["description"];
                $product->price = $data["price"];
                $product->stock = $data["stock"];
                $product->img = $data["img"];
                $product->views = $data["views"];  // Lượt xem đã được cập nhật
                $product->category = $data["category_name"];  // Thêm category_name ở đây
                return $product;
            }
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Tìm sản phẩm thất bại";
        }
    }

    //lấy sản phẩm hot nhất 
    public function getHotProducts()
    {
        try {
            $sql = "SELECT p.*, c.name AS category_name FROM products p
                    LEFT JOIN categories c ON p.category_id = c.category_id
                    ORDER BY p.views DESC";
            
            // Thực hiện truy vấn
            $data = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    
            $danhSach = [];
            foreach ($data as $value) {
                $product = new Product();
                $product->product_id = $value["product_id"];
                $product->name = $value["name"];
                $product->description = $value["description"];
                $product->price = $value["price"];
                $product->stock = $value["stock"];
                $product->img = $value["img"];
                $product->views = $value["views"];
                $product->category = $value["category_name"];
                $product->status = $value["status"];
                if ($product->status == 1) {
                $danhSach[] = $product;
                }
            }
    
            // Trả về danh sách sản phẩm
            return [
                'products' => $danhSach,
            ];
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Lấy sản phẩm hot nhất thất bại";
            return [
                'products' => [],
            ];
        }
    }
    
    public function allCatories()
    {
        try {
            $sql = "SELECT * FROM `categories`";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsCtr = [];

            foreach ($data as $value) {
                $product = new categories();
                $product->category_id = $value["category_id"];
                $product->name = $value["name"];
                $product->img=$value["img"];
                $product->status = $value["status"];
                if ($product->status == 1) {
                    $dsCtr[] = $product;
                }
            }
            return $dsCtr;
        } catch (Exception $error) {
            //throw $th;
            echo "Lỗi " . $error->getMessage() . "<br>";
            echo "Lỗi danh sách danh mục";
        }
    }
    


    // Thêm mới bình luận public function addComment($comment)
    public function addComment($comment)
    {
        try {
            // Escape ký tự đặc biệt trong content để tránh SQL Injection
            $content = $this->pdo->quote($comment->content);
    
            // Kiểm tra nếu username không có (trong trường hợp người dùng chưa đăng nhập)
            if (empty($comment->username)) {
                // Đặt username mặc định là 'Anonymous' hoặc lấy từ session
                $comment->username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Anonymous';
            }
    
            // Nếu chưa đăng nhập, user_id sẽ là NULL
            $comment->user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
    
            // Xây dựng câu lệnh SQL với cột comment_date thay vì date
            $sql = "INSERT INTO comments (product_id, user_id, username, content, comment_date)
                    VALUES (:product_id, :user_id, :username, :content, :date)";
    
            // Chuẩn bị câu lệnh SQL
            $stmt = $this->pdo->prepare($sql);
    
            // Thực thi câu lệnh SQL với tham số đã chuẩn bị
            $stmt->execute([
                ':product_id' => $comment->product_id,
                ':user_id' => $comment->user_id, // Chắc chắn có user_id hợp lệ hoặc NULL
                ':username' => $comment->username,
                ':content' => $content,
                ':date' => $comment->comment_date // Dùng comment_date thay vì date
            ]);
    
            echo "Bình luận đã được thêm thành công!";
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage();
            echo "Thêm bình luận thất bại";
        }
    }

    //tìn bình luận theo id sản phẩm 
    public function findComment($id){
        try {
            $sql = "SELECT * FROM comments WHERE product_id = $id";
            $data = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            $danhSach = [];
            foreach ($data as $value) {
                $comment = new Comments();
                $comment->product_id = $id;
                $comment->user_id = $value["user_id"];
                $comment->username = $value["username"];
                $comment->content = $value["content"];
                $comment->comment_date = $value["comment_date"]; 
                $comment->status=$value["status"];
                if ($comment->status == 1) {
                    $danhSach[] = $comment;
                    }

            }
            return $danhSach;
        } catch (Exception $error) {
            echo "Listring: " . $error->getMessage() . "<br>";
            echo "Tiền bình luận thất bại";
        }
    }
    
    
    



    // Tìm sản phẩm theo tên
    public function searchProduct($searchName)
    {
        try {
            $sql = "SELECT p.*, c.name AS category_name 
                    FROM products p
                    LEFT JOIN categories c ON p.category_id = c.category_id 
                    WHERE p.name LIKE '%{$searchName}%'";
            $data = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    
            $danhSach = [];
            foreach ($data as $value) {
                $product = new Product();
                $product->product_id = $value["product_id"];
                $product->name = $value["name"];
                $product->description = $value["description"];
                $product->price = $value["price"];
                $product->stock = $value["stock"];
                $product->img = $value["img"];
                $product->views = $value["views"];
                $product->category = $value["category_name"];
                $product->status = $value["status"];
                if ($product->status == 1) {
                $danhSach[] = $product;
                }
            }
    
            // Trả về danh sách sản phẩm và số lượng
            return [
                'products' => $danhSach,
                'count' => count($danhSach)  // Đếm số lượng sản phẩm
            ];
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Tìm kiếm thất bại";
            return [
                'products' => [],
                'count' => 0  // Nếu có lỗi, trả về số lượng là 0
            ];
        }
    }
    

    // Tìm sản phẩm theo danh mục
    public function findCategory($category)
    {
        try {
            $sql = "SELECT p.*, c.name AS category_name FROM products p
                    LEFT JOIN categories c ON p.category_id = c.category_id
                    WHERE c.name = '{$category}'";
            $data = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            $danhSach = [];
            foreach ($data as $value) {
                $product = new Product();
                $product->product_id = $value["product_id"];
                $product->name = $value["name"];
                $product->description = $value["description"];
                $product->price = $value["price"];
                $product->stock = $value["stock"];
                $product->img = $value["img"];
                $product->views = $value["views"];
                $product->category = $value["category_name"];

                $danhSach[] = $product;
            }

            return $danhSach;
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Tìm phân lớp thất bại";
        }
    }

    // Thêm người dùng
    public function createUser(Users $product)
    {
        try {
            $sql = "INSERT INTO `users` (`username`, `password`, `email`) 
                    VALUES ('{$product->username}', '{$product->password}', '{$product->email}')";
            $this->pdo->exec($sql);

            return "ok";
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Thêm mới tài khoản thất bại";
        }
    }

    // Lấy tất cả người dùng

    public function allUser() {
        try {
            $sql = "SELECT * FROM users";
            $data = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            $dsUser = [];
            foreach ($data as $value) {
                $user = new Users();
                $user->user_id = $value["user_id"];
                $user->username = $value["username"];
                $user->password = $value["password"];
                $user->email = $value["email"];
                $user->role = $value["role"];
                $user->status = $value["status"];

                $dsUser[] = $user;
            }

            return $dsUser;
        } catch (Exception $error) {
            error_log("Lỗi khi lấy danh sách user: " . $error->getMessage());
            return [];
        }
    }

    public function allBanner() {
        try {
            $sql = "SELECT * FROM `banners`";
            $data = $this->pdo->query($sql)->fetchAll();

            $banners = [];
            foreach ($data as $value) {
                $banner = new Banner(); 
                $banner->id = $value["id"];
                $banner->image_path = $value["image_path"];
                $banner->title = $value["title"];
                $banner->status = $value["status"];
                if ($banner->status == 1) {
                $banners[] = $banner;
                }
            }

            return $banners;
        } catch (Exception $error) {
            error_log("Lỗi khi lấy danh sách banner: " . $error->getMessage());
            return [];
        }
    }

    public function pay($id, Pay $product)
{
    try {
        // Start a transaction to ensure both queries are executed atomically
        $this->pdo->beginTransaction();

        // Prepare the first SQL query to insert the order into `orders`
        $sql1 = "INSERT INTO `orders` (`user_id`, `total`, `status`, `sdt`, `name_custom`, `address`)
                 SELECT 
                     c.`user_id`, 
                     SUM(p.`price` * ci.`quantity`), 
                     1, 
                     :sdt, 
                     :name_custom, 
                     :address
                 FROM `carts` c
                 JOIN `cart_items` ci ON c.`cart_id` = ci.`cart_id`
                 JOIN `products` p ON ci.`product_id` = p.`product_id`
                 WHERE c.`user_id` = :user_id
                 GROUP BY c.`user_id`";

        // Prepare the statement and bind parameters
        $stmt1 = $this->pdo->prepare($sql1);
        $stmt1->bindParam(':sdt', $product->sdt);
        $stmt1->bindParam(':name_custom', $product->name_custom);
        $stmt1->bindParam(':address', $product->address);
        $stmt1->bindParam(':user_id', $id, PDO::PARAM_INT);
        $stmt1->execute();

        // Get the last inserted order ID
        $order_id = $this->pdo->lastInsertId();

        // Prepare the second SQL query to insert items into `order_items`
        $sql2 = "INSERT INTO `order_items` (`order_id`, `product_id`, `quantity`, `order_img`, `order_date`, `order_price`, `address`, `name_custom`, `sdt`)
                 SELECT 
                     :order_id, 
                     ci.`product_id`, 
                     ci.`quantity`, 
                     p.`img`, 
                     CURDATE(), 
                     p.`price`, 
                     :address, 
                     :name_custom, 
                     :sdt
                 FROM `cart_items` ci
                 JOIN `products` p ON ci.`product_id` = p.`product_id`
                 WHERE ci.`cart_id` IN (SELECT `cart_id` FROM `carts` WHERE `user_id` = :user_id)";

        // Prepare the statement and bind parameters
        $stmt2 = $this->pdo->prepare($sql2);
        $stmt2->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt2->bindParam(':address', $product->address);
        $stmt2->bindParam(':name_custom', $product->name_custom);
        $stmt2->bindParam(':sdt', $product->sdt);
        $stmt2->bindParam(':user_id', $id, PDO::PARAM_INT);
        $stmt2->execute();

        // Commit the transaction
        $this->pdo->commit();

        return "ok";
    } catch (Exception $error) {
        // Rollback the transaction in case of an error
        $this->pdo->rollBack();

        error_log("Lỗi chức năng thanh toán ở query: " . $error->getMessage());
        return "error";
    }
}


public function clientOrder($id)
    {
        try {
            $sql = "SELECT 
    o.order_id,
    o.total,
    o.status,
    o.address,
    u.username AS customer_name,
    o.sdt,
    o.name_custom
FROM orders o
LEFT JOIN users u ON o.user_id = u.user_id
WHERE o.user_id = $id";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsachOrder = [];
            foreach ($data as $value) {
                $product = new OrderCl();
                $product->order_id = $value["order_id"];
                $product->total = $value["total"];
                $product->status = $value["status"];
                $product->sdt = $value["sdt"];
                $product->name_custom = $value["name_custom"];
                // $product->username = $value["username"];
                $product->address = $value["address"];
                array_push($dsachOrder, $product);
            }
            return $dsachOrder;
        } catch (Exception $error) {
            echo "Lỗi " . $error->getMessage() . "<br>";
            echo "Show list thất bại";
        }
    }

    public function findOrder($id)
    {
        try {
            $sql = "SELECT 
            o.*, 
            oi.order_item_id, 
            oi.product_id, 
            oi.quantity, 
            oi.order_date, 
            oi.order_img, 
            p.name AS product_name, 
            p.price AS product_price, 
            p.img AS product_img 
        FROM 
        orders o
            JOIN 
        order_items oi ON o.order_id = oi.order_id
            JOIN 
        products p ON oi.product_id = p.product_id
            WHERE 
        o.order_id = $id ";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsItem = [];

            foreach ($data as $value) {
                $product = new OrderItemCl();
                $product->order_item_id = $value["order_item_id"];
                $product->order_id = $value["order_id"];
                $product->product_id = $value["product_id"];
                $product->quantity = $value["quantity"];
                $product->order_img = $value["order_img"];
                $product->order_date = $value["order_date"];
                // $product->order_price = $value["order_price"];
                $product->address = $value["address"];
                $product->name_custom = $value["name_custom"];
                $product->sdt = $value["sdt"];
                $product->product_name = $value["product_name"];
                $product->product_price = $value["product_price"];
                $product->product_img = $value["product_img"];
                $product->status = $value["status"];
                array_push($dsItem, $product);
            }

            return $dsItem;
        } catch (Exception $error) {
            echo "Lỗi " . $error->getMessage() . "<br>";
            echo "Show chi tiết sản phẩm thất bại ";
        }
    }


}
