<?php
    require_once 'admin/connect.php';
    if (isset($_POST['add_guest'])) {
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $contactno = $_POST['contactno'];
        $checkin = $_POST['date'];
        $conn->query("INSERT INTO `guest` (firstname, middlename, lastname, address, contactno) VALUES ('$firstname', '$middlename', '$lastname', '$address', '$contactno')") or die(mysqli_error($conn));
        $conn->set_charset("utf8mb4"); // Karakter kümesi ayarını burada yapın
        $query = $conn->query("SELECT * FROM `guest` WHERE `firstname` = '$firstname' COLLATE utf8mb4_unicode_ci AND `lastname` = '$lastname' COLLATE utf8mb4_unicode_ci AND `contactno` = '$contactno' COLLATE utf8mb4_unicode_ci") or die(mysqli_error($conn));
        $fetch = $query->fetch_array();
        $query2 = $conn->query("SELECT * FROM `transaction` WHERE `checkin` = '$checkin' AND `room_id` = '$_REQUEST[room_id]' AND `status` = 'Beklemede'") or die(mysqli_error($conn));
        $row = $query2->num_rows;
        if ($checkin < date("Y-m-d", strtotime('+8 HOURS'))) {
            echo "<script>alert('Geçerli bir tarih seçmelisiniz.')</script>";
        } else {
            if ($row > 0) {
                echo "<div class='col-md-4'>
                    <label style='color:#ff0000;'>Müsait olmayan bir tarih seçtiniz.</label><br />";
                $q_date = $conn->query("SELECT * FROM `transaction` WHERE `status` = 'Beklemede'") or die(mysqli_error($conn));
                while ($f_date = $q_date->fetch_array()) {
                    echo "<ul>
                        <li>
                            <label class='alert-danger'>" . date("M d, Y", strtotime($f_date['checkin'] . "+8HOURS")) . "</label>    
                        </li>
                    </ul>";
                }
                echo "</div>";
            } else {
                if ($guest_id = $fetch['guest_id']) {
                    $room_id = $_REQUEST['room_id'];
                    $conn->query("INSERT INTO `transaction`(guest_id, room_id, status, checkin) VALUES ('$guest_id', '$room_id', 'Beklemede', '$checkin')") or die(mysqli_error($conn));
                    header("location: reply_reserve.php");
                } else {
                    echo "<script>alert('Bir JavaScript hatası oluştu!')</script>";
                }
            }
        }
    }
?>
