<?php
$host = "localhost";
$user = "root";
$pass = "root";
$db = "dbtus";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Koneksi Gagal");
}

