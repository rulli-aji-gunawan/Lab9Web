<?php 
include("koneksi.php");

// query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php require('header.php') ?>
    
    <div class="container">
        <h1>Data Barang</h1>
        <nav>
            <a href="tambah.php">Tambah Barang</a><br>
        </nav>
        <div class="main">
            <table border="1" cellpadding="4" cellspacing="0">
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stock</th>
                    <th>Aksi</th>                
                </tr>
                <?php if($result): ?>
                <?php while($row = mysqli_fetch_array($result)): ?>
                <tr>
                    <td><img src="gambar/<?= $row['gambar'];?>" alt="<?= $row['nama'];?>" width="80px"></td>
                    <td><?= $row['nama'];?></td>
                    <td><?= $row['kategori'];?></td>
                    <td><?= $row['harga_beli'];?></td>
                    <td><?= $row['harga_jual'];?></td>
                    <td><?= $row['stock'];?></td>
                    <td class="aksi">
                        <a href="ubah.php?id=<?= $row['id_barang'];?>" class="ubah">Ubah</a> |
                        <a href="hapus.php?id=<?= $row['id_barang'];?>" onclick="return confirm('Apakah yakin mau menghapus data <?= $row['nama'];?> dari tabel?')" class="hapus">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; else: ?>
                <tr>
                    <td colspan="7">Belum ada data</td>
                </tr>
                <?php endif; ?>            
            </table>        
        </div>

    <?php require('footer.php') ?>


    <!-- </div>
</body>
</html> -->