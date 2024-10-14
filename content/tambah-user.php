<?php

// untuk menambahkan data
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $telepon = $_POST['telepon'];

    // sql = struktur query language / DML = data manipulasi language
    // SELECT, INSERT, UPDATE, DELETE

    $insert = mysqli_query($koneksi, "INSERT INTO user (nama, email, password,jenis_kelamin, telepon) VALUES ('$nama','$email','$password','$jenis_kelamin','$telepon')");
    header("location:?pg=user&tambah=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
// untuk memunculkan data sesuai id jika di pilih data 1 maka akan muncul data 1
$editUser = mysqli_query($koneksi, "SELECT * FROM user WHERE id = '$id'");
$rowEdit = mysqli_fetch_assoc($editUser);

// membuat action baru untuk edit
if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    // agar password tidak berubah ketika password tidak diubah
    if ($_POST['password']) {
        $password = sha1($_POST['password']);
    } else {
        $password = $rowEdit['password'];
    }

    // $password = isset($_POST['password']) ? sha1($_POST['password']) : $rowEdit['password'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $telepon = $_POST['telepon'];

    // ubah user kolom apa yang mau di ubah (SET), yang mau diubah id ke berapa
    // SET = kolom yang mau diubah
    $update = mysqli_query($koneksi, "UPDATE user SET nama='$nama', email='$email',password='$password',jenis_kelamin='$jenis_kelamin',telepon='$telepon' WHERE id='$id'");
    header('location:?pg=user&ubah=berhasil');
}

// untuk delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'");
    header('location:?pg=user&hapus=berhasil');
}


?>


<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
            <fieldset>

                <legend><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> User</legend>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="masukan nama anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="masukan email anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="masukan password anda">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Jenis Kelamin</label>
                        <input type="radio" value="Perempuan" name="jenis_kelamin" <?php echo isset($_GET['edit']) ? ($rowEdit['jenis_kelamin'] == 'Perempuan' ? 'checked' : '') : '' ?>>Perempuan
                        <input type="radio" value="Laki-laki" name="jenis_kelamin" <?php echo isset($_GET['edit']) ? ($rowEdit['jenis_kelamin'] == 'Laki-laki' ? 'checked' : '') : '' ?>>Laki-laki
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Telepon</label>
                        <input type="number" name="telepon" value="<?php echo isset($_GET['edit']) ? $rowEdit['telepon'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <button name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" class="btn btn-primary" type="submit">Simpan </button>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>