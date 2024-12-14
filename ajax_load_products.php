<?php
require 'database/config.php';

// Kiểm tra xem có tham số category_id được gửi qua AJAX không
$categoryId = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;

// Tạo truy vấn SQL để lấy sản phẩm theo danh mục hoặc tất cả sản phẩm nếu không có danh mục
if ($categoryId > 0) {
    $sql = "SELECT products.*, categories.name AS category_name
            FROM products
            LEFT JOIN categories ON products.category_id = categories.id
            WHERE products.category_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$categoryId]);
} else {
    $sql = "SELECT products.*, categories.name AS category_name
            FROM products
            LEFT JOIN categories ON products.category_id = categories.id";
    $stmt = $pdo->query($sql);
}

// Lấy danh sách sản phẩm
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Kiểm tra nếu có sản phẩm
if (!empty($products)) {
    foreach ($products as $product) {
        echo '
        <div class="col-lg-4 col-md-6 col-sm-6 col-6">
            <div class="product-m">
                <div class="product-m__thumb">
                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product_detail.php?id=' . htmlspecialchars($product['id']) . '">
                        <img class="aspect__img" src="database/uploads/' . htmlspecialchars($product['image']) . '" alt="' . htmlspecialchars($product['name']) . '">
                    </a>
                    <div class="product-m__quick-look">
                        <a href="product_detail.php?id=' . htmlspecialchars($product['id']) . '" class="btn-detail">Xem chi tiết</a>
                    </div>
                    <div class="product-m__add-cart">
                        <a href="javascript:void(0)" class="btn--e-brand" 
                           data-id="' . htmlspecialchars($product['id']) . '" 
                           data-name="' . htmlspecialchars($product['name']) . '" 
                           data-price="' . htmlspecialchars($product['price']) . '">
                           Thêm vào giỏ hàng
                        </a>
                    </div>
                </div>
                <div class="product-m__content">
                    <div class="product-m__category">
                        <a href="javascript:void(0)" class="filter-category" data-category-id="' . htmlspecialchars($product['category_id']) . '">' . htmlspecialchars($product['category_name']) . '</a>
                    </div>
                    <div class="product-m__name">
                        <a href="product_detail.php?id=' . htmlspecialchars($product['id']) . '">' . htmlspecialchars($product['name']) . '</a>
                    </div>
                    <div class="product-m__rating gl-rating-style">
                        ' . renderProductRating($product['rating'] ?? 0) . '
                        <span class="product-m__review">(' . (isset($product['reviews']) ? htmlspecialchars($product['reviews']) : 'Chưa có đánh giá') . ')</span>
                    </div>
                    <div class="product-m__price">
                        ' . number_format($product['price'], 0, ',', '.') . '₫
                    </div>
                </div>
            </div>
        </div>';
    }
} else {
    echo '<p class="col-12">Không có sản phẩm nào.</p>';
}

// Hàm để render rating sao
function renderProductRating($rating)
{
    $html = '';
    for ($i = 0; $i < 5; $i++) {
        $html .= $i < round($rating) ? '<i class="fas fa-star"></i>' : '<i class="far fa-star"></i>';
    }
    return $html;
}
?>
