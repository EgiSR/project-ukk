<?php
include("connect.php");

function tambahData($data)
{
    global $kode_order;
    global $meja;
    global $pelanggan;
    global $conn;
    $id = $data["id_list_order"];
    $kode_order = $data["kode_order"];
    $meja = $data["meja"];
    $pelanggan = $data["pelanggan"];
    $menu = $data["menu"];
    $jumlah = $data["jumlah"];
    $catatan = $data["catatan"];
    $status = $data["status"];

    $query = "UPDATE tb_list_order SET menu = '$menu', jumlah = '$jumlah', catatan = '$catatan', `status` = '$status' WHERE id_list_order = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

if (isset($_POST["submit_item"])) {
    if (tambahData($_POST) > 0) {
        $message = "<script> 
        alert('data berhasil ditambahkan')
        window.location.href = '../?x=orderitem&order=" . $kode_order . "&meja=" . $meja . "&pelanggan=" . $pelanggan . "'
        </script>";
    } else {
        $message = "
        <script> 
        alert('data gagal ditambahkan')
        window.location.href = '../?x=orderitem&order=" . $kode_order . "&meja=" . $meja . "&pelanggan=" . $pelanggan . "'
        </script>";
    }
    echo $message;
}
?>