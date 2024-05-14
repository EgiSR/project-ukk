<?php
include("connect.php");

function editData($data)
{
    global $conn;
    $id = $data['id'];
    $nama = $data["nama"];
    $username = $data["username"];
    $password = $data["password"];
    $level = $data["level"];
    $nohp = $data["nohp"];
    $alamat = $data["alamat"];

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE tb_user SET nama = '$nama',
                                 username = '$username',
                                 `password` = '$password',
                                 `level` = '$level',
                                 nohp = $nohp,
                                 alamat = '$alamat'
                                  WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

if (isset($_POST["submit_user_edit"])) {
    if (editData($_POST) > 0) {
        echo "<script> 
        alert('data berhasil diedit')
        document.location.href = '../user'
        </script>";
    } else {
        echo "
        <script> 
        alert('data gagal diedit')
        document.location.href = '../user'
        </script>";
    }
}

?>