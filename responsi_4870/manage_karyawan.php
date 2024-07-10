<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "responsi_4870";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        $nik = $_POST['nik'];
        $nama_karyawan = $_POST['nama_karyawan'];
        $password = md5($_POST['password']);
        $id_job = $_POST['id_job'];
        
        $sql = "INSERT INTO karyawan_4870 (NIK, NAMA_KARYAWAN, PASSWORD, ID_JOB) VALUES ('$nik', '$nama_karyawan', '$password', '$id_job')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['update'])) {
        $nik = $_POST['nik'];
        $nama_karyawan = $_POST['nama_karyawan'];
        $password = md5($_POST['password']);
        $id_job = $_POST['id_job'];
        
        $sql = "UPDATE karyawan_4870 SET NAMA_KARYAWAN='$nama_karyawan', PASSWORD='$password', ID_JOB='$id_job' WHERE NIK='$nik'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['delete'])) {
        $nik = $_POST['nik'];
        
        $sql = "DELETE FROM karyawan_4870 WHERE NIK='$nik'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$sql = "SELECT * FROM jobs_4870";
$jobs = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Karyawan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="my-4">Manage Karyawan</h2>
        <form method="post">
            <div class="form-group">
                <label for="nik">NIK:</label>
                <input type="text" id="nik" name="nik" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nama_karyawan">Nama Karyawan:</label>
                <input type="text" id="nama_karyawan" name="nama_karyawan" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="id_job">ID Job:</label>
                <select id="id_job" name="id_job" class="form-control">
                    <?php while($row = $jobs->fetch_assoc()) { ?>
                        <option value="<?= $row['ID_JOB'] ?>"><?= $row['NAMA_JOB'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" name="add" class="btn btn-primary">Add</button>
            <button type="submit" name="update" class="btn btn-warning">Update</button>
            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
