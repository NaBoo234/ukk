<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data Petugas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Hapus Data Petugas</h2>

    <?php
    include 'koneksi.php';

    if (isset($_GET['userID'])) {
        $userID = $_GET['userID'];
        $queryHapus = "DELETE FROM user WHERE userID = '$userID'";
        $hasilHapus = $koneksi->query($queryHapus);

        if ($hasilHapus) {
            echo "<div class='alert alert-success' role='alert'>Data petugas berhasil dihapus.</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error: " . $queryHapus . "<br>" . $koneksi->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning' role='alert'>ID Petugas tidak tersedia.</div>";
    }

    $koneksi->close();
    ?>

    <a href="data_petugas.php" class="btn btn-primary">Kembali ke Data Petugas</a>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
