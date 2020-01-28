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
			<?php if ($status[0] !== null): ?>
				<img src="assets/img/img_dont.svg">
				<h1 class="h1-notif">
					Kamu Sudah Melakukan Pengambilan KRS
				</h1>
			<?php else: ?>
			<div class="form-krs">
				<form method="POST">
					<label>Semester</label>
					<select name="semester" class="semester">
						<option value="">Pilih Semester</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
					</select>
					<label>Program Studi</label>
					<select name="prodi" class="prodi">
						<option value="">Pilih Program Studi</option>
						<option value="Teknik Informatika">Teknik Informatika</option>
						<option value="Hukum">Hukum</option>
						<option value="Ilmu Pemerintahan">Ilmu Pemerintahan</option>
						<option value="Akuntansi dan Ekonomi">Akuntansi dan Ekonomi</option>
					</select>				
					<button type="submit" name="btn-ambil-krs">
						Ambil KRS
					</button>	
				</form>
			</div>
			<?php endif ?>

			<?php

				if (isset($_POST['btn-ambil-krs'])) {
					$smt   = $_POST['semester'];
					$prodi = $_POST['prodi'];

					$query = "SELECT * FROM mata_kuliah WHERE semester = '$smt' AND prodi = '$prodi' ";
					$res = mysqli_query($conn, $query);
					$row = [];
					while ($rows = mysqli_fetch_assoc($res)) {
						$query = "INSERT INTO pengambilan VALUES ('', '$_SESSION[nim]', '$rows[id_makul]')";
						mysqli_query($conn, $query);


					}
					$query = "UPDATE user SET status = '2' WHERE nim = '$_SESSION[nim]' ";
					mysqli_query($conn, $query); ?>
					<div class="notif sukses">
						Terimakasih Telah Mengambil KRS. <br>
						Silahkan Tunggu Notifikasi dari Admin.
					</div>
				<?php }

			?>
		</div>
	</div>

</body>
</html>