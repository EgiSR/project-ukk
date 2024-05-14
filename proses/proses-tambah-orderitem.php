<?php
include("connect.php");

function tambahData($data)
{
    global $kode_order;
    global $meja;
    global $pelanggan;
    global $conn;
    $kode_order = $data["kode_order"];
    $meja = $data["meja"];
    $pelanggan = $data["pelanggan"];
    $menu = $data["menu"];
    $jumlah = $data["jumlah"];
    $catatan = $data["catatan"];

    $query = "INSERT INTO tb_list_order (menu, order_mn, jumlah, catatan, `status`) VALUES($menu, 
                                         '$kode_order',
                                         $jumlah,
                                         '$catatan',
                                         ''    
                                        )";
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