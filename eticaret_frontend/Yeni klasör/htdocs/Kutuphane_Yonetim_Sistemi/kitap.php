<?php include "header.php" ?> <!--- header -->
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Tüm Kitaplar</h2>
            </div>
            <div class="offset-md-7 col-md-2">
                <a class="add-new" href="kitap_ekle.php">Kitap Ekle</a>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
          <div class="message"></div>
            <?php
            if(isset($_GET['page'])){
              $page = $_GET['page'];
            }else{
              $page = 1;
            }
            $offset = ($page - 1) * $limit;
            //select query
            $sql = "SELECT kitap.kitap_id, kitap.kitap_durum, kitap.kitap_adi, kitap.kitap_kategorisi, kitap.kitap_yazari, kitap.kitap_yayinevi,
                    kategori.kategori_adi, yazar.yazar_adi, yayinevi.yayinevi_adi FROM kitap
                    LEFT JOIN kategori ON kitap.kitap_kategorisi = kategori.kategori_id
                    LEFT JOIN yazar ON kitap.kitap_yazari  = yazar.yazar_id
                    LEFT JOIN yayinevi ON kitap.kitap_yayinevi = yayinevi.yayinevi_id
                    ORDER BY kitap.kitap_id DESC LIMIT {$offset}, {$limit}";

            $result = mysqli_query($conn, $sql) or die("Sql sorgusu başarısız oldu."); ?>
            <table class="content-table">
                <thead>
                  <th>Ö.No</th>
                  <th>Kitap Adı</th>
                  <th>Kategori</th>
                  <th>Yazar</th>
                  <th>Yayınevi</th>
                  <th>Durum</th>
                  <th>Düzenle</th>
                  <th>Sil</th>

                </thead>
                <tbody>
                  <?php if(mysqli_num_rows($result) > 0){ 
                  $serial = $offset + 1;
                  while($row = mysqli_fetch_assoc($result)) { ?>
                  <tr>
                    <td class="id"><?php echo $serial; ?></td>
                    <td><?php echo $row['kitap_adi'] ?></td>
                    <td><?php echo $row['kategori_adi'] ?></td>
                    <td><?php echo $row['yazar_adi'] ?></td>
                    <td class = "text-center"><?php echo $row['yayinevi_adi'] ?></td>
                    <td>
                    <?php
                    if($row['kitap_durum'] == 'Y'){
                        echo "<span class='badge badge-success'>Kullanılabilir</span>";
                    }else{
                        echo "<span class='badge badge-danger'>Ödünç Verildi</span>";
                    } ?>
                    </td>
                    <td class="edit">
                      <a href="kitap_guncelle.php?bid=<?php echo $row['kitap_id']; ?>" class="btn btn-success">Düzenle</a>
                    </td>
                    <td class="delete">
                      <a href="#" class="btn btn-danger delete-book" data-bid=<?php echo $row['kitap_id']; ?> >Sil</a>
                    </td>
                  </tr>
                <?php
                    $serial++;
                  }
                }else{ ?>
                  <tr>
                    <td colspan="8">Kitap Bulunamadı</td>
                  </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php //pagination
            $sql1 = "SELECT * FROM kitap";
            $result1 = mysqli_query($conn, $sql1);
            if(mysqli_num_rows($result1) > 0){
              $total_records = mysqli_num_rows($result1);
              $total_page = ceil($total_records / $limit);
              if($total_page > 1){
                $pagination =  "<ul class='pagination admin-pagination'>";
                if($page > 1){
                  $pagination .= '<li class=""><a href="kitap.php?page='.($page - 1).'">Önceki</a></li>';
                }
                for($i = 1; $i <= $total_page; $i++){
                  if($i == $page){
                    $active = "active";
                  }else{
                    $active = "";
                  }
                  $pagination .= '<li class="mt-3 '.$active.'"><a href="kitap.php?page='.$i.'">'.$i.'</a></li>';
                }
                if($total_page > $page){
                  $pagination .= '<li class=""><a href="kitap.php?page='.($page + 1).'">Sonraki</a></li>';
                }
                $pagination .= "</ul>";
                echo $pagination;
              }
            } ?>
          </div>
        </div>
    </div>
</div>
<!-- jquery -->
<script src="js/jquery-3.6.0.min.js" charset="utf-8"></script>
<script type="text/javascript">
//delete book script
$(".delete-book").on("click", function(){
  var kitap_id = $(this).data("bid");
  $.ajax({
    url : "kitap_sil.php",
    type : "POST",
    data : {kitap_id: kitap_id},
    success: function(data){
      $(".message").html(data);
      setTimeout(function(){ window.location.reload(); }, 2000);
    }
  });
});
</script>
<?php include "footer.php" ?> <!--- footer -->
