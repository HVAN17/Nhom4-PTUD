<?php
session_start(); // Bắt đầu session
require 'database/config.php';
// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Chuyển hướng nếu chưa đăng nhập
    exit;
}

$username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');
// Kiểm tra nếu có thông báo thành công
if (isset($_SESSION['success'])) {
    // Đưa thông báo vào session rồi sẽ hiển thị thông báo với JS
    $successMessage = $_SESSION['success'];
    unset($_SESSION['success']);
} else {
    $successMessage = "";
}
?>
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
    <title>Thêm danh mục</title>

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
            <<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                            <!-- <div class=""> -->
                                <div class="card">
                                <div class="container mt-5">
<h2>Sửa danh mục</h2>
<?php

require 'database/config.php';

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Chuyển hướng nếu chưa đăng nhập
    exit;
}

$username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');

// Kiểm tra nếu có ID danh mục được truyền vào
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Truy vấn để lấy thông tin danh mục
    $sql = "SELECT * FROM categories WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $category = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$category) {
        echo "Danh mục không tồn tại!";
        exit;
    }
}

// Xử lý cập nhật danh mục
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    // Xử lý ảnh nếu có thay đổi
    if (!empty($image)) {
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = "database/uploads/" . basename($image);

        if (!move_uploaded_file($image_tmp, $image_path)) {
            $_SESSION['error'] = "Lỗi: Không thể tải lên hình ảnh.";
            header("Location: editcategory.php?id=" . $id);
            exit;
        }

        $sql = "UPDATE categories SET name = :name, description = :description, image = :image WHERE id = :id";
        $params = [
            ':name' => $name,
            ':description' => $description,
            ':image' => $image,
            ':id' => $id
        ];
    } else {
        // Nếu không thay đổi ảnh
        $sql = "UPDATE categories SET name = :name, description = :description WHERE id = :id";
        $params = [
            ':name' => $name,
            ':description' => $description,
            ':id' => $id
        ];
    }

    // Cập nhật danh mục trong cơ sở dữ liệu
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute($params)) {
        // Lưu thông báo thành công vào session
        $_SESSION['success'] = "Cập nhật danh mục thành công!";
        header("Location: admindanhmuc.php"); // Chuyển hướng về trang quản lý danh mục
        exit;
    } else {
        $_SESSION['error'] = "Lỗi: Không thể cập nhật danh mục.";
        header("Location: admindanhmuc.php=" . $id); // Chuyển hướng lại trang edit nếu có lỗi
        exit;
    }
}
?>

<!-- Form Sửa Danh Mục -->
<div class="form-container">
    <form action="editcategory.php?id=<?= htmlspecialchars($category['id']); ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Tên Danh Mục:</label>
            <input type="text" id="name" name="name" class="form-control" value="<?= htmlspecialchars($category['name']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="description">Mô Tả:</label>
            <textarea id="description" name="description" class="form-control" required><?= htmlspecialchars($category['description']); ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="image">Ảnh Danh Mục (Nếu cần thay đổi):</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*">
            <small>Hình ảnh hiện tại:</small>
            <img src="database/uploads/<?= htmlspecialchars($category['image']); ?>" alt="Hình ảnh danh mục" width="100">
        </div>
        
        <div class="form-group">
    <!-- Nút Cập Nhật Danh Mục -->
    <button type="submit" class="au-btn au-btn-icon au-btn--green au-btn--small" id="updateCategoryBtn">
        <i class="zmdi zmdi-check"></i>Cập Nhật Danh Mục
    </button>
</div>
    </form>
</div>
</div>
<script>
// Xử lý sự kiện click trên nút "Cập Nhật Danh Mục"
document.getElementById('updateCategoryBtn').addEventListener('click', function(event) {
    // Ngừng hành động mặc định của nút submit
    event.preventDefault();

    // Xác nhận việc cập nhật danh mục
    if (confirm("Bạn có chắc chắn muốn cập nhật danh mục này?")) {
        // Nếu xác nhận, gửi form
        document.forms[0].submit(); // Gửi form đầu tiên (form chứa nút này)

        // Sau khi gửi form, tự động quay lại trang quản lý danh mục sau 1 giây
        setTimeout(function() {
            window.location.href = 'admindanhmuc.php'; // Quay lại trang quản lý danh mục
        }, 1000); // Thời gian chờ 1 giây để người dùng thấy thông báo
    }
});
</script>


    
</div>

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
