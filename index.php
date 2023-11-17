<?php
include_once "init.php";
//query select untuk mengambil data mahasiswa
$query_select = "SELECT * FROM mahasiswa";
$result = mysqli_query($koneksi_ke_db, $query_select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            text-decoration: none;
            padding: 5px 10px;
            margin-right: 10px;
            display: inline-block;
            border: 1px solid #333;
            background-color: #4CAF50;
            color: #fff;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <a href="tambah.php">Tambah Data</a>

    <table>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Alamat</th>
            <th>Actions</th>
        </tr>

        <?php while ($mhs = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $mhs['nama'] ?></td>
                <td><?= $mhs['nim'] ?></td>
                <td><?= $mhs['alamat'] ?></td>
                <td>
                    <a href="ubah.php?id=<?= $mhs['id'] ?>">Edit</a>
                    <a href="hapus.php?id=<?= $mhs['id'] ?>">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
// Close the database connection
mysqli_close($koneksi_ke_db);
?>
