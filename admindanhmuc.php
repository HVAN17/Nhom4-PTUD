<?php
session_start();
require 'database/config.php';

// Hiển thị tất cả các thông báo (thành công và lỗi)
function show_session_message($type, $message) {
    echo '<div class="alert alert-' . $type . '">' . $message . '</div>';
    unset($_SESSION[$type]); // Xóa thông báo sau khi hiển thị
}

// Kiểm tra và hiển thị thông báo thành công hoặc lỗi
if (isset($_SESSION['message'])) {
    show_session_message('success', $_SESSION['message']);
}
if (isset($_SESSION['error'])) {
    show_session_message('danger', $_SESSION['error']);
}
if (isset($_SESSION['success'])) {
    show_session_message('success', $_SESSION['success']);
}
if (isset($_SESSION['error'])) {
    show_session_message('danger', $_SESSION['error']);
}

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Chuyển hướng nếu chưa đăng nhập
    exit;
}

$username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');


/// Kiểm tra và hiển thị thông báo nếu có
if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['success']; ?>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?= $_SESSION['error']; ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>




<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Danh mục</title>

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
                            <a href="Order.html">
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
                            <a href="Order.html">
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
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">BẢNG DANH MỤC SẢN PHẨM</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">

                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">Hành động</option>
                                                <option value="">Chỉnh sửa</option>
                                                <option value="">Xóa</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button type="button" class="btn btn-success">Áp dụng</button>
                                        <pre></pre>
                                    </div>
                                    <!--Nút thêm danh mục mới, khi người dùng nhấn vào sẽ được chuyển đến trang thêm danh mục mới-->
                                    
                                </div>
                                <!--Bảng được tạo ra tương tự với bản danh sách sản phẩm, chỉ thay đổi nội dung bên trong một số cột
                                    để phù hợp với trang danh mục-->
                                    <div class="table-data__tool-right">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small" onclick="location.href='addcategory.php'">
    <i class="zmdi zmdi-plus"></i>Thêm danh mục mới
</button>

<div class="table-responsive table-responsive-data2">
<?php
require_once 'database/config.php'; // Kết nối đến cơ sở dữ liệu

// Truy vấn danh mục
$sql = "SELECT c.id, c.name, c.description, c.image, COUNT(p.id) AS total_products
        FROM categories c
        LEFT JOIN products p ON c.id = p.category_id
        GROUP BY c.id";

$stmt = $pdo->query($sql);
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Kiểm tra xem có dữ liệu không
if (empty($categories)) {
    echo "<p>Không có danh mục nào trong cơ sở dữ liệu.</p>";
}
?>

<!-- Hiển thị thông báo thành công hoặc lỗi -->
<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['success']; ?>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?= $_SESSION['error']; ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<!-- Bảng hiển thị danh mục -->
<table class="table table-data2">
    <thead>
        <tr>
            <th><input type="checkbox" id="checkAll" /></th>
            <th>Ảnh</th>
            <th>Mã</th>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>Tổng sản phẩm</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category): ?>
            <tr class="tr-shadow">
                <td><input type="checkbox" class="checkbox" /></td>
                <td>
                    <!-- Hiển thị hình ảnh danh mục -->
                    <img src="database/uploads/<?= htmlspecialchars($category['image']); ?>" 
                         alt="Hình ảnh danh mục" class="product-image" />
                </td>
                <td><?= 'M' . htmlspecialchars($category['id']); ?></td> <!-- Mã danh mục -->
                <td><?= htmlspecialchars($category['name']); ?></td> <!-- Tên danh mục -->
                <td><?= htmlspecialchars($category['description']); ?></td> <!-- Mô tả danh mục -->
                <td><?= htmlspecialchars($category['total_products']); ?></td> <!-- Tổng sản phẩm -->
                <td>
                    <div class="table-data-feature">
                    <div class="table-data-feature">
                        <!-- Xem danh mục -->
                        <button class="item" title="Xem" onclick="window.location.href='andmindanhmuc.php?id=<?= $category['id']; ?>';">
                            <i class="zmdi zmdi-eye"></i>
                        </button>
                        <!-- Sửa danh mục -->
                        <button class="item" data-placement="top" title="Sửa" onclick="window.location.href='editcategory.php?id=<?= $category['id']; ?>';">
                            <i class="zmdi zmdi-edit"></i>
                        </button>
                        <!-- Xóa danh mục -->
                        <button class="item" data-placement="top" title="Xóa" onclick="xoaDongNay(<?= $category['id']; ?>);">
                            <i class="zmdi zmdi-delete"></i>
                        </button>

    </div>
                </td>
            </tr>
            <tr class="spacer"></tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
// Xóa danh mục
function xoaDongNay(categoryId) {
    if (confirm("Bạn có chắc chắn muốn xóa danh mục này?")) {
        // Chuyển hướng đến trang xử lý xóa danh mục
        window.location.href = 'database/deletecategory.php?id=' + categoryId;
    }
}

</script>
</div></div>






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
    <script> function xoaDongNay(id) {
    if (confirm("Bạn có chắc chắn muốn xóa danh mục này không?")) {
        window.location.href = `database/deletecategory.php?id=${id}`;
    }
}</script>

</body>

</html>
<!-- end document-->
