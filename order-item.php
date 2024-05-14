<?php
include "proses/connect.php";
include "proses/proses-tambah-menu.php";

// Fetch menu items
$result = mysqli_query($conn, "SELECT *, SUM(tb_daftar_menu.harga*tb_list_order.jumlah) AS harganya, tb_order.waktu_order FROM tb_list_order 
                                                      LEFT JOIN tb_order ON tb_order.id_order = tb_list_order.order_mn
                                                      LEFT JOIN tb_daftar_menu ON tb_daftar_menu.id = tb_list_order.menu
                                                      LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order
                                                      GROUP BY id_list_order HAVING tb_list_order.order_mn = $_GET[order]");
$rows = [];
                  
$kode_order = $_GET['order'];
$meja = $_GET['meja'];
$pelanggan = $_GET['pelanggan'];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
    // $kode = $row['kode_order'];
    // $meja = $row['meja'];
    // $pelanggan = $row['pelanggan'];
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
            <a href="order" class="mb-2 btn btn-secondary">Kembali</a>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" name="kodeorder" value="<?= $kode_order; ?>" id=""
                            class="form-control">
                        <label for="">kode order</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-floating mb-3">
                        <input disabled type="text" name="meja" value="<?= $meja; ?>" id="" class="form-control">
                        <label for="">meja</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" name="meja" value="<?= $pelanggan; ?>" id="" class="form-control">
                        <label for="">pelanggan</label>
                    </div>
                </div>

            </div>

            <!-- Modal tambah item -->
            <div class="modal fade" id="TambahItem" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="proses/proses-tambah-orderitem.php" method="POST">
                                <input type="hidden" name="kode_order" value="<?= $kode_order; ?>">
                                <input type="hidden" name="meja" value="<?= $meja; ?>">
                                <input type="hidden" name="pelanggan" value="<?= $pelanggan; ?>">
                                <div class="form-floating mb-3">
                                    <select name="menu" id="" class="form-select">
                                        <option selected hidden value="">Pilih Menu</option>
                                        <?php
                                        foreach ($select_menu as $value) {
                                            echo "<option value=$value[id]>$value[nama_menu]</option>";
                                        }
                                        ?>
                                    </select>
                                    <label>Menu makanan</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput"
                                        placeholder="jumlah porsi" name="jumlah">
                                    <label for="floatingInput">Jumlah Porsi</label>
                                </div>

                                <div class="form-floating mt-3">
                                    <input type="text" class="form-control" id="floatingPassword" placeholder="catatan"
                                        name="catatan">
                                    <label for="floatingPassword">catatan</label>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="submit_item" class="btn btn-primary">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir tambah item -->

            <?php foreach ($rows as $row): ?>
                <!-- Modal Edit item-->
                <div class="modal fade" id="ModalEdit<?= $row['id_list_order']; ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Menu</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="proses/proses-edit-orderitem.php" method="POST">
                                    <input type="hidden" name="kode_order" value="<?= $kode_order; ?>">
                                    <input type="hidden" name="meja" value="<?= $meja; ?>">
                                    <input type="hidden" name="pelanggan" value="<?= $pelanggan; ?>">
                                    <input type="text" name="id_list_order" value="<?= $row['id_list_order']; ?>">
                                    <div class="form-floating mb-3">
                                        <select name="menu" id="" class="form-select">
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
                                        <input type="number" class="form-control" id="floatingInput"
                                            placeholder="jumlah porsi" name="jumlah" value="<?= $row['jumlah']; ?>">
                                        <label for="floatingInput">Jumlah Porsi</label>
                                    </div>

                                    <div class="form-floating mt-3">
                                        <input type="text" class="form-control" id="floatingPassword" placeholder="catatan"
                                            name="catatan" value="<?= $row['catatan']; ?>">
                                        <label for="floatingPassword">catatan</label>
                                    </div>

                                    <div class="form-floating mt-3">
                                        <input type="number" class="form-control" id="floatingPassword" placeholder="status"
                                            name="status" value="<?= $row['status']; ?>">
                                        <label for="floatingPassword">status</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="submit_item" class="btn btn-primary">Save
                                            changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir Edit item -->
            <?php endforeach; ?>

            <?php foreach ($rows as $row): ?>
                <!-- Modal hapus item -->
                <div class="modal fade" id="ModalHapus<?= $row['id_list_order']; ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="proses/proses-hapus-orderitem.php" method="POST">
                                    <input type="hidden" name="kode_order" value="<?= $kode_order; ?>">
                                    <input type="hidden" name="meja" value="<?= $meja; ?>">
                                    <input type="hidden" name="pelanggan" value="<?= $pelanggan; ?>">
                                    <input type="hidden" name="id_list_order" value="<?= $row['id_list_order']; ?>">
                                    <div class="col-lg-12">
                                        Apakah anda yakin akan menghapus menu
                                        <?= $row["nama_menu"]; ?>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="submit_item_hapus" class="btn btn-danger">Hapus
                                            changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir hapus item -->
            <?php endforeach; ?>

            <!-- Modal bayar item -->
            <div class="modal fade" id="Bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Pembayaran</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class=" table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th scope="col">Menu</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Catatan</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total = 0; ?>
                                        <?php foreach ($rows as $row) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row["nama_menu"]; ?>
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
                                                    <?php echo $row["status"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo number_format($row["harganya"], 0, ',', '.'); ?>
                                                </td>
                                            </tr>

                                            <?php
                                            $total += $row['harganya'];
                                        } ?>
                                        <tr>
                                            <td class="fw-bold" colspan="5">Total Harga :</td>
                                            <td class="fw-bold">
                                                <?= number_format($total, 0, ',', '.'); ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <form action="proses/proses-bayar.php" method="POST">
                                <input type="hidden" name="kode_order" value="<?= $kode_order; ?>">
                                <input type="hidden" name="meja" value="<?= $meja; ?>">
                                <input type="hidden" name="pelanggan" value="<?= $pelanggan; ?>">
                                <input type="hidden" name="total" value="<?= $total; ?>">

                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput"
                                        placeholder="nominal uang" name="uang">
                                    <label for="floatingInput">Nominal Uang</label>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="submit_bayar" class="btn btn-primary">Bayar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir bayar item -->

            <div class=" table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-nowrap">
                            <th scope="col">Menu</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Catatan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        <?php foreach ($rows as $row) { ?>
                            <tr>
                                <td>
                                    <?php echo $row["nama_menu"]; ?>
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
                                    <?php echo number_format($row["harganya"], 0, ',', '.'); ?>
                                </td>
                                <td>
                                    <div class="<?= (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm disabled" : "btn btn-warning btn-sm"; ?>"
                                        data-bs-toggle="modal" data-bs-target="#ModalEdit<?= $row['id_list_order']; ?>">
                                        Edit</div>
                                    <div class="<?= (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm disabled" : "btn btn-danger btn-sm"; ?>"
                                        data-bs-toggle="modal" data-bs-target="#ModalHapus<?= $row['id_list_order']; ?>">
                                        Hapus</div>
                                </td>
                            </tr>

                            <?php
                            $total += $row['harganya'];
                        } ?>
                        <tr>
                            <td class="fw-bold" colspan="5">Total Harga :</td>
                            <td class="fw-bold">
                                <?= number_format($total, 0, ',', '.'); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <button data-bs-toggle="modal" data-bs-target="#TambahItem"
                        class="<?= (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-primary"; ?>">tambah
                        item</button>
                    <button data-bs-toggle="modal" data-bs-target="#Bayar"
                        class="<?= (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-success"; ?>">Bayar</button>
                    <button onclick="printStruk()"
                        class="<?= (!empty($row['id_bayar'])) ? "btn btn-info" : "btn btn-secondary disabled"; ?>">Cetak
                        Struk</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end content -->

<div class="d-none" id="strukContent">
    <h2>Struk Pembayaran Kasir Restoran</h2>
    <p>Kode Order:
        <?= $kode_order; ?>
    </p>
    <p>Meja:
        <?= $meja; ?>
    </p>
    <p>Pelanggan:
        <?= $pelanggan; ?>
    </p>
    <p>Waktu Order:
        <?= date('d/m/Y H:i:s', strtotime($rows[0]['waktu_order'])); ?>
    </p>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Menu</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            foreach ($rows as $row) { ?>
                <tr>
                    <td>
                        <?= $row['nama_menu']; ?>
                    </td>
                    <td>
                        <?= $row['harga']; ?>
                    </td>
                    <td>
                        <?= $row['jumlah']; ?>
                    </td>
                    <td>
                        <?= number_format($row['harganya'], 0, ',', '.');
                        ; ?>
                    </td>
                </tr>
                <?php
                $total += $row['harganya'];
            } ?>
            <tr>
                <td class="fw-bold" colspan="3">Total Harga:</td>
                <td class="fw-bold">
                    <?= number_format($total, 0, ',', '.'); ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    function printStruk() {
        let strukContent = document.getElementById("strukContent").innerHTML
        let printFrame = document.createElement('iframe')
        printFrame.style.display = 'none'
        document.body.appendChild(printFrame)
        printFrame.contentDocument.write(strukContent)
        printFrame.contentWindow.print();
        docoment.body.removeChild(printFrame)
    }
</script>