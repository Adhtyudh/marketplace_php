<?php

include 'koneksi.php';

error_reporting(0);

$kategori = $_GET['kategori'];

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

$data = mysqli_query($koneksi, "SELECT * FROM tabel_buku");
$reset_button = false;

if ($kategori != null) {
    $data = category($koneksi, $kategori);
}

if (array_key_exists('search_button', $_POST)) {
    $result = search($_POST['search'], $koneksi);
    if ($result) {
        $data = $result;
        $reset_button = true;
        if (array_key_exists('reset', $_POST)) {
            $data = mysqli_query($koneksi, "SELECT * FROM tabel_buku");
            $reset_button = false;
        }
    }
}

function category($koneksi, $kategori)
{
    $filtered_data = mysqli_query($koneksi, "SELECT * FROM tabel_buku WHERE id_kategori = $kategori");
    return $filtered_data;
}

function search($text, $koneksi)
{
    if ($text) {
        $filtered_data = mysqli_query($koneksi, "SELECT * FROM tabel_buku WHERE judul LIKE '%$text%' ");
        if (mysqli_num_rows($filtered_data) > 0) {
            return $filtered_data;
        } else {
            echo '<script type ="text/JavaScript">';
            echo 'alert("Tidak Ditemukan")';
            echo '</script>';
            return null;
        }
    } else {
        echo '<script type ="text/JavaScript">';
        echo 'alert("Masukan pencarian")';
        echo '</script>';
        return null;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="Assets/Style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/Style/style.css">

    <title>Data Tampil</title>
</head>

<body>


    <div class="container">
        <div class="card">
            <h2 class="card-header p-2 text-center">Daftar Buku</h2>
            <div class="card-body ">
                <div class="container d-flex justify-content-between">
                    <h3>WELCOME,<?php echo ($_SESSION['username']); ?> :)</h3>
                    <a href="logout.php">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin keluar?')">Logout</button>
                    </a>

                </div>
                <hr>
                <!-- Navigasi -->

                <div class="nav justify-content-between">

                    <div class="d-flex">
                        <a class="me-3" href="create.php">
                            <button type="button" class="btn btn-info">tambah buku</button>
                        </a>
                        <a href="createKategori.php">
                            <button type="button" class="btn btn-info">tambah kategori</button>
                        </a>
                    </div>


                    <form class="d-flex" action="" method="POST">
                        <input class="form-control me-2" type="search" name="search" id="search" placeholder="Cari Judul Buku" aria-label="Search">
                        <button class="btn btn-info" type="submit" name="search_button">Cari</button>
                    </form>
                    <?php if ($reset_button) : ?>
                        <form action="" method="POST">
                            <button class="btn btn-info ms-2" type="submit" name="reset">Tampilkan Semua</button>
                        </form>
                    <?php endif; ?>
                </div>

            </div>
            <!-- Daftar Buku -->
            <div class="d-flex">

                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a href="index.php">
                            <button class="nav-link" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Tampilkan Semua</button>
                        </a>
                        <?php
                        $category = mysqli_query($koneksi, "SELECT * FROM kategori");
                        while ($b = mysqli_fetch_array($category)) {
                        ?>
                            <a href="index.php?kategori=<?= $b['id']; ?>">
                                <button class="nav-link" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><?= $b['nama']; ?></button>
                            </a>
                        <?php
                        }
                        ?>
                    </div>

                </div>
                <div class="col-md-10">
                    <div class="row">
                        <?php
                        while ($b = mysqli_fetch_array($data)) {
                        ?>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="pt-2 pb-4">
                                            <img src="Assets/Image/<?= $b['gambar']; ?>" alt="<?= $b['judul']; ?>" class="gambar">
                                        </div>
                                        <h3 class="card-title text-primary fs-6"><?= $b['judul']; ?></h3>
                                        <p class="my-0 mt-3" style="font-size: 12px; color: #172533;"><b>Pengarang</b></p>
                                        <p class="card-text text-secondary py-0 my-0"><?= $b['pengarang']; ?></p>
                                        <p class="my-0 mt-2" style="font-size: 12px; color: #172533;"><b>Penerbit</b></p>
                                        <p class="card-text text-secondary my-0"><?= $b['penerbit']; ?></p>
                                        <a href="edit.php?id=<?= $b['id_buku']; ?>">
                                            <button type="button" style="background-color: #739AA1;" class="btn btn-scondary me-2 mt-3">Edit</button>
                                        </a>
                                        <a href="delete.php?id=<?= $b['id_buku']; ?>">
                                            <button type="button" class="btn btn-dark me-2 mt-3" onclick="return confirm('Yakin ingin dihapus?')">Hapus</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }

                        ?>
                    </div>

                </div>

            </div>


            <script src='Assets/Style/bootstrap/js/bootstrap.bundle.min.js'></script>

</body>

</html>