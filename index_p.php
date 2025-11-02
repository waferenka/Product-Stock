<?php
	session_start();
	
	if (!isset($_SESSION['userid']) || ($_SESSION['level'] != 'penjual' && $_SESSION['level'] != 'admin')) {

		if (isset($_SESSION['level']) && $_SESSION['level'] == 'pembeli') {
			session_unset();
			session_destroy();
			header("Location: landing_page.php");
		} else {
			header("Location: login/login_form.php");
		}
		exit;
	}

	include('php/php.php');

	$query = "SELECT id, name, price, image, stock FROM products";
	$result = $conn->query($query);

	$products = [];
	if ($result->num_rows > 0) {
	    while ($row = $result->fetch_assoc()) {
	        $products[] = $row;
	    }
	}
?>
<!-- End PHP Data Js Search -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Metadata -->
    <?php include('metadata.php'); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .categories {
            margin-top: 3.5rem;
        }

        .product.out-of-stock .ppp {
            position: relative;
        }

        .product.out-of-stock .ppp::after {
            content: 'Stok Habis';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
            z-index: 1;
        }

        .product.out-of-stock img {
            filter: grayscale(100%);
        }
    </style>
    <title>Alzi Petshop</title>
</head>

<body>
    <!-- Navbar, Search, Keranjang, User -->
    <?php require('php/navbar.php'); ?>

    <!-- Tombol Kategori -->
    <div class="categories">
        <div class="category-list">
            <div class="category" style="background-color: #ff6c59" data-category="Makanan">
                Makanan
            </div>
            <div class="category" style="background-color: #ffada2" data-category="Peralatan">
                Peralatan
            </div>
            <div class="category" style="background-color: #ffd3a2" data-category="Aksesoris">
                Aksesoris
            </div>
            <div class="category" style="background-color: #f2d7b7" data-category="Kesehatan">
                Kesehatan
            </div>
            <div class="category" style="background-color: #b4b7f0" data-category="Kebersihan">
                Kebersihan
            </div>
        </div>
    </div>
    <!-- End Tombol Kategori -->

    <!-- List Produk Sesuai Kategori -->
    <div class="products" id="product-list">
        <?php
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $out_of_stock_class = ($row['stock'] == 0) ? 'out-of-stock' : '';

                    // Logika untuk menampilkan gambar WebP dengan fallback
                    $image_path = htmlspecialchars($row['image']);
                    $webp_path = pathinfo($image_path, PATHINFO_DIRNAME) . '/' . pathinfo($image_path, PATHINFO_FILENAME) . '.webp';
                    $original_path = str_replace('.webp', '.jpg', $image_path); // Asumsi fallback adalah jpg, bisa disesuaikan

                    echo '<div class="product ' . $out_of_stock_class . '" data-id="' . htmlspecialchars($row['id']) . '" data-category="' . htmlspecialchars($row['category']) . '">';
                    echo ' <div class="ppp">
                                <picture>
                                    <source srcset="' . $webp_path . '" type="image/webp">
                                    <source srcset="' . $original_path . '" type="image/jpeg">
                                    <img src="' . $original_path . '" loading:="lazy" alt="' . htmlspecialchars($row['name']) . '">
                                </picture>
                           </div>
                          <h3>' . htmlspecialchars($row['name']) . '</h3>
                          <p>' . rupiah($row['price']) . '</p>';
                    if ($row['stock'] == 0) {
                        echo '<p style="color: red; font-weight: bold;">Stok Habis</p>';
                    }
                    echo '</div>';
                }
            } else {
                echo '<p>No products available.</p>';
            }

            $conn->close();
        ?>
    </div>

    <script>
    const products_l = document.querySelectorAll('.product');
    products_l.forEach(product => {
        product.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            window.location.href = `edit.php?product_id=${productId}`;
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const defaultCategory = 'Makanan';
        showCategory(defaultCategory);

        document.querySelectorAll('.category').forEach(category => {
            category.addEventListener('click', function() {
                const selectedCategory = this.getAttribute('data-category');
                showCategory(selectedCategory);

                document.querySelectorAll('.category').forEach(cat => {
                    cat.classList.remove('active');
                });

                this.classList.add('active');
            });
        });

        function showCategory(category) {
            document.querySelectorAll('.product').forEach(product => {
                product.classList.remove('active');
            });

            document.querySelectorAll(`.product[data-category="${category}"]`).forEach(product => {
                product.classList.add('active');
            });

            document.querySelectorAll('.category').forEach(cat => {
                if (cat.getAttribute('data-category') === category) {
                    cat.classList.add('active');
                } else {
                    cat.classList.remove('active');
                }
            });
        }
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>