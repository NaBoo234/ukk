<?php
include 'koneksi.php';

if(isset($_GET['userID'])){
    $userID = $_GET['userID'];

    $queryHapus = "DELETE FROM user WHERE userID = '$userID'";
    $hasilHapus = $koneksi->query($queryHapus);

    if ($hasilHapus) {
        header("Location: data_petugas.php?pesan=hapus");
        exit();
    } else {
        echo "Error: " . $queryHapus . "<br>" . $koneksi->error;
    }
} else {
    echo "ID Petugas tidak tersedia.";
}

$koneksi->close();
?>
