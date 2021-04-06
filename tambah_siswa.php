<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Siswa</title>
</head>

<body>
    <!-- Panggil header -->
    <?php require("header.php"); ?>
    <!-- Konten -->
    <h3>Tambah Siswa</h3>
    <form action="" method="POST">
        <table cellpadding="5">
            <form action="tambah_siswa.php" autocomplete="off">
                <tr>
                    <td>NISN :</td>
                    <td><input type="number" name="nisn"></td>
                </tr>
                <tr>
                    <td>NIS :</td>
                    <td><input type="number" name="nis"></td>
                </tr>
                <tr>
                    <td>Nama :</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Kelas :</td>
                    <td><select name="kelas">
                            <?php
                            $kelas = mysqli_query($db, "SELECT * FROM kelas");
                            while ($r = mysqli_fetch_assoc($kelas)) { ?>
                                <option value="<?= $r['id_kelas']; ?>"><?= $r['nama_kelas'] . " | "
                                                                            . $r['kompetensi_keahlian']; ?></option>
                            <?php } ?>
                        </select></td>
                </tr>
                <td>Alamat :</td>
                <td><input type="text" name="alamat"></td>
                </tr>
                <td>No Telp :</td>
                <td><input type="tel" name="no"></td>
                </tr>
                </tr>
                <td>Spp:</td>
                <td><select name="id_spp">
            </form>
            <?php
            $kelas = mysqli_query($db, "SELECT * FROM spp");
            while ($r = mysqli_fetch_assoc($kelas)) { ?>
                <option value="<?= $r['id_spp']; ?>"><?= $r['id_spp']; ?></option>
            <?php } ?> </select></td>
            <tr>
                <td colspan="2"><button type="submit" name="simpan">Simpan</button></td>
            </tr>
        </table>
    </form>
    <hr />
</body>

</html>
<?php
// Proses Simpan
if (isset($_POST['simpan'])) {
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no'];
    $id_spp = $_POST['id_spp'];
    $simpan = mysqli_query($db, "INSERT INTO siswa VALUES('$nisn', '$nis', '$nama', '$kelas', '$alamat', '$no_telp', '$id_spp')");

    echo $simpan;
    if ($simpan) {
        header("location: siswa.php");
    } else {
        //   echo "<script>alert('Data sudah ada');</script>";
    }
}
?>