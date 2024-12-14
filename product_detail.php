<?php
require 'database/config.php'; // Kết nối cơ sở dữ liệu
session_start();

// Kiểm tra nếu có ID sản phẩm được truyền vào
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Chuyển ID thành kiểu số nguyên để tránh lỗi bảo mật

    // Truy vấn sản phẩm từ cơ sở dữ liệu
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $product = $stmt->fetch();

    if (!$product) {
        die("Sản phẩm không tồn tại!");
    }
} else {
    die("ID sản phẩm không hợp lệ!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['name']); ?> - Chi tiết sản phẩm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: Arial, sans-serif; }
        .container { margin-top: 50px; }
        .product-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .product-img { width: 100%; height: auto; border-radius: 10px; }
        .btn-cart { background-color: #007bff; margin-top: 20px; color: #fff; }
        .btn-cart:hover { background-color: #0056b3; }
    </style>
</head>
<body>
<?php
    include('header.php');
         ?>

        </header>

               

<div class="container">
    <div class="product-card">
        <div class="row">
            <div class="col-md-6">
                <img src="database/uploads/<?= htmlspecialchars($product['image']); ?>" class="product-img" alt="<?= htmlspecialchars($product['name']); ?>">
            </div>
            <div class="col-md-6">
                <h1><?= htmlspecialchars($product['name']); ?></h1>
                <p><strong>Giá:</strong> <?= number_format($product['price'], 0, ',', '.'); ?>₫</p>
                <p><strong>Số lượng còn lại:</strong> <?= htmlspecialchars($product['quantity']); ?></p>
                <p><strong>Mô tả:</strong> <?= nl2br(htmlspecialchars($product['description'])); ?></p>
                <!-- Thanh điều chỉnh số lượng -->
                <div class="input-group mb-3" style="width: 150px;">
                    <button class="btn btn-outline-secondary minus-btn" type="button">-</button>
                    <input type="number" class="form-control quantity-input" value="1" min="1" max="<?= $product['quantity']; ?>">
                    <button class="btn btn-outline-secondary plus-btn" type="button">+</button>
                </div>
                <!-- Nút thêm vào giỏ hàng -->
                <button class="btn btn-warning btn-add-to-cart" 
                        data-id="<?= $product['id']; ?>" 
                        data-name="<?= htmlspecialchars($product['name']); ?>" 
                        data-price="<?= $product['price']; ?>">
                    Thêm vào giỏ hàng
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Tăng/Giảm số lượng
        const minusButtons = document.querySelectorAll('.minus-btn');
        const plusButtons = document.querySelectorAll('.plus-btn');
        const quantityInputs = document.querySelectorAll('.quantity-input');

        minusButtons.forEach((button, index) => {
            button.addEventListener('click', () => {
                const input = quantityInputs[index];
                if (input.value > 1) {
                    input.value = parseInt(input.value) - 1;
                }
            });
        });

        plusButtons.forEach((button, index) => {
            button.addEventListener('click', () => {
                const input = quantityInputs[index];
                const max = parseInt(input.max);
                if (input.value < max) {
                    input.value = parseInt(input.value) + 1;
                }
            });
        });

        // Xử lý thêm vào giỏ hàng
        const addToCartButtons = document.querySelectorAll('.btn-add-to-cart');
        addToCartButtons.forEach((button, index) => {
            button.addEventListener('click', async function () {
                const productId = this.getAttribute('data-id');
                const productName = this.getAttribute('data-name');
                const productPrice = this.getAttribute('data-price');
                const quantity = quantityInputs[index].value;

                try {
                    const response = await fetch('cart_handler.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: `action=add_to_cart&product_id=${productId}&quantity=${quantity}&product_name=${encodeURIComponent(productName)}&product_price=${productPrice}`
                    });
                    const data = await response.json();
                    if (data.status === 'success') {
                        alert(data.message);
                        updateCartCount();
                    } else {
                        alert(data.message);
                    }
                } catch (error) {
                    console.error('Lỗi:', error);
                }
            });
        });

        // Hàm cập nhật số lượng giỏ hàng
        async function updateCartCount() {
            try {
                const response = await fetch('cart_handler.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'action=get_cart_count'
                });
                const data = await response.json();
                const cartCount = document.getElementById('cart-count');
                if (cartCount) {
                    cartCount.textContent = data.count;
                }
            } catch (error) {
                console.error('Lỗi cập nhật giỏ hàng:', error);
            }
        }
    });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php include('admin/footer.php'); ?>
</body>
</html>
