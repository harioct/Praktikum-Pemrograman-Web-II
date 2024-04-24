<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_POST["submit"])) {
        $nilaiSuhu = $_POST["nilai"];
        $dariSuhu = $_POST["dari"];
        $keSuhu = $_POST["ke"];
    }
    ?>
    <form action="" method="post">
        Nilai: <input type="text" name="nilai" <?php if (isset($nilaiSuhu)) echo $nilaiSuhu; ?>><br>
        Dari :<br>
        <input type="radio" name="dari" value="celcius" <?php if (isset($dariSuhu) && $dariSuhu == "celcius") echo "checked"; ?>> Celcius<br>
        <input type="radio" name="dari" value="fahrenheit" <?php if (isset($dariSuhu) && $dariSuhu == "fahrenheit") echo "checked"; ?>> Fahrenheit<br>
        <input type="radio" name="dari" value="rheamur" <?php if (isset($dariSuhu) && $dariSuhu == "rheamur") echo "checked"; ?>> Rheamur<br>
        <input type="radio" name="dari" value="kelvin" <?php if (isset($dariSuhu) && $dariSuhu == "kelvin") echo "checked"; ?>> Kelvin<br>
        Ke :<br>
        <input type="radio" name="ke" value="celcius" <?php if (isset($keSuhu) && $keSuhu == "celcius") echo "checked"; ?>> Celcius<br>
        <input type="radio" name="ke" value="fahrenheit" <?php if (isset($keSuhu) && $keSuhu == "fahrenheit") echo "checked"; ?>> Fahrenheit<br>
        <input type="radio" name="ke" value="rheamur" <?php if (isset($keSuhu) && $keSuhu == "rheamur") echo "checked"; ?>> Rheamur<br>
        <input type="radio" name="ke" value="kelvin" <?php if (isset($keSuhu) && $keSuhu == "kelvin") echo "checked"; ?>> Kelvin<br>
        <button type="submit" name="submit">Konversi</button>
    </form>
    <?php
    if (isset($_POST["submit"])) {
        $celciusKeFahrenheit = 9 / 5 * $nilaiSuhu + 32;
        $celciusKeRheamur = 4 / 5 * $nilaiSuhu;
        $celciusKeKelvin = $nilaiSuhu + 273.15;
        $fahrenheitKeCelcius = ($nilaiSuhu - 32) * 5 / 9;
        $fahrenheitKeRheamur = 4 / 9 * ($nilaiSuhu - 32);
        $fahrenheitKeKelvin = ($nilaiSuhu + 459.67) * 5 / 9;
        $rheamurKeCelcius = $nilaiSuhu / 0.8;
        $rheamurKeFahrenheit = ($nilaiSuhu * 2.25) + 32;
        $rheamurKeKelvin = ($nilaiSuhu / 0.8) + 273.15;
        $kelvinKeCelcius = $nilaiSuhu - 273.15;
        $kelvinKeFahrenheit = ($nilaiSuhu * 9 / 5) - 459.67;
        $kelvinKeRheamur = $nilaiSuhu * 9 / 5;

        if ($dariSuhu == "celcius") {
            if ($keSuhu == "celcius") {
                echo "<h2>Hasil Konversi: $nilaiSuhu ºC</h2>";
            } else if ($keSuhu == "fahrenheit") {
                echo "<h2>Hasil Konversi: $celciusKeFahrenheit ºF</h2>";
            } else if ($keSuhu == "rheamur") {
                echo "<h2>Hasil Konversi: $celciusKeRheamur ºR</h2>";
            } else if ($keSuhu == "kelvin") {
                echo "<h2>Hasil Konversi: $celciusKeKelvin ºK</h2>";
            }
        } else if ($dariSuhu == "fahrenheit") {
            if ($keSuhu == "celcius") {
                echo "<h2>Hasil Konversi: $fahrenheitKeCelcius ºC</h2>";
            } else if ($keSuhu == "fahrenheit") {
                echo "<h2>Hasil Konversi: $nilaiSuhu ºF</h2>";
            } else if ($keSuhu == "rheamur") {
                echo "<h2>Hasil Konversi: $fahrenheitKeRheamur ºR</h2>";
            } else if ($keSuhu == "kelvin") {
                echo "<h2>Hasil Konversi: $fahrenheitKeKelvin ºK</h2>";
            }
        } else if ($dariSuhu == "rheamur") {
            if ($keSuhu == "celcius") {
                echo "<h2>Hasil Konversi: $rheamurKeCelcius ºC</h2>";
            } else if ($keSuhu == "fahrenheit") {
                echo "<h2>Hasil Konversi: $rheamurKeFahrenheit ºF</h2>";
            } else if ($keSuhu == "rheamur") {
                echo "<h2>Hasil Konversi: $nilaiSuhu ºR</h2>";
            } else if ($keSuhu == "kelvin") {
                echo "<h2>Hasil Konversi: $rheamurKeKelvin ºK</h2>";
            }
        } else if ($dariSuhu == "kelvin") {
            if ($keSuhu == "celcius") {
                echo "<h2>Hasil Konversi: $kelvinKeCelcius ºC</h2>";
            } else if ($keSuhu == "fahrenheit") {
                echo "<h2>Hasil Konversi: $kelvinKeFahrenheit ºF</h2>";
            } else if ($keSuhu == "rheamur") {
                echo "<h2>Hasil Konversi: $kelvinKeRheamur ºR</h2>";
            } else if ($keSuhu == "kelvin") {
                echo "<h2>Hasil Konversi: $nilaiSuhu ºK</h2>";
            }
        }
    }
    ?>
</body>
</html>