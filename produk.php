<?php
    session_start();
    include('php/php.php');
    
    $query = "SELECT id, name, price, image, stock FROM products";
    $result = $conn->query($query);

    $products = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }

    $product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;

    $data = mysqli_query($conn, "SELECT * FROM products WHERE id = '$product_id'");
    $productd = mysqli_fetch_assoc($data);
    if ($result && $result->num_rows > 0) {
        $nama_p = $productd['name'];
        $harga_p = $productd['price'];
        $satuan_p = $productd['satuan'];
    }

    require("php/navbar.php");
    $conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Metadata -->
    <?php include('metadata.php'); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .deskripsi-terbatas {
            cursor: pointer;
            position: relative;
            padding-bottom: 1rem;
        }

        .deskripsi-terbatas span {
            display: block;
        }

        .deskripsi-terbatas button {
            color: #007bff;
            text-decoration: underline;
            border: none;
            background: transparent;
        }

        .dropdown-menu {
            width: 100%;
            border: none;
            box-shadow: 0 -4px 4px rgba(0, 0, 0, 0.05);
        }

        .message-image {
            width: auto;
            height: 40px;
            display: block;
            border: 1.5px rgb(255, 180, 0) solid;
            border-radius: 6px;
        }

        @media (max-width: 436px) {
            #container-p {
                padding-bottom: 4rem;
            }

            .item-konten-p {
                padding: 1rem 1.5rem 0rem 1.5rem;
            }

            .item-button-mobile {
                display: flex;
                position: fixed;
                width: 100%;
                bottom: 0;
                left: 50%;
                transform: translateX(-50%);
                padding: 0.4rem 0.8rem;
                background-color: white;
                justify-content: center;
                z-index: 1000;
                box-shadow: 0 0 6px rgba(0, 0, 0, 0.1);
            }

            .item-button-tabdesk {
                display: none;
            }

            .btn-keranjang,
            .btn-beli {
                flex: 1;
            }
        }

        @media (min-width: 436px) {
            .item-button-tabdesk {
                display: block;
            }

            .item-button-mobile {
                display: none;
            }
        }

        .section {
            padding: 20px;
            background: #ffffff;
            text-align: center;
        }

        .section:nth-child(even) {
            background: #ffffff;
        }
    </style>
    <title>Alzi Petshop</title>
</head>

<body>
    <script src="script/script.js"></script>
    <!-- Detail Produk -->
    <div id="container-p" class="container mt-5 vh-100" style="padding-top: 1.5rem; color: black;">
        <?php if ($productd): ?>
        <div class="row">
            <!-- Gambar Produk -->
            <div class="col-md-6 text-center">
                <?php 
                    $image_path = htmlspecialchars($productd['image']);
                    $webp_path = pathinfo($image_path, PATHINFO_DIRNAME) . '/' . pathinfo($image_path, PATHINFO_FILENAME) . '.webp';
                    $original_path = str_replace('.webp', '.jpg', $image_path); // Asumsi fallback
                ?>
                <picture>
                    <source srcset="<?php echo $webp_path; ?>" type="image/webp">
                    <source srcset="<?php echo $original_path; ?>" type="image/jpeg">
                    <img src="<?php echo $original_path; ?>" alt="<?php echo htmlspecialchars($productd['name']); ?>" class="product-image">
                </picture>
            </div>
            <!-- Detail Produk -->
            <div class="col-md-6 item-konten-p">
                <h4 class="nama-p"><?php echo htmlspecialchars($productd['name']); ?></h4>
                <h2 class="harga-p">Rp<?php echo number_format($productd['price'], 0, ',', '.'); ?></h2>
                <form method="POST" action="">
                    <!-- Deskripsi -->
                    <div id="description" class="deskripsi-terbatas" onclick="toggleDescription()">
                        <?php 
                            $maxLength = 200;
                            $description = nl2br(htmlspecialchars($productd['description']));
                            $shortDesc = substr($description, 0, $maxLength);
                            $isTruncated = strlen($description) > $maxLength;

                            echo '<span id="short-desc">' . $shortDesc . ($isTruncated ? '...' : '') . '</span>';
                            echo '<span id="full-desc" style="display:none;">' . $description . '</span>';
                        ?>
                        <?php if ($isTruncated): ?>
                        <button id="toggle-desc" type="button" class="btn btn-link p-0"
                            style="pointer-events: none; text-decoration: none; color: rgb(255, 180, 0); font-weight: bold;">Lihat
                            Selengkapnya</button>
                        <?php endif; ?>
                    </div>
                    <!-- Menampilkan stok produk -->
                    <p class="mt-3"><b>Stok:</b> <?php echo htmlspecialchars($productd['stock']); ?></p>
                    <div class="d-flex align-items-center justify-content-start gap-2 action-row">
                        <?php  
                            $text = "Halo saya ingin bertanya tentang produk " . $productd['name'];
                            $encoded_text = urlencode($text);
                        ?>
                        <a href="https://api.whatsapp.com/send?phone=6283192655757&text=<?php echo $encoded_text ?>" class="btn-keranjang" style="text-decoration: none;">Hubungi</a>
                    </div>
                </form>
            </div>
        </div>
        <?php else: ?>
        <p class="text-danger">Produk tidak ditemukan.</p>
        <?php endif; ?>

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

    <!-- Js -->
    <script>
        function toggleDescription() {
            const shortDesc = document.getElementById('short-desc');
            const fullDesc = document.getElementById('full-desc');
            const button = document.getElementById('toggle-desc');

            if (fullDesc.style.display === 'none' || fullDesc.style.display === '') {
                fullDesc.style.display = 'inline';
                shortDesc.style.display = 'none';
                button.textContent = 'Sembunyikan';
            } else {
                fullDesc.style.display = 'none';
                shortDesc.style.display = 'inline';
                button.textContent = 'Lihat Selengkapnya';
            }
        }
    </script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>