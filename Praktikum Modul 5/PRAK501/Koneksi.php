<?php
$datasourcename = 'mysql:host=localhost;dbname=perpus';
$username = 'root';
$password = '';

try {
    $conn = new PDO($datasourcename, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("<script>alert('Gagal tersambung dengan database: " . $e->getMessage() . "')</script>");
}