<?php
session_start();
include "connect.php";

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
    $hasil = mysqli_fetch_assoc($query);

    if (mysqli_num_rows($query) == 1 && password_verify($password, $hasil["password"])) {
        $_SESSION["username_kasir"] = $username;
        $_SESSION["level_kasir"] = $hasil["level"];
        $_SESSION["id_kasir"] = $hasil["id"];
        header('location:../home');
    } else { ?>
        <script>
            alert("Username atau password salah");
            window.location = '../login'
        </script>
        <?php
    }
}
?>