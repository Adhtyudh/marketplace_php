<?php
include_once("koneksi.php");

$id = $_GET['id'];

$result = mysqli_query($koneksi, "DELETE FROM tabel_buku WHERE id_buku=$id");

header("Location:index.php");
