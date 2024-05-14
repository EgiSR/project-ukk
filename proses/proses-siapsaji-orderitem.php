<?php
include("connect.php");

function tambahData($data)
{
    global $conn;
    $id = $data["id_list_order"];
    $catatan = $data["catatan"];

    $query = "UPDATE tb_list_order SET catatan = '$catatan', `status` = 2 WHERE id_list_order = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

if (isset($_POST["siapsaji_order"])) {
    if (tambahData($_POST) > 0) {
        $message = "<script> 
        alert('order siap disajikan')
        window.location.href = '../dapur'
        </script>";
    } else {
        $message = "
        <script> 
        alert('data gagal')
        window.location.href = '../dapur'
        </script>";
    }
    echo $message;
}
?>