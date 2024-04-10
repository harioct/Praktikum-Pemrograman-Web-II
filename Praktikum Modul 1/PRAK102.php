<?php
    $jari_jari = 3.5;
    $tinggi = 5.4;
    
    $volume = 1/3 * M_PI * pow($jari_jari, 2) * $tinggi;

    echo number_format($volume, 3)." m3";
?>