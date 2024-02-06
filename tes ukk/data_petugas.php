<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Petugas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="dashboard_admin.php"> Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <?php
        include 'koneksi.php';

        $queryPetugas = "SELECT * FROM user"; 
        $resultPetugas = $koneksi->query($queryPetugas);

        if ($resultPetugas->num_rows > 0) {
        ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Petugas</th>
                        <th>Username</th>
                        <th>Akses Petugas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php   $i = 1;   ?>    
                  <?php  while ($rowPetugas = $resultPetugas->fetch_assoc()) {
                    ?>
                        <tr>
                        <td><?php echo $i++; ?></td>
                            <td><?php echo $rowPetugas['username']; ?></td>
                            <td><?php echo ($rowPetugas['role'] == '1') ? 'Admin' : 'Petugas'; ?></td>
                            <td>
                                <a href="edit_data_petugas.php?userID=<?php echo $rowPetugas['userID']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm" onclick="hapusPetugas(<?php echo $rowPetugas['userID']; ?>)">Hapus</button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else {
            echo "Data petugas tidak ditemukan.";
        }

        $koneksi->close();
        ?>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            function hapusPetugas(userID) {
                var konfirmasi = confirm("Apakah Anda yakin ingin menghapus data petugas?");
                if (konfirmasi) {
                    window.location.href = 'proses_hapus_petugas.php?userID=' + userID;
                }
            }
        </script>
    </div>
</body>
</html>
