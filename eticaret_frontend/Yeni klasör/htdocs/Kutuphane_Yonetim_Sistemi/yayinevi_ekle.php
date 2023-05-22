<?php include "header.php" ?> <!-- header -->
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Yayınevi Ekle</h2>
            </div>
            <div class="offset-md-7 col-md-2">
              <a class="add-new" href="yayinevi.php">Tüm Yayınevleri</a>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form class="yourform" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                    <div class="form-group">
                        <label>Yayınevi Adı</label>
                        <input type="text" class="form-control" placeholder="Yayınevi Adı" name="publishername" value="" >
                    </div>
                    <input type="submit" name="save" class="btn btn-danger" value="Kaydet" >
                </form>
                <?php // if form submit
                if(isset($_POST['save'])){
                  if(!isset($_POST['publishername']) || empty($_POST['publishername'])){
                    echo "<div class='alert alert-danger'>Yayınevi adı gereklidir.</div>";
                  }else{
                    // validate input
                    $yayinevi_adi = mysqli_real_escape_string($conn, $_POST['publishername']);
                    //check publisher name already exists in table
                    $sql = "SELECT yayinevi_adi FROM yayinevi WHERE yayinevi_adi = '{$yayinevi_adi}'";
                    $result = mysqli_query($conn, $sql) or die("SQL sorgusu başarısız oldu");

                    if(mysqli_num_rows($result) > 0){ // check result rows
                        echo "<div class='alert alert-danger'>Yayınevi adı zaten var.</div>";
                    }else{
                        //insert query
                        $sql1 = "INSERT INTO yayinevi(yayinevi_adi) VALUES ('{$yayinevi_adi}')";
                        if(mysqli_query($conn, $sql1)){
                          header("$base_url/yayinevi.php"); // Yönlendiriliyor...
                        }
                    }
                  }
                } ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?> <!-- footer -->
