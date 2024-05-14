<!-- content -->
<!-- jadi ketika user menekan tombol di sidebar akan mengirim key=x value ke varibale superglobal $_GET melalu url, dan akan diarahkan sesuai nama yang akan dituju-->
<?php
session_start();
if (isset($_GET['x']) && $_GET['x'] == 'home') {
    //menyimpan file home yang akan dikirimkan ke file main.php ke variable $page
    $page = "home.php";
    include 'main.php';
} elseif (isset($_GET['x']) && $_GET['x'] == 'order') {
    $page = 'order.php';
    include 'main.php';

} elseif (isset($_GET['x']) && $_GET['x'] == 'dapur') {
    $page = 'dapur.php';
    include 'main.php';

} elseif (isset($_GET['x']) && $_GET['x'] == 'user') {
    if ($_SESSION["level_kasir"] == 1) {
        $page = 'user.php';
        include 'main.php';

    } else {
        $page = 'home.php';
        include 'main.php';
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'report') {
    if ($_SESSION["level_kasir"] == 1) {
        $page = 'report.php';
        include 'main.php';

    } else {
        $page = 'home.php';
        include 'main.php';
    }

} elseif (isset($_GET['x']) && $_GET['x'] == 'menu') {
    $page = 'menu.php';
    include 'main.php';

} elseif (isset($_GET['x']) && $_GET['x'] == 'orderitem') {
    $page = 'order-item.php';
    include 'main.php';

} elseif (isset($_GET['x']) && $_GET['x'] == 'viewitem') {
    $page = 'view-item.php';
    include 'main.php';

    //berdiri sendiri karena tidak menggunakan file main.php
} elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
    include 'login.php';

} elseif (isset($_GET['x']) && $_GET['x'] == 'halaman') {
    include 'halaman.php';

} elseif (isset($_GET['x']) && $_GET['x'] == 'logout') {
    include 'proses/proses-logout.php';

} else {
    $page = 'home.php';
    include 'main.php';
}
?>
<!-- end content -->