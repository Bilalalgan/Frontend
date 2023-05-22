<?php include "header.php" ?> <!-- header -->
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Tüm Yayınevleri</h2>
            </div>
            <div class="offset-md-7 col-md-2">
                <a class="add-new" href="yayinevi_ekle.php">Yayınevi Ekle</a>
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
            // Seçim sorgusu
            $sql = "SELECT * FROM yayinevi ORDER BY yayinevi_id DESC LIMIT {$offset}, {$limit}";
            $result = mysqli_query($conn, $sql); ?>
              <table class="content-table">
                  <thead>
                    <th>Ö.No</th>
                    <th>Yayınevi Adı</th>
                    <th>Düzenle</th>
                    <th>Sil</th>
                  </thead>
                  <tbody>
                    <?php if(mysqli_num_rows($result) > 0){ 
                    $serial = $offset + 1;
                    while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <td><?php echo $serial; ?></td>
                      <td class = "text-center"><?php echo $row['yayinevi_adi']; ?></td>
                      <td class="edit">
                        <a href="yayınevi_guncelle.php?pid=<?php echo $row['yayinevi_id']; ?>" class="btn btn-success">Düzenle</a>
                      </td>
                      <td class="delete">
                        <a href="#" class="btn btn-danger delete-publisher" data-pid=<?php echo $row['yayinevi_id']; ?> >Sil</a>
                      </td>
                    </tr>
                  <?php $serial++;
                    }
                  }else{ ?>
                    <tr>
                      <td colspan="4">Yayıncı Bulunamadı</td>
                    </tr>
                  <?php } ?>
                  </tbody>
              </table>
              <?php // Sayfalandırma
                $sql1 = "SELECT * FROM yayinevi";
                $result1 = mysqli_query($conn, $sql1);
                if(mysqli_num_rows($result1) > 0){
                  $total_records = mysqli_num_rows($result1);
                  $total_page = ceil($total_records / $limit);
                  if($total_page > 1){
                    $pagination = "<ul class='pagination admin-pagination'>";
                    if($page > 1){
                      $pagination .= '<li class=""><a href="yayinevi.php?page='.($page - 1).'">Önceki</a></li>';
                    }
                    for($i = 1; $i <= $total_page; $i++){
                      if($i == $page){
                        $active = "active";
                      }else{
                        $active = "";
                      }
                      $pagination .= '<li class="'.$active.'"><a href="yayinevi.php?page='.$i.'">'.$i.'</a></li>';
                    }
                    if($total_page > $page){
                      $pagination .= '<li class=""><a href="yayinevi.php?page='.($page + 1).'">Sonraki</a></li>';
                    }
                    $pagination .= "</ul>";
                    echo $pagination;
                  }
                } ?>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery-3.6.0.min.js" charset="utf-8"></script>
<script type="text/javascript">
    // Yayınevi script'ini sil
  $(".delete-publisher").on("click", function(){
    var yayinevi_id = $(this).data("pid");
    $.ajax({
      url : "yayınevi_sil.php",
      type : "POST",
      data : {yayinevi_id: yayinevi_id},
      success: function(data){
        // Uyarı(veri);
        $(".message").html(data);
        setTimeout(function(){ window.location.reload(); }, 2000);
      }
    });
  });
</script>
<?php include "footer.php" ?> <!-- footer -->
