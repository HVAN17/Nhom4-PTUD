<!--Nhóm xin phép được comment vào các câu lệnh và đoạn code được xuất hiện lần đầu trong page ạ;
    Những đoạn code tiếp theo có cấu trúc và các lệnh tương tự nhóm xin phép không comment lại ạ, nhóm cảm ơn thầy ạ!
    Riêng thẻ phần khai báo đầu của các file html và các đoạn code khai báo cho footer, header nhóm xin phép chỉ để
    comment trong file index (trang chủ) vì các nội dung này giống nhau ở tất cả các file-->
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <!-- kiểm soát cách trang web hiển thị trên các thiết bị di động.-->
    <!--Thuộc tính name xác định tên của thẻ meta. Trong trường hợp này, viewport cho biết thẻ này kiểm soát cách trang web hiển thị trên các thiết bị di động.-->
    <!--Thuộc tính content chứa các giá trị cho thẻ meta:
        - width=device-width đặt chiều rộng của viewport bằng chiều rộng của thiết bị.
        - initial-scale=1 đặt tỷ lệ ban đầu của trang web là 1, nghĩa là trang web sẽ không được phóng to hoặc thu nhỏ khi nó được tải lần đầu.
        - shrink-to-fit=no ngăn trình duyệt tự động điều chỉnh kích thước nội dung để phù hợp với chiều rộng của thiết bị.-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Thẻ này cung cấp mô tả về nội dung trang web, thường được sử dụng bởi công cụ tìm kiếm khi hiển thị kết quả tìm kiếm. Trong trường hợp này, không có mô tả nào được cung cấp.-->
    <meta name="description" content="">

    <!--Thẻ này xác định tác giả của trang web. Trong trường hợp này, không có tên tác giả nào được cung cấp.-->
    <meta name="author" content="">


    <!--Thẻ link trong HTML, được sử dụng để liên kết tới một tệp tin khác từ trang HTML hiện tại.-->
    <!--Thuộc tính href xác định đường dẫn tới tệp tin cần liên kết, nó liên kết tới tệp tin favicon.png trong thư mục images-->
    <!--Thuộc tính rel xác định mối quan hệ giữa trang HTML hiện tại và tệp tin được liên kết. Trong trường hợp này, giá trị shortcut icon cho biết tệp tin liên kết là một favicon, biểu tượng nhỏ xuất hiện trên tab trình duyệt bên cạnh tiêu đề trang.-->
    <link href="images/logo/logo-favicon.png" rel="shortcut icon">
    <!--Title của website được thể hiện trên nút tab của trình duyệt-->
    <title>Cocoon</title>

    <!--====== Google Font: lấy định dạng css từ link được gắn vào ======-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

    <!--====== Vendor Css: lấy định dạng css từ file này ======-->
    <link rel="stylesheet" href="css/vendor.css">

    <!--====== Utility-Spacing: lấy định dạng css từ file này ======-->
    <link rel="stylesheet" href="css/utility.css">

    <!--====== App: lấy định dạng css từ file này ======-->
    <link rel="stylesheet" href="css/app.css">
</head>
<!-- áp dụng các quy tắc định dạng css của class "config" cho body-->
<body class="config">
    <!-- <div class ="...": áp dụng các quy tắc định dạng của một lớp nào đó cho thẻ div; Một thẻ có thể được định nghĩa bởi nhiều class css, các tên class được cách nhau bởi dấu cách như ví dụ ở phía dưới-->
    <div class="preloader is-active">
        <div class="preloader__wrap">
            <!-- <img class ="...">: áp dụng các quy tắc định dạng của một lớp nào đó cho thẻ img-->
            <!-- <img src ="...": chỉ định địa chỉ cho hình ảnh; alt="...": nếu không tìm được ảnh thì hiển thị với dòng chữ thay thế là ...-->
            <img class="preloader__img" src="images/logo/logo-2.png" alt="">
        </div>
    </div>

    <head>
        <?php include ('header.php')?>
        </header>
        <!--====== End - Main Header ======-->
        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== Section 1 ======-->
            <div class="u-s-p-y-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="breadcrumb">
                            <div class="breadcrumb__wrap">
                                <ul class="breadcrumb__list">
                                    <li class="has-separator">

                                        <a href="index.php">Trang chủ</a>
                                    </li>
                                    <li class="is-marked">

                                        <a href="dash-my-order1.php">Tài khoản</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section 1 ======-->
            <!--====== Section 2 ======-->
            <div class="u-s-p-b-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="dash">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-md-12">

                                    <!--====== Dashboard Features ======-->
                                    <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                        <div class="dash__pad-1">
                                            <!-- Hiển thị tên người dùng và các liên kết quản lý tài khoản -->
                                            <span class="dash__text u-s-m-b-16">Cocoon xin chào </span>
                                            <ul class="dash__f-list">
                                                <li>

                                                    <a href="dashboard.html">Quản lý tài khoản</a>
                                                </li>

                                                <li>
                                                    <!-- dùng dash-active để in đậm chữ-->
                                                    <a class="dash-active" href="dash-my-order1.php">Đơn hàng của tôi</a>
                                                </li>
                                               
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="dash__box dash__box--bg-white dash__box--shadow dash__box--w">
                                        <div class="dash__pad-1">
                                            <ul class="dash__w-list">
                                                <li>
                                                    <div class="dash__w-wrap">
                                                        <!-- Tạo số liệu cho đơn hàng -->
                                                     
                                                        <style>
                                                            body {
                                                                font-family: Arial, sans-serif;
                                                                margin: 0;
                                                                padding: 0;
                                                                background-color: #f9f9f9;
                                                            }
                                                            h1 {
                                                                text-align: center;
                                                                margin-top: 20px;
                                                            }
                                                            .m-order__list {
                                                                margin: 20px auto;
                                                                width: 90%;
                                                            }
                                                            .m-order__get {
                                                                border: 1px solid #ddd;
                                                                background: #fff;
                                                                margin-bottom: 20px;
                                                                padding: 15px;
                                                                border-radius: 5px;
                                                            }
                                                            .description__img-wrap img {
                                                                width: 100px;
                                                                height: auto;
                                                                margin-right: 10px;
                                                            }
                                                            .description-title {
                                                                font-size: 16px;
                                                                font-weight: bold;
                                                            }
                                                            .manage-o__badge {
                                                                display: inline-block;
                                                                padding: 5px 10px;
                                                                border-radius: 5px;
                                                                color: #fff;
                                                            }
                                                            .badge--processing {
                                                                background-color: orange;
                                                            }
                                                            .badge--shipped {
                                                                background-color: blue;
                                                            }
                                                            .badge--delivered {
                                                                background-color: green;
                                                            }
                                                        </style>
                                                    

                                                        
                                            </ul>
                                        </div>
                                    </div>
                                    <!--====== End - Dashboard Features ======-->
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                        <div class="dash__pad-2">
                                            <h1>Lịch Sử Đơn Hàng</h1>
                                            <div class="m-order__list" id="order-list">
                                                <!-- Dữ liệu đơn hàng sẽ được tải động -->
                                            </div>
                                        
                                            <script>
                                                // Gọi API để lấy dữ liệu lịch sử đơn hàng
                                                fetch("order_history.php")
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        const orderList = document.getElementById("order-list");
                                        
                                                        if (data.error) {
                                                            orderList.innerHTML = `<p style="text-align: center; color: red;">${data.error}</p>`;
                                                        } else {
                                                            data.forEach(order => {
                                                                const orderHtml = `
                                                                    <div class="m-order__get">
                                                                        <div class="manage-o__header u-s-m-b-30">
                                                                            <div>
                                                                                <div class="manage-o__text-2 u-c-secondary">Đơn hàng #${order.order_number}</div>
                                                                                <div class="manage-o__text u-c-silver">Đặt vào lúc ${new Date(order.order_date).toLocaleString()}</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="manage-o__description">
                                                                            <div class="description__container">
                                                                                <div class="description__img-wrap">
                                                                                    <img src="${order.product_image}" alt="${order.product_name}">
                                                                                </div>
                                                                                <div class="description-title">${order.product_name}</div>
                                                                            </div>
                                                                            <div class="description__info-wrap">
                                                                                <div>
                                                                                    <span class="manage-o__badge badge--${order.status.replace(/\s+/g, '-').toLowerCase()}">${order.status}</span>
                                                                                </div>
                                                                                <div>
                                                                                    <span class="manage-o__text-2 u-c-silver">Số lượng: <span class="manage-o__text-2 u-c-secondary">${order.quantity}</span></span>
                                                                                </div>
                                                                                <div>
                                                                                    <span class="manage-o__text-2 u-c-silver">Tổng đơn hàng: <span class="manage-o__text-2 u-c-secondary">${parseFloat(order.total_price).toLocaleString('vi-VN', {style: 'currency', currency: 'VND'})}</span></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                `;
                                                                orderList.innerHTML += orderHtml;
                                                            });
                                                        }
                                                    })
                                                    .catch(error => {
                                                        console.error("Lỗi:", error);
                                                        document.getElementById("order-list").innerHTML = `<p style="text-align: center; color: red;">Không thể tải dữ liệu</p>`;
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
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 2 ======-->
        </div>
        <!--====== End - App Content ======-->
        <!--====== Footer chính ======-->
        <!--Thẻ footer dùng để tạo chân trang (footer) cho website-->
        <!--Phần footer bao gồm thông tin liên hệ, Menu phụ và đăng ký nhận thông tin mới -->
        footer>
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

                                <!--====== Product Breadcrumb ======-->
                                <div class="pd-breadcrumb u-s-m-b-30">
                                    <!--để hiển thị đường dẫn đường dẫn, cho phép người dùng điều hướng quay lại.
                                Lớp "pd-breadcrumb" được sử dụng để tạo kiểu và "usmb-30" có thể kiểm soát khoảng cách.-->
                                    <ul class="pd-breadcrumb__list">
                                        <li class="has-separator">

                                            <a href="index.php">Trang chủ</a>
                                        </li>
                                        <li class="has-separator">

                                            <a href="shop-grid-left.html">Đồng hồ nam</a>
                                        </li>

                                        <li class="is-marked">

                                            <a href="shop-grid-left.html">TISSOT LE LOCLE POWERMATIC 80 OPEN HEART T006.407.11.033.02</a>
                                        </li>
                                    </ul>
                                </div>
                                <!--====== End - Product Breadcrumb ======-->
                                <!--====== Product Detail ======-->
                                <div class="pd u-s-m-b-30">
                                    <div class="pd-wrap">
                                        <div id="js-product-detail-modal">
                                            <div>

                                                <img class="u-img-fluid" src="https://hpauthentic.vn/wp-content/uploads/2023/02/Longines-Date-Moon-stars-L2.673.4.92.0.gif" alt="">
                                            </div>
                                            <!--hiển thị hình ảnh sản phẩm riêng lẻ. Lớp "u-img-fluid" đảm bảo hình ảnh phản hồi nhanh và thuộc tính "alt" cung cấp văn bản thay thế cho khả năng truy cập-->
                                            <div>

                                                <img class="u-img-fluid" src="https://hpauthentic.vn/wp-content/uploads/2023/02/Longines-Date-Moon-stars-L2.673.4.92.0-5-1536x1536.jpg" alt="">
                                            </div>
                                            <div>

                                                <img class="u-img-fluid" src="https://hpauthentic.vn/wp-content/uploads/2023/02/Longines-Date-Moon-stars-L2.673.4.92.0-6-1536x1536.jpg" alt="">
                                            </div>
                                            <div>

                                                <img class="u-img-fluid" src="https://hpauthentic.vn/wp-content/uploads/2023/02/Longines-Date-Moon-stars-L2.673.4.92.0-3-1536x1536.jpg" alt="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="u-s-m-t-15">
                                        <div id="js-product-detail-modal-thumbnail">
                                            <!--Phần này thể hiện chi tiết sản phẩm trong phương thức. Nó bao gồm phần hình ảnh sản phẩm chính và phần hình thu nhỏ để điều hướng nhanh. -->
                                            <div>

                                                <img class="u-img-fluid" src="https://hpauthentic.vn/wp-content/uploads/2023/02/Longines-Date-Moon-stars-L2.673.4.92.0.gif" alt="">
                                            </div>
                                            <!--hiển thị hình ảnh sản phẩm riêng lẻ. Lớp "u-img-fluid" đảm bảo hình ảnh phản hồi nhanh và thuộc tính "alt" cung cấp văn bản thay thế cho khả năng truy cập-->
                                            <div>

                                                <img class="u-img-fluid" src="https://hpauthentic.vn/wp-content/uploads/2023/02/Longines-Date-Moon-stars-L2.673.4.92.0-5-1536x1536.jpg" alt="">
                                            </div>
                                            <div>

                                                <img class="u-img-fluid" src="https://hpauthentic.vn/wp-content/uploads/2023/02/Longines-Date-Moon-stars-L2.673.4.92.0-6-1536x1536.jpg" alt="">
                                            </div>
                                            <div>

                                                <img class="u-img-fluid" src="https://hpauthentic.vn/wp-content/uploads/2023/02/Longines-Date-Moon-stars-L2.673.4.92.0-3-1536x1536.jpg" alt="">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--====== End - Product Detail ======-->
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

                                                <a href="product-detail.html">35 Đánh giá </a>
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
