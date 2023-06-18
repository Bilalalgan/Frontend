<?php
session_start();
//echo $_SESSION['kullanici_adi'];
?>
<html>

  <head>
    <meta charset="UTF-8">
    <title>Not Defteri</title>
    <link rel="stylesheet" href="style.css">
    <script>
      function ConfirmDelete() {
      return confirm("Notu Silmek İstiyor Musunuz ?");
    }
    </script>
  </head>

  <body class="d-flex justify-content-center align-items-center">
    <div class="w-75 Card bg-light">
      <div class = "card-header d-flex  d-flex justify-content-between">
				<h1 class="text-dark"> Not Defteri</h1>
			</div>
      
      <?php include_once 'menu-main.php';?><br>
      <h3 class="my-3 text-center">Notlar</h3>
      <table class="table mb-5 p-5">
        <td> <strong>İD</strong></td>
        <td><strong>İsim</strong></td>
        <td><strong>Konu</strong></td>
        <td><strong>Tarih</strong></td>
        <td><strong>Not</strong></td>
        <td><strong>Ayarlar</strong></td>
        </tr>
        </th>
        <?php
        require_once 'db.php';
        $count = 1;
        $query = "SELECT * FROM not_tablosu ORDER BY notu_adi";
        $result = mysqli_query($con, $query); // Use mysqli_query() instead of mysql_query()
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        
        <tr>
        <td id="od"> <?php echo $count; ?></td>
        <td class="ev"> <?php echo $row["notu_adi"]; ?></td>
        <td class="od"><?php echo $row["notu_konu"]; ?></td>
        <td class="ev"><?php echo $row["notu_tarihi"]; ?></td>
        <td class="od"><?php echo $row["notu_yazi"]; ?></td>
        <td class="ev">
        <a href="not_sil.php?deleteid=<?php echo $row["notu_id"]; ?> "id="del" onclick="return ConfirmDelete()">Sil</a>
      <a href="notguncelle.php?editid=<?php echo $row["notu_id"]; ?>"id="edt" >Güncelle</a>
        </td>
        </tr>
      <?php
          $count++;
        }
      ?>
    </table>
        
    </div>
  </body>
</html>

