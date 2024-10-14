<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Permanent+Marker&display=swap" rel="stylesheet" />

  <title>Register</title>

  <!-- <style>
      * {
        border: 1px solid;
      }
    </style> -->
</head>

<body style="font-family: Indie Flower; font-weight: bold">
  <div class="container">
    <div class="row ">
      <div class="col-3 d-flex justify-content-center align-items-center">
        <img width="50%" src="logo ppkd.png" alt="" />
      </div>
      <div class="col-6 mt-3 text-center ">
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
            <a href="index.php" class="nav-link ">Login</a>
            <a href="#" class="nav-link">Departement</a>
            <a href="register.php" class="nav-link active">Register</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
  </div>
  <!-- Register Form -->
  <div class="row justify-content-center mt-3">
    <div class="col-md-7">
      <div class="card">
        <div class="card-header text-center">
          <h3 style="font-family: Permanent Marker; font-weight: bold">REGISTER</h3>
        </div>
        <div class="card-body">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="inputName" class="form-label">First Name</label>
              <input type="text" class="form-control" id="inputName" placeholder="masukan nama pertama" />
            </div>
            <div class="mb-3">
              <label for="inputLastName" class="form-label">last Name</label>
              <input type="text" class="form-control" id="inputLastName" placeholder="masukan nama terakhir" />
            </div>
            <div class="mb-3">
              <label for="inputPassword" class="form-label">Password</label>
              <input type="password" class="form-control" id="inputPassword" aria-describedby="emailHelp" placeholder="xxxxxxxx" />
            </div>
            <div class="mb-3">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>