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
    $namaproduk_baru = $_POST['namaproduk'];
    $harga_baru = $_POST['harga'];
    $stok_baru = $_POST['stok'];

   
    $query_update = "UPDATE kasir_produk SET namaproduk = '$namaproduk_baru', harga = '$harga_baru', stok = '$stok_baru' WHERE produkID = $produkID";
    $result_update = mysqli_query($koneksi, $query_update);

    if ($result_update) {
   
        header("Location: stock_barang.php");
        exit();
    } else {
        $error_message = "Gagal melakukan update produk.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
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
    <h2 class="mb-4">Edit Produk</h2>

    <?php if (isset($error_message)) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>

    <!-- Formulir Edit Produk -->
    <form action="" method="post">
        <div class="form-group">
            <label for="namaproduk">Nama Produk:</label>
            <input type="text" class="form-control" id="namaproduk" name="namaproduk" value="<?php echo $namaproduk; ?>" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $harga; ?>" required>
        </div>
        <div class="form-group">
            <label for="stok">Stok:</label>
            <input type="text" class="form-control" id="stok" name="stok" value="<?php echo $stok; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Produk</button>
    </form>
</div>

</body>
</html>
