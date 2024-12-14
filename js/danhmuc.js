function loadProducts(categoryId) {
    fetch(`database/get_products.php?category_id=${categoryId}`)
        .then(response => response.json())
        .then(products => {
            let productHTML = '<div class="product-grid">';
            if (products.length > 0) {
                products.forEach(product => {
                    productHTML += `
                        <div class="product-item">
                            <img src="${product.image_path}" alt="${product.name}">
                            <h3>${product.name}</h3>
                            <p>${product.description}</p>
                            <p>Giá: ${product.price} VND</p>
                        </div>`;
                });
            } else {
                productHTML = '<p>Không có sản phẩm nào trong danh mục này.</p>';
            }
            productHTML += '</div>';
            document.getElementById('product-list').innerHTML = productHTML;
        });
}
function xoaDongNay(categoryId) {
    if (confirm("Bạn có chắc chắn muốn xóa danh mục này không?")) {
        window.location.href = `deletecategory.php?id=${categoryId}`;
    }
}

