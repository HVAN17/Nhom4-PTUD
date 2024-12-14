<?php
require 'database/config.php'; // Adjust the path if necessary

if (isset($_GET['query'])) {
    $searchQuery = htmlspecialchars($_GET['query']);
    $stmt = $pdo->prepare("SELECT products.*, categories.name AS category_name FROM products LEFT JOIN categories ON products.category_id = categories.id WHERE products.name LIKE :query OR products.description LIKE :query");
    $stmt->execute(['query' => "%$searchQuery%"]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $results = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="images/logo/logo-favicon.png" rel="shortcut icon">
    <title>CoCoon</title>


    <link rel="stylesheet" href="css/vendor.css">

    <!--====== Utility-Spacing: lấy định dạng css từ file này ======-->
    <link rel="stylesheet" href="css/utility.css">

    <!--====== App: lấy định dạng css từ file này ======-->
    <link rel="stylesheet" href="css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h10 {
            font-size: 20px;
            color:rgb(163, 152, 58);
            margin-bottom: 25px;
            margin-top: 80px; /* Adjusted spacing to ensure better distance from the header */

        }
        .search-results {
            margin-top: 40px;
        }
    
    </style>
</head>
<body>
<header>
    <?php
    include('header.php');
         ?>    
</header>
<div class="container">
    <h10>Kết quả tìm kiếm</h10>
    <div class="search-results row is-grid-active">
        <?php if (!empty($results)): ?>
            <?php foreach ($results as $product): ?>
                <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                    <div class="product-m">
                        <div class="product-m__thumb">
                            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product_detail.php?id=<?= htmlspecialchars($product['id']) ?>">
                                <img class="aspect__img" src="database/uploads/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                            </a>
                        </div>
                        <div class="product-m__content">
                            <div class="product-m__name">
                                <a href="product_detail.php?id=<?= htmlspecialchars($product['id']) ?>">
                                    <?= htmlspecialchars($product['name']) ?>
                                </a>
                            </div>
                            <div class="product-m__price">
                                <?= number_format($product['price'], 0, ',', '.') ?>₫
                            </div>
                            <div class="product-m__quick-look">
                            </div>
                            <div class="product-m__add-cart">
                                <a href="javascript:void(0)" 
                                   class="btn--e-brand" 
                                   data-id="<?= htmlspecialchars($product['id']) ?>" 
                                   data-name="<?= htmlspecialchars($product['name']) ?>" 
                                   data-price="<?= htmlspecialchars($product['price']) ?>">
                                   Thêm vào giỏ hàng
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Không tìm thấy kết quả nào.</p>
        <?php endif; ?>
    </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const productList = document.querySelector('.row.is-grid-active'); // Vùng chứa sản phẩm

    // Hàm gắn sự kiện "Thêm vào giỏ hàng"
    function attachAddToCartHandlers() {
        const addToCartButtons = document.querySelectorAll('.btn--e-brand');
        addToCartButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>

                const productId = this.getAttribute('data-id');
                const productName = this.getAttribute('data-name');
                const productPrice = this.getAttribute('data-price');

                // Gửi yêu cầu AJAX đến cart_handler.php
                fetch('cart_handler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `action=add_to_cart&product_id=${productId}&quantity=1&product_name=${encodeURIComponent(productName)}&product_price=${productPrice}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert(data.message); // Hiển thị thông báo thành công
                        updateCartCount();  // Cập nhật số lượng giỏ hàng
                    } else {
                        alert(data.message); // Hiển thị thông báo lỗi
                    }
                })
                .catch(error => console.error('Lỗi:', error));
            });
        });
    }

    // Hàm cập nhật số lượng giỏ hàng
    function updateCartCount() {
        fetch('cart_handler.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'action=get_cart_count'
        })
        .then(response => response.json())
        .then(data => {
            const cartCount = document.getElementById('cart-count');
            if (cartCount) {
                cartCount.textContent = data.count; // Cập nhật số lượng giỏ hàng
            }
        })
        .catch(error => console.error('Lỗi cập nhật giỏ hàng:', error));
    }

    // Hàm xử lý lọc sản phẩm theo danh mục
    function attachCategoryFilterHandlers() {
        const categoryLinks = document.querySelectorAll('.filter-category');
        categoryLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault(); // Ngăn chặn tải lại trang

                const categoryId = this.getAttribute('data-category-id'); // Lấy ID danh mục

                // Gửi yêu cầu AJAX để lấy sản phẩm
                fetch('ajax_load_products.php?category_id=' + categoryId)
                    .then(response => response.text())
                    .then(data => {
                        productList.innerHTML = data; // Cập nhật danh sách sản phẩm vào vùng chứa
                        attachAddToCartHandlers(); // Gắn lại sự kiện cho các nút "Thêm vào giỏ hàng"
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    }

    // Gọi các hàm gắn sự kiện
    attachAddToCartHandlers(); // Gắn sự kiện "Thêm vào giỏ hàng" lần đầu
    attachCategoryFilterHandlers(); // Gắn sự kiện lọc sản phẩm theo danh mục
});




</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php include('admin/footer.php'); ?>
</body>
</html>
