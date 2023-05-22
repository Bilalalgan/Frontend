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
                            
                            <?php if ($_SESSION['user_info']['isim'] != "admin") {
                                echo '<button class="btn btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-user"></i><span class="ms-1 d-none d-sm-inline-block">'.$_SESSION["user_info"]["isim"].'</span>
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
                                        ';
                            } else {
                                echo '
                                <button class="btn btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user"></i><span class="ms-1 d-none d-sm-inline-block">Admin</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item" onclick="hesapIslemleri(\'hesapislemleri\',\'urunkismi\',\'sliderkisim\')">Hesap İşlemleri</button></li>
                                    <li><a class="dropdown-item" href="destroy.php">Çıkış Yap</a></li>
                                </ul>
                                </div>
                                
                                ';   
                            }?>
                            
                            
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
                            Hesap İşlemleri
                        </li>
                    </ol>
                </nav>
            </div>
        </section>
    </header>

    <!--Hesap İşlemleri -->
    <section class="py-4 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <aside class="col-lg-6">
                    <form style="height: 541px;">
                        <div class="mb-3 mt-3">
                            <label for="hesap_isim" class="form-label">İsim</label>
                            <input type="text" class="form-control" id="hesap_isim" aria-describedby="emailHelp" value="<?php echo $_SESSION['user_info']['isim']; ?>" <?php if ($_SESSION['user_info']['isim'] == 'admin') {echo 'disabled';} ?> required>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="hesap_soyisim" class="form-label">Soyisim</label>
                            <input type="text" class="form-control" id="hesap_soyisim" aria-describedby="emailHelp" value="<?php echo $_SESSION['user_info']['soyisim']; ?>" <?php if ($_SESSION['user_info']['isim'] == 'admin') {echo 'disabled';} ?> required>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="hesap_adres" class="form-label">Adres</label>
                            <input type="email" class="form-control" id="hesap_adres" value="<?php echo $_SESSION['user_info']['adres']; ?>" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="hesap_mail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="hesap_mail" value="<?php echo $_SESSION['user_info']['email']; ?>" aria-describedby="emailHelp" required>
                            <div id="emailHelp" class="form-text">Lütfen e-postanızı giriniz.</div>
                        </div>
                        <div class="mb-3">
                            <label for="sifre_input" class="form-label">Şifre</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="sifre_input" value="123456" required>
                                <button type="button" class="input-group-text" id="sifre_button" onclick="sifreGoster('sifre_input','sifre_button')">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="sifre_input2" class="form-label">Şifre Tekrar</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="sifre_input2" value="123456" required>
                                <button type="button" class="input-group-text" id="sifre_button2" onclick="sifreGoster('sifre_input2','sifre_button2')">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" id="hesap_update">Güncelle</button>
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
            
        });
        
        $("#hesap_update").click(async function (){
            if ($("#sifre_input").val() != $("#sifre_input2").val()) {alert('şifreler eşleşmiyor');return;}
            var resp;
            $.ajax({
                type: "POST",
                url: "api.php",
                dataType: "json",
                async: false,
                data: {
                    islem: "update_acc",
                    hesap_isim: $("#hesap_isim").val(),
                    hesap_soyisim: $("#hesap_soyisim").val(),
                    hesap_adres: $("#hesap_adres").val(),
                    hesap_mail: $("#hesap_mail").val(),
                    sifre_input: $("#sifre_input").val()
                },
                success: function(response){


                    resp = response;
                    console.log(resp)
                }
            });
      
       });
        


        </script>
    <script>
        function toggleDiv(id) {
            const div = document.getElementById(id);
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        }

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
    </script>
</body>
</html>
<?php
}
?>