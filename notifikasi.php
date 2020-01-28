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
	<title>Notifikasi</title>
	<link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>
	
	<div class="wrapper">
		<div class="menu">
			<h1 class="heading">Notifikasi</h1>
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
			<?php if (!$status[0]) : ?>
				<img src="assets/img/img_empty.svg">
				<h1 class="h1-notif"> Kamu Belum Mengambil KRS </h1>
			<?php elseif ($status[0] == 2) : ?>
				<img src="assets/img/img_pending.svg">
				<h1 class="h1-notif"> Pengambilan KRS Kamu Sedang Ditinjau oleh Admin </h1>
			<?php elseif ($status[0] == 0) : ?>
				<img src="assets/img/img_cancel.svg">
				<h1 class="h1-notif"> Pengambilan KRS Kamu Ditolak </h1>
			<?php else : ?>
				<img src="assets/img/img_acc.svg">
				<h1 class="h1-notif"> Pengambilan KRS Kamu Disetujui </h1>
			<?php endif ?>
		</div>
	</div>

</body>
</html>