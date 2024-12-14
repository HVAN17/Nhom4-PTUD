<?php
// Kết nối cơ sở dữ liệu
require_once 'database/config.php';

// Xử lý xóa khách hàng
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Xóa khách hàng khỏi cơ sở dữ liệu
    $sql = "DELETE FROM khachhang WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Khách hàng đã được xóa!";
    } else {
        $_SESSION['error'] = "Lỗi khi xóa khách hàng.";
    }

    // Quay lại danh sách khách hàng
    header("Location: adminusers.php");
    exit();
} else {
    $_SESSION['error'] = "ID khách hàng không hợp lệ.";
    header("Location: adminusers.php");
    exit();
}
