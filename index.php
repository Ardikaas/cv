<?php

include_once('config.php');

$final = mysqli_query($conn, "SELECT * FROM cv_data ORDER BY nama ASC")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>PHP | connect</title>
</head>
<body>
    <h2>Data Pasien Klinik Sehat</h2>
    <a class="btn btn-outline-dark" href="tambah.php">Create Data</a>

    <table class="table table-dark table-striped">
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Action</th>
        </tr>
        <?php
        while ($data = mysqli_fetch_array($final)) {
            echo "<tr>";
            echo "<td>" . $data['Nama'] .  "</td>";
            echo "<td>" . $data['Alamat'] ."</td>";
            echo "<td>
                    <a class='btn btn-outline-danger' href='hapus.php?antrian=$data[antrian]'>Hapus</a> 
                    <a class='btn btn-outline-warning' href='ubah.php?antrian=$data[antrian]'>Update</a> 
                    </td>";
            echo "</tr>";
        }
    ?>
    </table>
</body>
</html>