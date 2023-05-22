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
				<li class="nav-item"><a href = "reservation.php" class="nav-link active">Rezervasyon</a></li>
				<li class="nav-item"><a href = "rulesandregulation.php" class="nav-link">Yönetmelik</a></li>
				<li class="nav-item"><a href = "contactus.php" class="nav-link">İletişim</a></li>
			</ul>
		</div>
	</nav>

	<div class = "p-5">
		<div class = "panel p-5">
			<div class = "panel-body row p-5">
				<h2 class = "mb-5"><b>MAKE A RESERVATION</b></h2>
				<?php
					require_once 'admin/connect.php';
					$query = $conn->query("SELECT * FROM `room` ORDER BY `price` ASC") or die(mysql_error());
					while($fetch = $query->fetch_array()){
				?>
					<div class = "col-6 px-5">
						<div class = "well" style = "height:300px;">
							<div class = "row">
								<div class="col-9">
									<img src = "photo/<?php echo $fetch['photo']?>" class="rounded" height = "250" width = "540"/>
								</div>
								<div class="col-3 text-center">
									<h3><?php echo $fetch['room_type']?></h3>
									<h4 style = "color:#ff9a3c;"><?php echo $fetch['price'].".00 TL"?></h4>
									<br /><br /><br /><br /><br /><br />
									<a href = "add_reserve.php?room_id=<?php echo $fetch['room_id']?>" class = "btn btn-info"><i class = "glyphicon glyphicon-list"></i>   Reserve   </a>
								</div>
							</div>
						</div>
					</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>
	
	<footer class = "d-flex mt-5 justify-content-around" style="background-color: #9B002C !important; color: white !important;">
		<h3>Çorum/ Türkiye</h3>
		<div class = "d-flex align-items-center">
			<h2 class = "me-3"><i class="fa-solid fa-phone"></i></h2>
			<h3 class = "">0519190 19 19</h3>
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