<?php

$queryPeminjaman = mysqli_query($koneksi, "SELECT anggota.nama_anggota, peminjaman.* FROM peminjaman LEFT JOIN anggota ON anggota.id = peminjaman.id_anggota ORDER BY id DESC");

?>


<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
            <fieldset>
                <legend>Data peminjaman</legend>

                <div class="button-action">
                    <a href="?pg=tambah-peminjaman" class="btn btn-primary">Add</a>
                </div>
                <div class="row mt-2">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Anggota</th>
                                    <th>No Peminjaman</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal pengembalian</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($queryPeminjaman)):
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $row['nama_anggota'] ?></td>
                                        <td><?php echo $row['no_peminjaman'] ?></td>
                                        <td><?php echo $row['tgl_peminjaman'] ?></td>
                                        <td><?php echo $row['tgl_pengembalian'] ?></td>
                                        <td><?php echo $row['status'] ?></td>

                                        <td>
                                            <a href="?pg=tambah-peminjaman&detail=<?php echo $row['id'] ?>" class="btn btn-success btn-sm">
                                                detail
                                            </a>
                                            <a href="?pg=tambah-peminjaman&delete=<?php echo $row['id'] ?>" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')">
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