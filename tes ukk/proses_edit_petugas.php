<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form edit
    $userID = $_POST['userID'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    // Buat query untuk mengupdate data petugas
    $query = "UPDATE user SET username = '$username', role = '$level'";
    
    // Jika password tidak kosong, tambahkan ke dalam query update
    if (!empty($password)) {
        $password = password_hash($password, PASSWORD_DEFAULT); // Enkripsi password baru
        $query .= ", password = '$password'";
    }

    $query .= " WHERE userID = '$userID'";

    // Jalankan query untuk mengupdate data
    if ($koneksi->query($query) === TRUE) {
        echo "Data petugas berhasil diperbarui.";
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }

    $koneksi->close();
}
?>
