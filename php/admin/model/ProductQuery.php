<?php
// Include the confix.php file using the relative path
//php/confix.php -> php/admin/model/ProductQuery.php
require_once __DIR__ . '/../../confix.php';


class ProductQuery
{
    public $pdo;

    // Constructor: Initializes PDO connection using confix.php
    public function __construct()
    {
        try {
            // Use the DatabaseConfig class defined in confix.php
            $databaseConfig = new DatabaseConfig();
            $this->pdo = $databaseConfig->getConnection();
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Kết nối database thất bại";
        }
    }

    public function __destruct()
    {
        $this->pdo = null;
    }

    // Find all products with category names
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

    // Find a single product by ID
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

    // Insert a new product
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

    // Update an existing product
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

    // Find products by category
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

    // Delete a product
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

    // Additional methods for categories...

    public function allUser()
    {
        try {
            // Query to get all users
            $sql = "SELECT * FROM users";
                    
            // Execute the query and fetch all user data
            $data = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    
            // Initialize an array to store User objects
            $danhSach = [];
    
            // Loop through each result and create a User object
            foreach ($data as $value) {
                // Create a new User object (assuming you have a User class)
                $user = new User(); 
                $user->user_id = $value["user_id"];  // Assuming 'user_id' exists in the 'users' table
                $user->username = $value["username"];        // Assuming 'name' exists in the 'users' table
                $user->password = $value["password"];      // Assuming 'email' exists in the 'users' table
                $user->email = $value["email"];        // Assuming 'role' exists in the 'users' table
                $user->role = $value["role"];    // Assuming 'status' exists in the 'users' table
    
                // Add the User object to the danhSach array
                $danhSach[] = $user;
            }
    
            return $danhSach;
    
        } catch (Exception $error) {
            // Log the error message for debugging
            error_log("Lỗi: " . $error->getMessage());
            return "Tìm tất cả người dùng thất bại";
        }
    }
    
    

    public function allCatories(){
        try {
            $sql = "SELECT * FROM `categories`";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsCtr = [];

            foreach($data as $value){
                $product = new categories();
                $product->category_id = $value["category_id"];
                $product->name = $value["name"];
                $product->status = $value["status"];
                array_push($dsCtr, $product);
            }
            return $dsCtr;
            
        } catch (Exception $error) {
            //throw $th;
            echo "Lỗi " . $error->getMessage() . "<br>";
            echo "Lỗi danh sách danh mục";
        }
    }

    public function createCtr(categories $product){
        try {
            $sql = "INSERT INTO `categories`(  `name`, `status`) VALUES ('" . $product->name . "','" . $product->status . "')";
            $data = $this->pdo->exec($sql);
            if ($data == "1") {
                return "ok";
            }
        } catch (Exception $error) {
            echo "Lỗi " . $error->getMessage() . "<br>";
            echo "Thêm mới danh mục thất bại";
        }
    }

    public function updateCtr(categories $product, $id){
        try {
            $sql = "UPDATE `categories` SET `name` = '{$product->name}',`status` = '{$product->status}' WHERE `category_id` = $id";
           

            $data = $this->pdo->exec($sql);

            if ($data === 1 || $data === 0) {
                return "ok";
            }
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Cập nhật danh mục thất bại thất bại";
        }
    }

    public function findCtr($id){
        try {
            $sql = "SELECT * FROM `categories` WHERE `category_id` = $id";
            $data = $this->pdo->query($sql)->fetch();
            if ($data !== false) {
                $product = new categories();
                $product->category_id = $data["category_id"];
                $product->name = $data["name"];
                $product->status = $data["status"];
                

                return $product;
            }
        } catch (Exception $error) {
            echo "Lỗi " . $error->getMessage() . "<br>";
            echo "Tìm Danh mục thất bại";
        }
    }
    public function deleteCtr($id){
        try {
            $sql = "DELETE FROM `categories` WHERE category_id =$id";
            $data = $this->pdo->exec($sql);
            if ($data === 1) {
                return "ok";
            }
        } catch (Exception $error) {
            echo "Lỗi " . $error->getMessage() . "<br>";
            echo "Xóa thất bại";
        }
    }

}
?>
