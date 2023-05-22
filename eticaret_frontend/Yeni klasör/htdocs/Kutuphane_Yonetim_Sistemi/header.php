<?php
session_start();
include 'veritabani_baglantisi.php'; // Veritabanı yapılandırması
if(!isset($_SESSION['kullanici_adi'])){ // Oturum var mı diye kontrol et
  header("$base_url");
} ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kütüphane Yönetim Sistemi</title>
    <link rel="stylesheet" href="css/bootstrap.css"> <!-- Bootstrap -->
    <link rel="stylesheet" href="css/style.css"> <!-- Custom stlylesheet -->
  </head>
  <body>
    <div id="header"> <!-- HEADER -->
      <div class="container">
          <div class="row">
              <div class="offset-md-4 col-md-4">
                <div class="logo">
                  <a href="kontrol_panali.php"><img src="images/library.png"></a>
                </div>
              </div>
              <div class="offset-md-2 col-md-2">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Seçenekler
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="sifre_degistir.php">Şifre Değiştir</a>
                      <a class="dropdown-item" href="cıkıs_yap.php">Çıkış Yap</a>
                    </div>
                    </div>
              </div>
          </div>
      </div>
    </div> <!-- /HEADER -->
    <div id="menubar"> <!-- Menu Bar -->
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <ul class="menu">
                    <li><a href="kontrol_panali.php">Kontrol Paneli</a></li>
                    <li><a href="yazar.php">Yazarlar</a></li>
                    <li><a href="yayinevi.php">Yayınevleri</a></li>
                    <li><a href="kategori.php">Kategoriler</a></li>
                    <li><a href="kitap.php">Kitaplar</a></li>
                    <li><a href="ogrenci.php">Kayıtlı Öğrenciler</a></li>
                    <li><a href="kitap_odunc.php">Kitap Ödünç Verme</a></li>
                    <li><a href="raporlar.php">Raporlar</a></li>
                    <li><a href="ayarlar.php">Ayarlar</a></li>
                  </ul>
              </div>
          </div>
      </div>
    </div> <!-- /Menu Bar -->
  