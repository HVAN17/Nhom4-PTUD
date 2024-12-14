<?php
session_start();
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="images/logo/logo_1.png" rel="shortcut icon">
    
    <style>
        body {
            background-color:rgb(255, 255, 254);
            color: #5f4b3c;
            font-family: 'Arial', sans-serif;
        }
        h1 {
            color: #5f4b3c;
            font-size: 36px;
            text-align: center;
            margin-top: 50px;
            margin-bottom: 30px;
        }
        .table {
            background-color:rgb(208, 180, 69);
            border: 1px solidrgb(98, 53, 40);
            color: #5f4b3c;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .table th {
            background-color:rgb(93, 57, 47);
            color: #ffffff;
            font-weight: bold;
        }
        .table td {
            vertical-align: middle;
        }
        .quantity-input {
            width: 80px;
            text-align: center;
            border: 1px solid #c07b68;
            border-radius: 4px;
        }
        .remove-item {
            background-color:rgb(207, 190, 90);
            color: #ffffff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .remove-item:hover {
            background-color: #c07b68;
        }
        .total-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color:rgb(249, 249, 249);
            padding: 20px;
            border: 1px solid #c07b68;
            border-radius: 8px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .total-section strong {
            font-size: 20px;
        }
        .btn-checkout {
            background-color: #5f4b3c;
            color:rgb(216, 197, 104);
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .btn-checkout:hover {
            background-color: #c07b68;
        }
        .empty-cart {
            text-align: center;
            color: #5f4b3c;
            font-size: 18px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>

    <div class="container mt-5">
        <h1>Giỏ hàng</h1>
        <?php if (!empty($cart)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; $index = 1; ?>
                    <?php foreach ($cart as $product_id => $item): ?>
                        <?php $subtotal = $item['price'] * $item['quantity']; ?>
                        <?php $total += $subtotal; ?>
                        <tr>
                            <td><?= $index++; ?></td>
                            <td><?= htmlspecialchars($item['name']); ?></td>
                            <td><?= number_format($item['price'], 0, ',', '.'); ?>₫</td>
                            <td>
                                <input type="number" class="quantity-input" data-id="<?= $product_id; ?>" value="<?= $item['quantity']; ?>" min="1">
                            </td>
                            <td><?= number_format($subtotal, 0, ',', '.'); ?>₫</td>
                            <td>
                                <button class="remove-item" data-id="<?= $product_id; ?>">Xóa</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="total-section">
                <strong>Tổng tiền: <?= number_format($total, 0, ',', '.'); ?>₫</strong>
                <a href="checkout.php" class="btn-checkout">Thanh toán</a>
            </div>
        <?php else: ?>
            <p class="empty-cart">Giỏ hàng trống!</p>
        <?php endif; ?>
    </div>

    <script>
        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('change', function () {
                const productId = this.dataset.id;
                const quantity = this.value;

                fetch('cart_handler.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `action=update_quantity&product_id=${productId}&quantity=${quantity}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert(data.message);
                        location.reload();
                    } else {
                        alert(data.message);
                    }
                });
            });
        });

        document.querySelectorAll('.remove-item').forEach(button => {
            button.addEventListener('click', function () {
                const productId = this.dataset.id;

                fetch('cart_handler.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `action=remove_from_cart&product_id=${productId}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert(data.message);
                        location.reload();
                    } else {
                        alert(data.message);
                    }
                });
            });
        });
    </script>

    <?php include('admin/footer.php'); ?>
</body>
</html>
