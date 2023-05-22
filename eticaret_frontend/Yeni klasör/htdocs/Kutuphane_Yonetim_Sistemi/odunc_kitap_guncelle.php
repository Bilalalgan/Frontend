<?php include "header.php"; // header
// Eğer form gönderildiyse
if(isset($_POST['save'])){
  $odunc_id = $_GET['iid'];
  $kitap_id = $_POST['kitap-id'];
  $date = date('Y-m-d');
  // Kitap verme tablosunu güncelleme
  $sql = "UPDATE kitap_odunc_verme SET odunc_durum = 'Y', ogrencinin_kitabi_teslim_ettigi_tarih = '{$date}' WHERE odunc_id = {$odunc_id};";
 // Kitaplar tablosunda kitap durumunu güncelleme.
  $sql .= "UPDATE kitap SET kitap_durum = 'Y' WHERE kitap_id = {$kitap_id}";
  if(mysqli_multi_query($conn, $sql)){
    header("$base_url/kitap_odunc.php"); // Yönlendiriliyor...
  }
} ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Kitabı İade Et</h2>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
              <?php
              // -----------------
              // Ayarlar tablosundan ceza miktarını al.
              $q = "SELECT * FROM ayarlar";
              $rq = mysqli_query($conn, $q);
              if(mysqli_num_rows($rq) > 0){
                $ceza = 0;
                while($r = mysqli_fetch_assoc($rq)){
                  $ceza = $r['ceza'];
                }
              }
              // ----------------
              $odunc_id = $_GET['iid'];
              // seçim sorgusu
                $sql = "SELECT kitap_odunc_verme.odunc_id,kitap_odunc_verme.odunc_adi,kitap_odunc_verme.odunc_kitap,kitap_odunc_verme.odunc_durum,kitap_odunc_verme.ogrencinin_kitabi_teslim_ettigi_tarih,
                        kitap_odunc_verme.odunc_verme_tarihi,kitap_odunc_verme.odunc_geri_alma_tarihi,ogrenciler.ogrenci_id,ogrenciler.ogrenci_telefon,ogrenciler.ogrenci_email,ogrenciler.ogrenci_adi,kitap.kitap_adi FROM kitap_odunc_verme
                        LEFT JOIN ogrenciler ON kitap_odunc_verme.odunc_adi = ogrenciler.ogrenci_id
                        LEFT JOIN kitap ON kitap_odunc_verme.odunc_kitap = kitap.kitap_id
                        WHERE odunc_id = {$odunc_id}
                        ORDER BY kitap_odunc_verme.odunc_id DESC";
                $result = mysqli_query($conn, $sql) or die("SQL sorgusu başarısız oldu.");
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)){ ?>
                <div class="yourform">
                  <table cellpadding="10px" width="90%" style="margin: 0 0 20px;">
                    <tr>
                      <td>Öğrenci Adı : </td>
                      <td><b><?php echo $row['ogrenci_adi'] ?></b></td>
                    </tr>
                    <tr>
                      <td>Kitap Adı : </td>
                      <td><b><?php echo $row['kitap_adi'] ?></b></td>
                    </tr>
                    <tr>
                      <td>Telefon : </td>
                      <td><b><?php echo $row['ogrenci_telefon'] ?></b></td>
                    </tr>
                    <tr>
                      <td>E-mail : </td>
                      <td><b><?php echo $row['ogrenci_email'] ?></b></td>
                    </tr>
                    <tr>
                      <td>Ödünç Verme Tarihi : </td>
                      <td><b><?php echo date('d-m-Y',strtotime($row['odunc_verme_tarihi'])); ?></b></td>
                      </tr>
                      <tr>
                        <td>İade Tarihi : </td>
                        <td><b><?php echo date('d-m-Y',strtotime($row['odunc_geri_alma_tarihi'])); ?></b></td>
                      </tr>
                      <?php
                      if($row['odunc_durum'] == 'Y'){ ?>
                        <tr>
                          <td>Durum</td>
                          <td><b>İade Edildi</b></td>
                        </tr>
                        <tr>
                          <td>Teslim Tarihi</td>
                          <td><b><?php echo date('d-m-Y',strtotime($row['ogrencinin_kitabi_teslim_ettigi_tarih'])); ?></b></td>
                          
                        </tr>
                        <tr>
                          <td><a href="kitap_odunc.php" class='btn' style='background-color: #444; color:#fff'>Geri</a></td>
                        </tr>
                    <?php  }else{
                          if(date('Y-m-d') > $row['odunc_geri_alma_tarihi']){ ?>
                            <tr>
                              <td>Ceza</td>
                              <?php
                              $date1 = date_create(date('Y-m-d'));
                              $date2 = date_create($row['odunc_geri_alma_tarihi']);
                              $diff = date_diff($date1,$date2);
                              $days = $diff->format('%a');
                               ?>
                              <td><b><?php echo ($ceza * $days).' ₺'; ?></b></td>
                            </tr>
                          <?php } ?>
                    <?php }  ?>
                  </table><?php
                  if($row['odunc_durum'] == 'N'){ ?>
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                    <input type="hidden" name="kitap-id" value="<?php echo $row['odunc_kitap'] ?>">
                    <a href="kitap_odunc.php" class='btn' style='background-color: #444; color:#fff'>Geri</a>
                    <input type='submit' class='btn btn-danger' name='save' value='Kitabı Geri Ver'>
                  </form>
              <?php  } ?>
                </div>
              <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?> <!-- footer -->
