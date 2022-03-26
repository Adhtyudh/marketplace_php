<?php
include_once("koneksi.php");

$id = $_GET['id'];

$hasil = mysqli_query($koneksi, "SELECT * FROM tabel_buku WHERE id_buku=$id");
while ($data = mysqli_fetch_array($hasil)) {
  $vjudul = $data['judul'];
  $vpengarang = $data['pengarang'];
  $vpenerbit = $data['penerbit'];
  $visbn = $data['isbn'];
}

if (isset($_POST["update"])) {
  $judul = $_POST["judul"];
  $pengarang = $_POST["pengarang"];
  $penerbit = $_POST["penerbit"];
  $isbn = $_POST["isbn"];

  $result = mysqli_query($koneksi, "UPDATE tabel_buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', isbn='$isbn' WHERE id_buku=$id");
  if ($result) {
    header("Location: index.php");
  } else {
    echo "Gagal Update";
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
      <h2 class="card-header p-2">Edit Buku</h2>
      <div class="card-body">
        <a href="./">
          <button type="button" class="btn btn-primary btn-sm mb-4">Kembali</button>
        </a>
        <form action="" method="post">
          <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="<?= $vjudul ?>">
          </div>
          <div class="mb-3">
            <label for="pengarang" class="form-label">Pengarang</label>
            <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?= $vpengarang ?>">
          </div>
          <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $vpenerbit ?>">
          </div>
          <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" value="<?= $visbn ?>">
          </div>
          <div class="mb-3">
            <button type="submit" name="update" class="btn btn-success">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="Assets/Style/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>