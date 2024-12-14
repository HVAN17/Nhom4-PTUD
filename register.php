<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cocoon_db";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Kiểm tra mật khẩu có trùng khớp không
    if ($password != $confirm_password) {
        echo "Mật khẩu và xác nhận mật khẩu không khớp!";
        exit;
    }

    // Kiểm tra xem email đã tồn tại chưa
    $sql = "SELECT id FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "Email này đã được sử dụng!";
        exit;
    }

    // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Chèn dữ liệu người dùng vào cơ sở dữ liệu
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Đăng ký thành công! Bạn có thể đăng nhập ngay bây giờ.";
        header("Location: login.html");  // Chuyển hướng đến trang login sau khi đăng ký thành công
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
