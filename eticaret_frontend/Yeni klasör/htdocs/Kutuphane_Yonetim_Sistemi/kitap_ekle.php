<?php include "header.php" ?> <!-- header  -->
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <h2 class="admin-heading">Kitap Ekle</h2>
      </div>
      <div class="offset-md-7 col-md-2">
        <a class="add-new" href="kitap.php">Tüm Kitaplar</a>
      </div>
    </div>
    <div class="row">
      <div class="offset-md-3 col-md-6">
      <?php // if form submit
      if(isset($_POST['save'])){
        if(empty($_POST['kitap_adi']) || empty($_POST['kategori']) || empty($_POST['yazar']) || empty($_POST['yayinevi'])){
          echo "<div class='alert alert-danger'>Lütfen tüm alanları doldurun.</div>";
        }else{
          // Girişleri doğrula
          $kitap_adi = mysqli_real_escape_string($conn, $_POST['kitap_adi']);
          $kitap_kategorisi = mysqli_real_escape_string($conn, $_POST['kategori']);
          $kitap_yazari = mysqli_real_escape_string($conn, $_POST['yazar']);
          $kitap_yayinevi = mysqli_real_escape_string($conn, $_POST['yayinevi']);
          // Kitap adının mevcut olup olmadığını kontrol etmek için sorgu
          $sql = "SELECT kitap_adi FROM kitap WHERE kitap_adi = '{$kitap_adi}'";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0){ // Sonuç satırlarını kontrol et
            echo "<div class='alert alert-danger'>Kitap adı zaten mevcut.</div>";
          }else{
            // Ekleme sorgusu.
            $sql1 ="INSERT INTO kitap(kitap_adi,kitap_kategorisi,kitap_yazari,kitap_yayinevi,kitap_durum) VALUES ('{$kitap_adi}','{$kitap_kategorisi}','{$kitap_yazari}','{$kitap_yayinevi}','Y')";
            if(mysqli_query($conn, $sql1)){
              header("$base_url/kitap.php"); // Yönlendiriliyor...
            }  
          }
        }
      } ?>
      <form class="yourform" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
        <div class="form-group">
            <label>Kitap adı</label>
            <input type="text" class="form-control" placeholder="Kitap adı" name="kitap_adi" value="" required>
        </div>
        <div class="form-group">
          <label>Kategori</label>
          <select class="form-control" name="kategori" required>
            <option value="">Kategori Seçin.</option>
            <?php
            $sql = "SELECT * FROM kategori";
            $result = mysqli_query($conn, $sql) or die("SQL sorgusu başarısız oldu.");
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                  echo "<option value='{$row['kategori_id']}''>{$row['kategori_adi']}</option>";
                }
            } ?>
          </select>
        </div>
        <div class="form-group">
            <label>Yazar</label>
            <select class="form-control" name="yazar" required >
              <option value="">Yazarı Seçin</option>
              <?php
              $sql = "SELECT * FROM yazar";
              $result = mysqli_query($conn, $sql) or die("SQL sorgusu başarısız oldu.");
              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                  echo "<option value='{$row['yazar_id']}'>{$row['yazar_adi']}</option>";
                }
              } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Yayınevi</label>
            <select class="form-control" name="yayinevi" required>
              <option value="">Yayınevi Seçin</option>
              <?php
              $sql = "SELECT * FROM yayinevi";
              $result = mysqli_query($conn, $sql) or die("SQL sorgusu başarısız oldu.");
              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                  echo "<option value='{$row['yayinevi_id']}'>{$row['yayinevi_adi']}</option>";
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
<?php include "footer.php" ?> <!-- footer  -->
