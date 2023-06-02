<?php
session_start();
unset($_SESSION);
session_unset();
unset($_SESSION['loggedin']);
session_destroy();
setcookie("remember_token", "", time()-3600);
header("Location: login.php");
die();
?>