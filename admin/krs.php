<?php include '../config.php'; ?>
<?= (!isset($_SESSION['admin_logged_in']) ? header("location:index.php") : null) ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin KRS</title>
	<link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>
	
	<div class="wrapper">
		<div class="menu">
			<h1 class="heading">Pengambilan KRS</h1>
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
				<h2>Daftar Pengambil KRS</h2>
				<table>
					<tr>
						<th>No.</th>
						<th>NIM</th>
						<th>Nama</th>
						<th>Aksi</th>
					</tr>
<?php
	$query = "SELECT * FROM user WHERE status = '1' ";
	$res   = mysqli_query($conn, $query);
	$no    = 1;
	while($row = mysqli_fetch_assoc($res)): 
?>
					<tr>
						<td><?= $no ?></td>
						<td><?= $row['nim'] ?></td>
						<td><?= $row['nama'] ?></td>
						<th>
							<a href="tinjau.php?nim=<?= $row['nim'] ?>">
								<button class="btn-tinjau">Tinjau</button>
							</a>
						</th>
					</tr>
<?php $no++; endwhile ?>
				</table>
			</div>
		</div>
	</div>

</body>
</html>