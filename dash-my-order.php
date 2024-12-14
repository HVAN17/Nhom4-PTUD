
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
    <head>
        <?php include ('header.php')?>
     </header>
        <div class="app-content">
            <div class="u-s-p-y-60">
                <div class="section__content">
                    <div class="container">
                        <div class="breadcrumb">
                            <div class="breadcrumb__wrap">
                                <ul class="breadcrumb__list">
                                    <li class="has-separator">
                                        <a href="index.php">Trang chủ</a>
                                    </li>
                                    <li class="has-separator">
                                        <a href="dashboard.html">Tài khoản</a>
                                    </li>
                                    
                                    <li class="is-marked">
                                        <a href="dash_my_order.php">Đơn hàng của tôi</a>
                                    </li>
                                
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="u-s-p-b-60">
                <div class="section__content">
                    <div class="dash">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-md-12">
                               
                                        <div class="dash__w-wrap">  
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        h1 {
            font-size: 28px;
            font-weight: 700;
            color: goldenrod;
            text-align: center;
            margin-top: 30px;
            margin-bottom: 20px;
        }

        .m-order__table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            font-size: 14px;
            background-color: white;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .m-order__table th, .m-order__table td {
            padding: 18px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .m-order__table th {
            background: rgb(249, 244, 195);
            color: goldenrod;
            font-weight: bold;
            font-size: 16px;

        }

        .m-order__table td span {
            font-weight: 600;
            color: #2c3e50;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 12px;
            font-size: 14px;
            color: #fff;
            text-align: center;
        }

        .status-processing { background-color: #f39c12; }
        .status-shipped { background-color: #2980b9; }
        .status-delivered { background-color: #27ae60; }
        .status-cancelled { background-color: #e74c3c; }

    </style>                                                     
</div>
</div>
</div>
<div class="col-lg-14 col-md-12">
    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
        <div class="dash__pad-2">
            <h1>Đơn Hàng Của Tôi</h1>
            <table class="m-order__table">
                <thead>
                    <tr>
                        <th>Mã đơn</th>
                        <th>Ngày đặt hàng</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Tổng tiền</th>
                        <th>Phương thức thanh toán</th>
                        <th>Trạng thái đơn</th>
                    </tr>
                </thead>
                <tbody id="order-list">
                    <!-- Nội dung sẽ được thêm động qua JavaScript -->
                </tbody>
            </table>

            <script>
                fetch("order_history.php")
                    .then(response => response.json())
                    .then(data => {
                        const orderList = document.getElementById("order-list");
                        if (data.error) {
                            orderList.innerHTML = `<tr><td colspan="9" style="text-align: center; color: red;">${data.error}</td></tr>`;
                        } else {
                            data.forEach(order => {
                                const orderRow = `
                                    <tr>
                                        <td>#${order.order_number}</td>
                                        <td>${new Date(order.order_date).toLocaleString()}</td>
                                        <td>${order.address}</td>
                                        <td>${order.phone}</td>
                                        <td>${order.email}</td>
                                        <td>${parseFloat(order.total_amount).toLocaleString('vi-VN', {style: 'currency', currency: 'VND'})}</td>
                                        <td>${order.payment_method}</td>
                                        <td><span class="status-badge status-${order.status.replace(/\s+/g, '-').toLowerCase()}">${order.status}</span></td>
                                    </tr>
                                `;
                                orderList.innerHTML += orderRow;
                            });
                        }
                    })
                    .catch(error => {
                        console.error("Lỗi:", error);
                        document.getElementById("order-list").innerHTML = `<tr><td colspan="9" style="text-align: center; color: red;">Không thể tải dữ liệu</td></tr>`;
                    });
            </script>
        </div>
    </div>
</div>
</div>

                                                </div>
                                            </div>
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
        </div>
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
                                                <a href="shop-grid-left.php">Mua hàng</a>
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

                                                <a href="dash-my-order1.php">Giao hàng</a>
                                            </li>
                                            <li>
                                                <a href="shop-grid-left.php">Cửa hàng</a>
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
                                    <span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</footer>
 
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