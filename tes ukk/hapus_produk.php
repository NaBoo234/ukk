<?php
include('koneksi.php');

if (isset($_GET['id'])) {
    $produkID = $_GET['id'];

    $query = "SELECT * FROM kasir_produk WHERE produkID = $produkID";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $namaproduk = $row['namaproduk'];
        $harga = $row['harga'];
        $stok = $row['stok'];
    } else {
        header("Location: dashboard_admin.php");
        exit();
    }
} else {
    header("Location: dashboard_admin.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $query_hapus = "DELETE FROM kasir_produk WHERE produkID = $produkID";
    $result_hapus = mysqli_query($koneksi, $query_hapus);

    if ($result_hapus) {
        header("Location: stock_barang.php");
        exit();
    } else {
        $error_message = "Gagal menghapus produk.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Nama Aplikasi Anda</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="dashboard_admin.php">Dashboard</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="mb-4">Hapus Produk</h2>

    <?php if (isset($error_message)) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <label for="namaproduk">Nama Produk:</label>
        <input type="text" class="form-control" id="namaproduk" name="namaproduk" value="<?php echo $namaproduk; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="harga">Harga:</label>
        <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $harga; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="stok">Stok:</label>
        <input type="text" class="form-control" id="stok" name="stok" value="<?php echo $stok; ?>" readonly>
    </div>

    <form action="" method="post">
        <button type="submit" class="btn btn-danger">Hapus Produk</button>
    </form>
</div>

</body>
</html>
