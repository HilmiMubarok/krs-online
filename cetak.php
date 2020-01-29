<?php
	include 'config.php';
	$user = mysqli_query($conn, "SELECT * FROM user WHERE nim = '$_GET[nim]' ");
	$user = mysqli_fetch_assoc($user);
	$query = "SELECT * FROM pengambilan JOIN mata_kuliah ON pengambilan.id_makul = mata_kuliah.id_makul WHERE pengambilan.nim = '$_GET[nim]'";
	$res = mysqli_query($conn, $query);
	$mhs = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cetak KRS</title>
</head>
<body onload="window.print()">
	<h1>NIM : <?= $_GET['nim'] ?></h1>
	<h1>Nama : <?= $user['nama'] ?></h1>
	<h1>Prodi : <?= $mhs['prodi'] ?></h1>
	<h1>Semester : <?= $mhs['semester'] ?></h1>
	<table width="50%" border="1">
		<tr>
			<th>No.</th>
			<th>Mata Kuliah</th>
			<th>SKS</th>
		</tr>
<?php
$query = "SELECT * FROM pengambilan JOIN mata_kuliah ON pengambilan.id_makul = mata_kuliah.id_makul WHERE pengambilan.nim = '$_GET[nim]' ";
$res   = mysqli_query($conn, $query);
$no    = 1;
while($row = mysqli_fetch_assoc($res)): 
?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $row['nama_makul'] ?></td>
			<td><?= $row['sks'] ?></td>
		</tr>
<?php $no++; endwhile ?>
		<tr>
			<td colspan="2" align="right">Jumlah SKS</td>
			<td>
				<?php
					$query = "SELECT SUM(sks) AS jumlah FROM mata_kuliah JOIN pengambilan ON mata_kuliah.id_makul = pengambilan.id_makul WHERE pengambilan.nim = '$_GET[nim]' ";
					$jumlah = mysqli_fetch_assoc(mysqli_query($conn, $query));
					echo $jumlah['jumlah'];
				?>
			</td>
		</tr>
	</table>
	<br><br><br><br>
	<h3>Kendal, <?= date("d-m-Y") ?></h3>
</body>
</html>