<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman Home</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-danger text-light border-bottom border-dark">
        <div class="container">
            <h2 class="navbar-brand" href="index.php">Halaman Album</h2>
            <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto"> </div>
                <ul class="navbar-nav">

                </ul>
                <a href="register.php" class="btn btn-outline-primary m-1">Daftar</a>
                <a href="login.php" class="btn btn-outline-success m-1">Login</a>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <img src="" alt="hii" class="card-img-top" title="" style="height:12rem;">
                    <div class="card-footer text-center">
                        <a href="">10 Suka</a>
                        <a href="">3 Komentar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="asset/js/bootstrap.min.js"></script>
</body>

</html>