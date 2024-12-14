<?php
// Lấy mã đơn hàng từ URL
$id = $_GET['id'];

// Kết nối với cơ sở dữ liệu và xóa đơn hàng
// $sql = "DELETE FROM orders WHERE order_id = $id";
// mysqli_query($conn, $sql);

// Chuyển hướng về trang danh sách đơn hàng sau khi xóa
header("Location: Order.php");
exit();
?>
