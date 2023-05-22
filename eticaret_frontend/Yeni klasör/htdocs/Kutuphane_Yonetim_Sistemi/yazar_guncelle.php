<?php include "header.php"; //header
// Eğer form gönderilirse
if(isset($_POST["submit"])){
  // Girişleri doğrula
  $yazar_id = mysqli_real_escape_string($conn, $_POST['yazar_id']);
  $yazar_adi = mysqli_real_escape_string($conn, $_POST['yazar_adi']);
// Güncelleme sorgusu
  $sql = "UPDATE yazar SET yazar_adi = '{$yazar_adi}' WHERE yazar_id = '{$yazar_id}'";
  if(mysqli_query($conn, $sql)){
      header("$base_url/yazar.php"); // redirect
  }
} ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Yazar Güncelle</h2>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
              <?php
              $yazar_id = $_GET['aid'];
              $sql = "SELECT * FROM yazar WHERE yazar_id = '{$yazar_id}'" ;
              $result = mysqli_query($conn, $sql) or die("SQL sorgusu başarısız oldu.");
              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){ ?>
              <form class="yourform" action="" method="post" autocomplete="off">
                <div class="form-group">
                    <input type="hidden" class="form-control"  name="yazar_id" value="<?php echo $row['yazar_id']; ?>" required>
                </div>
                  <div class="form-group">
                      <label>Yazar Adı</label>
                      <input type="text" class="form-control" name="yazar_adi" value="<?php echo $row['yazar_adi']; ?>" required>
                  </div>
                  <input type="submit" name="submit" class="btn btn-danger" value="Güncelle" required>
              </form>
              <?php
                  }
                } ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?> <!-- footer -->
