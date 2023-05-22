<?php

include "veritabani_baglantisi.php"; //veritabanı yapılandırması

$ogrenci_id = $_POST["ogrenci_id"];
// Seçim sorgusu
$sql = "SELECT * FROM ogrenciler WHERE ogrenci_id = {$ogrenci_id}";
$result = mysqli_query($conn, $sql) or die("SQL sorgusu başarısız oldu.");
$output = "";
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){

    if ($row['ogrenci_cinsiyeti'] == 'Erkek') {
      $cinsiyet = 'Erkek';
    } else if ($row['ogrenci_cinsiyeti'] == 'Kadın') {
      $cinsiyet = 'Kadın';
    }
    
    $output .= "<tr>
                  <td>Öğrenci Adı :</td>
                  <td>
                    <b>{$row['ogrenci_adi']}</b>
                  </td>
                </tr>
                <tr>
                  <td>Adres :</td>
                  <td>
                    <b>{$row['ogrenci_adresi']}</b>
                  </td>
                </tr>
                <tr>
                  <td>Cinsiyet :</td>
                  <td>
                    <b>{$cinsiyet}</b>
                  </td>
                </tr>
                <tr>
                  <td>Sınıf :</td>
                  <td>
                    <b>{$row['ogrenci_sinifi']}</b>
                  </td>
                </tr>
                <tr>
                  <td>Yaş :</td>
                  <td>
                    <b>{$row['ogrenci_yas']}</b>
                  </td>
                </tr>
                <tr>
                  <td>Telefon :</td>
                  <td>
                    <b>{$row['ogrenci_telefon']}</b>
                  </td>
                </tr>
                <tr>
                  <td>E-mail :</td>
                  <td>
                    <b>{$row['ogrenci_email']}</b>
                  </td>
                </tr>";
  }

  mysqli_close($conn);

  echo $output;
} else {
  echo "<h2>Kayıt Bulunamadı.</h2>";
}
?>
