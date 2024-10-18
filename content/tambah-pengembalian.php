<?php
// untuk menambahkan data
if (isset($_POST['simpan'])) {

    $no_peminjaman = $_POST['no_peminjaman'];
    $id_anggota = $_POST['id_anggota'];
    $tgl_peminjaman = $_POST['tgl_peminjaman'];
    $tgl_pengembalian = $_POST['tgl_pengembalian'];
    $id_book = $_POST['id_book'];
    $status = "di pinjam";


    // sql = struktur query language / DML = data manipulasi language
    // SELECT, INSERT, UPDATE, DELETE

    $insert = mysqli_query($koneksi, "INSERT INTO peminjaman (no_peminjaman,id_anggota,tgl_peminjaman, tgl_pengembalian, status) VALUES ('$no_peminjaman','$id_anggota','$tgl_peminjaman','$tgl_pengembalian','$status')");
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
    $delete = mysqli_query($koneksi, "UPDATE peminjaman SET delete_at = 1 WHERE id='$id'");
    header('location:?pg=peminjaman&hapus=berhasil');
}

// untuk menampilkan data rdms
$queryBuku = mysqli_query($koneksi, "SELECT * FROM books");
$queryAnggota = mysqli_query($koneksi, "SELECT * FROM anggota");

// untuk memunculkan no peminjaman di tambah buku
$queryKodePnjm = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE status ='di pinjam'");




?>


<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
            <fieldset>

                <legend><?php echo isset($_GET['detail']) ? 'Detail' : 'Tambah' ?> Pengembalian</legend>

                <form action="" method="post">
                    <div class="mb-3 row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="form-label">No Peminjaman</label>
                                <select name="id_peminjaman" id="id_peminjaman" class="form-control">
                                    <!-- data option ngambil dari tabel peminjaman -->
                                    <option value="">--No Peminjam</option>
                                    <?php while ($rowPeminjaman = mysqli_fetch_assoc($queryKodePnjm)): ?>
                                        <option value="<?php echo $rowPeminjaman['no_peminjaman'] ?>"><?php echo $rowPeminjaman['no_peminjaman']; ?></option>
                                    <?php endwhile ?>
                                </select>
                            </div>
                            <!--  -->

                        </div>
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    Data Peminjam
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="">No Peminjaman</label>
                                                <input type="text" readonly id="no_pinjam" class="form-control">
                                                <!-- memanggil id menggunakan # dan class menggunakan . -->
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Tanggal Peminjaman</label>
                                                <input type="text" readonly id="tgl_peminjaman" class="form-control">
                                                <!-- memanggil id menggunakan # dan class menggunakan . -->
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="">Nama Anggota</label>
                                                <input type="text" readonly id="nama_anggota" class="form-control">
                                                <!-- memanggil id menggunakan "#" dan class menggunakan "." -->
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Tanggal Pengembalian</label>
                                                <input type="text" readonly id="no_pengembalian" class="form-control">
                                                <!-- memanggil id menggunakan "#" dan class menggunakan "." -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (empty($_GET['detail'])): ?>
                            <div align="right" class="mt-3 mb-3">
                                <button type="button" id="add-row" class="btn btn-primary ">Tambah</button>
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