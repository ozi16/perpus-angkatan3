<?php

$books = mysqli_query($koneksi, "SELECT categories.name_category,books.* FROM books LEFT JOIN categories ON categories.id=books.id_category ORDER BY id DESC");

?>


<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
            <fieldset>
                <legend>Data Buku</legend>

                <div class="button-action">
                    <a href="?pg=tambah-buku" class="btn btn-primary">Add</a>
                </div>
                <div class="row mt-2">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Nama Buku</th>
                                    <th>Penerbit</th>
                                    <th>Tahun terbit</th>
                                    <th>pengarang</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($books)):
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $row['name_category'] ?></td>
                                        <td><?php echo $row['name_book'] ?></td>
                                        <td><?php echo $row['penerbit'] ?></td>
                                        <td><?php echo $row['tahun_terbit'] ?></td>
                                        <td><?php echo $row['pengarang'] ?></td>

                                        <td>
                                            <a href="?pg=tambah-buku&edit=<?php echo $row['id'] ?>" class="btn btn-success btn-sm">
                                                edit
                                            </a>
                                            <a href="?pg=tambah-buku&delete=<?php echo $row['id'] ?>" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')">
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