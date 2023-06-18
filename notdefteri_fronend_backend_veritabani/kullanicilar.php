<?php
session_start();
?>

<html>
<head>
<meta charset="UTF-8">
<title>Not Defteri</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="d-flex justify-content-center align-items-center">
  <div class="w-75 Card bg-light">
      <div class = "card-header d-flex  d-flex justify-content-between">
				<h1 class="text-dark"> Not Defteri</h1>
			</div>
      
      <?php include_once 'menu-main.php';?><br><br>
      <h3 class="my-3 text-center">Kullanıcı</h3>
    <table class="table mb-5 p-5">
      <thead>
        <tr>
          <th><strong>İsim</strong></th>
          <th><strong>Kullanıcı Adı</strong></th>
          <th><strong>Email</strong></th>
          <th>Ayarlar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require_once 'db.php';
        $profileid = $_SESSION['contact_id'];
        $query = "SELECT * FROM kullanici_tablosu WHERE contact_id='$profileid'";
        $result = mysqli_query($con, $query);

        if (!$result || mysqli_num_rows($result) != 1) {
          echo '<tr><td colspan="4">User not found.</td></tr>';
        } else {
          $row = mysqli_fetch_assoc($result);
          ?>
          <tr>
            <td><?php echo $row["name"];?></td>
            <td><?php echo $row["kullanici_adi"];?></td>
            <td><?php echo $row["email"];?></td>
            <td>
              <a href="profilguncelle.php?editProfile=<?php echo $row["contact_id"]; ?>" id="edt">Güncelle</a>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>

