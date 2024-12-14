<?php 
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "cocoon_db"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$error_message = ""; // Biến để chứa thông báo lỗi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM khachhang WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['matkhau'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['ho'] . " " . $user['ten'];
            header("Location: index_new.php"); 
            exit();
        } else {
            $error_message = "Mật khẩu không đúng.";
        }
    } else {
        $error_message = "Tài khoản không tồn tại.";
    }
    $stmt->close();
}

// Đóng kết nối
$conn->close();

if (!empty($error_message)) {
    // Hiển thị thông báo lỗi và quay lại trang signin.html
    echo "<script>
        alert('$error_message');
        window.location.href = 'signin.html';
    </script>";
    exit();
}
?>