<?php
require_once("require.php");
$nisnSiswa = $_GET['nisn'];
$siswa = mysqli_query($db, "SELECT * FROM siswa WHERE nisn='$nisnSiswa'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit data siswa</title>
</head>

<body>
    <!-- Panggil header -->
    <?php require("header.php"); ?>
    <!-- Konten -->
    <h3>Edit data Siswa</h3>
    <?php
    while ($row = mysqli_fetch_assoc($siswa)) { ?>
        <form action="" method="POST">
            <table cellpadding="5">
                <input type="hidden" name="nisn" value="<? $row['nisn']; ?>">
                <tr>
                    <td>Nama :</td>
                    <td><input type="text" name="nama" value="<?= $row['nama']; ?>"></td>
                </tr>
                <tr>
                     <td>Kelas :</td>
                     <td>select name ="kelas">
            <?php
             $kelas = mysqli_query($db, "SELECT * FROM kelas");
             while($r = mysqli_fetch_assoc($kelas)){ ?>
                <option value="<?= $r['id_kelas']; ?>"><?= $r['nama_kelas'] , " | " 
               . $r['kompetensi_keahlian']; ?></option>
<$php } ?>    </select></td>
             </tr>
</body>

</html>
