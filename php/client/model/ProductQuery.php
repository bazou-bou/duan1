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

                array_push($danhSach, $product);
            }

            return $danhSach;
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Tìm tất cả thất bại";
        }
    }

    // Tìm sản phẩm theo ID
    public function find($id)
    {
        try {
            $sql = "SELECT p.*, c.name AS category_name FROM products p
                    LEFT JOIN categories c ON p.category_id = c.category_id
                    WHERE p.product_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                $product = new Product();
                $product->product_id = $data["product_id"];
                $product->name = $data["name"];
                $product->description = $data["description"];
                $product->price = $data["price"];
                $product->stock = $data["stock"];
                $product->img = $data["img"];
                $product->views = $data["views"];
                $product->category_id = $data["category_id"];

                return $product;
            }
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Tìm sản phẩm thất bại";
        }
    }

    // Thêm sản phẩm mới
    public function insert(Product $product)
    {
        try {
            $sql = "INSERT INTO products (name, price, img, description, stock, views, category_id) 
                    VALUES (:name, :price, :img, :description, :stock, :views, :category_id)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':name' => $product->name,
                ':price' => $product->price,
                ':img' => $product->img,
                ':description' => $product->description,
                ':stock' => $product->stock,
                ':views' => $product->views,
                ':category_id' => $product->category_id
            ]);

            return "ok";
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Thêm mới thất bại";
        }
    }

    // Cập nhật sản phẩm
    public function update(Product $product, $id)
    {
        try {
            $sql = "UPDATE products SET 
                    name = :name,
                    description = :description,
                    price = :price,
                    stock = :stock,
                    img = :img,
                    views = :views,
                    category_id = :category_id
                    WHERE product_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':name' => $product->name,
                ':description' => $product->description,
                ':price' => $product->price,
                ':stock' => $product->stock,
                ':img' => $product->img,
                ':views' => $product->views,
                ':category_id' => $product->category_id,
                ':id' => $id
            ]);

            return "ok";
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Cập nhật thất bại";
        }
    }

    // Tìm sản phẩm theo danh mục
    public function findCategory($category)
    {
        try {
            $sql = "SELECT p.*, c.name AS category_name FROM products p
                    LEFT JOIN categories c ON p.category_id = c.category_id
                    WHERE c.name = :category";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

                array_push($danhSach, $product);
            }

            return $danhSach;
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Tìm phân lớp thất bại";
        }
    }

    // Xóa sản phẩm
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM products WHERE product_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return "ok";
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Xóa thất bại";
        }
    }

    public function createUser(Users $product){
        try {
            $sql = "INSERT INTO `users` ( `username`, `password`, `email`) VALUES ( '$product->username', '$product->password', '$product->email')";
            $data = $this->pdo->exec($sql);
            if($data == "1"){
                return "ok";
            }

            //code...
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Thêm mới tài khoản thất bại";
        }
    }

    public function allUser(){
        try {
            $sql = "SELECT * FROM users";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsUser = [];
            foreach ($data as $value) {
                $product = new Users();
                $product->user_id = $value["user_id"];
                $product->username = $value["username"];
                $product->password = $value["password"];
                $product->email = $value["email"];
                $product->role = $value["role"];
                

                array_push($dsUser, $product);
            }

            return $dsUser;
        } catch (Exception $error) {
            echo "Lỗi " . $error->getMessage() . "<br>";
            echo "Danh sách tài khoản thất bại";
        }
    }
}
