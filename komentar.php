<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman Komentar</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-danger text-light border-bottom border-dark">
        <div class="container">
            <h2 class="navbar-brand" href="index.php">Halaman komentar</h2>
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
    <p>Selamat datang <b><?= $_SESSION['namalengkap'] ?></b></p>

    <form action="tambah_komentar.php" method="post">
        <?php
        include "koneksi.php";
        $fotoid = $_GET['fotoid'];
        $sql = mysqli_query($conn, "select * from foto where fotoid='$fotoid'");
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <input type="text" name="fotoid" value="<?= $data['fotoid'] ?>" hidden>
            <table>
                <tr>
                    <td>Judul</td>
                    <td><input type="text" name="judulfoto" value="<?= $data['judulfoto'] ?>"></td>
                </tr>
                <tr>
                    <td>Deskrifsi</td>
                    <td><input type="text" name="deskripsifoto" value="<?= $data['deskripsifoto'] ?>"></td>
                </tr>
                <tr>
                    <td>foto</td>
                    <td><img src="gambar/<?= $data['lokasifile'] ?>" width="200px"></td>
                </tr>
                <tr>
                    <td>Komentar</td>
                    <td><input type="text" name="isikomentar"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="tambah"></td>
                </tr>
            </table>
        <?php
        }
        ?>
    </form>
    <table widht="100%" border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Komentar</th>
            <th>Tanggal</th>
        </tr>
        <?php
        include "koneksi.php";
        // session_start();

        $userid = $_SESSION['userid'];
        $sql = mysqli_query($conn, "select * from komentarfoto,user where komentarfoto.userid=user.userid");
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td><?= $data['komentarid'] ?></td>
                <td><?= $data['namalengkap'] ?></td>
                <td><?= $data['isikomentar'] ?></td>
                <td><?= $data['tanggalkomentar'] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <script src="asset/js/bootstrap.min.js"></script>
</body>

</html>