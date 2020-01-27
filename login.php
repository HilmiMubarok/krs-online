<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>KRS Online</title>
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	
	<div class="login">

		<?php
			if (isset($_POST['btn-login'])) {

				$nim       = $_POST['nim'];
				$password  = $_POST['password'];

				$query_cek = "SELECT * FROM user WHERE nim = '$nim' ";
				$hasil_cek = mysqli_query($conn, $query_cek);
				
				if (!$hasil_cek) {
					echo '<div class="notif gagal">Login Gagal! Silahkan Coba Lagi</div>';
					echo "<meta http-equiv='refresh' content='3;login.php'>";
				} else {
					$get_data = mysqli_fetch_assoc($hasil_cek);
					if ($password == $get_data['password']) {
						$_SESSION['logged_in'] = true;
						$_SESSION['nim']       = $get_data['nim'];
						$_SESSION['nama']      = $get_data['nama'];
						echo '<div class="notif sukses">Login Sukses!</div>';
						echo "<meta http-equiv='refresh' content='3;dashboard.php'>";
					} else {
						echo '<div class="notif gagal">Login Gagal! NIM atau Password Salah</div>';
						echo "<meta http-equiv='refresh' content='3;login.php'>";
					}
				}
			}
		?>
		

		<div class="left">
			<img src="assets/img/bg_login.svg">
		</div>
		<div class="right">
			<div class="content">
				<h1 class="header">LOGIN</h1>
				<form action="" method="POST" class="form-login">
					<div class="form-group">
						<label>NIM</label>
						<input required autocomplete="off" type="number" name="nim" class="form-control" placeholder="Masukkan NIM Anda" autofocus>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input required autocomplete="off" type="password" name="password" class="form-control" placeholder="Masukkan Password Anda">
					</div>
					<div class="form-group">
						<button type="submit" name="btn-login" class="btn-login">
							Login
						</button>
					</div>
					<div class="link-register">
						Belum Punya Akun ? 
						<a href="register.php">
							Register Disini
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>