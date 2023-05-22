<!DOCTYPE html>
<?php require_once "connect.php"?>
<html lang = "en">
	<head>
		<title>Hotel Online Reservation</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />

		<!-- Fontawesome-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		<!-- Yazı Tipi-->
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

		<!-- Bootsrap-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
	</head>
<body>
	<nav  class = "">
		<div id = "logo" style = "background-color: #9B002C;" class ="d-flex justify-content-between">
			<a href="../index.php" class = "d-flex align-items-center">
				<img src="../images/logo.jpg" alt="" width="90">
				<h1 class= "text-white ms-2">Hitit Otel</h1>
			</a>
			<a href="index.php" class = "d-flex align-items-center me-5">
				<button class="btn bg-outline-info">
					<h4 class="p-0 m-1">Admin Girişi</h4> 
				</button> 
			</a>
		</div>
	</nav>
	<div class = "container" style="height:82.6vh;">
		<br />
		<br />
		<div class = "col-md-4"></div>
		<div class = "col-md-4">
			<div class = "panel border">
				<div class = "panel-heading bg-info">
					<h4>Yönetici</h4>
				</div>
				<div class = "panel-body">
					<form method = "POST">
						<div class = "form-group">
							<label>Kullanıcı Adı</label>
							<input type = "text" name = "username" class = "form-control" required = "required" />
						</div>
						<div class = "form-group">
							<label>Şifre</label>
							<input type = "password" name = "password" class = "form-control" required = "required" />
						</div>
						<br />
						<div class = "form-group">
							<button name = "login" class = "form-control btn btn-info"><i class = "glyphicon glyphicon-log-in"> Giriş </i></button>
						</div>
					</form>
					<?php require_once 'login.php'?>
				</div>
			</div>
		</div>
		<div class = "col-md-4"></div>
	</div>	
	<footer class = "d-flex mt-3 justify-content-around" style="background-color: #9B002C !important; color: white !important;">
		<h3>Çorum/ Türkiye</h3>
		<div class = "d-flex align-items-center">
			<h2 class = "me-3"><i class="fa-solid fa-phone"></i></h2>
			<h3 class = "">0519 190 19 19</h3>
		</div>
		<div class = "d-flex">
			<h2 class = "me-3"><i class="fa-brands fa-facebook"></i></h2>
			<h2 class = "me-3"><i class="fa-brands fa-twitter"></i></h2>
			<h2 class = "me-3"><i class="fa-brands fa-instagram"></i></h2>
		</div>
	</footer>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>	
</html>