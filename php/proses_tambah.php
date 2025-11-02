<?php
require 'php.php';

if (isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["category"])) {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $category = $_POST["category"];
    $satuan = $_POST["satuan"];
    $stock = $_POST["stock"]; // Mengambil data stok

    $target_file_path_for_db = "";

    // Logika Upload dan Konversi Gambar
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $image_tmp_name = $_FILES["image"]["tmp_name"];
        $image_name = basename($_FILES["image"]["name"]);
        $image_info = getimagesize($image_tmp_name);
        $original_extension = image_type_to_extension($image_info[2], false);

        // Tentukan direktori target
        $target_dir = "../imgs/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Simpan file asli
        $original_file_path = $target_dir . $image_name;
        move_uploaded_file($image_tmp_name, $original_file_path);

        // Buat path untuk file WebP
        $webp_file_name = pathinfo($image_name, PATHINFO_FILENAME) . '.webp';
        $webp_file_path = $target_dir . $webp_file_name;

        // Buat gambar dari file asli
        $source_image = null;
        if ($original_extension == 'jpeg' || $original_extension == 'jpg') {
            $source_image = imagecreatefromjpeg($original_file_path);
        } elseif ($original_extension == 'png') {
            $source_image = imagecreatefrompng($original_file_path);
            imagepalettetotruecolor($source_image);
            imagealphablending($source_image, true);
            imagesavealpha($source_image, true);
        } elseif ($original_extension == 'gif') {
            $source_image = imagecreatefromgif($original_file_path);
        }

        // Konversi ke WebP dan simpan
        if ($source_image !== null) {
            imagewebp($source_image, $webp_file_path, 80); // Kualitas 80
            imagedestroy($source_image);
            // Path yang akan disimpan ke DB adalah path WebP
            $target_file_path_for_db = './imgs/' . $webp_file_name;
        } else {
            // Jika format tidak didukung, simpan path asli
            $target_file_path_for_db = './imgs/' . $image_name;
        }

    } else {
        $target_file_path_for_db = ""; // Tidak ada gambar yang diunggah
    }

    $query = "INSERT INTO products (name, description, price, image, category, satuan, stock) 
            VALUES ('$name', '$description', '$price', '$target_file_path_for_db', '$category', '$satuan', '$stock')";

    mysqli_query($conn, $query);

    header("Location: ../index_p.php");
}
?>
