<?php include "header.php"; // header
if(isset($_POST['save'])){
// Girişleri doğrula
  $setting_id = mysqli_real_escape_string($conn, $_POST['id']);
  $iade_suresi = mysqli_real_escape_string($conn, $_POST['iadesuresi']);
  $ceza = mysqli_real_escape_string($conn, $_POST['ceza']);
  // Güncelleme sorgusu
  $sql = "UPDATE ayarlar SET iade_suresi = '{$iade_suresi}', ceza = '{$ceza}' WHERE id = '{$setting_id}'";
  if(mysqli_query($conn, $sql)){
    echo "<div class='alert alert-success'>Başarıyla güncellendi.</div>";
  }else{
    echo "<div class='alert alert-danger'>Güncelleme başarılı değil.</div>";
  }
} ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Ayarlar</h2>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
              <?php
              $sql = "SELECT * FROM ayarlar";
              $result = mysqli_query($conn, $sql) or die("SQL sorgusu başarısız oldu.");
              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){ ?>
              <form class="yourform" action="" method="post" autocomplete="off">
                  <div class="form-group">
                      <input type="hidden" class="form-control"  name="id" value="<?php echo $row['id'] ?>" required>
                  </div>
                  <div class="form-group">
                      <label>İade Süreleri</label>
                      <input type="number" class="form-control"  name="iadesuresi" value="<?php echo $row['iade_suresi'] ?>" required>
                  </div>
                  <div class="form-group">
                      <label>Ceza (₺ cinsinden)</label>
                      <input type="number" class="form-control"  name="ceza" value="<?php echo $row['ceza'] ?>" required>
                  </div>
                  <input type="submit" name="save" class="btn btn-danger" value="Güncelle" required>
              </form>
              <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?> <!-- footer -->
