<?php include "header.php" ?> <!-- header -->
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <h2 class="admin-heading text-center">Tarihe göre sıralanmış kitap ödünç raporu.</h2>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-4 col-md-4">
                <form class="yourform mb-5" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group">
                        <input type="date" name="date" class="form-control" value="<?php echo date('Y-m-d') ?>">
                    </div>
                    <a href="raporlar.php" class='btn' style='background-color: #444; color:#fff'>Geri</a>
                    <input type="submit" class="btn btn-danger" name="search_date" value="Arama">
                </form>
            </div>
        </div>
        <?php if(isset($_POST['search_date']) && !empty($_POST['date'])){
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        // select query
        $sql = "SELECT kitap_odunc_verme.odunc_id,kitap_odunc_verme.odunc_adi,kitap_odunc_verme.odunc_kitap,kitap_odunc_verme.odunc_durum,
                kitap_odunc_verme.odunc_verme_tarihi,kitap_odunc_verme.odunc_geri_alma_tarihi,ogrenciler.ogrenci_id,ogrenciler.ogrenci_telefon,ogrenciler.ogrenci_email,ogrenciler.ogrenci_adi,kitap.kitap_adi FROM kitap_odunc_verme
                LEFT JOIN ogrenciler ON kitap_odunc_verme.odunc_adi = ogrenciler.ogrenci_id
                LEFT JOIN kitap ON kitap_odunc_verme.odunc_kitap = kitap.kitap_id
                WHERE kitap_odunc_verme.odunc_verme_tarihi = '{$date}'
                ORDER BY kitap_odunc_verme.odunc_id DESC";
        $result = mysqli_query($conn, $sql) or die("SQL sorgusu başarısız oldu.");
        if(mysqli_num_rows($result) > 0){ ?>
          <div class="row">
              <div class="col-md-12">
                <table class="content-table">
                    <thead>
                      <th>Ö.No</th>
                      <th>Öğrenci Adı</th>
                      <th>Kitap Adı</th>
                      <th>Telefon No</th>
                      <th>E-mail</th>
                      <th>Ödünç Verme Tarihi</th>
                      <th>İade Tarihi</th>
                    </thead>
                    <tbody>
                    <?php $serial = 1;
                    while($row = mysqli_fetch_assoc($result)) { 
                    if((date('Y-m-d') > $row['odunc_geri_alma_tarihi']) && $row['odunc_durum'] == "N"){
                    $over = 'style="background:rgba(255,0,0,0.2)"';
                    }else{ $over = ''; } ?>
                      <tr <?php echo $over; ?>>
                        <td><?php echo $serial; ?></td>
                        <td class = "text-center"><?php echo $row['ogrenci_adi']; ?></td>
                        <td><?php echo $row['kitap_adi']; ?></td>
                        <td><?php echo $row['ogrenci_telefon']; ?></td>
                        <td class = "text-center"><?php echo $row['ogrenci_email']; ?></td>
                        <td><?php echo date('d-m-Y',strtotime($row['odunc_verme_tarihi'])); ?></td>
                        <td><?php echo date('d-m-Y',strtotime($row['odunc_geri_alma_tarihi'])); ?></td>
                      </tr>
                    <?php $serial++; } ?>
                    </tbody>
                </table>
              </div>
          </div>
        <?php }
        } ?>
    </div>
</div>
<?php include "footer.php" ?> <!-- footer -->
