<?php
// Lấy mã đơn hàng từ URL
$id = $_GET['id'];

// Kết nối với cơ sở dữ liệu và cập nhật tình trạng đơn hàng
// $sql = "UPDATE orders SET status = 'Duyệt' WHERE order_id = $id";
// mysqli_query($conn, $sql);

// Chuyển hướng về trang danh sách đơn hàng sau khi duyệt
header("Location: Order.php");
exit();
?>
