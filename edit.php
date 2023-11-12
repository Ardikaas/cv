<?php
  session_start();
  include_once('config.php');
  if(!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
  }
function getCVData()
{
  global $conn;
  $query = "SELECT * FROM cv_data WHERE id = 1";
  $final = mysqli_query($conn, $query);
  return mysqli_fetch_array($final);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = htmlspecialchars($_POST['nama']);
  $alamat = htmlspecialchars($_POST['alamat']);
  $telepon = htmlspecialchars($_POST['telepon']);
  $email = htmlspecialchars($_POST['email']);
  $web = htmlspecialchars($_POST['web']);
  $pendidikan = htmlspecialchars($_POST['pendidikan']);
  $pengalaman_kerja = htmlspecialchars($_POST['pengalaman_kerja']);
  $keterampilan = htmlspecialchars($_POST['keterampilan']);
  $foto_path = htmlspecialchars($_POST['foto_path']);

  $query = "UPDATE cv_data SET 
        nama = ?, 
        alamat = ?, 
        telepon = ?, 
        email = ?, 
        web = ?, 
        pendidikan = ?, 
        pengalaman_kerja = ?, 
        keterampilan = ?, 
        foto_path = ? 
        WHERE id = 1";

  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "sssssssss", $nama, $alamat, $telepon, $email, $web, $pendidikan, $pengalaman_kerja, $keterampilan, $foto_path);

  if (mysqli_stmt_execute($stmt)) {
    echo 'Data berhasil diperbarui';
    print 'Data berhasil diperbarui';
  } else {
    echo 'Terjadi kesalahan saat memperbarui data';
    print'Data gagal diperbarui';
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);

  header('Location: index.php');
  exit();
}

$data = getCVData();
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
    <input type="text" value="<?php echo $data['nama']?>" name="nama" id="nama" required>
    <input type="text" value="<?php echo $data['alamat']?>" name="alamat" id="alamat" required>
    <input type="text" value="<?php echo $data['telepon']?>" name="telepon" id="telepon" required>
    <input type="text" value="<?php echo $data['email']?>" name="email" id="email" required>
    <input type="text" value="<?php echo $data['web']?>" name="web" id="web" required>
    <input type="text" value="<?php echo $data['pendidikan']?>" name="pendidikan" id="pendidikan" required>
    <input type="text" value="<?php echo $data['pengalaman_kerja']?>" name="pengalaman_kerja" id="pengalaman_kerja" required>
    <input type="text" value="<?php echo $data['keterampilan']?>" name="keterampilan" id="keterampilan" required>
    <input type="text" value="<?php echo $data['foto_path']?>" name="foto_path" id="foto_path" required>
    <button type="submit">Update</button>
  </form>
</body>
</html>