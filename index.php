<?php
session_start();
// session_regenerate_id(true);

include 'koneksi.php';

// jika sessionnya kosong, maka melempar ke login.php
// if (empty($_SESSION['nama']) && empty($_SESSION['email'])) {
//     header("Location:index.php");
//     exit;
// }

if (empty($_SESSION['NAMA'])) {
    header('location:login.php?access=failed');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />

    <title>dashboard</title>
</head>

<body>
    <div class="wrapper justify-content-center">

        <?php include 'inc/navbar.php'; ?>

        <div class="content">
            <?php
            if (isset($_GET['pg'])) {
                if (file_exists('content/' . $_GET['pg'] . '.php')) {
                    include 'content/' . $_GET['pg'] . '.php';
                } else {
                    echo "Halaman yang anda cari tidak ditemukan!";
                }
            } else {
                include 'content/dashboard.php';
            }
            ?>
        </div>


        <?php ?>
        <footer class="text-center mt-4 fixed-bottom p-3 border-top">Copyright &copy; 2024 PPKD - Jakarta Pusat.</footer>
    </div>


    <!-- <button class="container-fluid btn btn-danger btn-sm mt-4 p-4">
        <a href="./controller/logout.php" class="fw-bold text-decoration-none text-primary-emphasis fs-3">Log-out</a>
    </button> -->

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="app.js"></script>

    <!-- untuk memunculkan jika select di tekan maka akan muncul datanya.. -->
    <script>
        $("#id_peminjaman").change(function() {
            let no_peminjaman = $(this).find('option:selected').val();
            console.log(no_peminjaman)
            $.ajax({
                url: "ajax/getPeminjam.php?no_peminjaman=" + no_peminjaman,
                type: "get",
                dataType: "json",
                success: function(res) {
                    $('#no_pinjam').val(res.data.no_peminjaman);
                    $('#tgl_peminjaman').val(res.data.tgl_peminjaman);
                    $('#no_pengembalian').val(res.data.tgl_pengembalian);
                    $('#nama_anggota').val(res.data.nama_anggota);


                    console.log(res);
                }
            });
        });
    </script>

</body>

</html>