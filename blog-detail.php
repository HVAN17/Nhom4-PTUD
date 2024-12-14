<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/favicon.png" rel="shortcut icon">
    <title>CocoonVietnamOfficial</title>

    <!--====== Google Font ======-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href="css/vendor.css">

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="css/utility.css">

    <!--====== App ======-->
    <link rel="stylesheet" href="css/app.css">
</head>
<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="images/preloader.png" alt=""></div>
    </div>

    <!--====== Main App ======-->
    <div id="app">

        <!--====== Main Header ======-->
        <header class="header--style-1 header--box-shadow">
        <?php
    include('header.php');
         ?>
        </header>
        <div class="app-content">

            <!--====== Section 1 ======-->
            <div class="u-s-p-y-90">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="blog-w-master">
                                <div class="u-s-m-b-60">
                                    <div class="blog-w">

                                        <span class="blog-w__h">SEARCH</span>
                                        <form class="blog-search-form">

                                            <label for="post-search"></label>

                                            <input class="input-text input-text--primary-style" type="text" id="post-search" placeholder="Search">

                                            <button class="btn btn--icon fas fa-search" type="submit"></button></form>
                                    </div>
                                </div></div>
            <?php
require 'database/config.php';

// Lấy danh sách bài viết từ cơ sở dữ liệu
$sql = "SELECT id, title, content, created_at FROM posts ORDER BY created_at DESC LIMIT 3";
$stmt = $pdo->query($sql);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
                <div class="container">
    <div class="blog-w">
        <span class="blog-w__h">Bài viết mới nhất</span>
        <ul class="blog-w__b-l">
            <?php foreach ($posts as $post): ?>
            <li>
                <div class="b-l__block">
                    <div class="b-l__date">
                        <span><?= date('d', strtotime($post['created_at'])); ?></span>
                        <span><?= date('F', strtotime($post['created_at'])); ?></span>
                        <span><?= date('Y', strtotime($post['created_at'])); ?></span>
                    </div>
                    <span class="b-l__h">
                        <a href="blog-detail.php?id=<?= $post['id']; ?>"><?= htmlspecialchars($post['title']); ?></a>
                    </span>
                    <span class="b-l__p"><?= htmlspecialchars(mb_strimwidth($post['content'], 0, 150, '...')); ?></span>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

                                </div>
            
            <?php
require 'database/config.php'; // Kết nối cơ sở dữ liệu

// Lấy ID bài viết từ URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Kiểm tra nếu có ID và lấy bài viết từ cơ sở dữ liệu
if ($id > 0) {
    $sql = "SELECT id, title, content, image_path, created_at FROM posts WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // Nếu không có ID hợp lệ, chuyển hướng về trang blog hoặc hiển thị lỗi
    header("Location: blog.php");
    exit();
}

// Kiểm tra nếu bài viết không tồn tại
if (!$post) {
    echo "Bài viết không tồn tại!";
    exit();
}
?>
<!--====== Detail Post ======-->
<div class="col-lg-9 col-md-8 col-sm-12">
    <div class="d-meta">
        <div class="container">
    <div class="bp-detail">
        <div class="bp-detail__thumbnail">
            <!--====== Image Code ======-->
            <div class="aspect aspect--bg-grey aspect--1366-768">
                <img class="aspect__img" src="database/uploads/<?= htmlspecialchars($post['image_path'] ?: 'images/no-image.jpg'); ?>" alt="<?= htmlspecialchars($post['title']); ?>">
            </div>
            <!--====== End - Image Code ======-->
        </div>

        <div class="bp-detail__info-wrap">
            <div class="bp-detail__stat">
                <!-- Publish Date -->
                <span class="bp-detail__stat-wrap">
                    <span class="bp-detail__publish-date">
                        <span><?= htmlspecialchars(date('d F Y', strtotime($post['created_at']))); ?></span>
                    </span>
                </span>

                <!-- Author -->
                <span class="bp-detail__stat-wrap">
                    <span class="bp-detail__author">
                        <a href="#">Admin</a>
                    </span>
                </span>

                <!-- Category -->
                <span class="bp-detail__stat-wrap">
                    <span class="bp-detail__category">
                        <a href="#">Cocoon</a>
                        <a href="#">Làm đẹp</a>
                        <a href="#">Lành tính</a>
                    </span>
                </span>
            </div>

            <!-- Title -->
            <span class="bp-detail__h1"><?= htmlspecialchars($post['title']); ?></span>

            <!-- Tags Section (Optional) -->
            <div class="blog-t-w">
                <a class="gl-tag btn--e-transparent-hover-brand-b-2" href="#">Cocoon</a>
                <a class="gl-tag btn--e-transparent-hover-brand-b-2" href="#">Làm đẹp</a>
                <a class="gl-tag btn--e-transparent-hover-brand-b-2" href="#">Lành tính</a>
            </div>

            <!-- Content -->
            <p class=".b-l__p"><?= nl2br(htmlspecialchars($post['content'])); ?></p>
        </div>
    </div>
</div>
</div></div></div>

<!-- Bình luận -->
<div class="u-s-p-b-60">
    <div class="d-meta">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-meta__comment-arena">
                        <span class="bp-detail_h1">Bình luận</span>
                        <div class="d-meta__comments u-s-m-b-30">
                            <ol>
                                <li>
                                    <!--====== Comment ======-->
                                    <div class="d-meta__p-comment">
                                        <div class="p-comment__wrap1">
                                            <div class="aspect aspect--square p-comment__img-wrap">
                                                <img src="images/blog/avatar.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="p-comment__wrap2">
                                            <span class="p-comment__author">Ngọc Yến</span>
                                            <span class="p-comment__timestamp">
                                                <a href="#">
                                                    <span>2/12/2024</span>
                                                </a>
                                            </span>
                                            <p class="p-comment__paragraph">Hữu ích lắm ạ, cám ơn shop nhiều nha. Shop tâm lí lắm nè. Giao hàng cũng nhanh nữa</p>
                                            <a class="p-comment__reply" href="#">Trả lời</a>
                                        </div>
                                    </div>
                                    <!--====== End - Comment ======-->
                                    <ol class="comment-children">
                                        <li></li>
                                    </ol>
                                </li>
                            </ol>
                        </div>

                        <span class="bp-detail_h1">Tham gia cuộc trò chuyện</span>
                        <span class="d-meta__text-3 u-s-m-b-16">Email của bạn sẽ được bảo mật*</span>
                        <form class="respond__form">
                            <div class="respond__group">
                                <div class="u-s-m-b-15">
                                    <label class="gl-label" for="comment">Bình luận *</label>
                                    <textarea class="text-area text-area--primary-style" id="comment"></textarea>
                                </div>
                                <div>
                                    <p class="u-s-m-b-30">
                                        <label class="gl-label" for="responder-name">Tên *</label>
                                        <input class="input-text input-text--primary-style" type="text" id="responder-name">
                                    </p>
                                    <p class="u-s-m-b-30">
                                        <label class="gl-label" for="responder-email">Email *</label>
                                        <input class="input-text input-text--primary-style" type="text" id="responder-email">
                                    </p>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn--e-brand-shadow" type="submit">Đăng bình luận</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            <!--====== End - Section 1 ======-->
        </div>
        <!--====== End - App Content ======-->


        <!--====== Main Footer ======-->
        <?php
    include('admin/footer.php');
         ?>  
    
    <!--====== End - Main App ======-->


    <!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async defer></script>

    <!--====== Vendor Js ======-->
    <script src="js/vendor.js"></script>

    <!--====== jQuery Shopnav plugin ======-->
    <script src="js/jquery.shopnav.js"></script>

    <!--====== App ======-->
    <script src="js/app.js"></script>

    <!--====== Noscript ======-->
    <noscript>
        <div class="app-setting">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="app-setting__wrap">
                            <h1 class="app-setting__h1">JavaScript is disabled in your browser.</h1>

                            <span class="app-setting__text">Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </noscript>
    <style>/* Thêm màu nâu pastel vào nền trang */
body {
    background-color:  #f9f9f9; /* Màu nền nâu pastel nhẹ */
    color: #5f4b3c; /* Màu chữ nâu đậm */
}

/* Tiêu đề bài viết */
.bp-detail__h1 {
    font-family: 'Arial', sans-serif; /* Font chữ hiện đại, dễ đọc */
    font-size: 30px; /* Tăng kích thước chữ để nổi bật hơn */
    color: #5f4b3c; /* Màu nâu đậm */
    font-weight: bold; /* Đậm để tạo sự mạnh mẽ */
    margin-bottom: 20px;
    text-align: center; /* Căn giữa cho đẹp mắt */
    text-transform: uppercase; /* Chữ hoa để làm nổi bật */
    letter-spacing: 2px; /* Khoảng cách giữa các chữ */
}
.bp-detail_h1 {
    font-family: 'Arial', sans-serif; /* Font chữ hiện đại, dễ đọc */
    font-size: 30px; /* Tăng kích thước chữ để nổi bật hơn */
    color: #5f4b3c; /* Màu nâu đậm */
    font-weight: bold; /* Đậm để tạo sự mạnh mẽ */
    margin-bottom: 20px;
    text-transform: uppercase; /* Chữ hoa để làm nổi bật */
    letter-spacing: 2px; /* Khoảng cách giữa các chữ */
    
}

/* Nền của các khu vực như hình ảnh, tiêu đề, bình luận */
.bp-detail {
    background-color: #fdf4eb; /* Màu nền nhẹ cho các khu vực chính */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Nút "Đọc thêm" */
.btn-read-more {
    background-color: #d4a59a; /* Nâu pastel */
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.btn-read-more:hover {
    background-color: #c07b68; /* Nâu đậm hơn khi hover */
}

/* Nền của bình luận */
.d-meta__comments {
    background-color: #fff4f0; /* Nền nhẹ cho bình luận */
    border-radius: 8px;
    padding: 20px;
}

/* Màu của các tags */
.gl-tag {
    background-color: #d4a59a; /* Nâu pastel cho tag */
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    margin-right: 10px;
    text-decoration: none;
}

.gl-tag:hover {
    background-color: #c07b68; /* Nâu đậm hơn khi hover */
}

/* Các phần tử bình luận */
.p-comment__wrap2 {
    background-color: #f2e0d6; /* Nền nhạt cho mỗi bình luận */
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 15px;
}

.p-comment__author {
    font-weight: bold;
    color: #5f4b3c; /* Màu nâu đậm cho tên tác giả */
}

.p-comment__timestamp {
    color: #9c7f63; /* Màu nâu nhạt cho thời gian */
}

/* Nút gửi bình luận */
.btn.btn--e-brand-shadow {
    background-color: #d4a59a; /* Nâu pastel */
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn.btn--e-brand-shadow:hover {
    background-color: #c07b68; /* Nâu đậm hơn khi hover */
}

/* Form bình luận */
.respond__form {
    background-color: #fff4f0;
    padding: 20px;
    border-radius: 8px;
}

.text-area--primary-style,
.input-text--primary-style {
    background-color: #fff;
    border: 1px solid #d4a59a;
    padding: 10px;
    border-radius: 5px;
    width: 100%;
}
.text-area--primary-style:focus,
.input-text--primary-style:focus {
    border-color: #c07b68; /* Khi focus vào trường nhập, đổi màu thành nâu đậm */
    outline: none;
}
</style>
</body>
<html>