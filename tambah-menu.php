<?php
include("proses/connect.php");

if (isset($_POST["submit_menu"])) {
    if (tambah($_POST) > 0) {
        echo "
        <script> 
        alert('data berhasil ditambahkan')
        document.location.href = 'menu'
        </script>";
    } else {
        echo "
        <script> 
        alert('data gagal ditambahkan')
        document.location.href = 'menu'
        </script>";
    }
}


function tambah($data)
{
    global $conn;
    $nama_menu = $data["nama_menu"];
    $keterangan = $data["keterangan"];
    $kategori = $data["kat_menu"];
    $harga = $data["harga"];
    $stok = $data["stok"];

    $foto = upload();
    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO tb_daftar_menu VALUES ('', '$foto', '$nama_menu', '$keterangan', '$kategori', $harga, $stok)";

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

    move_uploaded_file($tmpName, 'assets/img/' . $namaGambarBaru);

    return $namaGambarBaru;
}
?>