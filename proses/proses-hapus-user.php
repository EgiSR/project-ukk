<?php
include("connect.php");

$id = $_POST['id'];

if (isset($_POST["submit_user_hapus"])) {
    $query = mysqli_query($conn, "DELETE FROM tb_user WHERE id = $id");
    if ($query) {
        echo "<script> 
        alert('data berhasil dihapus')
        document.location.href = '../user'
        </script>";
    } else {
        echo "
        <script> 
        alert('data gagal dihapus')
        document.location.href = '../user'
        </script>";
    }
}
?>