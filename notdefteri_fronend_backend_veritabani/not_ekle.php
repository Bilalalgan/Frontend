<?php
require_once 'db.php';
if(isset($_POST['submit'])){
	$fname = $_POST['fname'];
	$notu_konu = $_POST['notu_konu'];
	$notu_tarihi = $_POST['notu_tarihi'];
	$notu_yazi = $_POST['notu_yazi'];
	if($fname == '' || $notu_tarihi == ''){
		echo '<p class="addusererror">Fields marked with * are required</p>';
	} else {
		$sql = "INSERT INTO not_tablosu(notu_adi, notu_konu, notu_tarihi, notu_yazi) VALUES ('$fname', '$notu_konu', '$notu_tarihi', '$notu_yazi')";
		$result = mysqli_query($con, $sql); // Use mysqli_query() instead of mysql_query()
		if($result){
			echo '<p class="addsucces">Record added successfully</p><br> ';
		} else {
			echo '<p class="aderrorMsg">There was an error while adding the record</p>';  
		}	
	}
}
?>


<html>
	<head>
		<meta charset="UTF-8">
		<title>Not Defteri</title>
		<link rel="stylesheet" href="style.css">
		<script>
			function showConfirmation() {
				alert("Not Başarı İle Eklendi");
			}
		</script>
	</head>

	<body class="d-flex justify-content-center align-items-center">
		<div class="w-75 Card bg-light" style = "height:800px">
			<div class = "card-header d-flex  d-flex justify-content-between">
				<h1 class="text-dark"> Not Defteri</h1>
			</div>
			<?php include_once 'menu-main.php';     ?>
			<div class = "d-flex justify-content-center align-items-center h-75">
				<form class="bg-white p-5 mt-5 w-50" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="showConfirmation()">
					<h1 class="mb-5 text-center">Not Ekle</h1>
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">İsim</label>
						<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fname">
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail2" class="form-label">Konu</label>
						<input type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" name="notu_konu">
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail3" class="form-label">Tarih</label>
						<input type="date" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp" name="notu_tarihi">
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail4" class="form-label">Not</label>
						<textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="notu_yazi"></textarea>
					</div>
					<input type="submit" value="Ekle" name="submit" class="btn btn-primary">
				</form>
			</div>
		</div>
	</body>
</html>
