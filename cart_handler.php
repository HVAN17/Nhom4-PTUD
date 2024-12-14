<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

    switch ($action) {
        case 'add_to_cart':
            // Thêm sản phẩm vào giỏ hàng
            if ($product_id > 0) {
                if (!isset($_SESSION['cart'][$product_id])) {
                    $_SESSION['cart'][$product_id] = [
                        'name' => $_POST['product_name'],
                        'price' => floatval($_POST['product_price']),
                        'quantity' => $quantity
                    ];
                } else {
                    $_SESSION['cart'][$product_id]['quantity'] += $quantity;
                }
                echo json_encode(['status' => 'success', 'message' => 'Đã thêm vào giỏ hàng']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Sản phẩm không hợp lệ']);
            }
            break;

        case 'remove_from_cart':
            // Xóa sản phẩm khỏi giỏ hàng
            if (isset($_SESSION['cart'][$product_id])) {
                unset($_SESSION['cart'][$product_id]);
                echo json_encode(['status' => 'success', 'message' => 'Đã xóa sản phẩm']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Sản phẩm không có trong giỏ hàng']);
            }
            break;

        case 'update_quantity':
            // Cập nhật số lượng sản phẩm
            if (isset($_SESSION['cart'][$product_id]) && $quantity > 0) {
                $_SESSION['cart'][$product_id]['quantity'] = $quantity;
                echo json_encode(['status' => 'success', 'message' => 'Đã cập nhật số lượng']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Số lượng không hợp lệ']);
            }
            break;

        default:
            echo json_encode(['status' => 'error', 'message' => 'Hành động không hợp lệ']);
            break;
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Yêu cầu không hợp lệ']);
}
