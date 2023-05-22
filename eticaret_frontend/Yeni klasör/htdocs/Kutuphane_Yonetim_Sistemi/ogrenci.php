<?php include "header.php" ?> <!-- header -->
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2 class="admin-heading">Tüm Öğrenciler</h2>
            </div>
            <div class="offset-md-6 col-md-2">
                <a class="add-new" href="ogrenci_ekle.php">Öğrenci Ekle</a>
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
              $sql = "SELECT * FROM ogrenciler ORDER BY ogrenci_id DESC LIMIT {$offset}, {$limit}";
              $result = mysqli_query($conn, $sql);
               ?>
              <div class="message"></div>
                <table class="content-table">
                    <thead>
                      <th>Ö.No</th>
                      <th>Öğrenci Adı</th>
                      <th>Cinsiyet</th>
                      <th>Telefon</th>
                      <th>E-posta</th>
                      <th>Görüntüle</th>
                      <th>Düzenle</th>
                      <th>Sil</th>

                    </thead>
                    <tbody>
                      <?php if(mysqli_num_rows($result) > 0){
                      $serial = $offset + 1;
                      while($row = mysqli_fetch_assoc($result)) { ?>
                      <tr>
                        <td class="id"><?php echo $serial; ?></td>
                        <td class = "text-center"><?php echo $row['ogrenci_adi']; ?></td>
                        <td><?php $gender = $row['ogrenci_cinsiyeti'];
                              if ($gender == 'male') {
                                  echo 'Erkek';}
                              elseif ($gender == 'female') {
                                  echo 'Kadın';} 
                              else {
                                  echo $gender;}?>
                        </td>
                        
                        <td><?php echo $row['ogrenci_telefon']; ?></td>
                        <td class = "text-center"><?php echo $row['ogrenci_email']; ?></td>
                        <td class="view">
                          <button data-sid='<?php echo $row['ogrenci_id'] ?>'  class="btn btn-primary view-btn">Görüntüle</button>
                        </td>
                        <td class="edit">
                          <a href="ogrenci_guncelle.php?sid=<?php echo $row['ogrenci_id']; ?>" class="btn btn-success">Düzenle</a>
                        </td>
                        <td class="delete">
                          <a href="#" data-sid="<?php echo $row['ogrenci_id']; ?>" class="btn btn-danger delete-student">Sil</a>
                        </td>
                      </tr>
                    <?php $serial++;
                      }
                    }else{ ?>
                      <tr>
                        <td colspan="8">Öğrenci Bulunamadı</td>
                      </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div id="modal">
                <div id="modal-form">
                  <table cellpadding="10px" width="100%"></table>
                  <div id="close-btn">X</div>
                </div>
              </div>
              <?php // Sayfalama
                $sql1 = "SELECT * FROM ogrenciler";
                $result1 = mysqli_query($conn, $sql1);
                if(mysqli_num_rows($result1) > 0){
                  $total_records = mysqli_num_rows($result1);
                  $total_page = ceil($total_records / $limit);
                  if($total_page > 1){
                    $pagination = "<ul class='pagination admin-pagination'>";
                    if($page > 1){
                      $pagination .= '<li class=""><a href="ogrenci.php?page='.($page - 1).'">Önceki</a></li>';
                    }
                      for($i = 1; $i <= $total_page; $i++){
                        if($i == $page){
                          $active = "active";
                        }else{
                          $active = "";
                        }
                        $pagination .= '<li class="mt-3 '.$active.'"><a href="ogrenci.php?page='.$i.'">'.$i.'</a></li>';
                      }
                    if($total_page > $page){
                      $pagination .= '<li class="mt-3"><a href="ogrenci.php?page='.($page + 1).'">Sonraki</a></li>';
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
      // Öğrenci detaylarını göster
      $(".view-btn").on("click", function(){
        var ogrenci_id = $(this).data("sid");
        $.ajax({
          url : "ogrenci_goster.php",
          type : "POST",
          data : {ogrenci_id: ogrenci_id},
          success: function(data){
            $("#modal-form table").html(data);
            $("#modal").show();
          }
        });
      });

      // Modal kutusunu gizle
      $('#close-btn').on("click",function(){
        $("#modal").hide();
      });

      // Öğrenci skripti'ni sil
      $(".delete-student").on("click", function(){
        var s_id = $(this).data("sid");
        $.ajax({
          url : "ogrenci_sil.php",
          type : "POST",
          data : {sid: s_id},
          success: function(data){
            $(".message").html(data);
            setTimeout(function(){ window.location.reload(); }, 2000);
          }
        });
      });
</script>
<?php include "footer.php" ?> <!-- footer -->
