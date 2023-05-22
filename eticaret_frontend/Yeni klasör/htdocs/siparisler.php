<?php
include "database.php";
session_start();
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != TRUE) {
    header("Location: login.php");
    die();
} else {
    
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
                                    <i class="fa fa-user"></i><span class="ms-1 d-none d-sm-inline-block"><?php echo $_SESSION['user_info']['isim'];?></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="hesapislemleri.php">Hesap İşlemleri</a></li>
                                    <li><a class="dropdown-item" href="siparisler.php">Siparişler</a></li>
                                    <li><a class="dropdown-item" href="destroy.php">Çıkış Yap</a></li>
                                </ul>
                            </div>
                            <a href="listem.php" class="btn btn-light">
                                <i class="fa fa-heart"></i> <span class="ms-1 d-none d-sm-inline-block">Listem</span>
                            </a>
                            <a href="sepetim.php" class="btn btn-light">
                                <i class="fa fa-shopping-cart"></i><span class="ms-1 d-none d-sm-inline-block">Sepetim</span>
                            </a>
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
                            <a href="index.php">Anasayfa</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Siparişler
                        </li>
                    </ol>
                </nav>
            </div>
        </section>
    </header>

    <!--Siparişler İşlemleri -->
    <section class="py-4 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <aside class="col-lg-10" style="min-height: 557px;" id="siparis_listesi">
                    
                    
                </aside>
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
    <script src="js/funcs.js"></script>
    <script>
        

        $("form").submit(function(e){
            e.preventDefault();
        });

        $( document ).ready(async function() {
            var isadmin = 0;
            console.log( "ready!" );
            <?php 
            if ($_SESSION['user_info']['isim'] == 'admin') {
                echo 'isadmin = 1;';
            }
            ?>
            if (isadmin == 1) {
                var ey = await getAllSiparisler()
                console.log(ey)
                if (ey.status_code == 200) {
                    await printAllSiparisler(ey.response);
                } else {
                    alert("Bir Hata oluştu");
                }
            } else {
                await refresh_products();
            }
            
            
        });
        
        async function printAllSiparisler(s) {
            
            for(var k in s) {
                let val = s[k]
                let addr = val.adres
                let email = val.email
                let isim = val.isim
                let soyisim = val.soyisim
                let siparisler = val.siparisler
                for(var id in siparisler) {
                    let handle = siparisler[id]
                    let detay = handle.detay
                    let sup = handle.s
                    var urun_detay = JSON.parse(detay.urun_data.replace(/\s/g, "").replace(/\\/g,"\\\\").replace("\\n", ""))
                    $("#siparis_listesi").append(`
                        <div class="card mb-3">
                            <div class="row g-0">
                            <div class="col-md-4">
                                <a href="urunsayfaları/${detay.urun_tipi}-urun.php?view=true&urun_id=${detay.urun_id}" class="img-wrap">
                                    ${urun_detay.discount ? '<b class="badge bg-success">İndirim</b>' : ''}
                                    <img src="${urun_detay.big_picture}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <a href="" class="title fw-bold text-truncate">
                                        ${detay.urun_isim}
                                    </a>
                                    <dl class="row mt-2 border p-3">
                                        <dt class="col-sm-3">İsim Soyisim</dt>
                                        <dd class="col-sm-9">${isim} ${soyisim}</dd>
                                        <dt class="col-sm-3">E-mail</dt>
                                        <dd class="col-sm-9">${email}</dd>
                                        <dt class="col-sm-3">Ürün Fiyatı</dt>
                                        <dd class="col-sm-9">${sup.urun_fiyat} TL</dd>
                                        <dt class="col-sm-3">Adet</dt>
                                        <dd class="col-sm-9">${sup.miktar}</dd>
                                        <dt class="col-sm-3">Toplam Fiyat</dt>
                                        <dd class="col-sm-9">${sup.toplam_fiyat} TL</dd>
                                        <dt class="col-sm-3">Adres</dt>
                                        <dd class="col-sm-9">${sup.adres}</dd>
                                        <dt class="col-sm-3">Siparis Tarihi</dt>
                                        <dd class="col-sm-9">${sup.tarih}</dd>
                                    </dl>
                                </div>
                            </div>
                            </div>
                        </div>`)
                }
                
                
                
            }
            
        }
        
        async function refresh_products(prods = null) {
            if (prods == null) {
                prods = await get_products();
            }
            
            
            if (prods.status_code == 200) {
                var count = 0;
                <?php 
                    if (isset($_SESSION['siparisler'])) {
                        echo "var favoriler = ".json_encode($_SESSION['siparisler']);
                        
                    } else {
                        echo "var favoriler = null";
                    }
                ?>;

                $("#siparis_listesi").empty();
                if (!favoriler || favoriler == [] ||favoriler.length == 0) {console.log("mp");return;}
                prods.response.forEach(function (it) {
                    if (favoriler.some(e => e.id == it.urun_id)) {

                        var urun_detay = JSON.parse(it.urun_data.replace(/\s/g, "").replace(/\\/g,"\\\\").replace("\\n", ""))
                        $("#siparis_listesi").append(`
                        <div class="card mb-3">
                            <div class="row g-0">
                            <div class="col-md-4">
                                <a href="urunsayfaları/${it.urun_tipi}-urun.php?view=true&urun_id=${it.urun_id}" class="img-wrap">
                                    ${urun_detay.discount ? '<b class="badge bg-success">İndirim</b>' : ''}
                                    <img src="${urun_detay.big_picture}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <a href="" class="title fw-bold text-truncate">
                                        ${it.urun_isim}
                                    </a>
                                    <dl class="row mt-2 border p-3">
                                        <dt class="col-sm-3">Ürün Fiyatı</dt>
                                        <dd class="col-sm-9">${favoriler[count].urun_fiyat} TL</dd>
                                        <dt class="col-sm-3">Adet</dt>
                                        <dd class="col-sm-9">${favoriler[count].miktar}</dd>
                                        <dt class="col-sm-3">Toplam Fiyat</dt>
                                        <dd class="col-sm-9">${favoriler[count].toplam_fiyat} TL</dd>
                                        <dt class="col-sm-3">Adres</dt>
                                        <dd class="col-sm-9">${favoriler[count].adres}</dd>
                                        <dt class="col-sm-3">Siparis Tarihi</dt>
                                        <dd class="col-sm-9">${favoriler[count].tarih}</dd>
                                    </dl>
                                </div>
                            </div>
                            </div>
                        </div>`)
                        count++;
                        
                    }
                    

                    
                }) 
                

                
            } else {
                console.log("status " + prods.status_code)
            }
        }
        
        </script>
    <script>

        // Div Gizleme
        function toggleDiv(id) {
            const div = document.getElementById(id);
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        }

    </script>
</body>
</html>
<?php } ?>