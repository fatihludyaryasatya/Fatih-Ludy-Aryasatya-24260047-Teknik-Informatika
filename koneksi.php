<?php
// Koneksi database - default Laragon: host localhost, user root, password kosong
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "toko_db";

$koneksi = new mysqli($host, $user, $pass, $dbname);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
