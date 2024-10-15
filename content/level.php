<?php

$level = mysqli_query($koneksi, "SELECT * FROM levels ORDER BY id DESC");

?>


<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
            <fieldset>
                <legend>Data Level</legend>

                <div class="button-action">
                    <a href="?pg=tambah-level" class="btn btn-primary">Add</a>
                </div>
                <div class="row mt-2">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($level)):
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $row['nama_level'] ?></td>
                                        <td>
                                            <a href="?pg=tambah-level&edit=<?php echo $row['id'] ?>" class="btn btn-success btn-sm">
                                                edit
                                            </a>
                                            <a href="?pg=tambah-level&delete=<?php echo $row['id'] ?>" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')">
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