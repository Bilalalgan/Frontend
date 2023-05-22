<?php

  include "veritabani_baglantisi.php"; // veritabanı yapılandırması

  session_start();

  session_unset();

  session_destroy();

  header("$base_url");

?>
