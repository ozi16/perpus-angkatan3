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
$queryKategori = mysqli_query($koneksi, "SELECT * FROM categories");


?>


<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
            <fieldset>

                <legend><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Buku</legend>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Kategori</label>
                        <select name="id_category" class="form-control" id="">
                            <option value="">Pilih Kategori</option>
                            <!-- option yang datanya di ambil dari tabel kategori -->
                            <?php while ($rowKategori = mysqli_fetch_assoc($queryKategori)): ?>
                                <option <?php echo isset($_GET['edit']) ? ($rowKategori['id'] == ($rowBuku['id_category']) ? 'selected' : '') : '' ?> value="<?php echo $rowKategori['id'] ?>"><?php echo $rowKategori['name_category'] ?></option>
                            <?php endwhile ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Buku</label>
                        <input type="text" class="form-control" name="name_book" placeholder="masukan kategori " value="<?php echo isset($_GET['edit']) ? $rowBuku['name_book'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">penerbit</label>
                        <input type="text" class="form-control" name="penerbit" placeholder="masukan penerbit " value="<?php echo isset($_GET['edit']) ? $rowBuku['penerbit'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Pengarang</label>
                        <input type="text" class="form-control" name="pengarang" placeholder="masukan pengarang " value="<?php echo isset($_GET['edit']) ? $rowBuku['pengarang'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tahun Terbit</label>
                        <input type="text" class="form-control" name="tahun_terbit" placeholder="masukan tahun terbit " value="<?php echo isset($_GET['edit']) ? $rowBuku['tahun_terbit'] : '' ?>">
                    </div>


                    <div class="mb-3">
                        <button name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" class="btn btn-primary" type="submit">Simpan </button>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>