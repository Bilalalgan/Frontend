<?php
session_start();

require 'db.php';
$query = "SELECT notu_id FROM not_tablosu";
$result = mysqli_query($con, $query); // Use mysqli_query() instead of mysql_query()
$row = mysqli_num_rows($result); // Use mysqli_num_rows() instead of mysql_num_rows()

?>
<html>
<head>
<meta charset="UTF-8">
<title>Not Defteri</title>
<link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="d-flex justify-content-center align-items-center">

  <div class="w-75 Card bg-light" style = "height:500px">
    <div class = "card-header d-flex  d-flex justify-content-between">
      <h1 class="text-dark"> Not Defteri</h1>
      <?php echo '<p class="text-dark mt-3 fs-4">Hoşgeldin: <b>' . $_SESSION['kullanici_adi'] . '</b></p>';?>
    </div>
    <?php include_once 'menu-main.php';     ?>
    <div class = "d-flex justify-content-center align-items-center h-75">
      <div class="text-dark border p-5 text-center"><h2>Toplam Not<h2> <?php echo '<span>' . $row . '</span>'; ?></p></div>
    </div>
    
  </div>

</body>
</html>
