<?php include "header.php" ?> <!-- header -->
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
          <h2 class="admin-heading">Kitap ödünç ver</h2>
      </div>
      <div class="offset-md-7 col-md-2">
        <a class="add-new" href="kitap.php">Tüm kitaplar</a>
      </div>
    </div>
    <div class="row">
      <div class="offset-md-3 col-md-6">
        <?php // Eğer form gönderildiyse
        if(isset($_POST['save'])){
          // --------------------
          // Ayarlar tablosundan iade günlerini alma yeri
          $sql = "SELECT * FROM ayarlar";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0){
            $iade_suresi = 0;
            while($row = mysqli_fetch_assoc($result)){
              $iade_suresi = $row['iade_suresi'];
            }
          }
          // --------------------
          if(empty($_POST['ogrenci_adi']) || empty($_POST['kitap_adi'])){
            echo "<div class='alert alert-danger'>Lütfen tüm alanları doldurun.</div>";
          }else{
            // Girdileri doğrula
            $odunc_adi = mysqli_real_escape_string($conn, $_POST['ogrenci_adi']);
            $odunc_kitap = mysqli_real_escape_string($conn, $_POST['kitap_adi']);
            $odunc_verme_tarihi = date('Y-m-d');
            $odunc_geri_alma_tarihi = date('Y-m-d',strtotime("+".$iade_suresi." days"));
            // Ekleme sorgusu
            $sql = "INSERT INTO kitap_odunc_verme(odunc_adi,odunc_kitap,odunc_verme_tarihi,odunc_geri_alma_tarihi,odunc_durum) VALUES ('{$odunc_adi}','{$odunc_kitap}','{$odunc_verme_tarihi}','$odunc_geri_alma_tarihi','N')";
            if(mysqli_query($conn, $sql)){
              $update = "UPDATE kitap SET kitap_durum = 'N' WHERE kitap_id = {$odunc_kitap}";
              $result = mysqli_query($conn, $update);
              header("$base_url/kitap_odunc.php"); // Yönlendirme yap
            }else{
              echo "<div class='alert alert-danger'>Sorgu başarısız oldu.</div>";
            }
          }
        } ?>
        <form class="yourform" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
          <div class="form-group">
              <label>Öğrenci Adı</label>
              <select class="form-control" name="ogrenci_adi" required>
                <option value="">Adı Seçin</option>
                <?php
                $sql = "SELECT * FROM ogrenciler";
                $result = mysqli_query($conn, $sql) or die("SQL sorgusu başarısız oldu.");
                if(mysqli_num_rows($result) > 0){ // Sonuç satırlarını kontrol et
                    while($row = mysqli_fetch_assoc($result)){
                      echo "<option value='{$row['ogrenci_id']}'>{$row['ogrenci_adi']}</option>";
                    }
                } ?>
              </select>
          </div>
          <div class="form-group">
              <label>Kitap Adı</label>
              <select class="form-control" name="kitap_adi" required>
                <option value="">İsim Seçin</option>
                <?php
                $sql = "SELECT * FROM kitap WHERE kitap_durum = 'Y'";
                $result = mysqli_query($conn, $sql) or die("SQL sorgusu başarısız oldu.");
                if(mysqli_num_rows($result) > 0){ // Sonuç satırlarını kontrol et
                    while($row = mysqli_fetch_assoc($result)){
                      echo "<option value='{$row['kitap_id']}'>{$row['kitap_adi']}</option>";
                    }
                } ?>
              </select>
          </div>
          <input type="submit" name="save" class="btn btn-danger" value="Kaydet" required>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php" ?> <!-- footer -->
