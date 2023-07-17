<!doctype html>
<html lang="en">
<head>
	<title>Registrasi</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
	<link rel="stylesheet" href="../tampilan/asset/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../tampilan/asset/css/style.css">
</head>
<body>
	<video id="video-background" autoplay loop muted>
		
		<source src="../tampilan/asset/img/hutao.mp4" type="video/mp4">
		Maaf, browser Anda tidak mendukung pemutaran video.
	</video>
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-10 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Log In </span><span>Register</span></h6>
						<input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
						<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Log In</h4>
											<form action="login.php" method="POST">
												<div class="form-group">
													<input type="email" class="form-style" name="email" placeholder="Email">
													<i class="input-icon uil uil-at"></i>
												</div>
												<div class="form-group mt-2">
													<input type="password" class="form-style" name="password" placeholder="Password">
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<button type="submit" class="btn mt-4" name="btnlogin">Login</button>
											</form>
										</div>
									</div>
								</div>
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-3 pb-3">register</h4>
											<form  action="register.php" method="POST">
												<div class="form-group">
													<input type="text" class="form-style" name="nama" placeholder="Nama Lengkap">
													<i class="input-icon uil uil-user"></i>
												</div>
												<div class="form-group mt-2">
													<input type="email" class="form-style" name="email" placeholder="Email">
													<i class="input-icon uil uil-at"></i>
												</div>
												<div class="form-group mt-2">
													<input type="password" class="form-style" name="password" placeholder="Password">
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<button type="submit" class="btn mt-4" name="btnregister">Register</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
						if (isset($_GET['login_failed'])) {
							echo "<p>Email atau kata sandi salah</p>";
						}
						?>
					</div>
				</div>
				<div class="col-2"></div>
			</div>
		</div>
	</div>
	<script>
		var video = document.getElementById("video-background");
		video.play();
	</script>
</body>
</html>
