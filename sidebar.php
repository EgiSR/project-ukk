<style>
    .sid {
        margin-top: 0px;
        padding-bottom: 340px;
    }
</style>

<div class="col-lg-3">
    <nav class="sid navbar navbar-expand-lg bg-secondary rounded border mt-2">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel" style="width: 250px;">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body bg-secondary">
                    <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <!-- saat tombol sidebar dipencet url yang asli akan mengirim ke index.php?x=home, setelah itu user akan diarahkan ke index.php sesuai tombol yang dipencet-->
                            <a class="nav-link
                            <?php echo (isset($_GET["x"]) && $_GET["x"] == 'home') ? 'active link-light' : 'link-light'; ?>"
                                aria-current="page" href="home">Home</a>
                        </li>
                        <?php if ($hasil["level"] == 1 || $hasil["level"] == 3): ?>
                            <li class="nav-item">
                                <a class="nav-link 
                            <?php echo (isset($_GET["x"]) && $_GET["x"] == 'menu') ? 'active link-light' : 'link-light'; ?>"
                                    href="menu">Daftar Menu</a>
                            </li>
                        <?php endif; ?>

                        <?php if ($hasil["level"] == 1 || $hasil["level"] == 2 || $hasil["level"] == 3): ?>
                            <li class="nav-item">
                                <a class="nav-link 
                            <?php echo (isset($_GET["x"]) && $_GET["x"] == 'order') ? 'active link-light' : 'link-light'; ?>"
                                    href="order">Order</a>
                            </li>
                        <?php endif; ?>

                        <?php if ($hasil["level"] == 1 || $hasil["level"] == 4): ?>
                            <li class="nav-item">
                                <a class="nav-link
                            <?php echo (isset($_GET["x"]) && $_GET["x"] == 'dapur') ? 'active link-light' : 'link-light'; ?>"
                                    href="dapur">dapur</a>
                            </li>
                        <?php endif; ?>

                        <?php if ($hasil["level"] == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link 
                            <?php echo (isset($_GET["x"]) && $_GET["x"] == 'user') ? 'active link-light' : 'link-light'; ?>"
                                    href="user">User</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link
                            <?php echo (isset($_GET["x"]) && $_GET["x"] == 'report') ? 'active link-light' : 'link-light'; ?>"
                                    href="report">Report</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>