<?php
include "proses/connect.php";
include "proses/proses-tambah-menu.php";

// Fetch menu items
$result = mysqli_query($conn, "SELECT * FROM tb_daftar_menu LEFT JOIN tb_kategori_menu ON tb_kategori_menu.id_kategori = tb_daftar_menu.kategori");
$rows = [];

while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

// Fetch menu categories
$select_kat_menu = mysqli_query($conn, "SELECT jenis_menu, kategori_menu FROM tb_kategori_menu");

if (isset($_POST["submit_menu"])) {
    if (tambah($_POST) > 0) {
        echo "
        <script> 
        alert('data berhasil ditambahkan')
        document.location.href = 'menu'
        </script>";
    } else {
        echo "
        <script> 
        alert('data gagal ditambahkan')
        document.location.href = 'menu'
        </script>";
    }
}


?>

<!-- content -->
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Daftar Menu
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#ModalTambahMenu">Tambah
                        Menu</button>
                </div>
            </div>

            <!-- Modal tambah menu -->
            <div class="modal fade" id="ModalTambahMenu" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" enctype="multipart/form-data">

                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" name="foto">
                                    <label class="input-group-text">Upload Foto</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="nama menu"
                                        name="nama_menu">
                                    <label for="floatingInput">nama menu</label>
                                </div>

                                <div class="form-floating mt-3">
                                    <input type="text" class="form-control" id="floatingPassword"
                                        placeholder="keterangan" name="keterangan">
                                    <label for="floatingPassword">Keterangan</label>
                                </div>

                                <div class="form-floating mb-3 mt-3">
                                    <select class="form-select" aria-label="Default select example" name="kat_menu">
                                        <?php
                                        foreach ($select_kat_menu as $value) {
                                            echo "<option value=" . $value['jenis_menu'] . ">$value[kategori_menu]</option>";
                                        }
                                        ?>
                                    </select>
                                    <label for="floatingInput">Kategori Menu</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" name="harga">
                                    <label for="floatingInput">Harga</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" name="stok">
                                    <label for="floatingInput">Stok</label>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="submit_menu" class="btn btn-primary">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir tambah menu -->

            <?php foreach ($rows as $row): ?>
                <!-- Modal Edit menu-->
                <div class="modal fade" id="ModalEdit<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Menu</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="proses/proses-edit-menu.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                    <input type="text" name="gambarLama" value="<?= $row['foto']; ?>">

                                    <div class="form-floating mb-3">
                                        <input type="file" class="form-control" id="floatingInput"
                                            placeholder="name@example.com" name="foto">
                                        <label for="floatingInput">Foto</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput"
                                            placeholder="name@example.com" name="nama_menu"
                                            value="<?= $row['nama_menu']; ?>">
                                        <label for="floatingInput">Nama menu</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput"
                                            placeholder="name@example.com" name="keterangan"
                                            value="<?= $row['keterangan']; ?>">
                                        <label for="floatingInput">Keterangan</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" name="kat_menu"
                                            id="">
                                            <?php
                                            foreach ($select_kat_menu as $value) {
                                                if ($row['kategori'] == $value['jenis_menu']) {
                                                    echo "<option selected value=" . $value['jenis_menu'] . ">$value[kategori_menu]</option>";
                                                } else {
                                                    echo "<option value=" . $value['id_kategori'] . ">$value[kategori_menu]</option>";
                                                }
                                            }

                                            ?>
                                        </select>
                                        <label for="floatingInput">Kategori Menu</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingInput"
                                            placeholder="name@example.com" name="harga" value="<?= $row['harga']; ?>">
                                        <label for="floatingInput">Harga</label>
                                    </div>

                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingInput"
                                            placeholder="name@example.com" name="stok" value="<?= $row['stok']; ?>">
                                        <label for="floatingPassword">Stok</label>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="submit_menu_edit" class="btn btn-primary">Save
                                            changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir Edit menu -->
            <?php endforeach; ?>

            <?php foreach ($rows as $row): ?>
                <!-- Modal hapus menu -->
                <div class="modal fade" id="ModalHapus<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="proses/proses-hapus-menu.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                    <div class="col-lg-12">
                                        Apakah anda yakin akan menghapus menu
                                        <?= $row["nama_menu"]; ?>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="submit_menu_hapus" class="btn btn-danger">Hapus
                                            changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir hapus menu -->
            <?php endforeach; ?>

            <div class=" table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Nama Menu</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Jenis Menu</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($rows as $row): ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $i++; ?>
                                </th>
                                <td>
                                    <div style="width:100px">
                                        <img src="assets/img/<?php echo $row["foto"]; ?>" class="img-thumbnail" alt="...">
                                    </div>
                                </td>
                                <td>
                                    <?php echo $row["nama_menu"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["keterangan"]; ?>
                                </td>
                                <td>
                                    <?php echo ($row["jenis_menu"] == 1) ? "Makanan" : "Minuman"; ?>
                                </td>
                                <td>
                                    <?php echo $row["kategori_menu"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["harga"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["stok"]; ?>
                                </td>
                                <td class="d-flex justify-content-between gap-2">
                                    <div class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#ModalEdit<?= $row['id']; ?>">
                                        Edit</div>
                                    <div class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#ModalHapus<?= $row['id']; ?>">
                                        Hapus</div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end content -->