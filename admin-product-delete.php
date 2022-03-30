<?php
include_once("koneksi.php");

$id = $_GET['id'];

$load = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM products WHERE id=$id"));
$image = $load['image'];
unlink("img/$image");

$delete = mysqli_query($koneksi, "DELETE FROM products WHERE id=$id");

header("Location:admin-product.php");
