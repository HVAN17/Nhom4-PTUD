<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cocoon_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Kiểm tra email tồn tại
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $token = bin2hex(random_bytes(16)); // Tạo token
        $expire_time = date("Y-m-d H:i:s", strtotime("+1 hour"));

        // Lưu token vào database
        $sql = "UPDATE users SET reset_token = ?, reset_token_expiry = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $token, $expire_time, $email);
        $stmt->execute();

        // Gửi email
        $mail = new PHPMailer(true);
        try {
            // Cấu hình SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'vanngo.31221024226@st.ueh.edu.vn'; // Thay bằng email của bạn
            $mail->Password = 'eant vyal fvlp cnck'; // Thay bằng mật khẩu ứng dụng của bạn
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Cấu hình email gửi đi
            $mail->setFrom('your_email@gmail.com', 'Cocoon');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Reset Password';
            $mail->Body = "Click vào liên kết sau để đặt lại mật khẩu của bạn: <a href='http://localhost/CoolAdmin/reset_password.php?token=$token'>Đặt lại mật khẩu</a>";

            $mail->send();
            echo "<script>alert('Email đã được gửi!');</script>";
        } catch (Exception $e) {
            echo "<script>alert('Không thể gửi email. Lỗi: {$mail->ErrorInfo}');</script>";
        }
    } else {
        echo "<script>alert('Email không tồn tại!');</script>";
    }
}


// Kiểm tra nếu email đã được gửi thành công
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Gửi email logic...
        $message = "Chúng tôi đã gửi email cho bạn. Vui lòng kiểm tra email để đặt lại mật khẩu.";
    } else {
        $message = "Email không tồn tại!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <style>
        /* Reset mặc định */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Cấu trúc chính của trang */
body {
    font-family: 'Arial', sans-serif;
    background-color: #121212;
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Container của thông báo */
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
}

/* Thiết kế của message box */
.message-box {
    text-align: center;
    background-color: white;
    border-radius: 15px;
    padding: 40px;
    width: 400px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Logo Spotify */
.logo {
    width: 120px;
    margin-bottom: 20px;
}

/* Tiêu đề thông báo */
.message-heading {
    font-size: 28px;
    margin-bottom: 20px;
    color: black;
}

/* Nội dung thông báo */
.message-body {
    font-size: 16px;
    margin-bottom: 30px;
    color: gray;
}

/* Các nút */
.buttons {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.btn {
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    text-align: center;
    display: block;
    width: 100%;
}

.btn-back {
    background-color: #1db954;
    color: #fff;
    border: 1px solid #1db954;
    transition: background-color 0.3s;
}

.btn-back:hover {
    background-color: #1ed760;
}

.btn-edit {
    background-color: #fff;
    color: #1db954;
    border: 1px solid #1db954;
    transition: background-color 0.3s;
}

.btn-edit:hover {
    background-color: #f0f0f0;
}

    </style>

    <div class="container">
        <div class="message-box">
            <img src="images/logo/logo-2.png" alt=" Logo" class="logo">
            <h1 class="message-heading">Check your inbox</h1>
            <p class="message-body">
                <?php echo htmlspecialchars($message); ?>
            </p>
            <div class="buttons">
                <a href="login.html" class="btn btn-back">Quay lại đăng nhập</a>
            </div>
        </div>
    </div>
</body>
</html>
