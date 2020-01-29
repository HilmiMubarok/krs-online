<?php include '../config.php'; ?>
<?= (!isset($_SESSION['admin_logged_in']) ? header("location:index.php") : null) ?>
<?php
	$nim      = $_GET['nim'];
	$get_name = mysqli_query($conn, "SELECT * FROM user WHERE nim = '$nim' ");
	$nama     = mysqli_fetch_assoc($get_name)['nama'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Tinjau</title>
	<link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>
	
	<div class="wrapper">
		<div class="menu">
			<h1 class="heading">Peninjauan KRS</h1>
			<ul>
				<li>
					<a href="dashboard.php">Dashboard</a>
				</li>
				<li>
					<a href="user.php">Data User</a>
				</li>
				<li>
					<a href="krs.php">Pengambilan KRS</a>
				</li>
				<li>
					<a href="logout.php">Logout</a>
				</li>
			</ul>
		</div>
		<div class="content">
			<div class="admin">
				<h2>Peninjauan KRS <?= $nama ?></h2>
				<table>
					<tr>
						<th>No.</th>
						<th>Mata Kuliah</th>
						<th>SKS</th>
						<th>Program Studi</th>
					</tr>
<?php
	$query = "SELECT * FROM pengambilan JOIN mata_kuliah ON pengambilan.id_makul = mata_kuliah.id_makul WHERE pengambilan.nim = '$nim' ";
	$res   = mysqli_query($conn, $query);
	$no    = 1;
	while($row = mysqli_fetch_assoc($res)): 
?>
					<tr>
						<td><?= $no ?></td>
						<td><?= $row['nama_makul'] ?></td>
						<td><?= $row['sks'] ?></td>
						<td><?= $row['prodi'] ?></td>
					</tr>
<?php $no++; endwhile ?>
				</table>
				<div class="btn-actions">
					<a href="aksi.php?aksi=acc&nim=<?= $_GET['nim'] ?>">
						<button class="btn-acc">
							Setujui
						</button>
					</a>
					<a href="aksi.php?aksi=reject&nim=<?= $_GET['nim'] ?>">
						<button class="btn-reject">
							Tolak
						</button>
					</a>
				</div>
			</div>
		</div>
	</div>

</body>
</html>