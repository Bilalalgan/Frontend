<?php
session_start();
if(isset($_SESSION['kullanici_adi'])){
	session_destroy();
	header('Location:index.php');
}
// else{
	// header('Location:dashboard.php');
	// }

exit();
?>