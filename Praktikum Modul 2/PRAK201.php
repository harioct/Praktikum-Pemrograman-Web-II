<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <form action="" method="post">
        Nama: 1 <input type="text" name="nm1"><br>
        Nama: 2 <input type="text" name="nm2"><br>
        Nama: 3 <input type="text" name="nm3"><br>
        <button type="submit" name="submit">Urutkan</button>
    </form>
    <?php
    if (isset($_POST["submit"])) {
        $nama1 = $_POST["nm1"];
        $nama2 = $_POST["nm2"];
        $nama3 = $_POST["nm3"];
        if ($nama1 < $nama2 && $nama1 < $nama3) {
            echo $nama1, "<br>";
            if ($nama2 < $nama3) {
                echo $nama2, "<br>";
                echo $nama3, "<br>";
            } else if ($nama2 > $nama3) {
                echo $nama3, "<br>";
                echo $nama2, "<br>";
            }
        }
        if ($nama2 < $nama1 && $nama2 < $nama3) {
            echo $nama2, "<br>";
            if ($nama1 < $nama3) {
                echo $nama1, "<br>";
                echo $nama3, "<br>";
            } else if ($nama1 > $nama3) {
                echo $nama3, "<br>";
                echo $nama1, "<br>";
            }
        } else if ($nama3 < $nama1 && $nama3 < $nama2) {
            echo $nama3, "<br>";
            if ($nama1 < $nama2) {
                echo $nama1, "<br>";
                echo $nama2, "<br>";
            } else if ($nama1 > $nama2) {
                echo $nama2, "<br>";
                echo $nama1, "<br>";
            }
        }
    }
    ?>
</body>
</html>