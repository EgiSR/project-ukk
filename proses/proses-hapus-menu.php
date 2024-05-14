<?php
include("connect.php");

$id = $_POST['id'];

if (isset($_POST["submit_menu_hapus"])) {
    $query = mysqli_query($conn, "DELETE FROM tb_daftar_menu WHERE id = $id");
    if ($query) {
        echo "<script> 
        alert('data berhasil dihapus')
        document.location.href = '../menu'
        </script>";
    } else {
        echo "
        <script> 
        alert('data gagal dihapus')
        document.location.href = '../menu'
        </script>";
    }
}
?>