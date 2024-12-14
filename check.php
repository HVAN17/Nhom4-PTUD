<?php
require_once 'database/config.php';

// Lấy danh mục được chọn
$category_id = isset($_GET['category']) ? $_GET['category'] : null;

// Truy vấn sản phẩm
if ($category_id) {
    $sql = "SELECT * FROM products WHERE category_id = :category_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
} else {
    $sql = "SELECT * FROM products";
    $stmt = $pdo->query($sql);
}

$stmt->execute();
$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
</head>
<body>
    <div class="filter-category">
        <form method="GET" action="">
            <select name="category" onchange="this.form.submit()">
                <option value="">Tất cả danh mục</option>
                <?php
                $sql = "SELECT id, name FROM categories";
                $stmt = $pdo->query($sql);
                while ($row = $stmt->fetch()) {
                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                }
                ?>
            </select>
        </form>
    </div>

    <div class="product-list">
        <?php
        if (!empty($products)) {
            foreach ($products as $product) {
                echo '<div class="product-item">';
                echo '<img src="database/uploads/' . $product['image'] . '" alt="' . $product['name'] . '">';
                echo '<h3>' . $product['name'] . '</h3>';
                echo '<p>' . $product['description'] . '</p>';
                echo '<p>Giá: ' . $product['price'] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>Không có sản phẩm nào trong danh mục này.</p>';
        }
        ?>
    </div>
</body>
</html>
<div class="row is-grid-active">
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                <div class="product-m">
                    <div class="product-m__thumb">
                        <a class="aspect aspect--bg-grey aspect--square u-d-block" 
                           href="product_detail.php?id=<?= htmlspecialchars($product['id']); ?>">
                            <img class="aspect__img" 
                                 src="database/uploads/<?= htmlspecialchars($product['image']); ?>" 
                                 alt="<?= htmlspecialchars($product['name']); ?>">
                        </a>
                        <div class="product-m__quick-look">
                            <a href="product_detail.php?id=<?= htmlspecialchars($product['id']); ?>" 
                               class="btn-detail">Xem chi tiết</a>
                        </div>
                        <div class="product-m__add-cart">
                            <a href="javascript:void(0)" 
                               class="btn--e-brand" 
                               data-id="<?= htmlspecialchars($product['id']); ?>" 
                               data-name="<?= htmlspecialchars($product['name']); ?>" 
                               data-price="<?= htmlspecialchars($product['price']); ?>">Thêm vào giỏ hàng</a>
                        </div>
                    </div>

                    <div class="product-m__content">
                        <div class="product-m__category">
                            <a href="?category=<?= htmlspecialchars($product['category_id']); ?>">
                                <?= htmlspecialchars($product['category'] ?? 'Chưa có danh mục'); ?>
                            </a>
                        </div>
                        <div class="product-m__name">
                            <a href="product_detail.php?id=<?= htmlspecialchars($product['id']); ?>">
                                <?= htmlspecialchars($product['name']); ?>
                            </a>
                        </div>
                        <div class="product-m__price">
                            <?= number_format($product['price'], 0, ',', '.'); ?>₫
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="col-12">Không có sản phẩm nào trong danh mục này.</p>
    <?php endif; ?>