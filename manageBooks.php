<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
</head>

<body>
    <div class="wrapper">
        <div class="menu border-bottom border-black">
            <nav class=" navbar navbar-expand-lg bg-body-tertiary sticky-top my-auto mx-auto style=" background-color: #bebebe>
                <div class="container-fluid">
                    <a class="navbar-brand" href="./dashboard.php">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./manageAccount.php">Manage Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./manageBooks.php">Manage Books</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12">
                    <fieldset>
                        <legend>Data User</legend>
                        <div class="button-action">
                            <a href="" class="btn btn-primary">Add</a>
                            <a href="" class="btn btn-primary">Recyle</a>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Level</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Admin</td>
                                            <td>Admin</td>
                                            <td>@admin@gmail</td>
                                            <td>Edit | Delete</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>User</td>
                                            <td>marco</td>
                                            <td>@marco@gmail</td>
                                            <td>Edit
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>