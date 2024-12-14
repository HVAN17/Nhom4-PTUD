<?php
// Biến trạng thái để theo dõi quá trình xác nhận đơn hàng
$order_confirmed = false;

// Kiểm tra phương thức thanh toán 'COD'
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['payment_method']) && $_POST['payment_method'] === 'COD') {
    // Xử lý đơn hàng (lưu đơn hàng vào cơ sở dữ liệu, v.v.)
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $payment_method = $_POST['payment_method'];

    // Cập nhật trạng thái đơn hàng đã xác nhận
    $order_confirmed = true;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận Đặt Hàng</title>
    <style>
        /* Thiết kế giao diện tone đen và nâu sắm */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color:rgb(255, 255, 255);
            color:rgb(99, 81, 81);
        }

        .payment-form, .order-details {
            margin: 40px auto;
            padding: 20px;
            background-color:rgb(237, 220, 109);
            border-radius: 10px;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        .payment-form h2, .order-details h2 {
            color:rgb(113, 76, 76);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            background-color:rgb(255, 255, 255);
            color:rgb(49, 28, 28);
        }

        button, .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 5px;
            border: none;
            border-radius: 5px;
            background-color: #795548;
            color: #f5f5f5;
            text-decoration: none;
            cursor: pointer;
            font-size: 1em;
        }

        button:hover, .btn:hover {
            background-color: #5d4037;
        }

        .order-actions a {
            margin: 5px;
        }
    </style>
</head>
<body>

    <!-- Header -->

    <?php include('header.php'); ?>


    <?php if (!$order_confirmed): ?>
    <!-- Nếu đơn hàng chưa được xác nhận, hiển thị form -->
    <div class="payment-form">
        <h2>Xác nhận Đặt Hàng và Thanh Toán Khi Nhận Hàng</h2>
        <form method="POST" action="order-confirmation.php">
            <div>
                <label for="name">Họ và tên:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="phone">Số điện thoại:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div>
                <label for="address">Địa chỉ giao hàng:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div>
                <label for="payment_method">Phương thức thanh toán:</label>
                <select name="payment_method" id="payment_method">
                    <option value="COD">Thanh toán khi nhận hàng</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Xác nhận đặt hàng</button>
        </form>
    </div>
    <?php else: ?>
    <!-- Nếu đơn hàng đã được xác nhận, ẩn form và hiển thị thông tin và các tuỳ chọn -->
    <div class="order-details">
        <h2>Thông tin Đơn Hàng</h2>
        <p><strong>Tên:</strong> <?php echo htmlspecialchars($name); ?></p>
        <p><strong>Số điện thoại:</strong> <?php echo htmlspecialchars($phone); ?></p>
        <p><strong>Địa chỉ:</strong> <?php echo htmlspecialchars($address); ?></p>
        <p><strong>Phương thức thanh toán:</strong> <?php echo htmlspecialchars($payment_method); ?></p>

        <!-- Các nút để người dùng thay đổi hoặc huỷ đơn hàng -->
        <div class="order-actions">
            <a href="change-order.php" class="btn">Đổi Đơn Hàng</a>
            <a href="cancel-order.php" class="btn">Hủy Đơn Hàng</a>
        </div>

        <!-- Nút quay lại trang chủ -->
        <div class="order-actions">
            <a href="index.php" class="btn">Tiếp Tục Mua Sắm</a>
        </div>
    </div>
    <?php endif; ?>

 
    <?php include('admin/footer.php'); ?>
</body>
</html>
