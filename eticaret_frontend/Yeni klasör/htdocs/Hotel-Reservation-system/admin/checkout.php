<!DOCTYPE html>
<?php
	require_once 'validate.php';
	require 'name.php';
?>
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
				<li class="nav-item"><a href = "reserve.php" class="nav-link active">Rezervasyon</a></li>
				<li class="nav-item"><a href = "room.php" class="nav-link">Odalar</a></li>
				<li class="nav-item"><a href = "transaction.php" class="nav-link">İşlemler</a></li>
			</ul>
		</div>
	</nav>

	<div class = "container-fluid" style="min-height:77.6vh;">	
		<div class = "panel panel-default">
			<?php
				$q_p = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Beklemede'") or die(mysqli_error());
				$f_p = $q_p->fetch_array();
				$q_ci = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Giris'") or die(mysqli_error());
				$f_ci = $q_ci->fetch_array();
				$q_out = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Cikis'") or die(mysqli_error());
				$f_out = $q_out->fetch_array();
			?>
			<div class = "panel-body">
				<div class = "alert alert-info">    Rezervasyon</div>
				<a class = "btn btn-success" href = "reserve.php"><span class = "badge"><?php echo $f_p['total']?></span>    Beklemede</a>
				<a class = "btn btn-info" href = "checkin.php"><span class = "badge"><?php echo $f_ci['total']?></span>    Giriş</a>
				<a class = "btn btn-warning disabled"><span class = "badge"><?php echo $f_out['total']?></span>    Çıkış</a>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th>İsim</th>
							<th>Oda Tipi</th>
							<th>Oda No</th>
							<th>Giriş</th>
							<th>Günler</th>
							<th>Çıkış</th>
							<th>Durum</th>
							<th>Ekstra Yatak</th>
							<th>Fatura</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `guest` NATURAL JOIN `room` WHERE `status` = 'Cikis'") or die(mysqli_query());
							while($fetch = $query->fetch_array()){
						?>
						<tr>
							<td><?php echo $fetch['firstname']." ".$fetch['lastname']?></td>
							<td><?php echo $fetch['room_type']?></td>
							<td><?php echo $fetch['room_no']?></td>
							<td><?php echo "<label style = 'color:#00ff00;'>".strftime("%d.%m.%Y", strtotime($fetch['checkin']))."</label>"." @ "."<label>".date("H:i", strtotime($fetch['checkin_time']))."</label>"?></td>

							<td><?php echo $fetch['days']?></td>
							<td><?php echo "<label style = 'color:#ff0000;'>".strftime("%d.%m.%Y", strtotime($fetch['checkin']."+".$fetch['days']."DAYS"))."</label>"." @ "."<label>".date("H:i", strtotime($fetch['checkout_time']))."</label>"?></td>
							<td><?php echo $fetch['status']?></td>
							<td><?php if($fetch['extra_bed'] == "0"){ echo "None";}else{echo $fetch['extra_bed'];}?></td>
							<td><?php echo $fetch['bill'].".00 TL"?></td>
							<td><label class = "">Ödendi</label></td>
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
		<h3>Çorum/ Turkiye</h3>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>	
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script>	
<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();
	});
</script>
</html>