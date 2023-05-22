<?php include "header.php"; // header
// Eğer form gönderilirse
if(isset($_POST['submit'])){
// Girişleri doğrula
  $ogrenci_id = mysqli_real_escape_string($conn, $_POST['ogrenci_id']);
  $ogrenci_adi = mysqli_real_escape_string($conn, $_POST['studentname']);
  $ogrenci_adresi = mysqli_real_escape_string($conn, $_POST['address']);
  $ogrenci_cinsiyeti = mysqli_real_escape_string($conn, $_POST['gender']);
  $ogrenci_sinifi = mysqli_real_escape_string($conn, $_POST['class']);
  $ogrenci_yas = mysqli_real_escape_string($conn, $_POST['age']);
  $ogrenci_telefon = mysqli_real_escape_string($conn, $_POST['phone']);
  $ogrenci_email = mysqli_real_escape_string($conn, $_POST['email']);
// Güncelleme sorgusu
  $sql = "UPDATE ogrenciler SET ogrenci_adi = '{$ogrenci_adi}', ogrenci_adresi = '{$ogrenci_adresi}', ogrenci_cinsiyeti = '{$ogrenci_cinsiyeti}',
          ogrenci_sinifi = '{$ogrenci_sinifi}', ogrenci_yas = '{$ogrenci_yas}', ogrenci_telefon = '{$ogrenci_telefon}', ogrenci_email = '{$ogrenci_email}'
          WHERE ogrenci_id = '{$ogrenci_id}'";
  if(mysqli_query($conn, $sql)){
    header("$base_url/ogrenci.php"); // Yönlendiriliyor...
  }
} ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Öğrenciyi Güncelle</h2>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <?php
                  $ogrenci_id = $_GET['sid'];
                  // Sorgu seç
                  $sql = "SELECT * FROM ogrenciler WHERE ogrenci_id = '{$ogrenci_id}'";
                  $result = mysqli_query($conn, $sql);
                  if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){ ?>
                <form class="yourform" action="" method="post" autocomplete="off">
                  <div class="form-group">
                      <input type="hidden" class="form-control" name="ogrenci_id" value="<?php echo $row['ogrenci_id']; ?>" required>
                  </div>
                    <div class="form-group">
                        <label>Öğrenci Adı</label>
                        <input type="text" class="form-control"  name="studentname" value="<?php echo $row['ogrenci_adi']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Adres</label>
                        <input type="text" class="form-control"  name="address" value="<?php echo $row['ogrenci_adresi']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Cinsiyet</label>
                        <select name="gender" class="form-control">
                            <option value="male" <?php echo ($row['ogrenci_cinsiyeti'] == 'male') ? 'selected' : ''; ?> >Erkek</option>
                            <option value="female" <?php echo ($row['ogrenci_cinsiyeti'] == 'female') ? 'selected' : ''; ?> >Kadın</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sınıf</label>
                        <input type="text" class="form-control"  name="class" value="<?php echo $row['ogrenci_sinifi']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Yaş</label>
                        <input type="text" class="form-control"  name="age" value="<?php echo $row['ogrenci_yas']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Telefon</label>
                        <input type="number" class="form-control"  name="phone" value="<?php echo $row['ogrenci_telefon']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" class="form-control"  name="email" value="<?php echo $row['ogrenci_email']; ?>" required>
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
