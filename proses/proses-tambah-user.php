<?php
include("connect.php");

function tambahData($data)
{
    global $conn;
    $nama = $data["nama"];
    $username = $data["username"];
    $password = $data["password"];
    $level = $data["level"];
    $nohp = $data["nohp"];
    $alamat = $data["alamat"];

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO tb_user VALUES('', '$nama',
                                             '$username',
                                             '$password',     
                                              $level,
                                              $nohp,
                                              '$alamat'
                                        )";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

if (isset($_POST["submit_user"])) {
    if (tambahData($_POST) > 0) {
        echo "<script> 
        alert('data berhasil ditambahkan')
        document.location.href = '../user'
        </script>";
    } else {
        echo "
        <script> 
        alert('data gagal ditambahkan')
        document.location.href = '../user'
        </script>";
    }
}
?>