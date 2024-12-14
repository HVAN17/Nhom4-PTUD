
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hủy đơn hàng thành công</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Định nghĩa màu sắc */
        body {
            background-color: #f8f5f2;
            font-family: Arial, sans-serif;
        }
        
        .container {
            margin-top: 50px;
        }
        .success-box {
            background-color: #dda15e; /* Nâu sẫm */
            color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            background-color: #4b3832; /* Nâu đen */
            color: #ffcb69; /* Vàng */
            border: 1px solid #ffcb69;
        }
        .btn-custom:hover {
            background-color: #ffcb69; /* Vàng */
            color: #4b3832; /* Nâu đen */
        }
    </style>
</head>
<body>

<!-- Header -->
<?php include('header.php'); ?>


<!-- Nội dung chính -->
<div class="container text-center">
    <div class="success-box">
        <h1 class="mb-4">Xác nhận hủy đơn thành công!</h1>
        <p>Đơn hàng của bạn đã được hủy. Nếu cần hỗ trợ, vui lòng liên hệ đội ngũ chăm sóc khách hàng.</p>
        <div class="mt-4">
            <a href="index.php" class="btn btn-custom btn-lg">Quay lại Trang chủ</a>
            <a href="cancel-order.php" class="btn btn-custom btn-lg">Hủy đơn hàng khác</a>
        </div>
    </div>
</div>

<!-- Tải Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php include('admin/footer.php'); ?>
</body>
</html>
