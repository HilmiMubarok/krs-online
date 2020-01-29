<?php include '../config.php'; ?>
<?= (!isset($_SESSION['admin_logged_in']) ? header("location:index.php") : null) ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin User</title>
	<link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>
	
	<div class="wrapper">
		<div class="menu">
			<h1 class="heading">Data User</h1>
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
				<h2>Daftar User</h2>
				<table>
					<tr>
						<th>No.</th>
						<th>NIM</th>
						<th>Nama</th>
					</tr>
<?php
	$query = "SELECT * FROM user";
	$res   = mysqli_query($conn, $query);
	$no    = 1;
	while($row = mysqli_fetch_assoc($res)): 
?>
					<tr>
						<td><?= $no ?></td>
						<td><?= $row['nim'] ?></td>
						<td><?= $row['nama'] ?></td>
					</tr>
<?php $no++; endwhile ?>
				</table>
			</div>
		</div>
	</div>

</body>
</html>