<?php include "header.php" ?> <!-- header -->
<div id="admin-content">
    <div class="container">
      <div class="row">
          <div class="col-md-4">
              <h2 class="admin-heading">Kitap ödünç verme işlemleri</h2>
          </div>
          <div class="offset-md-6 col-md-2">
              <a class="add-new" href="kitap_odunc_ekle.php">Kitap Ödünç Ver</a>
          </div>
      </div>
      <div class="row">
        <div class="col-md-12">
        <?php
        if(isset($_GET['page'])){
          $page = $_GET['page'];
        }else{
          $page = 1;
        }
        $offset = ($page - 1) * $limit;
        // Sorgu seçimi
        $sql = "SELECT kitap_odunc_verme.odunc_id,kitap_odunc_verme.odunc_durum,kitap_odunc_verme.odunc_adi,kitap_odunc_verme.odunc_kitap,
                kitap_odunc_verme.odunc_verme_tarihi,kitap_odunc_verme.odunc_geri_alma_tarihi,ogrenciler.ogrenci_id,ogrenciler.ogrenci_telefon,ogrenciler.ogrenci_email,ogrenciler.ogrenci_adi,kitap.kitap_adi FROM kitap_odunc_verme
                LEFT JOIN ogrenciler ON kitap_odunc_verme.odunc_adi = ogrenciler.ogrenci_id
                LEFT JOIN kitap ON kitap_odunc_verme.odunc_kitap = kitap.kitap_id
                ORDER BY kitap_odunc_verme.odunc_id DESC LIMIT {$offset}, {$limit}";
        $result = mysqli_query($conn, $sql) or die("SQL sorgusu başarısız oldu."); ?>
          <table class="content-table">
              <thead>
                <th>Ö.No</th>
                <th>Öğrenci Adı</th>
                <th>Kitap Adı</th>
                <th>Telefon No</th>
                <th>E-mail</th>
                <th>Ödünç Verme Tarihi</th>
                <th>İade Tarihi</th>
                <th>Durum</th>
                <th>Görüntüle</th>
                <th>Sil</th>
              </thead>
              <tbody>
                <?php if(mysqli_num_rows($result) > 0){
                $serial = $offset + 1;
                while($row = mysqli_fetch_assoc($result)) { 
                  if((date('Y-m-d') > $row['odunc_geri_alma_tarihi']) && $row['odunc_durum'] == "N"){
                  $over = 'style="background:rgba(255,0,0,0.2)"';
                  }else{ $over = ''; } ?>
                <tr <?php echo $over; ?>>
                  <td><?php echo $serial; ?></td>
                  <td style="width: 150px;" class = "text-center"><?php echo $row['ogrenci_adi']; ?></td>
                  <td><?php echo $row['kitap_adi']; ?></td>
                  <td style="width: 150px;"><?php echo $row['ogrenci_telefon']; ?></td>
                  <td class = "text-center"><?php echo $row['ogrenci_email']; ?></td>
                  <td><?php echo date('d-m-Y',strtotime($row['odunc_verme_tarihi'])); ?></td>
                  <td style="width: 110px;"><?php echo date('d-m-Y',strtotime($row['odunc_geri_alma_tarihi'])); ?></td>
                  <td>
                  <?php if($row['odunc_durum'] == 'Y'){
                    echo "<span class='badge badge-success'>İade Edildi</span>";
                  }else{
                    echo "<span class='badge badge-danger'>Ödünç Verildi</span>";
                  } ?>
                  </td>
                  <td class="edit">
                    <a href="odunc_kitap_guncelle.php?iid=<?php echo $row['odunc_id']; ?>"  class="btn btn-success">Görüntüle</a>
                  </td>
                  <td class="delete">
                    <a href="odunc_kitap_sil.php?iid=<?php echo $row['odunc_id']; ?>" class="btn btn-danger">Sil</a>
                  </td>
                </tr>
                <?php
                    $serial++;
                  }
                }else{ ?>
                  <tr>
                    <td colspan="10">Ödünç Verilen Kitap Bulunmamaktadır</td>
                  </tr>
                <?php } ?>
              </tbody>
          </table>
        <?php // Sayfalama işlemi yapılmıştır.
        $sql1 = "SELECT * FROM kitap_odunc_verme";
        $result1 = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($result1) > 0){
          $total_records = mysqli_num_rows($result1);
          $total_page = ceil($total_records / $limit);
          if($total_page > 1){
            $pagination =  "<ul class='pagination admin-pagination'>";
            if($page > 1){ // Önceki düğmeyi göster
              $pagination .= '<li class=""><a href="kitap_odunc.php?page='.($page - 1).'">Önceki</a></li>';
            }
            for($i = 1; $i <= $total_page; $i++){
              if($i == $page){
                $active = "active";
              }else{
                $active = "";
              }
              $pagination .= '<li class="'.$active.'"><a href="kitap_odunc.php?page='.$i.'">'.$i.'</a></li>';
            }
            if($total_page > $page){ // Sonraki düğmeyi göster
              $pagination .= '<li class=""><a href="kitap_odunc.php?page='.($page + 1).'">Sonraki</a></li>';
            }
            $pagination .= "</ul>";
            echo $pagination;
          }
        } ?>
        </div>
      </div>
    </div>
</div>
<?php include "footer.php" ?> <!-- footer -->
