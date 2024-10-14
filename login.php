

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />

    <title>login form</title>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="row  ">
                <div class="col-sm-4 mx-auto mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-tittle">
                                <h5>Selamat Datang di PERPUS APP</h5>
                                <p>Silahkam masuk dengan akun anda</p>

                            </div>
                            <form action="actionLogin.php" method="post">
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">
                                        email
                                    </label>
                                    <input type="email" class="form-control" name="email" placeholder="masukan email anda">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">
                                        password
                                    </label>
                                    <input type="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">
                                </div>
                                <div class="form-group mb-3">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary w-100">sign in</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>