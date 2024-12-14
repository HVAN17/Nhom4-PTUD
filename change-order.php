<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi Đơn Hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        .change-order-section {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .change-order-section h2 {
            color: #3e2723;
            text-align: center;
            margin-bottom: 20px;
        }

        .change-order-section p {
            font-size: 1rem;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            margin: 5px 0;
        }

        .btn-primary {
            background-color: #4caf50;
            color: #fff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #66bb6a;
        }

        .btn-secondary {
            background-color: #795548;
            color: #fff;
        }

        .btn-secondary:hover {
            background-color: #a1887f;
        }

    </style>
</head>
<body>
<?php include('header.php'); ?>

    <div class="change-order-section">
        <h2>Đổi Đơn Hàng</h2>
        <p>Để đổi sản phẩm, vui lòng chọn sản phẩm mới từ trang sản phẩm.</p>

        <a href="shop-grid-left.php" class="btn btn-primary">Chuyển đến Trang Sản phẩm</a>
        <a href="order-confirmation.php" class="btn btn-secondary">Quay lại</a>
    </div>

    <!-- Footer -->
    <?php include('admin/footer.php'); ?>
</body>
</html>
