<?php
// Bắt đầu phiên làm việc
session_start();

// Xóa tất cả dữ liệu trong session
session_unset();
session_destroy();

// Chuyển hướng về trang login
header("Location: login.html");
exit();
?>
