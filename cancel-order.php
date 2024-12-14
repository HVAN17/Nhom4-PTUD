<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hủy Đơn Hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        .cancel-order-form {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .cancel-order-form h2 {
            color: #3e2723;
            text-align: center;
            margin-bottom: 20px;
        }

        .cancel-order-form p {
            font-size: 1rem;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .btn-danger {
            background-color: #b71c1c;
            color: #fff;
            border: none;
        }

        .btn-danger:hover {
            background-color: #d32f2f;
        }

        .btn-secondary {
            background-color: #795548;
            color: #fff;
            margin-top: 10px;
        }

        .btn-secondary:hover {
            background-color: #a1887f;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <?php include('header.php'); ?>

    <div class="cancel-order-form">
        <h2>Hủy Đơn Hàng</h2>
        <p>Chúng tôi rất tiếc khi bạn muốn hủy đơn hàng. Vui lòng chọn lý do hủy:</p>

        <form method="POST" action="process-cancel.php">
            <div class="form-group">
                <label for="cancel-reason">Lý do hủy:</label>
                <select id="cancel-reason" name="cancel_reason" required>
                    <option value="Đặt nhầm sản phẩm">Đặt nhầm sản phẩm</option>
                    <option value="Thay đổi ý định">Thay đổi ý định</option>
                    <option value="Thời gian giao hàng lâu">Thời gian giao hàng lâu</option>
                    <option value="Tìm được giá rẻ hơn">Tìm được giá rẻ hơn</option>
                    <option value="Lý do khác">Lý do khác</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-danger">Xác nhận Hủy</button>
            </div>
        </form>

        <a href="order-confirmation.php" class="btn btn-secondary">Quay lại</a>
    </div>

    <!-- Footer -->
    <?php include('admin/footer.php'); ?>
</body>
</html>
