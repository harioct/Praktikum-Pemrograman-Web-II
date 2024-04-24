<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <form action="" method="post">
        Nilai : <input type="text" name="nilai"><br>
        <button type="submit" name="submit">Konversi</button>
    </form>
    <?php
    if (isset($_POST["submit"])) {
        $nilai = $_POST["nilai"];
        if ($nilai == 0) {
            echo "<h2>Hasil: Nol</h2>";
        } else if ($nilai > 0 && $nilai < 10) {
            echo "<h2>Hasil: Satuan</h2>";
        } else if ($nilai > 10 && $nilai < 20) {
            echo "<h2>Hasil: Belasan</h2>";
        } else if ($nilai > 99 && $nilai <= 999) {
            echo "<h2>Hasil: Ratusan</h2>";
        } else if ($nilai > 999) {
            echo "<h2>Anda Menginput Melebihi Limit Bilangan</h2>";
        } else if ($nilai < 0) {
            echo "<h2>Masukkan Ulang Nilai</h2>";
        } else {
            echo "<h2>Hasil: Puluhan</h2>";
        }
    }
    ?>
</body>
</html>