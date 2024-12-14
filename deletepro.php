<?php
require_once 'database/config.php'; // Kết nối cơ sở dữ liệu

// Bắt đầu session để lưu thông báo
session_start();

// Kiểm tra xem ID có được gửi qua URL không
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $product_id = intval($_GET['id']); // Lấy ID sản phẩm

    // Truy vấn để lấy thông tin sản phẩm
    $query = "SELECT image FROM products WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$product_id]);
    $product = $stmt->fetch();

    if ($product) {
        // Xóa ảnh sản phẩm nếu tồn tại
        $imagePath = __DIR__ . '/../uploads/' . $product['image']; // Đường dẫn ảnh
        if (file_exists($imagePath) && !empty($product['image'])) {
            if (!unlink($imagePath)) {
                $_SESSION['error'] = "Không thể xóa ảnh sản phẩm. Vui lòng kiểm tra quyền file!";
                header('Location: http://localhost/Admin/CoolAdmin/products.php');
                exit;
            }
        }

        // Xóa sản phẩm khỏi cơ sở dữ liệu
        $delete_query = "DELETE FROM products WHERE id = ?";
        $delete_stmt = $pdo->prepare($delete_query);
        if ($delete_stmt->execute([$product_id])) {
            // Chuyển hướng về danh sách sản phẩm với thông báo thành công
            $_SESSION['message'] = "Sản phẩm đã được xóa thành công.";
            header('Location: http://localhost/Admin/CoolAdmin/products.php');
            exit;
        } else {
            $_SESSION['error'] = "Lỗi khi xóa sản phẩm. Vui lòng thử lại.";
            header('Location: http://localhost/Admin/CoolAdmin/products.php');
            exit;
        }
    } else {
        $_SESSION['error'] = "Sản phẩm không tồn tại.";
        header('Location: http://localhost/Admin/CoolAdmin/products.php');
        exit;
    }
} else {
    $_SESSION['error'] = "ID sản phẩm không hợp lệ.";
    header('Location: http://localhost/Admin/CoolAdmin/products.php');
    exit;
}
?>
