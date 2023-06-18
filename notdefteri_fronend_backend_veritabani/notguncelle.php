<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="d-flex justify-content-center align-items-center">
    <div class="w-75 Card bg-light" style="height: 800px">
        <div class="card-header d-flex justify-content-between">
            <h1 class="text-dark">Not Defteri</h1>
        </div>
        <?php include_once 'menu-main.php'; ?>

        <div class="d-flex justify-content-center align-items-center h-75">
            <?php
            require_once 'db.php';

            if (isset($_GET['editid'])) {
                $editid = $_GET['editid'];

                // Kullanıcı bilgilerini veritabanından al
                $query = "SELECT * FROM not_tablosu WHERE notu_id = '$editid'";
                $result = mysqli_query($con, $query);

                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);

                    $notu_adi = $row['notu_adi'];
                    $notu_konu = $row['notu_konu'];
                    $notu_tarihi = $row['notu_tarihi'];
                    $notu_yazi = $row['notu_yazi'];
                } else {
                    echo 'User not found.';
                    exit();
                }
            } else {
                echo 'Invalid request.';
                exit();
            }

            if (isset($_POST['submit'])) {
                // Güncellenen bilgileri al
                $new_notu_adi = $_POST['fname'];
                $new_notu_konu = $_POST['notu_konu'];
                $new_notu_tarihi = $_POST['notu_tarihi'];
                $new_notu_yazi = $_POST['notu_yazi'];

                // Veritabanında kullanıcı bilgilerini güncelle
                $update_query = "UPDATE not_tablosu SET notu_adi='$new_notu_adi', notu_konu='$new_notu_konu', notu_tarihi='$new_notu_tarihi', notu_yazi='$new_notu_yazi' WHERE notu_id='$editid'";
                $update_result = mysqli_query($con, $update_query);

                if ($update_result) {
                    echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "Başarılı",
                                text: "Not kaydı başarıyla güncellendi.",
                                showConfirmButton: false,
                                timer: 3000
                            }).then(function() {
                                window.location.href = "notlar.php";
                            });
                          </script>';
                    exit();
                } else {
                    echo '<script>
                            Swal.fire({
                                icon: "error",
                                title: "Hata",
                                text: "Kullanıcı kaydını güncellerken bir hata oluştu.",
                                showConfirmButton: false,
                                timer: 3000
                            });
                          </script>';
                }
            }
            ?>

            <form class="bg-white p-5 mt-5 w-50" action="<?php echo $_SERVER['PHP_SELF'] . '?editid=' . $editid; ?>" method="post">
                <h1 class="mb-5 text-center">Not Düzenle</h1>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">İsim</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fname" value="<?php echo $notu_adi; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail2" class="form-label">Konu</label>
                    <input type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" name="notu_konu" value="<?php echo $notu_konu; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail3" class="form-label">Tarih</label>
                    <input type="date" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp" name="notu_tarihi" value="<?php echo $notu_tarihi; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail4" class="form-label">Not</label>
                    <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="notu_yazi" ><?php echo $notu_yazi; ?></textarea>
                </div>
                <input type="submit" value="Güncelle" name="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</body>
</html>

