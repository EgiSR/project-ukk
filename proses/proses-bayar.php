<?php
include("connect.php");

function tambahData($data)
{
    global $kode_order;
    global $meja;
    global $pelanggan;
    global $kembalian;
    global $conn;
    $kode_order = $data["kode_order"];
    $meja = $data["meja"];
    $pelanggan = $data["pelanggan"];
    $total = $data["total"];
    $uang = $data["uang"];
    $kembalian = $uang - $total;

    if ($kembalian < 0) {
        return "<script>alert('nominal tidak cukup')</script>";
    } else {
        $query = "INSERT INTO tb_bayar (id_bayar, nominal_uang, total_bayar) VALUES($kode_order, $uang, $total)";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
}

if (isset($_POST["submit_bayar"])) {
    if (tambahData($_POST) > 0) {
        $message = "<script> 
        alert('pembayaran berhasil Uang Kembalian = " . number_format($kembalian, 0, ',', '.') . "')
        window.location.href = '../?x=orderitem&order=" . $kode_order . "&meja=" . $meja . "&pelanggan=" . $pelanggan . "'
        </script>";
    } else {
        $message = "
        <script> 
        alert('pembayaran gagal')
        window.location.href = '../?x=orderitem&order=" . $kode_order . "&meja=" . $meja . "&pelanggan=" . $pelanggan . "'
        </script>";
    }
    echo $message;
}
?>