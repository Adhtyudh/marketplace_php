<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'marketplace');
if (!$koneksi) {
    echo "gagal tehubung";
}
