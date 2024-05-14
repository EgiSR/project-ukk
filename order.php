<?php
include "proses/connect.php";
include "proses/proses-tambah-menu.php";
date_default_timezone_set('Asia/Jakarta');

// Fetch menu items
$result = mysqli_query($conn, "SELECT *, SUM(tb_daftar_menu.harga*tb_list_order.jumlah) AS harganya FROM tb_order LEFT JOIN tb_user ON tb_user.id = tb_order.pelayan
                                                      LEFT JOIN tb_list_order ON tb_list_order.order_mn = tb_order.id_order
                                                      LEFT JOIN tb_daftar_menu ON tb_daftar_menu.id = tb_list_order.menu
                                                      LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order
                                                      GROUP BY id_order");
$rows = [];

while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

// Fetch menu categories
//$select_kat_menu = mysqli_query($conn, "SELECT jenis_menu, kategori_menu FROM tb_kategori_menu");

if (isset($_POST["submit_order"])) {
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
            halaman order
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#ModalTambahMenu">Tambah
                        order</button>
                </div>
            </div>

            <!-- Modal tambah order -->
            <div class="modal fade" id="ModalTambahMenu" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah order</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="proses/proses-tambah-order.php" method="POST">
                                <div class="form-floating mb-3">
                                    <input readonly type="text" class="form-control" id="floatingInput"
                                        name="kode_order" value="<?= date('ymdHi') . rand(10, 99); ?>">
                                    <label>kode order</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput" placeholder="no meja"
                                        name="meja">
                                    <label for="floatingInput">meja</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="nama pelanggan" name="pelanggan">
                                    <label for="floatingInput">nama pelanggan</label>
                                </div>

                                <input type="hidden" value=0 class="form-control" id="floatingInput"
                                    placeholder="status" name="status">

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="submit_order" class="btn btn-primary">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir tambah order -->

            <?php foreach ($rows as $row): ?>
                <!-- Modal Edit user-->
                <div class="modal fade" id="ModalEdit<?= $row['id_order']; ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Menu</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="proses/proses-edit-order.php" method="POST">
                                    <div class="form-floating mb-3">
                                        <input readonly type="text" class="form-control" id="floatingInput"
                                            name="kode_order" value="<?= $row['id_order']; ?>">
                                        <label>kode order</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingInput" placeholder="no meja"
                                            name="meja" value="<?= $row['meja']; ?>">
                                        <label for="floatingInput">meja</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput"
                                            placeholder="nama pelanggan" name="pelanggan" value="<?= $row['pelanggan']; ?>">
                                        <label for="floatingInput">nama pelanggan</label>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="submit_edit_order" class="btn btn-primary">Save
                                            changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir Edit user -->
            <?php endforeach; ?>

            <?php foreach ($rows as $row): ?>
                <!-- Modal hapus user -->
                <div class="modal fade" id="ModalHapus<?= $row['id_order']; ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Hapus</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="proses/proses-hapus-order.php" method="POST">
                                    <input type="hidden" name="kode_order" value="<?= $row['id_order']; ?>">
                                    <div class="col-lg-12">
                                        Apakah anda yakin akan menghapus order atas nama
                                        <?= $row["pelanggan"]; ?>?
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
                <!-- akhir hapus user -->
            <?php endforeach; ?>

            <div class=" table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-nowrap">
                            <th scope="col">No</th>
                            <th scope="col">Kode Order</th>
                            <th scope="col">Pelanggan</th>
                            <th scope="col">Meja</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Pelayan</th>
                            <th scope="col">Status bayar</th>
                            <th scope="col">Status pesanan</th>
                            <th scope="col">Waktu Order</th>
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
                                    <div>
                                        <?php echo $row["id_order"]; ?>
                                    </div>
                                </td>
                                <td>
                                    <?php echo $row["pelanggan"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["meja"]; ?>
                                </td>
                                <td>
                                    <?php echo number_format($row["harganya"], 0, ',', '.'); ?>
                                </td>
                                <td>
                                    <?php echo $row["nama"]; ?>
                                </td>
                                <td>
                                    <?php echo (!empty($row['id_bayar'])) ? "<span class='badge text-bg-success'>dibayar</span>" : ""; ?>
                                </td>
                                <td>
                                    <?php if ($row['status'] == 1) {
                                        echo "<span class='badge text-bg-warning'>Masuk ke dapur</span>";
                                    } elseif ($row['status'] == 2) {
                                        echo "<span class='badge text-bg-primary'>Siap saji</span>";
                                    } ?>
                                </td>
                                <td>
                                    <?php echo $row["waktu_order"]; ?>
                                </td>
                                <td class="d-flex justify-content-between gap-2">
                                    <a class="btn btn-info btn-sm"
                                        href="./?x=orderitem&order=<?= $row['id_order'] . "&meja=" . $row['meja'] . "&pelanggan=" . $row['pelanggan']; ?>">
                                        View</a>
                                    <div class="<?= (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm disabled" : "btn btn-warning btn-sm"; ?>"
                                        data-bs-toggle="modal" data-bs-target="#ModalEdit<?= $row['id_order']; ?>">
                                        Edit</div>
                                    <div class="<?= (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm disabled" : "btn btn-danger btn-sm"; ?>"
                                        data-bs-toggle="modal" data-bs-target="#ModalHapus<?= $row['id_order']; ?>">
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