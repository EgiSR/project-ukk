<?php
include "proses/connect.php";
$result = mysqli_query($conn, "SELECT * FROM tb_user");
$rows = [];

while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

?>

<!-- content -->
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Daftar User
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#ModalTambahUser">Tambah
                        User</button>
                </div>
            </div>

            <!-- Modal tambah user -->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="proses/proses-tambah-user.php" method="POST">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" name="nama">
                                    <label for="floatingInput">Nama</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" name="username">
                                    <label for="floatingInput">Username</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-select" aria-label="Default select example" name="level">
                                        <option hidden selected>Pilih level</option>
                                        <option value="1">Administrator</option>
                                        <option value="2">Kasir</option>
                                        <option value="3">Pelayan</option>
                                        <option value="4">Dapur</option>
                                    </select>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput"
                                        placeholder="name@example.com" name="nohp">
                                    <label for="floatingInput">No HP</label>
                                </div>

                                <div class="form-floating">
                                    <textarea class="form-control" name="alamat" id="" cols="30" rows="10"
                                        name="alamat"></textarea>
                                    <label for="floatingPassword">Alamat</label>
                                </div>

                                <div class="form-floating mt-3">
                                    <input type="password" class="form-control" id="floatingPassword"
                                        placeholder="Password" name="password">
                                    <label for="floatingPassword">Password</label>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="submit_user" class="btn btn-primary">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir tambah user -->

            <?php foreach ($rows as $row): ?>
                <!-- Modal view user-->
                <div class="modal fade" id="ModalView<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="proses/proses-tambah-user.php" method="POST">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput"
                                            placeholder="name@example.com" name="nama" value="<?= $row['nama']; ?>"
                                            disabled>
                                        <label for="floatingInput">Nama</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput"
                                            placeholder="name@example.com" name="username" value="<?= $row['username']; ?>"
                                            disabled>
                                        <label for="floatingInput">Username</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" disabled name="level"
                                            value="<?php
                                            if ($row['level'] == 1) {
                                                echo 'admin';
                                            } elseif ($row['level'] == 2) {
                                                echo 'kasir';
                                            } elseif ($row['level'] == 3) {
                                                echo 'pelayan';
                                            } elseif ($row['level'] == 4) {
                                                echo 'dapur';
                                            }
                                            ?>">
                                        <label for="floatingInput">Level User</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingInput"
                                            placeholder="name@example.com" name="nohp" value="<?= $row['nohp']; ?>"
                                            disabled>
                                        <label for="floatingInput">No HP</label>
                                    </div>

                                    <div class="form-floating">
                                        <textarea class="form-control" name="" id="" cols="30" rows="10" name="alamat"
                                            disabled><?= $row['alamat']; ?></textarea>
                                        <label for="floatingPassword">Alamat</label>
                                    </div>

                                    <div class="form-floating mt-3">
                                        <input type="password" class="form-control" id="floatingPassword"
                                            placeholder="Password" value="123" name="password"
                                            value="<?= $row['password']; ?>" disabled>
                                        <label for="floatingPassword">Password</label>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir view user -->
            <?php endforeach; ?>

            <?php foreach ($rows as $row): ?>
                <!-- Modal Edit user-->
                <div class="modal fade" id="ModalEdit<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="proses/proses-edit-user.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput"
                                            placeholder="name@example.com" name="nama" value="<?= $row['nama']; ?>">
                                        <label for="floatingInput">Nama</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput"
                                            placeholder="name@example.com" name="username" value="<?= $row['username']; ?>">
                                        <label for="floatingInput">Username</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" name="level" id="">
                                            <?php
                                            $array = ["Administrator", "kasir", "pelayan", "dapur"];
                                            foreach ($array as $key => $value) {
                                                if ($row['level'] == $key + 1) {
                                                    echo "<option selected value=" . ($key + 1) . ">$value</option>";
                                                } else {
                                                    echo "<option value=" . ($key + 1) . ">$value</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        <label for="floatingInput">Level User</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingInput"
                                            placeholder="name@example.com" name="nohp" value="<?= $row['nohp']; ?>"
                                            disabled>
                                        <label for="floatingInput">No HP</label>
                                    </div>

                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingInput"
                                            placeholder="name@example.com" name="alamat" value="<?= $row['alamat']; ?>">
                                        <label for="floatingPassword">Alamat</label>
                                    </div>

                                    <div class="form-floating mt-3">
                                        <input type="text" class="form-control" id="floatingPassword" placeholder="Password"
                                            name="password" value="<?= $row['password']; ?>">
                                        <label for="floatingPassword">Password</label>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="submit_user_edit" class="btn btn-primary">Save
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
                <div class="modal fade" id="ModalHapus<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="proses/proses-hapus-user.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                    <div class="col-lg-12">
                                        Apakah anda yakin akan menghapus user
                                        <?= $row["username"]; ?>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="submit_user_hapus" class="btn btn-danger">Hapus
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
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Level</th>
                            <th scope="col">No HP</th>
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
                                    <?php echo $row["nama"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["username"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["level"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["nohp"]; ?>
                                </td>
                                <td>
                                    <div class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#ModalView<?= $row['id']; ?>">
                                        Lihat</div>
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