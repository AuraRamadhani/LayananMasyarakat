<?php 
include "config.php";

// menerima data dengan get
$id_pelaporan = $_GET['id_pelaporan'];
echo $id_pelaporan;

// konek ke database
mysqli_query($conn, "DELETE FROM tbaspirasi where id_pelaporan='$id_pelaporan'");
header("location: admin-home.php")

?>