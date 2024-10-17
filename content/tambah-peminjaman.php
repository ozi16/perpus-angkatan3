<?php
// untuk menambahkan data
if (isset($_POST['simpan'])) {

    $no_peminjaman = $_POST['no_peminjaman'];
    $id_anggota = $_POST['id_anggota'];
    $tgl_peminjaman = $_POST['tgl_peminjaman'];
    $tgl_pengembalian = $_POST['tgl_pengembalian'];
    $id_book = $_POST['id_book'];


    // sql = struktur query language / DML = data manipulasi language
    // SELECT, INSERT, UPDATE, DELETE

    $insert = mysqli_query($koneksi, "INSERT INTO peminjaman (no_peminjaman,id_anggota,tgl_peminjaman, tgl_pengembalian) VALUES ('$no_peminjaman','$id_anggota','$tgl_peminjaman','$tgl_pengembalian')");
    $id_peminjaman = mysqli_insert_id($koneksi);

    foreach ($id_book as $key => $buku) {
        $id_book = $_POST['id_book'][$key];

        $insertDetail = mysqli_query($koneksi, "INSERT INTO detail_peminjaman (id_peminjaman,id_book) VALUES ('$id_peminjaman','$id_book')");
    }
    header('location:?pg=peminjaman&tambah=berhasil');
}

$id = isset($_GET['detail']) ? $_GET['detail'] : '';
// untuk memunculkan data sesuai id jika di pilih data 1 maka akan muncul data 1
$queryPeminjam = mysqli_query($koneksi, "SELECT anggota.nama_anggota, peminjaman.* FROM peminjaman LEFT JOIN anggota ON anggota.id = peminjaman.id_anggota WHERE peminjaman.id = '$id' ");

$rowPeminjam = mysqli_fetch_assoc($queryPeminjam);

$queryDetailPeminjam = mysqli_query($koneksi, "SELECT detail_peminjaman.id_book, books.name_book FROM detail_peminjaman LEFT JOIN books ON detail_peminjaman.id_book = books.id WHERE id_peminjaman = '$id'");

// untuk delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE id='$id'");
    header('location:?pg=peminjaman&hapus=berhasil');
}

// untuk menampilkan data rdms
$queryBuku = mysqli_query($koneksi, "SELECT * FROM books");
$queryAnggota = mysqli_query($koneksi, "SELECT * FROM anggota");

// untuk memunculkan no peminjaman di tambah buku
$queryKodePnjm = mysqli_query($koneksi, "SELECT MAX(id) AS id_pinjam FROM peminjaman");
$rowPeminjaman = mysqli_fetch_assoc($queryKodePnjm);
$id_pinjam = $rowPeminjaman['id_pinjam'];


$kode_pinjam = "PJM/" . date('dmy') . "/" . sprintf("%03s", $id_pinjam);

?>


<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
            <fieldset>
                <legend><?php echo isset($_GET['detail']) ? 'Detail' : 'Tambah' ?> Buku</legend>

                <form action="" method="post">
                    <div class="mb-3 row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="form-label">No Peminjaman</label>
                                <input type="text" class="form-control" name="no_peminjaman" value="<?php echo isset($_GET['detail']) ? $rowPeminjaman['no_peminjaman'] : $kode_pinjam ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="form-label">Tanggal Peminjaman</label>
                                <input type="date" class="form-control" name="tgl_peminjaman" value="<?php echo isset($_GET['detail']) ? $rowPeminjaman['tgl_peminjaman'] : "" ?>" <?php echo isset($_GET['detail']) ? 'readonly' : '' ?> required>
                            </div>

                            <div class="mb-3">
                                <label for="form-label">Nama Buku</label>
                                <select name="" id="id_buku" class="form-control" required>
                                    <option value="">Pilih Buku</option>
                                    <!-- ini ngambil data dari tabel buku -->
                                    <?php while ($rowBuku = mysqli_fetch_assoc($queryBuku)): ?>
                                        <option value="<?php echo $rowBuku['id']; ?>"><?php echo $rowBuku['name_book'] ?></option>
                                    <?php endwhile ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <?php if (empty($_GET['detail'])) : ?>
                                <div class="mb-3">
                                    <label for="form-label">Nama Anggota</label>
                                    <?php if (!isset($_GET['detail'])): ?>
                                        <select name="id_anggota" id="" class="form-control" required>
                                            <option value="">Pilih Anggota</option>
                                            <!-- ini ngambil data dari tabel anggota -->
                                            <?php while ($rowAnggota = mysqli_fetch_assoc($queryAnggota)) : ?>
                                                <option value="<?php echo $rowAnggota['id'] ?>">
                                                    <?php echo $rowAnggota['nama_anggota'] ?>
                                                </option>
                                            <?php endwhile ?>
                                        </select>
                                    <?php else: ?>
                                        <input type="text" class="form-control" value="<?php echo $rowPeminjam['nama_anggota'] ?>">
                                    <?php endif; ?>
                                <?php endif ?>
                                </div>

                                <div class="mb-3">
                                    <label for="form-label">Tanggal pengembalian</label>
                                    <input type="date" class="form-control" name="tgl_pengembalian" value="<?php echo isset($_GET['detail']) ? $rowPeminjam['tgl_pengembalian'] : "" ?>" <?php echo isset($_GET['detail']) ? 'readonly' : '' ?> required>
                                </div>
                        </div>
                    </div>
                    <?php if (empty($_GET['detail'])): ?>
                        <div align="right">
                            <button type="button" id="add-row" class="btn btn-primary mb-3">Tambah</button>
                        </div>
                    <?php endif ?>

                    <!-- tablle data dari query dengan PHP -->
                    <?php if (!empty($_GET['detail'])): ?>
                        <table class="">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Buku</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $no = 1;
                                while ($rowDetailPeminjaman = mysqli_fetch_assoc($queryDetailPeminjam)): ?>
                                    <tr>
                                        <td><?php $no++ ?></td>
                                        <td><?php echo $rowDetailPeminjaman['nama_buku'] ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <table class="table table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th>Nama Buku</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-row"></tbody>
                        </table>
                    <?php endif ?>

                    <!-- ini table data dari JS -->

                    <div class="mt-3">
                        <button type="submit" name="simpan" class="btn btn-primary">
                            Simpan
                        </button>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>