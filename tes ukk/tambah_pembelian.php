<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggalpenjualan = $_POST["tanggalpenjualan"];
    $totalharga = $_POST["totalharga"];
    $pelanggan = $_POST["pelanggan"];
    $produk = $_POST["produk"];
    $jumlah_produk = $_POST["jumlah_produk"];

    // Periksa apakah pelanggan yang dimasukkan ada dalam database
    $queryCheckPelanggan = "SELECT pelangganID FROM kasir_pelanggan WHERE namapelanggan = '$pelanggan'";
    $resultCheckPelanggan = mysqli_query($koneksi, $queryCheckPelanggan);
    if(mysqli_num_rows($resultCheckPelanggan) > 0) {
        $row = mysqli_fetch_assoc($resultCheckPelanggan);
        $pelangganID = $row["pelangganID"];

        // Gunakan prepared statement untuk mencegah SQL Injection
        $query = "INSERT INTO kasir_penjualan (tanggalpenjualan, totalharga, pelangganID) VALUES (?, ?, ?)";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("ssi", $tanggalpenjualan, $totalharga, $pelangganID);
        if ($stmt->execute()) {
            // Insert ke dalam detail pembelian jika penjualan berhasil ditambahkan
            $last_id = $koneksi->insert_id;
            $query_detail = "INSERT INTO kasir_detailpenjualan (penjualanID, produkID, subtotal) VALUES (?, ?, ?)";
            $stmt_detail = $koneksi->prepare($query_detail);
            $stmt_detail->bind_param("iii", $last_id, $produk, $jumlah_produk);
            if ($stmt_detail->execute()) {
                echo "Pembelian berhasil ditambahkan!";
            } else {
                echo "Error: " . $stmt_detail->error;
            }
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Nama pelanggan tidak ditemukan.";
    }

    $koneksi->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pembelian</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="dashboard_admin.php">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4">Tambah Pembelian</h2>
        <form method="post" action="tambah_pembelian.php">
            <div class="form-group">
                <label for="tanggalpenjualan">Tanggal Pembelian:</label>
                <input type="date" class="form-control" name="tanggalpenjualan" required>
            </div>

            <div class="form-group">
                <label for="totalharga">Total Harga:</label>
                <input type="number" class="form-control" name="totalharga" required>
            </div>

            <div class="form-group">
                <label for="pelanggan">Nama Pelanggan:</label>
                <input type="text" class="form-control" name="pelanggan" required>
            </div>

            <div class="form-group">
                <label for="produk">Pilih Produk:</label>
                <select class="form-control" name="produk">
                    <?php
                    include 'koneksi.php';

                    $queryProduk = "SELECT produkID, namaproduk FROM kasir_produk";
                    $resultProduk = $koneksi->query($queryProduk);

                    while ($rowProduk = $resultProduk->fetch_assoc()) {
                        echo "<option value='" . $rowProduk['produkID'] . "'>" . $rowProduk['namaproduk'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="jumlah_produk">Jumlah Produk:</label>
                <input type="number" class="form-control" name="jumlah_produk" required>
            </div>

            <button type="submit" class="btn btn-primary" >Tambah Pembelian</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
