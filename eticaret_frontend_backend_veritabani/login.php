<?php
include "database.php";
session_start();
if (isset($_COOKIE['remember_token'])) {
    $stmt = $conn->prepare("SELECT * FROM users where remember_token = :token");
    $stmt->execute(array(
        'token' => $_COOKIE['remember_token']
    ));

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();
    if ($result != false) {

        $_SESSION['loggedin'] = TRUE;
        $_SESSION['user_info'] = $result;
        
    }
}
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE) {
    header("Location: kullanici.php");
    die();
} else {
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
                            Hesabım
                        </li>
                    </ol>
                </nav>
            </div>
        </section>
    </header>

    <section class="py-4 mb-5" id="login">
        <div class="container">
            <div class="row justify-content-center">
                <aside class="col-lg-6">
                    <ul class="nav nav-tabs row" id="myTab" role="tablist">
                        <li class="nav-item col-6" role="presentation" style="padding: 0;">
                          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true" style="width: 100%;">Giris Yap</button>
                        </li>
                        <li class="nav-item col-6" role="presentation" style="padding: 0;">
                          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" style="width: 100%;">Kayıt Ol</button>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <form style="height: 500px;">
                                <div class="mb-3 mt-3">
                                  <label for="login_mail" class="form-label">Email</label>
                                  <input type="email" class="form-control" id="login_mail" aria-describedby="emailHelp">
                                  <div id="emailHelp" class="form-text">Lütfen e-postanızı giriniz.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="login_passwd" class="form-label">Şifre</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="login_passwd" required>
                                        <button type="button" class="input-group-text" id="login_button" onclick="sifreGoster('login_passwd','login_button')">
                                            <i class="fa-regular fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-3 form-check">
                                  <input type="checkbox" class="form-check-input" id="login_remember">
                                  <label class="form-check-label" for="login_remember">Beni Hatırla</label>
                                </div>
                                <button type="button" class="btn btn-primary" id="login_login">Giriş Yap</button>
                              </form>
                        </div>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <form >
                                <div class="mb-3 mt-3">
                                    <label for="kayıt_isim" class="form-label">İsim</label>
                                    <input type="text" class="form-control" id="kayıt_isim" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="kayıt_soyisim" class="form-label">Soyisim</label>
                                    <input type="text" class="form-control" id="kayıt_soyisim" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3 mt-3">
                                  <label for="kayıt_adres" class="form-label">Adres</label>
                                  <input type="email" class="form-control" id="kayıt_adres" aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="kayit_mail" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="kayit_mail" aria-describedby="emailHelp" required>
                                    <div id="emailHelp" class="form-text">Lütfen e-postanızı giriniz.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="kayit_sifre" class="form-label">Şifre</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="kayit_sifre" required>
                                        <button type="button" class="input-group-text" id="kayit_button" onclick="sifreGoster('kayit_sifre','kayit_button')">
                                            <i class="fa-regular fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="kayit_sifre2" class="form-label">Şifre Tekrar</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="kayit_sifre2" required>
                                        <button type="button" class="input-group-text" id="kayit_button2" onclick="sifreGoster('kayit_sifre2','kayit_button2')">
                                            <i class="fa-regular fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" id="kayit_ol">Kayıt Ol</button>
                              </form>
                        </div>
                      </div>
                </aside>
            </div>
        </div>
    </section>


    <footer class="py-4 mt-5 bg-primary">
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

    
    <script src="fslightbox.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <script>
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

    <script>
        $("form").submit(function(e){
            e.preventDefault();
        });

        async function login(mail, password, remember_me){
            var resp;
            $.ajax(
                {
                    type: "POST",
                    url: "api.php",
                    dataType: "json",
                    async: false,
                    data: {
                        islem: "login",
                        login_mail: mail,
                        login_passwd: password,
                        remember: remember_me
                    },
                    success: function(response){


                        resp = response;
                    }
                }
            );
            return resp;
        }

        async function register(isim, soyisim, mail, adres, password){
            var resp;
            $.ajax(
                {
                    type: "POST",
                    url: "api.php",
                    dataType: "json",
                    async: false,
                    data: {
                        islem: "register",
                        register_isim: isim,
                        register_soyisim: soyisim,
                        register_mail: mail,
                        register_adres: adres,
                        register_password: password
                    },
                    success: function(response){


                        resp = response;
                    }
                }
            );
            return resp;
        }
        $("#login_login").click(async function (){
            log = await login($("#login_mail").val(), $("#login_passwd").val(), $("#login_remember").prop("checked"))
            if (log.response == "Login Success") {
                alert("Giriş Başarılı");
                if ('admin@admin.com' == $("#login_mail").val()) {
                    location.href = 'admin.php';
                } else {
                    location.href = 'kullanici.php';
                } //tooooooo bad
                
            }
       });

       $("#kayit_ol").click(async function (){

            if ($("#kayit_sifre").val() != $("#kayit_sifre2").val()) { alert("şifreler uyuşmuyor");return}
            d = await register(
                $("#kayıt_isim").val(),
                $("#kayıt_soyisim").val(),
                $("#kayit_mail").val(),
                $("#kayıt_adres").val(),
                $("#kayit_sifre").val()
            )
            if (d.response == "Insert Success") {
                alert("Kayıt Başarılı");
                location.href = 'kullanici.php';
            } else {
                alert("Bir Hata Oluştu");
            }
        

       });
    </script>
</body>
</html>

<?php
}
?>