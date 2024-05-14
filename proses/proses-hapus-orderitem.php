<?php
include("connect.php");

$id = $_POST['id_list_order'];
$kode_order = $_POST["kode_order"];
$meja = $_POST["meja"];
$pelanggan = $_POST["pelanggan"];

if (isset($_POST["submit_item_hapus"])) {
    $query = mysqli_query($conn, "DELETE FROM tb_list_order WHERE id_list_order = $id");
    if ($query) {
        echo "<script> 
        alert('data berhasil dihapus')
        window.location.href = '../?x=orderitem&order=" . $kode_order . "&meja=" . $meja . "&pelanggan=" . $pelanggan . "'
        </script>";
    } else {
        echo "
        <script> 
        alert('data gagal dihapus')
        window.location.href = '../?x=orderitem&order=" . $kode_order . "&meja=" . $meja . "&pelanggan=" . $pelanggan . "'
        </script>";
    }
}
?>