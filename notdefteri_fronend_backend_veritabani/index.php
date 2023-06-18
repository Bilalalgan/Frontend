<?php
ob_start();
session_start();
include 'db.php';

if (isset($_POST['submit'])) {
    $kullanici_adi = $_POST['kullanici_adi1'];
    $sifre = $_POST['sifre'];

    if ($kullanici_adi == '' || $sifre == '') {
        echo '<p class="errorMsg">Tüm alanların doldurulması gerek</p>';
    } else {
        $sql = "SELECT * FROM kullanici_tablosu WHERE kullanici_adi = '$kullanici_adi' AND sifre = '$sifre'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) == 1) {
            $member = mysqli_fetch_assoc($result);

            $_SESSION['kullanici_adi'] = $kullanici_adi;
            $_SESSION['contact_id'] = $member['contact_id'];

            header('Location: anasayfa.php?d=anasayfa');
            exit();
        } else {
            echo '<p class="loginerror">Kullanıcı Adı Veya Şifre Yanlış</p>';
        }
    }
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Not Defteri</title>
    <link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class = "bg-Warning">
	<div class = "d-flex justify-content-center align-items-center h-100">

		<form class=" bg-light w-50 p-5" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<h1 class="mb-5 text-center"> Giriş</h1>
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Kullanıcı Adı</label>
				<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="kullanici_adi1">
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Şifre</label>
				<input type="password" class="form-control" id="exampleInputPassword1" name="sifre">
			</div>
			<div class="mb-3 d-flex justify-content-end">
				<h6 class="pt-2">Kayıt olmak için</h6><a href="kayitol.php" class="btn btn-secondary ms-3">Tıklayın</a>
			</div>
			<button type="submit" class="btn btn-primary" value="login" name="submit">Giriş</button>
		</form>

	</div>
    
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="crossorigin="anonymous"></script>

</body>
</html>
