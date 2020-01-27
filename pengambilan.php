<?php include 'config.php'; ?>
<?= (!isset($_SESSION['logged_in']) ? header("location:index.php") : null) ?>
<?php
	$query  = "SELECT status FROM user WHERE nim = '$_SESSION[nim]' ";
	$res    = mysqli_query($conn, $query);
	$status = mysqli_fetch_row($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pengambilan KRS</title>
	<link rel="stylesheet" href="assets/css/dashboard.css">
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
					<a href="pengambilan.php">Pengambilan KRS</a>
				</li>
				<li>
					<a href="notifikasi.php">Notifikasi</a>
				</li>
				<li>
					<a href="logout.php">Logout</a>
				</li>
			</ul>
		</div>
		<div class="content">
			<div class="form-krs">
				<form method="POST">
					<label>Semester</label>
					<select name="semester" class="semester">
						<option value="">Pilih Semester</option>
					</select>
					<label>Program Studi</label>
					<select name="prodi" class="prodi">
						<option value="">Pilih Program Studi</option>
					</select>
					<button type="submit" name="btn-ambil-krs">
						Ambil KRS
					</button>
				</form>
			</div>
			<div class="notif gagal">
				asdasdasd <br>
				asdasdasd
				asdasdasd <br>
				asdasdasd <br>
				asdasdasd <br>
				asdasdasd <br>
				asdasdasd <br>
			</div>
		</div>
	</div>

</body>
</html>