<?php
  $host = 'localhost';
  $db = 'cv';
  $user = 'ardikaas';
  $pass = '123';

  $conn = mysqli_connect($host, $user, $pass, $db);

  if (!$conn){
    die('gagal terhubung ke database'. mysqli_connect_error());
  }

?>