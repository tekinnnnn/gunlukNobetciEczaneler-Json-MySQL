<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "nobetcieczaneler";

$dsn = "mysql:host=$host;dbname=$dbname;charset=latin5";

try {
    $DB = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo "[HATA]: Veritabanı -".$e->getMessage();
}