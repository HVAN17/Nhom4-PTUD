<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root"; // Thay bằng username của bạn
$password = ""; // Thay bằng password của bạn
$dbname = "cocoon_db"; // Tên database của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Câu truy vấn lấy dữ liệu sản phẩm
$sql = "SELECT id, name, code, price, sale_price, quantity, description, image, created_at, album_images FROM products";
$result = $conn->query($sql);

// Mảng chứa các sản phẩm
$products = [];

if ($result->num_rows > 0) {
    // Lặp qua các sản phẩm và thêm vào mảng
    while($row = $result->fetch_assoc()) {
        // Thêm từng sản phẩm vào mảng
        $products[] = $row;
    }
} else {
    echo "No products found";
}

// Đóng kết nối
$conn->close();

// Trả về kết quả dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($products);
?>
