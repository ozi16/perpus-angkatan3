<?php
session_start();
// session_regenerate_id(true);

include 'koneksi.php';


// jika sessionnya kosong, maka melempar ke login.php
// if (empty($_SESSION['nama']) && empty($_SESSION['email'])) {
//     header("Location:index.php");
//     exit;
// }
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



</body>

</html>