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
                            Sepetim
                        </li>
                    </ol>
                </nav>
            </div>
        </section>
    </header>

    <!--Sepet İşlemleri -->
    <section class="py-4 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <aside class="col-lg-6" id="sepet_listesi">
                    <div class="alert alert-primary" role="alert">
                        <i class="fa-solid fa-triangle-exclamation"></i> Ürünleriniz <b>Aras Kargo</b> ile <b> hesabınızdaki adres'e</b> gönderilecektir.
                    </div>
                    
                    
                </aside>
                <aside class="col-lg-3">
                    <form style="height: 541px;" class="">
                        <div class="mb-3 mt-3">
                            <label for="kartisim" class="form-label">Kart Üzerindeki İsim</label>
                            <input type="text" class="form-control" id="kartisim" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="kartnumara" class="form-label">Kart Numarası</label>
                            <input type="text" class="form-control" id="kartnumara" aria-describedby="emailHelp" required>
                        </div>
                        <div class="d-flex mb-3 mt-3">
                            <div class="col-7 me-3">
                                <label for="karttarih" class="form-label">Son Kullanma Tarihi</label>
                                <input type="text" class="form-control" id="karttarih" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-4">
                                <label for="kartguvenlik" class="form-label">Güvenlik Kodu</label>
                                <input type="text" class="form-control" id="kartguvenlik" aria-describedby="emailHelp" required>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="validatePaymentInputs()" id="siparis_ver">Sipariş Ver</button>
                    </form>
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
        var randomsi = [];
        
        function validatePaymentInputs(){
            return 1;
        }

        function makeid(length) {
            let result = '';
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            const charactersLength = characters.length;
            let counter = 0;
            while (counter < length) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
            counter += 1;
            }
            return result;
        }

        $("form").submit(function(e){
            e.preventDefault();
        });

        $( document ).ready(async function() {
            console.log( "ready!" );
            await refresh_products();
            let defaults = {};
        
            randomsi.forEach(function (i) {
                defaults["#"+i+"_fiyat"] = parseFloat($("#"+i+"_fiyat").text())
                
                $("#"+i+"_arti").click(function () {
                    if (parseInt($("#"+i).text()) < 9) {
                        let up = (parseFloat($("#"+i+"_fiyat").text()) + defaults['#'+i+"_fiyat"]).toFixed(3)
                        $("#"+i+"_fiyat").text(up)
                        $("#"+i).text(parseInt($("#"+i).text()) + 1)
                    }
                })
                $("#"+i+"_eksi").click(function () {
                    if (parseInt($("#"+i).text()) > 1) {
                        let down = (parseFloat($("#"+i+"_fiyat").text()) - defaults['#'+i+"_fiyat"]).toFixed(3)
                        $("#"+i+"_fiyat").text(down)
                        $("#"+i).text(parseInt($("#"+i).text()) - 1)
                    }
                })
            });
        });
        
        
        $("#siparis_ver").click(async function () {
            var id_json = {}
            randomsi.forEach(function (i) {
                
                id = i.split("DELIM")[1]
                miktar = $("#"+i).text()
                id_json[id] = parseInt(miktar)
                
            })
            
            await siparis(id_json)
            alert("başarılı")
            location.href = 'siparisler.php'
        })
        
        async function siparis(id_array){
            var resp;
            $.ajax({
                type: "POST",
                url: "api.php",
                dataType: "json",
                async: false,
                data: {
                    islem: "siparis_ver",
                    urunler: id_array
                },
                success: function(response){


                    resp = response;
                }

            });
            return resp;
        }


       
        
        async function refresh_products(prods = null) {
            if (prods == null) {
                prods = await get_products();
            }
            
            
            if (prods.status_code == 200) {
                <?php 
                    if (isset($_SESSION['sepet'])) {
                        echo "var favoriler = ".json_encode($_SESSION['sepet']);
                        
                    } else {
                        echo "var favoriler = null";
                    }
                ?>;

                //$("#sepet_listesi").empty();
                if (!favoriler || favoriler == [] ||favoriler.length == 0) {console.log("mp");return;}
                prods.response.forEach(function (it) {
                    
                    if (favoriler.includes(it.urun_id)) {
                        let r = makeid(6);
                        r = r+"DELIM"+it.urun_id+"DELIM"
                        randomsi.push(r)
                        
                        var urun_detay = JSON.parse(it.urun_data.replace(/\s/g, "").replace(/\\/g,"\\\\").replace("\\n", ""))
                        $("#sepet_listesi").append(`
                        <div class="card mb-3">
                            <div class="row g-0">
                            <div class="col-md-4">
                                <a href="urunsayfaları/${it.urun_tipi}-urun.php?view=true&urun_id=${it.urun_id}" class="img-wrap">
                                        
                                    ${urun_detay.discount ? '<b class="badge bg-success">İndirim</b>' : ''}
                                    <img src="${urun_detay.big_picture}" alt="">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <a href="" class="title fw-bold text-truncate">
                                        ${it.urun_isim}
                                    </a>
                                    <div class="price-wrap mt-3">
                                        <span class="price" id="${r}_fiyat">${urun_detay.price} TL</span>
                                        ${urun_detay.discount ? `<del cite="price-old">${urun_detay.discount_price} TL</del>` : ''}
                                    </div>
                                    <div class="d-flex border mt-3" style="width: 80px;">
                                        <button id="${r}_eksi" style="border : none"><i class="fa-solid fa-minus"></i></button>
                                        <h5 class="border px-2" style="margin-top: 8px;" id="${r}">1</h5>
                                        <button id="${r}_arti" style="border : none"><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                    <button class="btn btn-danger mt-4" onclick='sepete_ekle(${it.urun_id});location.reload()'>Ürünü Kaldır</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        `)
                        
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


        // Şifre Gösterme
        function sifreGoster(sifreInputId, sifreButtonId) {
            var sifreInput = document.getElementById(sifreInputId);
            var sifreButton = document.getElementById(sifreButtonId);
            if (sifreInput.type === "password") {
                sifreInput.type = "text";
                sifreButton.innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
            } else {
                sifreInput.type = "password";
                sifreButton.innerHTML = '<i class="fa-regular fa-eye"></i>';
            }
        }


        // Sepetteki Ürünü Arttırma
        // let sayac = 0;
        // const artiBtn = document.querySelector('.artı');
        // const eksiBtn = document.querySelector('.eksi');
        // const h5Sayi = document.querySelector('h5');
        // const fiyat1 = document.querySelector('.fiyat');
        // const fiyat2 = document.querySelector('.fiyat2');

        // let urunFiyati = fiyat1.innerHTML; 

        // function arttirAzalt(islem) {
        //     if (islem === "arttir") {
        //         if (sayac < 9){
        //             sayac++;
        //         }
        //     } else if (islem === "azalt") {
        //         if (sayac > 1) {
        //             sayac--;
        //         }
        //     }
        //     h5Sayi.textContent = sayac;
        //     fiyatGuncelle();
        // } 

        // function fiyatGuncelle() {
        //     let toplamFiyat = urunFiyati * sayac;
        //     fiyat1.innerHTML = toplamFiyat;
        // }
        // artiBtn.addEventListener('click', () => arttirAzalt("arttir"));
        // eksiBtn.addEventListener('click', () => arttirAzalt("azalt"));



        // Kart Karakter Uzunluğu
        function formatCardDetails() {
            const cardNumberInput = document.getElementById('kartnumara');
            const expiryDateInput = document.getElementById('karttarih');
            const securityCodeInput = document.getElementById('kartguvenlik');

            cardNumberInput.addEventListener('input', function (event) {
                const target = event.target;
                const cardNumber = target.value.replace(/[^\d]/g, '').substring(0, 16);
                const formattedCardNumber = cardNumber.replace(/(.{4})/g, '$1-');
                target.value = formattedCardNumber.substring(0, Math.min(formattedCardNumber.length, 19));
            });

            expiryDateInput.addEventListener('input', function (event) {
                const target = event.target;
                const expiryDate = target.value.replace(/[^\d]/g, '').substring(0, 4);
                const formattedExpiryDate = expiryDate.replace(/(.{2})/g, '$1/');
                target.value = formattedExpiryDate.substring(0, Math.min(formattedExpiryDate.length, 5));
            });

            
            securityCodeInput.addEventListener('input', function (event) {
                const target = event.target;
                const securityCode = target.value.replace(/[^\d]/g, '').substring(0, 3);
                target.value = securityCode;
            });
        }
        window.onload = function() {
        formatCardDetails();
        };


    </script>
</body>
</html>
<?php } ?>