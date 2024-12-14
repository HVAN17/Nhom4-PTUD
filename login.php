<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cocoon_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sử dụng prepared statement để tránh SQL injection
    $sql = "SELECT id, username, email, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            echo "success"; // Trả về chuỗi "success" nếu đăng nhập thành công
        } else {
            echo "Mật khẩu không chính xác!"; // Thông báo lỗi mật khẩu
        }
    } else {
        echo "Email không tồn tại!"; // Thông báo lỗi email
    }
    $stmt->close();
}
$conn->close();
?>