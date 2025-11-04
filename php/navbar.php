<?php 
    $user_level = $_SESSION['level'];
    $restricted_levels = ['admin', 'penjual'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-A2jiukqkqsZik1Kl">
    </script>
    <style>
    .modal-body {
        font-family: Arial, sans-serif;
    }

    .cart-item {
        display: flex;
        align-items: center;
        padding: 10px 0;
    }

    .cart-image img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        margin-right: 10px;
    }

    .cart-details {
        display: flex;
        flex: 1;
        align-items: center;
        justify-content: space-between;
    }

    .product-name {
        font-weight: bold;
        margin-right: auto;
    }

    .product-price {
        margin-left: 10px;
        color: #555;
    }

    .quantity-control {
        display: flex;
        align-items: center;
    }

    .quantity-control input {
        width: 50px;
        margin-left: 5px;
        text-align: center;
        transform: translateY(-8px);
    }

    .delete-link {
        color: red;
        text-decoration: none;
        margin-left: 10px;
        font-size: 0.9em;
        transform: translateY(-8px);
    }

    .delete-link:hover {
        text-decoration: underline;
    }

    .total-price {
        font-size: 1.2em;
        text-align: right;
        margin-top: 0px;
        font-weight: bold;
    }

    .cart-actions {
        text-align: center;
        margin-top: 15px;
    }

    /* Perbaikan untuk Stok Habis di Dropdown */
    .search-dropdown .item .item-image-wrapper {
        position: relative;
        margin-right: 10px;
    }

    .search-dropdown .item.out-of-stock .item-image {
        filter: grayscale(100%);
    }

    .search-dropdown .item.out-of-stock .item-image-wrapper::after {
        content: 'Out of Stock';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
        font-size: 0.75em;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <!-- Navbar, Search, Keranjang, User -->
    <nav class="navbar">
        <div class="container-fluid">
            <?php if ($user_level == 'penjual'): ?>
            <a class="navbar-brand font-weight-bold" href="index_p.php">
                Alzi Petshop
            </a>
            <?php elseif ($user_level == 'pembeli'): ?>
            <a class="navbar-brand font-weight-bold" href="index.php">
                Alzi Petshop
            </a>
            <?php endif; ?>
            <div class="search-box">
                <div class="search-input-wrapper">
                    <input type="text" id="searchInput" placeholder="Find a Product..." autocomplete="off">
                    <div class="search-dropdown" id="searchResults"></div>
                </div>
            </div>
            <?php if ($user_level == 'penjual'): ?>
            <div class="d-flex">
                <a href="tambah.php" class="btn btn-warning ms-4 me-1" id="tambah">Add Product</a>
            </div>
            <?php endif; ?>
        </div>
    </nav>
    <!-- End Navbar, Search, Keranjang, User -->

    <script>
    const products = <?php echo json_encode($products); ?>;
    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');

    searchInput.addEventListener('input', function() {
        const query = searchInput.value.toLowerCase().trim();

        searchResults.innerHTML = '';

        if (query.length > 0) {
            const filteredProducts = products.filter(product =>
                product.name.toLowerCase().includes(query)
            );

            if (filteredProducts.length > 0) {
                searchResults.style.display = 'block';
                filteredProducts.forEach(product => {
                    const item = document.createElement('div');
                    item.classList.add('item');
                    if (product.stock == 0) {
                        item.classList.add('out-of-stock');
                    }

                    let priceFormatted = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0
                    }).format(product.price);

                    // Logika untuk path gambar WebP dan fallback
                    const imagePath = product.image;
                    const webpPath = imagePath.substring(0, imagePath.lastIndexOf('.')) + '.webp';
                    const originalPath = imagePath.replace('.webp', '.jpg'); // Asumsi fallback

                    item.innerHTML = `
                        <div class="item-image-wrapper">
                            <picture>
                                <source srcset="${webpPath}" type="image/webp">
                                <source srcset="${originalPath}" type="image/jpeg">
                                <img src="${originalPath}" loading="lazy" alt="${product.name}" class="item-image">
                            </picture>
                        </div>
                        <div class="item-details">
                            <h5>${product.name}</h5>
                            <span>${priceFormatted}</span>
                        </div>
                    `;

                    item.addEventListener('click', () => {
                        // Hanya redirect jika stok lebih dari 0
                        if (product.stock > 0) {
                            window.location.href = `produk.php?product_id=${product.id}`;
                        }
                    });
                    searchResults.appendChild(item);
                });
            } else {
                searchResults.style.display = 'none';
            }
        } else {
            searchResults.style.display = 'none';
        }
    });

    // searchInput.addEventListener('blur', function() {
    //     searchInput.value = '';
    //     searchResults.style.display = 'none';
    // });
    </script>
</body>

</html>