
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/favicon.png" rel="shortcut icon">
    <title>Cocoon</title>

    <!--====== Google Font ======-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href="css/vendor.css">

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="css/utility.css">
    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="css/theme.css">


    <!--====== App ======-->
    <link rel="stylesheet" href="css/app.css">
</head>
<?php
    include('header.php');
         ?>
<body class="config">
    <div class="preloader is-active">
        <!-- Header -->
        <?php
    include('header.php');
         ?>

        <!--====== End - Main Header ======-->


        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== Section 1 ======-->
            <div class="u-s-p-y-90">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="blog-w-master">
                                <div class="u-s-m-b-60">
                                    <div class="blog-w">

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
                                </div>
                                <div class="u-s-m-b-60">
                                    <div class="blog-w">

                                        <span class="blog-w__h">Bình luận</span>
                                        <ul class="blog-w__b-l-2">
                                            <li>
                                                <div class="b-l__block">

                                                    <span class="b-l__text">Minh Thư</span>

                                                    <span class="b-l__text">lúc</span>

                                                    <span class="b-l__h-2">

                                                        <a href="blog-detail.html">Dùng okela</a></span></div>
                                            </li>
                                            <li>
                                                <div class="b-l__block">

                                                    <span class="b-l__text">Thanh Trúc</span>

                                                    <span class="b-l__text"> lúc</span>

                                                    <span class="b-l__h-2">

                                                        <a href="blog-detail.html">Bạn làm được</a></span></div>
                                            </li>
                                            <li>
                                                <div class="b-l__block">

                                                    <span class="b-l__text">Ngọc Ý</span>

                                                    <span class="b-l__text">lúc</span>

                                                    <span class="b-l__h-2">

                                                        <a href="blog-detail.html">Sản phẩm tôtd</a></span></div>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <div class="blog-w">

                                    
                                    <span class="blog-w__h">TAGS</span>
                                        <div class="blog-t-w"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
        <!--Code chat gpt-->
<!--====== Section 1 ======-->
<?php
require 'database/config.php'; // Kết nối cơ sở dữ liệu

// Lấy dữ liệu bài viết từ cơ sở dữ liệu
$sql = "SELECT id, title, content, image_path, created_at FROM posts ORDER BY created_at DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="col-lg-9 col-md-8 col-sm-12">
    <?php foreach ($posts as $post): ?>
    <div class="bp bp--img u-s-m-b-30">
        <div class="bp__wrap">
            <div class="bp__thumbnail">
                <!--====== Image Code ======-->
                <a class="aspect aspect--bg-grey aspect--1366-768 u-d-block" href="blog-detail.php?id=<?= $post['id']; ?>">
                    <img class="aspect__img" src="database/uploads/<?= htmlspecialchars($post['image_path'] ?: 'images/no-image.jpg'); ?>" alt="<?= htmlspecialchars($post['title']); ?>">
                </a>
                <!--====== End - Image Code ======-->
            </div>

            <div class="bp__info-wrap">
                <!-- Stats Section -->
                <div class="bp__stat">
                    <span class="bp__stat-wrap">
                        <span class="bp__publish-date">
                            <span><?= htmlspecialchars(date('d F Y', strtotime($post['created_at']))); ?></span>
                        </span>
                    </span>
                    <span class="bp__stat-wrap">
                        <span class="bp__author">
                            <a href="#">Admin</a>
                        </span>
                    </span>
                    <span class="bp__stat-wrap">
                        <span class="bp__comment">
                            <a href="blog-detail.php?id=<?= $post['id']; ?>"><i class="far fa-comments u-s-m-r-4"></i> <span>8</span></a>
                        </span>
                    </span>
                    <span class="bp__stat-wrap">
                        <span class="bp__category">
                            <a href="blog.php">Bài viết</a>
                        </span>
                    </span>
                </div>

                <!-- Title Section -->
                <span class="bp__h1">
                    <a href="blog-detail.php?id=<?= $post['id']; ?>" class="text-hover">
                        <?= htmlspecialchars($post['title']); ?>
                    </a>
                </span>
                <span class="bp__h2"><?= htmlspecialchars(mb_strimwidth($post['content'], 0, 50, "...")); ?></span>

                <!-- Tags Section -->
                <div class="blog-t-w">
                    <a class="gl-tag btn--e-transparent-hover-brand-b-2" href="#">Cocoon</a>
                    <a class="gl-tag btn--e-transparent-hover-brand-b-2" href="#">Làm đẹp</a>
                    <a class="gl-tag btn--e-transparent-hover-brand-b-2" href="#">Lành tính</a>
                </div>

                <!-- Excerpt and Read More Section -->
                <p class="bp__p"><?= htmlspecialchars(mb_strimwidth($post['content'], 0, 150, "...")); ?></p>
                <div class="gl-l-r">
                    <span class="bp__read-more">
                        <a href="blog-detail.php?id=<?= $post['id']; ?>" class="btn-read-more">Đọc thêm</a>
                    </span>
                    <!-- Social Media Share Links -->
                    <ul class="bp__social-list">
                        <li><a class="s-fb--color" href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a class="s-tw--color" href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a class="s-insta--color" href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a class="s-wa--color" href="#"><i class="fab fa-whatsapp"></i></a></li>
                        <li><a class="s-gplus--color" href="#"><i class="fab fa-google-plus-g"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>





                                <div class="bp__wrap">
                                    
                                </div>
                            </div>
                            <nav class="post-center-wrap u-s-p-y-60">

                                <!--====== Pagination ======-->
                                <!--====== Pagination ======-->
                                <ul class="blog-pg">
                                    <li class="blog-pg--active">

                                        <a href="blog-left-sidebar.html">1</a></li>
                                    <li>

                                        <a href="blog.php">2</a></li>
                                    <li>

                                        <a href="blog.php">3</a></li>
                                    <li>

                                        <a href="blog.php">4</a></li>
                                    <li>

                                        <a class="fas fa-angle-right" href="blog.php.html"></a></li>
                                </ul>
                                <!--====== End - Pagination ======-->
                            </nav>
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
</body>
</html>