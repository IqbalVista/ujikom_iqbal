<?php
session_start();
require_once("koneksi.php");
//Kita akan membuat proses loginnya disini
if (isset($_POST["Login"])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cari = mysqli_query($db, "SELECT * FROM petugas WHERE username='$username' ");
	$hasil = mysqli_fetch_assoc($cari);
	//Jika data dicari kosong
	if (mysqli_num_rows($cari) == 0) {
		echo "<center>Username belum terdaftar! <a href='Login.php'>kembali!</a></center>";
	} else {
		//Jika password tidak sesuai dengan yang ada di database
		if ($hasil['password'] <> $password) {
			echo "<center>Password salah! <a href='Login.php'>kembali!</a></center>";
		} else {
			//Jika user sesuai dengan database maka akan redirect ke halaman utama dan akan dibuat sesi
			$_SESSION['username'] = $_POST['username'];
			header("location: index.php");
		}
	}
}
