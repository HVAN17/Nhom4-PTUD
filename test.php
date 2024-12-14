<?php
require 'database/config.php'; // Kết nối cơ sở dữ liệu
?>
<?php
// URL của API
$api_url = 'http://localhost/cooladmin/store.php?action=get_products';

// Lấy dữ liệu từ API
$response = file_get_contents($api_url);
$products = json_decode($response, true);

// Kiểm tra lỗi khi giải mã JSON
if (json_last_error() !== JSON_ERROR_NONE) {
    die("Lỗi khi giải mã JSON: " . json_last_error_msg());
}
?>
<?php
if (isset($_GET['message']) && $_GET['message'] === 'success') {
    echo '<div class="alert alert-success">Sản phẩm đã được xóa thành công.</div>';
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
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Sản phẩm</title>

   

    <!-- Bootstrap CSS-->
    <link href="./vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="./vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="./vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="./vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="./vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="./vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="./vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="./vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
     

    <!-- Main CSS-->
    <link href="./css/theme.css" rel="stylesheet" media="all">
    <title>Danh sách Sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        /* Giới hạn chiều rộng bảng */
table {
    width: 10px;
     /* Giới hạn chiều rộng tối đa */
    margin: 0 auto; /* Căn giữa bảng */
    border-collapse: collapse;
    margin-top: 20px;
    margin-left: 300px;
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Thêm thanh cuộn nếu bảng quá lớn */
.table-container {
    overflow-x: auto;
    margin: 20px 0;
}

/* Căn chỉnh và điều chỉnh các ô trong bảng */
th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    white-space: nowrap; /* Đảm bảo không bị xuống dòng */
}

th {
    background-color: #f4c542; /* Màu vàng nhạt */
    color: white;
    text-transform: uppercase;
    font-size: 14px;
}

td {
    font-size: 14px;
    color: #555;
}

/* Giới hạn chiều rộng cột mô tả */
td:nth-child(6) {
    max-width: 200px; /* Giới hạn độ rộng cột mô tả */
    overflow: hidden;
    text-overflow: ellipsis; /* Thêm dấu "..." nếu nội dung quá dài */
    white-space: nowrap; /* Không xuống dòng */
}

        
        .editable {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 5px;
            min-width: 100px;
        }
        .button-container {
            text-align: center;
        }
        button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            margin: 5px;
        }
        button.cancel {
            background-color: red;
        }
        .js-dropdown {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    background: white;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    padding: 10px;
    z-index: 1000;
}

/* Khi dropdown hiển thị */
.js-dropdown.show-dropdown {
    display: block;
}

/* Căn chỉnh nội dung dropdown */
.js-dropdown .info {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.js-dropdown .info .image img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}

.js-dropdown .info .content h5 {
    margin: 0;
    font-size: 16px;
    font-weight: bold;
}

.js-dropdown .info .content span {
    font-size: 12px;
    color: gray;
}

.js-dropdown a {
    display: block;
    padding: 8px 10px;
    text-decoration: none;
    color: #333;
    font-size: 14px;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.js-dropdown a:hover {
    background-color: #f4f4f4;
}

.js-dropdown .account-dropdown__footer a {
    color: red;
    font-weight: bold;
}
    </style>

</head>

<body >
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
    </div>

<h1>Danh sách Sản phẩm</h1>
<div class = "table-container">
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Code</th>
            <th>Price</th>
            <th>Quantity</th>
            
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($products as $product) {
            echo '<tr data-id="' . $product['id'] . '">';
            echo '<td>' . htmlspecialchars($product['id']) . '</td>';
            echo '<td class="editable" contenteditable="true" data-column="name">' . htmlspecialchars($product['name']) . '</td>';
            echo '<td class="editable" contenteditable="true" data-column="code">' . htmlspecialchars($product['code']) . '</td>';
            echo '<td class="editable" contenteditable="true" data-column="price">' . htmlspecialchars($product['price']) . '</td>';
            echo '<td class="editable" contenteditable="true" data-column="quantity">' . htmlspecialchars($product['quantity']) . '</td>';
           
            echo '<td>
                    <button class="save-btn" data-id="' . $product['id'] . '">Cập nhật</button>
                    <button class="cancel-btn" data-id="' . $product['id'] . '">Hủy</button>
                  </td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
</div>
<script>
    // Lưu giá trị ban đầu khi người dùng chỉnh sửa
    document.querySelectorAll('.editable').forEach(cell => {
        cell.addEventListener('focus', function () {
            this.dataset.originalValue = this.innerText.trim();
        });
    });

    // Xử lý nút "Hủy"
    document.querySelectorAll('.cancel-btn').forEach(button => {
        button.addEventListener('click', function () {
            const row = this.closest('tr');
            row.querySelectorAll('.editable').forEach(cell => {
                cell.innerText = cell.dataset.originalValue || cell.innerText;
            });
        });
    });

    // Xử lý nút "Cập nhật"
    document.querySelectorAll('.save-btn').forEach(button => {
        button.addEventListener('click', function () {
            
            const productId = this.dataset.id;
            const row = this.closest('tr');
            const updatedData = {};

            row.querySelectorAll('.editable').forEach(cell => {
                const column = cell.dataset.column;
                const value = cell.innerText.trim();
                updatedData[column] = value;
            });

            updatedData.id = productId;
            updatedData.description = 
            // Gửi dữ liệu cập nhật lên server
            fetch('http://localhost/cooladmin/store.php?action=update_product', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams(updatedData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Cập nhật sản phẩm thành công');
                } else {
                    alert('Cập nhật thất bại');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Có lỗi xảy ra khi cập nhật sản phẩm');
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const accountItems = document.querySelectorAll('.account-item');

        accountItems.forEach(item => {
            const dropdown = item.querySelector('.js-dropdown');
            const toggleButton = item.querySelector('.js-acc-btn');

            // Khi nhấp vào nút, hiển thị hoặc ẩn dropdown
            toggleButton.addEventListener('click', function () {
                dropdown.classList.toggle('show-dropdown');
            });

            // Ẩn dropdown nếu nhấp bên ngoài
            document.addEventListener('click', function (e) {
                if (!item.contains(e.target)) {
                    dropdown.classList.remove('show-dropdown');
                }
            });
        });
    });
</script>
</body>
</html>
