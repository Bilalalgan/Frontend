<!DOCTYPE html>
<?php
	require_once 'validate.php';
	require 'name.php';
?>
<html lang = "eng">
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
	<nav  class = "border-bottom">
		<div id = "logo" style = "background-color: #9B002C;" class ="d-flex justify-content-between">
			<a href="index.php" class = "d-flex align-items-center">
				<img src="../images/logo.jpg" alt="" width="90">
				<h1 class= "text-white ms-2">Hitit Otel</h1>
			</a>
			<div class="dropdown d-flex align-items-center me-5">
				<button class="btn bg-outline-info" type="button" data-bs-toggle="dropdown" aria-expanded="false">
					<h4 class="p-0 m-1"><?php echo $name;?><i class="fa-solid fa-chevron-down ms-4"></i></h4> 
				</button>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="logout.php"><i class = "glyphicon glyphicon-off"></i> Çıkış</a></li>
				</ul>
			</div>
		</div>
		<div id = "menu">
		<ul id = "" class="nav nav-pills">
				<li class="nav-item"><a href = "home.php" class="nav-link" aria-current="page">Anasayfa</a></li>
				<li class="nav-item"><a href = "account.php" class="nav-link">Hesaplar</a></li>
				<li class="nav-item"><a href = "reserve.php" class="nav-link">Rezervasyon</a></li>
				<li class="nav-item"><a href = "room.php" class="nav-link">Odalar</a></li>
				<li class="nav-item"><a href = "transaction.php" class="nav-link active">İşlemler</a></li>
			</ul>
		</div>
	</nav>
	<div class = "container-fluid" style="min-height:77.6vh;">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info"> İşlemler</div>
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th>İşlem İd</th>
							<th>Misafir İd</th>
							<th>Oda İd</th>
							<th>Oda Numarası</th>
							<th>İlave Yatak</th>
							<th>Durum</th>
							<th>Günler</th>
							<th>Giriş</th>
							<th>Giriş Tarihi</th>
							<th>Çıkış</th>
							<th>Çıkış Tarihi</th>
							<th>Fatura</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query = $conn->query("SELECT * FROM `transaction`") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>	
						<tr>
							<td><?php echo $fetch['transaction_id']?></td>
							<td><?php echo $fetch['guest_id']?></td>
							<td><?php echo $fetch['room_id']?></td>
							<td><?php echo $fetch['room_no']?></td>
							<td><?php echo $fetch['extra_bed']?></td>
							<td><?php echo $fetch['status']?></td>
							<td><?php echo $fetch['days']?></td>
							<td><?php echo $fetch['checkin']?></td>
							<td><?php echo $fetch['checkin_time']?></td>
							<td><?php echo $fetch['checkout']?></td>
							<td><?php echo $fetch['checkout_time']?></td>
							<td><?php echo $fetch['bill']?></td>
						</tr>
					<?php
						}
					?>	
					</tbody>
				</table>
			</div>
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
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>	
</html>