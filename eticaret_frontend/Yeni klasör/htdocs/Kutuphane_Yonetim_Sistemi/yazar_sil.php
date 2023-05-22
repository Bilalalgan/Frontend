<?php
include "veritabani_baglantisi.php"; //veritabanı yapılandırması

$yazar_id = $_POST['yazar_id'];
$check = "SELECT * FROM kitap WHERE kitap_yazari = '{$yazar_id}'";
$result = mysqli_query($conn, $check);
if(mysqli_num_rows($result) > 0){
  echo "<div class='alert alert-danger'>Yazar kaydı, bu yazarın kitaplarda kullanıldığından dolayı silinemiyor.</div>";
}else{
  //delete query
  $sql = "DELETE FROM yazar WHERE yazar_id = '{$yazar_id}'";

  if(mysqli_query($conn, $sql)){
    echo "<div class='alert alert-success'>Yazar başarıyla silindi.</div>";
  }else{
    echo "<div class='alert alert-danger'>Server side hatası</div>";
  }
}
mysqli_close($conn);
?>
