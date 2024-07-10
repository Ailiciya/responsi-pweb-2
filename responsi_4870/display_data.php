<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "responsi_4870";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT karyawan_4870.NIK, karyawan_4870.NAMA_KARYAWAN, jobs_4870.NAMA_JOB 
        FROM karyawan_4870 
        INNER JOIN jobs_4870 ON karyawan_4870.ID_JOB = jobs_4870.ID_JOB";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Display Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="my-4">Data Karyawan</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>NIK</th>
                    <th>Nama Karyawan</th>
                    <th>Nama Job</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $row['NIK'] ?></td>
                            <td><?= $row['NAMA_KARYAWAN'] ?></td>
                            <td><?= $row['NAMA_JOB'] ?></td>
                        </tr>
                <?php } } else { ?>
                    <tr>
                        <td colspan="3">No data found</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>