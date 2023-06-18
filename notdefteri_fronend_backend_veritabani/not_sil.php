<?php
require 'db.php';
$getid = $_GET['deleteid'];
$query = "DELETE FROM not_tablosu WHERE notu_id = '$getid'";
$query_run = mysqli_query($con, $query); // Use mysqli_query() instead of mysql_query()
if($query_run){
	header('Location:notlar.php');
}else{
	echo 'Error while deleting user record';
}
?>
