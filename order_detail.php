<?php
session_start();

// Kết nối cơ sở dữ liệu
$host = 'localhost';
$usernameDB = 'root';
$passwordDB = '';
$database = 'cocoon_db';

$conn = new mysqli($host, $usernameDB, $passwordDB, $database);

if ($conn->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Lấy ID đơn hàng từ URL
if (isset($_GET['id'])) {
    $orderId = $_GET['id'];

    // Lấy thông tin chi tiết đơn hàng từ cơ sở dữ liệu
    $query = "SELECT * FROM orders WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $orderId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $order = $result->fetch_assoc();
    } else {
        echo "<script>alert('Không tìm thấy đơn hàng.'); window.location.href='order.php';</script>";
    }
} else {
    echo "<script>alert('ID đơn hàng không hợp lệ.'); window.location.href='order.php';</script>";
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
<?php include 'headeradmin.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <style>
        /* Nền và font chữ */
        body {
            font-family: Arial, sans-serif; /* Font Arial */
            background-color:rgb(206, 203, 203); /* Nền xung quanh màu xám nhạt */
            margin: 0;
            padding: 0;
        }

        .table-responsive {
           
            margin: 70px 500px;
            margin-left: 400px; /* Đẩy bảng cách lề trái 150px */
            padding: 20px;
            background-color: #fff; /* Nền trắng */
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            
        }

        /* Bảng */
        .table-data2 {
            width: 150%; /* Chiếm toàn bộ chiều rộng */
            border-collapse: collapse;
            border: 1px solid #ddd; /* Viền màu xám cho toàn bảng */
        
        }

        .table-data2 thead th {
            background-color:rgb(231, 176, 24); /* Màu vàng */
            color: white;
            font-size: 14px;
            text-transform: uppercase;
            padding: 10px;
            text-align: left;
        }

        .table-data2 tbody td {
            padding: 10px;
            font-size: 14px;
            color: #333;
            border-bottom: 1px solid #ddd;
        }

        .table-data2 tbody tr:nth-child(even) {
            background-color: #f9f9f9 /* Màu xám nhạt */
        }

        .table-data2 tbody tr:hover {
            background-color: #fbe4a1; /* Hiệu ứng hover */
        }

        h3.title-5 {
            color: rgb(231, 176, 24);
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 20px;
            text-align: center;
        }

        .btn-primary {
            display: inline-block;
            padding: 8px 15px;
            color: white;
            background-color:rgb(184, 140, 21);
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            margin-top: 20px;
        }

        .btn-primary:hover {
            background-color: #e6b800; /* Vàng đậm hơn khi hover */
        }
    </style>
</head>

<body>
    <div class="table-responsive">
        <h3 class="title-5">Chi tiết Đơn Hàng #<?php echo $order['id']; ?></h3>

        <table class="table table-data2">
            <thead>
                <tr>
                    <th>Thông tin</th>
                    <th>Chi tiết</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Mã đơn</td>
                    <td>#<?php echo $order['id']; ?></td>
                </tr>
                <tr>
                    <td>Ngày đặt</td>
                    <td><?php echo $order['created_at']; ?></td>
                </tr>
                <tr>
                    <td>Khách hàng</td>
                    <td><?php echo $order['name']; ?></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><?php echo $order['address']; ?></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td><?php echo $order['phone']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $order['email']; ?></td>
                </tr>
                <tr>
                    <td>Tổng tiền</td>
                    <td><?php echo number_format($order['total_amount'], 0, ',', '.'); ?> VND</td>
                </tr>
                <tr>
                    <td>Phương thức thanh toán</td>
                    <td><?php echo ucfirst($order['payment_method']); ?></td>
                </tr>
                <tr>
                    <td>Tình trạng</td>
                    <td><?php echo ucfirst($order['status']); ?></td>
                </tr>
            </tbody>
        </table>

        <a href="order.php" class="btn-primary">Quay lại</a>
    </div>
</body>

</html>
