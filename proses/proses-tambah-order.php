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
    $status = $data['status'];
    $query = "INSERT INTO tb_order (id_order, pelanggan, meja, pelayan, status_or) VALUES($kode_order, 
                                         '$pelanggan',
                                         $meja,
                                         '$pelayan',
                                         $status    
                                        )";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

if (isset($_POST["submit_order"])) {
    if (tambahData($_POST) > 0) {
        global $kode_order;
        $message = "<script> 
        alert('data berhasil ditambahkan')
        window.location.href = '../?x=orderitem&order=" . $kode_order . "&meja=" . $meja . "&pelanggan=" . $pelanggan . "'
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