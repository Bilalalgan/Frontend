<?php include "header.php" ?> <!--- header -->
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Yazar Ekle</h2>
            </div>
            <div class="offset-md-7 col-md-2">
              <a class="add-new" href="yazar.php">Tüm Yazarlar</a>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form class="yourform" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                    <div class="form-group">
                        <label>Yazar Adı</label>
                        <input type="text" class="form-control" placeholder="Yazar Adı" name="authorname" value="" required>
                    </div>
                    <input type="submit" name="save" class="btn btn-danger" value="Kaydet" required>
                </form>
                <?php // Eğer form gönderilirse
                if(isset($_POST['save'])){
                  if(!isset($_POST['authorname']) || empty($_POST['authorname'])){
                    echo "<div class='alert alert-danger'>Yazar adı gereklidir.</div>";
                  }else{
                    $yazar_adi = mysqli_real_escape_string($conn, $_POST['authorname']);
                    // Yazar adını kontrol etmek için sorgu var mı yok mu
                    $sql = "SELECT yazar_adi FROM yazar WHERE yazar_adi = '{$yazar_adi}'";
                    $result = mysqli_query($conn, $sql) or die("SQL sorgusu başarısız oldu.");
                    // Sonuç satırlarını kontrol et
                    if(mysqli_num_rows($result) > 0){
                      echo "<div class='alert alert-danger'>Yazar adı zaten mevcut.</div>";
                    }else{
                      // Sorgu ekle
                      $sql1 = "INSERT INTO yazar(yazar_adi) VALUES ('{$yazar_adi}')";
                      if(mysqli_query($conn, $sql1)){
                        header("$base_url/yazar.php"); // yönlendiriliyor...
                      }
                    }
                  }
                } ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?> <!--- footer -->
