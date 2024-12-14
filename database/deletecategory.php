<?php
session_start(); // Bắt đầu session
require_once 'config.php'; // Kết nối cơ sở dữ liệu

// Kiểm tra xem có ID danh mục cần xóa không
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Lấy ID danh mục từ URL

    try {
        // Truy vấn để lấy thông tin danh mục (bao gồm ảnh)
        $sql = "SELECT image FROM categories WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $category = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($category) {
            // Kiểm tra và xóa ảnh nếu có
            $imagePath = __DIR__ . '/../uploads/' . $category['image']; // Đường dẫn tới ảnh
            if (file_exists($imagePath)) {
                unlink($imagePath);  // Xóa ảnh khỏi thư mục uploads
            }

            // Truy vấn xóa danh mục khỏi cơ sở dữ liệu
            $deleteSql = "DELETE FROM categories WHERE id = :id";
            $deleteStmt = $pdo->prepare($deleteSql);
            $deleteStmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($deleteStmt->execute()) {
                // Nếu xóa thành công, lưu thông báo vào session và chuyển hướng
                $_SESSION['success'] = "Danh mục đã được xóa thành công!";
                header("Location: ../admindanhmuc.php");
                exit();
            } else {
                // Nếu xóa không thành công
                $_SESSION['error'] = "Lỗi khi xóa danh mục!";
                header("Location: ../admindanhmuc.php");
                exit();
            }
        } else {
            // Nếu danh mục không tồn tại
            $_SESSION['error'] = "Danh mục không tồn tại!";
            header("Location: ../admindanhmuc.php");
            exit();
        }
    } catch (PDOException $e) {
        // Nếu có lỗi trong quá trình thực thi SQL
        $_SESSION['error'] = "Lỗi: " . $e->getMessage();
        header("Location: ../admindanhmuc.php");
        exit();
    }
} else {
    // Nếu không có ID trong URL
    $_SESSION['error'] = "Yêu cầu không hợp lệ!";
    header("Location: ../admindanhmuc.php");
    exit();
}
?>
