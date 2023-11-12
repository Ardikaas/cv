<?php

include_once('config.php');

$final = mysqli_query($conn, "SELECT * FROM cv_data ORDER BY nama ASC");
$data = mysqli_fetch_array($final);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Curicullum Vitae</title>
</head>
<body>
    <header>
        <a href="/edit.php">Edit</a>
    </header>
    <h1>Curicullum Vitae</h1>
    <div class="container">
        <div class="profile">
            <img src="<?php echo $data['foto_path'] ?>" alt="">
            <h1><?php echo $data['nama'] ?></h1>
            <div class="ttl">
                <h4><?php echo $data['email'] ?></h4>
                <h4> | </h4>
                <h4><?php echo $data['telepon'] ?></h4>
            </div>
            <div class="detail">
                <h1>Website</h1>
                <a href="<?php echo $data["web"] ?>">Portofolio</a>
                <h1>Pendidikan</h1>
                <h4><?php echo $data['pendidikan'] ?></h4>
                <h1>Pengalaman Kerja</h1>
                <h4><?php echo $data['pengalaman_kerja'] ?></h4>
                <h1>Keterampilan</h1>
                <h4><?php echo $data['keterampilan'] ?></h4>
            </div>
        </div>
    </div>
</body>
</html>