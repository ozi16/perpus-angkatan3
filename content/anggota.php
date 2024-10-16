<?php

$anggota = mysqli_query($koneksi, "SELECT * FROM anggota ORDER BY id DESC");

?>


<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
            <fieldset>
                <legend>Data Anggota</legend>


                <div class="button-action">
                    <a href="?pg=tambah-anggota" class="btn btn-primary">Add</a>

                </div>
                <div class="row mt-2">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Anggota</th>
                                    <th>Telepon</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($rowAnggota = mysqli_fetch_assoc($anggota)):
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $rowAnggota['nama_anggota'] ?></td>
                                        <td><?php echo $rowAnggota['telepon'] ?></td>
                                        <td><?php echo $rowAnggota['email'] ?></td>
                                        <td><?php echo $rowAnggota['alamat'] ?></td>
                                        <td>
                                            <a href="?pg=tambah-anggota&edit=<?php echo $rowAnggota['id'] ?>" class="btn btn-success btn-sm">
                                                edit
                                            </a>
                                            <a href="?pg=tambah-anggota&delete=<?php echo $rowAnggota['id'] ?>" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')">
                                                delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>