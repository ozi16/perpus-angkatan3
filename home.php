<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Permanent+Marker&display=swap" rel="stylesheet" />

  <title>rumah</title>
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
            <a href="home.php" class="nav-link active">Home</a>
            <a href="index.php" class="nav-link">Login</a>
            <a href="#" class="nav-link">Departement</a>
            <a href="register.php" class="nav-link">Register</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide w-80 h-75 mt-4">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./assets/img/seni1.jpg" class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item">
          <img style="height: 740px" src="./assets/img/seni2.webp" class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item">
          <img src="./assets/img/kk.jpg" class="d-block w-100" alt="..." />
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>