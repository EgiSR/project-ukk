<?php
include("connect.php");

$kode_order = $_POST['kode_order'];

if (isset($_POST["submit_menu_hapus"])) {
    $query = mysqli_query($conn, "DELETE FROM tb_order WHERE id_order = $kode_order");
    if ($query) {
        echo "<script> 
        alert('data berhasil dihapus')
        document.location.href = '../order'
        </script>";
    } else {
        echo "
        <script> 
        alert('data gagal dihapus')
        document.location.href = '../order'
        </script>";
    }
}
?>