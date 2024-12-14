<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .product {
            margin-bottom: 20px;
        }
        .product img {
            max-width: 200px;
        }
    </style>
</head>
<body>

<h1>Danh sách Sản Phẩm</h1>

<div id="product-list">
    <!-- Danh sách sản phẩm sẽ hiển thị ở đây -->
</div>

<script>
// Hàm để lấy sản phẩm từ API và hiển thị
function fetchProducts() {
    fetch('http://localhost/cooladmin/getproduct.php')  // Đảm bảo đường dẫn này đúng
        .then(response => response.json())  // Chuyển dữ liệu JSON trả về thành mảng JavaScript
        .then(data => {
            let productList = document.getElementById('product-list');
            productList.innerHTML = ''; // Làm mới nội dung trước khi hiển thị

            // Duyệt qua dữ liệu sản phẩm và hiển thị từng sản phẩm
            data.forEach(product => {
                let productItem = document.createElement('div');
                productItem.classList.add('product');
                productItem.innerHTML = `
                    <h3>${product.name}</h3>
                    <p>Code: ${product.code}</p>
                    <p>Price: ${product.price} VND</p>
                    <p>Sale Price: ${product.sale_price ? product.sale_price : 'Không có giảm giá'}</p>
                    <p>${product.description}</p>
                    <img src="${product.image}" alt="${product.name}">
                    <p>Quantity: ${product.quantity}</p>
                `;
                productList.appendChild(productItem);
            });
        })
        .catch(error => {
            console.error('Error fetching products:', error);
        });
}

// Gọi hàm để tải sản phẩm khi trang load
window.onload = fetchProducts;
</script>

</body>
</html>
