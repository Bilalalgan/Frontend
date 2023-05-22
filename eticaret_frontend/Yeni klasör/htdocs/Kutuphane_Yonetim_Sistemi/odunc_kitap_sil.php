<?php
  include "veritabani_baglantisi.php"; // veritabanı yapılandırması

  $odunc_id = $_GET['iid'];
  //delete query
  $sql = "DELETE FROM kitap_odunc_verme WHERE odunc_id = '{$odunc_id}'";
  if(mysqli_query($conn, $sql)){
    header("$base_url/kitap_odunc.php");
  }else{
    echo "<p style='color: red; margin: 10px 0;'>Kitap ödünç alma kaydı silinemedi.</p>";
  }
mysqli_close($conn);
?>
