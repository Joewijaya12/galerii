<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman landing</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-danger text-light border-bottom border-dark">
        <div class="container">
            <h2 class="navbar-brand" href="index.php">Halaman Home</h2>
            <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto"> </div>
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="index.php" class="btn text-light m-1">Home</a></li>
                    <li class="nav-item"><a href="album.php" class="btn text-light m-1">Album</a></li>
                    <li class="nav-item"><a href="foto.php" class="btn text-light m-1">Foto</a></li>
                    <li class="nav-item"><a href="logout.php" class="btn btn-danger m-1">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    session_start();
    if (!isset($_SESSION['userid'])) {
    ?>
        <ul>
            <li><a href="register.php">Register</li>
            <li><a href="login.php">Login</li>
        </ul>

    <?php
    } else {
    ?>
        <p>Selamat Datang <b class="text-decoration-underline">
                <?= $_SESSION['namalengkap'] ?>
            </b></p>
    <?php
    }
    ?>

    <table width="100%" border="1" cellpadding="5" cellspacing="0" class="table table-striped table-hover ">
        <div class="table-responsive">
            <div class="container mb-4">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Uploader</th>
                        <th>Jumlah Like</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    include "koneksi.php";
                    $sql = mysqli_query($conn, "select * from foto,user where foto.userid=user.userid");
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <td><?= $data['fotoid'] ?></td>
                            <td><?= $data['judulfoto'] ?></td>
                            <td><?= $data['deskripsifoto'] ?></td>
                            <td><img src="gambar/<?= $data['lokasifile'] ?>" width="200px"></td>
                            <td><?= $data['namalengkap'] ?></td>
                            <td>
                                <?php
                                $fotoid = $data['fotoid'];
                                $sql2 = mysqli_query($conn, "select * from likefoto where fotoid='$fotoid'");
                                echo mysqli_num_rows($sql2);
                                ?>
                            </td>
                            <td>
                                <a href="like.php?fotoid=<?= $data['fotoid'] ?>">like</a>
                                <a href="komentar.php?fotoid=<?= $data['fotoid'] ?>">Komentar</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </table>
    <script src="asset/js/bootstrap.min.js"></script>
</body>

</html>