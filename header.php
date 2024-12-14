<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Thông tin liên hệ và các liên kết mạng xã hội của Cocoon.">
    <meta name="author" content="Cocoon">
    <link href="images/logo/logo-favicon.png" rel="shortcut icon">
    <title>Cocoon</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/utility.css">
    <link rel="stylesheet" href="css/app.css">
</head>
<!-- áp dụng các quy tắc định dạng css của class "config" cho body-->
<body class="config">
    <!-- <div class ="...": áp dụng các quy tắc định dạng của một lớp nào đó cho thẻ div; Một thẻ có thể được định nghĩa bởi nhiều class css, các tên class được cách nhau bởi dấu cách như ví dụ ở phía dưới-->
    <div class="preloader is-active">
        <div class="preloader__wrap">
            <!-- <img class ="...">: áp dụng các quy tắc định dạng của một lớp nào đó cho thẻ img-->
            <!-- <img src ="...": chỉ định địa chỉ cho hình ảnh; alt="...": nếu không tìm được ảnh thì hiển thị với dòng chữ thay thế là ...-->
            <img class="preloader__img" src="images/preloader.png" alt="">
        </div>
    </div>

    <!--====== Main App ======-->
    <!-- <div id="...": áp dụng các quy tắc định dạng của id cho thẻ div, id chỉ sử dụng cho một phần tử, class có thể dùng chỉ định định dạng cho nhiều phần tử-->
    <div id="app">

        <!--====== Main Header ======-->
        <!-- <header class="...">: áp dụng định dạng của class ... cho thẻ header; header là thẻ định nghĩa header của trang-->
        <header class="header--style-2">

            <!--====== Nav 1 (dòng header đầu tiên) ======-->
            <!-- <nav class="...">: áp dụng định dạng của class ... cho thẻ nav; thẻ nav được sử dụng để định nghĩa thanh menu hoặc các liên kết điều hướng quan trọng trên một trang/website -->
            <nav class="primary-nav-wrapper">
                <div class="container">

                    <!--====== Primary Nav ======-->
                    <div class="primary-nav">



                        <!--====== Main Logo: đoạn code này dùng để thể hiện logo của của page trong phần header ======-->
                        <!--thẻ <a> được dùng để xác định một liên kết; liên kết đó được chỉnh định trong thuộc tính href trong thẻ a-->
                        <a class="main-logo" href="index.php">
                            <!-- khi người dùng nhấp vào hình ảnh thì nó sẽ được chuyển hướng đến trang được chỉnh định trong thuộc tính href của thẻ a-->
                            <img src="images/logo/logo-1.png" alt="">
                        </a>
                        <!--====== End - Main Logo ======-->
                        <!--====== Search Form: đoạn code này dùng để thể hiện nội dung của thanh tìm kiếm ======-->
                        <!--Thẻ form dùng để tạo ra một biểu mẫu người dùng có thể nhập dữ liệu vào và gửi nó đến máy chủ-->
                        <form id="search-form" class="main-form" action="http://localhost/Admin/CoolAdmin/search_results.php" method="GET">
                            <label for="main-search"></label>
    <input
        class="input-text input-text--border-radius input-text--only-white"
        type="text"
        id="main-search"
        name="query"
        placeholder="Tìm kiếm sản phẩm"
        required
    >
    <button class="btn btn--icon fas fa-search main-search-button" type="submit"></button>
</form>






<!-- Kết quả tìm kiếm -->
<div id="search-results" class="search-results"></div>


                        <!--====== End - Search Form ======-->
                        <!--====== Dropdown Main plugin: đoạn code này dùng để thể hiện nội dung của các nút tài khoản, liên hệ, gửi mail ======-->
                        <div class="menu-init" id="navigation">
                            <!--Lớp fas fa-cogs là một lớp của Font Awesome, một thư viện biểu tượng, và nó hiển thị một biểu tượng cogs (cơ cấu). Nút này có thể được sử dụng để mở / đóng menu. type="button" Đây là giá trị mặc định cho thẻ button. Nút này không có hành vi mặc định khi được nhấp vào.-->
                            <button style="color:aliceblue;" class="btn btn--icon toggle-button toggle-button--white fas fa-cogs" type="button"></button>



                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">
                                <span class="ah-close">X Đóng</span>


                                <!--====== Thẻ ul được sử dụng để hiển thị một danh sách không sắp xếp ======-->
                                <ul class="ah-list ah-list--design1 ah-list--link-color-white">
                                    <!-- đoạn code này dùng để hiển thị những nội dung liên quan đến icon tài khoản-->
                                    <!-- Thẻ li được dùng để khai báo một mục của danh sách trong thẻ ul; -->
                                    <!--data-tooltip: Thuộc tính được sử dụng để khởi tạo gợi ý. Trong trường hợp này, nó được đặt bằng “tooltip”, cho biết rằng một gợi ý nên được hiển thị khi di chuột qua phần tử này-->
                                    <!--Thuộc tính data-placement xác định vị trí của gợi ý so với phần tử mà nó được gắn vào. Trong trường hợp này, nó được đặt bằng “left”, cho biết rằng gợi ý xuất hiện ở bên trái của phần tử-->
                                    <!--Title: xác định nội dung của gợi ý, đó là Tài khoản-->
                                    <li class="has-dropdown" data-tooltip="tooltip" data-placement="left" title="Tài khoản">
                                        <a><i class="far fa-user-circle"></i></a>

                                        <!--====== Dropdown: đoạn code này dùng để thể hiện nội dung thả xuống khi hover chuột vào nút tài khoản ======-->

                                        <span class="js-menu-toggle"></span>
                                        <!--style="width:120px": dùng để xác định chiều rộng của danh sách-->
                                        <ul style="width:120px">
                                            <li>

                                                <a href="dashboard.html">
                                                    <!--Thẻ i trong trường hợp này dùng để sử dụng cùng với các thư viện icon-->
                                                    <i class="fas fa-user-circle u-s-m-r-6"></i>
                                                    <span>Tài khoản</span>
                                                </a>
                                            </li>
                                           
                                            <li>

                                                <a href="signup.html">
                                                    <i class="fas fa-lock-open u-s-m-r-6"></i>
                                                    <span>Đăng xuất</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="login.html">
                                                    <i class="far fa-user-circle u-s-m-r-6"></i>
                                                    <span>  Admin </span>
                                                </a>
                                            </li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>

                                    <!-- đoạn code này dùng để hiển thị những nội dung liên quan đến icon Liên hệ-->
                                    <li data-tooltip="tooltip" data-placement="left" title="Liên hệ">
                                        <a href="tel:+0900901904"><i class="fas fa-phone-volume"></i></a>
                                    </li>

                                    <!-- đoạn code này dùng để hiển thị những nội dung liên quan đến icon email-->
                                    <li data-tooltip="tooltip" data-placement="left" title="Gửi mail">
                                        <a href="#"><i class="far fa-envelope"></i></a>
                                    </li>


                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->
                    </div>
                    <!--====== End - Primary Nav ======-->
                </div>
            </nav>
            <!--====== End - Nav 1 (hết dòng menu đầu tiên) ======-->
            <!--====== Nav 2 (dòng menu thứ hai) ======-->
            <nav class="secondary-nav-wrapper">
                <div class="container">

                    <!--====== Secondary Nav ======-->
                    <div class="secondary-nav">

                        <!--====== Dropdown Main plugin: dòng code này nhằm mục đích để thanh menu trang chủ, cửa hàng,... được đẩy vào giữa ======-->
                        <!--======Tạo responsive design cho header-->
                        <div class="menu-init" id="navigation1">
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->
                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation2">

                            <button style="color:aliceblue;" class="btn btn--icon toggle-button toggle-button--white fas fa-bars" type="button"></button>
                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">
                                <span class="ah-close">X Đóng</span>

                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design2 ah-list--link-color-white">

                                    <li>
                                        <a href="index.php">TRANG CHỦ</a>
                                    </li>

                                    <li class="has-dropdown">
                                        <a href="shop-grid-left.php">CỬA HÀNG<i class="fas fa-angle-down u-s-m-l-6"></i></a>

                                        <!--====== Dropdown ======-->
                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:170px">
    <?php
    require 'database/config.php';

    // Truy vấn danh mục
    $sql = "SELECT id, name FROM categories";
    $stmt = $pdo->query($sql);
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Thêm tùy chọn "Tất cả sản phẩm"
    echo '<li><a href="javascript:void(0)" class="filter-category" data-category-id="0">Tất cả sản phẩm</a></li>';

    // Thêm các danh mục sản phẩm vào menu
    foreach ($categories as $category) {
        echo '<li><a href="javascript:void(0)" class="filter-category" data-category-id="' . $category['id'] . '">'
            . htmlspecialchars($category['name']) . '</a></li>';
    }
    ?>
</ul>

                                        <!--====== End - Dropdown ======-->
                                    </li>

                                    <li>
                                        <a href="blog.php">BLOG</a>
                                    </li>

                                    <li>
                                        <a href="aboutcoon.php">VỀ COCOON</a>
                                    </li>

                                    <li>
                                        <a href="cart.php">THANH TOÁN</a>
                                    </li>

                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->
                        <!--====== Dropdown Main plugin: đoạn code này dùng để thể hiện các biểu tượng wishlist; giỏ hàng và những nội dung liên quan đến biểu tương ======-->
                        <div class="menu-init" id="navigation3">
                            <button style="color:aliceblue;" class="btn btn--icon toggle-button toggle-button--white fas fa-shopping-bag toggle-button-shop" type="button"></button>
                            <div class="ah-lg-mode">
                                <span class="ah-close">X Đóng</span>
                                <!--====== Menu ======-->
                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design1 ah-list--link-color-white">

                                    <!--Biểu tượng wishlist-->
                                    <li>
                                        <a href="dash-my-wishlist.html"><i class="far fa-heart"></i></a>
                                    </li>

                                    <!--Biểu tượng giỏ hàng-->
<li class="has-dropdown">
    <a class="mini-cart-shop-link" href="http://localhost/Admin/CoolAdmin/cart.php"> <!-- Thay "/cart" bằng link bạn muốn -->
        <i class="fas fa-shopping-bag"></i>
        <span class="total-item-round"></span>
    </a>

    <!--====== Dropdown ======-->
    <span class="js-menu-toggle"></span>
    <div class="mini-cart">
    </div>

        </header>
        <!--====== End - Main Header ======-->
  </div>
                                </div>
                            </div>
                        </div>
                        

                <script>
                    // Tạo đối tượng Google Analytics
                    window.ga = function () {
                        ga.q.push(arguments)
                    };
                    ga.q = [];
                    ga.l = +new Date;
                    // Khởi tạo Google Analytics với ID trang web
                    ga('create', 'UA-XXXXX-Y', 'auto');
                    // Gửi thông tin trang cho Google Analytics
                    ga('send', 'pageview')
                </script>
                <!-- Nạp script của Google Analytics từ địa chỉ cung cấp -->
                <script src="https://www.google-analytics.com/analytics.js" async defer></script>

                <!--====== Vendor Js ======-->
                <!-- Nạp các tập tin JavaScript của bên thứ ba (Vendor Js) -->
                <script src="js/vendor.js"></script>

                <!--====== jQuery Shopnav plugin ======-->
                <!-- Nạp plugin jQuery Shopnav -->
                <script src="js/jquery.shopnav.js"></script>

                <!--====== App ======-->
                <!-- Nạp script của ứng dụng chính (App) -->
                <script src="js/app.js"></script>

                <!--====== Noscript ======-->
                <!-- Hiển thị thông báo khi JavaScript bị tắt -->
                <noscript>
                    <div class="app-setting">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="app-setting__wrap">
                                        <h1 class="app-setting__h1">JavaScript đã tắt trong trình duyệt.</h1>

                                        <span class="app-setting__text">Vui lòng kích hoạt JavaScript trong trình duyệt hoặc nâng cấp lên một trình duyệt hỗ trợ JavaScript.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </noscript>
                <script>
    document.addEventListener('DOMContentLoaded', function () {
        const categoryLinks = document.querySelectorAll('.filter-category');
        const productList = document.querySelector('.row.is-grid-active'); // Vùng chứa sản phẩm

        // Gán sự kiện click cho từng liên kết danh mục
        categoryLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault(); // Ngăn chặn hành động mặc định

                const categoryId = this.getAttribute('data-category-id'); // Lấy ID danh mục từ thuộc tính data-category-id

                // Gửi yêu cầu AJAX để lấy sản phẩm theo danh mục
                fetch('ajax_load_products.php?category_id=' + categoryId)
                    .then(response => response.text())
                    .then(data => {
                        productList.innerHTML = data; // Cập nhật danh sách sản phẩm
                        attachAddToCartEvents(); // Gán lại sự kiện cho các nút thêm vào giỏ hàng
                    })
                    .catch(error => console.error('Error:', error));
            });
        });

        // Hàm gán lại sự kiện cho các nút "Thêm vào giỏ hàng"
        function attachAddToCartEvents() {
            const addToCartButtons = document.querySelectorAll('.btn--e-brand');
            addToCartButtons.forEach(button => {
                button.removeEventListener('click', addToCartHandler); // Xóa sự kiện cũ (nếu có)
                button.addEventListener('click', addToCartHandler); // Gắn sự kiện mới
            });
        }

        // Hàm xử lý sự kiện "Thêm vào giỏ hàng"
        function addToCartHandler(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định

            const productId = this.getAttribute('data-id');
            const productName = this.getAttribute('data-name');
            const productPrice = this.getAttribute('data-price');

            // Gửi yêu cầu AJAX thêm sản phẩm vào giỏ hàng
            fetch('cart_handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=add_to_cart&product_id=${productId}&quantity=1&product_name=${encodeURIComponent(productName)}&product_price=${productPrice}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert(data.message); // Hiển thị thông báo thành công
                    updateCartCount();  // Cập nhật số lượng giỏ hàng
                } else {
                    alert(data.message); // Hiển thị thông báo lỗi
                }
            })
            .catch(error => console.error('Lỗi:', error));
        }

        // Hàm cập nhật số lượng giỏ hàng
        function updateCartCount() {
            fetch('cart_handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=get_cart_count'
            })
            .then(response => response.json())
            .then(data => {
                const cartCount = document.getElementById('cart-count');
                if (cartCount) {
                    cartCount.textContent = data.count; // Cập nhật số lượng giỏ hàng
                }
            })
            .catch(error => console.error('Lỗi cập nhật giỏ hàng:', error));
        }
    });
</script>



</body>
</html>