<?php
include "proses/connect.php";
include "proses/proses-tambah-menu.php";
date_default_timezone_set('Asia/Jakarta');

// Fetch menu items
$result = mysqli_query($conn, "SELECT *, SUM(tb_daftar_menu.harga*tb_list_order.jumlah) AS harganya FROM tb_order LEFT JOIN tb_user ON tb_user.id = tb_order.pelayan
                                                      LEFT JOIN tb_list_order ON tb_list_order.order_mn = tb_order.id_order
                                                      LEFT JOIN tb_daftar_menu ON tb_daftar_menu.id = tb_list_order.menu
                                                      JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order
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
            halaman report
        </div>
        <div class="card-body">

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
                            <th scope="col">Waktu Order</th>
                            <th scope="col">Waktu Bayar</th>
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
                                    <?php echo $row["waktu_order"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["waktu_bayar"]; ?>
                                </td>
                                <td class="d-flex justify-content-between gap-2">
                                    <a class="btn btn-info btn-sm"
                                        href="./?x=viewitem&order=<?= $row['id_order'] . "&meja=" . $row['meja'] . "&pelanggan=" . $row['pelanggan']; ?>">
                                        View</a>
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