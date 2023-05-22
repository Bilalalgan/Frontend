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
				<li class="nav-item"><a href = "rulesandregulation.php" class="nav-link active">Yönetmelik</a></li>
				<li class="nav-item"><a href = "contactus.php" class="nav-link">İletişim</a></li>
			</ul>
		</div>
	</nav>

	<div class="ms-5">
		<h2>Yönetmelik</h2> 
	</div>

	<div class = "row mt-5 border py-5" style = "padding-left: 8vh;">
		<div class="col-12 py-3 px-3">
			<h3><b>Kurallar</b></h3>
		</div>
	
		<div class="col-6 p-4">
			<h3>1.Tarife</h3>
			<h4>Tarife yalnızca konaklanacak oda içindir. Yemekler ve diğer hizmetler ek ücrete tabidir. </h4>
		</div>
		<div class="col-6 p-4">
			<h3>2.Check - In (Giriş) </h3>
			<h4>Lütfen Check-in sırasında kimlik kartınızı, pasaportunuzu veya geçici ikamet kartınızı gösterin. Yasaya göre ziyaretçiler, otel kayıtları için kişisel belgeler sunmalıdır. Bu belgeler otelden ayrılışta iade edilecektir.</h4>
		</div>
		<div class="col-6 p-4">
			<h3>3.Çıkış</h3>
			<h4>Çıkış saatinden sonra odanızı tutmak istiyorsanız lütfen resepsiyona bilgi veriniz. Müsaitlik durumuna göre uzatma verilecektir. Oda müsait ise normal tarife üzerinden ücretlendirilir. Misafirin, sürenin sonunda veya süresi içinde odayı boşaltmaması durumunda yönetim, konuğu ve eşyalarını Misafirin bulunduğu odadan çıkarma hakkına sahip olacaktır.</h4>
		</div>
		<div class="col-6 p-4">
			<h3>4.Bagaj Muhafazası</h3>
			<h4>Depolama alanının mevcudiyetine bağlı olarak, herhangi bir nedenden kaynaklanan kayıp veya hasar riski tamamen kendisine ait olmak üzere, bagajı bagaj odasında saklayabilir. Bagaj 30 günden fazla saklanamaz.</h4>
		</div>
		<div class="col-6 p-4">
			<h3>5.Evcil Hayvanlar</h3>
			<h4>Evcil hayvanlar için poliçenizi belirtiniz ( izinli veya izinsiz ). </h4>
		</div>
		<div class="col-6 p-4">
			<h3>6.Tehlikeli Maddeler</h3>
			<h4>Yanıcı veya tehlikeli nitelikteki herhangi bir eşyanın ve/veya yasaklı eşyanın ve/veya sakıncalı nitelikteki eşyanın getirilmesi ve/veya depolanması yasaktır.</h4>
		</div>
		<div class="col-6 p-4">
			<h3>7.Mülkiyet Hasarı</h3>
			<h4>Misafir, kendisinin, misafirlerinin veya sorumlu oldukları herhangi bir kişinin otel malına verdiği zarar veya ziyandan sorumlu tutulacaktır.</h4>
		</div>
		<div class="col-6 p-4">
			<h3>8.Yönetimin Hakları</h3>
			<h4>Misafirin otel içerisinde saygılı bir şekilde davranması ve herhangi bir rahatsızlık vermemesi kabul edilmiştir.</h4>
		</div>
		<div class="col-6 p-4">
			<h3>9.Hükümet Kuralları ve Düzenlemeleri ve Yasaların Uygulanması</h3>
			<h4>Konukların ilgili tüm yasalara ve zaman zaman yürürlükte olan Devlet kurallarına ve düzenlemelerine uyması, bunları onaylaması ve bunlara bağlı olması rica olunur.</h4>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>		
</html>