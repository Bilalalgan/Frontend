<?php
include "database.php";
session_start();
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != TRUE) {
    header("Location: login.php");
    die();
    
} else {
    if ($_SESSION['user_info']['isim'] != 'admin') {
        header("Location: login.php");
        die();
    }
    // { ["id"]=> int(3) ["email"]=> string(27) "bilalcagrialgan@hotmail.com" ["passwd"]=> string(32) "e10adc3949ba59abbe56e057f20f883e" ["isim"]=> string(14) "Bilal Çağrı" ["soyisim"]=> string(6) "Alğan" ["adres"]=> string(5) "adres" ["sepet"]=> NULL ["favoriler"]=> NULL ["remember_token"]=> string(40) "4831ebefd6d19204db977c273c3a4449073e3719" }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Yazı Tipi-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Bootsrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Alışveriş Projesi</title>

    <!-- Css Dosyalarım-->
    <link rel="stylesheet" href="css/style.css">

</head>
<body class="bg-light">
    <header>
        <section class="top-bar">
            <div class="container">
                <div class="row align-items-center gy-3">
                    <div class="col-lg-2 col-sm-4 col-4">
                        <a href="index.php" class="navbar-brand">E-Commerce</a>
                    </div>
                    
                    <div class="order-lg-last col-lg-5 col-sm-8 col-8">
                        <div class="text-end d-flex justify-content-end">
                            <div class="dropdown">
                                <button class="btn btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user"></i><span class="ms-1 d-none d-sm-inline-block">Admin</span>
                                </button>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="siparisler.php">Siparişler</a></li>
                                    <li><a class="dropdown-item" href="hesapislemleri.php">Hesap İşlemleri</a></li>
                                    <li><a class="dropdown-item" href="destroy.php">Çıkış Yap</a></li>
                                </ul>
                            </div>
                            <div>
                                <button class="btn btn-light" onclick="toggleDiv('urunekle')">
                                    <i class="fa-regular fa-clipboard"></i> <span class="ms-1 d-none d-sm-inline-block">Ürün İşlemleri</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-12">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Anahtar Kelime" id="urun_ara_key">
                                <button class="btn btn-primary" id="urun_ara">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
        <nav class="navbar navbar-dark bg-primary navbar-expand-lg">
            <div class="container">
                <button class="navbar-toggler border" type="button" data-bs-target="#nav-menu" data-bs-toggle="collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="nav-menu" >
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            
                            <a href="#" onclick="urun_listele('masaustu')" class="nav-link ps-0">Masaüstü Bilgisayar</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" onclick="urun_listele('monitor')"  class="nav-link">Monitör</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" onclick="urun_listele('laptop')"  class="nav-link">Laptop</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" onclick="urun_listele('saat')"  class="nav-link">Akıllı Saatler</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" onclick="urun_listele('kulaklik')"  class="nav-link">Kulaklık</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" onclick="urun_listele('telefon')"  class="nav-link">Telefonlar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!--Slider Kısmı-->
    <section class="pt-3 slider">
        <div class="container">
            <main class="card">
                <div class="row p-1 p-lg-3">
                    <aside class="col-lg-3 d-none d-lg-block">
                        <nav class="nav nav-pills flex-column overflow-auto flex-nowrap alt-menu" style="height: 350px;">
                            <a href="#" onclick="urun_listele('masaustu')" class="nav-link">Masaüstü Bilgisayar</a>
                            <a href="#" onclick="urun_listele('monitor')"  class="nav-link">Monitör</a>
                            <a href="#" onclick="urun_listele('laptop')"  class="nav-link">Laptop</a>
                            <a href="#" onclick="urun_listele('saat')"  class="nav-link">Akıllı Saatler</a>
                            <a href="#" onclick="urun_listele('kulaklik')"  class="nav-link">Kulaklık</a>
                            <a href="#" onclick="urun_listele('telefon')"  class="nav-link">Telefonlar</a>
                        </nav>
                    </aside>
                    <div class="col-lg-9">
                        <div id="slider" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators" id="reklam_sayisi">
                               
                            </div>
                            
                            <div class="carousel-inner" id="reklam_reklamlar">
                                
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </section>

    <!--Ürün İşlemleri-->
    <section class="pt-3" id="urunekle" style="display: none;">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#masaustu" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Masaüstü</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#monitor" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Monitör</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#laptop" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Laptop</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#akillisaat" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Akıllı Saat</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#kulaklık" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Kulaklık</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#telefon" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Telefon</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#reklampanosu" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Reklam Panosu</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="masaustu" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <form class="row ps-2 pt-3" id="masaustu_form">
                        <div class="mb-3">
                          <label for="masaustu_isim" class="form-label">Ürün İsmi</label>
                          <input type="text" class="form-control" id="masaustu_isim" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="masaustu_yildiz" class="form-label">Yıldız</label>
                            <select class="form-select" aria-label="Default select example" id="masaustu_yildiz" required>
                                <option selected disabled>Yıldız Sayısı</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="masaustu_fiyat" class="form-label">Fiyat</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" aria-describedby="basic-addon2" required id="masaustu_fiyat" required>
                                <span class="input-group-text" id="basic-addon2">TL</span>
                            </div>
                            <div id="emailHelp" class="form-text">Ürün indirimde ise indirimli hali yazılacaktır. İndirim öncesi fiyat aşağıdaki tik işaretlenip girilecektir.</div>
                        </div>
                        <div class="mb-3 col-6">
                          <label for="masaustu_os" class="form-label">İşletim Sistemi</label>
                          <input type="text" class="form-control" id="masaustu_os" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="masaustu_cpu" class="form-label">İşlemci</label>
                            <input type="text" class="form-control" id="masaustu_cpu" required>
                          </div>
                        <div class="mb-3 col-6">
                            <label for="masaustu_ssd" class="form-label">SSD Kapasitesi</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="masaustu_ssd" required>
                                <span class="input-group-text">GB</span>
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="masaustu_ram" class="form-label">Ram (Sistem Belleği)</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="masaustu_ram" required>
                                <span class="input-group-text">GB</span>
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="masaustu_hdd" class="form-label">Harddisk Kapasitesi</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="masaustu_hdd" required>
                                <span class="input-group-text">GB</span>
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="masaustu_gpu_type" class="form-label">Ekran Kartı Tipi</label>
                            <input type="text" class="form-control" id="masaustu_gpu_type" required>
                        </div>
                        <div class="mb-3">
                            <label for="masaustu_gpu" class="form-label">Ekran Kartı Modeli</label>
                            <input type="text" class="form-control" id="masaustu_gpu" required>
                        </div>
                        <div class="mb-3">
                            <label for="masaustu_big_picture" class="form-label">Büyük Resim</label>
                            <input class="form-control" type="file" id="masaustu_big_picture" required>
                        </div>
                        <div class="mb-3">
                            <label for="masaustu_other_picture" class="form-label">Resimler</label>
                            <input class="form-control" type="file" id="masaustu_other_pictures" multiple required>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-6 col-md-2 d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" id="masaustu_discount" onclick="toggleDiv('masaustu-div')">
                                <label class="form-check-label ps-2 pt-1" for="masaustu_discount">İndirimli Ürün</label>
                            </div>
                            <div class="col-6 col-md-4" style="display: none;" id="masaustu-div">
                                <div class="d-flex">
                                    <input type="text" class="form-control" id="masaustu_discount_price" placeholder="İndirimsiz fiyatı giriniz.">
                                    <span class="input-group-text">TL</span>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary col-3 col-md-1 mx-2" id="masaustu_ekle">Ekle</button>
                        <button type="button" class="btn btn-success col-3 col-md-1" id="masaustu_guncelle">Güncelle</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="monitor" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <form class="row ps-2 pt-3">
                        <div class="mb-3">
                          <label for="monitor_isim" class="form-label">Ürün İsmi</label>
                          <input type="text" class="form-control" id="monitor_isim" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="monitor_yildiz" class="form-label">Yıldız</label>
                            <select class="form-select" aria-label="Default select example" id="monitor_yildiz" required>
                                <option selected disabled>Yıldız Sayısı</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="monitor_fiyat" class="form-label">Fiyat</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" aria-describedby="basic-addon2" required id="monitor_fiyat" required>
                                <span class="input-group-text" id="basic-addon2">TL</span>
                            </div>
                            <div id="emailHelp" class="form-text">Ürün indirimde ise indirimli hali yazılacaktır. İndirim öncesi fiyat aşağıdaki tik işaretlenip girilecektir.</div>
                        </div>
                        <div class="mb-3 col-6">
                          <label for="monitor_hz" class="form-label">Yenileme Hızı (Hz)</label>
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" id="monitor_hz" required>
                            <span class="input-group-text">Hz</span>
                        </div>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="monitor_resolution" class="form-label">Çözünürlük (max)</label>
                            <select class="form-select" aria-label="Default select example" id="monitor_resolution">
                                <option selected disabled>Çözünürlük</option>
                                <option value="1366x720p">1366x720p</option>
                                <option value="1920x1080p">1920x1080p</option>
                                <option value="2568x1440p">2568x1440p</option>
                                <option value="3840x2160p">3840x2160p</option>
                                <option value="7680x4320p">7680x4320p</option>
                            </select>
                        </div>
                        <div class="mb-3 col-5 col-md-2">
                            <label for="monitor_speaker" class="form-label">Dahili Hoparlör</label>
                            <div class="input-group mb-3">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="monitor_speaker_var" id="monitor_speaker_var">
                                    <label class="form-check-label" for="monitor_speaker_var">Var</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="monitor_speaker_var" id="monitor_speaker_yok" checked>
                                    <label class="form-check-label" for="monitor_speaker_yok">Yok</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-7 col-md-5">
                            <label for="monitor_size" class="form-label">Ekran Büyüklüğü (İnç)</label>
                            <div class="d-flex">
                                <input type="text" class="form-control" id="monitor_size" required>
                                <span class="input-group-text">inç</span>
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-md-5">
                            <label for="reaction_time_ms" class="form-label">Tepki Süresi</label>
                            <div class="d-flex">
                                <input type="text" class="form-control" id="reaction_time_ms" required>
                                <span class="input-group-text">ms</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="monitor_big_picture" class="form-label">Büyük Resim</label>
                            <input class="form-control" type="file" id="monitor_big_picture" required>
                        </div>
                        <div class="mb-3">
                            <label for="monitor_other_pictures" class="form-label">Resimler</label>
                            <input class="form-control" type="file" name="files[]" id="monitor_other_pictures" multiple>
                            
                        </div>
                        <div class="mb-3 row">
                            <div class="col-6 col-md-2 d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" id="monitor_discount" onclick="toggleDiv('monitor-div')">
                                <label class="form-check-label ps-2 pt-1" for="monitor_discount">İndirimli Ürün</label>
                            </div>
                            <div class="col-6 col-md-4" style="display: none;" id="monitor-div">
                                <div class="d-flex">
                                    <input type="text" class="form-control" id="monitor_discount_price" placeholder="İndirimsiz fiyatı giriniz.">
                                    <span class="input-group-text">TL</span>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary col-3 col-md-1 mx-2" id="monitor_ekle">Ekle</button>
                        <button type="button" class="btn btn-success col-3 col-md-1" id="monitor_guncelle">Güncelle</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="laptop" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                    <form class="row ps-2 pt-3">
                        <div class="mb-3">
                          <label for="laptop_isim" class="form-label">Ürün İsmi</label>
                          <input type="text" class="form-control" id="laptop_isim" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="laptop_star" class="form-label">Yıldız</label>
                            <select class="form-select" aria-label="Default select example" id="laptop_star" required>
                                <option selected disabled>Yıldız Sayısı</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="laptop_fiyat" class="form-label">Fiyat</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" aria-describedby="basic-addon2" required id="laptop_fiyat" required>
                                <span class="input-group-text" id="basic-addon2">TL</span>
                            </div>
                            <div id="emailHelp" class="form-text">Ürün indirimde ise indirimli hali yazılacaktır. İndirim öncesi fiyat aşağıdaki tik işaretlenip girilecektir.</div>
                        </div>
                        <div class="mb-3 col-6">
                          <label for="laptop_os" class="form-label">İşletim Sistemi</label>
                          <input type="text" class="form-control" id="laptop_os" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="laptop_cpu" class="form-label">İşlemci</label>
                            <input type="text" class="form-control" id="laptop_cpu" required>
                          </div>
                        <div class="mb-3 col-6">
                            <label for="laptop_ssd" class="form-label">SSD Kapasitesi</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="laptop_ssd" required>
                                <span class="input-group-text">GB</span>
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="laptop_ram" class="form-label">Ram (Sistem Belleği)</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="laptop_ram" required>
                                <span class="input-group-text">GB</span>
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="laptop_hdd" class="form-label">Harddisk Kapasitesi</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="laptop_hdd" required>
                                <span class="input-group-text">GB</span>
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="laptop_screen_size" class="form-label">Ekran Boyutu</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="laptop_screen_size" required>
                                <span class="input-group-text">inç</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="laptop_gpu" class="form-label">Ekran Kartı Modeli</label>
                            <input type="text" class="form-control" id="laptop_gpu" required>
                        </div>
                        <div class="mb-3">
                            <label for="laptop_big_picture" class="form-label">Büyük Resim</label>
                            <input class="form-control" type="file" id="laptop_big_picture" required>
                        </div>
                        <div class="mb-3">
                            <label for="laptop_other_pictures" class="form-label">Resimler</label>
                            <input class="form-control" type="file" id="laptop_other_pictures" multiple>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-6 col-md-2 d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="" id="laptop_discount" onclick="toggleDiv('laptop-div')">
                                <label class="form-check-label ps-2 pt-1" for="laptop_discount">İndirimli Ürün</label>
                            </div>
                            <div class="col-6 col-md-4" style="display: none;" id="laptop-div">
                                <div class="d-flex">
                                    <input type="text" class="form-control" id="laptop_discount_price" placeholder="İndirimsiz fiyatı giriniz.">
                                    <span class="input-group-text">TL</span>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary col-3 col-md-1 mx-2" id="laptop_ekle">Ekle</button>
                        <button type="button" class="btn btn-success col-3 col-md-1" id="laptop_guncelle">Güncelle</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="akillisaat" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                    <form class="row ps-2 pt-3">
                        <div class="mb-3">
                          <label for="saat_isim" class="form-label">Ürün İsmi</label>
                          <input type="text" class="form-control" id="saat_isim" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="saat_star" class="form-label">Yıldız</label>
                            <select class="form-select" aria-label="Default select example" id="saat_star" required>
                                <option selected disabled>Yıldız Sayısı</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="saat_fiyat" class="form-label">Fiyat</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" aria-describedby="basic-addon2" required id="saat_fiyat" required>
                                <span class="input-group-text" id="basic-addon2">TL</span>
                            </div>
                            <div id="emailHelp" class="form-text">Ürün indirimde ise indirimli hali yazılacaktır. İndirim öncesi fiyat aşağıdaki tik işaretlenip girilecektir.</div>
                        </div>
                        <div class="mb-3 col-12">
                            <label for="saat_marka" class="form-label">Marka</label>
                            <input type="text" class="form-control" id="saat_marka" required>
                        </div>
                        <div class="mb-3 col-5 col-md-3">
                            <label for="saat_adim" class="form-label">Adım Sayar</label>
                            <div class="input-group mb-3">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="saat_adim" id="saat_adim">
                                    <label class="form-check-label" for="saat_adim">Var</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="saat_adim" id="saat_adim" checked>
                                    <label class="form-check-label" for="saat_adim">Yok</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-5 col-md-3">
                            <label for="saat_kamera" class="form-label">Kamera</label>
                            <div class="input-group mb-3">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="saat_kamera" id="saat_kamera">
                                    <label class="form-check-label" for="saat_kamera">Var</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="saat_kamera" id="saat_kamera" checked>
                                    <label class="form-check-label" for="saat_kamera">Yok</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-5 col-md-3">
                            <label for="saat_su" class="form-label">Su Geçirmezlik</label>
                            <div class="input-group mb-3">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="saat_su" id="saat_su">
                                    <label class="form-check-label" for="saat_su">Var</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="saat_su" id="saat_su" checked>
                                    <label class="form-check-label" for="saat_su">Yok</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-5 col-md-3">
                            <label for="saat_uyku" class="form-label">Uyku Takibi</label>
                            <div class="input-group mb-3">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="saat_uyku" id="saat_uyku">
                                    <label class="form-check-label" for="saat_uyku">Var</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="saat_uyku" id="saat_uyku" checked>
                                    <label class="form-check-label" for="saat_uyku">Yok</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-5 col-md-3">
                            <label for="saat_sesli" class="form-label">Sesli Görüşme</label>
                            <div class="input-group mb-3">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="saat_sesli" id="saat_sesli">
                                    <label class="form-check-label" for="saat_sesli">Var</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="saat_sesli" id="saat_sesli" checked>
                                    <label class="form-check-label" for="saat_sesli">Yok</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-5 col-md-3">
                            <label for="saat_kalp" class="form-label">Kalp Ritmi Ölçme</label>
                            <div class="input-group mb-3">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="saat_kalp" id="saat_kalp">
                                    <label class="form-check-label" for="saat_kalp">Var</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="saat_kalp" id="saat_kalp" checked>
                                    <label class="form-check-label" for="saat_kalp">Yok</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-5 col-md-3">
                            <label for="saat_gps" class="form-label">GPS</label>
                            <div class="input-group mb-3">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="saat_gps" id="saat_gps">
                                    <label class="form-check-label" for="saat_gps">Var</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="saat_gps" id="saat_gps" checked>
                                    <label class="form-check-label" for="saat_gps">Yok</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="saat_big_picture" class="form-label">Büyük Resim</label>
                            <input class="form-control" type="file" id="saat_big_picture" required>
                        </div>
                        <div class="mb-3">
                            <label for="saat_other_pictures" class="form-label">Resimler</label>
                            <input class="form-control" type="file" id="saat_other_pictures" multiple>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-6 col-md-2 d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" value="" id="saat_discount" onclick="toggleDiv('akillisaat-div')">
                                <label class="form-check-label ps-2 pt-1" for="saat_discount">İndirimli Ürün</label>
                            </div>
                            <div class="col-6 col-md-4" style="display: none;" id="akillisaat-div">
                                <div class="d-flex">
                                    <input type="text" class="form-control" id="saat_discount_price" placeholder="İndirimsiz fiyatı giriniz.">
                                    <span class="input-group-text">TL</span>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary col-3 col-md-1 mx-2" id="saat_ekle">Ekle</button>
                        <button type="button" class="btn btn-success col-3 col-md-1" id="saat_guncelle">Güncelle</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="kulaklık" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                    <form class="row ps-2 pt-3">
                        <div class="mb-3">
                          <label for="kulaklik_isim" class="form-label">Ürün İsmi</label>
                          <input type="text" class="form-control" id="kulaklik_isim" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="kulaklik_star" class="form-label">Yıldız</label>
                            <select class="form-select" aria-label="Default select example" id="kulaklik_star" required>
                                <option selected disabled>Yıldız Sayısı</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="kulaklik_fiyat" class="form-label">Fiyat</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" aria-describedby="basic-addon2" required id="kulaklik_fiyat" required>
                                <span class="input-group-text" id="basic-addon2">TL</span>
                            </div>
                            <div id="emailHelp" class="form-text">Ürün indirimde ise indirimli hali yazılacaktır. İndirim öncesi fiyat aşağıdaki tik işaretlenip girilecektir.</div>
                        </div>
                        <div class="mb-3 col-12">
                            <label for="kulaklik_marka" class="form-label">Marka</label>
                            <input type="text" class="form-control" id="kulaklik_marka" required>
                        </div>
                        <div class="mb-3 col-6 col-md-6">
                            <label for="kulaklik_tur" class="form-label">Tür</label>
                            <select class="form-select" aria-label="Default select example" id="kulaklik_tur" required>
                                <option selected disabled>Tür</option>
                                <option value="Bluetooth">Bluetooth</option>
                                <option value="Kablolu">Kablolu</option>
                            </select>
                        </div>
                        <div class="mb-3 col-6 col-md-6">
                            <label for="kulaklik_bt" class="form-label">Bluetooth Versiyon</label>
                            <select class="form-select" aria-label="Default select example" id="kulaklik_bt" required>
                                <option selected disabled>Bluetooth Versiyon</option>
                                <option value="Yok">Yok</option>
                                <option value="1.0">1.0</option>
                                <option value="2.0">2.0</option>
                                <option value="3.0">3.0</option>
                                <option value="4.0">4.0</option>
                                <option value="5.0">5.0</option>
                            </select>
                        </div>
                        <div class="mb-3 col-6 col-md-4">
                            <label for="kulaklik_cifttel" class="form-label">Çift Telefon Desteği</label>
                            <div class="input-group mb-3">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="kulaklik_cifttel" id="kulaklik_cifttel">
                                    <label class="form-check-label" for="kulaklik_cifttel">Var</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kulaklik_cifttel" id="kulaklik_cifttel" checked>
                                    <label class="form-check-label" for="kulaklik_cifttel">Yok</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-6 col-md-4">
                            <label for="kulaklik_suter" class="form-label">Suya & Tere Dayanıklı</label>
                            <div class="input-group mb-3">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="kulaklik_suter" id="kulaklik_suter">
                                    <label class="form-check-label" for="kulaklik_suter">Var</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kulaklik_suter" id="kulaklik_suter" checked>
                                    <label class="form-check-label" for="kulaklik_suter">Yok</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-5 col-md-4">
                            <label for="kulaklik_tipi" class="form-label">Kullanım Tipi</label>
                            <div class="input-group mb-3">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="kulaklik_tipi" id="kulaklik_tipi">
                                    <label class="form-check-label" for="kulaklik_tipi">Kulak İçi</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kulaklik_tipi" id="kulaklik_tipi" checked>
                                    <label class="form-check-label" for="kulaklik_tipi">Kulak Üstü</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="kulaklik_big_picture" class="form-label">Büyük Resim</label>
                            <input class="form-control" type="file" id="kulaklik_big_picture" required>
                        </div>
                        <div class="mb-3">
                            <label for="kulaklik_other_pictures" class="form-label">Resimler</label>
                            <input class="form-control" type="file" id="kulaklik_other_pictures" multiple>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-6 col-md-2 d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" id="kulaklik_discount" onclick="toggleDiv('kulaklik-div')">
                                <label class="form-check-label ps-2 pt-1" for="kulaklik_discount">İndirimli Ürün</label>
                            </div>
                            <div class="col-6 col-md-4" style="display: none;" id="kulaklik-div">
                                <div class="d-flex">
                                    <input type="text" class="form-control" id="kulaklik_discount_price" placeholder="İndirimsiz fiyatı giriniz.">
                                    <span class="input-group-text">TL</span>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary col-3 col-md-1 mx-2" id="kulaklik_ekle">Ekle</button>
                        <button type="button" class="btn btn-success col-3 col-md-1" id="kulaklik_guncelle">Güncelle</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="telefon" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                    <form class="row ps-2 pt-3">
                        <div class="mb-3">
                          <label for="telefon_isim" class="form-label">Ürün İsmi</label>
                          <input type="text" class="form-control" id="telefon_isim" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="telefon_star" class="form-label">Yıldız</label>
                            <select class="form-select" aria-label="Default select example" id="telefon_star" required>
                                <option selected disabled>Yıldız Sayısı</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="telefon_fiyat" class="form-label">Fiyat</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" aria-describedby="basic-addon2" required id="telefon_fiyat" required>
                                <span class="input-group-text" id="basic-addon2">TL</span>
                            </div>
                            <div id="emailHelp" class="form-text">Ürün indirimde ise indirimli hali yazılacaktır. İndirim öncesi fiyat aşağıdaki tik işaretlenip girilecektir.</div>
                        </div>
                        <div class="mb-3 col-6">
                          <label for="telefon_marka" class="form-label">Marka</label>
                          <input type="text" class="form-control" id="telefon_marka" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="telefon_model" class="form-label">Model</label>
                            <input type="text" class="form-control" id="telefon_model" required>
                          </div>
                        <div class="mb-3 col-6">
                            <label for="telefon_hafiza" class="form-label">Dahili Hafıza</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="telefon_hafiza" required>
                                <span class="input-group-text">GB</span>
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="telefon_ram" class="form-label">RAM Kapasitesi</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="telefon_ram" required>
                                <span class="input-group-text">GB</span>
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="telefon_kamera_cozunurluk_arka" class="form-label">Kamera Çözünürlüğü</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="telefon_kamera_cozunurluk_arka" required>
                                <span class="input-group-text">MP</span>
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="telefon_ekran_boyut" class="form-label">Ekran Boyutu</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="telefon_ekran_boyut" required>
                                <span class="input-group-text">inç</span>
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="telefon_pil" class="form-label">Pil Gücü</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="telefon_pil" required>
                                <span class="input-group-text">mAh</span>
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="telefon_kamera_cozunurluk_on" class="form-label">Ön (Selfie) Kamera</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="telefon_kamera_cozunurluk_on" required>
                                <span class="input-group-text">MP</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="telefon_big_picture" class="form-label">Büyük Resim</label>
                            <input class="form-control" type="file" id="telefon_big_picture" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefon_other_pictures" class="form-label">Resimler</label>
                            <input class="form-control" type="file" id="telefon_other_pictures" multiple>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-6 col-md-2 d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" id="telefon_discount" onclick="toggleDiv('telefon-div')">
                                <label class="form-check-label ps-2 pt-1" for="telefon_discount">İndirimli Ürün</label>
                            </div>
                            <div class="col-6 col-md-4" style="display: none;" id="telefon-div">
                                <div class="d-flex">
                                    <input type="text" class="form-control" id="telefon_discount_price" placeholder="İndirimsiz fiyatı giriniz.">
                                    <span class="input-group-text">TL</span>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary col-3 col-md-1 mx-2" id="telefon_ekle">Ekle</button>
                        <button type="button" class="btn btn-success col-3 col-md-1" id="telefon_guncelle">Güncelle</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="reklampanosu" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                    <form class="row ps-2 pt-3">
                        <div class="mb-3">
                            <label for="reklamlar" class="form-label">Resimler</label>
                            <input class="form-control" type="file" id="reklamlar" multiple>
                        </div>
                        <button type="button" class="btn btn-primary col-3 col-md-1 mx-2" id="reklam_panosunu_degis">Ekle</button>
                        <button type="button" class="btn btn-danger col-3 col-md-1" id="reklam_panosunu_temizle">Temizle</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!--Ürünler-->
    <section class="pt-3">
        <div class="container">
            <header>
                <h3 class="mb-md-3 md-0">Ürünler</h3>
            </header>
            <div class="row" id="urun_listesi">
                
                
            </div>
        </div>
    </section>

    <footer class="py-4 bg-primary">
        <div class="conteiner">
            <div class="row gy-3 px-5">
                <div class="col-md-4">
                    <form action="">
                        <div class="input-group">
                            <input type="text" name="" id="" class="form-control" placeholder="Email">
                            <button class="btn btn-outline-warning">Abone Ol</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <nav class="text-center text-md-end">
                        <a href="#" class="btn btn-icon btn-outline-warning">
                            <i class="fab fa-facebook"></i>
                        </a> 
                        <a href="#" class="btn btn-icon btn-outline-warning">
                            <i class="fab fa-instagram"></i>
                        </a> 
                        <a href="#" class="btn btn-icon btn-outline-warning">
                            <i class="fab fa-youtube"></i>
                        </a> 
                        <a href="#" class="btn btn-icon btn-outline-warning">
                            <i class="fab fa-twitter"></i>
                        </a> 
                    </nav>
                </div>
                <div class="col-md-12">
                    <p class="text-center text-white">
                        @2025 Tüm Hakları Saklıdır.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    <script src="js/funcs.js"></script>

    <script>
        function toggleDiv(id) {
            const div = document.getElementById(id);
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        }
        var links = document.getElementsByTagName("a");
            for (var i = 0; i < links.length; i++) {
            links[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>

    <script>

        var lastprods;
        var alreadytoggle = 0;
        var IdForUpdate;
        
        function GetElementsInsideContainer(containerID, by="*") {
            
            var elms = document.getElementById(containerID).getElementsByTagName(by);
            
            return elms;
        }

        function update_product(id, tip) {
            if (alreadytoggle == 0) {
                toggleDiv('urunekle')
                alreadytoggle = 1
            }
            
            var elems = GetElementsInsideContainer("myTab", "button")
            if (tip == "masaustu") {
                elems[0].click()
                elems[0].innerHTML="Masaüstü (Güncelleme modu) <a href='#' onclick='location.reload()'>Çık</a>"
                get_product_by_id(id).then((message) => {
                    if (message.status_code == 200) {
                        var reso = message.response.response
                        var urun_detay = JSON.parse(message.response.response.urun_data.replace(/\\/g,"\\\\").replace("\\n", ""))
                        console.log(reso)
                        console.log(urun_detay)
                        $("#masaustu_isim").val(reso.urun_isim)
                        $("#masaustu_yildiz").val(urun_detay.star_count)
                        if (urun_detay.discount) {
                            $("#masaustu_fiyat").val(urun_detay.price)
                            $("#masaustu_discount_price").val(urun_detay.discount_price)
                        } else {
                            $("#monitor_fiyat").val(urun_detay.price)
                        }
                        $("#masaustu_os").val(urun_detay.masaustu_os)
                        $("#masaustu_cpu").val(urun_detay.masaustu_cpu)
                        $("#masaustu_ssd").val(urun_detay.masaustu_ssd)
                        $("#masaustu_ram").val(urun_detay.masaustu_ram)
                        $("#masaustu_hdd").val(urun_detay.masaustu_hdd)
                        $("#masaustu_gpu_type").val(urun_detay.masaustu_gpu_type)
                        $("#masaustu_gpu").val(urun_detay.masaustu_gpu)
                        if (urun_detay.discount) {$("#masaustu_discount").prop("checked",true);toggleDiv('masaustu-div')} else {$("#masaustu_discount").prop("checked",false)}
                        $("#masaustu_guncelle").click(async function () {
                            
                            var la = await setProductUpdate(reso, urun_detay)
                            console.log(la)
                        })
                    }
                })
            } else if (tip == "monitor") {
                elems[1].click()
                elems[1].innerHTML="Monitor (Güncelleme modu) <a href='#' onclick='location.reload()'>Çık</a>"
                get_product_by_id(id).then((message) => {
                    if (message.status_code == 200) {
                        var reso = message.response.response
                        var urun_detay = JSON.parse(message.response.response.urun_data.replace(/\\/g,"\\\\").replace("\\n", ""))
                        console.log(reso)
                        console.log(urun_detay)
                        $("#monitor_isim").val(reso.urun_isim)
                        $("#monitor_yildiz").val(urun_detay.star_count)
                        if (urun_detay.discount) {
                            $("#monitor_fiyat").val(urun_detay.price)
                            $("#monitor_discount_price").val(urun_detay.discount_price)
                        } else {
                            $("#monitor_fiyat").val(urun_detay.price)
                        }
                        
                        $("#monitor_hz").val(urun_detay.monitor_hz)
                        $("#monitor_resolution").val(urun_detay.resolution)
                        if (urun_detay.internal_speaker == true) {
                            $("#monitor_speaker_var").prop("checked",true)
                        }
                        
                        $("#monitor_size").val(urun_detay.screen_size)
                        $("#reaction_time_ms").val(urun_detay.reaction_time_ms)
                        
                        if (urun_detay.discount) {$("#monitor_discount").prop("checked",true);toggleDiv('monitor-div')} else {$("#monitor_discount").prop("checked",false)}
                        $("#monitor_guncelle").click(async function () {
                            
                            var la = await setProductUpdate(reso, urun_detay)
                            console.log(la)
                        })
                    }
                })
            } else if (tip == "laptop") {
                elems[2].click()
                elems[2].innerHTML="Laptop (Güncelleme modu) <a href='#' onclick='location.reload()'>Çık</a>"
                get_product_by_id(id).then((message) => {
                    if (message.status_code == 200) {
                        var reso = message.response.response
                        var urun_detay = JSON.parse(message.response.response.urun_data.replace(/\\/g,"\\\\").replace("\\n", ""))
                        console.log(reso)
                        console.log(urun_detay)
                        
                        $('#laptop_star').val(urun_detay.star_count)
                        $('#laptop_os').val(urun_detay.laptop_os)
                        $('#laptop_cpu').val(urun_detay.laptop_cpu)
                        $('#laptop_ssd').val(urun_detay.laptop_ssd)
                        $('#laptop_ram').val(urun_detay.laptop_ram)
                        $('#laptop_hdd').val(urun_detay.laptop_hdd)
                        $('#laptop_screen_size').val(urun_detay.laptop_screen_size)
                        $('#laptop_gpu').val(urun_detay.laptop_gpu)
                        $("#laptop_isim").val(reso.urun_isim)
                        $("#laptop_yildiz").val(urun_detay.star_count)
                        if (urun_detay.discount) {
                            $("#laptop_fiyat").val(urun_detay.price)
                            $("#laptop_discount_price").val(urun_detay.discount_price)
                        } else {
                            $("#laptop_fiyat").val(urun_detay.price)
                        }
                        
                        if (urun_detay.discount) {$("#laptop_discount").prop("checked",true);toggleDiv('laptop-div')} else {$("#laptop_discount").prop("checked",false)}
                        $("#laptop_guncelle").click(async function () {
                            
                            var la = await setProductUpdate(reso, urun_detay)
                            console.log(la)
                        })
                    }
                })
            } else if (tip == "saat") {
                elems[3].click()
                elems[3].innerHTML="Akıllı Saat (Güncelleme modu) <a href='#' onclick='location.reload()'>Çık</a>"
                get_product_by_id(id).then((message) => {
                    if (message.status_code == 200) {
                        var reso = message.response.response
                        var urun_detay = JSON.parse(message.response.response.urun_data.replace(/\\/g,"\\\\").replace("\\n", ""))
                        console.log(reso)
                        console.log(urun_detay)

                        $("#saat_star").val(urun_detay.star_count)
                        $('#saat_isim').val(reso.urun_isim)
                        $('#saat_marka').val(urun_detay.saat_marka)
                        if (urun_detay.saat_adim) {
                            $('#saat_adim').prop('checked', true)
                        } else {
                            $('#saat_adim').prop('checked', false)
                        }
                        if (urun_detay.saat_kamera) {
                            $('#saat_kamera').prop('checked', true)
                        } else {
                            $('#saat_kamera').prop('checked', false)
                        }
                        if (urun_detay.saat_su) {
                            $('#saat_su').prop('checked', true)
                        } else {
                            $('#saat_su').prop('checked', false)
                        }
                        if (urun_detay.saat_uyku) {
                            $('#saat_uyku').prop('checked', true)
                        } else {
                            $('#saat_uyku').prop('checked', false)
                        }
                        if (urun_detay.saat_sesli) {
                            $('#saat_sesli').prop('checked', true)
                        } else {
                            $('#saat_sesli').prop('checked', false)
                        }
                        if (urun_detay.saat_kalp) {
                            $('#saat_kalp').prop('checked', true)
                        } else {
                            $('#saat_kalp').prop('checked', false)
                        }
                        if (urun_detay.saat_gps) {
                            $('#saat_gps').prop('checked', true)
                        } else {
                            $('#saat_gps').prop('checked', false)
                        }
                        
                        if (urun_detay.discount) {
                            $("#saat_fiyat").val(urun_detay.price)
                            $("#saat_discount_price").val(urun_detay.discount_price)
                        } else {
                            $("#saat_fiyat").val(urun_detay.price)
                        }
                        
                        if (urun_detay.discount) {$("#saat_discount").prop("checked",true);toggleDiv('akillisaat-div')} else {$("#saat_discount").prop("checked",false)}
                        $("#saat_guncelle").click(async function () {
                            
                            var la = await setProductUpdate(reso, urun_detay)
                            console.log(la)
                        })
                    }
                })
            } else if (tip == "kulaklik") {
                elems[4].click()
                
                elems[4].innerHTML="Kulaklık (Güncelleme modu) <a href='#' onclick='location.reload()'>Çık</a>"
                get_product_by_id(id).then((message) => {
                    if (message.status_code == 200) {
                        var reso = message.response.response
                        var urun_detay = JSON.parse(message.response.response.urun_data.replace(/\\/g,"\\\\").replace("\\n", ""))
                        console.log(reso)
                        console.log(urun_detay)
                       
                        
                        $("#kulaklik_star").val(urun_detay.star_count)
                        $('#kulaklik_isim').val(reso.urun_isim)
                        $('#kulaklik_marka').val(urun_detay.kulaklik_marka)
                        $('#kulaklik_tur').val(urun_detay.kulaklik_tur)
                        $('#kulaklik_bt').val(urun_detay.kulaklik_bt)

                        if (urun_detay.kulaklik_cifttel) {
                            $('#kulaklik_cifttel').prop('checked', true)
                        } else {
                            $('#kulaklik_cifttel').prop('checked', false)
                        }
                        if (urun_detay.kulaklik_suter) {
                            $('#kulaklik_suter').prop('checked', true)
                        } else {
                            $('#kulaklik_suter').prop('checked', false)
                        }
                        if (urun_detay.kulaklik_tipi) {
                            $('#kulaklik_tipi').prop('checked', true)
                        } else {
                            $('#kulaklik_tipi').prop('checked', false)
                        }
                        
                        
                        if (urun_detay.discount) {
                            $("#kulaklik_fiyat").val(urun_detay.price)
                            $("#kulaklik_discount_price").val(urun_detay.discount_price)
                        } else {
                            $("#kulaklik_fiyat").val(urun_detay.price)
                        }
                        
                        if (urun_detay.discount) {$("#kulaklik_discount").prop("checked",true);toggleDiv('kulaklik-div')} else {$("#kulaklik_discount").prop("checked",false)}
                        $("#kulaklik_guncelle").click(async function () {
                            
                            var la = await setProductUpdate(reso, urun_detay)
                            console.log(la)
                        })
                    }
                })
            } else if (tip == "telefon") {
                elems[5].click()
                elems[5].innerHTML="Telefon (Güncelleme modu) <a href='#' onclick='location.reload()'>Çık</a>"
                get_product_by_id(id).then((message) => {
                    if (message.status_code == 200) {
                        var reso = message.response.response
                        var urun_detay = JSON.parse(message.response.response.urun_data.replace(/\\/g,"\\\\").replace("\\n", ""))
                        console.log(reso)
                        console.log(urun_detay)

                        
                        $("#telefon_star").val(urun_detay.star_count)
                        $('#telefon_isim').val(reso.urun_isim)
                        $('#telefon_marka').val(urun_detay.telefon_marka)
                        $('#telefon_model').val(urun_detay.telefon_model)
                        $('#telefon_hafiza').val(urun_detay.telefon_hafiza)
                        $('#telefon_ram').val(urun_detay.telefon_ram)
                        $('#telefon_kamera_cozunurluk_arka').val(urun_detay.telefon_kamera_cozunurluk_arka)
                        $('#telefon_ekran_boyut').val(urun_detay.telefon_ekran_boyut)
                        $('#telefon_pil').val(urun_detay.telefon_pil)
                        $('#telefon_kamera_cozunurluk_on').val(urun_detay.telefon_kamera_cozunurluk_on)

                        if (urun_detay.discount) {
                            $("#telefon_fiyat").val(urun_detay.price)
                            $("#telefon_discount_price").val(urun_detay.discount_price)
                        } else {
                            $("#telefon_fiyat").val(urun_detay.price)
                        }
                        
                        if (urun_detay.discount) {$("#telefon_discount_price").prop("checked",true);toggleDiv('telefon-div')} else {$("#telefon_discount_price").prop("checked",false)}
                        $("#telefon_guncelle").click(async function () {
                            
                            var la = await setProductUpdate(reso, urun_detay)
                            console.log(la)
                        })
                    }
                })
            } else {
                console.log("unknown type")
            }
            

            
        }

        async function refresh_products(prods) {
            if (prods == null) {
                prods = await get_products();
            }
            if (prods.status_code == 200) {
                lastprods = prods;
                console.log("status 200")
                $("#urun_listesi").empty();
                prods.response.forEach(function (it) {
                    
                    var urun_detay = JSON.parse(it.urun_data.replace(/\s/g, "").replace(/\\/g,"\\\\").replace("\\n", ""))
                    
                    
                        $("#urun_listesi").append(`
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <figure class="card shadow">
                                    <a href="urunsayfaları/${it.urun_tipi}-urun.php?view=true&urun_id=${it.urun_id}" class="img-wrap">
                                        
                                        ${urun_detay.discount ? '<b class="badge bg-success">İndirim</b>' : ''}
                                        <img src="${urun_detay.big_picture}" alt="">
                                    </a>
                                    <figcaption class="info-wrap border-top">
                                        <div class="btn-group dropup float-end">
                                            <button type="button" class="btn btn-light btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#" onclick="remove_product(${it.urun_id})">Ürünü Sil</a></li>
                                                <li><a class="dropdown-item" href="#" onclick="update_product(${it.urun_id}, '${it.urun_tipi}')">Ürünü Güncelle</a></li>
                                            </ul>
                                        </div>
                                        <a href="" class="title text-truncate">
                                            ${it.urun_isim}
                                        </a>
                                        <div class="price-wrap">
                                            <span class="price">${urun_detay.price} TL</span>
                                            ${urun_detay.discount ? `<del cite="price-old">${urun_detay.discount_price} TL</del>` : ''}
                                            
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                        `)
                    
                    
                    
                }) 
                

                
            } else {
                console.log("status " + prods.status_code)
            }
        }

        async function add_product(type, name){
            var resp;
            if ($("#"+type+"_big_picture").get(0).files.length === 0 || $("#"+type+"_other_pictures").get(0).files.length === 0) {
                alert("En az 1 büyük ve 1 küçük resim eklemelisiniz")
                return
            }
            pdata = await hande_product_type(type, name);
            
            console.log(pdata)
            $.ajax({
                type: "POST",
                url: "api.php",
                dataType: "json",
                async: false,
                data: {
                    islem: "add_product",
                    product_type: type,
                    product_name: name,
                    product_data: pdata,
                },
                success: function(response){


                    resp = response;
                }
            });
            await refresh_products();
            return resp;
        }
        async function remove_product(id){
            
            $.ajax({
                type: "POST",
                url: "api.php",
                dataType: "json",
                async: false,
                data: {
                    islem: "remove_product",
                    urun_id: id
                },
                success: function(response){


                    resp = response;
                }
            });
            await refresh_products();
            return resp;
        }
        async function reklamlar_degis(reklamlar){
            var resp;
            var other_pictures = []
            var files = $('#reklamlar').prop('files');
            for (var i = 0; i < files.length; i++) {
                
                oldum = await readImage( $('#reklamlar'))
                
                other_pictures.push(oldum)
                
                removeFileFromFileList(i, 'reklamlar')
                
                
            }

            $.ajax({
                type: "POST",
                url: "api.php",
                dataType: "json",
                async: false,
                data: {
                    islem: "reklam_panosu",
                    reklam_panosu: `${other_pictures.join('DELIM')}`
                },
                success: function(response){


                    resp = response;
                }
            });
            
            return resp;
        }
        
        async function setProductUpdate(res, detay){
            var resp;
            
            
            if ($("#"+res.urun_tipi+"_big_picture").get(0).files.length === 0 || $("#"+res.urun_tipi+"_other_pictures").get(0).files.length === 0) {
                alert("En az 1 büyük ve 1 küçük resim eklemelisiniz")
                return
            }
            
            pdata = await hande_product_type(res.urun_tipi, res.urun_isim);
            

            $.ajax({
                type: "POST",
                url: "api.php",
                dataType: "json",
                async: false,
                data: {
                    islem: "update_product",
                    product_type: `${res.urun_tipi}`,
                    product_name: `${$("#"+res.urun_tipi+"_isim").val()}`,
                    product_data: pdata,
                    product_id: res.urun_id
                },
                success: function(response){


                    resp = response;
                }
            });
            if (resp.status_code == 200) {
                alert("Başarılı")
                await refresh_products();
            }
            return resp;
        }
        
        

        $("#monitor_ekle").click(async function (){
           
            monitor_isim = $("#monitor_isim").val()
            if (monitor_isim) {
                await add_product("monitor", monitor_isim)
                alert("Başarılı")
                
            } else {
                alert("isim boş bırakılamaz")
            }

        });
        $("#masaustu_ekle").click(async function (){
            masaustu_isim = $("#masaustu_isim").val()
            if (masaustu_isim) {
                await add_product("masaustu", masaustu_isim)
                alert("Başarılı")
                
            } else {
                alert("isim boş bırakılamaz")
            }
        })
        $("#telefon_ekle").click(async function (){
            telefon_isim = $("#telefon_isim").val()
            if (telefon_isim) {
                await add_product("telefon", telefon_isim)
                alert("Başarılı")
                
            } else {
                alert("isim boş bırakılamaz")
            }
        })
        $("#laptop_ekle").click(async function (){
            laptop_isim = $("#laptop_isim").val()
            if (laptop_isim) {
                await add_product("laptop", laptop_isim)
                alert("Başarılı")
                
            } else {
                alert("isim boş bırakılamaz")
            }
        })
        $("#saat_ekle").click(async function (){
            saat_isim = $("#saat_isim").val()
            if (saat_isim) {
                await add_product("saat", saat_isim)
                alert("Başarılı")
                
            } else {
                alert("isim boş bırakılamaz")
            }
        })
        $("#kulaklik_ekle").click(async function (){
            kulaklik_isim = $("#kulaklik_isim").val()
            if (kulaklik_isim) {
                await add_product("kulaklik", kulaklik_isim)
                alert("Başarılı")
                
            } else {
                alert("isim boş bırakılamaz")
            }
        })
        $("#reklam_panosunu_degis").click(async function (){
            reklamlar = $("#reklamlar").prop('files');
            if (reklamlar) {
                a = await reklamlar_degis()
                alert("Başarılı")
                location.reload()

                
            } else {
                alert("reklamlar boş bırakılamaz")
            }
        })
        $("#reklam_panosunu_temizle").click(async function (){
            $.ajax({
                type: "POST",
                url: "api.php",
                dataType: "json",
                async: false,
                data: {
                    islem: "reklam_panosu_temizle"
                },
                success: function(response){


                    alert("Başarılı");
                    location.reload()
                }
            });
        })

        $("form").submit(function(e){
            e.preventDefault();
        });
        
        $("#urun_ara").click(async function (){
           
           urun_ara_key = $("#urun_ara_key").val()
          if (urun_ara_key) {
              ad = await get_products_search(urun_ara_key)
              await refresh_products(ad)
              
          } else {
            await refresh_products();
          }
      
       });


        $( document ).ready(async function() {
            console.log( "ready!" );
            await refresh_products();
            await get_reklamlar();
            
        });
        

        async function urun_listele(tip) {
            t = await get_products_by_type(tip)
            await refresh_products(t)
        }
        async function hande_product_type(type, name) {
            if (type == "monitor"){
                star = $("#monitor_yildiz").val()
                price = $("#monitor_fiyat").val()

                hz = $("#monitor_hz").val()
                resolution = $("#monitor_resolution").val()
                internal_speaker = $("#monitor_speaker_var").is(":checked");
                
                screen_size = $("#monitor_size").val();
                reaction_time_ms = $("#reaction_time_ms").val()
                discount = $("#monitor_discount").prop('checked')
                
                var inputElement = $("#monitor_big_picture");
                readImage(inputElement).done(function(base64Data){
                    big_picture = base64Data;
                });

                
                discount_price = $("#monitor_discount_price").val()
                if (!discount_price) {
                    discount_price = 0
                }

                
                
                var other_pictures = []
                var files = $('#monitor_other_pictures').prop('files');
                for (var i = 0; i < files.length; i++) {
                    
                    oldum = await readImage( $('#monitor_other_pictures'))
                    
                    other_pictures.push(oldum)
                   
                    removeFileFromFileList(i, 'monitor_other_pictures')
                    
                    
                }
                pdata = `
                {
                    "star_count":${star},
                    "price":"${price}",
                    "monitor_hz":${hz},
                    "resolution":"${resolution}",
                    "internal_speaker":${internal_speaker},
                    "screen_size":"${screen_size}",
                    "reaction_time_ms":${reaction_time_ms},
                    "big_picture":"${big_picture}",
                    "other_pictures":"${other_pictures.join('DELIM')}",
                    "discount":${discount},
                    "discount_price":"${discount_price}"
                }`

            } else if (type == "masaustu"){
                star = $("#masaustu_yildiz").val()
                price = $("#masaustu_fiyat").val()

                
                
                
                
                var inputElement = $("#masaustu_big_picture");
                readImage(inputElement).done(function(base64Data){
                    big_picture = base64Data;
                });

                
                discount_price = $("#masaustu_discount_price").val()
                if (!discount_price) {
                    discount_price = 0
                }

                
                
                var other_pictures = []
                var files = $('#masaustu_other_pictures').prop('files');
                for (var i = 0; i < files.length; i++) {
                    
                    oldum = await readImage( $('#masaustu_other_pictures'))
                    
                    other_pictures.push(oldum)
                   
                    removeFileFromFileList(i, 'masaustu_other_pictures')
                    
                    
                }
                pdata = 
                `{
                    "star_count":${star},
                    "price":"${price}",
                    "masaustu_os":"${$('#masaustu_os').val()}",
                    "masaustu_cpu":"${$('#masaustu_cpu').val()}",
                    "masaustu_ssd":${$('#masaustu_ssd').val()},
                    "masaustu_ram":${$('#masaustu_ram').val()},
                    "masaustu_hdd":${$('#masaustu_hdd').val()},
                    "masaustu_gpu_type":"${$('#masaustu_gpu_type').val()}",
                    "masaustu_gpu":"${$('#masaustu_gpu').val()}",
                    "big_picture":"${big_picture}",
                    "other_pictures":"${other_pictures.join('DELIM')}",
                    "discount":${$('#masaustu_discount').prop('checked')},
                    "discount_price":"${discount_price}"
                }`
                
            } else if (type == "telefon"){
                star = $("#telefon_star").val()
                price = $("#telefon_fiyat").val()

                
                
                
                
                var inputElement = $("#telefon_big_picture");
                readImage(inputElement).done(function(base64Data){
                    big_picture = base64Data;
                });

                
                discount_price = $("#telefon_discount_price").val()
                if (!discount_price) {
                    discount_price = 0
                }

                
                
                var other_pictures = []
                var files = $('#telefon_other_pictures').prop('files');
                for (var i = 0; i < files.length; i++) {
                    
                    oldum = await readImage( $('#telefon_other_pictures'))
                    
                    other_pictures.push(oldum)
                   
                    removeFileFromFileList(i, 'telefon_other_pictures')
                    
                    
                }
                pdata = 
                `{
                    "star_count":${star},
                    "price":"${price}",
                    "telefon_marka":"${$('#telefon_marka').val()}",
                    "telefon_model":"${$('#telefon_model').val()}",
                    "telefon_hafiza":"${$('#telefon_hafiza').val()}",
                    "telefon_ram":"${$('#telefon_ram').val()}",
                    "telefon_kamera_cozunurluk_arka":"${$('#telefon_kamera_cozunurluk_arka').val()}",
                    "telefon_ekran_boyut":"${$('#telefon_ekran_boyut').val()}",
                    "telefon_pil":"${$('#telefon_pil').val()}",
                    "telefon_kamera_cozunurluk_on":"${$('#telefon_kamera_cozunurluk_on').val()}",
                    "big_picture":"${big_picture}",
                    "other_pictures":"${other_pictures.join('DELIM')}",
                    "discount":${$('#telefon_discount').prop('checked')},
                    "discount_price":"${discount_price}"
                }`
            } else if (type == "laptop"){
                star = $("#laptop_star").val()
                price = $("#laptop_fiyat").val()

                
                
                
                
                var inputElement = $("#laptop_big_picture");
                readImage(inputElement).done(function(base64Data){
                    big_picture = base64Data;
                });

                
                discount_price = $("#laptop_discount_price").val()
                if (!discount_price) {
                    discount_price = 0
                }

                
                
                var other_pictures = []
                var files = $('#laptop_other_pictures').prop('files');
                for (var i = 0; i < files.length; i++) {
                    
                    oldum = await readImage( $('#laptop_other_pictures'))
                    
                    other_pictures.push(oldum)
                   
                    removeFileFromFileList(i, 'laptop_other_pictures')
                    
                    
                }
                pdata = 
                `{
                    "star_count":${star},
                    "price":"${price}",
                    "laptop_os":"${$('#laptop_os').val()}",
                    "laptop_cpu":"${$('#laptop_cpu').val()}",
                    "laptop_ssd":"${$('#laptop_ssd').val()}",
                    "laptop_ram":"${$('#laptop_ram').val()}",
                    "laptop_hdd":"${$('#laptop_hdd').val()}",
                    "laptop_screen_size":"${$('#laptop_screen_size').val()}",
                    "laptop_gpu":"${$('#laptop_gpu').val()}",
                    "big_picture":"${big_picture}",
                    "other_pictures":"${other_pictures.join('DELIM')}",
                    "discount":${$('#laptop_discount').prop('checked')},
                    "discount_price":"${discount_price}"
                }`
            } else if (type == "kulaklik"){
                star = $("#kulaklik_star").val()
                price = $("#kulaklik_fiyat").val()

                
                
                
                
                var inputElement = $("#kulaklik_big_picture");
                readImage(inputElement).done(function(base64Data){
                    big_picture = base64Data;
                });

                
                discount_price = $("#kulaklik_discount_price").val()
                if (!discount_price) {
                    discount_price = 0
                }

                
                
                var other_pictures = []
                var files = $('#kulaklik_other_pictures').prop('files');
                for (var i = 0; i < files.length; i++) {
                    
                    oldum = await readImage( $('#kulaklik_other_pictures'))
                    
                    other_pictures.push(oldum)
                   
                    removeFileFromFileList(i, 'kulaklik_other_pictures')
                    
                    
                }
                pdata = 
                `{
                    "star_count":${star},
                    "price":"${price}",
                    "kulaklik_marka":"${$('#kulaklik_marka').val()}",
                    "kulaklik_tur":"${$('#kulaklik_tur').val()}",
                    "kulaklik_bt":"${$('#kulaklik_bt').val()}",
                    "kulaklik_cifttel":${$('#kulaklik_cifttel').prop('checked')},
                    "kulaklik_suter":${$('#kulaklik_suter').prop('checked')},
                    "kulaklik_tipi":${$('#kulaklik_tipi').prop('checked')},
                    "big_picture":"${big_picture}",
                    "other_pictures":"${other_pictures.join('DELIM')}",
                    "discount":${$('#kulaklik_discount').prop('checked')},
                    "discount_price":"${discount_price}"
                }`
            } else if (type == "saat"){
                star = $("#saat_star").val()
                price = $("#saat_fiyat").val()

                
                
                
                
                var inputElement = $("#saat_big_picture");
                readImage(inputElement).done(function(base64Data){
                    big_picture = base64Data;
                });

                
                discount_price = $("#saat_discount_price").val()
                if (!discount_price) {
                    discount_price = 0
                }

                
                
                var other_pictures = []
                var files = $('#saat_other_pictures').prop('files');
                for (var i = 0; i < files.length; i++) {
                    
                    oldum = await readImage( $('#saat_other_pictures'))
                    
                    other_pictures.push(oldum)
                   
                    removeFileFromFileList(i, 'saat_other_pictures')
                    
                    
                }
                pdata = 
                `{
                    "star_count":${star},
                    "price":"${price}",
                    "saat_marka":"${$('#saat_marka').val()}",
                    "saat_adim":${$('#saat_adim').prop('checked')},
                    "saat_kamera":${$('#saat_kamera').prop('checked')},
                    "saat_su":${$('#saat_su').prop('checked')},
                    "saat_uyku":${$('#saat_uyku').prop('checked')},
                    "saat_sesli":${$('#saat_sesli').prop('checked')},
                    "saat_kalp":${$('#saat_kalp').prop('checked')},
                    "saat_gps":${$('#saat_gps').prop('checked')},
                    "big_picture":"${big_picture}",
                    "other_pictures":"${other_pictures.join('DELIM')}",
                    "discount":${$('#saat_discount').prop('checked')},
                    "discount_price":"${discount_price}"
                }`
            } else {
                return "ERDEN BIR OR"
            }
            return pdata

        }

        
            
        
    </script>
</body>
</html>
<?php
}
?>