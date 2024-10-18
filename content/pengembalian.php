<?php

// kondisi untuk delete di database masih ada tapi ditampilan sudah ter hapus WHERE delete_at=0
$queryPeminjaman = mysqli_query($koneksi, "SELECT peminjaman.no_peminjaman, pengembalian.* FROM pengembalian LEFT JOIN peminjaman ON peminjaman.id = pengembalian.id_peminjaman ORDER BY id DESC");

?>


<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
            <fieldset>
                <legend>Data Pengembalian</legend>

                <div class="button-action">
                    <a href="?pg=tambah-pengembalian" class="btn btn-primary">Add</a>
                </div>
                <div class="row mt-2">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Peminjaman</th>
                                    <th>Status</th>
                                    <th>Denda</th>
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

                                        <td><?php echo $row['no_peminjaman'] ?></td>
                                        <td><?php echo $row['status'] ?></td>
                                        <td><?php echo $row['denda'] ?></td>

                                        <td>
                                            <a href="?pg=tambah-pengembalian&detail=<?php echo $row['id'] ?>" class="btn btn-success btn-sm">
                                                detail
                                            </a>
                                            <a href="?pg=tambah-pengembalian&delete=<?php echo $row['id'] ?>" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')">
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