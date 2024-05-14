<?php
include "proses/connect.php";
include "proses/proses-tambah-menu.php";

// Fetch menu items
$result = mysqli_query($conn, "SELECT *, SUM(tb_daftar_menu.harga*tb_list_order.jumlah) AS harganya FROM tb_list_order 
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
            <a href="report" class="mb-2 btn btn-secondary">Kembali</a>
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
                                    <?php if ($row['status'] == 1) {
                                        echo "<span class='badge text-bg-warning'>Masuk ke dapur</span>";
                                    } elseif ($row['status'] == 2) {
                                        echo "<span class='badge text-bg-primary'>Siap saji</span>";
                                    } ?>
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
        </div>
    </div>
</div>
<!-- end content -->