<?php
include "proses/connect.php";
include "proses/proses-tambah-menu.php";

// Fetch menu items
$result = mysqli_query($conn, "SELECT * FROM tb_list_order 
                                                      LEFT JOIN tb_order ON tb_order.id_order = tb_list_order.order_mn
                                                      LEFT JOIN tb_daftar_menu ON tb_daftar_menu.id = tb_list_order.menu
                                                      LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order");
$rows = [];


while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

// Fetch menu categories
$select_menu = mysqli_query($conn, "SELECT id, nama_menu FROM tb_daftar_menu");

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
            halaman order item
        </div>
        <div class="card-body">

            <?php foreach ($rows as $row): ?>
                <!-- Modal terima item-->
                <div class="modal fade" id="terima<?= $row['id_list_order']; ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">terima</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="proses/proses-terima-orderitem.php" method="POST">
                                    <input type="hidden" name="id_list_order" value="<?= $row['id_list_order']; ?>">
                                    <div class="form-floating mb-3">
                                        <select disabled name="menu" id="" class="form-select">
                                            <option selected hidden value="">Pilih Menu</option>
                                            <?php
                                            foreach ($select_menu as $value) {
                                                if ($row['menu'] == $value['id']) {
                                                    echo "<option selected value=$value[id]>$value[nama_menu]</option>";
                                                } else {
                                                    echo "<option value=$value[id]>$value[nama_menu]</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        <label>Menu makanan</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input disabled type="number" class="form-control" id="floatingInput"
                                            placeholder="jumlah porsi" name="jumlah" value="<?= $row['jumlah']; ?>">
                                        <label for="floatingInput">Jumlah Porsi</label>
                                    </div>

                                    <div class="form-floating mt-3">
                                        <input type="text" class="form-control" id="floatingPassword" placeholder="catatan"
                                            name="catatan" value="<?= $row['catatan']; ?>">
                                        <label for="floatingPassword">catatan</label>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="terima_order" class="btn btn-primary">Save
                                            changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir terima item -->
            <?php endforeach; ?>

            <?php foreach ($rows as $row): ?>
                <!-- Modal siap saji item-->
                <div class="modal fade" id="siapsaji<?= $row['id_list_order']; ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">siap saji</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="proses/proses-siapsaji-orderitem.php" method="POST">
                                    <input type="hidden" name="id_list_order" value="<?= $row['id_list_order']; ?>">
                                    <div class="form-floating mb-3">
                                        <select disabled name="menu" id="" class="form-select">
                                            <option selected hidden value="">Pilih Menu</option>
                                            <?php
                                            foreach ($select_menu as $value) {
                                                if ($row['menu'] == $value['id']) {
                                                    echo "<option selected value=$value[id]>$value[nama_menu]</option>";
                                                } else {
                                                    echo "<option value=$value[id]>$value[nama_menu]</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        <label>Menu makanan</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input disabled type="number" class="form-control" id="floatingInput"
                                            placeholder="jumlah porsi" name="jumlah" value="<?= $row['jumlah']; ?>">
                                        <label for="floatingInput">Jumlah Porsi</label>
                                    </div>

                                    <div class="form-floating mt-3">
                                        <input type="text" class="form-control" id="floatingPassword" placeholder="catatan"
                                            name="catatan" value="<?= $row['catatan']; ?>">
                                        <label for="floatingPassword">catatan</label>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="siapsaji_order" class="btn btn-primary">Save
                                            changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir siap saji item -->
            <?php endforeach; ?>

            <div class=" table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-nowrap">
                            <th scope="col">No</th>
                            <th scope="col">Kode Order</th>
                            <th scope="col">Waktu Order</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Catatan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($rows as $row) { ?>
                            <?php if ($row['status'] != 2) { ?>
                                <tr>
                                    <td>
                                        <?php echo $i; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["nama_menu"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["waktu_order"]; ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($row["harga"], 0, ',', '.'); ?>
                                    </td>
                                    <td>
                                        <?php echo $row["jumlah"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["catatan"]; ?>
                                    </td>
                                    <td>
                                        <?php if ($row['status'] == 1) {
                                            echo "<span class='badge text-bg-warning'>Masuk ke dapur</span>";
                                        } elseif ($row['status'] == 2) {
                                            echo "<span class='badge text-bg-primary'>Siap saji</span>";
                                        } ?>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="<?= (!empty($row['status'])) ? "btn btn-secondary btn-sm disabled" : "btn btn-primary btn-sm"; ?>"
                                                data-bs-toggle="modal" data-bs-target="#terima<?= $row['id_list_order']; ?>">
                                                Terima</div>
                                            <div class="ms-2 text-nowrap <?= (empty($row['status']) || $row['status'] != 1) ? "btn btn-secondary btn-sm disabled" : "btn btn-success btn-sm"; ?>"
                                                data-bs-toggle="modal" data-bs-target="#siapsaji<?= $row['id_list_order']; ?>">
                                                Siap Saji</div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            $i++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end content -->