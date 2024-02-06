<?php
include('koneksi.php');

$pesan = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $query = "INSERT INTO kasir_produk (namaproduk, harga, stok) VALUES ('$nama_produk', '$harga', '$stok')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $pesan = "Produk berhasil ditambahkan!";
    } else {
        $pesan = "Gagal menambahkan produk.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Tambah Produk</h2>

    <?php if (!empty($pesan)) : ?>
        <div class="alert alert-<?php echo ($result) ? 'success' : 'danger'; ?>" role="alert">
            <?php echo $pesan; ?>
        </div>
    <?php endif; ?>

    <form action="" method="post">
        <div class="form-group">
            <label for="nama_produk">Nama Produk:</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="text" class="form-control" id="harga" name="harga" required>
        </div>
        <div class="form-group">
            <label for="stok">Stok:</label>
            <input type="text" class="form-control" id="stok" name="stok" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Produk</button>
    </form><br>

    <a href="stock_barang.php" btn btn-secondary>kembali</a>
</div>

</body>
</html>
