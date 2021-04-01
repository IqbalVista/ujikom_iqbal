<?php
session_start();
require_once("koneksi.php");
// Jika sesi dari login belum dibuat maka kita akan di kembalikan ke halaman login
if (!isset($_SESSION['username'])) {
    header("location: login.php");
} else {
    //Jika sudah dibuatkan sesi maka kita akan masukan kedalam variable
    $username = $_SESSION['username'];
}
?>

<html>

<head>
    <title>Aplikasi Pembayaran SPP</title>
</head>

<body>
    <!-- Kita akan panggil menu navigasi -->
    <?php require_once("footer.php"); ?>
</body>

</html>