<?php
include('koneksi.php');

$query = "SELECT * FROM kasir_produk";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="dashboard_admin.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tambah_barang.php">Tambah Barang</a>
            </li>
            
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="mb-4">Dashboard - Daftar Produk</h2>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php  $i = 1;    ?>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                <td><?php echo $i++; ?></td> 
                    <td><?php echo $row['namaproduk']; ?></td>
                    <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                    <td><?php echo $row['stok']; ?></td>
                    <td>
                <a href="edit_produk.php?id=<?php echo $row['produkID']; ?>" class="btn btn-warning">Edit</a>
                <a href="hapus_produk.php?id=<?php echo $row['produkID']; ?>" class="btn btn-danger">Hapus</a>
            </td> 
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
