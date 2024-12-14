<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cocoon_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";  // Biến để lưu thông báo

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Kiểm tra token có hợp lệ không
    $sql = "SELECT id FROM users WHERE reset_token = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Hiển thị form để thay đổi mật khẩu
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];

            if ($new_password === $confirm_password) {
                // Mã hóa mật khẩu mới
                $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                // Cập nhật mật khẩu mới vào cơ sở dữ liệu và xóa token
                $sql_update = "UPDATE users SET password = ?, reset_token = NULL WHERE reset_token = ?";
                $stmt_update = $conn->prepare($sql_update);
                $stmt_update->bind_param("ss", $new_password_hash, $token);
                $stmt_update->execute();

                $message = "Mật khẩu của bạn đã được thay đổi thành công. Bạn có thể đăng nhập ngay.";
            } else {
                $message = "Mật khẩu và xác nhận mật khẩu không trùng khớp!";
            }
        }
    } else {
        $message = "Token không hợp lệ hoặc đã hết hạn.";
    }
}
?>

<!-- Form reset mật khẩu -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Đặt lại mật khẩu">
    <title>Đặt lại mật khẩu</title>
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="css/theme.css" rel="stylesheet" media="all">

    <script>
        // Function to display messages
        function displayMessage(message, type) {
            let messageDiv = document.createElement("div");
            messageDiv.classList.add("alert");
            if (type === "success") {
                messageDiv.classList.add("alert-success");
            } else {
                messageDiv.classList.add("alert-danger");
            }
            messageDiv.textContent = message;
            document.getElementById("message-container").appendChild(messageDiv);
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="login-wrap">
            <div class="login-content">
                <div style="text-align: center;">
                    <a href="#">
                        <img src="images/logo/logo-2.png" alt="Cocoon" width="300">
                    </a>
                </div>
                <!-- Display message if set -->
                <div id="message-container">
                    <?php if ($message != ""): ?>
                        <script>
                            displayMessage("<?php echo $message; ?>", "<?php echo (strpos($message, 'không hợp lệ') !== false || strpos($message, 'không trùng khớp') !== false) ? 'error' : 'success'; ?>");
                        </script>
                    <?php endif; ?>
                </div>
                <!-- Form to reset password -->
                <form action="reset_password.php?token=<?php echo $_GET['token']; ?>" method="post">
                    <div class="form-group">
                        <label for="new_password">Mật khẩu mới</label>
                        <input class="au-input au-input--full" type="password" name="new_password" id="new_password" placeholder="Mật khẩu mới" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Xác nhận mật khẩu mới</label>
                        <input class="au-input au-input--full" type="password" name="confirm_password" id="confirm_password" placeholder="Xác nhận mật khẩu mới" required>
                    </div>
                    <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Đặt lại mật khẩu</button>
                    <div class="text-center">
                        <a class="au-btn au-btn--block au-btn--blue" href="login.html">Đăng nhập</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
