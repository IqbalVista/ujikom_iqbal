<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CRUD Data Kelas</title>
</head>

<body>
    <!-- Panggil script header -->
    <?php require_once("header.php"); ?>
    <!-- Isi Konten -->
    <h3>Petugas</h3>
    <p><a href="tambah_petugas.php">Tambah Data</a></p>
    <table cellspacing="0" border="1" cellpadding="5">
        <tr>
            <th>Id Petugas </th>
            <th>Username</th>
            <th>Password</th>
            <th>Nama Petugas</th>
            <th>Level</th>
            <th>Aksi</th>
        </tr>
        <?php
        // Kita Konfigurasi Pagging disini
        $totalDataHalaman = 5;
        $data = mysqli_query($db, "SELECT * FROM petugas");
        $hitung = mysqli_num_rows($data);
        $totalHalaman = ceil($hitung / $totalDataHalaman);
        $halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
        $dataAwal = ($totalDataHalaman * $halAktif) - $totalDataHalaman;
        // Konfigurasi Selesai
        // Kita panggil tabel kelas
        $sql = mysqli_query($db, "SELECT * FROM petugas ORDER BY id_petugas LIMIT $dataAwal, $totalDataHalaman");
        $no = 1;
        while ($r = mysqli_fetch_assoc($sql)) { ?>
            <tr>
                <td><?= $r['id_petugas']; ?></td>
                <td><?= $r['username']; ?></td>
                <td><?= $r['password']; ?></td>
                <td><?= $r['nama_petugas']; ?></td>
                <td><?= $r['level']; ?></td>
                <td><a href="?hapus&id=<?= $r['id_petugas']; ?>">Hapus</a> |
                    <a href="edit_petugas.php?id=<?= $r['id_petugas']; ?>">Edit</a>
                </td>
            </tr>
        <?php $no++;
        } ?>
    </table>
    <!-- Tampilkan tombol halaman -->
    <?php for ($i = 1; $i <= $totalHalaman; $i++) : ?>
        <a href="?hal=<?= $i; ?>"><?= $i; ?></a>
    <?php endfor; ?>
    <!-- Selesai -->
    <hr />
</body>

</html>
<?php
// Tombol Hapus ditekan
if (isset($_GET['hapus'])) {
    $id = $_GET['id'];
    $hapus = mysqli_query($db, "DELETE FROM petugas WHERE id_petugas='$id'");
    if ($hapus) {
        header("location: petugas.php");
    } else {
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');
        </script>";
    }
}
?>
<!-- Panggil footer -->
<?php require_once("footer.php"); ?>