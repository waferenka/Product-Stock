<?php
// Mengaktifkan session pada PHP
session_start();

// Menghubungkan PHP dengan koneksi database
include '../php/php.php';

// Menangkap data yang dikirim dari form login
$login_input = $_POST['login_input']; // Bisa email atau no_telepon
$password = sha1($_POST['password']); // Mengenkripsi password

// Menyeleksi data user berdasarkan email atau no_telepon
$login = mysqli_query($conn, 
    "SELECT tbluser.id, tbluser.email, tbluser.password, tbluser.level 
     FROM tbluser 
     WHERE (tbluser.email='$login_input') AND tbluser.password='$password'"
);

// Menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// Cek apakah email atau no_telepon dengan password ditemukan pada database
if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    // Buat session login berdasarkan metode login (email atau no_telepon)
    if ($login_input == $data['email']) {
        $_SESSION['userid'] = $data['id'];
        $_SESSION['email'] = $data['email'];
    }

    $_SESSION['level'] = $data['level'];

    // Alihkan ke halaman sesuai level user
    if ($data['level'] == "penjual") {
        header("Location: ../index_p.php");
    } elseif ($data['level'] == "pembeli") {
        header("Location: ../index.php");
    } else {
        header("Location: login_form.php?error=Invalid user level");
    }
} else {
    header("Location: login_form.php?error=Email atau Password salah");
}
?>