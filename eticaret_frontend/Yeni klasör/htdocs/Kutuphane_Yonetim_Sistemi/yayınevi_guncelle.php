<?php include "header.php"; // header
// Eğer form gönderilirse
if(isset($_POST['submit'])){
// Girişleri doğrula
    $yayinevi_id = mysqli_real_escape_string($conn, $_POST['yayinevi_id']);
    $yayinevi_adi = mysqli_real_escape_string($conn, $_POST['yayinevi_adi']);
    // Güncelleme sorgusu
    $sql = "UPDATE yayinevi SET yayinevi_adi = '{$yayinevi_adi}' WHERE yayinevi_id = '{$yayinevi_id}'";
    if(mysqli_query($conn, $sql)){
    header("$base_url/yayinevi.php");
    }
} ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Yayınevini Güncelle</h2>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
              <?php
                $yayinevi_id = $_GET['pid'];
                // Seçim sorgusu
                $sql = "SELECT * FROM yayinevi WHERE yayinevi_id = '{$yayinevi_id}'";
                $result = mysqli_query($conn, $sql) or die("SQL sorgusu başarısız oldu.");
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){

                ?>
                <form class="yourform" action="" method="post" autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="yayinevi_id" value="<?php echo $row['yayinevi_id']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Yanınevi adı</label>
                        <input type="text" class="form-control"  name="yayinevi_adi" value="<?php echo $row['yayinevi_adi']; ?>" required>
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
