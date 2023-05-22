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
					<li><a class="dropdown-item" href="logout.php"><i class = "glyphicon glyphicon-off"></i>Çıkış</a></li>
				</ul>
			</div>
		</div>
		<div id = "menu">
			<ul id = "" class="nav nav-pills">
				<li class="nav-item"><a href = "home.php" class="nav-link" aria-current="page">Anasayfa</a></li>
				<li class="nav-item"><a href = "account.php" class="nav-link">Hesaplar</a></li>
				<li class="nav-item"><a href = "reserve.php" class="nav-link">Rezervasyon</a></li>
				<li class="nav-item"><a href = "room.php" class="nav-link active">Odalar</a></li>
			</ul>
		</div>
	</nav>
	<div class = "container-fluid" style="min-height:77.6vh;">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">İşlem / Odalar / Oda Değiştir</div>
				<br />
				<div class = "col-md-4">
					<?php
						$query = $conn->query("SELECT * FROM `room` WHERE `room_id` = '$_REQUEST[room_id]'") or die(mysqli_error());
						$fetch = $query->fetch_array();
					?>
					<form method = "POST" enctype = "multipart/form-data">
						<div class = "form-group">
							<label>Oda Tipi</label>
							<select class = "form-control" required = required name = "room_type">
								<option value = "">Bir seçenek belirleyin</option>
								<option value = "Standard" <?php if($fetch['room_type'] == "Standard"){echo "selected";}?>>Standart İki Kişilik</option>
								<option value = "Superior" <?php if($fetch['room_type'] == "Superior"){echo "selected";}?>>Standart Çift Kişilik</option>
								<option value = "Super Deluxe" <?php if($fetch['room_type'] == "Super Deluxe"){echo "selected";}?>>Süper Çift Kişilik</option>
								<option value = "Jr. Suite" <?php if($fetch['room_type'] == "Jr. Suite"){echo "selected";}?>>Süit</option>
								<option value = "Executive Suite" <?php if($fetch['room_type'] == "Executive Suite"){echo "selected";}?>>Süper Süit</option>
							</select>
						</div>
						<div class = "form-group">
							<label>Fiyat</label>
							<input type = "number" min = "0" max = "999999999" value = "<?php echo $fetch['price']?>" class = "form-control" name = "price" />
						</div>
						<div class = "form-group">
							<label>Fotoğraf</label>
							<div id = "preview" style = "width:150px; height :150px; border:1px solid #000;">
								<img src = "../photo/<?php echo $fetch['photo']?>" id = "lbl" width = "100%" height = "100%"/>
							</div>
							<input type = "file" required = "required" id = "photo" name = "photo" />
						</div>
						<br />
						<div class = "form-group">
							<button name = "edit_room" class = "btn btn-warning form-control"><i class = "glyphicon glyphicon-edit"></i>Değişiklikleri Kaydet</button>
						</div>
					</form>
					<?php require_once 'edit_query_room.php'?>
				</div>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>	
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$pic = $('<img id = "image" width = "100%" height = "100%"/>');
		$lbl = $('<center id = "lbl">[Photo]</center>');
		$("#photo").change(function(){
			$("#lbl").remove();
			var files = !!this.files ? this.files : [];
			if(!files.length || !window.FileReader){
				$("#image").remove();
				$lbl.appendTo("#preview");
			}
			if(/^image/.test(files[0].type)){
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				reader.onloadend = function(){
					$pic.appendTo("#preview");
					$("#image").attr("src", this.result);
				}
			}
		});
	});
</script>
</html>