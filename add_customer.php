<?php
// Kết nối cơ sở dữ liệu
require_once 'database/config.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Chuyển hướng nếu chưa đăng nhập
    exit;
}

$username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');
// Kiểm tra nếu người dùng gửi thông tin qua form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $ho = $_POST['ho'];
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $matkhau = $_POST['matkhau'];
    $gioitinh = $_POST['gioitinh'];
    $ngaysinh = $_POST['ngaysinh'];
    $diachi = $_POST['diachi'];

    // Mã hóa mật khẩu
    $hashed_password = password_hash($matkhau, PASSWORD_DEFAULT);

    // Truy vấn để thêm khách hàng mới vào cơ sở dữ liệu
    $sql = "INSERT INTO khachhang (ho, ten, email, matkhau, gioitinh, ngaysinh, diachi) 
            VALUES (:ho, :ten, :email, :matkhau, :gioitinh, :ngaysinh, :diachi)";

    $stmt = $pdo->prepare($sql);

    // Bind dữ liệu vào câu lệnh SQL
    $stmt->bindParam(':ho', $ho);
    $stmt->bindParam(':ten', $ten);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':matkhau', $hashed_password);
    $stmt->bindParam(':gioitinh', $gioitinh);
    $stmt->bindParam(':ngaysinh', $ngaysinh);
    $stmt->bindParam(':diachi', $diachi);

    // Thực thi câu lệnh SQL và kiểm tra
    if ($stmt->execute()) {
        $_SESSION['success'] = "Thêm khách hàng thành công!";
        header("Location: adminusers.php"); // Chuyển đến trang danh sách khách hàng
        exit();
    } else {
        $_SESSION['error'] = "Có lỗi xảy ra khi thêm khách hàng!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Ngoc Yen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Sản phẩm</title>

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

<body class="animsition">
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
                                <i class="fas fa-shopping-cart"></i>Quản lí tồn kho</a>
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
                                <i class="fas fa-shopping-cart"></i>Quản lí tồn kho</a>
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
                                            <img src="images/logo/logoad.jpg" alt="Bích Ngọc" />
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
                            <!-- <div class=""> -->
                                <div class="card">
                                    
                                        <div class="container mt-5">
        </div>
<!-- HTML form để thêm khách hàng -->
<div class="card">
    <div class="card-header">
        <strong>Thêm người dùng</strong>
    </div>
    <div class="card-body card-block">
        <form action="add_customer.php" method="POST" class="form-horizontal">
            <!-- Họ -->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="ho" class="form-control-label">Họ*</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="ho" id="ho" class="form-control" required>
                </div>
            </div>

            <!-- Tên -->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="ten" class="form-control-label">Tên*</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="ten" id="ten" class="form-control" required>
                </div>
            </div>

            <!-- Email -->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="email" class="form-control-label">Email*</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
            </div>

            <!-- Mật khẩu -->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="matkhau" class="form-control-label">Mật khẩu*</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="password" name="matkhau" id="matkhau" class="form-control" required>
                </div>
            </div>

            <!-- Giới tính -->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="gioitinh" class="form-control-label">Giới tính*</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="gioitinh" id="gioitinh" class="form-control" required>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                        <option value="Khác">Khác</option>
                    </select>
                </div>
            </div>

            <!-- Ngày sinh -->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="ngaysinh" class="form-control-label">Ngày sinh*</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="date" name="ngaysinh" id="ngaysinh" class="form-control" required>
                </div>
            </div>

            <!-- Địa chỉ -->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="diachi" class="form-control-label">Địa chỉ*</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" name="diachi" id="diachi" class="form-control" required>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Lưu
                </button>
            </div>
        </form>
    </div>
</div>
<!-- Jquery JS-->
<script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
