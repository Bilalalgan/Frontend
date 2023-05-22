<?php
  include "veritabani_baglantisi.php"; // veritabanı yapılandırması

  $ogrenci_id = $_POST['sid'];
 //Kategori adının kitaplar tablosunda kullanıldığını kontrol eden kısım
  $check = "SELECT * FROM kitap_odunc_verme WHERE odunc_adi = '{$ogrenci_id}' AND odunc_durum='N'";
  $result = mysqli_query($conn, $check);
  if(mysqli_num_rows($result) > 0){
    echo "<div class='alert alert-danger'>Bu öğrenci silinemez çünkü bu öğrenciye bir kitap verilmiş durumda</div>";
  }else{
    //delete query
    $sql = "DELETE FROM ogrenciler WHERE ogrenci_id = '{$ogrenci_id}'";
    if(mysqli_query($conn, $sql)){
      echo "<div class='alert alert-success'>Öğrenci başarıyla silindi.</div>";
    }else{
      echo "<p style='color: red; margin: 10px 0;'>Server side hatası.</p>";
    }
  }
  mysqli_close($conn);
?>
