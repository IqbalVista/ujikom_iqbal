<?php
require_once("require.php");
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Entry Transaksi</title>
</head>

<body>
	<?php require_once("header.php"); ?>
	<h3>Transaksi</h3>
	<p><a href="tambah_transaksi.php">Tambahan Data</a></p>
	<table cellspacing="0" border="1" cellpadding="5">
		<tr>
			<th>No.</th>
			<th>Nama Petugas</th>
			<th>Nama Siswa</th>
			<th>Tgl/Bulan/Tahun dibayar</th>
			<th>Nominal</th>
			<th>Jumlah yang dibayar</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
		<?php
		$sql = mysqli_query($db, "SELECT * FROM pembayaran
JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas
JOIN siswa ON pembayaran.nisn = siswa.nisn
JOIN spp ON pembayaran.id_spp = spp.id_spp");
		$no = 1;
		while ($r = mysqli_fetch_assoc($sql)) { ?>
			<tr>
				<td><?= $no ?> </td>
				<td><?= $r['nama_petugas']; ?></td>
				<td><?= $r['nama']; ?></td>
				<td><?= $r['tgl_bayar'] . "/" . $r['bulan_bayar'] . "/" . $r['tahun_bayar']; ?></td>
				<td><?= $r['nominal']; ?></td>
				<td><?= $r['jumlah_bayar']; ?></td>
				<td>
					<?php
					if ($r['jumlah_bayar'] == $r['nominal']) { ?>
						<font style="color: darkgreen; font-weight: bold;"> LUNAS</font>
					<?php } else { ?> BELUM LUNAS <?php } ?>
					<?php
					if ($r['jumlah_bayar'] == $r['nominal']) {
						echo "-";
					} else { ?>
				</td>
				<td>
					<a href="?lunas&id= <?= $r['id_pembayaran']; ?>">BELUM LUNAS</a>
				<?PHP } ?>
				</td>
			</tr>
		<?php $no++;
		} ?>
	</table>
	<hr />
</body>

</html>
<?php
if (isset($_GET['lunas'])) {
	$id = $_GET['id'];
	$ambilData = mysqli_query($db, "SELECT * FROM pembayaran JOIN spp ON pembayaran.id_spp=spp.id_spp WHERE id_pembayaran = '$id'");
	$row = mysqli_fetch_assoc($ambilData);
	$sisa = $row['nominal'] - $row['jumlah_bayar'];
	$hasil = $row['jumlah_bayar'] + $sisa;
	$update = mysqli_query($db, "UPDATE pembayaran SET jumlah_bayar='$hasil' WHERE id_pembayaran='$id'");
	if ($update) {
		header("location:transaksi.php");
	}
}
?>
<!-- Panggil footer -->
<?php require_once("footer.php"); ?>