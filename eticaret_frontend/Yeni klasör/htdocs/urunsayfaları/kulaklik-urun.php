<?php
include "../database.php";
session_start();
if (isset($_GET['view'])) {
    $stmt = $conn->prepare("SELECT urunler.* , urun_detay.* FROM urunler, urun_detay WHERE urunler.urun_id = :id and urun_detay.id = :id");
    $stmt->execute(array(
        "id" => $_GET["urun_id"]
    ));

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();
    
    $res = json_decode($result['urun_data']);
    
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
    <link rel="stylesheet" href="../css/style.css">

</head>
<body class="bg-light">
    <header>
        <section class="top-bar">
            <div class="container">
                <div class="row align-items-center gy-3">
                    
                    <div class="col-lg-2 col-sm-4 col-4">
                        <a href="../index.php" class="navbar-brand">E-Commerce</a>
                    </div>
                    
                    <div class="order-lg-last col-lg-5 col-sm-8 col-8">
                        <div class="text-end">
                            <?php 
                            if (isset($_SESSION['user_info']['isim'])) {
                                if ($_SESSION['user_info']['isim'] == "admin") {
                                    echo '<a href="../login.php" class="btn btn-light">
                                    <i class="fa fa-user"></i> <span class="ms-1 d-none d-sm-inline-block">Admin</span>
                                </a>
                                ';
                                } else {
                                    echo '<a href="../login.php" class="btn btn-light">
                                    <i class="fa fa-user"></i> <span class="ms-1 d-none d-sm-inline-block">Hesabım</span>
                                </a>
                                <a href="../listem.php" class="btn btn-light">
                                    <i class="fa fa-heart"></i> <span class="ms-1 d-none d-sm-inline-block">Listem</span>
                                </a>
                                <a href="../sepetim.php" class="btn btn-light">
                                    <i class="fa fa-shopping-cart"></i><span class="ms-1 d-none d-sm-inline-block">Sepetim</span>
                                </a>';
                                }
                            }
                            ?>
                            
                        </div>
                    </div>

                    <div class="col-lg-5 col-12">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Anahtar Kelime">
                                <button class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="bg-primary p-3">
            <div class="container">
                <nav class="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="../index.php">Anasayfa</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Kulaklık</a>
                        </li>
                        <li class="breadcrumb-item active">
                        <?php echo $result["urun_isim"]; ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </section>
    </header>

    <section class="py-4">
        <div class="container">
            <div class="row">
                <aside class="col-lg-5">
                    <div class="gallery-wrap">
                        <div class="img-big-wrap img-thumbnail">
                        <a data-fslightbox="mygallery" href="<?php echo $res->big_picture; ?>">
                                <img src="<?php echo $res->big_picture; ?>" alt="">
                            </a>
                        </div>
                        <div class="thumbs-wrap">
                            <?php 
                                $otherpics = explode("DELIM", $res->other_pictures);
                                foreach ($otherpics as $value) {
                                    echo '<a data-fslightbox="mygallery" href="'.$value.'">';
                                    echo '<img width="60" height="60" src="'.$value.'" alt="">';
                                    echo '</a>';
                                }
                            ?>
                        </div>
                    </div>
                </aside>
                <main class="col-lg-7">
                    <article>
                        <h4 class="title text-dark">
                            <?php echo $result["urun_isim"]; ?>
                        </h4>
                        <div class="rating-wrap">
                            <?php
                                $default_val = 5;
                                $sub_count = $default_val - $res->star_count;
                            
                                for ($x = 0; $x <= ($res->star_count - 1); $x++) {
                                    echo '<span class="fa fa-star checked"></span>';
                                }
                                for ($x = 0; $x <= $sub_count - 1; $x++) {
                                    echo '<span class="fa fa-star"></span>';
                                }
                            ?>
                        </div>
                        <p class="text-success">stokta</p>
                        <div class="mb-3">
                            <b class="price h5"><?php echo $res->price;?> TL</b>
                            <?php
                                if ($res->discount) {
                                    echo '<del cite="price-old">'.$res->discount_price.' TL</del>';
                                }
                            ?>
                        </div>

                        <dl class="row border-bottom">
                            <dt class="col-sm-3">Marka</dt>
                            <dd class="col-sm-9"><?php echo $res->kulaklik_marka; ?></dd>
                            <dt class="col-sm-3">Tür</dt>
                            <dd class="col-sm-9"><?php echo $res->kulaklik_tur; ?></dd>
                            <dt class="col-sm-3">Çift Telefon Desteği</dt>
                            <dd class="col-sm-9"><?php if($res->kulaklik_cifttel != "false"){echo "Var";}else{echo "Yok";}?></dd>
                            <dt class="col-sm-3">Suya & Tere Dayanıklı</dt>
                            <dd class="col-sm-9"><?php if($res->kulaklik_suter != "false"){echo "Evet";}else{echo "Hayır";}?></dd>
                            <dt class="col-sm-3">Bluetooth Versiyon</dt>
                            <dd class="col-sm-9"><?php echo $res->kulaklik_bt; ?></dd>
                            <dt class="col-sm-3">Kullanım Tipi</dt>
                            <dd class="col-sm-9"><?php if($res->kulaklik_tipi != "false"){echo "Kulak İçi";}else{echo "Kulak Üstü";}?></dd>
                        </dl>
                        <div class="buttons">
                            <a href="#" class="btn btn-warning" onclick="if (<?php if (isset($_SESSION['loggedin'])) {echo 1;} else {echo 0;}?> == 1) {sepete_ekle('<?php echo $_GET['urun_id']; ?>');location.reload()} else {location.href='../login.php'}">
                                
                                <?php 
                                    if (isset($_SESSION['sepet']) && in_array(intval($_GET['urun_id']), $_SESSION['sepet'])) {
                                        echo '<i class="fa fa-shopping-basket me-1" style="color: #6610f2"></i> Sepetten Çıkar';
                                    } else {
                                        echo '<i class="fa fa-shopping-basket me-1"></i>Sepete Ekle';
                                    }
                                ?>
                            </a>
                            <a href="#" class="btn btn-warning" onclick="if (<?php if (isset($_SESSION['loggedin'])) {echo 1;} else {echo 0;}?> == 1) {favorilere_ekle('<?php echo $_GET['urun_id']; ?>');location.reload()} else {location.href='../login.php'}">
                                <?php 
                                    if (isset($_SESSION['sepet']) && in_array(intval($_GET['urun_id']), $_SESSION['favoriler'])) {
                                        echo '<i class="fa fa-heart me-1" style="color: #6610f2"></i> Listeden Çıkar';
                                    } else {
                                        echo '<i class="fa fa-heart me-1"></i> Listeye Ekle';
                                    }
                                ?>
                                
                            </a>
                        </div>
                    </article>
                </main>
            </div>
        </div>
    </section>

    <section class="py-4">
        <div class="container">
            <header class="section-heading">
                <h4 class="mb-3">Bu ürüne bakanlar bu ürünlere de baktılar.</h4>
            </header>
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <figure class="card shadow">
                        <div class="img-wrap">
                            <a href="#">
                                <span class="topbar">
                                    <a href="#" class="float-end">
                                        <i class="fa fa-regular fa-heart fa-lg"></i>
                                    </a>
                                </span>
                                <img src="../Resimler/1.jpeg" alt="">
                            </a>
                        </div>
                        <figcaption class="info-wrap border-top">
                            <a href="" class="title">
                                Apple Watch Yıldız Işığı
                                <div class="price-wrap mb-3">
                                    <span class="price">6.599</span>
                                    <del cite="price-old">6.999</del>
                                </div>
                                <a href="#" class="btn btn-outline-primary w-100">Sepete Ekle</a>
                            </a>

                            
                        </figcaption>
                    </figure>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <figure class="card shadow">
                        <div class="img-wrap">
                            <a href="#">
                                <span class="topbar">
                                    <a href="#" class="float-end">
                                        <i class="fa fa-regular fa-heart fa-lg"></i>
                                    </a>
                                </span>
                                <img src="../Resimler/2.jpeg" alt="">
                            </a>
                        </div>
                        <figcaption class="info-wrap border-top">
                            <a href="" class="title">
                                Apple Watch Yıldız Işığı
                                <div class="price-wrap mb-3">
                                    <span class="price">6.599</span>
                                    <del cite="price-old">6.999</del>
                                </div>
                                <a href="#" class="btn btn-outline-primary w-100">Sepete Ekle</a>
                            </a>

                            
                        </figcaption>
                    </figure>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <figure class="card shadow">
                        <div class="img-wrap">
                            <a href="#">
                                <span class="topbar">
                                    <a href="#" class="float-end">
                                        <i class="fa fa-regular fa-heart fa-lg"></i>
                                    </a>
                                </span>
                                <img src="../Resimler/3.jpeg" alt="">
                            </a>
                        </div>
                        <figcaption class="info-wrap border-top">
                            <a href="" class="title">
                                Apple Watch Yıldız Işığı
                                <div class="price-wrap mb-3">
                                    <span class="price">6.599</span>
                                    <del cite="price-old">6.999</del>
                                </div>
                                <a href="#" class="btn btn-outline-primary w-100">Sepete Ekle</a>
                            </a>

                            
                        </figcaption>
                    </figure>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <figure class="card shadow">
                        <div class="img-wrap">
                            <a href="#">
                                <span class="topbar">
                                    <a href="#" class="float-end">
                                        <i class="fa fa-regular fa-heart fa-lg"></i>
                                    </a>
                                </span>
                                <img src="../Resimler/4.jpeg" alt="">
                            </a>
                        </div>
                        <figcaption class="info-wrap border-top">
                            <a href="" class="title">
                                Apple Watch Yıldız Işığı
                                <div class="price-wrap mb-3">
                                    <span class="price">6.599</span>
                                    <del cite="price-old">6.999</del>
                                </div>
                                <a href="#" class="btn btn-outline-primary w-100">Sepete Ekle</a>
                            </a>

                            
                        </figcaption>
                    </figure>
                </div>
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

    
    <script src="../fslightbox.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="../js/funcs.js"></script>
</body>
</html>
<?php
} else {
    echo "view not set";
}
?>