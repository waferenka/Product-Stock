<?php
    session_start();

    include('php/php.php');

    // Periksa apakah user sudah login
    if (!isset($_SESSION['userid'])) {
        header("Location: login/login_form.php");
        exit;
    }
    
    $allowed_levels = ['penjual'];
    $user_level = $_SESSION['level'];
    
    if (!in_array($_SESSION['level'], $allowed_levels)) {
        session_unset();
        session_destroy();
        header("Location: login/login_form.php");
        exit;
    }

    // Ambil nilai ENUM untuk category
    $query_enum_category = "SHOW COLUMNS FROM products LIKE 'category'";
    $result_enum_category = mysqli_query($conn, $query_enum_category);
    $enum_values_category = [];
    if ($result_enum_category) {
        $row_enum_category = mysqli_fetch_assoc($result_enum_category);
        preg_match_all("/'([^']+)'/", $row_enum_category['Type'], $matches);
        $enum_values_category = $matches[1];
    }

    // Query untuk mengambil data produk
    $query = "SELECT id, name, price, image FROM products";
    $result = $conn->query($query);

    $products = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Metadata -->
    <?php include('metadata.php'); ?>
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
    .navbar-brand {
        display: inline;
    }

    .container {
        padding-top: 5rem;
    }

    .stock-control {
        display: flex;
        align-items: center;
    }

    .stock-control button {
        width: 40px;
        height: 40px;
        font-size: 1.2rem;
    }

    .stock-control input {
        text-align: center;
        width: 60px;
        margin: 0 5px;
    }

    @media (max-width: 321px) {
        .navbar-brand {
            font-size: 17px;
        }
    }
    </style>
</head>

<body>
    <script src="script/script.js"></script>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
        </div>
    </nav>

    <div class="container px-3" style="color: black;">
        <h3 style="font-weight: bold;">Tambah Produk</h3>
        <form action="php/proses_tambah.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" rows="4" required
                    autocomplete="off"></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="text" name="price" id="price" class="form-control" requiredautocomplete="off">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <select name="category" id="category" class="form-control" required autocomplete="off">
                    <?php
                    foreach ($enum_values_category as $value) {
                        echo "<option value='$value'>$value</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="satuan" class="form-label">Satuan</label>
                <input type="text" name="satuan" id="satuan" class="form-control" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stok</label>
                <div class="stock-control">
                    <button type="button" class="btn btn-secondary" onclick="changeStock(-1)">-</button>
                    <input type="number" name="stock" id="stock" value="0" class="form-control" required>
                    <button type="button" class="btn btn-secondary" onclick="changeStock(1)">+</button>
                </div>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Foto</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*" required
                    autocomplete="off">
            </div>
            <button type="submit" class="btn btn-success">Tambah Data</button>
        </form>
        <a href="index_p.php" class="btn btn-warning my-3">Kembali</a>
    </div>

    <script>
    function changeStock(amount) {
        const stockInput = document.getElementById('stock');
        let currentValue = parseInt(stockInput.value);
        if (isNaN(currentValue)) {
            currentValue = 0;
        }
        if (currentValue + amount >= 0) {
            stockInput.value = currentValue + amount;
        }
    }
    </script>
</body>

</html>