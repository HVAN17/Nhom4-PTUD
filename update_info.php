
<?php
session_start();
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cocoon_db"; // Đổi tên cơ sở dữ liệu của bạn ở đây

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    echo "Chưa đăng nhập";
    exit();
}

$user_id = $_SESSION['user_id'];
$ho = $_POST['ho'];
$ten = $_POST['ten'];
$matkhau = $_POST['matkhau'];
$gioitinh = $_POST['gioitinh'];
$ngaysinh = $_POST['ngaysinh'];
$diachi = $_POST['diachi'];

// Hash mật khẩu nếu thay đổi
$matkhau_query = "";
if (!empty($matkhau)) {
    $hashed_password = password_hash($matkhau, PASSWORD_DEFAULT);
    $matkhau_query = ", matkhau = '$hashed_password'";
}

// Cập nhật thông tin
$sql = "UPDATE khachhang 
        SET ho = '$ho', ten = '$ten', gioitinh = '$gioitinh', ngaysinh = '$ngaysinh', diachi = '$diachi' 
        $matkhau_query 
        WHERE id = '$user_id'";

if ($conn->query($sql) === TRUE) {
    echo "Cập nhật thành công!";
    header("Location: dashboard.html");
    exit();
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>