<?php
ob_start();
require_once 'db.php';

if (isset($_GET['editProfile'])) {
    $editid = $_GET['editProfile'];

    // Kullanıcı bilgilerini veritabanından al
    $query = "SELECT * FROM kullanici_tablosu WHERE contact_id = '$editid'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $contact_id = $row['contact_id'];
        $fname = $row['name'];
        $uname = $row['kullanici_adi'];
        $uemail = $row['email'];
    } else {
        echo 'Kullanıcı bulanamadı.';
        exit();
    }
} else {
    echo 'Geçersiz İstek';
    exit();
}

if (isset($_POST['btnupdate'])) {
    $contact_id = $_POST['contact_id'];
    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $uemail = $_POST['uemail'];

    $qu = "UPDATE kullanici_tablosu SET name='$fname', kullanici_adi='$uname', email='$uemail' WHERE contact_id='$contact_id'";
    $run_query = mysqli_query($con, $qu);

    if ($run_query) {
        header("Location:kullanicilar.php?update=profileupdated");
        exit();
    } else {
        echo '<p class="errorMsg">Kayıt güncellenirken bir hata oluştu</p>';
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Not Defteri</title>
        <link rel="stylesheet" href="style.css">
        <script>
                function showConfirmation() {
                    alert("Kullanıcı Başarı İle Güncellendi");
                }
        </script>
    </head>
    <body class="d-flex justify-content-center align-items-center">
        <div class="w-75 Card bg-light" style = "height:800px">
            <div class = "card-header d-flex  d-flex justify-content-between">
                <h1 class="text-dark"> Not Defteri</h1>
            </div>

            <?php include_once 'menu-main.php';     ?>

            <div class = "d-flex justify-content-center align-items-center h-75">
                <form class="bg-white p-5 mt-5 w-50" action="<?php echo $_SERVER['PHP_SELF'] . '?editProfile=' . $editid; ?>" method="POST" onsubmit="showConfirmation()">
                    <h1 class="mb-5 text-center"> Kullanıcı Düzenle</h1>
                    <input type="hidden" name="contact_id" value="<?php echo $contact_id; ?>"><br>
                    <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">İsim</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fname" value="<?php echo $fname; ?>">
                    </div>
                    <div class="mb-3">
                            <label for="exampleInputEmail2" class="form-label">Kullanıcı Adı</label>
                            <input type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" name="uname" value="<?php echo $uname; ?>">
                    </div>
                    <div class="mb-3">
                            <label for="exampleInputEmail3" class="form-label">Mail</label>
                            <input type="text" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp" name="uemail" value="<?php echo $uemail; ?>">
                    </div>
                    <input type="submit" value="Güncelle" name="btnupdate" class="btn btn-primary">
                </form>
            </div>
            
        </div>

    </body>
</html>
