<?php
require 'database/config.php'; // Kết nối cơ sở dữ liệu

session_start();

// Kết nối cơ sở dữ liệu
$host = 'localhost';       // Tên máy chủ
$username = 'root';        // Tên người dùng
$password = '';            // Mật khẩu
$database = 'cocoon_db';   // Tên cơ sở dữ liệu

$conn = new mysqli($host, $username, $password, $database);
$total_completed_orders = isset($_SESSION['total_completed_orders']) ? $_SESSION['total_completed_orders'] : 0;
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Kiểm tra hành động duyệt đơn hàng hoặc xóa đơn hàng
if (isset($_GET['action']) && isset($_GET['id'])) {
    $orderId = $_GET['id'];

    if ($_GET['action'] == 'approve') {
        approveOrder($orderId, $conn);
    } elseif ($_GET['action'] == 'delete') {
        deleteOrder($orderId, $conn);
    }
}

// Hàm duyệt đơn hàng
function approveOrder($orderId, $conn) {
    // Cập nhật trạng thái đơn hàng thành "completed" (hoặc trạng thái khác nếu cần)
    $query = "UPDATE orders SET status = 'completed' WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $orderId);
    
    if ($stmt->execute()) {
        echo "<script>alert('Đơn hàng đã được duyệt thành công.'); window.location.href='order.php';</script>";
    } else {
        echo "<script>alert('Lỗi khi duyệt đơn hàng.'); window.location.href='order.php';</script>";
    }
}

// Hàm xóa đơn hàng
function deleteOrder($orderId, $conn) {
    // Xóa đơn hàng khỏi cơ sở dữ liệu
    $query = "DELETE FROM orders WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $orderId);
    
    if ($stmt->execute()) {
        echo "<script>alert('Đơn hàng đã được xóa thành công.'); window.location.href='order.php';</script>";
    } else {
        echo "<script>alert('Lỗi khi xóa đơn hàng.'); window.location.href='order.php';</script>";
    }
}

// Lấy danh sách đơn hàng từ cơ sở dữ liệu
$query = "SELECT * FROM orders ORDER BY created_at DESC";
$result = $conn->query($query);

// Truy vấn tổng số đơn hàng đã hoàn tất
$sql_completed_orders = "SELECT COUNT(*) AS total_completed_orders FROM orders WHERE status = 'completed'";
$result_completed_orders = $conn->query($sql_completed_orders);

$total_completed_orders = 0; // Giá trị mặc định
if ($result_completed_orders->num_rows > 0) {
    $row = $result_completed_orders->fetch_assoc();
    $total_completed_orders = $row['total_completed_orders']; // Gán tổng số đơn hàng đã hoàn tất
}
// Lưu vào session để sử dụng trong các file khác
$_SESSION['total_completed_orders'] = $total_completed_orders;

// Truy vấn tổng doanh thu từ các đơn hàng đã hoàn tất
$sql_total_revenue = "SELECT SUM(total_amount) AS total_revenue FROM orders WHERE status = 'completed'";
$result_total_revenue = $conn->query($sql_total_revenue);

$total_revenue = 0; // Giá trị mặc định
if ($result_total_revenue->num_rows > 0) {
    $row = $result_total_revenue->fetch_assoc();
    $total_revenue = $row['total_revenue']; // Gán tổng doanh thu
}

// Lưu vào session để sử dụng trong các file khác
$_SESSION['total_revenue'] = $total_revenue;

// Lấy số lượng đơn hàng theo từng trạng thái (completed, pending)
$sql_status = "SELECT status, COUNT(id) AS order_count 
               FROM orders 
               WHERE status IN ('completed', 'pending') 
               GROUP BY status";
$result_status = $conn->query($sql_status);

$order_counts = [];
$labels = [];

if ($result_status->num_rows > 0) {
    while ($row = $result_status->fetch_assoc()) {
        // Lưu tên trạng thái và số lượng đơn hàng vào mảng
        $labels[] = ucfirst($row['status']); // Tên trạng thái (completed, pending)
        $order_counts[] = $row['order_count']; // Số lượng đơn hàng theo trạng thái
    }
}

// Lưu dữ liệu vào session để lấy trong admin.php
$_SESSION['order_labels'] = $labels;
$_SESSION['order_counts'] = $order_counts;

// Truy vấn tổng doanh thu theo ngày hoặc tháng (ở đây chọn theo ngày)
$sql_revenue = "SELECT DATE(created_at) AS date, SUM(total_amount) AS total_revenue
                FROM orders 
                WHERE status = 'completed'
                GROUP BY DATE(created_at)
                ORDER BY DATE(created_at) DESC"; // Bạn có thể thay đổi GROUP BY theo tháng nếu muốn
$result_revenue = $conn->query($sql_revenue);

$revenue_dates = [];
$revenue_values = [];

if ($result_revenue->num_rows > 0) {
    while ($row = $result_revenue->fetch_assoc()) {
        $revenue_dates[] = $row['date'];  // Lấy ngày
        $revenue_values[] = $row['total_revenue'];  // Lấy tổng doanh thu theo ngày
    }
}

// Lưu dữ liệu vào session để lấy trong admin.php
$_SESSION['revenue_dates'] = $revenue_dates;
$_SESSION['revenue_values'] = $revenue_values;

?>
<?php
if (isset($_GET['message']) && $_GET['message'] === 'success') {
    echo '<div class="alert alert-success">Sản phẩm đã được xóa thành công.</div>';
}
?>
<?php
// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Chuyển hướng nếu chưa đăng nhập
    exit;
}

$username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Đơn hàng</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper">
<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="admin.php">
                                <i class="fas fa-home"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="adminusers.php">
                                <i class="fas fa-user"></i>Quản lý người dùng</a>
                        </li>
                        <li>
                            <a href="products.php">
                                <i class="fas fa-cubes"></i>Sản phẩm</a>
                        </li>
                        <li>
                            <a href="admindanhmuc.php">
                                <i class="fas fa-tags"></i>Danh mục</a>
                        </li>
                        <li>
                            <a href="admin_blog.php">
                                <i class="fas fa-percent"></i>Bài viết</a>
                        </li>
                        <li>
                            <a href="order.php">
                                <i class="fas fa-shopping-cart"></i>Đơn hàng</a>
                        </li>
                        <li>
                            <a href="test.php">
                            <i class="fas fa-warehouse"></i>Quản lí tồn kho
                            </a>
                        </li>
                        <!-- <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="index.html">
                    <img src="images/logo/logo-1.png" alt="Cocoon" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="admin.php">
                                <i class="fas fa-home"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="adminusers.php">
                                <i class="fas fa-user"></i>Quản lý người dùng</a>
                        </li>
                        <li>
                            <a href="products.php">
                                <i class="fas fa-cubes"></i>Sản phẩm</a>
                        </li>
                        <li>
                            <a href="admindanhmuc.php">
                                <i class="fas fa-tags"></i>Danh mục</a>
                        </li>
                        <li>
                            <a href="admin_blog.php">
                                <i class="fas fa-percent"></i>Bài viết</a>
                        </li>
                        <li>
                            <a href="order.php">
                                <i class="fas fa-shopping-cart"></i>Đơn hàng</a>
                        </li>
                        <li>
                            <a href="test.php">
                            <i class="fas fa-warehouse"></i>Quản lí tồn kho
                            </a>
                        </li>
                        <!-- <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li> -->
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <!-- Hiển thị tên người dùng trên thanh header -->
                                        <div class="image">
                                            <img src="images/logo/logoad.jpg" alt="" />
                                        </div>
                                        <div class="content">
    <a class="js-acc-btn" href="header.php">Welcome, <?php echo $username; ?></a>
</div>
                                        <!-- Dropdown xuất hiện khi nhấn vào ảnh hoặc tên -->
                                        <div class="account-dropdown js-dropdown">
                                            <!-- Định dạng cách hiển thị thông tin -->
                                            <div class="info clearfix">
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $username; ?></a>
</h5>
                                                </div>
                                            </div>
                                            <!-- Những tính năng có để quản lý tài khoản admin bao gồm tài khoản, cài đặt, 
                                                thanh toán và Đăng xuất-->
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Tài khoản
                                                    </a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Cài đặt
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
                        <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <h3 class="title-5 m-b-35">Danh sách Đơn Hàng</h3>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>Mã đơn</th>
                                        <th>Ngày đặt</th>
                                        <th>Khách hàng</th>
                                        <th>Tổng tiền</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Tình trạng</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $orderId = $row['id'];
                                            $createdAt = $row['created_at'];
                                            $name = $row['name'];
                                            $totalAmount = number_format($row['total_amount'], 0, ',', '.');
                                            $paymentMethod = ucfirst($row['payment_method']);
                                            $status = ucfirst($row['status']);
                                            
                                            // Đặt màu sắc cho tình trạng
                                            $statusClass = '';
                                            switch ($row['status']) {
                                                case 'completed':
                                                    $statusClass = 'status--done';
                                                    break;
                                                case 'processing':
                                                    $statusClass = 'status--doing';
                                                    break;
                                                case 'shipping':
                                                    $statusClass = 'status--shipping';
                                                    break;
                                                case 'cancelled':
                                                    $statusClass = 'status--cancle';
                                                    break;
                                                default:
                                                    $statusClass = 'status--pending';
                                            }
                                    ?>
                                    <tr class="tr-shadow">
                                        <td>#<?php echo $orderId; ?></td>
                                        <td><?php echo $createdAt; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $totalAmount; ?> VND</td>
                                        <td><?php echo $paymentMethod; ?></td>
                                        <td><span class="<?php echo $statusClass; ?>"><?php echo $status; ?></span></td>
                                        <td>
                                            <div class="table-data-feature">
                                                <!-- Xem thông tin đơn hàng -->
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Xem" onclick="window.location.href='order_detail.php?id=<?php echo $orderId; ?>';">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </button>
                                                
                                                <!-- Duyệt đơn hàng -->
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Duyệt đơn" onclick="window.location.href='order.php?action=approve&id=<?php echo $orderId; ?>';">
                                                    <i class="zmdi zmdi-check"></i>
                                                </button>
                                                
                                                <!-- Xóa đơn hàng -->
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Xóa đơn" onclick="window.location.href='order.php?action=delete&id=<?php echo $orderId; ?>';">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>Không có đơn hàng nào.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>
</html>

<?php
$conn->close();
?>
