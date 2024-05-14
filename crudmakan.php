<?php
include("proses/connect.php");
include("function.php");

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
        <script> 
        alert('data berhasil ditambahkan')
        </script>";
    } else {
        echo "
        <script> 
        alert('data gagal ditambahkan')
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah data</title>
</head>

<body>
    <h1>tambah data siswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <!--jadi ketika button submit ditekan, value akan dikirim ke array $_POST, otomatis array $_POST ada isinya dong ya kan, lalu akan dieksekusi di sintax yang ada diatas -->
        <ul>
            <li>
                <label for="nis">foto</label>
                <input type="file" name="foto" id="nis">
            </li>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama_menu" id="nama">
            </li>
            <li>
                <label for="email">keterangan</label>
                <input type="text" name="keterangan" id="email">
            </li>
            <li>
                <label for="jurusan">kategori</label>
                <input type="text" name="kategori" id="jurusan">
            </li>
            <li>
                <label for="jurusan">harga</label>
                <input type="number" name="harga" id="jurusan">
            </li>
            <li>
                <label for="jurusan">stok</label>
                <input type="number" name="stok" id="jurusan">
            </li>
        </ul>
        <button type="submit" name="submit">Submit</button>
    </form>
    <a href="index.php">kembali</a>
</body>

</html>