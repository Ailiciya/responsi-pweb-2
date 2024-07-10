<?php
session_start();

if (!isset($_SESSION['nik'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Main Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="my-4">Main Page</h2>
        <ul class="list-group">
            <li class="list-group-item"><a href="manage_karyawan.php">Manage Karyawan</a></li>
            <li class="list-group-item"><a href="display_data.php">Display Data</a></li>
        </ul>
    </div>
</body>
</html>