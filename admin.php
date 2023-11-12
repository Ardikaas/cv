<?php
include_once('config.php');

if(!empty($_SESSION["id"])){
  header("Location: edit.php");
}

if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $final = mysqli_query($conn, "SELECT * FROM cv_login WHERE username = '$email' OR email = '$email'");
  $data = mysqli_fetch_array($final);
  if(mysqli_num_rows($final) > 0){
    if($password == $data["pass"]){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $data["id"];
      header("Location: edit.php");
    }else{
      echo "<script> alert('email atau kata sandi yang anda masukkan salah'); </script>";
    }
  }else{
    echo "<script> alert('email atau kata sandi yang anda masukkan salah'); </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Curriculum Vitae | Login</title>
</head>
<body>
  <h2>Login</h2>
  <form class="" action="" method="post" autocomplete="off">
    <input type="text" name="email" id="email" required value="">
    <input type="password" name="password" id="password" required value="">
    <button type="submit" name="submit">Login</button>
  </form>
</body>
</html>