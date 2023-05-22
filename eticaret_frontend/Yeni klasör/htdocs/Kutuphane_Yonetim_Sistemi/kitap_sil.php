<?php

  include "veritabani_baglantisi.php"; // veritabanı yapılandırması

  $kitap_id = $_POST['kitap_id'];
  // Kitabın ödünç alınıp alınmadığını kontrol eden kısım
  $check = "SELECT * FROM kitap_odunc_verme WHERE odunc_kitap = '{$kitap_id}'";
  $result = mysqli_query($conn, $check);
  if(mysqli_num_rows($result) > 0){
    echo "<div class='alert alert-danger'>Kitap kaydı, kitap ödünç alma işlemlerinde kullanıldığından dolayı silinemez.</div>";
  }else{
    //delete query
    $sql = "DELETE FROM kitap WHERE kitap_id = '{$kitap_id}'";

    if(mysqli_query($conn, $sql)){
      echo "<div class='alert alert-success'>Kitap kaydı başarıyla silindi.</div>";
    }else{
      echo "<p style='color: red; margin: 10px 0;'>Server side hatası</p>";
    }
  }
  mysqli_close($conn);
?>
