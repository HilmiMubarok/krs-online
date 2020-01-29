<?php include '../config.php'; ?>
<?= (!isset($_SESSION['admin_logged_in']) ? header("location:index.php") : null) ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>
	
	<div class="wrapper">
		<div class="menu">
			<h1 class="heading">Dashboard</h1>
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
			<img src="../assets/img/img_welcome.svg">
			<h1>
				Selamat Datang, <?= $_SESSION['username'] ?> <br>
				Silahkan Pilih Menu Di Sebelah Kiri
			</h1>
		</div>
	</div>

</body>
</html>