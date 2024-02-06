<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "kasir1";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}


function registerUser($conn, $username, $password, $role) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO user (username, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashedPassword, $role);
    $stmt->execute();
    $stmt->close();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];


    registerUser($conn, $username, $password, $role);

    echo "Registrasi berhasil!";
    

    header("Location: login.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<h1 style="text-align: center;">Registration</h1>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<body style="height: 100vh;">
    <div class="row h-80 justify-content-center align-items-center">
        <div class="col-3"> <div class="card">
        <div class="card-body"><form method="post" action="registrasi.php">
        <label>Username:</label>
        <input type="text" name="username" class="form-control" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" class="form-control"required><br><br>

        <label>Role:</label><br>
        <select name="role"class="form-control" required>
            <option value="user">Petugas</option>
            <option value="admin">Admin</option>
        </select><br><br>
        <div class="d-grid gap-2 col-6 mx-auto">
        <input type="submit"  class="btn btn-primary"value="Register">
        <a href="login.php" class="text-center" >already have account?</a>
    </div>
    </form></div>
     </div></div>
    </div>
     
</body>
</html>
