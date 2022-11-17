<?php 
// masukkan file koneksi
include "config.php";

// menerima data dari form input.php
$id_pelaporan = $_POST['id_pelaporan'];
$status = $_POST['status'];
$gambar = $_POST['gambar'];

// query untuk sintak data
mysqli_query($conn, "UPDATE tbaspirasi SET status='$status', gambar='$gambar' WHERE id_pelaporan='$id_pelaporan'");

//lokasi 
header("location: admin-home.php");

?>