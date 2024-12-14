<?php
// Kết nối cơ sở dữ liệu
require_once 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Lấy ID bài viết từ URL

    try {
        // Lấy thông tin bài viết để xóa ảnh
        $sql = "SELECT image_path FROM posts WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $post = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($post) {
            // Xóa ảnh nếu tồn tại
            $imagePath = __DIR__ . '/uploads/' . $post['image_path'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Xóa bài viết khỏi cơ sở dữ liệu
            $deleteSql = "DELETE FROM posts WHERE id = :id";
            $deleteStmt = $pdo->prepare($deleteSql);
            $deleteStmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($deleteStmt->execute()) {
                header("Location: ../admin_blog.php?message=Bài viết đã được xóa thành công!");
                exit();
            } else {
                header("Location: ../admin_blog.php?message=Lỗi khi xóa bài viết!");
                exit();
            }
        } else {
            header("Location: ../admin_blog.php?message=Bài viết không tồn tại!");
            exit();
        }
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
} else {
    header("Location: ../addblog_list.php?message=Yêu cầu không hợp lệ!");
    exit();
}
?>
