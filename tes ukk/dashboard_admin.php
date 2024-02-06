<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="stylee.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <div class="container">
        <h2 class="text-center primary ">Welcome, Admin!</h2>
        
        <nav>
            <ul class= "row justify-content-evenly" >
                
                <li class="col-auto m-0"><a href="pembelian.php">Pembelian</a></li>
                <li class="col-auto m-0"><a href="stock_barang.php">Stok Barang</a></li>
                <li class="col-auto m-0"><a href="detail_penjualan.php">Detail Penjualan</a></li>
                <li class="col-auto m-0"><a href="data_petugas.php">Data Petugas</a></li>
                <li class="col-auto m-0"><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>