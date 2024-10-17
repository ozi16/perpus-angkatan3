<?php

// untuk menambahkan data
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_anggota'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    // sql = struktur query language / DML = data manipulasi language
    // SELECT, INSERT, UPDATE, DELETE

    $insert = mysqli_query($koneksi, "INSERT INTO anggota (nama_anggota,telepon ,email, alamat) VALUES ('$nama','$telepon','$email','$alamat')");
    header("location:?pg=anggota&tambah=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
// untuk memunculkan data sesuai id jika di pilih data 1 maka akan muncul data 1
$editAnggota = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id = '$id'");
$rowEdit = mysqli_fetch_assoc($editAnggota);

// membuat action baru untuk edit
if (isset($_POST['edit'])) {
    $nama = $_POST['nama_anggota'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

    // ubah user kolom apa yang mau di ubah (SET), yang mau diubah id ke berapa
    // SET = kolom yang mau diubah
    $update = mysqli_query($koneksi, "UPDATE anggota SET nama_anggota='$nama', email='$email',telepon='$telepon',alamat='$alamat' WHERE id='$id'");
    header('location:?pg=anggota&ubah=berhasil');
}

// untuk delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM anggota WHERE id='$id'");
    header('location:?pg=anggota&hapus=berhasil');
}


?>


<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
            <fieldset>

                <legend><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Anggota</legend>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama_anggota" placeholder="masukan nama anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_anggota'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="masukan email anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Telepon</label>
                        <input type="number" name="telepon" value="<?php echo isset($_GET['edit']) ? $rowEdit['telepon'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Alamat</label>
                        <input type="text" name="alamat" value="<?php echo isset($_GET['edit']) ? $rowEdit['alamat'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <button name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" class="btn btn-primary" type="submit">Simpan </button>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>