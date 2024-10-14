<?php
session_start();
session_regenerate_id(true);

// jika sessionnya isi, maka melempar ke dashboard
if (isset($_SESSION['name']) && isset($_SESSION['email'])) {
    header("location:dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Permanent+Marker&display=swap" rel="stylesheet" />
    <!-- <style>
      * {
        border: 1px solid black;
      }
    </style> -->
</head>


<body style="font-family: Indie Flower; font-weight: bold">
    <div class="container">
        <div class="row">
            <div class="col-3 d-flex justify-content-center align-items-center">
                <img width="50%" src="logo ppkd.png" alt="" />
            </div>
            <div class="col-6 mt-3 text-center">
                <h1>SELAMAT DATANG DI PPKD JAKPUS</h1>
                <p>Jl...</p>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center">
                <img width="50%" src="logo ppkd.png" alt="" />
            </div>
        </div>
        <!-- Navbar start -->
        <nav class="navbar navbar-expand-lg shadow-sm sticky-top mt-3" style="background-color: #bebebe">
            <div class="collapse navbar-collapse" id="navAltMarkup">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navAltMarkup" aria-expanded="false" aria-controls="navAltMarkup" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"> </span>
                    </button>
                    <div class="navbar-nav">
                        <a href="home.php" class="nav-link">Home</a>
                        <a href="index.php" class="nav-link active">Login</a>
                        <a href="#" class="nav-link">Departement</a>
                        <a href="register.php" class="nav-link">Register</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <marquee behavior="" direction="">angkatan 3 sedang membuat project web</marquee>
        <!-- Login -->
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 style="font-family: Permanent Marker; font-weight: bold">LOGIN</h3>
                    </div>
                    <?php
                    if (isset($_GET['error']) && $_GET['error'] == 'login-gagal') { ?>
                        <div class='alert alert-danger text-center' role="alert">
                            password atau email salah!
                        </div>
                    <?php
                    }
                    ?>
                    <div class="card-body">
                        <form action="./controller/controller-login.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" />
                                <div class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" aria-describedby="passwordHelp" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="login" class="btn btn-primary">LOgin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-info-subtle" style="min-height: 65px; margin-top: 20px">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-between text-center pt-3">
                    <p>Copyright</p>
                    <p>Privacy</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>