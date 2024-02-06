<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kasir1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil nilai dari form
$pelangganID = $_POST['pelangganID'];
$tanggalPenjualan = $_POST['tanggalPenjualan'];
$totalHarga = $_POST['totalHarga'];

// Query untuk menambahkan data baru ke dalam tabel
$sql = "INSERT INTO kasir_detailpenjualan (pelangganID, tanggalpenjualan, totalharga) VALUES ('$pelangganID', '$tanggalPenjualan', '$totalHarga')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
