<?php include "header.php" ?> <!-- header -->
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2 class="admin-heading">Şifre Değiştir</h2>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
              <form class="yourform" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="kullanici_adi" value="" required>
                </div>
                  <div class="form-group">
                      <label>Eski Şifre</label>
                      <input type="password" class="form-control" placeholder="Eski Şifreyi Girin" name="sifre" value="" required>
                  </div>
                  <div class="form-group">
                      <label>Yeni Şifre</label>
                      <input type="password" class="form-control" placeholder="Yeni Şifreyi Girin" name="new_sifre" value="" required>
                  </div>
                  <input type="submit" name="save" class="btn btn-danger" value="Kaydet" required>
              </form>
              <?php // Eğer form gönderildiyse
              if(isset($_POST['save'])){
                $kullanici_adi = $_SESSION['kullanici_adi'];
                // Girdileri doğrulama yeri
                $sifre = mysqli_real_escape_string($conn, md5($_POST['sifre']));
                $new_sifre = mysqli_real_escape_string($conn, md5($_POST['new_sifre']));
                // Güncelleme sorgusu
                $sql = "UPDATE admin SET sifre = '{$new_sifre}' WHERE kullanici_adi = '{$kullanici_adi}' AND sifre = '{$sifre}'";
                if(mysqli_query($conn, $sql)){
                  echo "<div class='alert alert-success'>Şifre başarıyla değiştirildi.</div>";
                }else{
                  echo "<div class='alert alert-danger'>Şifre değiştirme başarısız oldu..</div>";
                }
              } ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?> <!-- footer -->
