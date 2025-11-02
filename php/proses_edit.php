<?php
require 'php.php';
if (isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["category"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $category = $_POST["category"];
    $satuan = $_POST["satuan"];
    $stock = $_POST["stock"];

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $image_tmp_name = $_FILES["image"]["tmp_name"];
        $image_name = basename($_FILES["image"]["name"]);
        $image_info = getimagesize($image_tmp_name);
        $original_extension = image_type_to_extension($image_info[2], false);

        $target_dir = "../imgs/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $original_file_path = $target_dir . $image_name;
        move_uploaded_file($image_tmp_name, $original_file_path);

        $webp_file_name = pathinfo($image_name, PATHINFO_FILENAME) . '.webp';
        $webp_file_path = $target_dir . $webp_file_name;

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

        if ($source_image !== null) {
            imagewebp($source_image, $webp_file_path, 80);
            imagedestroy($source_image);
            $image_db_path = './imgs/' . $webp_file_name;
            $query = "UPDATE products SET 
                      name = '$name', description = '$description', price = '$price', image = '$image_db_path', category = '$category', satuan = '$satuan', stock = '$stock'
                      WHERE id = '$id'";
        } else {
            $image_db_path = './imgs/' . $image_name;
            $query = "UPDATE products SET 
                      name = '$name', description = '$description', price = '$price', image = '$image_db_path', category = '$category', satuan = '$satuan', stock = '$stock'
                      WHERE id = '$id'";
        }
    } else {
        $query = "UPDATE products SET 
                  name = '$name', description = '$description', price = '$price', category = '$category', satuan = '$satuan', stock = '$stock'
                  WHERE id = '$id'";
    }

    mysqli_query($conn, $query);

    header("Location: ../index_p.php");
    exit;
}
?>