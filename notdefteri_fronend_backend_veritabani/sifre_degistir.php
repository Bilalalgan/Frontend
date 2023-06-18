<?php
// https://www.sitepoint.com/community/t/using-session-variables-to-keep-user-logged-in-if-they-havent-logged-out/294407
ob_start();
session_start();
include 'db.php';

if (isset($_POST['passchange'])) {
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $cnewpass = $_POST['cnewpass'];

    if ($oldpass == '' || $newpass == '' || $cnewpass == '') {
        echo '<p class="cpass">Boş Geçilemez.</p>';
    } else {
        $sql = "SELECT * FROM kullanici_tablosu WHERE contact_id = '".$_SESSION['contact_id']."'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) == 1) {
            $member = mysqli_fetch_assoc($result);

            if ($member['sifre'] != $oldpass) {
                echo '<p class="cpass">Şifre Başarı ile Değiştirildi.</p>';
            } else if ($newpass != $cnewpass) {
                echo '<p class="cpass">Şifre hatalı</p>';
            } else {
                $query = "UPDATE kullanici_tablosu SET sifre = '$newpass' WHERE contact_id = '".$_SESSION['contact_id']."'";
                $update_result = mysqli_query($con, $query);

                if ($update_result) {
                    echo '<p class="cpasssuc">sifre Güncellendi.</p>';
                } else {
                    echo 'Hatalı';
                }
            }
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
                alert("Şifre Başarı İle Güncellendi");
            }
    </script>
</head>
<body class="d-flex justify-content-center align-items-center">
    <div class="w-75 Card bg-light">
        <div class = "card-header d-flex  d-flex justify-content-between">
			<h1 class="text-dark"> Not Defteri</h1>
		</div>
        <?php include_once 'menu-main.php';     ?>
        <div class = "d-flex justify-content-center align-items-center h-75">
            <form class="bg-white p-5 my-3 w-50" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="showConfirmation()">
                <h1 class=" text-center">Şifre Değiştir</h1>
                <div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Eski Şifre</label>
						<input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="oldpass">
				</div>
                <div class="mb-3">
						<label for="exampleInputEmail2" class="form-label">Yeni Şifre</label>
						<input type="password" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" name="newpass">
				</div>
                <div class="mb-3">
						<label for="exampleInputEmail3" class="form-label">Yeni Şifre Tekrar</label>
						<input type="password" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp" name="cnewpass">
				</div>
                <input type="submit" value="Güncelle" name="passchange" class="btn btn-primary">
            </form>
		</div>
        
    </div>
</body>
</html>
