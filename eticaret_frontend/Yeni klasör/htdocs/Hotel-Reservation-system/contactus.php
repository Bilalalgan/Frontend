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
<nav  class = "">
		<div id = "logo" style = "background-color: #9B002C;" class ="d-flex justify-content-between">
			<a href="index.php" class = "d-flex align-items-center">
				<img src="images/logo.jpg" alt="" width="90">
				<h1 class= "text-white ms-2">Hitit Otel</h1>
			</a>
			<a href="admin/index.php" class = "d-flex align-items-center me-5">
				<button class="btn bg-outline-info">
					<h4 class="p-0 m-1">Admin Girişi</h4> 
				</button> 
			</a>
		</div>
		<div id = "menu">
			<ul id = "" class="nav nav-pills">
				<li class="nav-item"><a href = "index.php" class="nav-link" aria-current="page">Anasayfa</a></li>
				<li class="nav-item"><a href = "aboutus.php" class="nav-link ">Hakkımızda</a></li>
				<li class="nav-item"><a href = "gallery.php" class="nav-link ">Galeri</a></li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Hizmetler
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="dineandlounge.php"> Restaurant </a></li>
						<li><a class="dropdown-item" href="dineandlounge_spor.php"> Spor salonu </a></li>
						<li><a class="dropdown-item" href="dineandlounge_guzellik.php"> Güzellik & Spa </a></li>
					</ul>
				</li>	 		
				<li class="nav-item"><a href = "reservation.php" class="nav-link">Rezervasyon</a></li>
				<li class="nav-item"><a href = "rulesandregulation.php" class="nav-link">Yönetmelik</a></li>
				<li class="nav-item"><a href = "contactus.php" class="nav-link active">İletişim</a></li>
			</ul>
		</div>
	</nav>
	<div class="row">
		<div class="col-12 border">
		<iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5098.581649570953!2d34.95165141590062!3d40.54965716400387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40872a9f1a35ab71%3A0xa34943cf02a0f8d5!2zw4dvcnVtLCDDh29ydW0gTWVya2V6L8OHb3J1bQ!5e0!3m2!1str!2str!4v1683926376886!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
		<div class="col-6 px-5">
		<form class = "row px-5 pt-5">
			<div class="mb-3 col-6">
				<label for="exampleInputEmail1" class="form-label">İsim</label>
				<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			</div>
			<div class="mb-3 col-6">
				<label for="exampleInputPassword1" class="form-label">Soyisim</label>
				<input type="text" class="form-control" id="exampleInputPassword1">
			</div>
			<div class="mb-3 col-12">
				<label for="exampleFormControlTextarea1" class="form-label">Mesajınız</label>
				<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
			</div>
			<button type="submit" class="btn btn-info w-50 mx-auto">Gönder</button>
		</form>
		</div>
		<div class="col-6 d-flex justify-content-center align-items-center flex-column border-start" style="height:29vh;">
			<h4><b>Merkez, Çorum, Türkiye</b></h4>
			<h4><b>0519 190 19 19</b></h4>
		</div>
	</div>
	<footer class = "d-flex mt-3 justify-content-around" style="background-color: #9B002C !important; color: white !important;">
		<h3>Çorum/ Turkiye</h3>
		<div class = "d-flex align-items-center">
			<h2 class = "me-3"><i class="fa-solid fa-phone"></i></h2>
			<h3 class = "">0545 873 33 17</h3>
		</div>
		<div class = "d-flex">
			<h2 class = "me-3"><i class="fa-brands fa-facebook"></i></h2>
			<h2 class = "me-3"><i class="fa-brands fa-twitter"></i></h2>
			<h2 class = "me-3"><i class="fa-brands fa-instagram"></i></h2>
		</div>
	</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>	
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>