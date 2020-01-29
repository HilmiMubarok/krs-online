<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>KRS Online</title>
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<div class="register">
		<?php
			if (isset($_POST['btn-register'])) {

				$nim       = $_POST['nim'];
				$nama      = $_POST['nama'];
				$password  = $_POST['password'];

				$query_cek = "SELECT * FROM user WHERE nim = '$nim' ";
				$hasil_cek = mysqli_query($conn, $query_cek);
				
				if (mysqli_num_rows($hasil_cek) > 0) {
					echo '<div class="notif gagal">User Sudah Ada! Silahkan Coba Lagi</div>';
					echo "<meta http-equiv='refresh' content='3;register.php'>";
				} else {
					$query = "INSERT INTO user VALUES ('$nim', '$nama', '$password', '0') ";
					if (mysqli_query($conn, $query)) {
						echo '<div class="notif sukses">Register Sukses! Silahkan Login</div>';
						echo "<meta http-equiv='refresh' content='3;login.php'>";
					} else {
						echo '<div class="notif gagal">Register Gagal! Silahkan Ulang Kembali</div>';
						echo "<meta http-equiv='refresh' content='3;register.php'>";
					}
				}
			}
		?>
		<div class="left">
			<img src="assets/img/bg_register.svg">
		</div>
		<div class="right">
			<div class="content">
				<h1 class="header">REGISTER</h1>
				<form action="" method="POST" class="form-register">
					<div class="form-group">
						<label>NIM</label>
						<input required autocomplete="off" type="number" name="nim" class="form-control" placeholder="Masukkan NIM Anda" autofocus>
					</div>
					<div class="form-group">
						<label>Nama</label>
						<input required autocomplete="off" type="text" name="nama" class="form-control" placeholder="Masukkan Nama Anda">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input required autocomplete="off" type="password" name="password" class="form-control" placeholder="Masukkan Password Anda">
					</div>
					<div class="form-group">
						<button type="submit" name="btn-register" class="btn-register">
							Register
						</button>
					</div>
					<div class="link-login">
						Sudah Punya Akun ? 
						<a href="login.php">
							Login Disini
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>