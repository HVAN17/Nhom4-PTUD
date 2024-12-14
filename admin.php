<?php
session_start(); // Bắt đầu session

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Chuyển hướng nếu chưa đăng nhập
    exit;
}

$username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');
?>
<?php
$total_quantity = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $total_quantity += $item['quantity'];
    }
}


// Kiểm tra xem biến session 'total_completed_orders' có tồn tại không
$total_completed_orders = isset($_SESSION['total_completed_orders']) ? $_SESSION['total_completed_orders'] : 0;

$total_revenue = isset($_SESSION['total_revenue']) ? $_SESSION['total_revenue'] : 0;

if (isset($_SESSION['order_labels']) && isset($_SESSION['order_counts'])) {
    $labels = $_SESSION['order_labels'];
    $order_counts = $_SESSION['order_counts'];
} else {
    // Nếu không có dữ liệu, bạn có thể đặt mặc định hoặc lấy lại từ cơ sở dữ liệu
    $labels = [];
    $order_counts = [];
}

if (isset($_SESSION['revenue_dates']) && isset($_SESSION['revenue_values'])) {
    $revenue_dates = $_SESSION['revenue_dates'];
    $revenue_values = $_SESSION['revenue_values'];
} else {
    // Nếu không có dữ liệu, bạn có thể đặt mặc định hoặc lấy lại từ cơ sở dữ liệu
    $revenue_dates = [];
    $revenue_values = [];

}
if (isset($_SESSION['dates']) && isset($_SESSION['user_counts'])) {
    $dates = $_SESSION['dates'];
    $user_counts = $_SESSION['user_counts'];
} else {
    // Nếu không có dữ liệu trong session, có thể thông báo lỗi hoặc dùng dữ liệu mặc định
    $dates = [];
    $user_counts = [];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Nhom 3">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

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

    <!-- Thêm Chart.js vào trang  -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</head>


<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">

                    <div class="header-mobile-inner">
                        <a class="logo" href="admin.php">
                            <img src="images/logo/logo-1.png" alt="Cocoon" />
                        </a>
                        <!--Đây là nút để hiển thị một menu điều hướng khi người dùng click chuột vào-->
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <!--Menu được mở ra khi click vào nút 3 gạch trong giao diện desktop-->
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <!--Chỉ định class cho phần menu điều hướng trên thiết bị di động, bao gồm class về định dạng
                    và loại bỏ các gạch đầu dòng mặc định của danh sách (list-unstyled)-->
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="index.html">
                                <!--Hiển thị icon fa-home từ thư viện fas và một
                            mục Dashboard trong menu, tương tự với các mục phía dưới,
                            tùy theo tên danh mục sẽ lựa chọnicon phù hợp-->
                                <i class="fas fa-home"></i>Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="adminusers.php">
                                <i class="fas fa-user"></i>Quản lý người dùng</a>
                        </li>
                        <li>
                            <a href="products.php">
                                <i class="fas fa-cubes"></i>Sản phẩm
                            </a>
                        </li>
                        <li>
                            <a href="admindanhmuc.php">
                                <i class="fas fa-tags"></i>Danh mục
                            </a>
                        </li>
                        <li>
                            <a href="addblog.php">
                                <i class="fas fa-percent"></i>Bài viết
                            </a>
                        </li>
                        <li>
                            <a href="Order.php">
                                <i class="fas fa-shopping-cart"></i>Đơn hàng
                            </a>
                            <a href="Test.php">
                                <i class="fas fa-shopping-cart"></i>Quản lí tồn kho
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->
        <!-- MENU SIDEBAR-->
        <!--Logo và thanh menu bên phải đối với màn hình desktop, nội dung của menu tương tự
            như của mobile nhưng thay đổi class để menu được hiển thị một cách phù hợp-->
            <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="admin.php">
                    <img src="images/logo/logo-2.png" alt="Wristluxe" />
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
                            <a href="Order.php">
                                <i class="fas fa-shopping-cart"></i>Đơn hàng</a>
                        </li>
                        <li>
                            <a href="test.php">
                                <i class="fas fa-shopping-cart"></i>Quản lí tồn kho
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
                                            <img src="images/logo/logoad.jpg" alt="admin.php" />
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
                        <div class="row">
                            <div class="col-md-12">
                                <!--Hiển thị tiêu đề tổng quan và nút thêm mục và chỉ định các class
            cho phần tử này để chúng được hiển thị như mong muốn-->
                                <div class="overview-wrap">
                                    <h2 class="title-1">Tổng quan</h2>
                                </div>
                            </div>
                        </div>
                        <!--Hiển thị số liệu thống kê về số nội dung trên website -->
                        <!--Mỗi nội dung sẽ được hiển thị trong một khung, trong đó khung đó sẽ
                            bao gồm một icon thể hiện nội dung, tên nội dung, số liệu và biểu đồ thể hiện -->

                        <!--Hiển thị khung số liệu số người đã đăng ký-->
                        <?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cocoon_db";


$conn = new mysqli($servername, $username, $password, $dbname);


// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}


// Truy vấn tổng số lượng khách hàng
$sql = "SELECT COUNT(*) AS total_customers FROM khachhang";
$result = $conn->query($sql);


$total_customers = 0; // Giá trị mặc định
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_customers = $row['total_customers']; // Gán tổng số khách hàng
}


// Đóng kết nối
$conn->close();
?>


<!-- Hiển thị khung số liệu số người đã đăng ký -->
<div class="row m-t-25">
    <div class="col-sm-6 col-lg-3">
        <div class="overview-item overview-item--c1">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-account-o"></i>
                    </div>
                    <div class="text">
                        <h2><?php echo $total_customers; ?></h2> <!-- Hiển thị tổng số khách hàng -->
                        <span>Số người đã đăng ký</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


                            <!--Hiển thị khung số liệu số sản phẩm được thêm vào giỏ hàng-->
                           
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                    <h2><?= $total_quantity; ?></h2>
                    <span>Thêm vào giỏ hàng</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Hiển thị khung số liệu số đơn hàng đã hoàn tất-->
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            
                                            <div class="text">
    <h2><?= number_format($total_completed_orders); ?></h2> <!-- Hiển thị tổng số đơn hàng đã hoàn tất -->
    <span>Đơn hàng đã hoàn tất</span>
</div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!--Hiển thị khung số liệu Tổng doanh thu-->
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                
                                            </div>
                                            <div class="text">
                                                <h2><?= number_format($total_revenue, 0, ',', '.'); ?> VND</h2>
                                                <span>Tổng doanh thu</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Biểu đồ Doughnut -->
                            <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                    <h3 class="title-2 m-b-40">Đơn hàng</h3>
<canvas id="doughnutChart"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('doughnutChart').getContext('2d');
    var doughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: <?php echo json_encode($labels); ?>, // Nhãn của các phần trong biểu đồ (completed, pending)
            datasets: [{
                label: 'Số lượng đơn hàng',
                data: <?php echo json_encode($order_counts); ?>, // Dữ liệu số lượng đơn hàng theo từng trạng thái
                backgroundColor: ['#36A2EB', '#FFCE56'], // Màu sắc cho mỗi phần trong biểu đồ
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true, // Đảm bảo biểu đồ có thể thay đổi kích thước tự động
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.raw + ' đơn hàng'; // Hiển thị số lượng đơn hàng trong tooltip
                        }
                    }
                }
            }
        }
    });
</script></div></div></div>
<!-- NGƯỜI ĐĂNG KÍ MỚI THEO NGÀY -->

<div class="col-lg-6">
    <div class="au-card m-b-30">
        <div class="au-card-inner">
            <div class="aspect aspect--bg-grey-fb aspect--square">
                            <img class="aspect__img i3-banner__img" src="images/banners/bannerss.jpg" alt=""> 
                        </div>
</div>
 </div>
</div>

<div class="col-lg-12">
    <div class="au-card m-b-30">

            <h3 class="title-2 m-b-40">Doanh thu</h3>
            <canvas id="team-chart"></canvas>
        </div>
    </div>
</div>

<script>
    // Lấy dữ liệu từ PHP
    var dates = <?php echo json_encode($revenue_dates); ?>;
    var revenues = <?php echo json_encode($revenue_values); ?>;

    // Đảm bảo các ngày được sắp xếp đúng thứ tự (từ trái sang phải)
    dates.reverse();  // Đảo ngược ngày nếu cần
    revenues.reverse(); // Đảo ngược doanh thu nếu cần

    // Vẽ biểu đồ
    var ctx = document.getElementById('team-chart').getContext('2d');
    var teamChart = new Chart(ctx, {
        type: 'line', // Biểu đồ dạng đường
        data: {
            labels: dates, // Các ngày
            datasets: [{
                label: 'Doanh thu',
                data: revenues, // Doanh thu theo ngày
                
            }]
        },
        options: {
            responsive: true, // Đảm bảo biểu đồ thay đổi kích thước tự động
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return '₫' + tooltipItem.raw.toLocaleString(); // Hiển thị doanh thu với định dạng tiền tệ
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '₫' + value.toLocaleString(); // Định dạng giá trị trục Y
                        }
                    }
                }
            }
        }
    });
</script>


                            </div>


                        </div>





                    

            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js"></script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>
</html>
<!-- end document-->
