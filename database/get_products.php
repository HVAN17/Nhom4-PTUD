<?php
require 'database/config.php';

// Lấy category_id từ URL
$category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;

// Lấy danh sách sản phẩm theo danh mục
$sql = "SELECT id, name, description, price, image_path FROM products WHERE category_id = :category_id ORDER BY name ASC";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($products);
?>
