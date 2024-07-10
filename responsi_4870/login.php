<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "responsi_4870";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nik = $_POST['nik'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM karyawan_4870 WHERE NIK='$nik' AND PASSWORD='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['nik'] = $nik;
        header("Location: main.php");
    } else {
        echo "Invalid NIK or Password";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Login</h2>
        <form method="post">
            <div class="form-group">
                <label for="nik">NIK:</label>
                <input type="text" id="nik" name="nik" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>