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
                $product->status = $value["status"];

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
                $product->status = $value["status"];

                array_push($danhSach, $product);
            }

            return $danhSach;
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Tìm phân lớp thất bại";
        }
    }

    public function toggleStatus($id, $table, $field)
    {
        try {
            // Đảm bảo $id là số nguyên
            $id = (int)$id;

            // Tạo câu SQL động với bảng và cột được truyền từ bên ngoài
            $sql = "UPDATE `$table` 
                    SET `status` = CASE 
                        WHEN `status` = 0 THEN 1 
                        ELSE 0 
                    END 
                    WHERE `$field` = $id";

            // Thực thi câu truy vấn
            $data = $this->pdo->exec($sql);

            if ($data === 1) {
                return "ok";
            } else {
                return "Không có bản ghi nào được cập nhật.";
            }
        } catch (Exception $error) {
            // Log lỗi thay vì hiển thị trực tiếp
            error_log("Lỗi toggleStatus: " . $error->getMessage());
            return "Lỗi: Cập nhật trạng thái thất bại";
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
                $user->status = $value["status"]; // Assuming 'status' exists in the 'users'

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

    public function allComment()
    {
        try {
            $sql = "SELECT * FROM comments";
            $data = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            $dsComment = [];
            foreach ($data as $value) {

                $comment = new Comments();
                $comment->comment_id = $value["comment_id"];
                $comment->product_id = $value["product_id"];
                $comment->user_id = $value["user_id"];
                $comment->username = $value["username"];
                $comment->content = $value["content"];
                $comment->comment_date = $value["comment_date"];
                $comment->status = $value["status"];
                $dsComment[] = $comment;
            }
            return $dsComment;
        } catch (Exception $error) {
            echo "L��i: " . $error->getMessage() . "<br>";
            echo "Tìm tất cả bình luận thất bại";
        }
    }

    public function doanhthu()
    {
        try {
            $sql = "SELECT SUM(o.total) AS total_revenue FROM orders o";
            $data = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function donHang()
    {
        try {
            $sql = "SELECT COUNT(order_id) AS total_orders FROM orders";
            $result = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

            // Trả về tổng số người dùng
            return $result['total_orders'];
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function topKhachHang()
    {
        try {
            $sql = "SELECT u.username, COUNT(o.order_id) AS total_orders, SUM(o.total) AS total_spent 
                    FROM orders o 
                    JOIN users u ON o.user_id = u.user_id 
                    GROUP BY u.user_id 
                    ORDER BY total_spent DESC";
            $data = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);  // Đây là mảng các mảng, không phải đối tượng

            $topUsers = [];
            foreach ($data as $value) {
                $user = new topUser();
                $user->username = $value["username"];
                $user->total_orders = $value["total_orders"];
                $user->total_spent = $value["total_spent"];
                array_push($topUsers, $user);  // Thêm đối tượng vào mảng
            }
            return $topUsers;  // Đảm bảo đây là mảng các đối tượng topUser
        } catch (\Throwable $th) {
            // Error handling here
        }
    }
    public function totalUsers()
    {
        try {
            // Truy vấn SQL để đếm số lượng người dùng
            $sql = "SELECT COUNT(*) AS total_users FROM users";
            $result = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

            // Trả về tổng số người dùng
            return $result['total_users'];
        } catch (\Throwable $th) {
            // Xử lý lỗi
            return 0;
        }
    }

    public function revenueByMonth()
    {
        try {
            $sql = "SELECT
                        MONTH(o.order_date) AS month,
                        YEAR(o.order_date) AS year,
                        SUM(o.total) AS total_revenue
                    FROM orders o
                    WHERE o.order_date >= CURDATE() - INTERVAL 12 MONTH
                    GROUP BY YEAR(o.order_date), MONTH(o.order_date)
                    ORDER BY YEAR(o.order_date) DESC, MONTH(o.order_date) DESC";

            $data = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        } catch (\Throwable $th) {
            // Xử lý lỗi
            return [];
        }
    }

    public function revenueByYear()
    {
      
    try {
        $sql = "SELECT 
                    DATE(order_date) AS date, -- Lấy đầy đủ ngày, tháng, năm
                    YEAR(order_date) AS year,
                    MONTH(order_date) AS month,
                    SUM(order_price * quantity) AS total_revenue,
                    SUM(quantity) AS total_quantity
                FROM 
                    order_items
                GROUP BY 
                    DATE(order_date), YEAR(order_date), MONTH(order_date)
                ORDER BY 
                    DATE(order_date) DESC
                ";

            $data = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $data = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        } catch (\Throwable $th) {
            // Xử lý listring
            return [];
        }
        return $data;
    
}

    public function locDonHangTheoNam()
    {
        try {
            $sql = "SELECT 
                        YEAR(order_date) AS year,
                        MONTH(order_date) AS month,
                        COUNT(*) AS total_orders,  -- Đếm số lượng đơn hàng
                        SUM(order_price * quantity) AS total_revenue,
                        SUM(quantity) AS total_quantity
                    FROM 
                        order_items
                    GROUP BY 
                        YEAR(order_date), MONTH(order_date)
                    ORDER BY 
                        YEAR(order_date) DESC, MONTH(order_date) DESC";

            $data = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        } catch (\Throwable $th) {
            // Xử lý lỗi
            echo "Error: " . $th->getMessage();
        }
    }

    public function locTheoNgay($startDate, $endDate)
    {
        try {
            $sql = "
                SELECT 
                    YEAR(oi.order_date) AS year,
                    MONTH(oi.order_date) AS month,
                    SUM(oi.total) AS total_revenue
                FROM 
                    order_items oi
                JOIN 
                    orders o ON oi.order_id = o.order_id
                WHERE 
                    oi.order_date BETWEEN '$startDate' AND '$endDate'
                GROUP BY 
                    YEAR(oi.order_date), MONTH(oi.order_date)
                ORDER BY 
                    YEAR(oi.order_date) DESC, MONTH(oi.order_date) DESC
            ";

            // Truy vấn và lấy kết quả
            $data = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        } catch (\Throwable $th) {
            // Xử lý lỗi
            echo "Error: " . $th->getMessage();
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
                $product->status = $value["status"];
                $product->img = $value["img"];
                array_push($dsCtr, $product);
            }
            return $dsCtr;
        } catch (Exception $error) {
            //throw $th;
            echo "Lỗi " . $error->getMessage() . "<br>";
            echo "Lỗi danh sách danh mục";
        }
    }

    public function createCtr(categories $product)
    {
        try {
            $sql = "INSERT INTO `categories`(  `name`, `status`, `img`) VALUES ('" . $product->name . "','" . $product->status . "','" . $product->img . "')";
            $data = $this->pdo->exec($sql);
            if ($data == "1") {
                return "ok";
            }
        } catch (Exception $error) {
            echo "Lỗi " . $error->getMessage() . "<br>";
            echo "Thêm mới danh mục thất bại";
        }
    }

    public function updateCtr(categories $product, $id)
    {
        try {
            $sql = "UPDATE `categories` SET `name` = '{$product->name}',`status` = '{$product->status}' ,`img` = '{$product->img}' WHERE `category_id` = $id";


            $data = $this->pdo->exec($sql);

            if ($data === 1 || $data === 0) {
                return "ok";
            }
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Cập nhật danh mục thất bại thất bại";
        }
    }

    public function findCtr($id)
    {
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
    public function deleteCtr($id)
    {
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

    public function allOrder()
    {
        try {
            $sql = "SELECT * FROM `orders`";
            $data = $this->pdo->query($sql)->fetchAll();
            $dsachOrder = [];
            foreach ($data as $value) {
                $product = new Oder();
                $product->order_id = $value["order_id"];
                $product->user_id = $value["user_id"];
                $product->total = $value["total"];
                $product->status = $value["status"];
                $product->sdt = $value["sdt"];
                $product->name_custom = $value["name_custom"];
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
                $product = new OrderItem();
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

    public function allBanner()
    {
        try {
            $sql = "SELECT * FROM `banners`";
            $data = $this->pdo->query($sql)->fetchAll();

            $banners = [];
            foreach ($data as $row) {
                $banner = new Banner();
                $banner->id = $row["id"];
                $banner->image_path = $row["image_path"];
                $banner->title = $row["title"];
                $banner->status = $row["status"];
                $banners[] = $banner;
            }
            return $banners;
        } catch (Exception $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
    public function insertBanner(Banner $banner)
    {
        // try {
        //     $sql = "INSERT INTO `banners` (`image_path`, `title`, `status`) VALUES (:image_path, :title, :status)";
        //     $stmt = $this->pdo->prepare($sql);
        //     $stmt->execute([
        //         ':image_path' => $banner->image_path,
        //         ':title' => $banner->title,
        //         ':status' => $banner->status
        //     ]);
        //     return "ok";
        // } catch (Exception $e) {
        //     echo "ERROR: " . $e->getMessage();
        // }

        try {
            $sql = "INSERT INTO `banners` (`image_path`, `title`, `status`) VALUES ('" . $banner->image_path . "','" . $banner->title . "','" . $banner->status . "');";
            $data = $this->pdo->exec($sql);

            if ($data == "1") {
                return "ok";
            }
        } catch (Exception $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function deleteBanner($id)
    {
        try {
            $sql = "DELETE FROM `banners` WHERE `id` = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            return "ok";
        } catch (Exception $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function updateBanner(Banner $banner, $id)
    {
        try {
            $sql = "UPDATE `banners` SET `image_path` = '{$banner->image_path}', `title` = '{$banner->title}', `status` = '{$banner->status}' WHERE `id` = $id";
            $data = $this->pdo->exec($sql);
            if ($data === 1 || $data === 0) {
                return "ok";
            }
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Cập nhật danh mục thất bại thất bại";
        }
    }

    public function findBanner($id)
    {
        try {
            $sql = "SELECT * FROM `banners` WHERE `id` = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            $row = $stmt->fetch();

            if ($row) {
                $banner = new Banner();
                $banner->id = $row['id'];
                $banner->image_path = $row['image_path'];
                $banner->title = $row['title'];
                $banner->status = $row['status'];
                return $banner;
            }
            return null;
        } catch (Exception $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function allContact()
    {
        try {
            $sql = "SELECT * FROM `contact`";
            $data = $this->pdo->query($sql)->fetchAll();

            $contacts = [];
            foreach ($data as $row) {
                $contact = new Contact();
                $contact->contact_id = $row["contact_id"];
                $contact->contact_name = $row["contact_name"];
                $contact->contact_email = $row["contact_email"];
                $contact->contact_phone = $row["contact_phone"];
                $contact->contact_mess = $row["contact_mess"];
                $contact->created_at = $row['created_at'];
                $contact->contact_status = $row["contact_status"];
                $contacts[] = $contact;
            }
            return $contacts;
        } catch (Exception $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function findContact($contact_id)
    {
        try {
            $sql = "SELECT * FROM `contacts` WHERE `contact_id` = :contact_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':contact_id' => $contact_id]);
            $row = $stmt->fetch();

            if ($row) {
                $contact = new Contact();
                $contact->contact_id = $row['contact_id'];
                $contact->contact_name = $row['contact_name'];
                $contact->contact_email = $row['contact_email'];
                $contact->contact_phone = $row["contact_phone"];
                $contact->contact_mess = $row['contact_mess'];
                $contact->created_at = $row['created_at'];
                $contact->contact_status = $row['contact_status'];
                return $contact;
            }
            return null;
        } catch (Exception $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function deleteContact($id)
    {
        try {
            $sql = "DELETE FROM `contact` WHERE `contact_id` = $id";
            $data = $this->pdo->exec($sql);
            if ($data === 1) {
                return "ok";
            }
            return $data;
        } catch (Exception $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }


    public function allNew()
    {
        try {
            $sql = "SELECT * FROM `news`";
            $data = $this->pdo->query($sql)->fetchAll();

            $news = [];
            foreach ($data as $row) {
                $new = new News();
                $new->new_id = $row["new_id"];
                $new->title = $row["title"];
                $new->content = $row["content"];
                $new->new_img = $row["new_img"];
                $new->status = $row["status"];
                $news[] = $new;
            }
            return $news;
        } catch (Exception $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function findNew($new_id)
    {
        try {
            $sql = "SELECT * FROM `news` WHERE `new_id` = :new_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':new_id' => $new_id]);
            $row = $stmt->fetch();

            if ($row) {
                $new = new News();
                $new->new_id = $row["new_id"];
                $new->title = $row["title"];
                $new->content = $row["content"];
                $new->new_img = $row["new_img"];
                $new->status = $row["status"];

                return $new;
            }
            return null;
        } catch (Exception $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function deleteNew($id)
    {
        try {
            $sql = "DELETE FROM `news` WHERE `new_id` = $id";
            $data = $this->pdo->exec($sql);
            if ($data === 1) {
                return "ok";
            }
            return $data;
        } catch (Exception $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function insertNew(News $new)
    {
        try {
            $sql = "INSERT INTO `news` (`new_id`, `title`, `content`, `new_img`, `status`) 
            VALUES (NULL, '$new->title', '$new->content', '$new->new_img', '$new->status');";
            $data = $this->pdo->exec($sql);
            // $data = 1 nếu thực hiện thành công

            if ($data === 1) {
                return "ok";
            }
        } catch (Exception $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function updateNew(News $new, $id)
    {
        try {
            $sql = "UPDATE `news` SET `title`='$new->title',`content`='$new->content',`new_img`='$new->new_img',`status`='$new->status' WHERE `new_id`=$id";
            $data = $this->pdo->exec($sql);
            if ($data === 1 || $data === 0) {
                return "ok";
            }
        } catch (Exception $error) {
            echo "Lỗi: " . $error->getMessage() . "<br>";
            echo "Cập nhật danh mục thất bại thất bại";
        }
    }
}