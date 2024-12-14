<?php
require_once 'database/config.php'; // Kết nối tới cơ sở dữ liệu

// Bắt đầu session để lưu thông báo
session_start();

// Lấy thông tin sản phẩm cần chỉnh sửa
$id = $_GET['id'] ?? null;

if ($id) {
    // Truy vấn thông tin sản phẩm
    $productSql = "SELECT * FROM products WHERE id = :id";
    $productStmt = $pdo->prepare($productSql);
    $productStmt->execute([':id' => $id]);
    $product = $productStmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        die("Sản phẩm không tồn tại.");
    }

    // Truy vấn danh sách danh mục
    $categoriesSql = "SELECT * FROM categories";
    $categoriesStmt = $pdo->query($categoriesSql);
    $categories = $categoriesStmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    die("Không tìm thấy sản phẩm.");
}

// Xử lý khi gửi form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy thông tin từ form
    $name = htmlspecialchars(trim($_POST['name']));
    $code = htmlspecialchars(trim($_POST['code']));
    $price = htmlspecialchars(trim($_POST['price']));
    $quantity = htmlspecialchars(trim($_POST['quantity']));
    $category_id = htmlspecialchars(trim($_POST['category_id']));
    $imagePath = $product['image']; // Giữ nguyên ảnh nếu không tải lên mới

    // Kiểm tra nếu có ảnh mới
    if (!empty($_FILES['image']['name'])) {
        $targetDir = "database/uploads/";
        $imageFile = basename($_FILES['image']['name']);
        $targetFilePath = $targetDir . $imageFile;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                $imagePath = $imageFile;
            } else {
                die("Lỗi khi tải lên hình ảnh!");
            }
        } else {
            die("Định dạng file không hợp lệ!");
        }
    }

    // Cập nhật thông tin sản phẩm trong cơ sở dữ liệu
    $updateSql = "
        UPDATE products 
        SET name = :name, code = :code, price = :price, quantity = :quantity, category_id = :category_id, image = :image 
        WHERE id = :id
    ";
    $updateStmt = $pdo->prepare($updateSql);

    if ($updateStmt->execute([
        ':name' => $name,
        ':code' => $code,
        ':price' => $price,
        ':quantity' => $quantity,
        ':category_id' => $category_id,
        ':image' => $imagePath,
        ':id' => $id
    ])) {
        $_SESSION['message'] = "Cập nhật sản phẩm thành công!";
        header("Location: products.php");
        exit();
    } else {
        echo "Lỗi: Không thể cập nhật sản phẩm.";
    }
}
?>
<?php
session_start(); // Bắt đầu session

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
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                            <!-- <div class=""> -->
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Sửa sản phẩm </strong>
                                        <div class="container mt-5">

                                        <div class="container mt-5">
    <h2>Sửa sản phẩm</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($product['name']); ?>" required>
        </div>
        <div class="form-group">
            <label for="code">Mã sản phẩm</label>
            <input type="text" name="code" id="code" class="form-control" value="<?= htmlspecialchars($product['code']); ?>" required>
        </div>
        <div class="form-group">
            <label for="price">Giá</label>
            <input type="number" name="price" id="price" class="form-control" value="<?= htmlspecialchars($product['price']); ?>" required>
        </div>
        <div class="form-group">
            <label for="quantity">Số lượng</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="<?= htmlspecialchars($product['quantity']); ?>" required>
        </div>
        <div class="form-group">
            <label for="category_id">Danh mục</label>
            <select name="category_id" id="category_id" class="form-control">
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id']; ?>" 
                        <?= $category['id'] == $product['category_id'] ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($category['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Ảnh sản phẩm</label>
            <input type="file" name="image" id="image" class="form-control">
            <p>Ảnh hiện tại: <?= htmlspecialchars($product['image']); ?></p>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="products.php" class="btn btn-secondary">Hủy</a>
    </form>
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