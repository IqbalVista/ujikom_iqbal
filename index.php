<?php
session_start();
require_once("koneksi.php");
// Jika sesi dari login belum dibuat maka akan kita kembalikan ke halaman login
if(!isset($_SESSION['username'])){
    header("location: Login.php");
}else{
    // Jika sudah dibuatkan sesi maka akan kita masukkan kedalam variabel
    $username = $_SESSION['username'];
}
?>

<html>
    <head>
        <title>Aplikasi Pembayaran SPP</title>
    </head>
<body>
 <!-- Kita akan panggil menu navigasi -->
<?php require_once("header.php"); ?>
<h3>Selamat datang, <?= $username; ?></h3>
</body>
</html>