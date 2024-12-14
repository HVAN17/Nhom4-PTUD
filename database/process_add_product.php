<?php
require_once 'config.php'; // Kết nối cơ sở dữ liệu

// Bắt đầu session để lưu thông báo
session_start();

// Kiểm tra phương thức gửi dữ liệu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy thông tin từ form
    $name = htmlspecialchars(trim($_POST['name']));
    $code = htmlspecialchars(trim($_POST['code']));
    $price = htmlspecialchars(trim($_POST['price']));
    $quantity = htmlspecialchars(trim($_POST['quantity']));
    $category_id = htmlspecialchars(trim($_POST['category_id']));
    $description = htmlspecialchars(trim($_POST['description'] ?? ''));
    $imagePath = null;

    // Kiểm tra nếu có ảnh được tải lên
    if (!empty($_FILES['image']['name'])) {
        $targetDir = "uploads/";
        $imageFile = basename($_FILES['image']['name']);
        $targetFilePath = $targetDir . $imageFile;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                $imagePath = $imageFile;
            } else {
                die("Lỗi khi tải lên hình ảnh!");
            }
        } else {
            die("Định dạng file không hợp lệ!");
        }
    }

    // Thêm sản phẩm vào cơ sở dữ liệu
    $insertSql = "
        INSERT INTO products (name, code, price, quantity, category_id, description, image) 
        VALUES (:name, :code, :price, :quantity, :category_id, :description, :image)
    ";
    $insertStmt = $pdo->prepare($insertSql);

    if ($insertStmt->execute([
        ':name' => $name,
        ':code' => $code,
        ':price' => $price,
        ':quantity' => $quantity,
        ':category_id' => $category_id,
        ':description' => $description,
        ':image' => $imagePath,
    ])) {
        $_SESSION['message'] = "Thêm sản phẩm thành công!";
        header("Location: ../products.php");
        exit();
    } else {
        echo "Lỗi: Không thể thêm sản phẩm.";
    }
} else {
    die("Phương thức không được hỗ trợ.");
}
?>
