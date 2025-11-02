<?php
    session_start();
    
    if (isset($_SESSION['level'])) {
        if ($_SESSION['level'] == 'penjual') {
            session_unset();
            session_destroy();
            header('Location: landing_page.php');
            exit;
        } else if ($_SESSION['level'] != 'pembeli') {
            session_unset();
            session_destroy();
            header('Location: landing_page.php');
            exit;
        }
    } else {
        header('Location: landing_page.php');
        exit;
    }

    include('php/php.php');

    $query = "SELECT id, name, price, image, stock FROM products"; // Menambahkan 'stock'
    $result = $conn->query($query);

    $products = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }

    require('php/navbar.php');
?>

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
        .section {
            padding: 10px 20px;
            background: #ffffff;
            text-align: center;
        }

        .section:nth-child(even) {
            background: #ffffff;
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
    <script src="script/script.js"></script>
    <?php  ?>

    <!-- Slider Otomatis Carousel Bootstrap v5.3 -->
    <div class="container mt-5 pt-4">
        <div id="carouselExampleSlidesOnly" class="carousel slide my-1 position-relative" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                    $slides = [
                        ['original' => 'imgs/slide1.jpg', 'alt' => 'Slide 1'],
                        ['original' => 'imgs/slide2.jpg', 'alt' => 'Slide 2'],
                        ['original' => 'imgs/slide3.jpg', 'alt' => 'Slide 3'],
                    ];

                    foreach ($slides as $index => $slide) {
                        $webp_path = pathinfo($slide['original'], PATHINFO_DIRNAME) . '/' . pathinfo($slide['original'], PATHINFO_FILENAME) . '.webp';
                        $active_class = ($index == 0) ? 'active' : '';
                        echo '<div class="carousel-item ' . $active_class . '">';
                        echo '    <picture>';
                        echo '        <source srcset="' . $webp_path . '" type="image/webp">';
                        echo '        <source srcset="' . $slide['original'] . '" type="image/jpeg">';
                        echo '        <img src="' . $slide['original'] . '" class="d-block w-100" loading:="lazy" alt="' . $slide['alt'] . '">';
                        echo '    </picture>';
                        echo '</div>';
                    }
                ?>
                <div class="carousel-caption-custom">
                    <h1>Alzi Petshop</h1>
                    <p>Belanja Kebutuhan Kucingmu Disini!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider Otomatis Carousel Bootstrap v5.3 -->
    <!-- Tombol Kategori -->
    <div class="categories">
        <h2>Kategori Produk</h2>
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
    <div class="container mt-5 vh-100">
        <section id="alamat" class="section">
            <div class="mt-5">
                <h3 class="text-center mb-4">Lokasi Toko</h3>
                <div class="mt-3" style="margin: 0 auto;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3896.1145044769314!2d104.68707947487862!3d-3.01138543994488!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b9ff0b7a07357%3A0x85592345b2155066!2sAlzi%20Petshop!5e1!3m2!1sid!2sid!4v1737042965586!5m2!1sid!2sid"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
    </div>
    <script>
        const products_l = document.querySelectorAll('.product');

        products_l.forEach(product => {
            product.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');
                window.location.href = `produk.php?product_id=${productId}`;
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