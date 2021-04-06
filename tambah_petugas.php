<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Petugas</title>
</head>

<body>
    <!-- Panggil header -->
    <?php require("header.php"); ?>
    <!-- Konten -->
    <h3>Tambah Petugas</h3>
    <form action="" method="POST">
        <table cellpadding="5">
            <!-- <tr>
                <td>Id Petugas :</td>
                <td><input type="number" name="id_petugas"></td>
            </tr>-->
            <tr>
                <td>Username :</td>
                <td><input type="text" name="user"></td>
            </tr>
            <tr>
                <td>Password :</td>
                <td><input type="text" name="pass"></td>
            </tr>
            <tr>
                <td>Nama :</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Level :</td>
                <td><input type="text" name="level"></td>
            </tr>
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
    $id = $_POST['id'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $nama = $_POST['nama'];
    $level = $_POST['level'];
    $simpan = mysqli_query($db, "INSERT INTO petugas VALUES ( '$id', '$user', '$pass', '$nama', '$level')");
    if ($simpan) {
        header("location: petugas.php");
    } else {
        echo "<script>alert('Data sudah ada');</script>";
    }
}
?>