<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tambah Siswa</title>
</head>

<body>
    <h3>Tambah Siswa</h3>
    <from action="" method="POST">
        <table cellpadding="5">
            <tr>
                <td>ID Pembayaran :</td>
                <td><input type="number" name="no"></td>
            </tr>
            <td>ID Petugas :</td>
            <td><input type="number" name="no"></td>
            </tr>
            <td>Tgl / Bulan / Tahun :</td>
            <td><input type="text" name="Nama Kelas"></td>
            </tr>
            <td>ID Spp :</td>
            <td><input type="number" name="no"></td>
            </tr>
            <tr>
                <td>Jumlah Bayar :</td>
                <td><input type="number" name="no"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="simpan">Simpan</button></td>
            </tr>
        </table>
    </from>
    <hr />

    <?php
    // Proses Simpan
    if (isset($_POST['simpan'])) {
        $id_pembayaran = $_POST['id_pembayaran'];
        $id_petugas = $_POST['id_petugas'];
        $tgl_bulan_tahun = $_POST['tgl_bulan_tahun'];
        $id_spp = $_POST['id_spp'];
        $jumlah_bayar = $_POST['jumlah_bayar'];
        $simpan = mysqli_query($db, "INSERT INTO pembayaran VALUES ('$id_pembayaran','$id_petugas','tgl_bulan_tahun','id_spp','jumlah_bayar')");
        if ($simpan) {
            header("location: siswa.php");
        } else {
            echo "<script>alert('Data sudah ada');</script>";
        }
    }
    ?>
    <!-- Panggil footer -->
    <?php require_once("footer.php"); ?>