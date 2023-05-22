<?php include "header.php" ?> <!--  header -->
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="offset-md-4 col-md-4">
                <h2 class="admin-heading text-center">Tüm Ödünç Alma İşlemleri</h2>
            </div>
            <div>
            <a href="raporlar.php" class='btn' style='background-color: #444; color:#fff; margin-left:350px;'>Geri</a>
            </div>
        </div>
        <?php
        $date = date('Y-m-d');
        // Seçim sorgusu
        $sql = "SELECT kitap_odunc_verme.odunc_id,kitap_odunc_verme.odunc_adi,kitap_odunc_verme.odunc_kitap,kitap_odunc_verme.odunc_durum,
                  kitap_odunc_verme.odunc_verme_tarihi,kitap_odunc_verme.odunc_geri_alma_tarihi,ogrenciler.ogrenci_id,ogrenciler.ogrenci_telefon,ogrenciler.ogrenci_email,ogrenciler.ogrenci_adi,kitap.kitap_adi FROM kitap_odunc_verme
                  LEFT JOIN ogrenciler ON kitap_odunc_verme.odunc_adi = ogrenciler.ogrenci_id
                  LEFT JOIN kitap ON kitap_odunc_verme.odunc_kitap = kitap.kitap_id
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
                    <th>Telefon</th>
                    <th>E-posta</th>
                    <th>Ödünç Verme Tarihi</th>
                    <th>İade Tarihi</th>
                    <th>Gecikme Süresi</th>

                  </thead>
                  <tbody>
                    <?php $serial = 1;
                    while($row = mysqli_fetch_assoc($result)) { 
                    if((date('Y-m-d') > $row['odunc_geri_alma_tarihi']) && $row['odunc_durum'] == "N"){
                    $over = 'style="background:rgba(255,0,0,0.2)"';
                    }else{ $over = ''; }?>
                    <tr <?php echo $over; ?> >
                      <td><?php echo $serial; ?></td>
                      <td class = "text-center"><?php echo $row['ogrenci_adi']; ?></td>
                      <td><?php echo $row['kitap_adi']; ?></td>
                      <td><?php echo $row['ogrenci_telefon']; ?></td>
                      <td class = "text-center"><?php echo $row['ogrenci_email']; ?></td>
                      <td><?php echo date('d-m-Y',strtotime($row['odunc_verme_tarihi'])); ?></td>
                      <td><?php echo date('d-m-Y',strtotime($row['odunc_geri_alma_tarihi'])); ?></td>
                      <td>
                      <?php
                          $date1 = date_create(date('d-m-Y'));
                          $date2 = date_create($row['odunc_geri_alma_tarihi']);
                          if($date1 > $date2){
                            $diff = date_diff($date1,$date2);



                            echo $days = $diff->format('%a gün');
                          }else{
                            echo '0 Gün';

//                            echo $days = $diff->format('%a days'); }else{  echo '0 days';   ---->> hata alınırsa düzeltilecek

                          } ?>
                      </td>
                    </tr>
                    <?php $serial++; } ?>
                  </tbody>
              </table>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php include "footer.php" ?> <!-- footer  -->
