<?php
include("connect.php");

function edit($data)
{
    global $conn;
    $id = $data["id"];
    $nama_menu = $data["nama_menu"];
    $keterangan = $data["keterangan"];
    $kategori = $data["kat_menu"];
    $harga = $data["harga"];
    $stok = $data["stok"];
    $gambarLama = $data["gambarLama"];

    //cek apakah ada gambar
    if ($_FILES['foto']['error'] === 4) {
        $foto = $gambarLama;
    } else {
        $foto = upload();
    }

    $query = "UPDATE tb_daftar_menu SET  foto = '$foto', 
                                              nama_menu = '$nama_menu', 
                                              keterangan = '$keterangan', 
                                              kategori = '$kategori', 
                                              harga = $harga,
                                              stok = $stok WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES["foto"]["name"];
    $tmpName = $_FILES["foto"]["tmp_name"];
    $error = $_FILES["foto"]["error"];

    //cek gambar 
    if ($error === 4) {
        echo "tidak ada gambar";
        return false;
    }


    $ekstensiGambarValid = ["jpg", "jpeg", "png"];
    $ekstensiGambar = explode(".", $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "bukan gambar";
    }

    $namaGambarBaru = uniqid();
    $namaGambarBaru .= ".";
    $namaGambarBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../assets/img/' . $namaGambarBaru);

    return $namaGambarBaru;
}

if (isset($_POST["submit_menu_edit"])) {
    if (edit($_POST) > 0) {
        echo "
        <script> 
        alert('data berhasil diedit')
        document.location.href = '../menu'
        </script>";
    } else {
        echo "
        <script> 
        alert('data gagal diedit')
        </script>";
        var_dump($_POST);
        var_dump($_FILES);

    }
}
?>