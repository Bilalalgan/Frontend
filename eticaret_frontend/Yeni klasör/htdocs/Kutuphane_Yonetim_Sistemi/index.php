<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Kütüphane Yönetim Sistemi</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div id="wrapper-admin">
        <div class="container">
            <div class="row">
                <div class="offset-md-4 col-md-4">
                    <div class="logo m-3">
                      <img src="images/library.png" alt="">
                    </div>
                    <form class="yourform" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                      <h3 class="heading">Yönetici Girişi</h3>
                        <div class="form-group">
                            <label>Kullanıcı Adı</label>
                            <input type="text" name="kullanici_adi" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Şifre</label>
                            <input type="password" name="sifre" class="form-control" value="" required>
                        </div>
                        <input type="submit" name="login" class="btn btn-danger" value="Giriş yap" />
                    </form>
                    <?php
                    if(isset($_POST['login'])){
                      include "veritabani_baglantisi.php"; // veritabanı yapılandırması
                      $kullanici_adi = mysqli_real_escape_string($conn, $_POST['kullanici_adi']);
                      $sifre  = mysqli_real_escape_string($conn, md5($_POST['sifre']));

                      $sql = "SELECT * FROM admin WHERE kullanici_adi = '{$kullanici_adi}' AND sifre = '{$sifre}'";
                      $result = mysqli_query($conn, $sql);

                      if(mysqli_num_rows($result) > 0){
                        session_start(); // Oturumu başlat
                        while($row = mysqli_fetch_assoc($result)){
                          $_SESSION["kullanici_adi"] = $row['kullanici_adi'];
                          $_SESSION["user_id"] = $row['id'];
                        }
                        header("$base_url/kontrol_panali.php"); // Yönlendirme yap
                      }else{
                          echo "<div class='alert alert-danger'>Kullanıcı adı ve şifre eşleşmiyor.</div>";
                      }
                    } ?>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
