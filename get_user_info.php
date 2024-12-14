<?php
session_start();

$servername = "localhost";
$username = "root";  // Tài khoản MySQL (mặc định là root)
$password = "";  // Mật khẩu MySQL (mặc định là rỗng)
$dbname = "cocoon_db";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Chưa đăng nhập']);
    exit();
}

$user_id = $_SESSION['user_id'];

// Lấy thông tin từ bảng khachhang
$sql = "SELECT ho, ten, email, gioitinh, ngaysinh, diachi FROM khachhang WHERE id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    echo json_encode($user); // Trả về JSON cho frontend
} else {
    echo json_encode(['error' => 'Không tìm thấy khách hàng']);
}

$conn->close();
?>