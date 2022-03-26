<?php
include_once("koneksi.php");

if (isset($_POST['insert'])) {
  $judul = $_POST['judul'];
  $pengarang = $_POST['pengarang'];
  $penerbit = $_POST['penerbit'];
  $isbn = $_POST['isbn'];
  $kategori = $_POST['kategori'];

  $image_name = $_FILES['gambar']['name'];
  $image_format = $_FILES['gambar']['type'];
  $image_tmp = $_FILES['gambar']['tmp_name'];

  $path = "Assets/Image/" . $image_name;

  if ($image_format == "image/jpeg" || $image_format == "image/png") {
    if (move_uploaded_file($image_tmp, $path)) {
      $push = mysqli_query($koneksi, "INSERT INTO tabel_buku (judul,pengarang,penerbit,gambar,isbn, id_kategori) VALUES('$judul','$pengarang','$penerbit','$image_name', '$isbn', $kategori)");
      if ($push) {

        header("location: index.php");
      } else {

        echo '<script type ="text/JavaScript">';
        echo 'alert("Terjadi kesalahan saat menyimpan data ke database")';
        echo '</script>';
      }
    } else {
      echo '<script type ="text/JavaScript">';
      echo 'alert("Terjadi kesalahan saat mengupload image")';
      echo '</script>';
    }
  } else {
    echo '<script type ="text/JavaScript">';
    echo 'alert("Format gambar tidak seusai!")';
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
  <title>Tambah Buku</title>

  <link rel="stylesheet" href="Assets/Style/bootstrap/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <div class="card my-4">
      <h2 class="card-header p-2">Tambah Buku</h2>
      <div class="card-body">
        <a href="./">
          <button type="button" class="btn btn-primary btn-sm mb-4">Kembali</button>
        </a>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul">
          </div>
          <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
          </div>
          <div class="mb-3">
            <label for="pengarang" class="form-label">Pengarang</label>
            <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Masukan Pengarang">
          </div>
          <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukan Penerbit">
          </div>
          <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Masukan ISBN">
          </div>
          
          <div class="mb-3">
                <?php 
                        $category = mysqli_query($koneksi, "SELECT * FROM kategori");
                        while ($b = mysqli_fetch_array($category)) {
                        ?> 
                        <input type="radio" id="kategori" name="kategori" value=<?= $b['id']; ?>>
                        <label for="css"><?= $b['nama']; ?></label><br>
                        <?php 
                        }
                        ?>

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