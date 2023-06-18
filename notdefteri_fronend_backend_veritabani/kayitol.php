<?php
require_once 'db.php';
if(isset($_POST['submit'])){
	$name1 = $_POST['fname'];
	$kullanici_adi = $_POST['usrname'];
	$email = $_POST['email'];
	$sifre = $_POST['sifre'];
	$csifre =$_POST['csifre'];
	if($name1 == '' || $kullanici_adi == ''  || $sifre == '' || $csifre ==''){
		echo '<p class="errorMsg">Alanlar Doldurulması Gerekiyor.</p>';
	} else if( $sifre != $csifre){
		echo '<p class="errorMsg" style= "text-align: center;">Şifreler Uyuşmuyor</p>';
	}else{
		$sql = "SELECT * FROM kullanici_tablosu WHERE kullanici_adi = '$kullanici_adi' ";
		$result = mysqli_query($con, $sql);

		if(mysqli_num_rows($result) == 1){
			echo 'kullaniciadi Zaten Var.';
		} else{
			$sql = "INSERT INTO kullanici_tablosu (name, kullanici_adi, email, sifre) VALUES ('$name1','$kullanici_adi','$email', '$sifre')";
			$result = mysqli_query($con, $sql);
			
			if($result){
				echo '<p class="regsucces">Başarılı Şekilde Kayıt Olundu.</p>';
				header('Location: index.php?d=index');
			} else {
				echo '<p class="errorMsg">Kayıt Olamadınız.</p>';  
			}
		}
	}
}
?>
<html>
<head>
<title>Not Defteri</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body  class = "bg-Warning"> 
	<div class = "d-flex justify-content-center align-items-center h-100">
	<form class=" bg-light w-50 p-5 rounded-3" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<?php 
	?>
		<h1 class="mb-5 text-center"> Kayıt Ol</h1>
		<div class="mb-3">
			<label for="exampleInputEmail1" class="form-label">İsim</label>
			<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fname">
		</div>
		<div class="mb-3">
			<label for="exampleInputEmail2" class="form-label">Kullanıcı Adı</label>
			<input type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" name="usrname">
		</div>
		<div class="mb-3">
			<label for="exampleInputEmail3" class="form-label">Mail</label>
			<input type="mail" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp" name="email">
		</div>
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Şifre</label>
			<input type="password" class="form-control" id="exampleInputPassword1" name="sifre">
		</div>
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Şifre Tekrar</label>
			<input type="password" class="form-control" id="exampleInputPassword1" name="csifre">
		</div>
		<div class="mb-3 d-flex">
			<h6 class="pt-2">Hesabınız Varsa</h6><a href="index.php" class="btn btn-secondary ms-3">Tıklayın</a>
		</div>
		<button type="submit" class="btn btn-primary" value="login" name="submit">Kaydol</button>
	</form>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="crossorigin="anonymous"></script>
</body>
</html>
