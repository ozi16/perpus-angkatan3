<?php
// untuk menambahkan data
if (isset($_POST['tambah'])) {

    $nama_kategori = $_POST['name_category'];


    // sql = struktur query language / DML = data manipulasi language
    // SELECT, INSERT, UPDATE, DELETE

    $insert = mysqli_query($koneksi, "INSERT INTO categories (name_category) VALUES ('$nama_kategori')");
    header('location:?pg=kategori&tambah=berhasil');
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
// untuk memunculkan data sesuai id jika di pilih data 1 maka akan muncul data 1
$editKategori = mysqli_query($koneksi, "SELECT * FROM categories WHERE id = '$id'");
$rowKategori = mysqli_fetch_assoc($editKategori);

// membuat action baru untuk edit
if (isset($_POST['edit'])) {
    $nama_kategori = $_POST['name_category'];


    // ubah user kolom apa yang mau di ubah (SET), yang mau diubah id ke berapa
    // SET = kolom yang mau diubah
    $update = mysqli_query($koneksi, "UPDATE categories SET name_category='$nama_kategori' WHERE id='$id'");
    header('location:?pg=kategori&ubah=berhasil');
}

// untuk delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM categories WHERE id='$id'");
    header('location:?pg=kategori&hapus=berhasil');
}


?>


<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
            <fieldset>

                <legend><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Kategori</legend>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" name="name_category" placeholder="masukan kategori " value="<?php echo isset($_GET['edit']) ? $rowKategori['name_category'] : '' ?>">
                    </div>

                    <div class="mb-3">
                        <button name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" class="btn btn-primary" type="submit">Simpan </button>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>