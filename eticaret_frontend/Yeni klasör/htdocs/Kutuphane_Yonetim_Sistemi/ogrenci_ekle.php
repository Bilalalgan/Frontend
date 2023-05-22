<?php include "header.php" ?> <!-- header -->
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Öğrenci Ekle</h2>
            </div>
            <div class="offset-md-7 col-md-2">
                <a class="add-new" href="ogrenci.php">Tüm Öğrenciler</a>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <?php // Eğer form gönderildiyse
                if(isset($_POST['save'])){
                    if(empty($_POST['studentname']) || empty($_POST['address']) || empty($_POST['gender']) || empty($_POST['class']) || empty($_POST['age']) || empty($_POST['phone']) || empty($_POST['email'])){
                        echo "<div class='alert alert-danger'>Lütfen tüm alanları doldurun.</div>";
                    }else{
                        // Girişleri doğrula
                        $ogrenci_adi = mysqli_real_escape_string($conn, $_POST['studentname']);
                        $ogrenci_adresi = mysqli_real_escape_string($conn, $_POST['address']);
                        $ogrenci_cinsiyeti = mysqli_real_escape_string($conn, $_POST['gender']);
                        $ogrenci_sinifi = mysqli_real_escape_string($conn, $_POST['class']);
                        $ogrenci_yas = mysqli_real_escape_string($conn, $_POST['age']);
                        $ogrenci_telefon = mysqli_real_escape_string($conn, $_POST['phone']);
                        $ogrenci_email = mysqli_real_escape_string($conn, $_POST['email']);
                        // Ekleme sorgusu
                        $sql = "INSERT INTO ogrenciler(ogrenci_adi,ogrenci_adresi,ogrenci_cinsiyeti,ogrenci_sinifi,ogrenci_yas,ogrenci_telefon,ogrenci_email)
                                VALUES ('{$ogrenci_adi}','$ogrenci_adresi','$ogrenci_cinsiyeti','$ogrenci_sinifi','$ogrenci_yas','$ogrenci_telefon','$ogrenci_email')";

                        if(mysqli_query($conn, $sql)){
                        header("$base_url/ogrenci.php"); // Yönlendirme yap
                        }else{
                        echo "<div class='alert alert-danger'>Sorgu başarısız oldu.</div>";
                        }
                    }
                } ?>
                <form class="yourform" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                    <div class="form-group">
                        <label>Öğrenci Adı</label>
                        <input type="text" class="form-control" placeholder="Öğrenci Adı" name="studentname" value="" required>
                    </div>
                    <div class="form-group">
                        <label>Adres</label>
                        <input type="text" class="form-control" placeholder="Adres" name="address" value="" required>
                    </div>
                    <div class="form-group">
                        <label>Cinsiyet</label>
                        <select name="gender" class="form-control">
                            <option value="Erkek" selected>Erkek</option>
                            <option value="Kadın">Kadın</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sınıf</label>
                        <input type="text" class="form-control" placeholder="Sınıf" name="class" value="" required>
                    </div>
                    <div class="form-group">
                        <label>Yaş</label>
                        <input type="number" class="form-control" placeholder="Yaş" name="age" value="" required>
                    </div>
                    <div class="form-group">
                        <label>Telefon</label>
                        <input type="text" class="form-control" placeholder="Telefon" name="phone" value="" required>
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" class="form-control" placeholder="E-mail" name="email" value="" required>
                    </div>
                    <input type="submit" name="save" class="btn btn-danger" value="Kaydet" required>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?> <!-- footer -->
