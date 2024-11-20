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

                $danhSach[] = $product;
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

                $danhSach[] = $comment;
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
                $danhSach[] = $product;
            }

            return $danhSach;
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Tìm kiếm thất bại";
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
    public function allUser()
    {
        try {
            $sql = "SELECT * FROM users";
            $data = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            $dsUser = [];
            foreach ($data as $value) {
                $product = new Users();
                $product->user_id = $value["user_id"];
                $product->username = $value["username"];
                $product->password = $value["password"];
                $product->email = $value["email"];
                $product->role = $value["role"];

                $dsUser[] = $product;
            }

            return $dsUser;
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Danh sách tài khoản thất bại";
        }
    }
}
