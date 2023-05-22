<!DOCTYPE html>
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

		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css " />
		<link rel="stylesheet" href="css/style.css">
	</head>
<body>
	<nav  class = "border-bottom">
		<div id = "logo" style = "background-color: #9B002C;" class ="d-flex justify-content-between">
			<a href="index.php" class = "d-flex align-items-center">
				<img src="images/logo.jpg" alt="" width="90">
				<h1 class= "text-white ms-2">Hitit Otel</h1>
			</a>
		</div>
		<div id = "menu">
			<ul id = "" class="nav nav-pills">
				<li class="nav-item"><a href = "index.php" class="nav-link" aria-current="page">Anasayfa</a></li>
				<li class="nav-item"><a href = "aboutus.php" class="nav-link ">Hakkımızda</a></li>
				<li class="nav-item"><a href = "gallery.php" class="nav-link ">Galeri</a></li>
				<li class="nav-item"><a href = "dineandlounge.php" class="nav-link">Restaurant</a></li> 		
				<li class="nav-item"><a href = "reservation.php" class="nav-link active">Rezervasyon</a></li>
				<li class="nav-item"><a href = "rulesandregulation.php" class="nav-link">Yönetmelik</a></li>
				<li class="nav-item"><a href = "contactus.php" class="nav-link ">İletişim</a></li>
			</ul>
		</div>
	</nav>
	<div class = "p-5 d-flex justify-content-center">
		<div class = "panel panel-default">
			<div class = "panel-body py-0">
				<?php 
					require_once 'admin/connect.php';
					$query = $conn->query("SELECT * FROM `room` WHERE `room_id` = '$_REQUEST[room_id]'") or die(mysql_error());
					$fetch = $query->fetch_array();
				?>
				<div style = "height:300px; width:800px;">
					<div class = "row">
						<div class="col-9 p-0  bg-light">
							<img src = "photo/<?php echo $fetch['photo']?>" height = "300px" width = "600px">
						</div>
						<div class="col-3 bg-light">
							<h3><?php echo $fetch['room_type']?></h3>
							<h3 style = "color:#ff9a3c;"><?php echo $fetch['price'].".00 TL";?></h3>
						</div>
					</div>
				</div>
				<br style = "clear:both;" />
				<div class = "well col-md-12 bg-light">
				<form method = "POST" enctype = "multipart/form-data">
						<div class = "form-group">
							<label>İlk İsim</label>
							<input type = "text" class = "form-control" name = "firstname" required = "required" />
						</div>
						<div class = "form-group">
							<label>İkinci İsim</label>
							<input type = "text" class = "form-control" name = "middlename" required = "required" />
						</div>
						<div class = "form-group">
							<label>Soyisim</label>
							<input type = "text" class = "form-control" name = "lastname" required = "required" />
						</div>
						<div class = "form-group">
							<label>Adres</label>
							<input type = "text" class = "form-control" name = "address" required = "required" />
						</div>
						<div class = "form-group">
							<label>İletişim No</label>
							<input type = "text" class = "form-control" name = "contactno" required = "required" />
						</div>
						<div class = "form-group">
							<label>Giriş</label>
							<input type = "date" class = "form-control" name = "date" required = "required" />
						</div>
						<br />
						<div class = "form-group">
							<button class = "btn btn-info form-control" name = "add_guest"><i class = "glyphicon glyphicon-save"></i>Kaydet</button>
						</div>
					</form>
				</div>
				<div class = "col-md-4"></div>
				<?php require_once 'add_query_reserve.php'?>
			</div>
		</div>
	</div>
	
	<footer class = "d-flex mt-5 justify-content-around" style="background-color: #9B002C !important; color: white !important;">
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
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>