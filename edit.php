<?php
  session_start();
  include_once('config.php');
  if(isset($_SESSION['login'])) {
    $final = mysqli_query($conn, "SELECT * FROM cv_data WHERE id = 1");
    $data = mysqli_fetch_array($final);
  }else{
    header("Location: index.php");
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Curriculum Vitae | Edit</title>
</head>
<body>
  <form action="" method="post">
    <input type="text" value="hello">
  </form>
</body>
</html>