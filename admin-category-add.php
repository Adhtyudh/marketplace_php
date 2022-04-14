<?php
include_once("koneksi.php");

if (isset($_POST['insert'])) {
    $name = $_POST['name'];

    $push = mysqli_query($koneksi, "INSERT INTO products_categories (name) VALUES('$name')");
    if ($push) {
        header("location: admin-category.php");
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
                <h6 class="m-0 font-weight-bold text-primary">Add a Category</h6>
            </div>
            <div class="card-body">

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama">
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