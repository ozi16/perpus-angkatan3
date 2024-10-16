<?php
// untuk menambahkan data
if (isset($_POST['tambah'])) {

    $nama_buku = $_POST['name_book'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $pengarang = $_POST['pengarang'];
    $id_category = $_POST['id_category'];



    // sql = struktur query language / DML = data manipulasi language
    // SELECT, INSERT, UPDATE, DELETE

    $insert = mysqli_query($koneksi, "INSERT INTO books (id_category,name_book,penerbit,tahun_terbit,pengarang) VALUES ('$id_category','$nama_buku','$penerbit','$tahun_terbit','$pengarang')");
    header('location:?pg=buku&tambah=berhasil');
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
// untuk memunculkan data sesuai id jika di pilih data 1 maka akan muncul data 1
$editBuku = mysqli_query($koneksi, "SELECT * FROM books WHERE id = '$id'");
$rowBuku = mysqli_fetch_assoc($editBuku);

// membuat action baru untuk edit
if (isset($_POST['edit'])) {
    $nama_buku = $_POST['name_book'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $pengarang = $_POST['pengarang'];
    $id_category = $_POST['id_category'];



    // ubah user kolom apa yang mau di ubah (SET), yang mau diubah id ke berapa
    // SET = kolom yang mau diubah
    $update = mysqli_query($koneksi, "UPDATE books SET name_book='$nama_buku', penerbit='$penerbit', tahun_terbit='$tahun_terbit', pengarang='$pengarang',id_category='$id_category' WHERE id='$id'");
    header('location:?pg=buku&ubah=berhasil');
}

// untuk delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM books WHERE id='$id'");
    header('location:?pg=buku&hapus=berhasil');
}

// untuk menampilkan data rdms
$queryBuku = mysqli_query($koneksi, "SELECT * FROM books");


?>


<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
            <fieldset>

                <legend><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Buku</legend>

                <form action="" method="post">
                    <div class="mb-3 row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="form-label">No Peminjaman</label>
                                <input type="text" class="form-control" name="no_peminjaman" value="" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="form-label">Tanggal Peminjaman</label>
                                <input type="date" class="form-control" name="tgl_peminjaman" value="">
                            </div>
                            <div class="mb-3">
                                <label for="form-label">Tanggal Peminjaman</label>
                                <input type="date" class="form-control" name="tgl_peminjaman" value="">
                            </div>
                            <div class="mb-3">
                                <label for="form-label">Nama Buku</label>
                                <select name="" id="id_buku" class="form-control">
                                    <option value="">Pilih Buku</option>
                                    <!-- ini ngambil data dari tabel buku -->
                                    <?php while ($rowBuku = mysqli_fetch_assoc($queryBuku)): ?>
                                        <option value="<?php echo $rowBuku['id']; ?>"><?php echo $rowBuku['name_book'] ?></option>
                                    <?php endwhile ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="form-label">Nama Anggota</label>
                                <select name="id_anggota" id="" class="form-control">
                                    <option value="">Pilih Anggota</option>
                                    <!-- ini ngambil data dari tabel anggota -->
                                    <option value=""></option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="form-label">Tanggal pengembalian</label>
                                <input type="date" class="form-control" name="tgl_pengembalian" value="">
                            </div>
                        </div>
                    </div>
                    <div align="right">
                        <button type="button" id="add-row" class="btn btn-primary mb-3">Tambah</button>
                    </div>
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Nama Buku</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-row"></tbody>
                    </table>
                </form>
            </fieldset>
        </div>
    </div>
</div>