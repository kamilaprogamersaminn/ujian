<?php
$conn = mysqli_connect("localhost", "root", "", "daftar_siswa");

if(!$conn) {
    die("koneksi gagal: ". mysqli_connect_error());
}
?>