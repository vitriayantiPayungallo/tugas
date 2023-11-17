<?php
include_once "init.php";
$id = $_GET['id'];
$query = "SELECT * FROM mahasiswa WHERE id='$id'";
$result = mysqli_query($koneksi_ke_db, $query);
$getbyid = mysqli_fetch_assoc($result);

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];

    $query_update = "UPDATE mahasiswa SET nama='$nama', nim='$nim', alamat='$alamat' WHERE id='$id'";
    mysqli_query($koneksi_ke_db, $query_update);
    header("Location: index.php");
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<h1>Edit Mahasiswa</h1>

<form method="POST">
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" value="<?php echo $getbyid['nama']; ?>" required>

    <label for="nim">NIM:</label>
    <input type="text" id="nim" name="nim" value="<?php echo $getbyid['nim']; ?>" required>

    <label for="alamat">Alamat:</label>
    <input type="text" id="alamat" name="alamat" value="<?php echo $getbyid['alamat']; ?>" required>

    <button type="submit" name="simpan">Simpan</button>
</form>

</body>
</html>
