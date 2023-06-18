<?php
require_once 'db.php';
$query = "SELECT notu_id FROM not_tablosu";
$result = mysqli_query($con, $query); // Use mysqli_query() instead of mysql_query()
$row = mysqli_num_rows($result); // Use mysqli_num_rows() instead of mysql_num_rows()
?>
<div class="">
   <ul class="nav justify-content-center anamenu" data-bs-theme="dark">
      <li class="nav-item">
         <a class="nav-link active" aria-current="page" href="anasayfa.php">Anasayfa</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="not_ekle.php">Not Ekle</a> 
      </li>
      <li class="nav-item">
         <a class="nav-link d-flex" href="notlar.php">Notları Gör <?php echo '<span class= "badge text-bg-warning p-1">' . $row . '</span>'; ?></a> 
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kullanıcı
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="kullanicilar.php">Kullanıcı Gör</a></li>
            <li><a class="dropdown-item" href="sifre_degistir.php">Şifre Değiştir</a></li>
            <li><a class="dropdown-item" href="cikis.php">Çıkış Yap</a></li>
          </ul>
      </li>
   </ul>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
