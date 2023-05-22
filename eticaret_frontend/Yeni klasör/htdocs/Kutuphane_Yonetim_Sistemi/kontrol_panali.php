<?php include "header.php" ?> <!-- header -->
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Kontrol Paneli</h2>
            </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-4">
          <?php // Yazar sayısını seçme yeri
          $sql = "SELECT COUNT(*) AS total_author FROM yazar";
          $result = mysqli_query($conn, $sql) or die("SQL sorgusu başarısız oldu.");
          if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){ ?>
            <div class="card" style="width: 14rem; margin: 0 auto;">
              <div class="card-body text-center">
                <p class="card-text"><?php echo $row['total_author']; ?></p>
                <h5 class="card-title mb-0">Yazarlar</h5>
              </div>
            </div>
          <?php }
          } ?>
          </div>
          <div class="col-md-3">
            <?php // Yayınevleri sayısını seçme yeri
            $sql = "SELECT COUNT(*) AS total_publisher FROM yayinevi";
            $result = mysqli_query($conn, $sql) or die("SQL sorgusu başarısız oldu.");
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)){ ?>
              <div class="card" style="width: 14rem; margin: 0 auto;">
                <div class="card-body text-center">
                  <p class="card-text"><?php echo $row['total_publisher']; ?></p>
                  <h5 class="card-title mb-0">Yayınevleri</h5>
                </div>
              </div>
            <?php }
            } ?>
            </div>
            <div class="col-md-3">
            <?php // Kategorilerin sayısını seçme yeri
            $sql = "SELECT COUNT(*) AS total_category FROM kategori";
            $result = mysqli_query($conn, $sql) or die("SQL sorgusu başarısız oldu.");
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)){ ?>
              <div class="card" style="width: 14rem; margin: 0 auto;">
                <div class="card-body text-center">
                  <p class="card-text"><?php echo $row['total_category']; ?></p>
                  <h5 class="card-title mb-0">Kategoriler</h5>
                </div>
              </div>
            <?php }
            } ?>
            </div>
            <div class="col-md-3">
            <?php // Kitap sayısını seçme yeri
            $sql = "SELECT COUNT(*) AS total_book FROM kitap";
            $result = mysqli_query($conn, $sql) or die("SQL sorgusu başarısız oldu.");
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)){ ?>
              <div class="card" style="width: 14rem; margin: 0 auto;">
                <div class="card-body text-center">
                  <p class="card-text"><?php echo $row['total_book']; ?></p>
                  <h5 class="card-title mb-0">Kitaplar</h5>
                </div>
              </div>
            <?php }
            } ?>
            </div>
            <div class="col-md-3">
            <?php // Öğrenci sayısını seçme yeri
            $sql = "SELECT COUNT(*) AS total_student FROM ogrenciler";
            $result = mysqli_query($conn, $sql) or die("SQL sorgusu başarısız oldu.");
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)){ ?>
              <div class="card" style="width: 14rem; margin: 0 auto;">
                <div class="card-body text-center">
                  <p class="card-text"><?php echo $row['total_student']; ?></p>
                  <h5 class="card-title mb-0">Öğrenci Kayıtları</h5>
                </div>
              </div>
            <?php }
            } ?>
            </div>
            <div class="col-md-3">
            <?php // Ödünç verilen kitap sayısını seçme yeri
            $sql = "SELECT COUNT(*) AS total_book_issue FROM kitap_odunc_verme";
            $result = mysqli_query($conn, $sql) or die("SQL sorgusu başarısız oldu.");
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)){ ?>
              <div class="card" style="width: 14rem; margin: 0 auto;">
                <div class="card-body text-center">
                  <p class="card-text"><?php echo $row['total_book_issue']; ?></p>
                  <h5 class="card-title mb-0">Verilen Kitaplar</h5>
                </div>
              </div>
            <?php }
            } ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?> <!-- footer -->
