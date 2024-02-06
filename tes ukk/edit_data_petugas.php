<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Petugas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                    <a class="nav-link" href="dashboard_admin.php">Home  <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data_petugas.php">Data Petugas</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <?php
        include 'koneksi.php';

        if (isset($_GET['userID'])) {
            $userID = $_GET['userID'];
            $queryEdit = "SELECT * FROM user WHERE userID = '$userID'";
            $resultEdit = $koneksi->query($queryEdit);

            if ($resultEdit->num_rows > 0) {
                $dataEdit = $resultEdit->fetch_assoc();
        ?>
                <form method="post" action="proses_edit_petugas.php">
                    <input type="hidden" name="userID" value="<?php echo $dataEdit['userID']; ?>">

                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $dataEdit['username']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password">
                        <small class="text-danger text-sm">* Kosongkan jika tidak ingin mengubah password</small>
                    </div>

                    <div class="form-group">
                        <label for="level">Akses Petugas:</label>
                        <select name="level" class="form-control">
                            <option value="1" <?php if ($dataEdit['role'] == '1') echo "selected"; ?>>Administrator</option>
                            <option value="2" <?php if ($dataEdit['role'] == '2') echo "selected"; ?>>Petugas</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Petugas</button>
                </form>
        <?php
            } else {
                echo "Data petugas tidak ditemukan.";
            }
        } else {
            echo "ID Petugas tidak tersedia.";
        }

        $koneksi->close();
        ?>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>
</body>
</html>
