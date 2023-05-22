<?php include "header.php" ?> <!--- header -->
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">Tüm Yazarlar</h2>
            </div>
            <div class="offset-md-7 col-md-2">
                <a class="add-new" href="yazar_ekle.php">Yazar Ekle</a>
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
              $sql = "SELECT * FROM yazar ORDER BY yazar_id DESC LIMIT {$offset}, {$limit}";
              $result = mysqli_query($conn, $sql); ?>
              <table class="content-table">
                  <thead>
                    <th>Ö.No</th>
                    <th>Yazar Adı</th>
                    <th>Düzenle</th>
                    <th>Sil</th>
                  </thead>
                  <tbody>
                  <?php if(mysqli_num_rows($result) > 0){
                  $serial = $offset + 1;
                    while($row= mysqli_fetch_assoc($result)){ ?>
                    <tr>
                      <td><?php echo $serial; ?></td>
                      <td class = "text-center"><?php echo $row['yazar_adi'] ?></td>
                      <td class="edit">
                        <a href="yazar_guncelle.php?aid=<?php echo $row['yazar_id']; ?>" class="btn btn-success">Düzenle</a>
                      </td>
                      <td class="delete">
                        <a href="#" class="btn btn-danger delete-author" data-aid = <?php echo $row['yazar_id'] ?>>Sil</a>
                      </td>
                    </tr>
                    <?php $serial++;
                    } 
                  }else{ ?>
                    <tr>
                      <td colspan="4">Yazar Bulunamadı</td>
                    </tr>
                  <?php } ?>
                  </tbody>
              </table>
              <?php // Sayfalama işlemi yapılmıştır.
              $sql1 = "SELECT * FROM yazar";
              $result = mysqli_query($conn, $sql1);
              if(mysqli_num_rows($result) > 0){
                $total_records = mysqli_num_rows($result);

                $total_page = ceil($total_records / $limit);
                // sayfalama göster
                if($total_page > 1){
                  $pagination =  "<ul class='pagination admin-pagination'>";
                  if($page > 1){ // Önceki düğmeyi göster
                    $pagination .= '<li class=""><a href="yazar.php?page='.($page - 1).'">Önceki</a></li>';
                  }
                  for($i = 1; $i <= $total_page; $i++){
                    if($i == $page){
                      $active = "active";
                    }else{
                      $active = "";
                    }
                    $pagination .= '<li class="'.$active.'"><a href="yazar.php?page='.$i.'">'.$i.'</a></li>';
                  }
                  if($total_page > $page){ // Sonraki düğmeyi göster
                    $pagination .= '<li class=""><a href="yazar.php?page='.($page + 1).'">Sonraki</a></li>';
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
//delete author script
$(".delete-author").on("click", function(){
  var yazar_id = $(this).data("aid");
  $.ajax({
    url : "yazar_sil.php",
    type : "POST",
    data : {yazar_id: yazar_id},
    success: function(data){
      $(".message").html(data);
      setTimeout(function(){ window.location.reload(); }, 2000);
    }
  });
});
</script>
<?php include "footer.php" ?> <!--- footer -->
