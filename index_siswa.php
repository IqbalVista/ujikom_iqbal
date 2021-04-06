<?php
session_start();
require_once("koneksi.php");
// Jika sesi dari login belum dibuat maka akan kita kembalikan ke halaman login
if(!isset($_SESSION['nisn'])){
	header("location: login_siswa.php");
}else{
	// Jika sudah dibuatkan sesi maka akan kita masukan kedalam variable
	$nisn = $_SESSION['nisn'];
}
$siswa = mysqli_query($db, "SELECT * FROM siswa
JOIN kelas ON siswa.id_kelas=kelas.id_kelas
WHERE nisn='$nisn'");
$result = mysqli_fetch_assoc($siswa);
$pembayaran = mysqli_query($db, "SELECT * FROM pembayaran 
JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas
JOIN spp ON pembayaran.id_spp = spp.id_spp
WHERE nisn='$nisn'
ORDER BY tgl_bayar");
?>
<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Selamat datang di Aplikasi Pembayaran SPP</h1>
            <hr />
    <a href="logout.php">Logout</a>
            <hr />
    <h2>>> Halo, <?= $result['nama']; ?></h2>
    <h3>Biodata Kamu</h3>
            <hr />
    <table cellpadding="5">
        <tr>
            <td>NISN</td>
            <td>:</td>
            <td><?= $result['nisn']; ?></td>
        </tr>
        <tr>
            <td>NIS</td>
            <td>:</td>
            <td><?= $result['nis']; ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?= $result['nis']; ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><?= $result['nama_kelas'] . " | " . $result['kompetensi_keahlian']; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?= $result['alamat']; ?></td>
        </tr>
    </table>
            <hr />
    <p><h2>History Pembayaran Kamu</p></h2>
    <table id="history" cellpadding="5" cellspacing="0" border="1">
            <tr>
                <td>No. </td>
                <td>Petugas</td>
                <td>Tgl. Pembayaran</td>
                <td>Tahun | Nominal yang harus dibayar</td>
                <td>Jumlah yang dibayarkan</td>
                <td>status</td>
            </tr>
<?php
$no = 1;
while($r = mysqli_fetch_assoc($siswa)){ ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $r['nama_petugas']; ?></td>
                <td><?= $r['tgl_bayar']; ?></td>
                <td><?= $r['tahun'] . " | Rp. " . $r['nominal']; ?></td>
                <td><?= $r['jumlah_bayar']; ?></td>
                <td>
<?php
// Jika jumlah bayar sesuai dengan yang harus dibayar maka Status LUNAS
if($r['jumlah_bayar'] == $r['nominal']){ ?>
                <font style="color: darkgreen; font-weight: bold;">LUNAS</font>
<?php }else{ ?>                             BELUM LUNAS <?php } ?> </td>
            </tr>
    <?php $no++; } ?>
	</table>
</body>
</html>