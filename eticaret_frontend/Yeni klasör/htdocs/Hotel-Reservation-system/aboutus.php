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
			<a href="admin/index.php" class = "d-flex align-items-center me-5">
				<button class="btn bg-outline-info">
					<h4 class="p-0 m-1">Admin Girişi</h4> 
				</button> 
			</a>
		</div>
		</div>
		<div id = "menu">
			<ul id = "" class="nav nav-pills">
				<li class="nav-item"><a href = "index.php" class="nav-link" aria-current="page">Anasayfa</a></li>
				<li class="nav-item"><a href = "aboutus.php" class="nav-link active">Hakkımızda</a></li>
				<li class="nav-item"><a href = "gallery.php" class="nav-link">Galeri</a></li>
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
				<li class="nav-item"><a href = "contactus.php" class="nav-link">İletişim</a></li>
			</ul>
		</div>
	</nav>
	<div class="hakkımızda mt-5">
		<div class = "row border">
			<div class = "col-5">
				<img src="images/about.jpg" alt="" width= "700"height="400">
			</div>
			<div class = "col-7 border">
			<div class="card-body">
				<h2 class="card-title"><b>Hakkımızda</b></h2>
				<h4 class="card-text">Otelimiz 2023 yılında Çorum'da açılmıştır. Eşsiz tasarımı, lezzetli yemekleri ve çeşitli hizmetleri ile hizmetinize sunulmaktadır.</h4>
			</div>
			</div>
		</div>
	</div>
	
	<div class = "row mt-5 border py-5" style = "padding-left: 8vh;">
			<?php
				require_once 'admin/connect.php';
				$query = $conn->query("SELECT * FROM `room` ORDER BY `price` ASC") or die(mysql_error());
				while($fetch = $query->fetch_array()){
			?>
		<div class="col-4 py-3">
			<div class="card ms-5" style="width: 45rem;">
				<img src = "photo/<?php echo $fetch['photo']?>" height = "400px" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title"><b><?php echo $fetch['room_type']?></b></h5>
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item"><?php echo $fetch['price'].".00 TL (1 gecelik ücret)"?></li>
				</ul>
			</div>
		</div>
		<?php
					}
		?>
	</div>

	<div class = "row mt-5 border py-5" style = "padding-left: 8vh;">
		<div class="col-12 py-3">
			<h3><b>Olanaklar</b></h3>
		</div>
	
		<div class="col-3 py-3">
			<i class="fa-sharp fa-solid fa-restroom"></i> 7/24 Oda Servisi
		</div>
		<div class="col-3 py-3">
			<i class="fa-solid fa-tv"></i> 21" TV
		</div>
		<div class="col-3 py-3">
			<i class="fa-sharp fa-solid fa-shower"></i> Sıcak - Soğuk Duş
		</div>
		<div class="col-3 py-3">
		    <i class="fa-solid fa-wind"></i> Fön Makinesi	
		</div>
		<div class="col-3 py-3">
			<i class="fa-solid fa-mug-saucer"></i> Süitlerde ve çift kişilik odalarda çay&kahve seti, şişe su mevcuttur.
		</div>
		<div class="col-3 py-3">
            <i class="fa-solid fa-calendar-minus"></i> Tüm odalarda buzdolabı, isteğe bağlı minibar mevcuttur.
		</div>
		<div class = "col-3 py-3">
		    <i class="fa-solid fa-box-archive"></i> Kasa
		</div>
		<div class = "col-3 py-3">
		    <i class="fa-solid fa-wifi"></i> Wifi Hizmeti
		</div>
		<div class = "col-3 py-3">
		    <i class="fa-solid fa-wand-magic-sparkles"></i> Güzellik Salonu
		</div>
		<div class = "col-3 py-3">
		    <i class="fa-solid fa-spa"></i> Masaj Hizmeti
		</div>
		<div class = "col-3 py-3">
           <i class="fa-solid fa-water-ladder"></i> Yüzme Havuzu
		</div>
		<div class = "col-3 py-3">
           <i class="fa-solid fa-dumbbell"></i> Spor Salonu
		</div>
		<div class = "col-3 py-3">
           <i class="fa-solid fa-handshake"></i> Etkinlik ve Toplantı Odası
		</div>
		<div class = "col-3 py-3">
          <i class="fa-solid fa-gift"></i> Hediye Mağazaları	
		</div>
		<div class = "col-3 py-3">
           <i class="fa-solid fa-square-parking"></i> Otopark	
		</div>
		<div class = "col-3 py-3">
          <i class="fa-solid fa-right-left"></i> Havaalanından Transfer ve Şehir Turu
		</div>
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
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>	
</html>