<?php
  include "veritabani_baglantisi.php"; // veritabanı yapılandırması

  $yayinevi_id = $_POST['yayinevi_id'];
  // Yayıncı adının kitaplar tablosunda kullanıldığını kontrol eden kısım
  $check = "SELECT * FROM kitap WHERE kitap_yayinevi = '{$yayinevi_id}'";
  $result = mysqli_query($conn, $check);
  if(mysqli_num_rows($result) > 0){
    echo "<div class='alert alert-danger'>Bu yayınevi kaydı kitaplarda kullanıldığından dolayı yayınevi kaydı silinemiyor.</div>";
  }else{
    // sorguyu silme kısmı
    $sql = "DELETE FROM yayinevi WHERE yayinevi_id = '{$yayinevi_id}'";
    if(mysqli_query($conn, $sql)){
      echo "<div class='alert alert-success'>Yayıncı başarıyla silindi.</div>";
    }else{
      echo "<p style='color: red; margin: 10px 0;'>Server side hatası.</p>";
    }
  }
  mysqli_close($conn);
?>
