<?php
if (!isset($_SESSION["username_kasir"])) {
    header("location: halaman");
}

include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$_SESSION[username_kasir]'");
$hasil = mysqli_fetch_assoc($query);
?>

<!-- file utama ketika dijalankan -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kasir restoran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
</head>

<body>
    <!-- header -->
    <!-- mengambil component dari file header -->
    <?php include "header.php"; ?>
    <!-- end header -->


    <div class="container-lg">
        <div class="row">
            <!-- sidebar -->
            <!-- mengambil component dari file sidebar -->
            <?php include "sidebar.php"; ?>
            <!-- end sidebar -->

            <!-- content -->
            <?php
            //menangkap varible dari index.php
            include $page;
            ?>
            <!-- end content -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>