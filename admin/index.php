<?php include '../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin KRS Online</title>
	<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
	
	<div class="login">

		<?php
			if (isset($_POST['btn-login'])) {

				$username  = $_POST['username'];
				$password  = $_POST['password'];
				$query_cek = "SELECT * FROM admin WHERE username = '$username' ";
				$hasil_cek = mysqli_query($conn, $query_cek);
				
				if (!$hasil_cek) {
					echo '<div class="notif gagal">Login Gagal! Silahkan Coba Lagi</div>';
					echo "<meta http-equiv='refresh' content='3;login.php'>";
				} else {
					$get_data = mysqli_fetch_assoc($hasil_cek);
					if ($password == $get_data['password']) {
						$_SESSION['admin_logged_in'] = true;
						$_SESSION['username']        = $get_data['username'];
						echo '<div class="notif sukses">Login Sukses!</div>';
						echo "<meta http-equiv='refresh' content='3;dashboard.php'>";
					} else {
						echo '<div class="notif gagal">Login Gagal! Username atau Password Salah</div>';
						echo "<meta http-equiv='refresh' content='3;index.php'>";
					}
				}
			}
		?>
		

		<div class="left">
			<img src="../assets/img/bg_login.svg">
		</div>
		<div class="right">
			<div class="content">
				<h1 class="header">LOGIN ADMIN</h1>
				<form action="" method="POST" class="form-login">
					<div class="form-group">
						<label>Username</label>
						<input required autocomplete="off" type="text" name="username" class="form-control" placeholder="Masukkan Username Anda" autofocus>
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
						Username: admin, Password: admin
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>