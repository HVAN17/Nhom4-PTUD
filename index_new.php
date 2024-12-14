  <!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <meta name="author" content="">
    <link href="images/logo/logo-favicon.png" rel="shortcut icon">
    <title>Cocoon</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/utility.css">
    <link rel="stylesheet" href="css/app.css">
</head>
<body class="config">

    <div class="preloader is-active">
        <div class="preloader__wrap">
            <img class="preloader__img" src="images/preloader.png" alt="">
        </div>
    </div>
        <header class="header--style-2">
            <nav class="primary-nav-wrapper">
                <div class="container">
                    <div class="primary-nav">
                        <a class="main-logo" href="index.php">
                            <img src="images/logo/logo-1.png" alt="">
                        </a>
                        <form class="main-form">
                            <label for="main-search"></label>
                            <input class="input-text input-text--border-radius input-text--only-white" type="text" id="main-search" placeholder="Tìm kiếm">
                            <button class="btn btn--icon fas fa-search main-search-button" type="submit"></button>
                        </form>
        
                        <div class="menu-init" id="navigation">
                            <button style="color:aliceblue;" class="btn btn--icon toggle-button toggle-button--white fas fa-cogs" type="button"></button>
                            <div class="ah-lg-mode">
                                <span class="ah-close">X Đóng</span>
                                <ul class="ah-list ah-list--design1 ah-list--link-color-white">
                                
                                    <li class="has-dropdown" data-tooltip="tooltip" data-placement="left" title="Tài khoản">
                                        <a><i class="far fa-user-circle"></i></a>
                                        <span class="js-menu-toggle"></span>
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

                                            <li class="has-dropdown has-dropdown--ul-left-100">
                                                <a href="shop-grid-left.php">Sản phẩm mới</a>
                                            </li>

                                            <li class="has-dropdown has-dropdown--ul-left-100">
                                                <a href="shop-grid-left.php">Dưỡng môi</a>


                                            </li>

                                            <li class="has-dropdown has-dropdown--ul-left-100">
                                                <a href="shop-grid-left.php">Chăm sóc da</a>

                                            <li class="has-dropdown has-dropdown--ul-left-100">
                                                <a href="shop-grid-left.php">Chăm sóc tóc</a>
                                            </li>
                                            <li class="has-dropdown has-dropdown--ul-left-100">
                                                <a href="shop-grid-left.php">Combo/Bộ Sản phẩm</a>

                                            </li>
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

                                    <!--Biểu tưởng giỏ hàng-->
                                    <li class="has-dropdown">
    <a class="mini-cart-shop-link" href="http://localhost/Admin/CoolAdmin/cart.php"> <!-- Thay "/cart" bằng link bạn muốn -->
        <i class="fas fa-shopping-bag"></i>
        <span class="total-item-round"></span>
    </a>


                                        <!--====== Dropdown ======-->
                                        <span class="js-menu-toggle"></span>
                                        <div class="mini-cart">
        </header>
        <!--====== End - Main Header ======-->
        <!--====== App Content ======-->
        <div class="app-content">


            <!--====== App Content ======-->
            <div class="app-content">

                <!--====== App Content ======-->
                <div class="app-content">

                    <!--======  Slider chính ======-->
                    <div class="s-skeleton s-skeleton--h-600 s-skeleton--bg-grey">
                        <div class="owl-carousel primary-style-1" id="hero-slider">

                            <!--Slider đầu tiên-->
                            <div class="hero-slide hero-slide--7 ">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="slider-content slider-content--animation">

                                                <span class="content-span-1 u-c-secondary">SIÊU SALE HẤP DẪN</span>

                                                <span class="content-span-2 u-c-secondary">MỸ PHẨM THUẦN CHAY, LÀNH TÍNH</span>

                                                <span class="content-span-3 u-c-secondary">GIẢM ĐẾN 50%</span>

                                                <span class="content-span-4 u-c-secondary">
                                                    Từ 10/12/2024 đến 25/12/2024
                                                </span>
                                                <br />
                                                <br />
                                                <br />
                                                <a class="shop-now-link btn--e-brand" href="shop-grid-left.php">MUA NGAY</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Slider thứ hai-->
                            <div class="hero-slide hero-slide--8">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="slider-content slider-content--animation">

                                                <span class="content-span-1 u-c-white">SIÊU SALE NGÀY ĐÔI</span>

                                                <span class="content-span-2 u-c-white">Miễn phí vận chuyển</span>

                                                <span class="content-span-3 u-c-white">Áp dụng cho đơn hàng từ 300.000đ</span>

                                                <span class="content-span-4 u-c-white">
                                                    Giá chỉ từ
                                                    <span class="u-c-brand">30.000đ</span>
                                                </span>
                                                <a class="shop-now-link btn--e-brand" href="shop-grid-left.php">MUA NGAY</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--Slider cuối cùng-->
                            <div class="hero-slide hero-slide--9">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="slider-content slider-content--animation">

                                                <span class="content-span-1 u-c-secondary">GIẢM GIÁ CỰC SỐC</span>

                                                <span class="content-span-2 u-c-secondary">GIẢM ĐẾN 25%</span>

                                                <span class="content-span-3 u-c-secondary">Dành cho khách hàng thân thiết</span>

                                                <span class="content-span-4 u-c-secondary">
                                                    Áp dụng đến hết tháng
                                                    <span class="u-c-brand">hết tháng 12</span>
                                                </span>

                                                <a class="shop-now-link btn--e-brand" href="shop-grid-left.php">MUA NGAY</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--====== End - Primary Slider ======-->
                    <!--====== Section 1: hiển thị các danh mục sản phẩm ======-->
                    <div class="u-s-p-b-60">
                            <h1 style="text-align: center;" class="section__heading u-c-secondary u-s-m-b-12">DANH MỤC SẢN PHẨM</h1>
                           

                        <!--====== Section Content ======-->
                        <div class="section__content">
    <div class="container">
        <div class="row">
            <?php
            require_once 'database/config.php'; // Kết nối đến cơ sở dữ liệu
            
            $sql = "SELECT * FROM categories";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $categories = $stmt->fetchAll();
            
            foreach ($categories as $category) {
                echo '<div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">';
                echo '    <div class="promotion-o">';
                echo '        <div class="aspect aspect--bg-grey aspect--square">';
                echo '            <img class="aspect__img" src="database/uploads/' . htmlspecialchars($category['image']) . '" alt="">';
                echo '        </div>';
                echo '        <div class="promotion-o__content">';
                echo '            <a class="promotion-o__link btn--e-white-brand" href="shop-grid-left.php">' . htmlspecialchars($category['name']) . '</a>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>

                    </div>
                    <!--====== End - Section 1 - DANH MỤC SẢN PHẨM ======-->
                    <!--====== Section 2: hiển thị banner quảng cáo và 2 sản phẩm ======-->
                    <div class="u-s-p-b-60">

                        <!--====== Section Content ======-->
                        <div class="section__content">
                            <div class="container">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">

                                            <a class="i3-banner" href="shop-grid-left.php">
                                                <div class="aspect aspect--bg-grey-fb aspect--square">

                                                    <img class="aspect__img i3-banner__img" src="images/banners/i3-banner-1.jpg" alt=""> <!--Ảnh banner-->
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-6 u-s-m-b-30">
                                                    <div class="product-short u-h-100">
                                                        <div class="product-short__container">
                                                            <div class="product-short__img-wrap">

                                                                <a class="aspect aspect--bg-grey-fb aspect--square u-d-block" href="product_detail.php">

                                                                    <img class="aspect__img product-short__img" src="images/product/chamsocda/product5.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="product-short__info">

                                                                <span class="product-short__price">325.000đ</span>  <!--Giá sản phẩm-->

                                                                <span class="product-short__name">

                                                                    <a href="product_detail.php">Cà phê Đắk Lắk làm sạch da chết cơ thể 600ml</a> <!--Tên sản phẩm-->
                                                                </span>

                                                                <span class="product-short__category">

                                                                    <a href="shop-grid-left.php">Chăm sóc da</a> <!--Danh mục sản phẩm-->
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6 col-6 u-s-m-b-30">
                                                    <div class="product-short u-h-100">
                                                        <div class="product-short__container">
                                                            <div class="product-short__img-wrap">

                                                                <a class="aspect aspect--bg-grey-fb aspect--square u-d-block" href="product_detail.php">

                                                                    <img class="aspect__img product-short__img" src="images/product/chamsoctoc/product6.jpg" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="product-short__info">

                                                                <span class="product-short__price">215.000đ</span> <!--Giá sản phẩm-->

                                                                <span class="product-short__name">

                                                                    <a href="product_detail.php">Kem ủ tóc bưởi 200ml </a> <!--Tên sản phẩm-->
                                                                </span>

                                                                <span class="product-short__category">

                                                                    <a href="shop-grid-left.php">Chăm sóc tóc</a> <!--Danh mục sản phẩm-->
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">

                                                    <a class="i3-banner" href="shop-grid-left.php">
                                                        <div class="aspect aspect--bg-grey-fb aspect--1048-334">

                                                            <img class="aspect__img i3-banner__img" src="images/banners/i3-banner.jpg" alt=""> <!--Ảnh banner-->
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--====== End - Section Content ======-->
                    </div>
                    <!--====== End - Section 2 ======-->
                    <!--====== Section 3: hiển thị sản phẩm mới ======-->
                    

                    <!--====== Section Intro ======-->
                    <div class="section__intro u-s-m-b-46">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="section__text-wrap">
                                            <h1 class="section__heading u-c-secondary u-s-m-b-12">SẢN PHẨM NỔI BẬT</h1>
                                            <span class="section__span u-c-silver">SẢN PHẨM ĐƯỢC YÊU THÍCH NHẤT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                                <div  class ="row" id="id">
                                
    <!-- Danh sách sản phẩm sẽ hiển thị ở đây -->
        </div>
         

<script>
// Hàm để lấy sản phẩm từ API và hiển thị
function fetchProducts() {
    fetch('http://localhost/cooladmin/getproduct.php') // Đảm bảo đường dẫn đúng
        .then(response => response.json())  // Chuyển dữ liệu JSON thành mảng JavaScript
        .then(data => {
            let productList = document.getElementById('id');
            productList.innerHTML = ''; // Xóa dữ liệu cũ

            // Lặp qua từng sản phẩm và thêm vào danh sách
        
            data.forEach(product => {
                let productHTML = `
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-6 u-s-m-b-30">
                        <div class="product-r u-h-100">
                            <div class="product-r__container">
                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product_detail.php?id=${product.id}">
                                    <img class="aspect__img" src="database/uploads/${product.image}" alt="${product.name}">
                                </a>
                                <div class="product-r__action-wrap">
                                    <ul class="product-r__action-list">
                                        <li>
                                            <a href="product_detail.php?id=${product.id}" title="Xem sản phẩm"><i class="fas fa-eye"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-r__info-wrap">

                                                <span class="product-r__category">

                                                    <a href="shop-grid-left.php">Đồng hồ nữ</a>
                                                </span>
                                                <div class="product-r__n-p-wrap">

                                                    <span class="product-r__name">

                                                        <a href="product_detail.php">${product.name}</a>
                                                    </span>
                                                </div>
                                                <div>
                                                    <span class="product-r__price">${product.price}</span>
                                                </div>

                                                <span class="product-r__description product-description">${product.description}</span> <!--Mô tả sản phẩm-->
                                            </div>
                        </div>
                                            
                    </div>
                `;
                productList.innerHTML += productHTML;
            });
        })
        .catch(error => console.error('Error:', error));
}

// Gọi hàm để lấy sản phẩm khi trang tải
fetchProducts();
</script>



                    <div class="u-s-p-b-60">
                  
                    </div>
                    <!--====== End - Section 3: hiển thị một số sản phẩm bán chạy nhất, có thể hiển thị theo danh mục sản phẩm ======-->
            
                    </div>
                    <!--====== End - Section 4 ======-->
                    <!--=====thêm Section 4.2 đếm ngược gỉam giá   =====-->
                    <!--====== Section 4.2 ======-->
                    <div class="banner-bg">

                        <!--====== Section Content ======-->
                        <div class="section__content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="banner-bg__countdown">
                                            <div class="countdown countdown--style-banner" data-countdown="2024/12/21"></div>
                                        </div>
                                        <div class="banner-bg__wrap">
                                            <div class="banner-bg__text-1">

                                                <span class="u-c-white">Siêu Sale</span>

                                                <span class="u-c-brand">12/12</span>
                                            </div>
                                            <div class="banner-bg__text-2">

                                                <span class="u-c-secondary">Đừng bỏ lỡ</span>

                                                <span class="u-c-brand">ưu đãi 25%</span>
                                            </div>

                                            <span class="banner-bg__text-block banner-bg__text-3 u-c-secondary">Áp dụng cho tất cả các sản phẩm của shop từ ngày 12/12/2024 đến hết ngày 21/12/2024</span>

                                            <a class="banner-bg__shop-now btn--e-secondary" href="shop-grid-left.html">MUA NGAY</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--====== Kết thúc - Nội dung section 4 ======-->
                    </div>
                    <!-- Bài viết mới nhất -->
                    <?php
require_once 'database/config.php';

// Truy vấn lấy 3 bài viết mới nhất
$sql = "SELECT id, title, content, image_path FROM posts ORDER BY id DESC LIMIT 3";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="posts-container">
    <?php foreach ($posts as $post): ?>
        <div class="post-item">
            <div class="post-image">
                <img src="database/uploads/<?= htmlspecialchars($post['image_path']); ?>" alt="<?= htmlspecialchars($post['title']); ?>">
            </div>
            <div class="post-content">
                <span class="post-meta">Cocoon Viet Nam</span>
                <h3><?= htmlspecialchars($post['title']); ?></h3>
                <p><?= htmlspecialchars(substr($post['content'], 0, 120)); ?>...</p>
                <a href="blog-detail.php?id=<?= $post['id']; ?>" class="read-more-btn">Đọc thêm</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<style>
/* Container bài viết */
.posts-container {
    display: flex;
    justify-content: space-between;
    gap: 30px; /* Tăng khoảng cách giữa các bài viết */
    margin: 40px 20px; /* Thêm lề trái và phải để không sát lề */
}

/* Khung từng bài viết */
.post-item {
    width: 32%; /* Điều chỉnh tỷ lệ bài viết để cân đối */
    background-color: #fff;
    border: 1px solid #eee;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
}

/* Hình ảnh bài viết */
.post-image img {
    width: 100%;
    height: 250px; /* Tăng chiều cao ảnh để nổi bật hơn */
    object-fit: cover; /* Đảm bảo ảnh không bị méo */
}

/* Nội dung bài viết */
.post-content {
    padding: 20px; /* Tăng khoảng cách padding cho nội dung */
    text-align: left;
}

.post-meta {
    display: block;
    font-size: 14px;
    color: #999;
    margin-bottom: 10px;
}

.post-content h3 {
    font-size: 20px; /* Tăng kích thước tiêu đề */
    color: #333;
    margin: 10px 0;
}

.post-content p {
    font-size: 15px; /* Tăng kích thước chữ nội dung */
    color: #666;
    line-height: 1.6; /* Tăng khoảng cách dòng cho dễ đọc */
    margin-bottom: 15px;
}

/* Nút "Đọc thêm" */
.read-more-btn {
    display: block;
    text-align: center;
    margin: 0 auto;
    background-color: #8b4513; /* Màu nền nâu */
    color: #fff;
    padding: 12px 25px; /* Tăng kích thước nút */
    text-decoration: none;
    font-size: 14px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    margin-top: auto;
}

.read-more-btn:hover {
    background-color: #5c2e1a; /* Màu nâu đậm hơn khi hover */
}
</style>


                     <!-- END- Bài viết mới nhất -->
                    <!--====== End - Section 4.2 ======-->
                        <!--====== Section 6: Bình luận, đánh giá của khách hàng về chất lượng sản phẩm ======-->
                        <div class="u-s-p-b-60">
                            <h1 style="text-align: center;" class="section__heading u-c-secondary u-s-m-b-12">ĐÁNH GIÁ CỦA KHÁCH HÀNG</h1>
                            <!--====== Section Content ======-->
                            <div style="background-color: aliceblue; padding-top: 3%;" class="section__content">
                                <div class="container">
                                    <div class="row">
                                        <!--Khối hình ảnh sản phẩm-->
                                        <div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">
                                            <a class="promotion" href="product_detail.php">
                                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product_detail.php">

                                                    <img class="aspect__img" id="cothe1" src="https://image.cocoonvietnam.com/uploads/Avatar_Website_Duong_Thot_Not_f3e1a92317.jpg" alt="" onmousemove="overimg9()" onmouseout="outimg9()">
                                                </a>
                                                <script>
                                                    function overimg9() {
                                                        document.getElementById("cothe1").src = "https://image.cocoonvietnam.com/uploads/Website_Duong_Thot_not_3_1d4a38a929.jpg";
                                                    }
                                                    function outimg9() {
                                                        document.getElementById("cothe1").src = "https://image.cocoonvietnam.com/uploads/Avatar_Website_Duong_Thot_Not_f3e1a92317.jpg";
                                                    }
                                                </script>
                                        </div>
                                        <!--Khối mô tả sản phẩm-->
                                        <div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">
                                            <div class="aspect aspect--bg-grey aspect">
                                                <div class="u-c-brand">
                                                    <strong>ĐƯỜNG THỐT NỐT LÀM SẠCH CƠ THỂ</strong>
                                                </div>
                                                <div>
                                                    </br>
                                                    <span style="font-weight: bold;" class="u-c-secondary"> Thành phần chính: Đường thốt nốt An Giang, Pentavitin và Phức hợp dầu chưng cất phân tử gồm Passioline và Soline. </span>
                                                </div>
                                                </br>
                                                <div>
                                                    <span style="font-weight: bold;" class="u-c-secondary">Thích hợp với: mọi loại da cơ thể</span>
                                                </div><br>
                                                <div>
                                                    <span class="u-c-secondary">Từ những bánh đường thốt nốt ngọt ngào chúng tôi đã nghiên cứu và phát triển thành một sản phẩm hoàn hảo cho nhu cầu làm sạch da chết cơ thể. Sự hòa quyện của những tinh thể đường thốt nốt mềm mịn kết hợp với vitamin B5 và dầu mắc-ca tạo thành một kết cấu dẻo mềm cùng một mùi hương hấp dẫn nhẹ nhàng cuốn đi lớp tế bào chết già cỗi, thô ráp, để lại sau đó là cảm giác trơn láng dễ chịu.  </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Khối đánh giá của Khách hàng-->
                                        <div style=" text-align: center;" class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">
                                            <div class="aspect aspect--bg-grey aspect">
                                                <div style=" text-align: center;" class="testimonial__img-wrap">
                                                    <img style=" border-radius: 50%;" class="testimonial__img" src="images/icon/danhgia.png" width="100" alt="">
                                                </div>
                                                <div>
                                                    <span style="font-weight: bold;" class="u-c-secondary">Chị Vân </span>
                                                </div>
                                                <div>
                                                    <i class="fa fa-star" style="color: #f5ec00;"></i> <i class="fa fa-star" style="color: #f5ec00;"></i> <i class="fa fa-star" style="color: #f5ec00;"></i> <i class="fa fa-star" style="color: #f5ec00;"></i> <i class="fa fa-star" style="color: #f5ec00;"></i>
                                                </div>
                                                </br>
                                                <div>
                                                    <span style="font-weight: bold;" class="u-c-secondary">Làn da như được thay áo mới, trở nên mịn màng và mềm mại trông thấy. Nên mua nha mọi người!</span>
                                                </div>
                                                <div>
                                                    <span class="u-c-secondary">
                                                        Thơm, mịn, mướt, hạt đường không gây rát da, quá đỉnh Cocoon ơi!
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--====== End - Section Content ======-->
                        </div>
                        <!--====== End - Section 6 ======-->
                        </div>
                        <!--====== Section 7 ======-->
                        <div class="u-s-p-b-60">

                            <!--====== Section Content ======-->
                            <div class="section__content">
                                <div class="container_cn">

                                    <!--====== Brand Slider: hiển thị các chứng nhận ======-->
                                    <div class="cert-box flex flex-col justify-center items-center lg:justify-between text-center mx-auto" id="5" data-v-e4caeaf8="">
                                    <img data-v-28e54ce9="" class="cert-box__image lazyLoad isLoaded" src="https://image.cocoonvietnam.com/uploads/leaping_bunny_bdcbdfe9f1.svg" alt="Leaping Bunny logo">
  
                                    <p data-v-28e54ce9="" class="cert-box__title font-vollkorn text-primary-dark lg:mt-3">
                                        Leaping Bunny
                                    </p>
                                    
                                    <p data-v-28e54ce9="" class="cert-box__subtitle px-2 font-barlow font-semibold uppercase text-typo-body">
                                        CHƯƠNG TRÌNH LEAPING BUNNY
                                    </p>
                                    
                                    <p data-v-28e54ce9="" class="cert-box__description flex-1 px-1.5 text-gray-600 text-center">
                                        Chương trình Leaping Bunny của tổ chức Cruelty Free International được xem là "tiêu chuẩn vàng" toàn cầu cho các sản phẩm không thử nghiệm trên động vật.
                                    </p>
                                    </div>

    
                                    <div data-v-28e54ce9="" data-v-22f6a769="" class="
                                    cert-box
                                    flex flex-col
                                    justify-center
                                    items-center
                                    lg:justify-between
                                    text-center
                                mx-auto" id="6" data-v-e4caeaf8=""><img data-v-28e54ce9="" class="cert-box__image lazyLoad isLoaded" src="https://image.cocoonvietnam.com/uploads/vegan_society_41cc2b390a.svg"> <p data-v-28e54ce9="" class="cert-box__title font-vollkorn text-primary-dark lg:mt-3">
                                    The Vegan Society
                                </p> <p data-v-28e54ce9="" class="
                                    cert-box__subtitle
                                    px-2
                                    font-barlow font-semibold
                                    uppercase
                                    text-typo-body
                                    ">
                                    HIỆP HỘI THUẦN CHAY QUỐC TẾ
                                </p> <p data-v-28e54ce9="" class="cert-box__description flex-1 px-1.5 text-gray-600 text-center">
                                    The Vegan Society (Hiệp hội thuần chay quốc tế) là một trong những chứng nhận uy tín xác thực cho các sản phẩm không có thành phần từ động vật và không thử nghiệm trên động vật.
                                </p> <!----></div>

                                <div data-v-28e54ce9="" data-v-22f6a769="" class="
                                    cert-box
                                    flex flex-col
                                    justify-center
                                    items-center
                                    lg:justify-between
                                    text-center
                                mx-auto" id="7" data-v-e4caeaf8=""><img data-v-28e54ce9="" class="cert-box__image lazyLoad isLoaded" src="https://image.cocoonvietnam.com/uploads/e3084968637945bfc13699f3682f28a6_24f04f4362.svg"> <p data-v-28e54ce9="" class="cert-box__title font-vollkorn text-primary-dark lg:mt-3">
                                    PETA
                                </p> <p data-v-28e54ce9="" class="
                                    cert-box__subtitle
                                    px-2
                                    font-barlow font-semibold
                                    uppercase
                                    text-typo-body
                                    ">
                                    ANIMAL TEST-FREE &amp; VEGAN
                                </p> <p data-v-28e54ce9="" class="cert-box__description flex-1 px-1.5 text-gray-600 text-center">
                                    Chương trình Beauty Without Bunnies của tổ chức bảo vệ quyền lợi động vật toàn cầu PETA là chương trình bảo vệ và cam kết không có sự tàn ác đối với động vật uy tín trên thế giới.
                                </p> <!----></div>
                                    <!--====== End - Brand Slider ======-->
                                </div>
                            </div>
                            <!--====== End - Section Content ======-->
                        </div>
                        <!--====== End - Section 7 ======-->
                    </div>
                    <!--====== End - App Content ======-->
                    <!--====== Footer chính ======-->
                    <!--Thẻ footer dùng để tạo chân trang (footer) cho website-->
                    <!--Phần footer bao gồm thông tin liên hệ, Menu phụ và đăng ký nhận thông tin mới -->
                    <footer>
                        <div class="outer-footer">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="outer-footer__content u-s-m-b-40">
                                            <!--Hiển thị các thông tin để khách hàng có thể liên hệ với Cocoon-->
                                            <span class="outer-footer__content-title">Liên hệ với chúng tôi</span>

                                            <div class="outer-footer__text-wrap">
                                                <i class="fas fa-home"></i>
                                                <span>279 Nguyễn Tri Phương, phường 5, quận 10, TP. Hồ Chí Minh</span>
                                            </div>

                                            <div class="outer-footer__text-wrap">
                                                <i class="fas fa-phone-volume"></i>
                                                <span>(+0) 890 372 444</span>
                                            </div>

                                            <div class="outer-footer__text-wrap">
                                                <i class="far fa-envelope"></i>
                                                <span>Cocoon.contact@gmail.com</span>
                                            </div>

                                            <div class="outer-footer__social">
                                                <ul>
                                                    <li>
                                                        <a class="s-fb--color-hover" href="https://www.facebook.com/CocoonVietnamOfficial"><i class="fab fa-facebook-f"></i></a>
                                                    </li>

                                                    <li>
                                                        <a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a>
                                                    </li>

                                                    <li>
                                                        <a class="s-youtube--color-hover" href="https://www.youtube.com/@cocoonvietnamofficial4200"><i class="fab fa-youtube"></i></a>
                                                    </li>

                                                    <li>
                                                        <a class="s-insta--color-hover" href="https://www.instagram.com/cocoon.vietnam/"><i class="fab fa-instagram"></i></a>
                                                    </li>

                                                    <li>
                                                        <a class="s-gplus--color-hover" href="#"><i class="fab fa-google-plus-g"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-12">
                                        <!--điều chỉnh thông số-->
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-6">
                                                <div class="outer-footer__content u-s-m-b-40">
                                                    <span class="outer-footer__content-title">Thông tin</span>
                                                    <div class="outer-footer__list-wrap">
                                                        <ul>
                                                            <li>
                                                                <a href="cart.html">Giỏ hàng</a>
                                                            </li>
                                                            <li>
                                                                <a href="dashboard.html">Tài khoản</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Tài chính</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-grid-left.html">Mua hàng</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-6">
                                                <div class="outer-footer__content u-s-m-b-40">
                                                    <div class="outer-footer__list-wrap">

                                                        <span class="outer-footer__content-title">Cocoon</span>
                                                        <ul>
                                                            <li>

                                                                <a href="#">Giới thiệu</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Liên hệ</a>
                                                            </li>
                                                            <li>

                                                                <a href="dash-my-order.html">Giao hàng</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-grid-left.html">Cửa hàng</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Khu vực form đăng ký -->
                                    <div class="col-lg-4 col-md-12">
                                        <div class="outer-footer__content">
                                            <span class="outer-footer__content-title">Đăng ký nhận thông tin mới</span>
                                            <form class="newsletter">
                                                <div class="u-s-m-b-15">
                                                    <div class="radio-box newsletter__radio">
                                                        <input type="radio" id="male" name="gender">
                                                        <div class="radio-box__state radio-box__state--primary">
                                                            <label class="radio-box__label" for="male">Nam</label>
                                                        </div>
                                                    </div>
                                                    <div class="radio-box newsletter__radio">
                                                        <input type="radio" id="female" name="gender">
                                                        <div class="radio-box__state radio-box__state--primary">
                                                            <label class="radio-box__label" for="female">Nữ</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="newsletter__group">
                                                    <label for="newsletter"></label>
                                                    <input class="input-text input-text--only-white" type="text" id="newsletter" placeholder="Nhập E-mail của bạn">
                                                    <button class="btn btn--e-brand newsletter__btn" type="submit">Đăng ký</button>
                                                </div>
                                                <span class="newsletter__text">Đăng ký vào danh sách gửi thư để nhận thông tin cập nhật về chương trình khuyến mãi, hàng mới, giảm giá và phiếu giảm giá.</span>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lower-footer">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="lower-footer__content">
                                            <div class="lower-footer__copyright">
                                                <span>Copyright © 2024</span>
                                                <a href="index.php" style="color: white">Cocoon</a>
                                                <span>Bảo lưu mọi bản quyền</span>
                                            </div>
                                            <div>
                                                <span>
                                                    <!--thêm hình ảnh chứng nhận-->
                                                    <img src="https://cocoonvietnam.com/_nuxt/img/ministry-of-industry-n-trade.199a108.png" width="200px">
                                                    <span />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </footer>

                    <!--====== Modal Section ======-->
                    <!--====== Modal Section ======-->
                    <!--====== Quick Look Modal ======-->
                    <div class="modal fade" id="quick-look">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content modal--shadow">
                                <!--Phần này xác định cấu trúc của phương thức. Đó là một phương thức Bootstrap với lớp "modal fade" và có ID là "quick-look".
                                Phương thức này được căn giữa trên màn hình bằng cách sử dụng "hộp thoại phương thức lấy hộp thoại làm trung tâm"
                                và nó có một lớp tùy chỉnh "modal--shadow" cho hiệu ứng đổ bóng.-->

                                <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
                                <!-- Đây là một nút có lớp "btn", "nút loại bỏ" và nó có biểu tượng Font Awesome ("fas fa-times") đại diện cho một biểu tượng đóng.
                                Được thiết lập để loại bỏ phương thức khi được nhấp bằng thuộc tính Bootstrap data-dismiss="modal"..-->
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-4">

                                        </div>
                                        <div class="col-lg-7">

                                            <!--====== Product Right Side Details ======-->
                                            <div class="pd-detail">
                                                <div>

                                                    <span class="pd-detail__name">Longines L2.673.4.92.0</span>
                                                </div>
                                                <!--Hiển thị các thông tin về giá và khuyến mãi, theo định dạng trong class css được khai báo-->
                                                <div>
                                                    <div class="pd-detail__inline">

                                                        <span class="pd-detail__price">68.500.000đ</span>

                                                        <span class="pd-detail__discount">(-24%)</span><del class="pd-detail__del">90.600.000đ</del>
                                                    </div>
                                                </div>
                                                <!--Thể hiện thông tin về sô sao đánh giá của sản phẩm và số lượng review sản phẩm-->
                                                <div class="u-s-m-b-15">
                                                    <div class="pd-detail__rating gl-rating-style">
                                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                                        <span class="pd-detail__review u-s-m-l-4">

                                                            <a href="product_detail.php">35 Đánh giá </a>
                                                        </span>
                                                    </div>
                                                </div>
                                                <!--Thể hiện số lượng tồn kho, và số lượng sản phẩm đã bán-->
                                                <div class="u-s-m-b-15">
                                                    <div class="pd-detail__inline">

                                                        <span class="pd-detail__stock">20 đã được bán</span>

                                                        <span class="pd-detail__left">Chỉ còn lại 2</span>
                                                    </div>
                                                </div>
                                                <!--Thể hiện mô tả về sản phẩm-->
                                                <div class="u-s-m-b-15">

                                                    <span class="pd-detail__preview-desc">Thiết kế đẹp, sang trọng đi cùng mức giá hợp lý và thương hiệu trứ danh khiến cho mẫu đồng hồ này liên tục cháy hàng ngay khi mở bán. Mặt dial blue chải tia sunbrust trẻ trung, độc đáo và hiếm gặp. Trang bị cỗ máy phức tạp được tích hợp rất nhiều chức năng: lịch thứ/ngày/tháng, chronograph, GMT, moonphase.</span>
                                                </div>
                                                <div class="u-s-m-b-15">
                                                    <div class="pd-detail__inline">

                                                        <span class="pd-detail__click-wrap">
                                                            <i class="far fa-heart u-s-m-r-6"></i>
                                                            <!--Nếu muốn thêm sản phẩm vào yêu thích cần phải đăng nhập trước, nên khi nhấn vào đó sẽ chuyển hướng sang trang đăng nhập-->
                                                            <a href="signin.html">Thêm vào yêu thích</a>

                                                            <span class="pd-detail__click-count">(222)</span> <!--Số lượng tài khoản đã thêm sản phẩm này vào yêu thích-->
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="u-s-m-b-15">
                                                    <div class="pd-detail__inline">

                                                        <span class="pd-detail__click-wrap">
                                                            <i class="far fa-envelope u-s-m-r-6"></i>
                                                            <!--Để nhận được email thì tương tự như thêm sản phẩm vào yêu thích-->
                                                            <a href="signin.html">Gửi email cho tôi khi giá giảm</a>

                                                            <span class="pd-detail__click-count">(20)</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <!-- các nút để link đến các trang social của trang web-->
                                                <div class="u-s-m-b-15">
                                                    <ul class="pd-social-list">
                                                        <li>

                                                            <a class="s-fb--color-hover" href="#"><i class="fab fa-facebook-f"></i></a>
                                                        </li>
                                                        <li>

                                                            <a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a>
                                                        </li>
                                                        <li>

                                                            <a class="s-insta--color-hover" href="#"><i class="fab fa-instagram"></i></a>
                                                        </li>
                                                        <li>

                                                            <a class="s-wa--color-hover" href="#"><i class="fab fa-whatsapp"></i></a>
                                                        </li>
                                                        <li>

                                                            <a class="s-gplus--color-hover" href="#"><i class="fab fa-google-plus-g"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="u-s-m-b-15">
                                                    <form class="pd-detail__form">
                                                        <div class="pd-detail-inline-2">
                                                            <div class="u-s-m-b-15">

                                                                <!--====== Input Counter ======-->
                                                                <div class="input-counter">

                                                                    <span class="input-counter__minus fas fa-minus"></span>

                                                                    <input class="input-counter__text input-counter--text-primary-style" type="text" value="1" data-min="1" data-max="1000">

                                                                    <span class="input-counter__plus fas fa-plus"></span>
                                                                </div>
                                                                <!--====== End - Input Counter ======-->
                                                            </div>
                                                            <div class="u-s-m-b-15">

                                                                <button class="btn btn--e-brand-b-2" type="submit">Thêm vào giỏ hàng</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="u-s-m-b-15 ">

                                                    <span class="pd-detail__label u-s-m-b-8">Chính sách sản phẩm:</span>
                                                    <ul class="pd-detail__policy-list">
                                                        <li>
                                                            <i class="fas fa-check-circle u-s-m-r-8"></i>

                                                            <span>Bảo vệ người mua.</span>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-check-circle u-s-m-r-8"></i>

                                                            <span>Hoàn trả đầy đủ nếu bạn không nhận được đơn đặt hàng của mình.</span>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-check-circle u-s-m-r-8"></i>

                                                            <span>Chấp nhận đổi trả nếu sản phẩm không đúng mô tả.</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--====== End - Product Right Side Details ======-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--====== End - Quick Look Modal ======-->
                    <!--====== Modal Thêm vào Giỏ Hàng ======-->
                    <div class="modal fade" id="add-to-cart">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content modal-radius modal-shadow">

                                <!-- Nút Đóng -->
                                <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>

                                <!-- Phần Nội Dung -->
                                <div class="modal-body">
                                    <div class="row">
                                        <!-- Phần Hiển Thị Thông Báo Thêm Sản Phẩm Thành Công -->
                                        <div class="col-lg-6 col-md-12">
                                            <div class="success u-s-m-b-30">
                                                <div class="success__text-wrap">
                                                    <i class="fas fa-check"></i>
                                                    <span>Sản phẩm được thêm thành công!</span>
                                                </div>  <!-- Hình ảnh sản phẩm -->
                                                <div class="success__img-wrap">
                                                    <img class="u-img-fluid" src="https://hpauthentic.vn/wp-content/uploads/2023/02/Longines-Date-Moon-stars-L2.673.4.92.0-650x650.gif" alt="">
                                                </div>
                                                <div class="success__info-wrap">
                                                    <span class="success__name">Longines L2.673.4.92.0</span>
                                                    <span class="success__quantity">Số lượng: 1</span>
                                                    <span class="success__price">68.500.000đ </span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Phần Hiển Thị Thông Tin Giỏ Hàng và Các Tùy Chọn -->
                                        <div class="col-lg-6 col-md-12">
                                            <div class="s-option">
                                                <span class="s-option__text">1 sản phẩm trong giỏ hàng của bạn</span>
                                                <div class="s-option__link-box">
                                                    <!-- Các Liên Kết Chuyển Hướng -->
                                                    <a class="s-option__link btn--e-white-brand-shadow" data-dismiss="modal">TIẾP TỤC MUA SẮM</a>
                                                    <a class="s-option__link btn--e-white-brand-shadow" href="cart.html">XEM GIỎ HÀNG</a>
                                                    <a class="s-option__link btn--e-brand-shadow" href="checkout.html">TIẾN HÀNH THANH TOÁN </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--====== Kết Thúc - Thêm vào Giỏ Hàng ======-->
                    <!--====== Newsletter Subscribe Modal: Đoạn mã HTML này tạo ra một cửa sổ modal, thường được sử dụng để hiển thị nội dung không gian động trên trang web hiện tại mà không cần chuyển hướng hoặc tải lại trang.
                    Trong trường hợp này, cửa sổ modal được sử dụng để hiển thị một biểu mẫu đăng ký nhận thông báo mới.    ======-->
                    <div class="modal fade new-l" id="newsletter-modal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content modal--shadow">

                                <!--Lớp fas fa-times là một lớp của Font Awesome, một thư viện biểu tượng, và nó hiển thị một biểu tượng “x”. Thuộc tính data-dismiss="modal" được sử dụng để chỉ định rằng khi nút này được nhấp,
                                cửa sổ modal sẽ được đóng.-->
                                <button class="btn new-l__dismiss fas fa-times" type="button" data-dismiss="modal"></button>
                                <div class="modal-body">
                                    <div class="row u-s-m-x-0">
                                        <div class="col-lg-6 new-l__col-1 u-s-p-x-0">

                                            <a class="new-l__img-wrap u-d-block" href="shop-grid-left.html">

                                                <img class="u-img-fluid u-d-block" src="images/newsletter/newsletter1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="col-lg-6 new-l__col-2">
                                            <div class="new-l__section u-s-m-t-30">
                                                <div class="u-s-m-b-8 new-l--center">
                                                    <h3 class="new-l__h3">Nhận thông báo mới</h3>
                                                </div>
                                                <div class="u-s-m-b-30 new-l--center">
                                                    <p class="new-l__p1"> Đăng ký email để nhận thông tin về các sản phẩm mới, chương trình giảm giá đặc biệt và hơn thế nữa...</p>
                                                </div>
                                                <form class="new-l__form">
                                                    <div class="u-s-m-b-15">

                                                        <input class="news-l__input" type="text" placeholder="Địa chỉ email của bạn">
                                                    </div>
                                                    <div class="u-s-m-b-15">

                                                        <button class="btn btn--e-brand-b-2" type="submit">Đăng ký!</button>
                                                    </div>
                                                </form>
                                                <div class="u-s-m-b-15 new-l--center">
                                                    <p class="new-l__p2">Bằng cách đăng ký, bạn đồng ý nhận các ưu đãi của Cocoon,<br />chương trình khuyến mãi và các thông tin mới nhất. Bạn có thể bỏ đăng kí bất cứ lúc nào.</p>
                                                </div>
                                                <div class="u-s-m-b-15 new-l--center">

                                                    <a class="new-l__link" data-dismiss="modal">Không, cảm ơn</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--====== End - Newsletter Subscribe Modal ======-->
                    <!--====== End - Modal Section ======-->
                </div>
                <!--====== End - Main App ======-->
                <!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
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
</body>
</html>
<!-- Đoạn mã JavaScript -->
<script>
    // Chạy mã này khi trang đã được tải xong
    document.addEventListener('DOMContentLoaded', function () {
        // Kiểm tra xem giỏ hàng có tồn tại trong session hay không và cập nhật số lượng
        <?php if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])): ?>
            document.querySelector('.total-item-round').textContent = <?php echo count($_SESSION['cart']); ?>;
        <?php else: ?>
            document.querySelector('.total-item-round').textContent = 0;
        <?php endif; ?>
    });
</script>