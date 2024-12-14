<?php
session_start();

// Kiểm tra người dùng đã đăng nhập chưa
if (!isset($_SESSION['user_id'])) {
    echo json_encode(["error" => "Vui lòng đăng nhập để xem lịch sử đơn hàng."]);
    exit();
}

$user_id = $_SESSION['user_id']; // Lấy email người dùng từ session

// Kết nối cơ sở dữ liệu
$host = 'localhost';       // Tên máy chủ
$username = 'root';        // Tên người dùng
$password = '';            // Mật khẩu
$database = 'cocoon_db';   // Tên cơ sở dữ liệu

$conn = new mysqli($host, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die(json_encode(["error" => "Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error]));
}

// Truy vấn đơn hàng của người dùng
$query = "SELECT id, created_at, name, address, phone, email, total_amount, payment_method, status FROM orders WHERE user_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $user_id); // Sử dụng email để lọc đơn hàng
$stmt->execute();
$result = $stmt->get_result();

// Kiểm tra nếu có dữ liệu
if ($result->num_rows > 0) {
    $orders = [];
    while ($row = $result->fetch_assoc()) {
        $orders[] = [
            'order_number' => $row['id'],
            'order_date' => $row['created_at'],
            'customer_name' => $row['name'], // Tên khách hàng
            'address' => $row['address'], // Địa chỉ
            'phone' => $row['phone'], // Số điện thoại
            'email' => $row['email'], // Email
            'total_amount' => $row['total_amount'], // Tổng tiền
            'payment_method' => $row['payment_method'], // Phương thức thanh toán
            'status' => ucfirst($row['status']) // Tình trạng đơn hàng
        ];
    }
    echo json_encode($orders);
} else {
    echo json_encode(["error" => "Không có đơn hàng nào."]);
}

$stmt->close();
$conn->close();
?>
