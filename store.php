

<?php
// Cấu hình kết nối đến MySQL
$servername = "localhost";
$username = "root"; // Thay đổi với username của bạn
$password = ""; // Thay đổi với password của bạn
$dbname = "cocoon_db"; // Tên cơ sở dữ liệu của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

// Nhận action từ yêu cầu GET hoặc POST
$action = isset($_GET['action']) ? $_GET['action'] : (isset($_POST['action']) ? $_POST['action'] : '');

// Kiểm tra action và gọi hàm tương ứng
switch ($action) {
    case 'get_products':
        // Lấy danh sách sản phẩm
        $products = getProducts();
       
        break;

    case 'add_product':
        // Thêm sản phẩm mới
        $name = $_POST['name'] ?? '';
        $code = $_POST['code'] ?? '';
        $price = $_POST['price'] ?? 0;
        $quantity = $_POST['quantity'] ?? 0;
        $description = $_POST['description'] ?? '';
        $image = $_POST['image'] ?? '';

        if ($name && $code && $price && $quantity) {
            $result = addProduct($name, $code, $price, $quantity, $description, $image);
            echo json_encode(["status" => $result ? "success" : "error", "message" => $result ? "Product added successfully" : "Failed to add product"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        }
        break;

   case 'update_product':
        // Cập nhật sản phẩm
        $id = $_POST['id'] ?? '';
        $name = $_POST['name'] ?? '';
        $code = $_POST['code'] ?? '';
        $price = $_POST['price'] ?? 0;
        $quantity = $_POST['quantity'] ?? 0;
        $description = $_POST['description'] ?? '';

        if ($id && $name && $code && $price && $quantity) {
            $result = updateProduct($id, $name, $code, $price, $quantity, $description);
            echo json_encode(["status" => $result ? "success" : "error", "message" => $result ? "Product updated successfully" : "Failed to update product"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Missing data"]);
        }
        break;


    case 'transaction':
        // Xử lý giao dịch nhập kho/xuất kho
        $product_id = $_POST['product_id'] ?? 0;
        $quantity_change = $_POST['quantity_change'] ?? 0;
        $transaction_type = $_POST['transaction_type'] ?? '';

        if ($product_id && $quantity_change && $transaction_type) {
            $result = handleTransaction($product_id, $quantity_change, $transaction_type);
            echo json_encode(["status" => $result ? "success" : "error", "message" => $result ? "Transaction successful" : "Transaction failed"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        }
        break;

    default:
        echo json_encode(["status" => "error", "message" => "Invalid action"]);
        break;
}

// Hàm lấy danh sách sản phẩm
function getProducts() {
    global $conn;
    
    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Câu lệnh SQL
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    // Kiểm tra kết quả truy vấn
    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    // Lấy tất cả sản phẩm
    $products = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
     
    // Gửi kết quả dưới dạng JSON
    echo json_encode($products);
}


// Hàm thêm sản phẩm mới
function addProduct($name, $code, $price, $quantity, $description, $image) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO products (name, code, price, quantity, description, image) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdiis", $name, $code, $price, $quantity, $description, $image);
    return $stmt->execute();
}

// Hàm cập nhật sản phẩm
function updateProduct($id, $name, $code, $price, $quantity) {
    global $conn;
    $sql = "UPDATE products SET name=?, code=?, price=?, quantity=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdii", $name, $code, $price, $quantity, $id);
    return $stmt->execute();
}


// Hàm xử lý giao dịch nhập kho/xuất kho
function handleTransaction($product_id, $quantity_change, $transaction_type) {
    global $conn;
    
    // Cập nhật số lượng trong kho
    $sql = "SELECT quantity FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        $new_quantity = ($transaction_type == 'in') ? $product['quantity'] + $quantity_change : $product['quantity'] - $quantity_change;
        
        // Cập nhật số lượng
        $update_sql = "UPDATE products SET quantity = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ii", $new_quantity, $product_id);
        $update_stmt->execute();

        // Lưu giao dịch
        $transaction_sql = "INSERT INTO transactions (product_id, quantity_change, transaction_type) VALUES (?, ?, ?)";
        $transaction_stmt = $conn->prepare($transaction_sql);
        $transaction_stmt->bind_param("iis", $product_id, $quantity_change, $transaction_type);
        $transaction_stmt->execute();

        return true;
    }

    return false;
}

$conn->close();
?>
