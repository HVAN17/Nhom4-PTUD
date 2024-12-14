<?php
// Kết nối đến cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "root";  // Tài khoản mặc định của XAMPP
$password = "";      // Mật khẩu mặc định của XAMPP
$dbname = "cocoon_db"; // Tên cơ sở dữ liệu bạn đã tạo

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form đăng ký
$ho = $_POST['ho'];
$ten = $_POST['ten'];
$ngaysinh = $_POST['ngaysinh'];
$gioitinh = $_POST['gioitinh'];
$email = $_POST['email'];
$matkhau = $_POST['matkhau'];

// Mã hóa mật khẩu
$matkhau_hash = password_hash($matkhau, PASSWORD_DEFAULT);

// Chuẩn bị câu lệnh SQL để thêm người dùng vào cơ sở dữ liệu
$sql = "INSERT INTO khachhang (ho, ten, email, matkhau, gioitinh, ngaysinh) 
        VALUES ('$ho', '$ten', '$email', '$matkhau_hash', '$gioitinh', '$ngaysinh')";

// Thực thi câu lệnh SQL
if ($conn->query($sql) === TRUE) {
    echo "Đăng ký thành công!";
    header("Location: signin.html"); // Chuyển hướng đến trang đăng nhập
    exit();
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}
$sql = "SELECT DATE(created_at) AS registration_date, COUNT(*) AS total_users
        FROM khachhang
        GROUP BY DATE(created_at)
        ORDER BY DATE(created_at) ASC";
$result = $conn->query($sql);

// Lưu dữ liệu vào mảng
$dates = [];
$user_counts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dates[] = $row['registration_date']; // Ngày đăng ký
        $user_counts[] = $row['total_users']; // Số lượng khách hàng đăng ký trong ngày
    }
}



// Lưu dữ liệu vào session
session_start();
$_SESSION['dates'] = $dates;
$_SESSION['user_counts'] = $user_counts;

// Đóng kết nối
$conn->close();
?>
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

// Truy vấn số lượng khách hàng đăng ký theo ngày
$sql = "SELECT DATE(created_at) AS registration_date, COUNT(*) AS total_users
        FROM khachhang
        GROUP BY DATE(created_at)
        ORDER BY DATE(created_at) ASC";
$result = $conn->query($sql);

$dates = [];
$user_counts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dates[] = $row['registration_date']; // Ngày đăng ký
        $user_counts[] = $row['total_users']; // Số lượng khách hàng đăng ký trong ngày
    }
}

// Đóng kết nối
$conn->close();

// Trả về dữ liệu JSON
echo json_encode([
    'dates' => $dates,
    'user_counts' => $user_counts
]);
?>

