<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="description" content="">

    <meta name="author" content="">


   
    <link href="images/logo/logo-favicon.png" rel="shortcut icon">
    <title>CoCoon</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/vendor.css">

    <!--====== Utility-Spacing: lấy định dạng css từ file này ======-->
    <link rel="stylesheet" href="css/utility.css">

    <!--====== App: lấy định dạng css từ file này ======-->
    <link rel="stylesheet" href="css/app.css">
</head>
<body class="config">
      
    <div id="app">  
    <?php
    include('header.php');
         ?>

        </header>
        <!--====== End - Main Header ======-->
        <!--====== App Content ======-->
        <div class="app-content">
            <!-- Class này dùng để sửa css của toàn bộ nội dung trang trừ header, footer-->
            <!--====== Section 1 ======-->
            <div class="u-s-p-y-90">
                <!-- Áp dụng định dạng cách biệt theo chiều dọc (trục y), cách padding-top và padding bottom là 5.625rem -->
                <div class="container">
                    <div class="row">
                        <!--Định dạng layout 2 phần với tỷ lệ 1/3-->
                        <div class="col-lg-3 col-md-12 col-12">
                            <!-- Phần chứa bộ lọc, kích thước cột cho các loại màn hình khác nhau, màn hình lớn thì gộp 3 cột thành 1 cột, màn hình trung thì gộp 12 cột thành 1 cột tức có 1 cột trên màn hình-->
                            <div class="shop-w-master">
                                <!--Phần chứa các phần tử của bộ lọc-->
                                <!-- thẻ h1 với class shop-w-master__heading và u-s-m-b-30 để định dạng tiêu đề chính -->
                                <h1 class="shop-w-master__heading u-s-m-b-30">
                                    <i class="fas fa-filter u-s-m-r-8"></i>
                                    <!-- Thẻ i với lớp FontAwesome "fas fa-filter" để hiển thị biểu tượng bộ lọc - vendor, và lớp "u-s-m-r-8" để định dạng khoảng cách - utility -->
                                    <span>LỌC SẢN PHẨM</span>
                                </h1>
                                <div class="shop-w-master__sidebar sidebar--bg-snow">
                                    <!-- Phần chính của bộ lọc với lớp shop-w-master__sidebar, sidebar--bg-snow để định dạng màu background của bộ lọc -->

                                    <div class="u-s-m-b-30">
    <!-- Định dạng khoảng cách bắt đầu phần tử lọc đầu tiên trong bộ lọc -->
    <div class="shop-w">
        <!-- Chứa nội dung cụ thể phần tử lọc đầu tiên của bộ lọc -->
        <div class="shop-w__intro-wrap">
            <!-- Phần giới thiệu phần tử lọc đầu tiên - danh mục -->
            <h1 class="shop-w__h">DANH MỤC</h1> <!-- Phần tiêu đề của bộ lọc đầu tiên -->
            <!-- Sử dụng icon FontAwesome cho chức năng thu gọn/mở rộng (toggle), áp dụng cho danh mục có ID s-category -->
            <span class="fas fa-minus shop-w__toggle" data-target="#s-category" data-toggle="collapse"></span>
        </div>
        <div class="shop-w__wrap collapse show" id="s-category">
        <?php
require_once 'database/config.php'; // Kết nối tới cơ sở dữ liệu

// Truy vấn danh mục
$sql = "SELECT c.id, c.name, COUNT(p.id) AS total_products
        FROM categories c
        LEFT JOIN products p ON c.id = p.category_id
        GROUP BY c.id";
$stmt = $pdo->query($sql);
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- Các phần tử thả xuống của bộ lọc -->
<ul class="shop-w__category-list gl-scroll">
    <!-- Thêm tùy chọn "Tất cả sản phẩm" -->
    <li class="has-list">
        <a href="javascript:void(0)" class="filter-category" data-category-id="0">Tất cả sản phẩm</a>
        <span class="category-list__text u-s-m-l-6">(<?= array_sum(array_column($categories, 'total_products')); ?>)</span>
    </li>
    <!-- Bắt đầu danh sách các danh mục sản phẩm, với khả năng cuộn nếu danh sách dài -->
    <?php if (!empty($categories)): ?>
        <?php foreach ($categories as $category): ?>
            <li class="has-list">
                <a href="javascript:void(0)" class="filter-category" data-category-id="<?= htmlspecialchars($category['id']); ?>">
                    <?= htmlspecialchars($category['name']); ?>
                </a>
                <span class="category-list__text u-s-m-l-6">(<?= htmlspecialchars($category['total_products']); ?>)</span>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <li>Không có danh mục nào.</li>
    <?php endif; ?>
</ul>


        </div>
    </div>



                                    <div class="u-s-m-b-30">
                                        <div class="shop-w">
                                            <div class="shop-w__intro-wrap">
                                                <h1 class="shop-w__h">GIÁ</h1>
                                                <span class="fas fa-minus shop-w__toggle" data-target="#s-price" data-toggle="collapse"></span>
                                            </div>
                                            <div class="shop-w__wrap collapse show" id="s-price">
                                                <div class="range all-range-slider">
                                                    <div class="range-slider">
                                                        <span class="range-selected"></span>
                                                    </div>
                                                    <div class="range-input">
                                                        <input type="range" class="min" min="700000" max="80000000" value="700000" step="100000" />
                                                        <input type="range" class="max" min="700000" max="80000000" value="80000000" step="100000" />
                                                    </div>
                                                    <div class="range-price">
                                                        <span class="locacao-min-price"></span>
                                                        <div>
                                                            <pre class="dau_cach"> - </pre>
                                                        </div>
                                                        <span class="locacao-max-price"></span>
                                                    </div>
                                                    <div class="nut_loc">
                                                        <button class="nutloc" type="submit">Lọc</button>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <script>
                                                const rangeMin = 100000; //Khoảng giá kéo tối thiểu của thanh, 100 có nghĩa là min và max khi kéo cách nhau tối thiểu 100
                                                document.addEventListener('DOMContentLoaded', function () { //Sự kiện khi trang được tải xong
                                                    const RangeElement = document.querySelector('.all-range-slider'); //Tìm phần tử có lớp .all-range-slider

                                                    ConfigurePriceRange(RangeElement); //Gọi hàm cấu hình cho thanh trượt giá
                                                });

                                                //Hàm cấu hình thanh trượt giá
                                                //dùng để cập nhật giao diện thanh trượt giá dựa trên giá trị được người dùng chọn
                                                function ConfigurePriceRange(element) {
                                                    //range: biểu diễn phần hiển thị giá trị đã chọn trong thanh trượt, sử dụng phương thức 'querySelector'để tìm kiếm trong các element phân tử đầu tiên có lớp CSS .range-selected nằm trong lớp .range-slider
                                                    const range = element.querySelector('.range-slider .range-selected');

                                                    // Sử dụng querySelectorAll để tìm tất cả các phần tử input trong phần tử có lớp .range-input
                                                    // Chỉ thanh trượt dùng để chọn giá trị tối thiểu và tối đa
                                                    const rangeInput = element.querySelectorAll('.range-input input');

                                                    //Tương tự như trên querySelectorAll dùng để tìm tất cả các phần tử <span> trong phần tử có lớp .range-price
                                                    //Hiển thị giá trị giá tối thiểu và tối đa
                                                    const rangePrice = element.querySelectorAll('.range-price span');
                                                    const minOffset = calculateOffset(rangeInput[0]); //giá trị dùng để thể hiện khoảng cách giữa giá trị tối thiểu và 0 (vị trí đầu thanh trượt)

                                                    //Cập nhật nội dung hiển thị cho các phần tử <span> giá trị tối thiểu và tối đa dựa trên giá trị Input
                                                    rangePrice[0].textContent = formatCurrency(parseInt(rangeInput[0].value)); //rangeInput[0]: truy cập phần tử đầu tiên trong danh sách các phần tử <span> được tìm thấy bởi querySelectorAll('.range-price span'), phần tử này hiển thị giá trị tối thiểu đã chọn từ thanh trượt
                                                    rangePrice[1].textContent = formatCurrency(parseInt(rangeInput[1].value)); // tương tự dòng này hiển thị phần tử tối đa trong thanh trượt

                                                    //Thêm sự kiện cho mỗi input -> khi người dùng di chuyển thanh trượt, input sẽ được kích hoạt và hàm UpdatePriceRange được gọi để cập nhật giao diện
                                                    rangeInput.forEach((input) => {
                                                        input.addEventListener('input', () => {
                                                            UpdatePriceRange(range, rangeInput, rangePrice, minOffset);
                                                        });
                                                    });

                                                    //Thêm sự kiện cho mỗi phần tử <span>
                                                    //Khi giá trị trong <span> thay đổi, hàm UpdatePriceRange sẽ được gọi để cập nhật giao diện
                                                    rangePrice.forEach((span) => {
                                                        span.addEventListener('input', (event) => {
                                                            const minPrice = GetMinimumValue(element);
                                                            const maxPrice = GetMaximumValue(element);
                                                            //Kiểm tra xem khoảng cách giữa minPrice và maxPrice không được nhỏ hơn rangeMin
                                                            if (maxPrice - minPrice >= rangeMin && maxPrice <= rangeInput[1].max) {
                                                                if (event.target.classList.contains('min-price')) {
                                                                    rangeInput[0].value = minPrice;
                                                                    UpdatePriceRange(range, rangeInput, rangePrice, minOffset);
                                                                } else {
                                                                    rangeInput[1].value = maxPrice;
                                                                    UpdatePriceRange(range, rangeInput, rangePrice, minOffset);
                                                                }
                                                            }
                                                        });
                                                    });
                                                }

                                                function UpdatePriceRange(range, rangeInput, rangePrice, minOffset) {
                                                    const minRange = parseInt(rangeInput[0]?.value || 0); //Lấy giá trị tối thiểu từ Input
                                                    const maxRange = parseInt(rangeInput[1]?.value || 0); //Lấy giá trị tối đa từ input

                                                    // Kiểm tra khoảng cách giữa giá trị tối thiểu và tối đa
                                                    if (maxRange - minRange < rangeMin) {
                                                        if (event.target?.classList.contains('min')) {
                                                            rangeInput[0].value = maxRange - rangeMin;
                                                        } else {
                                                            rangeInput[1].value = minRange + rangeMin;
                                                        }
                                                    } else {
                                                        // Cập nhật giá trị tối thiểu và tối đa
                                                        rangePrice[0].textContent = formatCurrency(minRange);
                                                        rangePrice[1].textContent = formatCurrency(maxRange);

                                                        // Tính toán vị trí và kích thước của thanh trượt đã chọn
                                                        const maximo = parseInt(rangeInput[1].getAttribute('max'));
                                                        const minimo = parseInt(rangeInput[0].getAttribute('min'));

                                                        //offsetLeft là một thuộc tính DOM chỉ khoảng cách từ phần tử đến cạnh trái của phần tử chứa nó (offset parent)
                                                        //rangeInput[1].offsetLeft - rangeInput[0].offsetLeft tính toán khoảng cách giữa hai thanh trượt, giá trị tối thiểu và tối đa
                                                        const totalRange = rangeInput[1].offsetLeft - rangeInput[0].offsetLeft;
                                                        //Tính toán phần trăm khoảng cách từ vị trí bắt đầu của thanh trượt đến vị trí hiện tại của thanh trượt giá trị tối thiểu (minRange)
                                                        const leftPercent = ((minRange - minimo) / (maximo - minimo)) * 100;
                                                        //Tính toán phần trăm khoảng cách từ vị trí bắt đầu của thanh trượt đến vị trí hiện tại của thanh trượt giá trị tối đa (maxRange)
                                                        const rightPercent = 100 - ((maxRange - minimo) / (maximo - minimo)) * 100;

                                                        //Cập nhật thuộc tính style của phần tử range để phản ánh vị trí hiện tại của thanh trượt
                                                        //leftPercent và rightPercent được sử dụng để xác định rõ vị trí bên trái và phải của thanh trượt giá trị đã chọn, tạo ra hiệu ứng "được chọn" trong giao diện người dùng
                                                        range.style.left = `${leftPercent}%`;
                                                        range.style.right = `${rightPercent}%`;
                                                    }
                                                }

                                                function formatCurrency(value) { //định dạng tiền tệ sang vnd
                                                    return value.toLocaleString('vn-VN', { style: 'currency', currency: 'VND' });
                                                }
                                                // Lấy giá trị tối thiểu
                                                function GetMinimumValue(element) {
                                                    return parseInt(element.querySelector('.min-price').textContent.replace(/\D/g, ''));
                                                }
                                                // Lấy giá trị tối đa
                                                function GetMaximumValue(element) {
                                                    return parseInt(element.querySelector('.max-price').textContent.replace(/\D/g, ''));
                                                }
                                                //// Tính toán khoảng cách cho giá trị tối thiểu
                                                function calculateOffset(minInput) {
                                                    const minOffset = parseInt(minInput.getAttribute('min')) || 0;
                                                    return Math.abs(minOffset);
                                                }
                                            </script>
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <div class="shop-w">
                                            <div class="shop-w__intro-wrap">
                                                <h1 class="shop-w__h">ĐÁNH GIÁ</h1>
                                                <span class="fas fa-minus shop-w__toggle" data-target="#s-rating" data-toggle="collapse"></span> <!--Thu gọn/mở rộng phần thanh lọc-->
                                            </div>
                                            <div class="shop-w__wrap collapse show" id="s-rating">
                                                <ul class="shop-w__list gl-scroll">
                                                    <li>
                                                        <div class="rating__check">

                                                            <input type="checkbox"> <!--input kiểu checkbox để chọn lựa-->
                                                            <!--Hiển thị icon sao với fas fa-star là sao đầy đủ và far fa-star là sao rỗng -->
                                                            <div class="rating__check-star-wrap"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                                        </div>

                                                        <span class="shop-w__total-text">(2)</span> <!--số lượng đánh giá-->
                                                    </li>
                                                    <li>
                                                        <div class="rating__check">

                                                            <input type="checkbox">

                                                            <div class="rating__check-star-wrap"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                                                        </div>

                                                        <span class="shop-w__total-text">(8)</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating__check">

                                                            <input type="checkbox">
                                                            <div class="rating__check-star-wrap"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></div>
                                                        </div>

                                                        <span class="shop-w__total-text">(10)</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating__check">

                                                            <input type="checkbox">
                                                            <div class="rating__check-star-wrap"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></div>
                                                        </div>

                                                        <span class="shop-w__total-text">(12)</span>
                                                    </li>
                                                    <li>
                                                        <div class="rating__check">

                                                            <input type="checkbox">
                                                            <div class="rating__check-star-wrap"><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></div>
                                                        </div>

                                                        <span class="shop-w__total-text">(1)</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="u-s-m-b-30">
                                        <div class="shop-w">
                                            <div class="shop-w__intro-wrap">

                                                
                                                        <!--====== Kết thúc - Check Box ======-->

                                                     

                                                        <!--====== Check Box ======-->
                                                        
                                                        <!--====== Kết thúc - Check Box ======-->

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> </div>
                        <div class="col-lg-9 col-md-12 col-12">
                            <!-- Phần chứa các sản phẩm của cửa hàng, kích thước cột cho các loại màn hình khác nhau, màn hình lớn thì gộp 9 cột thành 1 cột, màn hình trung thì gộp 12 cột thành 1 cột tức có 1 cột trên màn hình-->
                            <div class="shop-p">
                                <!--định dạng toàn bộ phần hiển thị cửa hàng-->
                               
                                        <!-- phần này người dùng có thể tương tác -->
                                        <form>
                                            <div class="tool-style__form-wrap">
                                                <div class="u-s-m-t-8">
                                                    <select class="select-box select-box--transparent-b-2">
                                                        <!--các lựa chọn sắp xếp sản phẩm-->
                                                        <option>Sắp xếp: Sản phẩm mới nhất</option>
                                                        <option>Sắp xếp: Sản phẩm bán chạy</option>
                                                        <option>Sắp xếp: Sản phẩm giảm giá</option>
                                                        <option>Sắp xếp: Giá từ cao đến thấp</option>
                                                        <option>Sắp xếp: Giá từ thấp đến cao</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="shop-p__collection">
                                        <!-- Phần chứa các sản phẩm của cửa hàng -->
                                        <div class="row is-grid-active">
                                        <?php
        // Lấy tất cả sản phẩm từ cơ sở dữ liệu
        $sql = "SELECT products.*, categories.name AS category_name
                FROM products
                LEFT JOIN categories ON products.category_id = categories.id";
        $stmt = $pdo->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

    <?php if (count($products) > 0): ?>
        <?php foreach ($products as $product): ?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                <div class="product-m">
                    <div class="product-m__thumb">
                        <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product_detail.php?id=<?php echo $product['id']; ?>">
                            <img class="aspect__img" src="database/uploads/<?php echo htmlspecialchars($product['image']); ?>" 
                                 alt="<?php echo htmlspecialchars($product['name']); ?>">
                        </a>
                        <div class="product-m__quick-look">
                            <!-- Nút xem chi tiết -->
                            <a href="product_detail.php?id=<?php echo $product['id']; ?>" class="btn-detail">Xem chi tiết</a>
                        </div>
                        <div class="product-m__add-cart">
                        <a href="javascript:void(0)" 
   class="btn--e-brand" 
   data-id="<?= $product['id']; ?>" 
   data-name="<?= htmlspecialchars($product['name']); ?>" 
   data-price="<?= $product['price']; ?>">
   Thêm vào giỏ hàng
</a>
                        </div>
                    </div>

                    <div class="product-m__content">
                        <div class="product-m__category">
                        <a href="javascript:void(0)" class="filter-category" data-category-id="<?php echo $product['category_id']; ?>">
    <?php echo htmlspecialchars($product['category_name'] ?? 'Chưa có danh mục'); ?>
</a>

                        </div>
                        <div class="product-m__name">
                            <a href="product_detail.php?id=<?php echo $product['id']; ?>"><?php echo htmlspecialchars($product['name']); ?></a>
                        </div>
                        <div class="product-m__rating gl-rating-style">
                            <?php
                            $rating = isset($product['rating']) ? $product['rating'] : 0; // Default rating is 0
                            for ($i = 0; $i < 5; $i++) {
                                echo $i < round($rating) ? '<i class="fas fa-star"></i>' : '<i class="far fa-star"></i>';
                            }
                            ?>
                            <span class="product-m__review">(<?php echo isset($product['reviews']) ? htmlspecialchars($product['reviews']) : 'Chưa có đánh giá'; ?>)</span>
                        </div>
                        <div class="product-m__price">
                            <?php echo number_format($product['price'], 0, ',', '.'); ?>₫
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Xem Chi Tiết -->
            <div class="modal fade" id="productDetailModal<?php echo $product['id']; ?>" tabindex="-1" aria-labelledby="productDetailLabel<?php echo $product['id']; ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="productDetailLabel<?php echo $product['id']; ?>"><?php echo htmlspecialchars($product['name']); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="database/uploads/<?php echo htmlspecialchars($product['image']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($product['name']); ?>">
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Danh mục:</strong> <?php echo isset($product['category']) ? htmlspecialchars($product['category']) : 'Chưa có danh mục'; ?></p>
                                    <p><strong>Giá:</strong> <?php echo number_format($product['price'], 0, ',', '.'); ?>₫</p>
                                    <p><strong>Đánh giá:</strong> <?php echo isset($product['rating']) ? htmlspecialchars($product['rating']) : 'Chưa có đánh giá'; ?> / 5</p>
                                    <p><strong>Mô tả:</strong></p>
                                    <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
                                    <a href="#" class="btn--e-brand" 
   data-id="<?php echo $product['id']; ?>" 
   data-name="<?php echo htmlspecialchars($product['name']); ?>" 
   data-price="<?php echo $product['price']; ?>">Thêm vào giỏ hàng
</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->
        <?php endforeach; ?>
    <?php else: ?>
        <p class="col-12">Không có sản phẩm nào.</p>
    <?php endif; ?>
</div></div></div></div></div></div>
<?php
    include('admin/footer.php');
         ?>

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
    <!-- Footer  -->
    <script>
  document.addEventListener('DOMContentLoaded', function () {
    const productList = document.querySelector('.row.is-grid-active'); // Vùng chứa sản phẩm

    // Hàm gắn sự kiện "Thêm vào giỏ hàng"
    function attachAddToCartHandlers() {
        const addToCartButtons = document.querySelectorAll('.btn--e-brand');
        addToCartButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>

                const productId = this.getAttribute('data-id');
                const productName = this.getAttribute('data-name');
                const productPrice = this.getAttribute('data-price');

                // Gửi yêu cầu AJAX đến cart_handler.php
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
            });
        });
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

    // Hàm xử lý lọc sản phẩm theo danh mục
    function attachCategoryFilterHandlers() {
        const categoryLinks = document.querySelectorAll('.filter-category');
        categoryLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault(); // Ngăn chặn tải lại trang

                const categoryId = this.getAttribute('data-category-id'); // Lấy ID danh mục

                // Gửi yêu cầu AJAX để lấy sản phẩm
                fetch('ajax_load_products.php?category_id=' + categoryId)
                    .then(response => response.text())
                    .then(data => {
                        productList.innerHTML = data; // Cập nhật danh sách sản phẩm vào vùng chứa
                        attachAddToCartHandlers(); // Gắn lại sự kiện cho các nút "Thêm vào giỏ hàng"
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    }

    // Gọi các hàm gắn sự kiện
    attachAddToCartHandlers(); // Gắn sự kiện "Thêm vào giỏ hàng" lần đầu
    attachCategoryFilterHandlers(); // Gắn sự kiện lọc sản phẩm theo danh mục
});




</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchForm = document.getElementById('search-form');

    searchForm.addEventListener('submit', function (e) {
        e.preventDefault(); // Ngăn form tải lại trang

        const query = document.getElementById('main-search').value;

        // Tải trang kết quả tìm kiếm với từ khóa
        window.location.href = `search_results.php?query=${encodeURIComponent(query)}`;
    });
});
</script>

    
</body>
</html>