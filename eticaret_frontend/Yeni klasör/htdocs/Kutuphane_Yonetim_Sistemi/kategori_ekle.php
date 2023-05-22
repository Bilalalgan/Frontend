<?php include "header.php" ?> <!-- header -->
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Kategori Ekle</h2>
            </div>
            <div class="offset-md-7 col-md-2">
              <a class="add-new" href="kategori.php">Tüm Kategoriler</a>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form class="yourform" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                    <div class="form-group">
                        <label>Kategori Adı</label>
                        <input type="text" class="form-control" placeholder="Kategori Adı" name="categoryname" value="" required>
                    </div>
                    <input type="submit" name="save" class="btn btn-danger" value="Kaydet" required>
                </form>
                <?php // if form submit
                if(isset($_POST['save'])){
                  if(!isset($_POST['categoryname']) || empty($_POST['categoryname'])){
                    echo "<div class='alert alert-danger'>Kategori adı gereklidir.</div>";
                  }else{
                    // Girişleri doğrula
                    $kategori_adi = mysqli_real_escape_string($conn, $_POST['categoryname']);
                    // Kategori adının zaten var olup olmadığını kontrol etmek için select sorgusu
                    $sql = "SELECT kategori_adi FROM kategori WHERE kategori_adi = '{$kategori_adi}'";
                    $result = mysqli_query($conn, $sql) or die("SQL sorgusu başarısız oldu.");

                    if(mysqli_num_rows($result) > 0){ // check result rows
                        echo "<div class='alert alert-danger'>Kategori adı zaten mevcut.</div>";
                    }else{
                        //insert query
                        $sql1 = "INSERT INTO kategori(kategori_adi) VALUES ('{$kategori_adi}')";
                        if(mysqli_query($conn, $sql1)){
                          header("$base_url/kategori.php"); // Yönlendirme yap
                        }
                    }
                  }
                } ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?> <!-- footer -->
