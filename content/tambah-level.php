<?php
// untuk menambahkan data
if (isset($_POST['tambah'])) {

    $nama_level = $_POST['nama_level'];


    // sql = struktur query language / DML = data manipulasi language
    // SELECT, INSERT, UPDATE, DELETE

    $insert = mysqli_query($koneksi, "INSERT INTO levels (nama_level) VALUES ('$nama_level')");
    header('location:?pg=level&tambah=berhasil');
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
// untuk memunculkan data sesuai id jika di pilih data 1 maka akan muncul data 1
$editLevel = mysqli_query($koneksi, "SELECT * FROM levels WHERE id = '$id'");
$rowLevel = mysqli_fetch_assoc($editLevel);

// membuat action baru untuk edit
if (isset($_POST['edit'])) {
    $nama_level = $_POST['nama_level'];


    // ubah user kolom apa yang mau di ubah (SET), yang mau diubah id ke berapa
    // SET = kolom yang mau diubah
    $update = mysqli_query($koneksi, "UPDATE levels SET nama_level='$nama_level' WHERE id='$id'");
    header('location:?pg=level&ubah=berhasil');
}

// untuk delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM levels WHERE id='$id'");
    header('location:?pg=level&hapus=berhasil');
}


?>


<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
            <fieldset>

                <legend><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Level</legend>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Level</label>
                        <input type="text" class="form-control" name="nama_level" placeholder="masukan level " value="<?php echo isset($_GET['edit']) ? $rowLevel['nama_level'] : '' ?>">
                    </div>

                    <div class="mb-3">
                        <button name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" class="btn btn-primary" type="submit">Simpan </button>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>