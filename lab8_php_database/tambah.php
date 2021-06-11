<?php 
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit']))
{
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual =$_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stock = $_POST['stock'];
    $file_gambar = $_FILES['file_gambar'];
    $gambar = null;
    if ($file_gambar['error'] == 0)
    {
        $filename = str_replace(' ', '_',$file_gambar['name']);
        $destination = dirname(__FILE__) .'/gambar/'. $filename;
        if(move_uploaded_file($file_gambar['tmp_name'], $destination))
        {
            // $gambar = 'gambar/'. $filename;
            $gambar = $filename;
        }
    }
    $sql = 'INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stock, gambar)';
    $sql .= "VALUE ('{$nama}','{$kategori}','{$harga_jual}','{$harga_beli}','{$stock}','{$gambar}')";
    $result = mysqli_query($conn, $sql);
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Barang</title>
</head>
<body>

    <?php require('header.php') ?>

    <div class="container">
        <h1>Tambah Barang</h1>
        <hr>
        <div class="main">
            <form method="post" action="tambah.php" enctype= "multipart/form-data">
            <div class="input">
                <label>Nama Barang</label>
                <input type="text" name="nama">
            </div>
            <div class="input">
                <label>Kategori</label>
                <select name="kategori" >
                    <option value="Komputer">Komputer</option>
                    <option value="Elektronik">Elektronik</option>
                    <option value="Hand Phone">Hand Phone</option>
                </select>
            </div>
            <div class="input">
                <label>Harga Jual</label>
                <input type="text" name="harga_jual">
            </div>
            <div class="input">
                <label>Harga Beli</label>
                <input type="text" name="harga_beli"> 
            </div>
            <div class="input">
                <label>Stock</label>
                <input type="text" name="stock">
            </div>
            <div class="input">
                <label>File Gambar</label>
                <input type="file"  class="upload" name="file_gambar" value="Cari">
            </div>
            <div class="submit">
                <input type="submit" name="submit" value="Simpan" class="btn-post">
                <button formaction="index.php">Batalkan</button>
            </div>

            </form>
        </div>

        <?php require('footer.php') ?>


        

    <!-- </div>
</body>
</html> -->


