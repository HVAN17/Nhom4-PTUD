
<?php
require 'database/config.php'; // Kết nối cơ sở dữ liệu
?>
<?php
session_start();
$username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');
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
    <title>Bài viết</title>

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
            <?php
require_once 'database/config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Bắt đầu phiên làm việc (session) để hiển thị thông báo
session_start();

// Lấy thông tin bài viết
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Truy vấn thông tin bài viết từ cơ sở dữ liệu
$sql = "SELECT * FROM posts WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    // Nếu bài viết không tồn tại, chuyển hướng với thông báo lỗi
    $_SESSION['error'] = "Bài viết không tồn tại!";
    header("Location: http://localhost/Admin/CoolAdmin/admindanhmuc.php");
    exit();
}

// Kiểm tra phương thức POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $title = htmlspecialchars(trim($_POST['title']));
    $content = htmlspecialchars(trim($_POST['content']));
    $imagePath = $post['image_path']; // Giữ nguyên hình ảnh cũ nếu không có hình ảnh mới

    // Xử lý tải lên hình ảnh mới
    if (!empty($_FILES['image']['name'])) {
        $targetDir = "database/uploads/";
        $imageFile = basename($_FILES['image']['name']);
        $targetFilePath = $targetDir . $imageFile;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                $imagePath = $imageFile; // Cập nhật đường dẫn ảnh mới
            } else {
                $_SESSION['error'] = "Lỗi khi tải lên hình ảnh!";
                header("Location: edit_blog.php?id=$id");
                exit();
            }
        } else {
            $_SESSION['error'] = "Định dạng file không hợp lệ!";
            header("Location: edit_blog.php?id=$id");
            exit();
        }
    }

    // Cập nhật bài viết trong cơ sở dữ liệu
    $updateSql = "UPDATE posts SET title = :title, content = :content, image_path = :image_path WHERE id = :id";
    $updateStmt = $pdo->prepare($updateSql);
    $updateStmt->bindParam(':title', $title);
    $updateStmt->bindParam(':content', $content);
    $updateStmt->bindParam(':image_path', $imagePath);
    $updateStmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($updateStmt->execute()) {
        // Lưu thông báo thành công vào session
        $_SESSION['message'] = "Cập nhật bài viết thành công!";
        // Chuyển hướng về trang admin_blog.php sau khi cập nhật thành công
        header("Location: http://localhost/Admin/CoolAdmin/admindanhmuc.php");
        exit(); // Đảm bảo dừng mã sau khi chuyển hướng
    } else {
        $_SESSION['error'] = "Lỗi: Không thể cập nhật bài viết.";
        header("Location: edit_blog.php?id=$id");
        exit();
    }
}
?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <strong>Chỉnh sửa bài viết</strong>
                </div>
                <div class="card-body card-block">
                    <!-- Hiển thị thông báo lỗi -->
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger"><?= $_SESSION['error']; ?></div>
                        <?php unset($_SESSION['error']); ?>
                    <?php endif; ?>
                    
                    <!-- Hiển thị thông báo thành công -->
                    <?php if (isset($_SESSION['message'])): ?>
                        <div class="alert alert-success"><?= $_SESSION['message']; ?></div>
                        <?php unset($_SESSION['message']); ?>
                    <?php endif; ?>

                    <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <!-- Tên bài viết -->
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="title" class="form-control-label">Tên bài viết</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="title" id="title" class="form-control" value="<?= htmlspecialchars($post['title']); ?>" required>
                            </div>
                        </div>
                        <!-- Nội dung -->
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="content" class="form-control-label">Nội dung bài viết</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="content" id="content" rows="10" class="form-control" required><?= htmlspecialchars($post['content']); ?></textarea>
                            </div>
                        </div>
                        <!-- Hình ảnh -->
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="image" class="form-control-label">Hình ảnh</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" name="image" id="image" class="form-control-file">
                                <!-- Hiển thị hình ảnh hiện tại -->
                                <?php if (!empty($post['image_path'])): ?>
                                    <img src="database/uploads/<?= htmlspecialchars($post['image_path']); ?>" alt="Image" class="img-thumbnail mt-2" style="max-width: 200px;">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Lưu thay đổi
                            </button>
                            <a href="admin_blog.php" class="btn btn-secondary btn-sm">Hủy</a>
                        </div>
                    </form>
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