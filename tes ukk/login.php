<?php

$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "kasir1";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}


function loginUser($conn, $username, $password) {
    $stmt = $conn->prepare("SELECT * FROM user WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user["password"])) {
        return $user;
    } else {
        return null;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    
    $user = loginUser($conn, $username, $password);

    if ($user) {
   
        session_start();
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["role"] = $user["role"];

   
        header("Location: dashboard_admin.php");
        exit();
    } else {

        echo '<div class = "alert alert-danger" role = "alert">Login gagal. Periksa kembali username dan password Anda.</div>';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<h1 style="text-align: center;">Login</h1>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<body style="height: 100vh;">
     <div class="row h-80 justify-content-center align-items-center">
        <div class="col-3"> <div class="card">
            <div class="card-body">
    <form method="post" action="login.php">
        <label>Username:</label>
        <input type="text" class="form-control" name="username" required><br>
        
        <label>Password:</label>
        <input type="password" class="form-control" name="password" required><br>
        
        <div class="d-grid gap-2 col-3 mx-auto">
        <input type="submit"  class="btn btn-primary" value="Login">
        <a href="registrasi.php" class="text-center" > Don't have an account yet? </a>
    </form>
</body>
</html>