<?php


$host = "localhost"; 
$username = "root";
$password = ""; 
$database = "kasir1";

$koneksi = mysqli_connect($host, $username, $password, $database);


if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
} else {
    echo "";
}

