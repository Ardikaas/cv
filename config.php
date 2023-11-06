<?php
  $host = 'localhost';
  $db = 'cv';
  $user = 'root';
  $pass = '';

  $conn = mysqli_connect($host, $user, $pass, $db);

  if (!$conn){
    die('gagal terhubung ke database'. mysqli_connect_error());
  }

?>