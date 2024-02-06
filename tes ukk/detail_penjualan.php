<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penjualan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Detail Penjualan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard_admin.php">Home</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Detail Penjualan</h2>
        
        <?php
        if (isset($_GET['penjualanID'])) {
            $penjualanID = $_GET['penjualanID'];
            $queryDetail = "SELECT * FROM kasir_penjualan WHERE penjualanID = '$penjualanID'";
            $resultDetail = $koneksi->query($queryDetail);

            if ($resultDetail->num_rows > 0) {
                $dataDetail = $resultDetail->fetch_assoc();
        ?>
                <table class="table">
                    <tr>
                        <th>ID Penjualan</th>
                        <td><?php echo $dataDetail['penjualanID']; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Penjualan</th>
                        <td><?php echo $dataDetail['tanggalpenjualan']; ?></td>
                    </tr>
                    <tr>
                        <th>Total Harga</th>
                        <td><?php echo $dataDetail['totalharga']; ?></td>
                    </tr>
                </table>

                <h4>Daftar Barang:</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $queryBarang = "SELECT b.namabarang, dp.jumlah FROM detailpenjualan dp JOIN barang b ON dp.barangID = b.id WHERE dp.penjualanID = '$penjualanID'";
                        $resultBarang = $koneksi->query($queryBarang);
                        $no = 1;

                        while ($rowBarang = $resultBarang->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . $rowBarang['namabarang'] . "</td>";
                            echo "<td>" . $rowBarang['jumlah'] . "</td>";
                            // Add more cells if needed
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
        <?php
            } else {
                echo "Detail penjualan tidak ditemukan.";
            }
        } else {
            echo "ID Penjualan tidak tersedia.";
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
