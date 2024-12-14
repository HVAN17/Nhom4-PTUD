<?php
session_start();


// Kiểm tra người dùng đã đăng nhập chưa
if (!isset($_SESSION['user_id'])) {
    echo "<p>Vui lòng đăng nhập trước khi thanh toán.</p>";
    exit();
}


// Kết nối cơ sở dữ liệu
$host = 'localhost';       // Tên máy chủ
$username = 'root';        // Tên người dùng
$password = '';            // Mật khẩu
$database = 'cocoon_db';   // Tên cơ sở dữ liệu


$conn = new mysqli($host, $username, $password, $database);


// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
}


// Kiểm tra giỏ hàng
$cart = isset($_SESSION['cart']) && is_array($_SESSION['cart']) ? $_SESSION['cart'] : [];


if (empty($cart)) {
    echo "<p>Giỏ hàng trống. Vui lòng thêm sản phẩm trước khi thanh toán.</p>";
    exit();
}


// Lấy user_id từ session
$user_id = $_SESSION['user_id'];


?>


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <style>
        /* Chèn CSS vào trong phần <style> */

    font-family: 'Arial', sans-serif;
    background-color: #f8f8f8;
    color: #333;
    margin: 0;
    padding: 0;
}

.container {
    width: 60%;
    margin: 50px auto;
    padding: 40px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #6d4c41;
    font-size: 28px;
    margin-bottom: 30px;
}

h3 {
    color: #6d4c41;
    margin-bottom: 15px;
    font-size: 22px;
    text-transform: uppercase;
}

/* Phần form */
form .form-label {
    font-weight: bold;
    color: #6d4c41;
    margin-bottom: 8px;
}

form input[type="text"],
form input[type="tel"],
form input[type="email"] {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 16px;
    background-color: #f9f9f9;
    transition: all 0.3s ease;
}


/* Thêm hiệu ứng khi focus vào input */
form input[type="text"]:focus,
form input[type="tel"]:focus,
form input[type="email"]:focus {
    border-color: #6d4c41;
    background-color: #fff;
    box-shadow: 0 0 5px rgba(109, 76, 65, 0.2);
}

/* Phần phương thức thanh toán */
.payment-methods {
    margin-bottom: 25px;
}

.payment-methods label {
    display: flex;
    align-items: center;
    font-size: 18px;
    margin-bottom: 10px;
    color: #333;
}

.payment-methods input[type="radio"] {
    margin-right: 10px;
    accent-color: #6d4c41;
}

.payment-methods input[type="radio"]:checked + span {
    font-weight: bold;
    color: #6d4c41;
}

/* Nút thanh toán */
button {
    width: 100%;
    padding: 14px;
    background-color:rgb(76, 52, 45);
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #4e3629;
}

button:active {
    background-color:rgb(87, 62, 58);
}

/* Footer */
.footer {
    text-align: center;
    margin-top: 50px;
    padding: 20px;
    background-color: #6d4c41;
    color: white;
    border-radius: 10px;
}

.footer a {
    color: white;
    text-decoration: none;
}

.footer a:hover {
    text-decoration: underline;
}
/* CSS cho bảng chi tiết đơn hàng */
table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        th {
            background-color: #6d4c41;
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color:rgb(255, 255, 255);
        }

        tfoot {
            background-color: #f8f8f8;
            font-weight: bold;
        }

        tfoot td {
            border-top: 2px solid #ddd;
            padding-top: 16px;
        }
    </style>
</head>
<body>
<?php include('header.php'); ?>
    <div class="container">
        <h2>Chi tiết Thanh toán</h2>


        <table>
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Tổng cộng</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $total = 0;
            foreach ($cart as $productId => $details) {
                $query = "SELECT name, price FROM products WHERE id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $productId);
                $stmt->execute();
                $result = $stmt->get_result();


                if ($row = $result->fetch_assoc()) {
                    $name = $row['name'];
                    $price = $row['price'];
                    $quantity = $details['quantity'];
                    $subtotal = $price * $quantity;
                    $total += $subtotal;


                    echo "<tr>
                        <td>$name</td>
                        <td>$quantity</td>
                        <td>" . number_format($price, 0, ',', '.') . " VND</td>
                        <td>" . number_format($subtotal, 0, ',', '.') . " VND</td>
                    </tr>";
                } else {
                    echo "<tr><td colspan='4'>Sản phẩm không tồn tại.</td></tr>";
                }
                $stmt->close();
            }
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" style="text-align: right;">Tổng cộng:</td>
                    <td><?php echo number_format($total, 0, ',', '.'); ?> VND</td>
                </tr>
            </tfoot>
        </table>


        <h3>Thông tin thanh toán</h3>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Họ và tên</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>


            <h3>Phương thức thanh toán</h3>
            <div class="payment-methods">
                <label class="payment-method">
                    <input type="radio" name="payment_method" value="credit_card" required>
                    <span>VNPay</span>
                </label>
                <label class="payment-method">
                    <input type="radio" name="payment_method" value="paypal" required>
                    <span>Chuyển khoản</span>
                </label>
                <label class="payment-method">
                    <input type="radio" name="payment_method" value="cod" required>
                    <span>Thanh toán khi nhận hàng</span>
                </label>
            </div>

            <div class="payment-methods">
                <!-- Giả sử đây là phần giao diện thanh toán -->
                <div id="cash-on-delivery-info" style="display:none;">
                    <p><a href="order-confirmation.php">Xác nhận đơn hàng và thanh toán khi nhận hàng</a></p>
                </div>
            </div>
                        <div class="button-container">
                <button type="submit" name="submit_payment">Thanh toán</button>
            </div>
        </form>
        <script>
            // JavaScript để hiển thị liên kết khi chọn phương thức "Thanh toán khi nhận hàng"
            document.querySelector('input[name="payment_method"][value="cod"]').addEventListener('change', function() {
                document.getElementById('cash-on-delivery-info').style.display = 'block';
            });

            // Hàm toggle menu hamburger
            function toggleMenu() {
                document.getElementById('navbar-mobile').classList.toggle('show');
            }
        </script>

        <?php
        if (isset($_POST['submit_payment'])) {
            // Lấy thông tin thanh toán
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $paymentMethod = $_POST['payment_method'] ?? '';
            $status = 'pending';  // Trạng thái đơn hàng

            if ($paymentMethod != 'cod') {
                echo '<div class="qr-container">';
                echo '<h3>Mã QR Thanh toán</h3>';
                echo '<img src="https://api.qrserver.com/v1/create-qr-code/?data=https://example.com/payment&size=200x200" alt="QR Code" />';
                echo "<p>Quét mã QR để thanh toán.</p>";
                echo '</div>';
            } else {
                echo "<p>Chọn phương thức thanh toán khi nhận hàng.</p>";
            }
            
            // Thêm user_id vào câu truy vấn INSERT
            $query = "INSERT INTO orders (name, address, phone, email, total_amount, payment_method, status, user_id)
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);


            // Kiểm tra nếu câu lệnh chuẩn bị thành công
            if ($stmt === false) {
                die("Lỗi chuẩn bị câu lệnh: " . $conn->error);
            }


            // Ràng buộc các tham số vào câu truy vấn
            $stmt->bind_param("ssssdssi", $name, $address, $phone, $email, $total, $paymentMethod, $status, $user_id);


            // Thực thi câu lệnh
            if ($stmt->execute()) {
                // Lấy ID của đơn hàng vừa tạo
                $orderId = $stmt->insert_id;


                // Thêm chi tiết sản phẩm vào bảng order_items và cập nhật số lượng sản phẩm
                foreach ($cart as $productId => $details) {
                    $quantity = $details['quantity'];
                    $stmt_product = $conn->prepare("SELECT price FROM products WHERE id = ?");
                    $stmt_product->bind_param("i", $productId);
                    $stmt_product->execute();
                    $result = $stmt_product->get_result();
                    $row = $result->fetch_assoc();
                    $price = $row['price'];


                    // Thêm chi tiết sản phẩm vào bảng order_items
                    $stmt_item = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
                    $stmt_item->bind_param("iiid", $orderId, $productId, $quantity, $price);
                    $stmt_item->execute();
                    $stmt_item->close();


                    // Cập nhật số lượng sản phẩm trong bảng products
                    $stmt_update = $conn->prepare("UPDATE products SET quantity = quantity - ? WHERE id = ?");
                    $stmt_update->bind_param("ii", $quantity, $productId);
                    $stmt_update->execute();
                    $stmt_update->close();
                }


                // Xóa giỏ hàng
                unset($_SESSION['cart']);


                // Thông báo thành công
                echo "<p>Thanh toán thành công! Đơn hàng của bạn đã được tạo. Mã đơn hàng: $orderId</p>";
            } else {
                echo "<p>Đã xảy ra lỗi trong quá trình thanh toán. Vui lòng thử lại sau.</p>";
            }


            $stmt->close();
        }
        ?>
    </div>
    <?php include('admin/footer.php'); ?>
</body>
</html>
