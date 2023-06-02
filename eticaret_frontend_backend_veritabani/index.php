<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    echo "isset";
    header("Location: kullanici.php");
    die();
} else if (!empty($_SESSION['loggedin'])) {
    echo "empty";
    header("Location: kullanici.php");
    die();
}

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
                        <div class="text-end">
                            <a href="login.php" class="btn btn-light">
                                <i class="fa fa-user"></i> <span class="ms-1 d-none d-sm-inline-block">Hesabım</span>
                            </a>
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
    <script
  src="https://code.jquery.com/jquery-3.6.4.js"
  integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
  crossorigin="anonymous"></script>

  <script
  src="js/funcs.js"></script>

  <script>
        $("form").submit(function(e){
            e.preventDefault();
        });

        $( document ).ready(async function() {
            console.log( "ready!" );
            await refresh_products();
            await get_reklamlar();
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

        

       
        async function urun_listele(tip) {
            t = await get_products_by_type(tip)
            await refresh_products(t)
        }

        async function refresh_products(prods = null) {
            if (prods == null) {
                prods = await get_products();
            }
            
            
            if (prods.status_code == 200) {
                
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
                                <a href="login.php" class="float-end btn btn-light btn-icon">
                                    <i class="fa fa-heart"></i>
                                </a>
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
        </script>
        <script>
            var links = document.getElementsByTagName("a");
            for (var i = 0; i < links.length; i++) {
            links[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
            }
        </script>
</body>
</html>
