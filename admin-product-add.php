<?php
include_once("koneksi.php");

$category = mysqli_query($koneksi, "SELECT * FROM products_categories");

if (isset($_POST['insert'])) {
  $name = $_POST['name'];
  $category_id = $_POST['category_id'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  $image_name = $_FILES['image']['name'];
  $image_format = $_FILES['image']['type'];
  $image_tmp = $_FILES['image']['tmp_name'];

  $path = "img/" . $image_name;

  if ($image_format == "image/jpeg" || $image_format == "image/png") {
    if (move_uploaded_file($image_tmp, $path)) {
      $push = mysqli_query($koneksi, "INSERT INTO products (name,product_category_id,description,image,price) VALUES('$name','$category_id','$description','$image_name', '$price')");
      if ($push) {

        header("location: admin-product.php");
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

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet" />

</head>

<body>
  <div class="container">
    <div class="card shadow my-4">
      <div class="card-header py-4 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Add a Product</h6>
      </div>
      <div class="card-body">

        <form action="" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama">
          </div>

          <label for="category" class="form-label">Category</label>
          <div class="mb-3 mt-1 category">
            <?php
            while ($b = mysqli_fetch_array($category)) {
            ?>
              <label class="mr-2 mt-1" style="margin-left: 0 !important;">
                <input type="radio" class="card-input-element" id="category_id" name="category_id" value=<?= $b['id'];  ?> />

                <div class="card card-input px-4 py-2">
                  <?= $b['name']; ?>
                </div>

              </label>
            <?php
            }
            ?>

          </div>

          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Masukan deskripsi">
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Masukan Harga">

          </div>


          <div class="mt-5 mb-3">
            <button type="submit" name="insert" class="btn btn-primary btn-block">Add Product</button>
          </div>
        </form>
      </div>
    </div>
  </div>



  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
</body>

</html>