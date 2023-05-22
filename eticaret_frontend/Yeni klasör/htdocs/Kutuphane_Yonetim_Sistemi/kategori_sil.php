<?php
  include "veritabani_baglantisi.php"; // veritabanı yapılandırması

  $kategori_id= $_POST['kategori_id'];
  // Kitap tablosunda kategori adının kullanıldığını kontrol eden kısım
  $check = "SELECT * FROM kitap WHERE kitap_kategorisi = '{$kategori_id}'";
  $result = mysqli_query($conn, $check);
  if(mysqli_num_rows($result) > 0){
    echo "<div class='alert alert-danger'>Kategori kaydı silinemiyor, bu kategori kitaplarda kullanılıyor.</div>";
  }else{
    //sorguyu sil
    $sql = "DELETE FROM kategori WHERE kategori_id= '{$kategori_id}'";
    if(mysqli_query($conn, $sql)){
      echo "<div class='alert alert-success'>Yayıncı başarıyla silindi.</div>";
    }else{
      echo "<p style='color: red; margin: 10px 0;'>Server side hatası</p>";
    }
  }
mysqli_close($conn);
?>
