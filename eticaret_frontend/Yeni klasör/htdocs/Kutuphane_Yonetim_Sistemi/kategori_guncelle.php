<?php include "header.php"; // header
// Eğer form gönderildiyse
if(isset($_POST['submit'])){
  // Girişleri doğrula
  $kategori_id= mysqli_real_escape_string($conn, $_POST['categor_id']);
  $kategori_adi = mysqli_real_escape_string($conn, $_POST['kategori_adi']);
  //// Güncelleme sorgusu
  $sql = "UPDATE kategori SET kategori_adi = '{$kategori_adi}' WHERE kategori_id= '{$kategori_id}'";
  if(mysqli_query($conn, $sql)){
    header("$base_url/kategori.php"); // Yönlendiriliyor...
  }
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Kategori Güncelle</h2>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
              <?php
            $kategori_id= $_GET['cid'];
            // Sorguyu seçin
            $sql = "SELECT * FROM kategori WHERE kategori_id= '{$kategori_id}'";
            $result = mysqli_query($conn, $sql) or die("SQL sorgusu başarısız oldu.");
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){ ?>
                <form class="yourform" action="" method="post" autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="categor_id" value="<?php echo $row['kategori_id']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori adı</label>
                        <input type="text" class="form-control"  name="kategori_adi" value="<?php echo $row['kategori_adi']; ?>" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-danger" value="Kaydet" required>
                </form>
                <?php }
                  } ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?> <!-- footer -->
