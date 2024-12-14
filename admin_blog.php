<?php
require 'database/config.php'; // Kết nối cơ sở dữ liệu
?>
<?php
// Bắt đầu session để hiển thị thông báo
session_start();

// Hiển thị thông báo nếu có
if (isset($_SESSION['message'])):
?>
    <div class="alert alert-success"><?= htmlspecialchars($_SESSION['message']); ?></div>
    <?php unset($_SESSION['message']); // Xóa thông báo sau khi đã hiển thị ?>
<?php endif; ?>
<?php


// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Chuyển hướng nếu chưa đăng nhập
    exit;
}

$username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Ngọc Yến">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Bài Viết</title>

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

            <?php
require_once 'database/config.php'; // Kết nối tới cơ sở dữ liệu

// Bắt đầu session để lưu thông báo


// Kiểm tra và hiển thị thông báo
if (isset($_SESSION['message'])): ?>
    <div class="alert alert-success"><?= htmlspecialchars($_SESSION['message']); ?></div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>
<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error']); ?></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<!-- MAIN CONTENT -->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="table-data__tool-right">
                <button class="au-btn au-btn-icon au-btn--green au-btn--small" onclick="location.href='addblog.php'">
                    <i class="zmdi zmdi-plus"></i> Thêm bài viết mới
                </button>
            </div>
            <div class="card">
                <div class="card-header">
                    <strong>Danh sách bài viết</strong>
                </div>
                <div class="card-body card-block">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Ảnh</th>
                                    <th>Tiêu đề</th>
                                    <th>Nội dung</th>
                                    <th>Ngày đăng</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Truy vấn lấy danh sách bài viết từ cơ sở dữ liệu
                                $sql = "SELECT id, title, content, image_path, created_at FROM posts ORDER BY created_at DESC";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute();
                                $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                if ($posts):
                                    foreach ($posts as $key => $post):
                                ?>
                                        <tr>
                                            <td><?= $key + 1; ?></td>
                                            <td>
                                                <?php if (!empty($post['image_path'])): ?>
                                                    <img src="database/uploads/<?= htmlspecialchars($post['image_path']); ?>" alt="<?= htmlspecialchars($post['title']); ?>" width="100">
                                                <?php else: ?>
                                                    <img src="images/no-image.jpg" alt="No image" width="100">
                                                <?php endif; ?>
                                            </td>
                                            <td><?= htmlspecialchars($post['title']); ?></td>
                                            <td><?= htmlspecialchars(mb_strimwidth($post['content'], 0, 100, "...")); ?></td>
                                            <td><?= htmlspecialchars($post['created_at']); ?></td>
                                            <td>
                                                <a href="edit_blog.php?id=<?= $post['id']; ?>" class="btn btn-primary btn-sm">Chỉnh sửa</a>
                                                <a href="database/delete_post.php?id=<?= $post['id']; ?>" 
                                                   onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')" 
                                                   class="btn btn-danger btn-sm">Xóa</a>
                                            </td>
                                        </tr>
                                <?php
                                    endforeach;
                                else:
                                ?>
                                    <tr>
                                        <td colspan="6">Không có bài viết nào.</td>
                                    </tr>
                                <?php endif; ?>
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
