<?php include "header.php"; // header
// Eğer form gönderildiyse
if(isset($_POST['submit'])){
  // Girişleri doğrula
  $kitap_id = mysqli_real_escape_string($conn, $_POST['kitap_id']);
  $kitap_adi = mysqli_real_escape_string($conn, $_POST['kitap_adi']);
  $kitap_kategorisi = mysqli_real_escape_string($conn, $_POST['kategori']);
  $kitap_yazari = mysqli_real_escape_string($conn, $_POST['yazar']);
  $kitap_yayinevi = mysqli_real_escape_string($conn, $_POST['yayinevi']);
  // Güncelleme sorgusu
  $sql2 = "UPDATE kitap SET kitap_adi = '{$kitap_adi}', kitap_kategorisi = '{$kitap_kategorisi}', kitap_yazari = '{$kitap_yazari}', kitap_yayinevi = '{$kitap_yayinevi}' WHERE kitap_id = '{$kitap_id}'";
  if(mysqli_query($conn, $sql2)){
    header("$base_url/kitap.php"); // Yönlendiriliyor...
  }
} ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Kitap Güncelle</h2>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
            <?php
            $kitap_id = $_GET['bid'];
            // Sorguyu seçin
            $sql = "SELECT kitap.kitap_id, kitap.kitap_adi, kitap.kitap_kategorisi, kitap.kitap_yazari, kitap.kitap_yayinevi,
                    kategori.kategori_adi, yazar.yazar_adi, yayinevi.yayinevi_adi FROM kitap
                    LEFT JOIN kategori ON kitap.kitap_kategorisi = kategori.kategori_id
                    LEFT JOIN yazar ON kitap.kitap_yazari  = yazar.yazar_id
                    LEFT JOIN yayinevi ON kitap.kitap_yayinevi = yayinevi.yayinevi_id
                    WHERE kitap.kitap_id = {$kitap_id}";
            $result = mysqli_query($conn, $sql) or die("SQL sorgusu başarısız oldu.");
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)){ ?>
                <form class="yourform" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                  <div class="form-group">
                      <input type="hidden" class="form-control" placeholder="Kitap Adı" name="kitap_id" value="<?php echo $row['kitap_id']; ?>" required>
                  </div>
                    <div class="form-group">
                        <label>Kitap Adı</label>
                        <input type="text" class="form-control" placeholder="Kitap Adı" name="kitap_adi" value="<?php echo $row['kitap_adi']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori" required>
                          <option disabled>Kategori Seçin</option>
                          <?php
                          $sql1 = "SELECT * FROM kategori";
                          $result1 = mysqli_query($conn, $sql1) or die("SQL sorgusu başarısız oldu.");
                          if(mysqli_num_rows($result1) > 0){
                              while($row1 = mysqli_fetch_assoc($result1)){
                                if($row['kategori'] == $row1['kategori_id']){
                                  $selected = "selected";
                                }else{
                                  $selected = "";
                                }
                                echo "<option {$selected} value='{$row1['kategori_id']}''>{$row1['kategori_adi']}</option>";
                              }
                          } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Yazar</label>
                        <select class="form-control" name="yazar" required>
                          <option disabled>Yazar Seçin</option>
                          <?php
                          $sql1 = "SELECT * FROM yazar";
                          $result1 = mysqli_query($conn, $sql1) or die("SQL sorgusu başarısız oldu.");
                          if(mysqli_num_rows($result1) > 0){
                            while($row1 = mysqli_fetch_assoc($result1)){
                              if($row['yazar'] == $row1['yazar_id']){
                                $selected = "selected";
                              }else{
                                $selected = "";
                              }
                              echo "<option {$selected} value='{$row1['yazar_id']}'>{$row1['yazar_adi']}</option>";
                            }
                          } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Yayınevi</label>
                        <select class="form-control" name="yayinevi" required>
                          <option disabled>Yayınevi Seçin</option>
                          <?php
                          $sql1 = "SELECT * FROM yayinevi";
                          $result1 = mysqli_query($conn, $sql1) or die("SQL sorgusu başarısız oldu.");
                          if(mysqli_num_rows($result1) > 0){
                            while($row1 = mysqli_fetch_assoc($result1)){
                              if($row['yayinevi'] == $row1['yayinevi_id']){
                                $selected = "selected";
                              }else{
                                $selected = "";
                              }
                              echo "<option value='{$row1['yayinevi_id']}'>{$row1['yayinevi_adi']}</option>";
                            }
                          } ?>
                        </select>
                    </div>
                    <input type="submit" name="submit" class="btn btn-danger" value="Güncelle" required>
                </form>
                <?php }
                  } ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?> <!-- footer -->
