<?php
// Kết nối tới cơ sở dữ liệu
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Xử lý upload ảnh
    $image = $_FILES['image'];
    $imageName = $image['name'];
    $imageTmpName = $image['tmp_name'];
    $imageError = $image['error'];

    if ($imageError === 0) {
        $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageExt, $allowedExts)) {
            // Tạo tên mới cho ảnh
            $newImageName = uniqid('', true) . "." . $imageExt;
            $imageDestination = __DIR__ . '/uploads/' . $newImageName;

            // Di chuyển ảnh vào thư mục uploads
            if (move_uploaded_file($imageTmpName, $imageDestination)) {
                // Lưu thông tin bài viết vào cơ sở dữ liệu
                $sql = "INSERT INTO posts (title, content, image_path) VALUES (:title, :content, :image_path)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':content', $content);
                $stmt->bindParam(':image_path', $newImageName);

                if ($stmt->execute()) {
                    echo "Bài viết đã được đăng thành công!";
                    header('Location: ../admin_blog.php'); // Điều hướng sau khi lưu thành công
                    exit();
                } else {
                    echo "Đã có lỗi khi lưu bài viết!";
                }
            } else {
                echo "Có lỗi khi upload ảnh!";
            }
        } else {
            echo "Định dạng ảnh không hợp lệ!";
        }
    } else {
        echo "Có lỗi khi tải ảnh!";
    }
}
