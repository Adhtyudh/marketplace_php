<?php
include_once("koneksi.php");

if (isset($_POST['insert'])) {
  $nama = $_POST['nama'];

  
  $push = mysqli_query($koneksi, "INSERT INTO kategori (nama) VALUES('$nama')");
      if ($push) {

        header("location: index.php");
      } else {

        echo '<script type ="text/JavaScript">';
        echo 'alert("Terjadi kesalahan saat menyimpan data ke database")';
        echo '</script>';
      }
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Kategori</title>

  <link rel="stylesheet" href="Assets/Style/bootstrap/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <div class="card my-4">
      <h2 class="card-header p-2">Tambah Kategori</h2>
      <div class="card-body">
        <a href="./">
          <button type="button" class="btn btn-primary btn-sm mb-4">Kembali</button>
        </a>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="judul" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama">
          </div>
          <div class="mb-3">
            <button type="submit" name="insert" class="btn btn-success">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="Assets/Style/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>