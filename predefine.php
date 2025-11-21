<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Predefine Variable</title>
</head>
<body>
    <h1>Predefine Variable</h1>

    <?php
    if (isset($_GET['nama'])) {
        echo 'Selamat Datang ' . $_GET['nama'];
    } else {
        echo 'Selamat Datang, Alanshary';
    }
    ?>
</body>
</html>