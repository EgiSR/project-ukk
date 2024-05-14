<?php
include("connect.php");
session_start();

function tambahData($data)
{
    global $kode_order;
    global $meja;
    global $pelanggan;
    global $conn;
    $kode_order = $data["kode_order"];
    $meja = $data["meja"];
    $pelanggan = $data["pelanggan"];
    $pelayan = $_SESSION['id_kasir'];

    $query = "UPDATE tb_order SET pelanggan = '$pelanggan', meja = $meja, pelanggan = '$pelanggan' WHERE id_order = $kode_order";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

if (isset($_POST["submit_edit_order"])) {
    if (tambahData($_POST) > 0) {
        global $kode_order;
        $message = "<script> 
        alert('data berhasil ditambahkan')
        window.location.href = '../order'
        </script>";
    } else {
        $message = "
        <script> 
        alert('data gagal ditambahkan')
        window.location.href = '../order'
        </script>";
    }
    echo $message;
}
?>