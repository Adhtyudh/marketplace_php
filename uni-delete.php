<?php
include_once("koneksi.php");

$id = $_GET['id'];
$table = $_GET['table'];
$header = $_GET['header'];

$load = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM $table WHERE id=$id"));

$delete = mysqli_query($koneksi, "DELETE FROM $table WHERE id=$id");

header("Location:$header");
